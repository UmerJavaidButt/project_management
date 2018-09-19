@extends("admin.manage")

@section('content')

<div class="row wrapper border-bottom white-bg page-heading dashboard_projects_heading">
    <div class="col-sm-4">
       <h2>Employees</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><strong>Employee Deatails</strong></li>
        </ol>
    </div>
</div>

<div class="justify-content-center">
  <div class="row">
    <div class="col-sm-8">
      <div class="wrapper wrapper-content animated fadeInUp">
        <div class="ibox">
          <div class="ibox-title">
            <h5><strong>Employee Details</strong></h5>
            <!-- <div class="ibox-tools">
              <a href="{{ url('employee/create') }}" class="btn-primary btn-xs create_new_project">Register New Employee</a>
            </div> -->
          </div>

          <!-- Experiment -->
          <div class="row m-t-sm">
                  <div class="col-lg-12">
                    <div class="panel blank-panel">
                      <div class="panel-heading">
                        <div class="panel-options">
                          <ul class="nav nav-tabs">
                            <li>
                              <a href="javascript:void(0)" class="nav-link active show">
                                <strong>Employee Details</strong>
                              </a>
                            </li>
                          </ul>
                        </div>
                      </div>

                      <div class="panel-body">
                        <div class="tab-content">
                          <div class="tab-pane active show admin_projects_page">                              
                            <div class="dt-responsive table-responsive">
                              <table class="table ">
                                <thead>
                                  <tr>
                                    <th>Name</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td>
                                      {{$employee->name}}
                                    </td>

                                    <td>
                                      <form action="#" method="post">
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button class="btn btn-danger btn_delete" type="submit">
                                          <span class="glyphicon glyphicon-trash"></span>Delete
                                        </button>
                                      </form>
                                  </td>
                                </tr>
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
      </div>
    </div>
    
    <div class="col-sm-4 client_view_details">
      <div class="ibox selected">
        <div class="ibox-content client_view_detail">
          <div class="tab-content">
            <div class="tab tab-pane active" id="contact-1">
              <div class="row m-b-lg">
                <div class="col-lg-12 text-center">
                  <h3>{{$employee->name}}</h3>
                  <div class="m-b-sm">
                    <img src="http://localhost:8000/dashboard_assets/assets/images/user.png" class="rounded-circle" style="width:62px" alt="picture">
                  </div>
                </div>
                <div class="col-lg-12 text-center">
                  <strong>{{$employee->email}}</strong>
                  <a href="#" class="btn btn-info btn_edit btn-block btn-sm">
                    <i class="fa fa-edit"></i>Edit Employee
                  </a>
                </div>
              </div>
              <div class="client-detail">
                <strong>Details:</strong>
                <ul class="list-group clear-list">
                  <li class="list-group-item fist-item">
                    <span class="float-right">{{$employee->number}}</span>
                    Number:
                  </li>
                  <li class="list-group-item fist-item">
                    <span class="float-right">
                      <small style="overflow:visible">
                        {{$employee->designation['designation']}}
                      </small>
                    </span>
                    Desination:
                  </li>
                  <li class="list-group-item fist-item">
                    @if(empty($employee->team) && $employee->designation_id == 2 )
                      <span class="float-right"><small>{{('No Team Assigned Yet')}}</small></span>
                    @else
                      <span class="float-right">{{$employee->team['name']}}</span>
                    @endif
                    Team:
                  </li>
                </ul>
              </div>
            </div>
            <div class="tab tab-pane" id="contact-2">
              <div class="row m-b-lg">
                <div class="col-lg-4 text-center">
                  <h2>Client # 2</h2>
                  <div class="m-b-sm">
                    <img src="" class="rounded-circle" style="width:62px" alt="picture">
                  </div>
                </div>
                <div class="col-lg-8">
                  <strong>About me</strong>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                  <a href="" class="btn btn-info btn_edit btn-block btn-sm">
                    <i class="fa fa-edit"></i>Edit Client
                  </a>
                </div>
              </div>
              <div class="client-detail">
                <strong>Details</strong>
                <ul class="list-group clear-list">
                  <li class="list-group-item fist-item">
                    <span class="float-right">something@yahoo.com</span>
                    Email:
                  </li>
                  <li class="list-group-item fist-item">
                    <span class="float-right">1212313</span>
                    Number:
                  </li>
                  <li class="list-group-item fist-item">
                    <span class="float-right">Australia</span>
                    Country:
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
@endsection