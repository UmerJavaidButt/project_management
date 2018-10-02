@extends("client_portal.dashboard")

@section('content')

<!-- For isolating first iteration of foreach loop -->
@php $i = 1 @endphp




            
            <div class="page-body">
                <div class="justify-content-center">
                  <div class="row">
                    <div class="col-sm-8">
                      <div class="wrapper wrapper-content animated fadeInUp">
                        <div class="ibox">
                          <div class="ibox-title">
                            <h5><strong>Clients</strong></h5>
                            <div class="ibox-tools">
                                <button class="btn btn_submit btn-primary btn-block" data-toggle="modal" data-target="#sign-in-modal">Add Client</button>
                            </div>
                          </div>

                          @if(empty($clients) )
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
                                                <th>Area</th>
                                                <th>Status</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($clients as $client)
                                              @if($client->delete_bit == 0)
                                              <tr>
                                                <td>
                                                  <a href="#contact-{{$client->id}}" class="client-link">{{$client->title}}</a>
                                                </td>

                                                <td>
                                                  @foreach($areas as $area)
                                                    @if($area->id == $client->area_id)
                                                        {{$area->name}}
                                                    @endif
                                                  @endforeach
                                                </td>
                                                <td>
                                                  @foreach($status as $st)
                                                    @if($st->id == $client->status)
                                                    <span class="float-right">
                                                      {{$st->name}}
                                                    </span>
                                                    @endif
                                                @endforeach
                                                </td>
                                            </tr> 
                                            @endif  
                                          @endforeach
                                            </tbody>
                                            <tfoot>
                                              <tr>
                                                <th>Name</th>
                                                <th>Area</th>
                                                <th>Status</th>
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
                          @if($i == 1) <!-- The tab pan for the first client automatically shows up -->
                            <div class="tab tab-pane active details-pane" id="contact-{{$client->id}}">
                              <div class="row m-b-lg">
                                <div class="col-lg-12 text-center">
                                  <h2>{{$client->title}}</h2>
                                  <div class="m-b-sm">
                                    <img src="http://localhost:8000/dashboard_assets/assets/images/user.png" class="rounded-circle" style="width:62px" alt="picture">
                                  </div>
                                </div>
                                <div class="col-lg-12 text-center">
                                  <strong>Description</strong>
                                  <p>{{$client->description}}</p>
                                  <a type="button" href="{{ action('ClientPortalController@edit', $client->id) }}" class="btn btn-info btn_edit btn-block btn-sm">
                                    <i class="fa fa-edit"></i>Edit Client
                                  </a>
                                </div>
                              </div>
                              <div class="client-detail">
                                <strong>Details</strong>
                                <ul class="list-group clear-list">

                                  <li class="list-group-item fist-item">
                                    <div>
                                      <span>Email:</span>
                                    </div>

                                    <div>
                                      <span class="float-right">
                                        <small>{{$client->email}}</small>
                                      </span>
                                    </div>
                                  </li>

                                  <li class="list-group-item fist-item">
                                    <div>
                                      <span>Number:</span>
                                    </div>

                                    <div>
                                      <span class="float-right">
                                        <small>{{$client->phone}}</small>
                                      </span>
                                    </div>
                                  </li>

                                  <li class="list-group-item fist-item">
                                    <div>
                                      <span>Business Type:</span>
                                    </div>

                                    <div>
                                        @foreach($businesstypes as $bt)
                                            @if($bt->id == $client->business_type)
                                                <span class="float-right">
                                                  <small>{{$bt->name}}</small>
                                                </span> 
                                            @endif
                                        @endforeach
                                    </div>
                                  </li>

                                  <li class="list-group-item fist-item">
                                    
                                    <div>
                                      <span>Website:</span>
                                    </div>
                                    
                                    <div>
                                     @if($client->website)
                                      <span class="float-right">
                                        <small>{{$client->website}}</small>
                                      </span>
                                    @else
                                      <span class="float-right">N/A</span>
                                    @endif
                                    </div>
                                  </li>
                                  
                                  <li class="list-group-item fist-item">

                                  <div>
                                    <span>Status:</span>
                                  </div>

                                  <div>
                                     @foreach($status as $st)
                                        @if($st->id == $client->status)
                                        <span class="float-right">
                                          <small>{{$st->name}}</small>
                                        </span>
                                        @endif
                                    @endforeach
                                  </div>
                                  </li>

                                  <li class="list-group-item fist-item text-center">
                                    <form action="{{ action('ClientPortalController@destroy', $client->id) }}" method="post">
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button class="btn btn-danger btn_delete" type="submit">
                                          <span class="glyphicon glyphicon-trash"></span>Delete
                                        </button>
                                      </form>
                                  </li>
                                </ul>
                              </div>
                            </div>
                            @php $i++; @endphp
                          @elseif($i > 1)
                            <div class="tab tab-pane details-pane" id="contact-{{$client->id}}">
                              <div class="row m-b-lg">
                                <div class="col-lg-12 text-center">
                                  <h2>{{$client->title}}</h2>
                                  <div class="m-b-sm">
                                    <img src="http://localhost:8000/dashboard_assets/assets/images/user.png" class="rounded-circle" style="width:62px" alt="picture">
                                  </div>
                                </div>
                                <div class="col-lg-12 text-center">
                                  <strong>Description</strong>
                                  <p>{{$client->description}}</p>
                                  <a href="{{ action('ClientPortalController@edit', $client->id) }}" class="btn btn-info btn_edit btn-block btn-sm">
                                    <i class="fa fa-edit"></i>Edit Client
                                  </a>
                                </div>
                              </div>
                              <div class="client-detail">
                                <strong>Details</strong>
                                <ul class="list-group clear-list">
                                  <li class="list-group-item fist-item">
                                    <div>
                                      <span>Email:</span>
                                    </div>
                                    <div>
                                      <span class="float-right">
                                          <small>{{$client->email}}</small>
                                      </span>
                                    </div>
                                  </li>

                                  <li class="list-group-item fist-item">
                                    <div>
                                      <span>Number:</span>
                                    </div>

                                    <div>
                                      <span class="float-right">
                                          <small>{{$client->phone}}</small>
                                      </span>
                                    </div>
                                  </li>
                                  <li class="list-group-item fist-item">
                                    <div class="">
                                      <span class="">Business Type:</span>
                                    </div>
                                    <div>
                                        @foreach($businesstypes as $bt)
                                            @if($bt->id == $client->business_type)
                                                <span class="float-right">
                                                    <small>{{$bt->name}}</small>
                                                </span> 
                                            @endif
                                        @endforeach
                                    </div>
                                  </li>

                                  <li class="list-group-item fist-item">
                                    <div>
                                      <span>Website:</span>
                                    </div>
                                    
                                    <div class="">
                                     @if($client->website)
                                      <span class="float-right"> 
                                        <small>{{$client->website}}</small>
                                      </span>
                                    @else
                                      <span class="float-right">N/A</span>
                                    @endif
                                    </div>
                                  </li>

                                  <li class="list-group-item fist-item">
                                    <div>
                                      <span>Status:</span>
                                    </div>

                                     @foreach($status as $st)
                                        @if($st->id == $client->status)
                                        <span class="float-right">
                                            <small>{{$st->name}}</small>
                                        </span>
                                        @endif
                                    @endforeach
                                  </li>

                                  <li class="list-group-item fist-item text-center">
                                    <form action="{{ action('ClientPortalController@destroy', $client->id) }}" method="post">
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button class="btn btn-danger btn_delete" type="submit">
                                          <span class="glyphicon glyphicon-trash"></span>Delete
                                        </button>
                                      </form>
                                  </li>

                                </ul>
                              </div>
                            </div>
                          @endif
                          @endforeach
                          </div>
                        </div>
                      </div>
                    </div>

                    @endif

                  </div>
                </div>

                <!-- Add Client Start Model -->

                <div class="modal fade" id="sign-in-modal" tabindex="-1">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Register Client Details</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body p-b-0">
                              <form class="form" action="" method="" id="client_form">
                              @csrf
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><i class="icofont icofont-user"></i></span>
                                    <input type="text" name="title" class="form-control" placeholder="Client Name" value="{{ old('title') }}" required autofocus>
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon2"><i class="icofont icofont-user"></i></span>
                                    <input type="email" name="email" class="form-control" placeholder="Client Email" value="{{ old('email') }}" required>
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><i class="icofont icofont-user"></i></span>
                                    <input type="text" name="phone" class="form-control" placeholder="Phone Number" value="{{ old('phone') }}" required>
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon4"><i class="icofont icofont-user"></i></span>
                                    <input type="url" name = "website" class="form-control" placeholder="Website">
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon5"><i class="icofont icofont-user"></i></span>
                                    <select class="form-control" name="business_type">
                                    <option value="">---Select Business Type---</option>
                                    @foreach($businesstypes as $bt)
                                    <option value="{{$bt->id}}">{{$bt->name}}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon6"><i class="icofont icofont-user"></i></span>
                                    <select class="form-control" name="area">
                                    <option value="">---Select Area---</option>
                                    @foreach($areas as $area)
                                    <option value="{{$area->id}}">{{$area->name}}</option>
                                    @endforeach
                                    </select>
                                </div>

                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon6"><i class="icofont icofont-user"></i></span>
                                    <select class="form-control" name="status">
                                    <option value="">---Select Current Status---</option>
                                    @foreach($status as $st)
                                    <option value="{{$st->id}}">{{$st->name}}</option>
                                    @endforeach
                                    </select>
                                </div>

                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon7"><i class="icofont icofont-user"></i></span>
                                    <textarea id="dropper-default" name="description" class="form-control" type="textarea" placeholder="Description..."></textarea>
                                </div>
                              </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" id="modal_submit" class="btn btn-primary btn_submit">Add Client</button>
                                <button type="button" class="btn btn_danger btn-danger" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Add Client modal end -->

                <!-- Edit Client Model -->

                <div class="modal fade" id="edit-modal" tabindex="-1">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Client Details</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body p-b-0">
                              <form class="form" action="" method="" id="client_form">
                              @csrf
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><i class="icofont icofont-user"></i></span>
                                    <input type="text" name="title" class="form-control" placeholder="Client Name" value="{{ old('title') }}" required autofocus>
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon2"><i class="icofont icofont-user"></i></span>
                                    <input type="email" name="email" class="form-control" placeholder="Client Email" value="{{ old('email') }}" required>
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><i class="icofont icofont-user"></i></span>
                                    <input type="text" name="phone" class="form-control" placeholder="Phone Number" value="{{ old('phone') }}" required>
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon4"><i class="icofont icofont-user"></i></span>
                                    <input type="url" name = "website" class="form-control" placeholder="Website">
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon5"><i class="icofont icofont-user"></i></span>
                                    <select class="form-control" name="business_type">
                                    <option value="">---Select Business Type---</option>
                                    @foreach($businesstypes as $bt)
                                    <option value="{{$bt->id}}">{{$bt->name}}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon6"><i class="icofont icofont-user"></i></span>
                                    <select class="form-control" name="area">
                                    <option value="">---Select Area---</option>
                                    @foreach($areas as $area)
                                    <option value="{{$area->id}}">{{$area->name}}</option>
                                    @endforeach
                                    </select>
                                </div>

                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon6"><i class="icofont icofont-user"></i></span>
                                    <select class="form-control" name="status">
                                    <option value="">---Select Current Status---</option>
                                    @foreach($status as $st)
                                    <option value="{{$st->id}}">{{$st->name}}</option>
                                    @endforeach
                                    </select>
                                </div>

                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon7"><i class="icofont icofont-user"></i></span>
                                    <textarea id="dropper-default" name="description" class="form-control" type="textarea" placeholder="Description..."></textarea>
                                </div>
                              </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" id="modal_submit" class="btn btn-primary btn_submit">Add Client</button>
                                <button type="button" class="btn btn_danger btn-danger" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Edit Client modal end -->











                <div class="md-modal md-effect-19" id="modal-20">
                    <div class="md-content">
                        <h3 class="f-26">Add Client</h3>
                        <div>
                        <form class="form" action="" method="" id="client_form">
                        @csrf
                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1"><i class="icofont icofont-user"></i></span>
                                <input type="text" name="name" class="form-control" placeholder="Client Name">
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon2"><i class="icofont icofont-user"></i></span>
                                <input type="text" name="email" class="form-control" placeholder="Client Email">
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1"><i class="icofont icofont-user"></i></span>
                                <input type="text" name="Phone" class="form-control" placeholder="Phone Number">
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon4"><i class="icofont icofont-user"></i></span>
                                <input type="text" name = "website" class="form-control" placeholder="Website">
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon5"><i class="icofont icofont-user"></i></span>
                                <select type="text" class="form-control" name="b_type">
                                <option value="">---Select Business Type---</option>
                                @foreach($businesstypes as $bt)
                                <option value="{{$bt->id}}">{{$bt->name}}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon6"><i class="icofont icofont-user"></i></span>
                                <select type="number" class="form-control" name="area">
                                <option value="">---Select Area---</option>
                                @foreach($areas as $area)
                                <option value="{{$area->id}}">{{$area->name}}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon7"><i class="icofont icofont-user"></i></span>
                                <textarea id="dropper-default" name="description" class="form-control" type="text" placeholder="Description..."></textarea>
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon6"><i class="icofont icofont-user"></i></span>
                                <select type="number" class="form-control" name="status">
                                <option value="">---Select Current Status---</option>
                                @foreach($status as $st)
                                <option value="{{$st->id}}">{{$st->name}}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="text-center">
                                <button type="button" id="modal_submit" class="btn btn_submit btn-primary waves-effect m-r-20 f-w-600 d-inline-block">Save</button>
                                <button type="button" class="btn btn_danger btn-danger waves-effect m-r-20 f-w-600 md-close d-inline-block">Close</button>
                            </div>
                          </form> 
                        </div>
                    </div>
                </div>
                <div class="md-overlay"></div>

            </div>

<button type="button" style="display:none" class="btn btn-success btn-sm" id="pnotify-success">Click here! <i class="icofont icofont-play-alt-2"></i></button>
<button type="button" style="display:none" class="btn btn-success btn-sm" id="pnotify-danger">Click here! <i class="icofont icofont-play-alt-2"></i></button>

@endsection