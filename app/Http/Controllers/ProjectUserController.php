<?php

use App\ProjectUser;

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;
use \App\Project;

class ProjectUserController extends Controller
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
    public function create($id)
    {
        $project = Project::where('id', '=', $id)
                            ->first();
        
        $teams = \App\Team::all();

        return view('projectuser.create', compact('project', 'teams'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = $request->validate([
            'project' => 'bail|required|numeric',
            'team' => 'required|numeric',
        ]);

        $projectassign = Project::where('id', '=', $request->get('project'))
                                ->update(['assign' => 1]);


        $projectuser = new \App\ProjectUser;

        $projectuser->project_id = $request->get('project');
        $projectuser->team_id = $request->get('team');

        $projectuser->save();

        return redirect()->route('admin/projectDetails', $request->get('project'))->with('success', 'Project Successfully Assigned');
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
        $projectuser = DB::table('project_users')
                                            ->join('projects', 'project_users.project_id', '=', 'projects.id')
                                            ->join('teams', 'project_users.team_id', '=', 'teams.id')
                                            ->select('project_users.*', 'teams.name as team', 'projects.name as project')
                                            ->where('project_users.id', '=', $id)
                                            ->first();

        $projects = \App\Project::all();
        $teams = \App\Team::all();

        return view ('projectuser.edit', compact('projectuser', 'projects', 'teams', 'id'));
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
        $projectassign = DB::table('projects')
                                            ->where('id', '=', $request->get('project'))
                                            ->update([
                                                'assign'=> 1,
                                                'team' => $request->get('team')
                                            ]);

        $projectuser = \App\ProjectUser::find($id);

        $projectuser->project_id = $request->get('project');
        $projectuser->team_id = $request->get('team');

        $projectuser->save();
                                            
        return redirect('admin')->with('success', 'Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $projectuser = \App\ProjectUser::find($id);
        $projectuser->dellete();
        return redirect('admin')->with('success', 'Data Deleted Successfully');
    }

    public function view(){
        $projectusers = DB::table('project_users')
                                            ->join('projects', 'project_users.project_id', '=', 'projects.id')
                                            ->join('teams', 'project_users.team_id', '=', 'teams.id')
                                            ->select('project_users.*', 'teams.name as team', 'projects.name as project')
                                            ->get();

        return view('projectuser.view', compact('projectusers'));
    }
}
