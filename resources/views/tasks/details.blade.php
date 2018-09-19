@extends("admin.manage")

@section('content')

<?php
// echo "<pre>"; 
// var_dump($task);
// die();
?>
@if(empty($task) )
<div class="row wrapper border-bottom white-bg page-heading dashboard_projects_heading">
    <div class="col-sm-10">
        <h2>No Details found</h2>
    </div>
</div>
@else
<div class="col-md-6">
 @if ($errors->any())
      <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first() }}</strong>
      </span>
  @endif
</div>


  <div class="row wrapper border-bottom white-bg page-heading dashboard_projects_heading">
      <div class="col-sm-10">
          <h2>Details for {{$task->name}}</h2>
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
              <li class="breadcrumb-item"><strong>Task Details</strong></li>
          </ol>
      </div>
  </div>

 


  <div class="justify-content-center dashboard_project_details row">
    <div class="col-lg-9">
      <div class="card">
        <div class="card-body">

          <div class="row">
            <div class="col-lg-12">
              <!-- System clock start -->
                <div class="col-lg-12">
                    <div class="card borderless-card">
                        <div class="card-block clock-widget widget-clock">
                            <div id="current-time"></div>
                            <h1 class="message task_message"></h1>
                            <h5>
                            <span class="task_start_date"></span>
                            <span class="task_deadline"></span>
                            </h5>
                            <i class="icofont icofont-ui-alarm basic-alarm"></i>
                            <i class="icofont icofont-ui-alarm bg-alarm"></i>
                        </div>
                    </div>
                </div>
              <!-- System clock end -->
            </div>
          </div>

          <!-- Edit Task and Mark as Complete button -->
          <div class="row">
            <div class="col-lg-12">
              <div class="wrapper wrapper-content">
                <div class="ibox">
                  <div class="col-lg-12">
                    <div class="m-b-md">
                    @if($task->status != 1)
                      <a href="{{action('TaskController@edit', $task->id)}}" class="btn btn-info btn_edit btn-xs float-right">Edit Task</a>
                      @if($task->status == 0 || $task->status == 3)
                      ` <a href="{{action('TaskController@complete', $task->id)}}" class="btn btn-success btn_edit">Mark as Complete</a>
                      @endif
                    @endif
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-6">
              <div class="row mb-0">
                <div class="col-sm-4 text-sm-right">
                  <dt>Status</dt>
                </div>

                <div class="col-sm-8 text-sm-left">
                  <dd class="mb-1">
                    @if($task->status == 0)
                    <span class="label label-primary">
                      {{('In Progress')}}
                    </span>
                    @elseif($task->status == 1)
                    <span class="label label-success">
                      {{('Completed')}}
                    </span>
                    @elseif($task->status == 2)
                    <span class="label label-info">
                      {{('Upcoming')}}
                    </span>
                    @elseif($task->status == 3)
                    <span class="label label-warning">
                      {{('Paused')}}
                    </span>
                    @elseif($task->status == 4)
                    <span class="label label-danger">
                      {{('Late')}}
                    </span>
                    @endif
                  </dd>
                </div>
              </div>

              <div class="row mb-0">
                <div class="col-sm-4 text-sm-right">
                  <dt>Project Name</dt>
                </div>

                <div class="col-sm-8 text-sm-left">
                  <dd class="mb-1">
                    <a href="{{route('admin/projectDetails', $task['project']['id'])}}" class="text-navy">
                      {{$task['project']['name']}}
                    </a>
                  </dd>
                </div>
              </div>

              <div class="row mb-0">
                <div class="col-sm-4 text-sm-right">
                  <dt>Project URL</dt>
                </div>

                <div class="col-sm-8 text-sm-left">
                  <dd class="mb-1">
                    {{$task['project']['project_url']}}
                  </dd>
                </div>
              </div>

              <div class="row mb-0">
                <div class="col-sm-4 text-sm-right">
                  <dt>Task Name</dt>
                </div>

                <div class="col-sm-8 text-sm-left">
                  <dd class="mb-1">
                    <span class="text-navy">
                      {{$task->name}}
                    </span>
                  </dd>
                </div>
              </div>

               <div class="row mb-0">
                <div class="col-sm-4 text-sm-right">
                  <dt>Assigned to</dt>
                </div>

                <div class="col-sm-8 text-sm-left">
                  <dd class="mb-1">
                    @if( empty($taskuser) )
                      <a href="{{route('assign_task', $task->id)}}" class="label label-primary">
                        Assign Task
                      </a>
                    @else
                    <a href="{{route('employee/details', $taskuser->employee['id'])}}">
                      {{$taskuser->employee['name']}}
                    </a>
                    @endif
                  </dd>
                </div>
              </div>
            </div>
            
            <div class="col-lg-6">
              <div class="row mb-0">
                <div class="col-sm-8 text-sm-right">
                  <dt>Created on</dt>
                </div>

                <div class="col-sm-4 text-sm-left">
                  <dd class="mb-1">
                    {{$task->start}}
                  </dd>
                </div>
              </div>

              <div class="row mb-0">
                <div class="col-sm-8 text-sm-right">
                  <dt>Expected to End by</dt>
                </div>

                <div class="col-sm-4 text-sm-left">
                  <dd class="mb-1">
                    {{$task->deadline}}
                  </dd>
                </div>
              </div>
            </div>
          </div>
      </div> 
    </div>
  </div>

    <div class="col-lg-3">
      <div class="wrapper project-manager">
        <h4><small>Task description</small></h4>
        <p class="small">{{$task->description}}</p>
        @if($task->status == 0)
        <h4><small>Change the task status</small></h4>
        <div class="row">  
          <div class="col-lg-6">
            <a href="{{route('task/pause', $task->id)}}" class="btn btn-danger btn_edit task_stop"> Pause </a>
          </div>
        </div>
        @elseif($task->status == 3)
        <h4><small>Change the task state</small></h4>
        <div class="row">  
          <div class="col-lg-6">
            <a href="{{route('task/resume', $task->id)}}" class="btn btn-success btn_edit task_resume"> Resume </a>
          </div>
        </div>
        @endif
      </div>
    </div>
  </div>

<script type="text/javascript">
  var task_deadline = "<?php echo $task->deadline;  ?>";
  var task_start = "<?php echo $task->start; ?>";
  var task_status = "<?php echo $task->status; ?>";
</script>

@endif
  
@endsection