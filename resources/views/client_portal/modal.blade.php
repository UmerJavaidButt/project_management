

            <!-- Add Contact Start Model -->
                <div class="md-modal md-effect-13 addcontact" id="modal-13">
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
                                <select type="number" class="form-control" name="b_type">
                                <option value="">---Select Business Type---</option>
                                @foreach($business_type as $b_type)
                                <option value="{{$b_type->id}}">{{$b_type->name}}</option>
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
                                @foreach($status as $sta)
                                <option value="{{$sta->id}}">{{$sta->name}}</option>
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