@extends('admin.manage')

@section('content')

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container">
                <div class="heading text-center">
                    <h1>Edit Team Record</h1>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ action('TeamController@update', $id) }}" aria-label="{{ __('Update Team') }}">
                            {!! csrf_field() !!}
                            <input name="_method" type="hidden" value="PATCH">
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $team->name }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="shift" class="col-md-4 col-form-label text-md-right">{{ __('Team Lead') }}</label>

                                <div class="col-md-6">
                                    <!-- <input id="shift" type="text" class="form-control{{ $errors->has('shift') ? ' is-invalid' : '' }}" name="shift" value="{{ old('shift') }}" required autofocus> -->
                                    <select name="team_lead" class="form-control">
                                    <option>~Select Team Lead~</option>
                                    @foreach($teamleads as $tl)
                                        <option value="{{$tl->id}}"> {{ $tl->name }}</option>
                                    @endforeach
                                    </select>

                                    @if ($errors->has('team_lead'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('team_lead') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="shift" class="col-md-4 col-form-label text-md-right">{{ __('Shift') }}</label>

                                <div class="col-md-6">
                                    <!-- <input id="shift" type="text" class="form-control{{ $errors->has('shift') ? ' is-invalid' : '' }}" name="shift" value="{{ old('shift') }}" required autofocus> -->
                                    <select name="shift" class="form-control">
                                    <option>~Select the Shift~</option>
                                    <option value="0"> Morning </option>
                                    <option value="1"> Evening </option>
                                    </select>

                                    @if ($errors->has('shift'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('shift') }}</strong>
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
