@extends('admin.manage')

@section('content')

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container">
                <div class="heading text-center">
                    <h1>New Milestone for {{$project->name}}</h1>
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
                        <form method="POST" action="{{ url('milestone') }}" aria-label="{{ __('Add Milestone') }}">
                        {!! csrf_field() !!}
                        
                        <input id="project" type="hidden" class="form-control" name="project_id" value="{{$project->id}}">
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" placeholder="Name of milestone" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="number" class="col-md-4 col-form-label text-md-right">{{ __('Cost (in $)') }}</label>

                            <div class="col-md-6">
                                <input type="number" placeholder="0.00" required name="cost" min="0" max="{{$limit}}" value="0" step="0.01" title="Cost for Milestone" pattern="^\d+(?:\.\d{1,2})?$" onblur="
                                this.parentNode.parentNode.style.backgroundColor=/^\d+(?:\.\d{1,2})?$/.test(this.value)?'inherit':'red'" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('Date') }}</label>

                            <div class="col-md-6">
                                <input type="date" name="date" class="date form-control" id="datepicker" min="{{$project->start_date}}" max="{{$project->deadline}}" required>
                                <span class="label label-info">Date must be between {{$project->start_date}} and {{$project->deadline}}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Brief Description') }}</label>

                            <div class="col-md-6">
                                <textarea id="description" type="textarea" placeholder="Description" class="form-control" name="description" required></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                        <div class="col-md-4"></div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn_submit">
                                    {{ __('Create') }}
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
    <!-- /#wrapper -->

    