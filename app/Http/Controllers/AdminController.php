<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Admin;
use Auth;
use App\Http\Requests;
use DB;
use App\Project;
use App\Task;
use App\Clients;
use Carbon\Carbon;
use Session;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function agent(){
        echo "Agent";
    }

	public function admin()
    {
        $upcomingProjects = Project::where('status', '=', 2)->count();

        $pendingProjects = Project::where('status', '=', 0)->orWhere('status', '=', 4)->count();

        $completedProjects = Project::where('status', '=', 1)->count();

        $pausedProjects = Project::where('status', '=', 3)->count();

        $projectTimeline = Project::where('status', '!=', 1)
                                    ->orderBy('start_date', 'asc')
                                    ->get();

        /* What's Today */
        $today = Carbon::today();
        $todays['project_deadline'] = Project::where('deadline', $today)->get();
        $todays['project_start'] = Project::where('start_date', $today)->get();

        $todays['task_deadline'] = Task::where('deadline', $today)->where('status', '<>', '1')->get();
        $todays['task_start'] = Task::where('start', $today)->where('status', '<>', '1')->get();

        $todays['late_project'] = Project::where('deadline', '<', $today)->get();
        $todays['late_task'] = Task::where('deadline', '<', $today)->get();

    	return view ('admin.dashboard', compact('projectTimeline', 'pausedProjects', 'upcomingProjects', 'pendingProjects', 'completedProjects', 'todays'));
    }

    public function add_project(){
    	return view ('/admin.add_project');
    }

    public function pausedProjects(){
        $cetagory = 3;
        $projects = Project::where('status', 3)->get();

        return view('admin.projects', compact('projects', 'cetagory'));
    }

    public function openProjects(){
        $cetagory = 0;
        $projects = Project::where('status', 0)->orWhere('status', 4)->get();
        
        return view('admin.projects', compact('projects', 'cetagory'));
    }

    public function completeProjects(){
        $cetagory = 1;
        $projects = Project::where('status', 1)->get();
        
        return view('admin.projects', compact('projects', 'cetagory'));
    }

    public function upcomingProjects(){
        $cetagory = 2;
        $projects = Project::where('status', 2)->get();
        
        return view('admin.projects', compact('projects', 'cetagory'));
    }

    public function projectDetails($id){
        
        $this->updateState($id);
        
        $projects = DB::table('projects')
                                ->leftJoin('clients', 'projects.client_id', '=', 'clients.id')
                                ->leftJoin('project_users', 'projects.id', '=', 'project_users.project_id')
                                ->leftJoin('teams', 'project_users.team_id', '=', 'teams.id')
                                ->leftJoin('agents', 'projects.agent_id', '=', 'agents.id')
                                ->select('projects.*', 'teams.name as teamName', 'teams.id as teamID', 'clients.title as client', 'clients.id as clientID', 'agents.name as agent')
                                ->where('projects.id', '=', $id)
                                ->first();

        $tasks = DB::table('tasks')
                                ->leftJoin('task_users', 'task_users.task_id', '=', 'tasks.id')
                                ->leftJoin('employees', 'task_users.employee_id', '=', 'employees.id')
                                ->select('tasks.*', 'employees.name as employee')
                                ->where('tasks.project_id', '=', $id)
                                ->get();

        $milestones = \App\Milestone::where('project_id', '=', $id)->get();

        $released_payment = DB::table('milestones')
                                            ->where('project_id', '=', $id)
                                            ->where('status', '=', 1)
                                            ->sum('cost');

        //$pending_payment = $projects->price - $released_payment;


        return view('project.details', compact('projects', 'tasks', 'milestones'));
    }

    public static function updateState($id){
        $today = Carbon::today();
        $p = \App\Project::find($id);
        
        if ($p['status'] == 1) {
            return;
        }
        if ($p['deadline'] < $today && $p['status'] != 3 && $p['status'] != 4) {
            $p['status'] = 4;
            $p->save();
            return;
        } elseif ($p['start_date'] < $today && $p['deadline'] > $today && $p['status'] != 3) {
            $p['status'] = 0;
            $p->save();
            return;
        } elseif ($p['start_date'] > $today) {
            $p['status'] = 2;
            $p->save();
            return;
        }
    }

    public function client_details($id){
        $client = ClientPortal::where('id', $id)->first();

        return view('admin.client_details', compact('client'));
    }
}