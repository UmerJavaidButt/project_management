@extends("client_portal.dashboard")
@section("content")
<div class="page-body">
	<div class="justify-content-center">	
		<div class="row">	
			<div class="col-md-12">
			    <div class="card">
			        <div class="card-header">
			            <h5>AREAS</h5>
			            <a href="{{route('area/view')}}" class="btn btn_submit btn-primary waves-effect waves-light f-right d-inline-block md-trigger" 
			             > <i class="icofont icofont-minus m-r-5"></i> Back to Areas
			            </a>
			        </div>
			        <div class="card-block client_portal_card">
			        	<div class="justify-content-center">
				        	<div class="row">
				        		<div class="col-md-12">
						            <form method="post" action="{{action('AreaController@update', $id)}}">
						            	@csrf
						            	<input name="_method" type="hidden" value="PATCH">
						            	<div class="form-group row">
				                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Area') }}</label>

				                            <div class="col-md-6">
				                                <input id="name" placeholder="Area e.g West Street, New York" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $area->name }}" required autofocus>

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
				                                    {{ __('Update Area') }}
				                                </button>
				                                <button type="button" class="btn btn-danger alert-success-cancel-area m-b-10" id="bt-edit" data-id = "{{$area->id}}">Delete</button>
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