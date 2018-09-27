@extends("client_portal.dashboard")
@section("content")
<div class="page-body">
	<div class="justify-content-center">	
		<div class="row">	
			<div class="col-md-12">
			    <div class="card">
			        <div class="card-header">
			            <h5>Add Status</h5>
			            <a href="{{route('status/view')}}" class="btn btn_submit btn-primary waves-effect waves-light f-right d-inline-block md-trigger" 
			             > <i class="icofont icofont-minus m-r-5"></i> Back to Statuses
			            </a>
			        </div>
			        <div class="card-block client_portal_card">
			        	<div class="justify-content-center">
				        	<div class="row">
				        		<div class="col-md-12">
						            <form method="post" action="{{url('status')}}">
						            	@csrf
						            	<div class="form-group row">
				                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>

				                            <div class="col-md-6">
				                                <input id="name" placeholder="Current Progress Status" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

				                                @if ($errors->has('name'))
				                                    <span class="invalid-feedback" role="alert">
				                                        <strong>{{ $errors->first('name') }}</strong>
				                                    </span>
				                                @endif
				                            </div>
				                        </div>

				                        <div class="form-group row">
				                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Label Color') }}</label>

				                            <div class="col-md-6">
				                                <select class="form-control">
				                                	<option value="">--Select Label Color--</option>
				                                	<option class="label label-default">Default</option>
				                                	<option class="label label-info">Info</option>
				                                	<option class="label label-primary">Primary</option>
				                                	<option class="label label-success">Success</option>
				                                	<option class="label label-danger">Danger</option>
				                                	<option class="label label-warning">Warning</option>
				                                </select>

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
				                                    {{ __('Add Status') }}
				                                </button>
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