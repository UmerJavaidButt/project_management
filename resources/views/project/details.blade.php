@extends("admin.manage")

@section('content')

<?php
// echo "<pre>"; 
// var_dump($tasks);
// die();
//
?>

<div class="row wrapper border-bottom white-bg page-heading dashboard_projects_heading">
    <div class="col-sm-10">
        <h2>Project Details for {{$projects->name}}</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><strong>Project Details</strong></li>
        </ol>
    </div>
</div>

      <div class=" dashboard_project_details row">
        <div class="col-md-9">
          <div class="card">
            <div class="card-body">

              <div class="row">
                <div class="col-lg-12">
                  <!-- System clock start -->
                    <div class="col-lg-12">
                        <div class="card borderless-card">
                            <div class="card-block clock-widget widget-clock">
                                <div id="current-time"></div>
                                <h1 class="message"></h1>
                                <h5>
                                <span class="start_date"></span>
                                <span class="deadline"></span>
                                </h5>
                                <i class="icofont icofont-ui-alarm basic-alarm"></i>
                                <i class="icofont icofont-ui-alarm bg-alarm"></i>
                            </div>
                        </div>
                    </div>
                  <!-- System clock end -->
                </div>
              </div>

              <div class="row">
                <div class="col-lg-12">
                  <div class="wrapper wrapper-content">
                    <div class="ibox">
                      <div class="col-lg-12">
                        <div class="m-b-md">
                        @if($projects->status != 1)
                          <a href="{{action('ProjectController@edit', $projects->id) }}" class="btn btn-info btn_edit float-right">Edit Project</a>
                          @if($projects->status == 0 || $projects->status == 3 || $projects->status == 4)
                            <a href="{{action('ProjectController@complete', $projects->id)}}" class="btn btn-success btn_edit">Mark as Complete</a>
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
                        @if($projects->status == 0)
                        <span class="label label-primary">
                          {{('In Progress')}}
                        </span>
                        @elseif($projects->status == 1)
                        <span class="label label-success">
                          {{('Completed')}}
                        </span>
                        @elseif($projects->status == 2)
                        <span class="label label-info">
                          {{('Upcoming')}}
                        </span>
                        @elseif($projects->status == 3)
                        <span class="label label-warning">
                          {{('Paused')}}
                        </span>
                        @elseif($projects->status == 4)
                        <span class="label label-danger">
                          {{('Late')}}
                        </span>
                        @endif
                      </dd>
                    </div>
                  </div>

                  <div class="row mb-0">
                    <div class="col-sm-4 text-sm-right">
                      <dt>Client</dt>
                    </div>

                    <div class="col-sm-8 text-sm-left">
                      <dd class="mb-1">
                        <a href="{{route('client/details', $projects->clientID)}}" class="text-navy">{{$projects->client}}</a>
                      </dd>
                    </div>
                  </div>

                  <div class="row mb-0">
                    <div class="col-sm-4 text-sm-right">
                      <dt>Project URL</dt>
                    </div>

                    <div class="col-sm-8 text-sm-left">
                      <dd class="mb-1">
                        {{$projects->project_url}}
                      </dd>
                    </div>
                  </div>

                   <div class="row mb-0">
                    <div class="col-sm-4 text-sm-right">
                      <dt>Agent</dt>
                    </div>

                    <div class="col-sm-8 text-sm-left">
                      <dd class="mb-1">
                        {{$projects->agent}}
                      </dd>
                    </div>
                  </div>

                  <div class="row mb-0">
                    <div class="col-sm-4 text-sm-right">
                      <dt>Team</dt>
                    </div>

                    <div class="col-sm-8 text-sm-left">
                      <dd class="mb-1">
                        @if($projects->teamID)
                          <a href="{{route('team/details', $projects->teamID)}}" class="text-navy">{{$projects->teamName}}</a>
                        @else
                          <a href="{{route('assign/team', $projects->id)}}" class="label label-primary">Assign Team</a>
                        @endif
                      </dd>
                    </div>
                  </div>
                </div>
                
                <div class="col-lg-6">
                  <div class="row mb-0">
                    <div class="col-sm-8 text-sm-right">
                      <dt>Start Date</dt>
                    </div>

                    <div class="col-sm-4 text-sm-left">
                      <dd class="mb-1">
                        {{$projects->start_date}}
                      </dd>
                    </div>
                  </div>

                  <div class="row mb-0">
                    <div class="col-sm-8 text-sm-right">
                      <dt>End Date</dt>
                    </div>

                    <div class="col-sm-4 text-sm-left">
                      <dd class="mb-1">
                        {{$projects->deadline}}
                      </dd>
                    </div>
                  </div>

                  <div class="row mb-0">
                    <div class="col-sm-8 text-sm-right">
                      <dt>Price ($)</dt>
                    </div>

                    <div class="col-sm-4 text-sm-left">
                      <dd class="mb-1">
                        {{$projects->price}}
                      </dd>
                    </div>
                  </div>

                  <div class="row mb-0">
                    <div class="col-sm-8 text-sm-right">
                      <dt>Released Payment ($)</dt>
                    </div>

                    <div class="col-sm-4 text-sm-left">
                      <dd class="mb-1">
                        {{$projects->released_payment}}
                      </dd>
                    </div>
                  </div>

                  <div class="row mb-0">
                    <div class="col-sm-8 text-sm-right">
                      <dt>Pending Payment ($)</dt>
                    </div>

                    <div class="col-sm-4 text-sm-left">
                      <dd class="mb-1">
                        {{$projects->pending_payment}}
                      </dd>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row m-t-sm">
                <div class="col-lg-12">
                  <div class="panel blank-panel">
                    <div class="panel-heading">
                      <div class="panel-options">
                        <ul class="nav nav-tabs">
                          <li>
                            <a href="javascript:void(0)" class="nav-link active show">
                              <strong>Tasks</strong>
                            </a>
                          </li>
                          @if($projects->status != 1)
                          <span class="pull-right">
                            <a href="{{route('create/task', $projects->id)}}" class="nav-link btn btn_submit">
                              Create New Task for this Project
                            </a>
                          </span>
                          @endif
                        </ul>
                      </div>
                    </div>

                    <div class="panel-body">
                      <div class="tab-content">
                        <div class="tab-pane active show">
                          
                          <table class="table table-striped table-bordered nowrap">
                            <thead>
                              <tr>
                                <th>Status</th>
                                <th>Title</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach ($tasks as $task)
                              <tr>
                                @if($task->status == 0)
                                <td>
                                  <span class="label label-primary">{{('Ongoing')}}</span>
                                </td>
                                @elseif($task->status == 1)
                                <td>
                                  <span class="label label-success">{{('Completed')}}</span>
                                </td>
                                @elseif($task->status == 2)
                                <td>
                                  <span class="label label-info">{{('Upcoming')}}</span>
                                </td>
                                @elseif($task->status == 3)
                                <td>
                                  <span class="label label-warning">{{('Paused')}}</span>
                                </td>
                                @endif

                                <td><a href="{{route('task/details', $task->id)}}">{{$task->name}}</a></td>
                                <td>{{$task->start}}</td>
                                <td>{{$task->deadline}}</td>

                              </tr>
                            @endforeach
                            </tbody>
                          </table>

                        </div>
                      </div>
                    </div>
                   </div> 
                  </div>
                </div>
              </div>

              <!-- Milestones -->

              <div class="row m-t-sm">
                <div class="col-lg-12">
                  <div class="panel blank-panel">
                    <div class="panel-heading">
                      <div class="panel-options">
                        <ul class="nav nav-tabs">
                          <li>
                            <a href="javascript:void(0)" class="nav-link active show">
                              <strong>Milestones</strong>
                            </a>
                          </li>
                          @if($projects->status != 1)
                          <span class="pull-right">
                            <a href="{{route('create/milestone', $projects->id)}}" class="nav-link btn btn_submit">
                              Add a Milestone
                            </a>
                          </span>
                          @endif
                        </ul>
                      </div>
                    </div>

                    <div class="panel-body">
                      <div class="tab-content">
                        <div class="tab-pane active show">
                          
                          <table class="table table-striped table-bordered nowrap">
                            <thead>
                              <tr>
                                <th>Status</th>
                                <th>Title</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach ($milestones as $milestone)
                              <tr>
                                @if($milestone->status == 0)
                                <td>
                                  <span class="label label-primary">{{('Not Released')}}</span>
                                </td>
                                @elseif($milestone->status == 1)
                                <td>
                                  <span class="label label-warning">{{('Secondary Released')}}</span>
                                </td>
                                @elseif($milestone->status == 2)
                                <td>
                                  <span class="label label-success">{{('Final Released')}}</span>
                                </td>
                                @endif

                                <td>
                                  <a href="{{route('milestone/edit', $milestone->id)}}">{{$milestone->name}}</a>
                                  <br>
                                  <small>Created on: {{$milestone->date}}</small>
                                </td>
                                <td>
                                @if($milestone->status == 1)
                                  <a href="{{route('milestone/release', $milestone->id)}}" class="btn btn-success btn_edit">FinalRelease</a>
                                  <p><small class="label label-warning">Release will be in Pakistan Office</small></p>
                                @elseif($milestone->status == 2)
                                <button type="button" class="btn btn-success btn_edit" disabled>Released</button>
                                <p><small class="label label-success">Released in Pakistan Office.</small></p>
                                @elseif($milestone->status == 0)
                                  <a href="{{route('milestone/release', $milestone->id)}}" class="btn btn-success btn_edit">Secondary Release</a>
                                  <p><small class="label label-info">Release will be in Australian Office</small></p>
                                @endif
                                </td>
                              </tr>
                            @endforeach
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div> 
         

      <div class="col-md-3">
        <div class="wrapper project-manager">
          <h4><small>Project description</small></h4>
          <p class="small">{{$projects->description}}</p>
          @if($projects->status == 0)
          <h4><small>Change the project status</small></h4>
          <div class="row">  
            <div class="col-lg-6">
              <a href="{{action('ProjectController@pause', $projects->id) }}" class="btn btn-danger btn_edit stop"> Pause </a>
            </div>
          </div>
          @elseif($projects->status == 3)
          <h4><small>Change the project state</small></h4>
          <div class="row">  
            <div class="col-lg-6">
              <a href="{{action('ProjectController@resume', $projects->id) }}" class="btn btn-success btn_edit resume"> Resume </a>
            </div>
          </div>
          @endif
        </div>
      </div>
      </div>
      


<script type="text/javascript">
  var deadline = "<?php echo $projects->deadline; ?>";
  var start = "<?php echo $projects->start_date; ?>";
  var status = "<?php echo $projects->status; ?>"; 
</script>
  
@endsection