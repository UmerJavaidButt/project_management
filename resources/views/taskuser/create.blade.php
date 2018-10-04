@extends('admin.manage')

@section('content')

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container">
                <div class="heading text-center">
                    <h1>Assign the Employee to {{$task->name}}</h1>
                </div>
            </div>
        </div>


            @if ($errors->has('msg'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('msg') }}</strong>
                </span>
            @endif
        

        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ url('taskuser') }}" aria-label="{{ __('Assign Task') }}">
                        {!! csrf_field() !!}
                        <input type="hidden" value="{{$task->id}}" name="task">

                        <div class="form-group row">
                            <label for="client-id" class="col-md-4 col-form-label text-md-right">{{ __('Select Employee') }}</label>

                            <div class="col-md-6">
                            <select name="employee" class="form-control">
                            <option>None</option>
                            @foreach($employees as $emp)
                                  <option value="{{$emp->id}}"><a href="">{{$emp->name}}</a></option>
                            @endforeach                            
                            </select>
                                <!-- <input id="client-id" type="text" class="form-control" name="client-id" required> -->
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
