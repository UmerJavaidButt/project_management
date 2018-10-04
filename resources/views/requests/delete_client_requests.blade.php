@extends("client_portal.dashboard")

@section('content')

<div class="page-body">
	<div class="justify-content-center">
	  	<div class="row">
	    	<div class="col-sm-12">
	      		<div class="wrapper wrapper-content animated fadeInUp">
	      			<div class="ibox">
                      <div class="ibox-title">
                        <h5><strong>Pending Requests</strong></h5>
                      </div>

                      @if(empty($requests) )
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
                                                <th>Reason</th>
                                                <th>Action</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($requests as $req)
                                              <tr>
                                                <td>
                                                  <a href="javascript:void(0)" type="button" data-id="{{$req->client->id}}" class="client-link client_details_button">
                                                    {{$req->client->title}}
                                                  </a>
                                                </td>
                                                  
                                                <td>
                                                  {{$req->reason}}
                                                </td>

                                                <td>
                                                	<button data-id="{{$req->client->id}}" type="button" class="btn btn-danger alert-confirm-deletion">Approve</button>
                                                	<button data-id="{{$req->client->id}}" type="button" class="btn btn-success alert-decline-deletion">Decline</button>
                                                </td>
                                            </tr> 
                                          @endforeach
                                            </tbody>
                                            <tfoot>
                                              <tr>
                                                <th>Name</th>
                                                <th></th>
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
                        @endif
                    </div>
	      		</div>
	    	</div>
	  	</div>
	</div>

<!-- Edit Client Model -->

  <div class="modal fade" id="details-modal" tabindex="-1">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title">Requested Client Details</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body p-b-0">

                  <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1"><i class="icofont icofont-user"></i></span>
                      <span  id="client_name" class="form-control"></span>
                  </div>
                  <div class="input-group">
                      <span class="input-group-addon" id="basic-addon2"><i class="icofont icofont-user"></i></span>
                      <span  id="client_email" class="form-control"></span>
                  </div>
                  <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1"><i class="icofont icofont-user"></i></span>
                      <span  id="client_phone" class="form-control"></span>
                  </div>
                  <div class="input-group">
                      <span class="input-group-addon" id="basic-addon4"><i class="icofont icofont-user"></i></span>
                      <span  id="client_website" class="form-control"></span>
                  </div>
                  <div class="input-group">
                      <span class="input-group-addon" id="basic-addon5"><i class="icofont icofont-user"></i></span>
                      <span  id="client_businessType" class="form-control"></span>
                  </div>
                  <div class="input-group">
                      <span class="input-group-addon" id="basic-addon6"><i class="icofont icofont-user"></i></span>
                      <span  id="client_area" class="form-control"></span>
                  </div>

                  <div class="input-group">
                      <span class="input-group-addon" id="basic-addon6"><i class="icofont icofont-user"></i></span>
                      <span  id="client_status" class="form-control"></span>
                  </div>

                  <div class="input-group">
                      <span class="input-group-addon" id="basic-addon7"><i class="icofont icofont-user"></i></span>
                      <textarea value="" id="dropper-default" name="description" class="form-control client_description" type="textarea" disabled="disabled"></textarea>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn_danger btn-success" data-dismiss="modal">Done</button>
              </div>
          </div>
      </div>
  </div>
  <!-- Edit Client modal end -->

</div>


@endsection