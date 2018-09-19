<?php

use App\TaskUser;

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use Carbon\Carbon;

class TaskUserController extends Controller
{
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
        $task = \App\Task::find($id);

        if ($task) {
            
            $project = $task->project_id; // Getting Project ID from Task Table
            $team = \App\ProjectUser::where('project_id' , '=', $project)->first(); // Getting Project Details on basis of ID

            if ($team == null) {
                // Return back to previous page if no teams assigned to project
                return redirect()->back()->withErrors(['msg','Kindly Assign the Team to the Project']);
            }else {
                // find the employees in that team
                $employees = \App\Employee::where('team_id', '=', $team->team_id)->get();
                
                if ($employees == null) {
                    //if no employees found, back to previous page
                    return redirect()->back()->withErrors(['msg', 'No Employees Found']);
                } else{
                    return view('taskuser.create', compact('employees', 'task'));
                }
            }

        }
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
            $taskuser = new \App\TaskUser;

            $taskuser->employee_id = $request->get('employee');
            $taskuser->task_id = $request->get('task');

            $taskuser->save();

            $today = Carbon::today();
            $tasks = \App\Task::find($request->get('task'));
            $tasks->assign = 1;

            if ($today >= $tasks->start) {
                $tasks->status = 0;
            } elseif($today < $tasks->start){
                $tasks->status = 2;
            }

            $tasks->save();
            DB::commit();
            return redirect()->route('task/details', $request->get('task') )->with('success', 'Information has been added');
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
         $employees = \App\Employee::all();
         $tasks = \App\Task::all();

         $taskusers = DB::table('task_users')
                                ->leftJoin('employees', 'task_users.employee_id', '=', 'employees.id')
                                ->leftJoin('tasks', 'task_users.task_id', '=', 'tasks.id')
                                ->select('task_users.*', 'employees.name as employee', 'tasks.name as task')
                                ->where('task_users.id', '=', $id)
                                ->first();

        return view ('taskuser.edit', compact('taskusers', 'employees', 'tasks', 'id'));
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
        $taskuser = \App\TaskUser::find($id);

        $taskuser->employee_id = $request->get('employee');
        $taskuser->task_id = $request->get('task');

        $taskuser->save();

        $today = Carbon::today();

        /* Checking if the employee has changed in Tasks table */

        $tasks = \App\Task::find($request->get('task'));
        
        if( $tasks->employee_id != $request->get('employee') ){
            $tasks->employee_id = $request->get('employee');
        }

        $tasks->assign = 1;
        if ($today >= $tasks->start) {
            $tasks->status = 0;
        } elseif($today < $tasks->start){
            $tasks->status = 2;
        }
        $tasks->save();

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
        //
    }

    public function view(){

        $taskusers = DB::table('task_users')
                                ->leftJoin('employees', 'task_users.employee_id', '=', 'employees.id')
                                ->leftJoin('tasks', 'task_users.task_id', '=', 'tasks.id')
                                ->leftJoin('team_members', 'team_members.employee_id', '=', 'task_users.employee_id')
                                ->leftJoin('teams', 'teams.id', '=', 'team_members.team_id')
                                ->leftJoin('projects', 'tasks.project_id', '=', 'projects.id')
                                ->select('task_users.*', 'employees.name as employee', 'tasks.name as task', 'teams.name as team', 'projects.name as project')
                                ->get();
        return view('taskuser.view', compact('taskusers', 'members'));
    }
}
