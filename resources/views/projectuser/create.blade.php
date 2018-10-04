@extends('admin.manage')

@section('content')

<!-- Page Content -->
<div id="page-content-wrapper">
    <div class="container">
        <div class="heading text-center">
            <h1>Assign Project to Team</h1>
        </div>
    </div>
</div>

<!--Showing Errors -->
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
                <form method="POST" action="{{ url('projectuser') }}" aria-label="{{ __('Register Project') }}">
                {!! csrf_field() !!}
                <div class="form-group row">
                    <label for="project" class="col-md-4 col-form-label text-md-right">{{ __('Project') }}</label>
                    
                    <div class="col-md-6">
                        <span class="form-control">{{$project->name}}</span>
                        <input type="hidden" value="{{$project->id}}" name="project">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="client-id" class="col-md-4 col-form-label text-md-right">{{ __('Select Team') }}</label>

                    <div class="col-md-6">
                        <select name="team" class="form-control">
                            <option value="">~None~</option>
                            @foreach($teams as $team)
                                  <option value="{{$team['id']}}">{{$team['name']}}</option>
                            @endforeach                            
                        </select>
                    </div>
                </div>

                <div class="form-group row">

                    <div class="col-md-4"></div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary btn_submit">
                            {{ __('Assign') }}
                        </button>
                    </div>
                </div>

                </form>                        
            </div>
        </div>
    </div>
</div>
@endsection
