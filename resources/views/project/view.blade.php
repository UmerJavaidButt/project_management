@extends("admin.manage")

@section('content')

<?php 
// echo "<pre>";
// var_dump($project);
// die();
?>

<div class="row wrapper border-bottom white-bg page-heading dashboard_projects_heading">
    <div class="col-sm-4">
        <h2>Project List</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><strong>Project List</strong></li>
        </ol>
    </div>
</div>

<div class="row">
  <div class="col-lg-12">
    <div class="wrapper wrapper-content animated fadeInUp">
      <div class="ibox">
        <div class="ibox-title">
          <h5><strong>List of Projects</strong></h5>
          <div class="ibox-tools">
            <a href="{{url('project/create')}}" class="btn-primary btn-xs create_new_project">Create New Project</a>
          </div>
        </div>

        @if($project->isEmpty())
          <span class="label label-danger">No Projects Found!</span>
        @else

          <div class="ibox-content">
            <div class="row m-b-sm m-t-sm">
              <div class="card-block">
                <div class="dt-responsive table-responsive">
                    <table id="footer-search" class="table table-striped table-bordered nowrap">
                      <thead>
                        <tr>
                          <th>Status</th>
                          <th>Project Title</th>
                          <th>Client</th>
                          <th>Action</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>

                      @if(empty($project))
                      <tr>
                        <td>{{('No Data Found')}}</td>
                      </tr>
                      @else
                        @foreach($project as $proj)

                        @php
                          $deadline=$proj->deadline;
                          $startdate = $proj->start_date;
                          @endphp
                        <tr>
                          @if($proj->status == 0)
                            <td> 
                              <span class="label label-primary">{{('In Progreess')}}</span>
                              <br>
                              <small>Created on: {{$startdate}}</small>
                            </td>
                          @elseif($proj->status == 1)
                            <td> 
                              <span class="label label-success">{{('Complete')}}</span>
                              <br>
                              <small>Completed on: {{$deadline}}</small>
                            </td>
                          @elseif($proj->status == 2)
                            <td> 
                              <span class="label label-info">{{('Upcoming')}}</span>
                              <br>
                              <small>Will Start on: {{$startdate}}</small>
                            </td>
                           @elseif($proj->status == 3)
                            <td> 
                              <span class="label label-warning">{{('Paused')}}</span>
                              <br>
                              <small>Created on: {{$startdate}}</small>
                            </td>
                           @elseif($proj->status == 4)
                          <td> 
                            <span class="label label-danger">{{('Late')}}</span>
                            <br>
                            <small>Created on: {{$startdate}}</small>
                          </td>
                          @endif
                          
                          <td><a href="{{action('AdminController@projectDetails', $proj->id)}}"> 
                            {{$proj->name}} 
                            <br>
                            <small>PROJECT URL: {{$proj->project_url}}</small>
                            </a>
                          </td>

                          <td>{{$proj->client}}</td>
                          
                          <td>
                            <a class="edit-modal btn btn-info btn_edit" href="{{action('ProjectController@edit', $proj->id) }}">
                              <span class="glyphicon glyphicon-edit"></span> Edit
                            </a>
                          </td>
                          <td>
                            <form action="{{action('ProjectController@destroy', $proj->id)}}" method="post">
                              {!! csrf_field() !!}
                              <input name="_method" type="hidden" value="DELETE">
                              <button class="btn btn-danger btn_delete" type="submit">
                                <span class="glyphicon glyphicon-trash"></span>Delete
                              </button>
                            </form>
                          </td>
                        </tr>
                      @endforeach
                    @endif
                      </tbody>
                      <tfoot>
                        <tr>
                          <th>Status</th>
                          <th>Project Title</th>
                          <th>Client</th>                          
                          <th>Action</th>
                          <th></th>
                          <!-- <th>Start date</th>
                          <th>Salary</th> -->
                        </tr>
                      </tfoot>
                    </table>
                </div>
              </div>
            </div>
          </div>

        @endif
      </div>
    </div>
  </div>
</div>
@endsection