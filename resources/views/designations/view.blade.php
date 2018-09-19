@extends("admin.manage")

@section('content')

<div class="row wrapper border-bottom white-bg page-heading dashboard_projects_heading">
    <div class="col-sm-4">
       <h2> Designations</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><strong>Designation List</strong></li>
        </ol>
    </div>
</div>

<div class="justify-content-center">
  <div class="row">
    <div class="col-lg-12">
      <div class="wrapper wrapper-content animated fadeInUp">
        <div class="ibox">
          <div class="ibox-title">
            <h5><strong>List of Designations</strong></h5>
            <div class="ibox-tools">
              <a href="{{ url('designation/create') }}" class="btn-primary btn-xs create_new_project">Create New Designation</a>
            </div>
          </div>

          @if($designations->isEmpty())
            <span class="label label-danger">No Record Found!</span>
          @else

          <div class="ibox-content">
            <div class="row m-b-sm m-t-sm">
              <div class="card-block admin_projects_page">
                <div class="dt-responsive table-responsive">
                  <table id="footer-search" class="table table-striped table-bordered nowrap">
                    <thead>
                      <tr>
                        <th>Designation</th>
                        <th>Action</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($designations as $designation)
                  
                      <tr>
                        <td>{{$designation->designation}}</td>
                        
                        <td>
                        <a href="{{action('DesignationController@edit', $designation->id)}}" class="btn btn-info btn_edit">Edit</a></td>
                        <td>
                          <form action="{{action('DesignationController@destroy', $designation->id)}}" method="post">
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
                        <th>Designation</th>
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