@extends("client_portal.dashboard")
@section("content")
<div class="page-body">
	<div class="justify-content-center">	
		<div class="row">	
			<div class="col-md-12">
			    <div class="card">
			        <div class="card-header">
			            <h5>Status</h5>
			            <a href="{{route('status/view')}}" class="btn btn_submit btn-primary waves-effect waves-light f-right d-inline-block md-trigger" 
			             > <i class="icofont icofont-minus m-r-5"></i> Back to Status
			            </a>
			        </div>
			        <div class="card-block client_portal_card">
			        	<div class="justify-content-center">
				        	<div class="row">
				        		<div class="col-md-12">
						            <form method="post" action="{{action('StatusController@update', $id)}}">
						            	{!! csrf_field() !!}
						            	<input name="_method" type="hidden" value="PATCH">
						            	<div class="form-group row">
				                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>

				                            <div class="col-md-6">
				                                <input id="name" placeholder="Area e.g West Street, New York" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $status->name }}" required autofocus>

				                                @if ($errors->has('name'))
				                                    <span class="invalid-feedback" role="alert">
				                                        <strong>{{ $errors->first('name') }}</strong>
				                                    </span>
				                                @endif
				                            </div>
				                        </div>

				                        <div class="form-group row">
				                        	<div class="col-md-4"></div>
				                            <div class="col-md-6">
				                                <button type="submit" class="btn btn_submit">
				                                    {{ __('Update Status') }}
				                                </button>
				                                <button type="button" class="btn btn-danger alert-success-cancel-status m-b-10" id="bt-edit" data-id = "{{$status->id}}">Delete</button>
				                            </div>
				                        </div>
						            </form>
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