
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Client FollowUp Portal</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
        

    <!-- Favicon icon -->
    <link rel="icon" href = "{{ asset('dashboard_assets/assets/images/favicon.ico') }}" type="image/x-icon') }}">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href = "{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href= "{{ asset('dashboard_assets/assets/icon/themify-icons/themify-icons.css') }}">

    <!-- Data Table Css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_assets/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_assets/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_assets/assets/css/component.css') }}">
    
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href= "{{ asset('dashboard_assets/assets/icon/icofont/css/icofont.css') }}">
    <!-- flag icon framework css -->
    <link rel="stylesheet" type="text/css" href= "{{ asset('dashboard_assets/assets/pages/flag-icon/flag-icon.min.css') }}">

    <!-- Horizontal-Timeline css -->
    <link rel="stylesheet" type="text/css" href= "{{ asset('dashboard_assets/assets/css/timeline/style.css') }}">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href= "{{ asset('dashboard_assets/assets/css/style.css') }}">

    <!-- color .css -->
    <link rel="stylesheet" type="text/css" href= "{{ asset('dashboard_assets/assets/css/color/color-1.css') }}" id="color">
</head>

<body class="fix-menu">
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="ball-scale">
            <div></div>
        </div>
    </div>
    <!-- Pre-loader end -->
    <!-- Menu header start -->
    <nav class="navbar header-navbar">
        <div class="navbar-wrapper">
            <div class="navbar-logo">
                <a class="mobile-menu" id="mobile-collapse" href="javascript:void(0)">
                    <i class="ti-menu"></i>
                </a>
                <a href="{{ url('admin') }}" class="text-white d-none d-lg-block">
                    <span class="">Client FollowUp</span>
                </a>
                <a class="mobile-options">
                    <i class="ti-more"></i>
                </a>
            </div>
            <div class="navbar-container">
                <div>
                    <ul class="nav-left">
                        
                    </ul>
                    <ul class="nav-right">
                        <!-- Authentication Links -->
                        @guest
                            <li class="user-profile header-notification">
                                <a href="{{ route('login') }}">
                                <span class="site-heading-upper mb-3">{{ __('Login') }}</span>
                                </a>
                            </li>
                            <li class="header-notification">
                                <a href="{{ route('register') }}">
                                <span class="site-heading-upper mb-3">{{ __('Register') }}</span>
                                </a>
                            </li>
                        @else
                            <li class="user-profile header-notification">
                                <img class="img-40" src="{{ asset('dashboard_assets/assets/images/user.png') }}" alt="User-Profile-Image">
                                <a class="" href="javascript:void(0)" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <span class="site-heading-upper mb-3">{{ Auth::user()->name }}</span>
                                    <i class="ti-angle-down"></i>
                                </a>
                                
                                <!-- Experiment -->                               
                                <ul class="show-notification profile-notification">
                                    <li>
                                        <a class="" href="{{ route('logout') }}"
                                           >
                                            <i class="icofont icofont-logout"></i>
                                            <span class="site-heading-upper mb-3">{{ __('Logout') }}</span>
                                        </a>
                                    </li>
                                </ul>
                                <!-- Experiment -->
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- Menu header end -->
    <!-- Menu aside start -->
    <div class="main-menu" id="hoizontal-static">
        <div class="main-menu-content">
            <ul class="main-navigation">
                <ul>

                    <li class="nav-item has-class" id="dashboard_heading">
                        <a href="{{ url('admin') }}">
                            <i class="ti-home"></i>
                            <span data-i18n="nav.dash.main">Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="javascript:void(0)">
                            <i class="ti-settings has-class"></i>
                            <span data-i18n="nav.dash.main">Preferences</span>
                        </a>
                        <ul class="tree-1">
                        <li>
                            <a href="{{ url('project/create') }}" data-i18n="nav.dash.default"> Business Types </a>
                        </li>
                        <li>
                            <a href="{{ route ('project/view') }}" data-i18n="nav.dash.ecommerce"> Statuses </a>
                            <!--  -->
                        </li>

                        <li>
                            <a href="{{ route ('project/view') }}" data-i18n="nav.dash.ecommerce"> Areas </a>
                            <!--  -->
                        </li>    
                        </ul>
                    </li>
                </ul>
            </ul>    
        </div>        
    </div>

    <!-- Fixed Side Menu Ends -->
    
    <div class="main-body">
        <div class="page-wrapper">
            <div class="page-header">
                <div class="page-header-title">
                    <ul class="nav nav-tabs">
                        <li>
                            <a href="{{route('admin')}}" class="nav-link">
                                <h4>Project Dashboard</h4>
                            </a>
                        </li>

                        <li>
                            <a href="javascript:void(0)" class="nav-link active">
                                <h4>Client Portal Dashboard</h4>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index.html">
                                <i class="icofont icofont-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Client-FollowUp</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="page-body">
                <div class="card">
                    <div class="card-header">
                        <h5>Contact</h5>
                        <button type="button" class="btn btn_submit btn-primary waves-effect waves-light f-right d-inline-block md-trigger" 
                        data-modal="modal-13" id="add_client"> <i class="icofont icofont-plus m-r-5"></i> Add Client
                        </button>
                    </div>
                    <div class="card-block">
                        <div class="table-content crm-table">
                            <div class="project-table">
                                <table id="crm-contact" class="table table-striped dt-responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Area</th>
                                            <th>Phone</th>
                                            <th>Website</th>
                                            <th>Business Type</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    @if( !empty($clients) )
                                        @foreach($clients as $client)
                                            <tr>
                                                <td class="pro-name">
                                                   {{$client->title}} 
                                                </td>
                                                <td>{{$client->email}}</td>
                                                <td>
                                                    @foreach($areas as $area)
                                                        @if($area->id == $client->area_id)
                                                            {{$area->name}}
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td>{{$client->phone}}</td>
                                                <td>{{$client->website}}</td>
                                                <td>{{$client->business_type}}</td>
                                                <td>{{$client->description}}</td>
                                                <td>{{$client->status}}</td>
                                                <td class="action-icon">
                                                    <a href="javascript:;" class="m-r-15 crm-action-edit text-muted"><i class="icofont icofont-ui-edit"></i></a>
                                                    <a href="javascript:;" class="crm-action-delete text-muted"><i class="icofont icofont-delete-alt"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                    <!-- <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Area</th>
                                            <th>Phone</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot> -->
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Add Contact Start Model -->
                <div id="modal_popup"></div>
                <!-- <div class="md-modal md-effect-13 addcontact" id="modal-13">
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
                                </select>
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon6"><i class="icofont icofont-user"></i></span>
                                <select type="number" class="form-control" name="area">
                                <option value="">---Select Area---</option>
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
                <div class="md-overlay"></div> -->
            </div>
                
                <!-- Add Contact Ends Model-->
                

            <div class="row">                    
                <!-- Todo card start -->
                <div class="col-md-12 col-xl-4">
                    <div class="card">
                        <div class="card-header">
                            <h5>What's Today?</h5>
                            <label class="label label-success">Today</label>
                        </div>
                        <div class="card-block">
                            <div class="new-task">

                            
                                <div class="checkbox-fade fade-in-primary">
                                    <label class="check-task">
                                        <span class="label label-success">Nothing for today!<strong></strong></span>
                                    </label>
                                </div>
                            

                            
                                <div class="to-do-list">
                                    <div class="checkbox-fade fade-in-primary">
                                        <label class="check-task">
                                            <input type="checkbox" value="">
                                            <span class="cr">
                                                <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                            </span>
                                            <span>Deadline for project <strong></strong> today</span>
                                        </label>
                                    </div>
                                    <div class="f-right">
                                        <a href="#!" class="delete_todolist"><i class="icofont icofont-ui-delete" ></i></a>
                                    </div>
                                </div>
                                

                            
                                <div class="to-do-list">
                                    <div class="checkbox-fade fade-in-primary">
                                        <label class="check-task">
                                            <input type="checkbox" value="">
                                            <span class="cr">
                                                <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                            </span>
                                            <span>Project <strong></strong> starts today!</span>
                                        </label>
                                    </div>
                                    <div class="f-right">
                                        <a href="#!" class="delete_todolist"><i class="icofont icofont-ui-delete" ></i></a>
                                    </div>
                                </div>
                                

                            
                                <div class="to-do-list">
                                    <div class="checkbox-fade fade-in-primary">
                                        <label class="check-task">
                                            <input type="checkbox" value="">
                                            <span class="cr">
                                                <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                            </span>
                                            <span>Project <strong> is Late!</strong></span>
                                        </label>
                                    </div>
                                    <div class="f-right">
                                        <a href="#!" class="delete_todolist"><i class="icofont icofont-ui-delete" ></i></a>
                                    </div>
                                </div>
                                

                           
                                <div class="to-do-list">
                                    <div class="checkbox-fade fade-in-primary">
                                        <label class="check-task">
                                            <input type="checkbox" value="">
                                            <span class="cr">
                                                <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                            </span>
                                            <span>Deadline for task <strong></strong> today.</span>
                                        </label>
                                    </div>
                                    <div class="f-right">
                                        <a href="#!" class="delete_todolist"><i class="icofont icofont-ui-delete" ></i></a>
                                    </div>
                                </div>
                                

                            
                                <div class="to-do-list">
                                    <div class="checkbox-fade fade-in-primary">
                                        <label class="check-task">
                                            <input type="checkbox" value="">
                                            <span class="cr">
                                                <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                            </span>
                                            <span>Task <strong></strong> starts today!</span>
                                        </label>
                                    </div>
                                    <div class="f-right">
                                        <a href="#!" class="delete_todolist"><i class="icofont icofont-ui-delete" ></i></a>
                                    </div>
                                </div>
                               

                           
                                <div class="to-do-list">
                                    <div class="checkbox-fade fade-in-primary">
                                        <label class="check-task">
                                            <input type="checkbox" value="">
                                            <span class="cr">
                                                <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                            </span>
                                            <span>Task <strong></strong> is late!</span>
                                        </label>
                                    </div>
                                    <div class="f-right">
                                        <a href="#!" class="delete_todolist"><i class="icofont icofont-ui-delete" ></i></a>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Todo card end -->
            </div>
        </div>
    </div>

    <div id="app"></div>

    <!-- Required Jquery -->
    <script type="text/javascript" src= "{{ asset('dashboard_assets/jquery/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('dashboard_assets/jquery-ui/jquery-ui.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- To-Do js -->    
    <script src="{{ asset('dashboard_assets/assets/js/todo/todo.js') }}"></script>

    <!-- classie js -->
    <script type="text/javascript" src="{{ asset('dashboard_assets/bower_components/classie/classie.js') }}"></script>
        
    <!-- datatable js -->
    <script src="{{ asset('dashboard_assets/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('dashboard_assets/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('dashboard_assets/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('dashboard_assets/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
    
    <!-- Model animation js -->
    <script src="{{ asset('dashboard_assets/assets/js/classie.js') }}"></script>
    <script src="{{ asset('dashboard_assets/assets/js/modalEffects.js') }}"></script>

    <!-- Horizontal-Timeline js -->
    <script type="text/javascript" src="{{ asset('dashboard_assets/assets/js/main.js') }}"></script>
    
    <!-- Custom js -->
    <script type="text/javascript" src="{{ asset('dashboard_assets/assets/js/script.js') }}"></script>

</body>

</html>

<script type="text/javascript">
    /* Fetching data for dropdowns */
    $('#add_client').click(function(e){
        e.preventDefault();
        $.ajax({
        url:"{{route('getDropdowns')}}",
        type:"get",
        data:'',
        dataType:"json",
        success:function(status){
                $('#modal_popup').html(data.html);
            }
        });
    });


    /* Adding Client Modal Form Submission  */ 
    $('#modal_submit').click(function(e){
      e.preventDefault();
      var btn = $(this);
      $(btn).button('loading');
      var value = $("#client_form").serialize();
      console.log(value);
      $.ajax({
        url:"{{route('clientportal')}}",
        type:"post",
        data:value,
        dataType:"json",
        success:function(status){

          if(status.msg=='success'){
            notify('Success! ', status.response, 'success');
            $(btn).button('reset');
            $('#add_client')[0].reset();
            $( "#add_contact" ).modal( "hide" );
          }
          else if(status.msg == 'error'){
            notify('Error! ', status.response, 'danger');
            $(btn).button('reset');
          }
        }
      });
    });

    $(document).ready( function () {
    $('#crm-contact').DataTable();
    });
</script>

    