@extends('admin.manage')

@section('content')

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container">
                <div class="heading text-center">
                    <h1>Assign Members to Teams</h1>
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
                        <form method="POST" action="{{ url('teammember') }}" aria-label="{{ __('Teams & Members') }}">
                        {!! csrf_field() !!}
                        <div class="form-group row">
                            <label for="client-id" class="col-md-4 col-form-label text-md-right">{{ __('Select Employee') }}</label>

                            <div class="col-md-6">
                            @if($employees->isEmpty() )
                                <span class="form-control">No Employees found!</span>
                            @else
                                <select name="employee_id" class="form-control">
                                <option value="">None</option>
                                @foreach($employees as $emp)
                                	@if($emp->designation->designation != 'Team Lead')
                                      <option value="{{$emp->id}}">{{$emp->name}}</option>
                                    @endif
                                @endforeach                            
                                </select>
                            @endif
                                <!-- <input id="client-id" type="text" class="form-control" name="client-id" required> -->
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="client-id" class="col-md-4 col-form-label text-md-right">{{ __('Select Team') }}</label>

                            <div class="col-md-6">
                            @if($teams->isEmpty() )
                                <span class="form-control">No teams has been registered yet!</span>
                            @else
                                <select name="team_id" class="form-control">
                                <option value="">None</option>
                                @foreach($teams as $team)
                                      <option value="{{$team['id']}}">{{$team['name']}}</option></a>
                                @endforeach                            
                                </select>
                            @endif
                                <!-- <input id="client-id" type="text" class="form-control" name="client-id" required> -->
                            </div>
                        </div>

                        <div class="form-group row">

                            <div class="col-md-4"></div>
                            <div class="col-md-6">
                                @if($employees->isEmpty() || $teams->isEmpty())
                                    <button type="submit" class="btn btn-primary btn_submit" disabled>
                                        {{ __('Assign') }}
                                    </button>
                                @else
                                    <button type="submit" class="btn btn-primary btn_submit">
                                        {{ __('Assign') }}
                                    </button>
                                @endif
                            </div>
                        </div>

                        </form>                        
                    </div>
                </div>
            </div>
        </div>
@endsection
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- <script src="/public/jquery/jquery.min.js"></script> -->
<script type="text/javascript">
    $('#datepicker').datepicker({
        autoclosed: true,
        format: 'dd-mm-yyyy'
    });
    </script>
