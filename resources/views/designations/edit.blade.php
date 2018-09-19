@extends('admin.manage')

@section('content')

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container">
                <div class="heading text-center">
                    <h1>Update the Designation</h1>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ action('DesignationController@update', $id) }}" aria-label="{{ __('Teams & Members') }}">
                        @csrf
                        <input name="_method" type="hidden" value="PATCH">
                        <div class="form-group row">
                            <label for="client-id" class="col-md-4 col-form-label text-md-right">{{ __('Designation') }}</label>

                            <div class="col-md-6">
                            <input id="designation" type="text" class="form-control{{ $errors->has('designation') ? ' is-invalid' : '' }}" name="designation" value="{{ $designation['designation'] }}" required autofocus>
                                <!-- <input id="client-id" type="text" class="form-control" name="client-id" required> -->
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
