@extends('admin.manage')

@section('content')
<?php 
// echo "<pre>";
// var_dump($employee);
// die();
?>

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container">
                <div class="heading text-center">
                    <h1>Edit Employee Record</h1>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{action('EmployeeController@update', $id)}}" aria-label="{{ __('Update Employee') }}">
                            @csrf
                            <input name="_method" type="hidden" value="PATCH">
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{$employee->name}}" required autofocus>

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
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{$employee->email}}" required>

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
                                    <input id="number" type="text" class="form-control" name="number" value="{{$employee->number}}" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="designation" class="col-md-4 col-form-label text-md-right">{{ __('Designation') }}</label>

                                <div class="col-md-6">
                                    <select name="designation" class="form-control">
                                    <option value="{{$employee->designation}}"> {{ $employee->designationName }}</option>
                                    @foreach($designation as $des)
	                                    <?php if($employee->designation != $des['designation']) { ?>
	                                        <option value="{{$des['id']}}"> {{ $des['designation'] }}</option>
	                                    <?php } ?>
                                    @endforeach                            
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="client-id" class="col-md-4 col-form-label text-md-right">{{ __('Select Team') }}</label>

                                <div class="col-md-6">
                                <select name="team-id" class="form-control" id="select_emp_team">
                                <option value="{{$employee->team_id}}" id="employee_team_option">{{$employee->team}}</option>
                                @foreach($teams as $team)
	                                <?php if($employee->team_id != $team['id']){ ?>
	                                    <option value="{{$team['id']}}" id="employee_team_option">{{$team['name']}}</option>
	                                <?php } ?>
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
        <!-- /#page-content-wrapper -->
