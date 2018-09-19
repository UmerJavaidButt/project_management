@extends('admin.manage')

@section('content')

<!-- Page Content -->
<div id="page-content-wrapper">
    <div class="container">
        <div class="heading text-center">
            <h1>Update the Assigned Project</h1>
        </div>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ action('ProjectUserController@update', $id) }}" aria-label="{{ __('Register Project') }}">
                @csrf
                <input name="_method" type="hidden" value="PATCH">
                <div class="form-group row">
                    <label for="project" class="col-md-4 col-form-label text-md-right">{{ __('Select Project') }}</label>

                    <div class="col-md-6">
                        <select name="project" class="form-control">
                            <option value="{{$projectuser->project_id}}">{{$projectuser->project}}</option>
                            @foreach($projects as $project)
                                @if($projectuser->project_id != $project['id'])
                                    <option value="{{$project['id']}}" data-start="{{$project->start_date}}" data-deadline="{{$project->deadline}}">{{$project['name']}}</option>
                                @endif
                            @endforeach 
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="team" class="col-md-4 col-form-label text-md-right">{{ __('Select Team') }}</label>

                    <div class="col-md-6">
                        <select name="team" class="form-control">
                            <option value="{{$projectuser->team_id}}">{{$projectuser->team}}</option>
                            @foreach($teams as $team)
                                @if($projectuser->team_id != $team['id'])
                                  <option value="{{$team['id']}}">{{$team['name']}}</option>
                                @endif
                            @endforeach                            
                        </select>
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