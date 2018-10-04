@extends('admin.manage')

@section('content')

<?php 
// echo "<pre>";
// var_dump($teammembers);
// die();
?>

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container">
                <div class="heading text-center">
                    <h1>Assign Members to Teams</h1>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ action('TeamMemberController@update', $id) }}" aria-label="{{ __('Teams & Members') }}">
                        {!! csrf_field() !!}
                        <input name="_method" type="hidden" value="PATCH">
                        <div class="form-group row">
                            <label for="client-id" class="col-md-4 col-form-label text-md-right">{{ __('Select Employee') }}</label>

                            <div class="col-md-6">
                            <select name="employee_id" class="form-control">
                            <option value="{{$teammembers->employee_id}}">{{$teammembers->employee}}</option>
                            @foreach($employees as $emp)
                                @if($emp['designation'] != 1 && $emp['designation'] != '2' && $emp['id'] != $teammembers->employee_id )
                                  <option value="{{$emp['id']}}">{{$emp['name']}}</option>
                                @endif
                            @endforeach                            
                            </select>
                                <!-- <input id="client-id" type="text" class="form-control" name="client-id" required> -->
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="client-id" class="col-md-4 col-form-label text-md-right">{{ __('Select Team') }}</label>

                            <div class="col-md-6">
                            <select name="team_id" class="form-control">
                            <option value="{{$teammembers->team_id}}">{{$teammembers->team}}</option>
                            @foreach($teams as $team)
                                @if($team['id'] != $teammembers->team_id)
                                  <option value="{{$team['id']}}">{{$team['name']}}</option></a>
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
