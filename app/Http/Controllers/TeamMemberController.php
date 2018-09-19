<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Validator;

use App\TeamMember;
use Illuminate\Http\Request;
use \App\Employee;
use DB;

class TeamMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('teammembers.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $employees = Employee::with('designation')
                                        ->where('teamAssign', '=', '0')
                                        ->get();

       $teams = \App\Team::all();

       return view ('teammembers.create', compact('employees', 'teams'));
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
            'employee_id' => 'bail|required|numeric',
            'team_id' => 'required|numeric',
        ]);

        $employees = \App\Employee::find($request->get('employee_id'));
        $employees->team_id = $request->get('team_id');
        $employees->teamAssign = 1;
        $employees->save();

        $teammembers = new \App\TeamMember;
        $teammembers->team_id = $request->get('team_id');
        $teammembers->employee_id = $request->get('employee_id');
        $teammembers->save();

        return redirect('admin')->with('success', 'Information has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TeamMember  $teamMember
     * @return \Illuminate\Http\Response
     */
    public function show(TeamMember $teamMember)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TeamMember  $teamMember
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employees = \App\Employee::all();
        $teams = \App\Team::all();
        $teammembers = DB::table ('team_members')
                                        ->leftJoin('employees', 'team_members.employee_id', '=', 'employees.id')
                                        ->leftJoin('teams', 'team_members.team_id', '=', 'teams.id')
                                        ->select('team_members.*', 'employees.name as employee', 'teams.name as team')
                                        ->where('team_members.id', '=', $id)
                                        ->first();
        return view('teammembers.edit', compact('teammembers', 'employees', 'teams', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TeamMember  $teamMember
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $employees = \App\Employee::find($request->get('employee_id'));
        $employees->team_id = $request->get('team_id');
        $employees->teamAssign = 1;
        $employees->save();
        
        $teammembers = \App\TeamMember::find($id);

        $teammembers->team_id = $request->get('team_id');
        $teammembers->employee_id = $request->get('employee_id');
        $teammembers->save();

        return redirect('admin')->with('success', 'Information has been added');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TeamMember  $teamMember
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teammember = \App\TeamMember::find($id);

        $teammember->delete();
        return redirect('admin')->with('success', 'Information has been added');
    }

    public function view(){
        $teammembers = DB::table ('team_members')
                                        ->join('employees', 'team_members.employee_id', '=', 'employees.id')
                                        ->join('teams', 'team_members.team_id', '=', 'teams.id')
                                        ->select('team_members.*', 'employees.name as employee', 'teams.name as team')
                                        ->get();
        return view('teammembers.view', compact('teammembers'));
    }
}
