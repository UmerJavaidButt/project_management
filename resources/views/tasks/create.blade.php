@extends('admin.manage')

@section('content')

@php 
$start = $project->start_date;
$deadline = $project->deadline;
@endphp
        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container">
                <div class="heading text-center">
                    <h1>Create New Task</h1>
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
                        <form method="POST" action="{{ url('task') }}" aria-label="{{ __('Register Project') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

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
                            @if( empty($project) )
                                <select name="project_id" id="task_project" class="form-control">
                                <option>None</option>
                                @foreach($projects as $project)
                                      <option value="{{$project->id}}" data-start="{{$project->start_date}}" data-deadline="{{$project->deadline}}">{{$project->name}}</option>
                                @endforeach                            
                                </select>
                            @else
                            <span class="date form-control start_date">{{ $project['name'] }}</span>
                            <input type="hidden" name="project_id" value="{{ $project['id'] }}">
                            @endif
                                <!-- <input id="client-id" type="text" class="form-control" name="client-id" required> -->
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('Start Date') }}</label>

                            <div class="col-md-6">
                                <input type="date" name="start_date" min="{{$start}}" max="{{$deadline}}" class="date form-control" id="datepicker">
                                <span class="label label-info">Start Date must be between {{$start}} and {{$deadline}}</span>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('DeadLine') }}</label>

                            <div class="col-md-6">
                                <input type="date" name="deadline" min="{{$start}}" max="{{$deadline}}" class="date form-control" id="datepicker">
                                <span class="label label-info">Start Date must be after {{$start}} and before {{$deadline}}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <textarea id="name" type="text" class="form-control" name="description" value="{{ old('name') }}" required autofocus></textarea>
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
