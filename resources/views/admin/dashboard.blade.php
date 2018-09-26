
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Project Management System</title>
    <!-- Meta -->
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
    <div class="main-menu">
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
                            <i class="ti-home has-class"></i>
                            <span data-i18n="nav.dash.main">Manage Projects</span>
                        </a>
                        <ul class="tree-1">
                        <li>
                            <a href="{{ url('project/create') }}" data-i18n="nav.dash.default"> Add Project Details </a></li>
                        <li>
                            <li><a href="{{ route ('project/view') }}" data-i18n="nav.dash.ecommerce"> View All Projects </a></li>
                            <!--  -->
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="javascript:void(0)">
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
                        <a href="javascript:void(0)">
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
                            <span data-i18n="nav.dash.main">Manage Agent</span>
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
                                <li><a href="{{ route ('teammember/view') }}" data-i18n="nav.dash.ecommerce"> Teams & Members </a></li>
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

    <!-- Fixed Side Menu Ends -->
    
    <div class="main-body">
        <div class="page-wrapper">
            <div class="page-header">
                <div class="page-header-title">
                    <ul class="nav nav-tabs">
                        <li>
                            <a href="javascript:void(0)" class="nav-link active">
                                <h4>Project Dashboard</h4>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route ('client_portal') }}" class="nav-link">
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
                        <li class="breadcrumb-item"><a href="#!">Project</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="page-body">
                <div class="row">
                    <!-- Documents card start -->
                    <div class="col-md-6 col-xl-3">
                        <div class="card client-blocks dark-primary-border">
                            <a href="{{ route ('admin/paused_projects')}}" class="" role="button">    
                                <div class="card-block">
                                    <h5 class="dashboard_box">Paused Projects</h5>
                                    <ul class="dashboard_box_ul">
                                        <li>
                                            <i class="icofont icofont-ui-pause text-warning"></i>
                                        </li>
                                        <li class="text-right">
                                        @if($pausedProjects == 0)
                                            {{('0')}}
                                        @else
                                            {{ $pausedProjects }}
                                        @endif
                                        </li>
                                    </ul>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- Documents card end -->
                    <!-- New clients card start -->
                    <div class="col-md-6 col-xl-3">
                        <div class="card client-blocks warning-border">
                            <a href="{{ route ('admin/completed_projects')}}">    
                                <div class="card-block complete_p_click">
                                    <h5 class="dashboard_box">Completed Projects</h5>
                                    <ul class="dashboard_box_ul">
                                        <li>
                                            <i class="icofont icofont-tick-boxed"></i>
                                        </li>
                                        <li class="text-right text-warning">
                                        @if($completedProjects == 0)
                                            {{('0')}}
                                        @else
                                            {{$completedProjects}}
                                        @endif
                                        </li>
                                    </ul>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- New clients card end -->
                    <!-- New files card start -->
                    <div class="col-md-6 col-xl-3">
                        <div class="card client-blocks success-border">
                            <a href="{{ route ('admin/upcoming_projects')}}">    
                                <div class="card-block upcoming_p_click">
                                    <h5 class="dashboard_box">Upcoming Projects</h5>
                                    <ul class="dashboard_box_ul">
                                        <li>
                                            <i class="icofont icofont-files text-success"></i>
                                        </li>
                                        <li class="text-right text-success">
                                        @if($upcomingProjects == 0)
                                            {{('0')}}
                                        @else
                                            {{ $upcomingProjects}}
                                        @endif
                                        </li>
                                    </ul>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- Upcoming Projects card end -->
                    <!-- Open Project card start -->
                    <div class="col-md-6 col-xl-3">
                        <div class="card client-blocks">
                            <a href="{{ route ('admin/open_projects')}}">
                                <div class="card-block open_p_click">
                                    <h5 class="dashboard_box">Open Projects</h5>
                                    <ul class="dashboard_box_ul">
                                        <li>
                                            <i class="icofont icofont-ui-folder text-primary"></i>
                                        </li>
                                        <li class="text-right text-primary">
                                         @if( $pendingProjects == 0 )
                                            {{('0')}}
                                        @else
                                            {{ $pendingProjects}}
                                        @endif
                                        </li>
                                    </ul>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- Horizontal Timeline start -->
                    <div class="col-md-12 col-xl-8">
                        <div class="card">
                        <div class="card-header">
                            <h5>Projects Timeline</h5>
                        </div>
                            <div class="card-block">
                            @if($projectTimeline->isEmpty())
                                <div class="label label-danger">{{('No Projects Found')}}</div>
                            @else
                                <div class="cd-horizontal-timeline">
                                    <div class="timeline">
                                        <div class="events-wrapper">
                                            <div class="events">
                                                <ol>
                                                    <li><a href="#0" data-date="{{ \Carbon\Carbon::parse($projectTimeline[0]->start_date)->format('d/m/Y')}}" class="selected"></a></li>
                                                    @foreach($projectTimeline as $key => $project)
                                                        @if ($key != 'currLimit' && $key != 'eventsRemaining')
                                                            <li><a href="#0" data-date="{{ \Carbon\Carbon::parse($project->start_date)->format('d/m/Y')}}" class=""></a></li>
                                                        @endif
                                                    @endforeach
                                                </ol>
                                                <span class="filling-line" aria-hidden="true"></span>
                                            </div>
                                            <!-- .events -->
                                        </div>
                                        <!-- .events-wrapper -->
                                        <ul class="cd-timeline-navigation">
                                            <li><a href="#0" class="prev inactive">Prev</a></li>
                                            <li><a href="#0" class="next">Next</a></li>
                                        </ul>
                                        <!-- .cd-timeline-navigation -->
                                    </div>
                                    <!-- .timeline -->
                                    <div class="events-content">
                                        <ol>
                                        <li class="selected" data-date="{{ \Carbon\Carbon::parse($projectTimeline[0]->start_date)->format('d/m/Y')}}">
                                                <h2>{{$projectTimeline[0]->name}}</h2>
                                                <em>{{ \Carbon\Carbon::parse($projectTimeline[0]->start_date)->format('d/m/Y')}}</em>
                                                <p class="m-b-0">
                                                   {{ $projectTimeline[0]->description }}
                                                </p>
                                                <div class="m-t-20 d-timeline-btn">
                                                    <button class="btn btn-danger">Read More</button>
                                                    <button class="btn btn-primary f-right"><i class="icofont icofont-plus m-r-0"></i></button>
                                                </div>
                                            </li>

                                            @foreach($projectTimeline as $key => $project)
                                                @if ($key != 'currLimit' && $key != 'eventsRemaining')
                                                    <li class="" data-date="{{ \Carbon\Carbon::parse($project->start_date)->format('d/m/Y')}}">
                                                        <h2>{{$project->name}}</h2>
                                                        <em>{{ \Carbon\Carbon::parse($project->start_date)->format('d/m/Y')}}</em>
                                                        <p class="m-b-0">
                                                            {{ $project->description }}
                                                        </p>
                                                        <div class="m-t-20 d-timeline-btn">
                                                            <button class="btn btn-danger">Read More</button>
                                                            <button class="btn btn-primary f-right"><i class="icofont icofont-plus m-r-0"></i></button>
                                                        </div>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ol>
                                    </div>
                                    <!-- .events-content -->
                                </div>
                            @endif
                            </div>
                        </div>
                    </div>
                    <!-- Horizontal Timeline end -->
                    <!-- Todo card start -->
                    <div class="col-md-12 col-xl-4">
                        <div class="card">
                            <div class="card-header">
                                <h5>What's Today?</h5>
                                <label class="label label-success">Today</label>
                            </div>
                            <div class="card-block">
                                <!-- <div class="input-group input-group-button">
                                    <input type="text" class="form-control add_task_todo" placeholder="Create your task list" name="task-insert">
                                    <span class="input-group-addon" id="basic-addon1">
                              <button id="add-btn" class="btn btn-primary">Add Task</button>
                              </span>
                                </div> -->
                                <div class="new-task">

                                @if($todays == null)
                                    <div class="checkbox-fade fade-in-primary">
                                        <label class="check-task">
                                            
                                            <span class="cr">
                                                <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                            </span>
                                            <span class="label label-success">Nothing for today!<strong></strong></span>
                                        </label>
                                    </div>
                                @endif

                                @if($todays['project_deadline'])
                                    @foreach($todays['project_deadline'] as $project_deadline)
                                    <div class="to-do-list">
                                        <div class="checkbox-fade fade-in-primary">
                                            <label class="check-task">
                                                <input type="checkbox" value="">
                                                <span class="cr">
                                                    <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                </span>
                                                <span>Deadline for project <strong>{{$project_deadline->name}}</strong> today</span>
                                            </label>
                                        </div>
                                        <div class="f-right">
                                            <a href="#!" class="delete_todolist"><i class="icofont icofont-ui-delete" ></i></a>
                                        </div>
                                    </div>
                                    @endforeach
                                @endif

                                @if($todays['project_start'])
                                    @foreach($todays['project_start'] as $project_start)
                                    <div class="to-do-list">
                                        <div class="checkbox-fade fade-in-primary">
                                            <label class="check-task">
                                                <input type="checkbox" value="">
                                                <span class="cr">
                                                    <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                </span>
                                                <span>Project <strong>{{$project_start->name}}</strong> starts today!</span>
                                            </label>
                                        </div>
                                        <div class="f-right">
                                            <a href="#!" class="delete_todolist"><i class="icofont icofont-ui-delete" ></i></a>
                                        </div>
                                    </div>
                                    @endforeach
                                @endif

                                @if($todays['late_project'])
                                    @foreach($todays['late_project'] as $late_project)
                                    <div class="to-do-list">
                                        <div class="checkbox-fade fade-in-primary">
                                            <label class="check-task">
                                                <input type="checkbox" value="">
                                                <span class="cr">
                                                    <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                </span>
                                                <span>Project <strong>{{$late_project->name}} is Late!</strong></span>
                                            </label>
                                        </div>
                                        <div class="f-right">
                                            <a href="#!" class="delete_todolist"><i class="icofont icofont-ui-delete" ></i></a>
                                        </div>
                                    </div>
                                    @endforeach
                                @endif

                                @if($todays['task_deadline'])
                                    @foreach($todays['task_deadline'] as $task_deadline)
                                    <div class="to-do-list">
                                        <div class="checkbox-fade fade-in-primary">
                                            <label class="check-task">
                                                <input type="checkbox" value="">
                                                <span class="cr">
                                                    <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                </span>
                                                <span>Deadline for task <strong>{{$task_deadline->name}}</strong> today.</span>
                                            </label>
                                        </div>
                                        <div class="f-right">
                                            <a href="#!" class="delete_todolist"><i class="icofont icofont-ui-delete" ></i></a>
                                        </div>
                                    </div>
                                    @endforeach
                                @endif

                                @if($todays['task_start'])
                                    @foreach($todays['task_start'] as $task_start)
                                    <div class="to-do-list">
                                        <div class="checkbox-fade fade-in-primary">
                                            <label class="check-task">
                                                <input type="checkbox" value="">
                                                <span class="cr">
                                                    <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                </span>
                                                <span>Task <strong>{{$task_start->name}}</strong> starts today!</span>
                                            </label>
                                        </div>
                                        <div class="f-right">
                                            <a href="#!" class="delete_todolist"><i class="icofont icofont-ui-delete" ></i></a>
                                        </div>
                                    </div>
                                    @endforeach
                                @endif

                                @if($todays['late_task'])
                                    @foreach($todays['late_task'] as $late_task)
                                    <div class="to-do-list">
                                        <div class="checkbox-fade fade-in-primary">
                                            <label class="check-task">
                                                <input type="checkbox" value="">
                                                <span class="cr">
                                                    <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                </span>
                                                <span>Task <strong>{{$late_task->name}}</strong> is late!</span>
                                            </label>
                                        </div>
                                        <div class="f-right">
                                            <a href="#!" class="delete_todolist"><i class="icofont icofont-ui-delete" ></i></a>
                                        </div>
                                    </div>
                                    @endforeach
                                @endif
                                </div>
                    <!-- Todo card end -->
                </div>
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

    <!-- data-table js -->    
    <script src="{{ asset('dashboard_assets/assets/js/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('dashboard_assets/assets/js/datatable/responsive.bootstrap4.min.js') }}"></script>

    <!-- Horizontal-Timeline js -->
    <script type="text/javascript" src="{{ asset('dashboard_assets/assets/js/main.js') }}"></script>
    
    <!-- Custom js -->
    <script type="text/javascript" src="{{ asset('dashboard_assets/assets/js/script.js') }}"></script>
    <script src="{{ asset('dashboard_assets/assets/js/datatable/data-table-custom.js') }}"></script>

</body>

</html>

    