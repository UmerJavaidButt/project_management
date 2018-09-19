@extends("admin.manage")

@section('content')

<div class="row wrapper border-bottom white-bg page-heading dashboard_projects_heading">
    <div class="col-sm-4">
       <h2>Employees</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><strong>Employees</strong></li>
        </ol>
    </div>
</div>

<div class="justify-content-center">
  <div class="row">
    <div class="col-lg-12">
      <div class="wrapper wrapper-content animated fadeInUp">
        <div class="ibox">
          <div class="ibox-title">
            <h5><strong>List of the Employees</strong></h5>
            <div class="ibox-tools">
              <a href="{{url('employee/create')}}" class="btn-primary btn-xs create_new_project">Register New Employee</a>
            </div>
          </div>

          @if($employees->isEmpty())
            <span class="label label-danger">No Record Found!</span>
          @else

          <div class="ibox-content">
            <div class="row m-b-sm m-t-sm">
              <div class="card-block admin_projects_page">
                <div class="dt-responsive table-responsive">
                  <table id="footer-search" class="table table-striped table-bordered nowrap">
                    <thead>
                      <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Designation</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($employees as $emp)
                        <tr>
                          <td><a href="{{route('employee/details', $emp->id)}}">{{ $emp->name }}</a></td>
                          <td>{{ $emp->designation['designation'] }}</td>
                          <td>
                            <a class="edit-modal btn btn-info btn_edit" href="{{route('employee/details', $emp->id)}}">
                              <span class="glyphicon glyphicon-edit"></span> Details
                            </a>
                          </td>
                        </tr>
                      @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Name</th>
                      <th>Designation</th>
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