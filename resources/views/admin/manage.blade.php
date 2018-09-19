

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Project Management System</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    
    <!-- Favicon icon -->
    <link rel="icon" href = "{{ asset('dashboard_assets/assets/images/favicon.ico') }}" type="image/x-icon') }}">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href = "{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href= "{{ asset('dashboard_assets/assets/icon/themify-icons/themify-icons.css') }}">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href= "{{ asset('dashboard_assets/assets/icon/icofont/css/icofont.css') }}">
    <!-- flag icon framework css -->
    <link rel="stylesheet" type="text/css" href= "{{ asset('dashboard_assets/assets/pages/flag-icon/flag-icon.min.css') }}">
    
    <!-- Data Table Css -->
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard_assets/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard_assets/assets/pages/data-table/css/buttons.dataTables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard_assets/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}">


    <!-- Horizontal-Timeline css -->
    <link rel="stylesheet" type="text/css" href= "{{ asset('dashboard_assets/assets/pages/dashboard/horizontal-timeline/css/style.css') }}">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href= "{{ asset('dashboard_assets/assets/css/style.css') }}">
    <!-- color .css -->
    <link rel="stylesheet" type="text/css" href= "{{ asset('dashboard_assets/assets/css/color/color-1.css') }}" id="color">

    <!-- Countdown Timer css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_assets/assets/css/flipclock.css') }}">
    

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
                    <span class="">Project Management</span>
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
                                    <a class="" href="{{ route('logout') }}">
                                        <i class="icofont icofont-logout"></i>
                                        <span class="site-heading-upper mb-3">{{ __('Logout') }}</span>
                                    </a>
                                </li>
                            </ul>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                             @csrf
                            </form>
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
    <div class="main-menu">
        <div class="main-menu-content">
            <ul class="main-navigation">
                <ul>
                    <li class="nav-item has-class">
                        <a href="{{ route('admin') }}">
                            <i class="ti-home"></i>
                            <span data-i18n="nav.dash.main">Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="#">
                            <i class="ti-home has-class"></i>
                            <span data-i18n="nav.dash.main">Manage Projects</span>
                        </a>
                        <ul class="tree-1">
                        <li>
                            <a href="{{ url('project/create') }}" data-i18n="nav.dash.default"> Add Project Details </a></li>
                        <li>
                            <li><a href="{{ route ('project/view') }}" data-i18n="nav.dash.ecommerce"> View All Projects </a></li>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="#">
                            <i class="ti-home"></i>
                            <span data-i18n="nav.dash.main">Manage Cleints</span>
                        </a>

                        <ul class="tree-1">
                        <li>
                            <a href="{{ url('client/create') }}" data-i18n="nav.dash.default"> Add Client Details </a></li>
                        <li>
                            <li><a href="{{ route ('client/view') }}" data-i18n="nav.dash.ecommerce"> View All Clients </a></li>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="#">
                            <i class="ti-home"></i>
                            <span data-i18n="nav.dash.main">Manage Employees</span>
                        </a>

                        <ul class="tree-1">
                        <li>
                            <a href="{{ url('employee/create') }}" data-i18n="nav.dash.default"> Add Employee Details </a></li>
                        <li>
                            <li><a href="{{ route ('employee/view') }}" data-i18n="nav.dash.ecommerce"> View All Employees </a></li>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="javascript:void(0)">
                            <i class="ti-home"></i>
                            <span data-i18n="nav.dash.main">Manage Teams</span>
                        </a>

                        <ul class="tree-1">
                            <li>
                                <a href="{{ url('team/create') }}" data-i18n="nav.dash.default"> Register Team </a></li>
                            <li>
                                <li><a href="{{ route ('team/view') }}" data-i18n="nav.dash.ecommerce"> View All Teams </a></li>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="javascript:void(0)">
                            <i class="ti-home"></i>
                            <span data-i18n="nav.dash.main">Manage Agents</span>
                        </a>

                        <ul class="tree-1">
                            <li>
                                <a href="{{ url('agent/create') }}" data-i18n="nav.dash.default"> Register Agent </a></li>
                            <li>
                                <li><a href="{{ route ('agent/view') }}" data-i18n="nav.dash.ecommerce"> List of Agents </a></li>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="javascript:void(0)">
                            <i class="ti-home"></i>
                            <span data-i18n="nav.dash.main">Tasks</span>
                        </a>

                         <ul class="tree-1">
                            <li><a href="{{ route ('taskuser/view') }}" data-i18n="nav.dash.ecommerce"> View All Tasks </a></li>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="javascript:void(0)">
                            <i class="ti-home"></i>
                            <span data-i18n="nav.dash.main">Team Members</span>
                        </a>

                        <ul class="tree-1">
                            <li>
                                <a href="{{ url('teammember/create') }}" data-i18n="nav.dash.default"> Assign Team Members </a></li>
                            <li>
                                <li><a href="{{ route ('teammember/view') }}" data-i18n="nav.dash.ecommerce"> Teams &  Members </a></li>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="javascript:void(0)">
                            <i class="ti-home"></i>
                            <span data-i18n="nav.dash.main">Designations</span>
                        </a>

                        <ul class="tree-1">
                            <li>
                                <a href="{{ url('designation/create') }}" data-i18n="nav.dash.default"> Designations </a></li>
                            <li>
                                <li><a href="{{ route ('designation/view') }}" data-i18n="nav.dash.ecommerce"> View Designations </a></li>
                            </li>
                        </ul>
                    </li>
                </ul>
            </ul>    
        </div>

        
    </div>
    <!-- Sidebar inner chat end-->
    <div class="main-body">
        <div class="page-wrapper">
            <div class="page-body">
                <div class="row">
                    <div class="col-md-12 col-xl-12">
                         @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Required Jquery -->
    <script type="text/javascript" src= "{{ asset('dashboard_assets/jquery/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('dashboard_assets/jquery-ui/jquery-ui.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- data-table js -->
    <script src="{{asset('dashboard_assets/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{asset('dashboard_assets/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{asset('dashboard_assets/assets/pages/data-table/js/jszip.min.js') }}"></script>
    <script src="{{asset('dashboard_assets/assets/pages/data-table/js/pdfmake.min.js') }}"></script>
    <script src="{{asset('dashboard_assets/assets/pages/data-table/js/vfs_fonts.js') }}"></script>
    <script src="{{asset('dashboard_assets/bower_components/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{asset('dashboard_assets/bower_components/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{asset('dashboard_assets/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{asset('dashboard_assets/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{asset('dashboard_assets/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>

    <!-- data-table js -->
    <script src="{{ asset('dashboard_assets/assets/js/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('dashboard_assets/assets/js/datatable/responsive.bootstrap4.min.js') }}"></script>

    <!-- Horizontal-Timeline js -->
    <script type="text/javascript" src="{{ asset('dashboard_assets/js/main.js') }}"></script>
    
    <!-- Custom js -->
    <script type="text/javascript" src="{{ asset('dashboard_assets/assets/js/flipclock_script.js') }}"></script>
    <script type="text/javascript" src="{{ asset('dashboard_assets/assets/js/script.js') }}"></script>
    <script src="{{asset('dashboard_assets/assets/pages/data-table/js/data-table-custom.js') }}"></script>

    <!-- Countdown Timer js -->
    <script type="text/javascript" src="{{ asset('dashboard_assets/assets/js/flipclock.min.js') }}"></script>
    <script src="{{ asset('dashboard_assets/assets/js/taskFlipClock.js') }}"></script>

    
</body>

</html>

    