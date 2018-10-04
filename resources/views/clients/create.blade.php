@extends('admin.manage')

@section('content')

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container">
                <div class="heading text-center">
                    <h1>Add New Client</h1>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ url('client') }}" aria-label="{{ __('Register Client') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" placeholder="Name e.g John Doe" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

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
                                <input id="email" placeholder="Valid Email e.g mail@gmail.com" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

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
                                <input id="number" placeholder="Number e.g +92 1223 234" type="text" class="form-control" name="number" value="{{ old('number') }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="number" class="col-md-4 col-form-label text-md-right">{{ __('Whatsapp (Optional)') }}</label>

                            <div class="col-md-6">
                                <input id="number" placeholder="Whastapp Number e.g +92 1223 234" type="text" class="form-control" name="whatsapp" value="{{ old('whatsapp') }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="region" class="col-md-4 col-form-label text-md-right">{{ __('Website (Optional) ') }}</label>

                            <div class="col-md-6">
                                <input id="region" type="url" class="form-control" name="website" placeholder = "Website" value="{{ old('website') }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="business" class="col-md-4 col-form-label text-md-right">{{ __('Business Type') }}</label>

                            <div class="col-md-6">
                                <input id="business" placeholder="Client's Business" type="text" class="form-control" name="business" value="{{ old('business') }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <input id="address" placeholder="Address (e.g 33 A, Columbia street...)" type="text" class="form-control" name="address" value="{{ old('address') }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('Area') }}</label>

                            <div class="col-md-6">
                                <input id="country" placeholder="Country e.g Perth or Victoria Park" type="text" class="form-control" name="country" value="{{ old('country') }}" required>
                            </div>
                        </div>

                        <!-- <div class="form-group row">
                            <label for="region" class="col-md-4 col-form-label text-md-right">{{ __('Region (Optional) ') }}</label>

                            <div class="col-md-6">
                                <input id="region" placeholder="Region" type="text" class="form-control" name="region">
                            </div>
                        </div> -->

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Brief Description') }}</label>

                            <div class="col-md-6">
                                <textarea id="description" type="textarea" placeholder="Description" class="form-control" name="description" required></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                        <div class="col-md-4"></div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn_submit">
                                    {{ __('Add Client') }}
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

    