@extends('admin.manage')

@section('content')

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container">
                <div class="heading text-center">
                    <h1>Edit the Details of Recruiter</h1>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10 col-sm-12 col-xs-12 col-xl-10">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ action('RecruiterController@update', $id) }}" aria-label="{{ __('Register Project') }}">
                        {!! csrf_field() !!}
                        <input name="_method" type="hidden" value="PATCH">
                        <div class="form-group row">
                            <label for="name" class=" col-xl-4 col-md-4 col-sm-4 col-xs-12 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6 col-sm-8 col-xs-12">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $recruiter['name'] }}" required autofocus>

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
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $recruiter['email'] }}" required>

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
                                <input id="number" type="text" class="form-control" name="number" value="{{$recruiter['number']}}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="country" class=" col-xl-4 col-md-4 col-sm-4 col-xs-12 col-form-label text-md-right">{{ __('Country') }}</label>

                            <div class="col-md-6 col-sm-8 col-xs-12">
                                <input id="country" type="text" class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}" name="country" value="{{ $recruiter['country'] }}" required autofocus>

                                @if ($errors->has('country'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4"></div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary btn_submit">
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