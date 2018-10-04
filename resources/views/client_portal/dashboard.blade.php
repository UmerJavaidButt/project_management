
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

    <!-- sweet alert framework -->
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_assets/bower_components/sweetalert/dist/sweetalert.css') }}">

    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href= "{{ asset('dashboard_assets/assets/icon/themify-icons/themify-icons.css') }}">

    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href= "{{ asset('dashboard_assets/assets/icon/icofont/css/icofont.css') }}">
    <!-- flag icon framework css -->
    <link rel="stylesheet" type="text/css" href= "{{ asset('dashboard_assets/assets/pages/flag-icon/flag-icon.min.css') }}">
    
    <!-- Data Table Css -->
    <link rel="stylesheet" type="text/css" href="{{ asset ('dashboard_assets/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset ('dashboard_assets/assets/pages/data-table/css/buttons.dataTables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset ('dashboard_assets/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}">

    <!-- notify js Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{ asset ('dashboard_assets/bower_components/pnotify/dist/pnotify.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset ('dashboard_assets/bower_components/pnotify/dist/pnotify.brighttheme.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset ('dashboard_assets/bower_components/pnotify/dist/pnotify.buttons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset ('dashboard_assets/bower_components/pnotify/dist/pnotify.history.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset ('dashboard_assets/bower_components/pnotify/dist/pnotify.mobile.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset ('dashboard_assets/assets/pages/pnotify/notify.css') }}">

    <!-- animation nifty modal window effects css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_assets/assets/css/component.css') }}">

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
                <a href="{{ route('client_portal') }}" class="text-white d-none d-lg-block">
                    <span class="">Client Portal</span>
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
                        <a href="{{ route('client_portal') }}">
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
                            <a href="{{ route ('businesstype/view') }}" data-i18n="nav.dash.default"> Business Types </a>
                        </li>
                        <li>
                            <a href="{{ route ('status/view') }}" data-i18n="nav.dash.ecommerce"> Statuses </a>
                            <!--  -->
                        </li>

                        <li>
                            <a href="{{ route ('area/view') }}" data-i18n="nav.dash.ecommerce"> Areas </a>
                            <!--  -->
                        </li>    
                        </ul>
                    </li>

                    @if((\Auth::user()->type == 'admin') )

                    <li class="nav-item">
                        <a href="javascript:void(0)">
                            <i class="icofont-ui-delete has-class"></i>
                            <span data-i18n="nav.dash.main">Delete Requests</span>
                            <label class="label label-danger menu-caption">{{$deleteRequests}}</label>
                        </a>
                        <ul class="tree-1">
                            <li>
                                <a href="{{ route ('client_delete_requests') }}" data-i18n="nav.dash.default"> Client Delete Requests </a>
                            </li>
                        </ul>
                    </li>

                    @endif
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
                    @if((\Auth::user()->type == 'admin') )
                        <li>
                            <a href="{{route('admin')}}" class="nav-link">
                                <h4>Project Dashboard</h4>
                            </a>
                        </li>
                    @endif

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
                        <li class="breadcrumb-item"><a href="{{route('client_portal')}}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Client Portal</a>
                        </li>
                    </ul>
                </div>
            </div>
            
        @yield('content')
    </div>

    <div id="app"></div>

    <!-- Required Jquery -->
    <script type="text/javascript" src="{{ asset('dashboard_assets/jquery/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('dashboard_assets/jquery-ui/jquery-ui.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('dashboard_assets/bower_components/tether/dist/js/tether.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    
    <!-- classie js -->
    <script type="text/javascript" src="{{ asset('dashboard_assets/bower_components/classie/classie.js') }}"></script>

    <!-- data-table js -->
    <script src="{{asset('dashboard_assets/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{asset('dashboard_assets/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{asset('dashboard_assets/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{asset('dashboard_assets/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{asset('dashboard_assets/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
    
    <!-- sweet alert js -->
    <script type="text/javascript" src= "{{ asset('dashboard_assets/bower_components/sweetalert/dist/sweetalert.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('dashboard_assets/assets/js/modalEffects.js') }}"></script>
    
    <!-- sweet alert modal.js intialize js -->

    <!-- modalEffects js nifty modal window effects -->
    
    <script type="text/javascript" src="{{ asset('dashboard_assets/assets/js/classie.js') }}"></script>

    <!-- pnotify js -->
    <script type="text/javascript" src="{{asset('dashboard_assets/bower_components/pnotify/dist/pnotify.js') }}"></script>
    <script type="text/javascript" src="{{asset('dashboard_assets/bower_components/pnotify/dist/pnotify.desktop.js') }}"></script>
    <script type="text/javascript" src="{{asset('dashboard_assets/bower_components/pnotify/dist/pnotify.buttons.js') }}"></script>
    <script type="text/javascript" src="{{asset('dashboard_assets/bower_components/pnotify/dist/pnotify.confirm.js') }}"></script>
    <script type="text/javascript" src="{{asset('dashboard_assets/bower_components/pnotify/dist/pnotify.callbacks.js') }}"></script>
    <script type="text/javascript" src="{{asset('dashboard_assets/bower_components/pnotify/dist/pnotify.animate.js') }}"></script>
    <script type="text/javascript" src="{{asset('dashboard_assets/bower_components/pnotify/dist/pnotify.history.js') }}"></script>
    <script type="text/javascript" src="{{asset('dashboard_assets/bower_components/pnotify/dist/pnotify.mobile.js') }}"></script>
    <script type="text/javascript" src="{{asset('dashboard_assets/bower_components/pnotify/dist/pnotify.nonblock.js') }}"></script>
    <script type="text/javascript" src="{{asset('dashboard_assets/assets/pages/pnotify/notify.js') }}"></script>

    

    <!-- Horizontal-Timeline js -->
    <script type="text/javascript" src="{{ asset('dashboard_assets/assets/js/main.js') }}"></script>
    
    <!-- Custom js -->
    <script type="text/javascript" src="{{ asset('dashboard_assets/assets/js/script.js') }}"></script>
    <script src="{{asset('dashboard_assets/assets/pages/data-table/js/data-table-custom.js') }}"></script>

    <button type="button" style="display:none" class="btn btn-success btn-sm" id="pnotify-success">Click here! <i class="icofont icofont-play-alt-2"></i></button>
<button type="button" style="display:none" class="btn btn-success btn-sm" id="pnotify-danger">Click here! <i class="icofont icofont-play-alt-2"></i></button>
</body>

</html>

<script type="text/javascript">
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
        success: function( data ) {
            $( "#pnotify-success" ).trigger( "click" );
            $('#client_form')[0].reset();
            $( "#sign-in-modal" ).modal( "hide" );
            window.location.reload(true);
       },
       error: function(xhr, status, error) {
          $( "#pnotify-danger" ).trigger( "click" );
       },
      });
    });
</script>

    