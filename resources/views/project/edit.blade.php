@extends('admin.manage')

@section('content')

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container">
                <div class="heading text-center">
                    <h1>Edit the Project Details</h1>
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
                    <div class="card-body" style="margin-top:20px">
                        <form method="POST" action="{{action('ProjectController@update', $id)}}" aria-label="{{ __('Update Project') }}">
                        @csrf
                        <input name="_method" type="hidden" value="PATCH">
                        <div class="form-group row">
                            <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-7">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $project['name'] }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="project_url" class="col-lg-3 col-md-3 col-form-label text-md-right">{{ __('Project URL') }}</label>

                            <div class="col-md-7 col-lg-7">
                                <input id="project_url" type="text" class="form-control{{ $errors->has('project_url') ? ' is-invalid' : '' }}" name="project_url" value="{{ $project['project_url'] }}" autofocus>

                                @if ($errors->has('project_url'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('project_url') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="client-id" class="col-md-3 col-form-label text-md-right">{{ __('Client') }}</label>

                            <div class="col-md-7">
                            <select name="client_id" class="form-control" id="project_edit_client">
                            @foreach($clients as $client)
                                @if($project['client_id'] == $client['id'])
                                    <option value="{{$client['id']}}">{{$client['name']}}</option>
                                @else
                                    <option value="{{$client['id']}}">{{$client['name']}}</option>
                                @endif
                            @endforeach                            
                            </select>
                                <!-- <input id="client-id" type="text" class="form-control" name="client-id" required> -->
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="client-id" class="col-md-3 col-form-label text-md-right">{{ __('Agent') }}</label>

                            <div class="col-md-7">
                            <select name="agent_id" class="form-control" id="project_edit_recruiter">
                            @foreach($recs as $rec)
                                @if($project['recruiter_id'] == $rec['id'])
                                    <option value="{{ $rec['id'] }}">{{$rec['name']}}</option>
                                @else
                                  <option value="{{ $rec['id'] }}">{{$rec['name']}}</option>
                                @endif
                            @endforeach                            
                            </select>
                                <!-- <input id="client-id" type="text" class="form-control" name="client-id" required> -->
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date" class="col-md-3 col-form-label text-md-right">{{ __('Start Date') }}</label>

                            <div class="col-md-7">
                                <input type="date" name="start_date" class="date form-control" id="datepicker" value="{{$project['start_date']}}">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="date" class="col-md-3 col-form-label text-md-right">{{ __('DeadLine') }}</label>

                            <div class="col-md-7">
                                <input type="date" name="deadline" class="date form-control" id="datepicker" value="{{$project['deadline']}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="client-id" class="col-md-3 col-form-label text-md-right">{{ __('Price in $') }}</label>

                            <div class="col-md-7">
                                <input id="total_price" type="number" name="price" class="form-control" placeholder= "Total Price" value="{{$project->price}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-3 col-form-label text-md-right">{{ __('Brief Description') }}</label>

                            <div class="col-md-7">
                                <textarea id="description" type="text" class="form-control" name="description" required>{{ $project['description']}}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-3"></div>
                            <div class="col-md-7">
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