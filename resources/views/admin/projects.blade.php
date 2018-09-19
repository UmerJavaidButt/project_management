@extends('admin.manage')

@section('content')


<div class="row wrapper border-bottom white-bg page-heading dashboard_projects_heading">
    <div class="col-sm-4">
        @if($cetagory == 0)
            <h2>Open Projects</h2>
        @elseif($cetagory == 1)
        	<h2>Completed Projects</h2>
        @elseif($cetagory == 2)
        	<h2>Upcoming Projects</h2>
        @elseif($cetagory == 3)
        	<h2>Paused Projects</h2>
        @endif
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><strong>Projects</strong></li>
        </ol>
    </div>
</div>

<div class="row">
  <div class="col-lg-12">
    <div class="wrapper wrapper-content animated fadeInUp">
      <div class="ibox">
        <div class="ibox-title">
          <h5>List of the Open Projects</h5>
        </div>

        <div class="ibox-content">
          <div class="row m-b-sm m-t-sm">
            <div class="card-block admin_projects_page">
              <div class="dt-responsive table-responsive">
                <table id="footer-search" class="table table-striped table-bordered nowrap">
                  <thead>
                    <tr>
                      <th>Project Title</th>
                      <th>Project URL</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>

                    @foreach($projects as $proj)

                    @php
                      $deadline=$proj->deadline;
                      $startdate = $proj->start_date;
                      @endphp
                    <tr>                      
                      <td> 
                        {{$proj->name}} 
                        <br>
                        <small>CREATED ON: {{$proj->start_date}}</small>
                      </td>

                      <td>{{$proj->project_url}}</td>
                      
                      <td>
                        <a class="edit-modal btn btn-info btn_edit" href="{{action('AdminController@projectDetails', $proj->id) }}">
                          <span class="glyphicon glyphicon-edit"></span> Details
                        </a>
                      </td>
                    </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Title</th>
                      <th>Project URL</th>
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

@endsection