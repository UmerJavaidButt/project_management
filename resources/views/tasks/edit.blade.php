@extends('admin.manage')

@section('content')

@php 
$start = $tasks->project['start_date'];
$deadline = $tasks->project['deadline'];
@endphp

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container">
                <div class="heading text-center">
                    <h1>Update the Tasks</h1>
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
            <div class="col-md-10">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ action('TaskController@update', $id) }}" aria-label="{{ __('Register Project') }}">
                        {!! csrf_field() !!}
                        <input name="_method" type="hidden" value="PATCH">
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $tasks->name }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="project_id" class="col-md-4 col-form-label text-md-right">{{ __('Project Name') }}</label>

                            <div class="col-md-6">
                            <span class="form-control">{{$tasks->project['name']}}</span>
                            <input type="hidden" value="{{$tasks->project['id']}}" name="project_id">
                                <!-- <input id="client-id" type="text" class="form-control" name="client-id" required> -->
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('Start Date') }}</label>

                            <div class="col-md-6">
                                <input type="date" name="start_date" min="{{$start}}" max="{{$deadline}}" class="date form-control start_date" id="datepicker" value="{{ $tasks->start }}">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('DeadLine') }}</label>

                            <div class="col-md-6">
                                <input type="date" name="deadline" min="{{$start}}" max="{{$deadline}}" class="date form-control deadline" id="datepicker" value="{{ $tasks->deadline }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <textarea id="name" type="text" class="form-control" name="description" required autofocus> {{ $tasks->description }}
                                </textarea>
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
