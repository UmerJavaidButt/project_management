@extends('layouts.app')

@section('content')
<section class="register-page container-fluid">
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-5 col-lg-5">
            <div class="card register-card card-block">
                <div class="card-body">
                    <div class="auth-box">    
                        <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                            {!! csrf_field() !!}

                            <div class="text-center">
                                <img src="{{asset('dashboard_assets/assets/images/welcome/header-logo-default.png')}}">
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <h3 class="text-center txt-primary">
                                        Sign Up
                                    </h3>
                                </div>
                            </div>

                            <hr>

                            <div class="form-group row">
                                <!-- <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Name') }}</label> -->

                                <div class="col-md-12">
                                    <input id="name" type="text" placeholder="Enter Full Name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <!-- <label for="email" class="col-md-2 col-form-label text-md-right">{{ __('E-Mail') }}</label> -->

                                <div class="col-md-12">
                                    <input id="email" type="email" placeholder="Enter Email Address" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <!-- <label for="password" class="col-md-2 col-form-label text-md-right">{{ __('Password') }}</label> -->

                                <div class="col-md-12">
                                    <input id="password" type="password" placeholder="Enter Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <!-- <label for="password-confirm" class="col-md-2 col-form-label text-md-right">{{ __('Confirm Password') }}</label> -->

                                <div class="col-md-12">
                                    <input id="password-confirm" type="password" placeholder="Confirm Password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>

                            <div class="form-group row m-t-30">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary btn-block mb-10">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
