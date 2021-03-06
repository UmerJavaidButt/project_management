@extends("admin.manage")

@section('content')

<div class="row wrapper border-bottom white-bg page-heading dashboard_projects_heading">
    <div class="col-sm-4">
       <h2>Recruiters</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><strong>Recruiters</strong></li>
        </ol>
    </div>
</div>

<div class="justify-content-center">
  <div class="row">
    <div class="col-lg-12">
      <div class="wrapper wrapper-content animated fadeInUp">
        <div class="ibox">
          <div class="ibox-title">
            <h5><strong>List of the registered Recruiters</strong></h5>
            <div class="ibox-tools">
              <a href="{{ url('recruiter/create') }}" class="btn-primary btn-xs create_new_project">Register New Recruiter</a>
            </div>
          </div>

          <div class="ibox-content">
            <div class="row m-b-sm m-t-sm">
              <div class="card-block admin_projects_page">
                <div class="dt-responsive table-responsive">
                  <table id="footer-search" class="table table-striped table-bordered nowrap">
                    <thead>
                      <tr>
                        <th>Name</th>
				        <th>Email</th>
				        <th>Phone Number</th>
				        <th>Country</th>
                        <th>Action</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>

                     @foreach($recruiters as $recruiter)
				      <tr>
				        <td>{{$recruiter['name']}}</td>
				        <td>{{$recruiter['email']}}</td>
				        <td>{{$recruiter['number']}}</td>
				        <td>{{$recruiter['country']}}</td>
				        
				        <td><a href="{{action('RecruiterController@edit', $recruiter['id'])}}" class="btn btn-info btn_edit">Edit</a></td>
				        <td>
				          <form action="{{action('RecruiterController@destroy', $recruiter['id'])}}" method="post">
				            {!! csrf_field() !!}
				            <input name="_method" type="hidden" value="DELETE">
				            <button class="btn btn-danger btn_delete" type="submit">Delete</button>
				          </form>
				        </td>
				      </tr>
				      @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Phone Number</th>
                      <th>Country</th>
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

