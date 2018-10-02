<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \App\Project;
use DB;
use Carbon\Carbon;

class MilestoneController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createMilestone($id)
    {
        $project = Project::find($id);

        $limit = $project->pending_payment;
        return view ('milestones.create', compact('project', 'limit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         DB::beginTransaction();
        try{

            $project_id = $request->get('project_id');
            $project = $this->getProjectDetails($project_id);
            if ($project) {
                $start = $project['start_date'];
                $deadline = $project['deadline'];
                $project_cost = $project['price'];
            }
            else{
                return redirect()->back()->withErrors(['msg', 'Milestone price exceeds projects pending payment']);
            }

            $cost = $request->get('cost');
            if ($project_cost - $cost < 0) {
                $diff = $project_cost - $cost;
                return redirect()->back();
            }

            $today = Carbon::today();
            $validator = Validator::make($request->all(), [
                'date' => 'required|date|date_format:Y-m-d|after:'.$start.'|before:'.$deadline,
            ])->validate();

            $milestone = new \App\Milestone;

            $milestone->name = $request->get('name');
            $milestone->project_id = $project_id;
            $milestone->cost = $request->get('cost');
            $milestone->date = $request->get('date');
            $milestone->description = $request->get('description');
            $milestone->status = 0;

            $milestone->save();
            DB::commit();

            return redirect()->route('admin/projectDetails', $request->get('project_id'));
        } catch(Exception $e){
            DB::rollback();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editMilestone($id)
    {
        $milestone = Milestone::with('project')
                                ->where('id', '=', $id)
                                ->first();        
        
        return view('milestones.edit', compact('milestone', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try{

            $project_id = $request->get('project_id');
            $project = $this->getProjectDetails($project_id);
            if ($project) {
                $start = $project['start_date'];
                $deadline = $project['deadline'];
                $project_cost = $project['price'];
            }
            else{
                return redirect()->back();
            }

            $today = Carbon::today();
            $validator = Validator::make($request->all(), [
                'date' => 'required|date|date_format:Y-m-d|after:yesterday|before:'.$deadline,
            ])->validate();

            $milestone = \App\Milestone::find($id);

            $milestone->name = $request->get('name');
            $milestone->project_id = $project_id;
            $milestone->cost = $request->get('cost');
            $milestone->date = $request->get('date');
            $milestone->description = $request->get('description');

            $milestone->save();
            DB::commit();
            
            return redirect()->route('admin/projectDetails', $request->get('project_id'));
        } catch(Exception $e){
            DB::rollback();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getProjectDetails($id){
        $project = Project::find($id);
        if (empty($project) ) {
            return;
        } else{
            return $project;
        }
    }

    public function releaseMilestone($id){

        DB::beginTransaction();
        try{
            $milestone = \App\Milestone::find($id);
            
            if ($milestone->status == 0) {
                $milestone->status = 1;
                $milestone->save();

                DB::commit();
                return redirect()->back();

                //$update = $this->updateProject($milestone->project_id, $milestone->cost);
                //if ($update) {
                //}
            } elseif ($milestone->status == 1) {
                $milestone->status = 2;
                $milestone->save();

                $update = $this->updateProject($milestone->project_id, $milestone->cost);
                if ($update) {
                     DB::commit();
                    return redirect()->back();
                }
            }            
        } catch(Exception $e){
            DB::rollback();
        }
    }

    public function updateProject($id, $cost){
        $project = \App\Project::find($id);
        if($project){
            $project->released_payment = $project->released_payment + $cost;
            $project->pending_payment = $project->price - $project->released_payment;
            $project->save();
            return 1;
        }
    }
}
