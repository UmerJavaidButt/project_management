<?php
namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Task;
use App\TaskUser;
use App\Project;
use DB;
use Carbon\Carbon;

class TaskController extends Controller
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
        $projects = Project::where('projects.status', '!=', '1')
                            ->get();
        
        return view('tasks.create', 
            array(
                'projects' => $projects,
            ));
    }

    public function createTask($id){
        $project = Project::find($id);
        return view ('tasks.create', compact('project'));
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
            $today = Carbon::today();

            $validator = Validator::make($request->all(), [
                'start_date' => 'required|date|date_format:Y-m-d|after:yesterday',
                'deadline' => 'required|date|date_format:Y-m-d|after:start_date',
            ])->validate();

            $task = new \App\Task;

            $task->name = $request->get('name');
            $task->description = $request->get('description');
            $task->start = $request->get('start_date');
            $task->deadline = $request->get('deadline');
            //$task->employee_id = 0;
            $task->project_id = $request->get('project_id');
            $task->assign = 0;
            if ($today >= $task->start) {
                $task->status = 0;
            }elseif($today < $task->start){
                $task->status = 2;
            }elseif ($today > $task->deadline) {
                $task->status = 4;
            }


            $task->save();
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
    public function edit($id)
    {
        $tasks = Task::with('project')
                                ->where('id', '=', $id)
                                ->first();        
        
        return view('tasks.edit', compact('tasks', 'id'));
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
        $validator = Validator::make($request->all(), [
            'start_date' => 'required|date|date_format:Y-m-d|after:yesterday',
            'deadline' => 'required|date|date_format:Y-m-d|after:start_date',
        ])->validate();

        $today = Carbon::today();
        $task = \App\Task::find($id);

        $task->name = $request->get('name');
        $task->description = $request->get('description');
        $task->start = $request->get('start_date');
        $task->deadline = $request->get('deadline');
        $task->project_id = $request->get('project_id');

        if ($today >= $request->get('start_date')) {
            $task->status = 0;
        }elseif($today < $request->get('start_date')){
            $task->status = 2;
        }

        $task->save();
        toast()->success('Successfully updated', 'Success')->timeOut(5000);
        return redirect('admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = \App\Task::find($id);

        $task->delete();
        return redirect('admin')->with('success', 'Information has been added');
    }

    public function view(){
        $tasks = DB::table('tasks')
                                ->leftJoin('projects', 'tasks.project_id', '=', 'projects.id')
                                ->select('tasks.*', 'projects.name as project')
                                ->get();
        
        return view('tasks.view',compact('tasks'));
    }

    public function details($id){
        $this->updateState($id);
        $task = Task::with('project')
                            ->where('id', '=', $id)
                            ->first();
        $taskuser = TaskUser::with('employee')
                                    ->where('task_id', '=', $id)
                                    ->first();

        return view('tasks.details', compact('task', 'taskuser'));
    }

    public function resume($id){
        $task = \App\Task::find($id);
        $today = Carbon::today();
        if($today > $task->deadline){
            $task->status = 4;
        } else if($today > $task->start && $today < $task->deadline){
            $task->status = 0;
        } elseif($today < $task->start){
            $task->status = 2;
        }

        $task->save();
        return redirect()->route('task/details', $id);
    }

    public function pause($id){
        $task = \App\Task::find($id);
        $task['status'] = 3;
        $task->save();
        return redirect()->route('task/details', $id);
    }

    public function complete($id){

        DB::beginTransaction();
        try{
            
            $today = Carbon::today()->toDateString(); //Today's Date
            $task = \App\Task::where('id', $id)->first();

            if(!empty($task)){
                \App\Task::where('id', $id)
                    ->update(['status' => 1,
                              'deadline' => $today]); //marking end date of task to today's date
            }
            
            DB::commit();
            $this->details($id);

        } catch  (Exception $e){
             DB::rollback();
        }
    }

    public static function updateState($id){
        $today = Carbon::today();
        $t = \App\Task::find($id);
        
        if ($t['status'] == 1) {
            return;
        }
        if ($t['deadline'] < $today && $t['status'] != 3 && $t['status'] != 4) {
            $t['status'] = 4;
            $t->save();
            return;
        } elseif ($t['start'] < $today && $t['deadline'] > $today && $t['status'] != 3) {
            $t['status'] = 0;
            $t->save();
            return;
        } elseif ($t['start'] > $today) {
            $t['status'] = 2;
            $t->save();
            return;
        }
    }

}
