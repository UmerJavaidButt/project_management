@extends("admin.manage")

@section('content')

<div class="row wrapper border-bottom white-bg page-heading dashboard_projects_heading">
    <div class="col-sm-4">
       <h2>Assign  Projects</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><strong>Assigned Projects</strong></li>
        </ol>
    </div>
</div>

<div class="justify-content-center">
  <div class="row">
    <div class="col-lg-12">
      <div class="wrapper wrapper-content animated fadeInUp">
        <div class="ibox">
          <div class="ibox-title">
            <h5><strong>Projects Assigned to Teams</strong></h5>
            <div class="ibox-tools">
              <a href="{{ url('projectuser/create') }}" class="btn-primary btn-xs create_new_project">Assign New Project</a>
            </div>
          </div>

          <div class="ibox-content">
            <div class="row m-b-sm m-t-sm">
              <div class="card-block admin_projects_page">
                <div class="dt-responsive table-responsive">
                  <table id="footer-search" class="table table-striped table-bordered nowrap">
                    <thead>
                      <tr>
                        <th>Project</th>
                        <th>Team</th>
                        <th>Action</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($projectusers as $projectuser)
                  
                      <tr>
                        <td>{{$projectuser->project}}</td>
                        <td>{{$projectuser->team}}</td>
                        
                        <td>
                        <a href="{{action('ProjectUserController@edit', $projectuser->id)}}" class="btn btn-info btn_edit">Edit</a></td>
                        <td>
                          <form action="{{action('ProjectUserController@destroy', $projectuser->id)}}" method="post">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button class="btn btn-danger btn_delete" type="submit">Delete</button>
                          </form>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Project</th>
                        <th>Team</th>
                        <th></th>
                        <th></th>
                      </tr>
                    </tfoot>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection