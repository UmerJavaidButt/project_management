@extends('admin.manage')

@section('content')

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container">
                <div class="heading text-center">
                    <h1>Add New Projects</h1>
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
            <div class="col-md-10 col-sm-12 col-xs-12 col-xl-10 col-lg-10">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ url('project') }}" aria-label="{{ __('Register Project') }}" style="padding:20px" id="j-pro" class="j-pro">
                            <div class="">    
                                @csrf
                                <div class="form-group row">
                                    <label for="name" class="col-lg-3 col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                    <div class="col-md-6 col-lg-7">
                                        <input id="name" type="text" placeholder="Project Name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="project_url" class="col-lg-3 col-md-3 col-form-label text-md-right">{{ __('Project URL') }}</label>

                                    <div class="col-md-6 col-lg-7">
                                        <input id="project_url" type="text" placeholder="www.example.com" class="form-control{{ $errors->has('project_url') ? ' is-invalid' : '' }}" name="project_url" value="{{ old('project_url') }}" autofocus>

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
                                        <select name="client_id" class="form-control">
                                        <option>~None~</option>
                                        @foreach($clients as $client)
                                              <option value="{{$client['id']}}">{{$client['name']}}</option>
                                        @endforeach                            
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="recruiter-id" class="col-md-3 col-form-label text-md-right">{{ __('Agent') }}</label>

                                    <div class="col-md-7">
                                        <select name="agent_id" class="form-control">
                                        <option>~None~</option>
                                        @foreach($recs as $rec)
                                              <option value="{{ $rec['id'] }}">{{$rec['name']}}</option>
                                        @endforeach                            
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="date" class="col-md-3 col-form-label text-md-right">{{ __('Start Date') }}</label>

                                    <div class="col-md-7">
                                        <input type="date" name="start_date" class="date form-control" id="datepicker">
                                        <span class="label label-info">Start Date must be Today or afterwards.</span>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="date" class="col-md-3 col-form-label text-md-right">{{ __('DeadLine') }}</label>

                                    <div class="col-md-7">
                                        <input type="date" name="deadline" class="date form-control" id="datepicker">
                                        <span class="label label-info">Deadline must be after Start Date of the Project</span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="client-id" class="col-md-3 col-form-label text-md-right">{{ __('Total Price ($)') }}</label>

                                    <div class="col-md-7">
                                        <input id="total_price" type="number" class="form-control" name = "price" placeholder= "Total Price" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="description" class="col-md-3 col-form-label text-md-right">{{ __('Brief Description') }}</label>

                                    <div class="col-md-7">
                                        <textarea id="description" type="textarea" placeholder="Description..." class="form-control" name="description" required></textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-7">
                                        <button type="submit" class="btn btn-info btn_submit">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    @endsection
    <!-- /#wrapper -->
    