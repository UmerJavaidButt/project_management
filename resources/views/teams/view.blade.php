@extends("admin.manage")

@section('content')

<div class="row wrapper border-bottom white-bg page-heading dashboard_projects_heading">
    <div class="col-sm-4">
       <h2>Teams</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><strong>Teams</strong></li>
        </ol>
    </div>
</div>

<div class="justify-content-center">
  <div class="row">
    <div class="col-lg-12">
      <div class="wrapper wrapper-content animated fadeInUp">
        <div class="ibox">
          <div class="ibox-title">
            <h5><strong>The List of Teams</strong></h5>
            <div class="ibox-tools">
              <a href="{{ url('team/create') }}" class="btn-primary btn-xs create_new_project">Create New Team</a>
            </div>
          </div>

          @if($teams->isEmpty())
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
                        <th>Team Lead</th>
                        <th>Shift</th>
                        <th>Action</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($teams as $team)

                      <tr>
                        <td>{{$team->name}}</td>
                        <td>{{$team->teamlead}}</td>
                        @if($team->shift == 0)
                        <td>{{ ('Morning') }}</td>
                        @elseif($team->shift == 1)
                        <td>{{ ('Night') }}</td>
                        @endif
                        <td>
                          <a class="edit-modal btn btn-info btn_edit" href="{{ action('TeamController@edit', $team->id) }}">
                            <span class="glyphicon glyphicon-edit"></span> Edit
                          </a>
                        </td>
                        <td>
                          <form action="{{ action ('TeamController@destroy', $team->id) }}" method="post">
                            {!! csrf_field() !!}
                            <input name="_method" type="hidden" value="DELETE">
                            <button class="btn btn-danger btn_delete" type="submit">
                              <span class="glyphicon glyphicon-trash"></span>Delete
                            </button>
                          </form>
                        </td>
                        <td></td>
                      </tr>
                      @endforeach
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Name</th>
                        <th>Team Lead</th>
                        <th>Shift</th>
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