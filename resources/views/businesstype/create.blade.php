@extends("client_portal.dashboard")
@section("content")
<div class="page-body">
	<div class="justify-content-center">	
		<div class="row">	
			<div class="col-md-12">
			    <div class="card">
			        <div class="card-header">
			            <h5>BUSINESS TYPES</h5>
			            <a href="{{route('businesstype/view')}}" class="btn btn_submit btn-primary waves-effect waves-light f-right d-inline-block md-trigger" 
			             > <i class="icofont icofont-minus m-r-5"></i> Back to Business Types
			            </a>
			        </div>
			        <div class="card-block client_portal_card">
			        	<div class="justify-content-center">
				        	<div class="row">
				        		<div class="col-md-12">
						            <form method="post" action="{{url('businesstype')}}">
						            	{!! csrf_field() !!}
						            	<div class="form-group row">
				                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Business Type') }}</label>

				                            <div class="col-md-6">
				                                <input id="name" placeholder="Business Type e.g Real Estate" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

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
				                                    {{ __('Add Business Type') }}
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