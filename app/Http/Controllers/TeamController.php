<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;
use DB;
use \App\Employee;
use \App\Team;
use \App\TeamMember;
use \App\ProjectUser;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
    {
        $this->middleware('auth');
    }

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
        $des = \App\Designation::where('designation', 'like', '%team%')->orWhere('designation', 'like', '%lead%')->first();
        $teamleads = Employee::with('designation')
                                ->where([
                                    ['designation_id', '=', $des->id ],
                                    ['teamAssign', '=', 0],
                                    ])
                                ->get();

        return view('teams.create', compact('teamleads'));
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
            'team_lead' => 'bail|required|numeric',
            'shift' => 'bail|required|numeric',
        ]);

        $team = new \App\Team;

        $team->name = $request->get('name');
        $team->team_lead = $request->get('team_lead');
        $team->shift = $request->get('shift');

        $team->save();

        $employee = \App\Employee::find($request->get('team_lead'));
        $employee->teamAssign = 1;
        $employee->save();

        return redirect()->route('team/view')->with('success', 'Information has been added');
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
        $des = \App\Designation::where('designation', 'like', '%team%')->orWhere('designation', 'like', '%lead%')->first();
        $teamleads = Employee::with('designation')
                                ->where('designation_id', '=', $des->id)
                                ->get();

        $team = DB::table('teams')
                                ->select('teams.*')
                                ->where('teams.id', '=', $id)
                                ->first();

        return view ('teams.edit', compact('team', 'teamleads', 'id'));
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
        $validator = $request->validate([
            'team_lead' => 'bail|required|numeric',
            'shift' => 'bail|required|numeric',
        ]);
        
        $team = \App\Team::find($id);
        $team->name = $request->get('name');
        $team->team_lead = $request->get('team_lead');
        $team->shift = $request->get('shift');

        $team->save();

        return redirect()->route('team/view')->with('success', 'Information has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $team = \App\Team::find($id);
        $team->delete;
        return redirect('admin')->with('success','Information has been  deleted');
    }

    public function view(){
        $teams = DB::table('teams')
                                ->join('employees', 'teams.team_lead', '=', 'employees.id')
                                ->select('teams.*', 'employees.name as teamlead')
                                ->get();
        return view('teams.view',compact('teams'));
    }

    public function details($id){
        $team = Team::with('employee')
                                ->where('id', '=', $id)
                                ->first();

        $members = TeamMember::with('employees', 'employees.designation')
                                    ->where('team_id', '=', $id)
                                    ->get();

        $projects = ProjectUser::with('projects')
                                ->where('team_id', '=', $id)
                                ->get();

        $numberofprojects = ProjectUser::with('projects')
                                ->where('team_id', '=', $id)
                                ->count();
        
        return view ('teams.details', compact('team', 'members', 'projects', 'numberofprojects'));

    }
}
