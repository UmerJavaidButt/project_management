@extends('admin.manage')

@section('content')

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container">
                <div class="heading text-center">
                    <h1>Update Agent Details</h1>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{action('AgentController@update', $id)}}" aria-label="{{ __('Update Agent') }}">
                        {!! csrf_field() !!}
                        <input name="_method" type="hidden" value="PATCH">
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $agent['name'] }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $agent['email'] }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="number" class="col-md-4 col-form-label text-md-right">{{ __('Number') }}</label>

                            <div class="col-md-6">
                                <input id="number" type="text" class="form-control" name="number" value="{{ $agent['number'] }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <input id="country" placeholder="Country e.g USA" type="text" class="form-control" name="address" value="{{$agent['address']}}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>

                            <div class="col-md-6">
                                <input id="country" type="text" class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}" name="country" value="{{ $agent['country'] }}" required autofocus>

                                @if ($errors->has('country'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="number" class="col-md-4 col-form-label text-md-right">{{ __('Whatsapp (Optional) ') }}</label>

                            <div class="col-md-6">
                                <input id="number" placeholder="Number e.g +92 1223 234" type="text" class="form-control" name="whatsapp" value="{{$agent['whatsapp']}}">
                            </div>
                        </div>

                        <!-- <div class="form-group row">
                            <label for="region" class="col-md-4 col-form-label text-md-right">{{ __('Website (Optional) ') }}</label>

                            <div class="col-md-6">
                                <input id="region" type="url" value="https://" class="form-control" name="website" value="$agent['website']">
                            </div>
                        </div> -->

                        <div class="form-group row">
                            <label for="region" class="col-md-4 col-form-label text-md-right">{{ __('Share') }}</label>

                            <div class="col-md-6">
                                <input type="number" placeholder="0.00" required name="share" min="0" value="{{$agent['share']}}" step="0.01" title="Currency" pattern="^\d+(?:\.\d{1,2})?$" onblur="
                                this.parentNode.parentNode.style.backgroundColor=/^\d+(?:\.\d{1,2})?$/.test(this.value)?'inherit':'red'">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Brief Description') }}</label>

                            <div class="col-md-6">
                                <textarea id="description" type="textarea" class="form-control" name="description" required> {{ $agent['description'] }}
                                </textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                        <div class="col-md-4"></div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn_submit">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
        <!-- /#page-content-wrapper -->
    <!-- /#wrapper -->
    