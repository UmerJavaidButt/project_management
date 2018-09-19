@extends("admin.manage")

@section('content')

<div class="row wrapper border-bottom white-bg page-heading dashboard_projects_heading">
    <div class="col-sm-4">
       <h2>Clients</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><strong>Clients</strong></li>
        </ol>
    </div>
</div>

<div class="justify-content-center">
  <div class="row">
    <div class="col-sm-8">
      <div class="wrapper wrapper-content animated fadeInUp">
        <div class="ibox">
          <div class="ibox-title">
            <h5><strong>List of the Clients</strong></h5>
            <div class="ibox-tools">
              <a href="{{ url('client/create') }}" class="btn-primary btn-xs create_new_project">Register New Client</a>
            </div>
          </div>

          @if($clients->isEmpty())
            <span class="label label-danger">No Record Found!</span>
          @else

          <!-- Experiment -->
          <div class="row m-t-sm">
                  <div class="col-lg-12">
                    <div class="panel blank-panel">
                      <div class="panel-heading">
                        <div class="panel-options">
                          <ul class="nav nav-tabs">
                            <li>
                              <a href="javascript:void(0)" class="nav-link active show">
                                <strong>Clients</strong>
                              </a>
                            </li>
                          </ul>
                        </div>
                      </div>

                      <div class="panel-body">
                        <div class="tab-content">
                          <div class="tab-pane active show admin_projects_page">                              
                            <div class="dt-responsive table-responsive">
                              <table id="footer-search" class="table table-striped table-bordered nowrap">
                                <thead>
                                  <tr>
                                    <th>Name</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                @foreach($clients as $client)
                                  <tr>
                                    <td>
                                      <a href="#contact-{{$client->id}}" class="client-link">{{$client->name}}</a>
                                    </td>

                                    <td>
                                      <form action="{{ action('ClientController@destroy', $client->id) }}" method="post">
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button class="btn btn-danger btn_delete" type="submit">
                                          <span class="glyphicon glyphicon-trash"></span>Delete
                                        </button>
                                      </form>
                                  </td>
                                </tr>
                                  
                                @endforeach
                                </tbody>
                                <tfoot>
                                  <tr>
                                    <th>Name</th>
                                    <th></th>
                                  </tr>
                                </tfoot>
                              </table>
                            </div>  
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
          <!-- Another Experiment -->
        </div>
      </div>
    </div>
    
    <div class="col-sm-4 client_view_details hide">
      <div class="ibox selected">
        <div class="ibox-content client_view_detail">
          <div class="tab-content">
          @foreach($clients as $client)
            <div class="tab tab-pane details-pane" id="contact-{{$client->id}}">
              <div class="row m-b-lg">
                <div class="col-lg-12 text-center">
                  <h2>{{$client->name}}</h2>
                  <div class="m-b-sm">
                    <img src="http://localhost:8000/dashboard_assets/assets/images/user.png" class="rounded-circle" style="width:62px" alt="picture">
                  </div>
                </div>
                <div class="col-lg-12 text-center">
                  <strong>About me</strong>
                  <p>{{$client->description}}</p>
                  <a href="{{ action('ClientController@edit', $client->id) }}" class="btn btn-info btn_edit btn-block btn-sm">
                    <i class="fa fa-edit"></i>Edit Client
                  </a>
                </div>
              </div>
              <div class="client-detail">
                <strong>Details</strong>
                <ul class="list-group clear-list">
                  <li class="list-group-item fist-item">
                    <span class="float-right">{{$client->email}}</span>
                    Email:
                  </li>
                  <li class="list-group-item fist-item">
                    <span class="float-right">{{$client->number}}</span>
                    Number:
                  </li>
                  <li class="list-group-item fist-item">
                    @if($client->whatsapp)
                      <span class="float-right">{{$client->whatsapp}}</span>
                    @else
                      <span class="float-right">N/A</span>
                    @endif
                    Whatsapp:
                  </li>
                  <li class="list-group-item fist-item">
                     @if($client->website)
                      <span class="float-right">{{$client->website}}</span>
                    @else
                      <span class="float-right">N/A</span>
                    @endif
                    Website:
                  </li>
                  <li class="list-group-item fist-item">
                     @if($client->business)
                      <span class="float-right">{{$client->business}}</span>
                    @else
                      <span class="float-right">N/A</span>
                    @endif
                    Business:
                  </li>
                  <li class="list-group-item fist-item">
                     @if($client->address)
                      <span class="float-right">{{$client->address}}</span>
                    @else
                      <span class="float-right">N/A</span>
                    @endif
                    Address:
                  </li>
                  <li class="list-group-item fist-item">
                    <span class="float-right">{{$client->country}}</span>
                    Country:
                  </li>
                </ul>
              </div>
            </div>
          @endforeach
          </div>
        </div>
      </div>
    </div>

    @endif

  </div>
</div>
@endsection



