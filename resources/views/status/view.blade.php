@extends("client_portal.dashboard")
@section("content")
<div class="page-body">
<div class="justify-content-center">
<div class="row">
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h5>Statuses</h5>
            <a href="{{route('status/create')}}" class="btn btn_submit btn-primary  f-right d-inline-block"> 
            <i class="icofont icofont-plus m-r-5"></i> Add Status
            </a>
        </div>
        <div class="card-block client_portal_card">
        	<div class="justify-content-center">
	        	<div class="row">
	        		<div class="col-md-6 offset-md-3">
			            <div class="table-content">
			                <div class="">
			                    <table class="table table-striped nowrap client_portal_table">
			                        <thead>
			                            <tr>
			                                <th>Name</th>
			                                <th>Status</th>
			                                <th>Action</th>
			                            </tr>
			                        </thead>
			                        <tbody>

			                        @if( !empty($statuses) )
			                            @foreach($statuses as $status)
			                                <tr>
			                                    <td class="pro-name">
			                                       <a href="{{route('status/edit', $status->id)}}" >{{$status->name}}</a> 
			                                    </td>
			                                    <td>
			                                    	@if($status->status == 0)
			                                    		<label class="label label-danger">Inactive</label>
			                                    	@else
			                                    		<label class="label label-success">Active</label>
			                                    	@endif
			                                    </td>
			                                    
			                                    <td class="action-icon">
			                                        @if($status->status == 0)
			                                        	<a href="{{route('change_status_status', $status->id)}}" class="btn btn_success btn-success">Active</a>
			                                        @else
			                                        	<a href="{{route('change_status_status', $status->id)}}" class="btn btn-danger btn_danger">Inactive</a>
			                                        @endif
			                                    </td>
			                                </tr>
			                            @endforeach
			                        @else
			                        <td></td>
			                        <td><span class="label label-danger text-center">No Record Found!</span></td>
			                        <td></td>
			                        @endif
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
</div>

@endsection