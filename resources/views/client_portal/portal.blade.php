@extends("client_portal.dashboard")

@section('content')

<!-- For isolating first iteration of foreach loop -->
@php


$i = 1 @endphp




            
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
                                              <tr>
                                                <td>
                                                  <a href="#contact-{{$client->id}}" class="client-link">{{$client->title}}</a>
                                                </td>

                                                <td>
                                                    {{$client->area['name']}}
                                                </td>
                                                <td>
                                                    {{$client->statuses['name']}}
                                                </td>
                                            </tr> 
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
                                  <button type="button" data-id="{{$client->id}}" class="btn btn-info btn_edit btn-block btn-sm edit_button">
                                    <i class="fa fa-edit"></i>Edit Client
                                  </button>
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
                                        <span class="float-right">
                                          <small>{{$client->businessType['name']}}</small>
                                        </span> 
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

                                  <li class="list-group-item fist-item text-center">

                                  @if( (\Auth::user()->type == 'admin') )
                                    <button data-id = "{{$client->id}}" type="submit" class="btn btn-danger btn_delete btn-block alert-confirm-admin">
                                      <span class="glyphicon glyphicon-trash"></span>Delete
                                    </button>

                                  @elseif( (\Auth::user()->type == 'agent'))
                                    <button data-id="{{$client->id}}" class="btn btn-danger btn_delete btn-block alert-prompt" type="submit">
                                      <span class="glyphicon glyphicon-trash"></span>Delete
                                    </button>
                                  @endif
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
                                  <button type="button" data-id="{{$client->id}}" class="btn btn-info btn_edit btn-block btn-sm edit_button">
                                    <i class="fa fa-edit"></i>Edit Client
                                  </button>
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
                                        <span class="float-right">
                                            <small>{{$client->businessType['name']}}</small>
                                        </span> 
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

                                  <li class="list-group-item fist-item text-center">
                                    @if( (\Auth::user()->type == 'admin') )
                                    <button data-id = "{{$client->id}}" type="submit" class="btn btn-danger btn_delete btn-block alert-confirm-admin">
                                      <span class="glyphicon glyphicon-trash"></span>Delete
                                    </button>

                                  @elseif( (\Auth::user()->type == 'agent'))
                                        <button data-id="{{$client->id}}" class="btn btn-danger btn_delete btn-block alert-prompt" type="submit">
                                          <span class="glyphicon glyphicon-trash"></span>Delete
                                        </button>
                                  @endif
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
                              {!! csrf_field() !!}
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
                              <form class="form" action="" method="" id="edit_client_form">
                              {!! csrf_field() !!}

                                <input type="hidden" value="" name="id" id="id">
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><i class="icofont icofont-user"></i></span>
                                    <input  id="edit_name" type="text" name="title" class="form-control" placeholder="Client Name" value="" required autofocus>
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon2"><i class="icofont icofont-user"></i></span>
                                    <input id="edit_email" type="email" name="email" class="form-control" placeholder="Client Email" value="" required>
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><i class="icofont icofont-user"></i></span>
                                    <input id="edit_phone" type="text" name="phone" class="form-control" placeholder="Phone Number" value="" required>
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon4"><i class="icofont icofont-user"></i></span>
                                    <input id = 'edit_website' type="url" name = "website" class="form-control" placeholder="Website">
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon5"><i class="icofont icofont-user"></i></span>
                                    <select class="form-control" name="business_type">
                                    <option id="edit_businessType" value="">---Select Business Type---</option>
                                    @foreach($businesstypes as $bt)
                                    <option value="{{$bt->id}}">{{$bt->name}}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon6"><i class="icofont icofont-user"></i></span>
                                    <select class="form-control" name="area">
                                    <option id="edit_area" value="">---Select Area---</option>
                                    @foreach($areas as $area)
                                    <option value="{{$area->id}}">{{$area->name}}</option>
                                    @endforeach
                                    </select>
                                </div>

                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon6"><i class="icofont icofont-user"></i></span>
                                    <select class="form-control" name="status">
                                    <option id="edit_status" value="">---Select Current Status---</option>
                                    @foreach($status as $st)
                                    <option value="{{$st->id}}">{{$st->name}}</option>
                                    @endforeach
                                    </select>
                                </div>

                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon7"><i class="icofont icofont-user"></i></span>
                                    <textarea value="" id="dropper-default" name="description" class="form-control edit_description" type="textarea" placeholder="Description..."></textarea>
                                </div>
                              </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" id="modal_submit_edit" class="btn btn-primary btn_submit">Edit Client</button>
                                <button type="button" class="btn btn_danger btn-danger" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Edit Client modal end -->











                
                <div class="md-overlay"></div>

            </div>

<button type="button" style="display:none" class="btn btn-success btn-sm" id="pnotify-success">Click here! <i class="icofont icofont-play-alt-2"></i></button>
<button type="button" style="display:none" class="btn btn-success btn-sm" id="pnotify-danger">Click here! <i class="icofont icofont-play-alt-2"></i></button>

@endsection