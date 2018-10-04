@extends('layouts.app')

@section('content')
<section class="login-page container-fluid">
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-4 col-lg-4">
            <div class="card login-card card-block">

                <div class="card-body">
                    <div class="auth-box">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}" aria-label="{{ __('Reset Password') }}">
                            {!! csrf_field() !!}

                            <div class="text-center">
                                <img src="{{asset('dashboard_assets/assets/images/welcome/header-logo-default.png')}}">
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <h3 class="text-center txt-primary">
                                        Reset Password
                                    </h3>
                                </div>
                            </div>

                            <hr>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address:') }}</label>

                                <div class="col-md-12">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Send Password Reset Link') }}
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
