<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;
use DB;
use App\Project;
use App\Recruiter;
use App\Clients;
use App\Team;
use App\Task;
use App\ProjectUser;
use Carbon\Carbon;

class ProjectController extends Controller
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

    public function create()
    {
        $clients = \App\ClientPortal::all();
        $recs = \App\Agent::all();
        //$teams = \App\Team::all();
        return view('project.create', compact('clients','recs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = $request->get('agent_id');
        $price = $request->get('price');
        if ($id && $price) {
            $c_price = $this->calculatePrice($price, $id);
        }
        else{
            return redirect()->back()->withErrors(['msg', 'Error while saving record. Please re-enter data carefully!']);
        }

        DB::beginTransaction();
        try{

            $today = Carbon::today();

            $validator = Validator::make($request->all(), [
                'start_date' => 'required|date|date_format:Y-m-d',
                'deadline' => 'required|date|date_format:Y-m-d',
            ])->validate();

            $project = new \App\Project;
            $project->name = $request->get('name');
            $project->project_url = $request->get('project_url', false);
            $project->description = $request->get('description');
            $project->client_id = $request->get('client_id');
            $project->agent_id = $request->get('agent_id');
            $project->start_date = $request->get('start_date');
            $project->deadline = $request->get('deadline');
            $project->assign = 0;
            $project->price = $c_price;
            $project->released_payment = 0;
            $project->pending_payment = $c_price;
            
            if ($today >= $request->get('start_date')) {
                $project->status = 0;
            }elseif($today < $request->get('start_date')){
                $project->status = 2;
            }
            $project->save();
            DB::commit();

            return redirect()->route('project/view')->with('success', 'Information has been added');
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

    public function edit($id)
    {
        $project = \App\Project::find($id);
        $clients = \App\ClientPortal::all();
        $recs = \App\Agent::all();
        return view('project.edit', compact('project', 'id', 'clients', 'recs'));
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

        $id = $request->get('agent_id');
        $price = $request->get('price');
        if ($id && $price) {
            $c_price = $this->calculatePrice($price, $id);
        }
        else{
            return redirect()->back()->withErrors(['msg', 'Error while updating record. Please re-enter data carefully!']);
        }

        DB::beginTransaction();
        try{
            $today = Carbon::today();

            $validator = Validator::make($request->all(), [
                'start_date' => 'required|date|date_format:Y-m-d',
                'deadline' => 'required|date|date_format:Y-m-d|after:start_at',
            ])->validate();
            
            $project = \App\Project::find($id);
            $project->name = $request->get('name');
            $project->project_url = $request->get('project_url');
            $project->description = $request->get('description');
            $project->client_id = $request->get('client_id');
            $project->recruiter_id = $request->get('agent_id');
            $project->start_date = $request->get('start_date');
            $project->deadline = $request->get('deadline');
            $project->price = $c_price;

            if ($today >= $request->get('start_date')) {
                $project->status = 0;
            }elseif($today < $request->get('start_date')){
                $project->status = 2;
            }

            $project->save();
            DB::commit();

            return redirect()->route('project/view')->with('success', 'Information has been added');
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
        $tasks = Task::where('project_id', '=', $id)->get();
        if ($tasks) {
            foreach($tasks as $tsk){
                $task = Task::find($tsk->id);
                $task->delete();
            }

        }
        $project = \App\Project::find($id);
        
        $project->delete();
        return redirect('admin')->with('success','Successfully deleted!');
    }

     public function views()
    {
      
        $project = DB::table('projects')
            ->leftJoin('clients', 'projects.client_id', '=', 'clients.id')
            ->leftJoin('agents', 'projects.agent_id', '=', 'agents.id')
            ->select('projects.*', 'clients.title as client', 'agents.name as recruiter')
            ->get();

        return view('project.view',compact('project'));
    }

    public function resume($id){
        $project = \App\Project::find($id);
        $today = Carbon::today();
        if($today > $project->deadline){
            $project->status = 4;
        } else if($today > $project->start_date && $today < $project->deadline){
            $project->status = 0;
        } elseif($today < $project->start_date){
            $project->status = 2;
        }

        $project->save();
        return redirect()->route('admin/projectDetails', $id);
    }

    public function pause($id){
        $project = \App\Project::find($id);
        $project['status'] = 3;
        $project->save();
        return redirect()->route('admin/projectDetails', $id);
    }

    public function complete($id){

        DB::beginTransaction();
        try{
            $project = Project::where('id',$id)->first();
            if (!empty($project)) {

                $today = Carbon::today()->toDateString(); //Today's date
                Project::where('id',$id)
                        ->update(['status' => 1,
                                   'deadline' => $today]); // marking it's end date to today's date
                $task = \App\Task::where('project_id', $id)->first();

                if(!empty($task)){
                    \App\Task::where('project_id', $id)
                        ->update(['status' => 1,
                                  'deadline' => $today]); //marking end date of task to today's date
                }
            }
            
            DB::commit();
            return redirect()->route('admin/projectDetails', $id);

        } catch  (Exception $e){
             DB::rollback();
        }
    }


    /* Calculating Total price minus Agent's Comission */

    public function calculatePrice($price, $id){
        $agent = \App\Agent::find($id);
        $share = $agent->share;

        $comission = ($share / 100) * $price;
        $c_price = $price - $comission;
        return $c_price;
    }
}
