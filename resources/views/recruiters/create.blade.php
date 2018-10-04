@extends('admin.manage')

@section('content')

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container">
                <div class="heading text-center">
                    <h1>Enter the Details of Recruiter</h1>
                </div>
            </div>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        
        <div class="row justify-content-center">
            <div class="col-md-10 col-sm-12 col-xs-12 col-xl-10">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ url('recruiter') }}" aria-label="{{ __('Register Recruiter') }}">
                        {!! csrf_field() !!}
                        <div class="form-group row">
                            <label for="name" class=" col-xl-4 col-md-4 col-sm-4 col-xs-12 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6 col-sm-8 col-xs-12">
                                <input id="name" type="text" placeholder="Name(e.g John Doe)" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

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
                                <input id="email" type="email" placeholder="Email(e.g john.doe@gmail.com)" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

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
                                <input id="number" type="text" placeholder="+37812423" class="form-control" name="number" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="country" class=" col-xl-4 col-md-4 col-sm-4 col-xs-12 col-form-label text-md-right">{{ __('Country') }}</label>

                            <div class="col-md-6 col-sm-8 col-xs-12">
                                <input id="country" type="text" placeholder="Country(e.g USA)" class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}" name="country" value="{{ old('country') }}" required autofocus>

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
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection