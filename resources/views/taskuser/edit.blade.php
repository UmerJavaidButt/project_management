@extends('admin.manage')

@section('content')

<?php 
// echo "<pre>";
// var_dump($taskusers);
// die();
?>

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container">
                <div class="heading text-center">
                    <h1>Update the Assigned Task</h1>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ action('TaskUserController@update', $id) }}" aria-label="{{ __('Register Project') }}">
                        @csrf
                        <input name="_method" type="hidden" value="PATCH">
                        <div class="form-group row">
                            <label for="client-id" class="col-md-4 col-form-label text-md-right">{{ __('Select Employee') }}</label>

                            <div class="col-md-6">
                            <select name="employee" class="form-control">
                                <option value="{{$taskusers->employee_id}}">{{$taskusers->employee}}</option>
                            @foreach($employees as $emp)
                              @if($taskusers->employee_id != $emp['id'])  
                                <option value="{{$emp['id']}}">{{$emp['name']}}</option>
                              @endif
                            @endforeach                            
                            </select>
                                <!-- <input id="client-id" type="text" class="form-control" name="client-id" required> -->
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="client-id" class="col-md-4 col-form-label text-md-right">{{ __('Select Task') }}</label>

                            <div class="col-md-6">
                            <select name="task" class="form-control">
                            <option value="{{$taskusers->task_id}}">{{$taskusers->task}}</option>
                            @foreach($tasks as $task)
                                @if($taskusers->task_id != $task['id'])
                                  <option value="{{$task['id']}}">{{$task['name']}}</option>
                                @endif
                            @endforeach                            
                            </select>
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
