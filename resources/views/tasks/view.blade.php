@extends("admin.manage")

@section('content')

<div class="row wrapper border-bottom white-bg page-heading dashboard_projects_heading">
    <div class="col-sm-4">
       <h2>Tasks</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><strong>Tasks</strong></li>
        </ol>
    </div>
</div>

<div class="justify-content-center">
  <div class="row">
    <div class="col-lg-12">
      <div class="wrapper wrapper-content animated fadeInUp">
        <div class="ibox">
          <div class="ibox-title">
            <h5><strong>The List of Tasks</strong></h5>
            <div class="ibox-tools">
              <a href="{{ url('task/create') }}" class="btn-primary btn-xs create_new_project">Create New Task</a>
            </div>
          </div>

          @if($tasks->isEmpty())
            <span class="label label-danger">No Record Found!</span>
          @else

          <div class="ibox-content">
            <div class="row m-b-sm m-t-sm">
              <div class="card-block admin_projects_page">
                <div class="dt-responsive table-responsive">
                  <table id="footer-search" class="table table-striped table-bordered nowrap">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Project</th>
                        <th>Description</th>                    
                        <th>Action</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($tasks as $task)
                        
                        <tr>
                          <td>
                            {{$task->name}}
                            <small>Created on: {{$task->start}}</small>
                          </td>
                          <td>{{$task->project}}</td>
                          <td>{{$task->description}}</td>
                          
                          <td>
                            <a href="{{action('TaskController@edit', $task->id)}}" class="edit-modal btn btn-info btn_edit">
                            <span class="glyphicon glyphicon-edit"></span>Edit
                            </a>
                          </td>
                          <td>
                            <form action="{{action('TaskController@destroy', $task->id)}}" method="post">
                              {!! csrf_field() !!}
                              <input name="_method" type="hidden" value="DELETE">
                              <button class="btn btn-danger btn_delete" type="submit">
                                <span class="glyphicon glyphicon-trash"></span>Delete
                              </button>
                            </form>
                          </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Name</th>
                        <th>Project</th>
                        <th>Description</th>
                        <th></th>
                        <th></th>

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
</div>
@endsection