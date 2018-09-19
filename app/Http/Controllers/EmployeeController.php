<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;
use DB;
use App\Employee;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $employees = \App\Employee::all();

        // return view ('employees.index', array('employees' => $employees));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $designation = \App\Designation::all();
        return view('employees.create', compact('teams', 'designation'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $employee = new \App\Employee;

        $employee->name = $request->get('name');
        $employee->email = $request->get('email');
        $employee->number = $request->get('number');
        $employee->teamAssign = 0;
        $employee->team_id = 0;
        $employee->designation_id = $request->get('designation');

        $employee->save();

        return redirect()->route('employee/view')->with('success', 'Information has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = DB::table('employees')
                                        ->leftjoin('designations', 'employees.designation_id', '=', 'designations.id')
                                        ->leftjoin('teams', 'employees.team_id', '=', 'teams.id')
                                        ->select('employees.*', 'designations.designation as designationName', 'teams.name as team')
                                        ->where('employees.id', '=', $id)
                                        ->first();
        $teams = \App\Team::all();
        $designation = \App\Designation::all();
        return view('employees.edit', compact('employee', 'designation', 'teams' ,'id'));
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
        $employee = \App\Employee::find($id);
        $employee->name = $request->get('name');
        $employee->number = $request->get('number');
        $employee->email = $request->get('email');
        $employee->designation_id =  $request->get('designation');

        $employee->save();

        return redirect('admin')->with('success', 'Information has been added');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = \App\Employee::find($id);
        $client->delete();
        return redirect('admin')->with('success','Information has been  deleted');
    }

    /* Sending Data to EMployee's View */

    public function views()
    {
        $employees = Employee::with('designation')->get();
        return view('employees.view',compact('employees'));
    }

    public function details($id){
        $employee = Employee::with('designation')
                                            ->where('id', '=', $id)
                                            ->first();
        return view('employees.details', compact('employee'));
    }
}
