@extends("admin.manage")

@section('content')

<!-- Page Content -->
<div id="page-content-wrapper">
    <div class="container">
        <div class="heading text-center">
            <h1>Team Details</h1>
        </div>
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row ">
		<div class="col-lg-3"></div>
		<div class="col-lg-6 col-sm-12 col-xs-12">
			<div class="ibox">
				<div class="ibox-title">
					<div class="float-right">
						<span class="label label-primary">
							<a href="{{route('employee/details', $team->employee['id'])}}" class="text-white">
								{{$team->employee['name']}}
							</a>
						</span>
					</div>

					<h3><strong>{{$team->name}}</strong></h3>	
				</div>

				<div class="ibox-content">
					<div class="row">
						<div class="col-lg-12">
							<!-- <h4 id="team_projects_heading">Team Members</h4> -->
							@if($members->isEmpty()) )
								<small class="label label-danger">Not assigned yet! </small>
							@else
								<table class="table">
								<thead>
									<tr>
										<th>Team Member</th>
										<th>Designation</th>
									</tr>
								</thead>
								<tbody>
								@foreach($members as $member)	
									<tr>
										<td>	
											<div class="team-members">
												<a href="{{route('employee/details', $member->employees['id'])}}">
													{{$member->employees['name']}}
												</a>
											</div>
										</td>
										<td>
											<div class="team-members">
												<span>
													{{$member->employees['designation']['designation']}}
												</span>
											</div>
										</td>
									</tr>
								@endforeach
								</tbody>
								</table>
							@endif	
						</div>

						<!-- <div class="col-lg-6 pull-right">
							<h4 id="team_projects_heading">Designations</h4>
							@if( $members->isEmpty() )
								<small class="label label-danger">N/A </small>
							@else
								@foreach($members as $member)
									<div class="team-members">
										<span>
											{{$member->employees['designation']['designation']}}
										</span>
									</div>
								@endforeach
							@endif
						</div> -->
					</div>				

					<h4 id="team_details_projects">List of Projects by this Team</h4>
					<ul>
					<table class="table">
						<tbody>
							@foreach($projects as $proj)
								<tr>
									<td>
										<a href="{{route('admin/projectDetails',$proj->projects['id'])}}"><li>{{$proj->projects['name']}}</li></a>
									</td>
								</tr>
							@endforeach
						</tbody>	
					</table>
					</ul>
				</div>

				<div class="col-sm-12 ibox-title">
					<h4 id="team_projects_heading">Number of Projects<h4>
					{{$numberofprojects}}
				</div>
			</div>
		</div>
	</div>
</div>

@endsection