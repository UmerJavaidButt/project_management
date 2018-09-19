@extends("admin.manage")

@section('content')

<div class="row wrapper border-bottom white-bg page-heading dashboard_projects_heading">
    <div class="col-sm-4">
       <h2> Teams & Members</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><strong>Teams Structure</strong></li>
        </ol>
    </div>
</div>

<div class="justify-content-center">
  <div class="row">
    <div class="col-lg-12">
      <div class="wrapper wrapper-content animated fadeInUp">
        <div class="ibox">
          <div class="ibox-title">
            <h5><strong>Teams & Members</strong></h5>
            <div class="ibox-tools">
              <a href="{{ url('teammember/create') }}" class="btn-primary btn-xs create_new_project">Team Members</a>
            </div>
          </div>

          @if($teammembers->isEmpty())
            <span class="label label-danger">No Record Found!</span>
          @else

          <div class="ibox-content">
            <div class="row m-b-sm m-t-sm">
              <div class="card-block admin_projects_page">
                <div class="dt-responsive table-responsive">
                  <table id="footer-search" class="table table-striped table-bordered nowrap">
                    <thead>
                      <tr>
                        <th>Team Name</th>
                        <th>Member Name</th>
                        <th>Action</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($teammembers as $tm)
                  
                      <tr>
                        <td>{{$tm->team}}</td>
                        <td>{{$tm->employee}}</td>
                        <td>
                        <a href="{{action('TeamMemberController@edit', $tm->id)}}" class="btn btn-info btn_edit">Edit</a></td>
                        <td>
                          <form action="{{action('TeamMemberController@destroy', $tm->id)}}" method="post">
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
                        <th>Team Name</th>
                        <th>Member Task</th>
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