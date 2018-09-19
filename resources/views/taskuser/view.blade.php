@extends("admin.manage")

@section('content')

<div class="row wrapper border-bottom white-bg page-heading dashboard_projects_heading">
    <div class="col-sm-4">
       <h2> Assigned Tasks</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><strong>Assigned Tasks</strong></li>
        </ol>
    </div>
</div>

<div class="justify-content-center">
  <div class="row">
    <div class="col-lg-12">
      <div class="wrapper wrapper-content animated fadeInUp">
        <div class="ibox">
          <div class="ibox-title">
            <h5><strong>Tasks Assigned to Employees</strong></h5>
          </div>

          @if($taskusers->isEmpty())
            <span class="label label-danger">No Record Found!</span>
          @else

          <div class="ibox-content">
            <div class="row m-b-sm m-t-sm">
              <div class="card-block admin_projects_page">
                <div class="dt-responsive table-responsive">
                  <table id="footer-search" class="table table-striped table-bordered nowrap">
                    <thead>
                      <tr>
                        <th>Employee Name</th>
                        <th>Employee's Team</th>
                        <th>Assigned Task</th>
                        <th>Project</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($taskusers as $task)
                  
                      <tr>
                        <td>{{$task->employee}}</td>
                        <td>{{$task->team}}</td>
                        <td>{{$task->task}}</td>
                        <td>{{$task->project}}</td>
                        
                        <td>
                        <a href="{{route('task/details', $task->task_id)}}" class="btn btn-info btn_edit">Details</a></td>
                        <!-- <td>
                          <form action="{{action('TaskUserController@destroy', $task->id)}}" method="post">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button class="btn btn-danger btn_delete" type="submit">Delete</button>
                          </form>
                        </td> -->
                      </tr>
                      @endforeach
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Employee Name</th>
                        <th>Employee Team</th>
                        <th>Assigned Team</th>
                        <th>Project</th>
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