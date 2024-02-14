<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title', 'IntelliSched')</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <link rel="apple-touch-icon" href="{{asset('admin-assets/apple-icon.png')}}">
    <link rel="shortcut icon" href="{{asset('admin-assets/favicon.ico')}}">

    <link rel="stylesheet" href="{{asset('admin-assets/vendors/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin-assets/vendors/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin-assets/vendors/themify-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('admin-assets/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin-assets/vendors/selectFX/css/cs-skin-elastic.css')}}">
    <link rel="stylesheet" href="{{asset('admin-assets/vendors/jqvmap/dist/jqvmap.min.css')}}">

    @yield('links')

    <link rel="stylesheet" href="{{asset('admin-assets/assets/css/style.css')}}">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body>


    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./">IntelliSched</a>
                <a class="navbar-brand hidden" href="./">I</a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="{{route('dashboard')}}"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <h3 class="menu-title">Generate</h3><!-- /.menu-title -->
                    <li>
                        <a href="{{route('schedule')}}"><i class="menu-icon fa fa-table"></i> Schedule</a>
                    </li>
                    <h3 class="menu-title">Manage</h3><!-- /.menu-title -->
                    <li>
                        <a href="{{route('manage-faculty')}}"><i class="menu-icon fa fa-users"></i> Faculty</a>
                    </li>
                    <li>
                        <a href="{{route('manage-subjects')}}"><i class="menu-icon fa fa-bars"></i>Subjects</a>
                    </li>
                    <li>
                        <a href="{{route('manage-rooms')}}"><i class="menu-icon fa fa-building-o"></i>Rooms</a>
                    </li>
                    <li>
                        <a href="{{route('manage-admin')}}"><i class="menu-icon fa fa-user"></i>Admin</a>
                    </li>
                    
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        
                        <a href="#" class="dropdown-toggle align-items-center" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="d-flex align-items-center">
                                <span class="mr-2 d-none d-lg-inline text-gray-900">{{auth()->user()->name}}</span>
                                <img class="user-avatar rounded-circle" src="{{asset('admin-assets/images/no-image-icon.png')}}" alt="User Avatar">
                            </span>
                        </a>

                        <div class="user-menu dropdown-menu">
                            
                            {{-- <a class="nav-link" href="{{route('logout')}}"><i class="fa fa-power-off"></i> Logout</a> --}}
                            <form class="user" action="{{ route('logout') }}" method="post">
                                @csrf
                                <button type="submit" class="nav-link btn"  style="background-color: white;width:100%">
                                    <i class="fa fa-power-off"></i> Logout
                                </button>
                            </form>
                        </div>
                        
                    </div>


                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->

        @yield('breadcrumbs')

        @yield('content')
    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <script src="{{asset('admin-assets/vendors/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('admin-assets/vendors/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{asset('admin-assets/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admin-assets/assets/js/main.js')}}"></script>

    

    {{-- <script src="{{asset('admin-assets/vendors/chart.js/dist/Chart.bundle.min.js')}}"></script>
    <script src="{{asset('admin-assets/assets/js/dashboard.js')}}"></script>
    <script src="{{asset('admin-assets/assets/js/widgets.js')}}"></script>
    <script src="{{asset('admin-assets/vendors/jqvmap/dist/jquery.vmap.min.js')}}"></script>
    <script src="{{asset('admin-assets/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')}}"></script>
    <script src="{{asset('admin-assets/vendors/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script> --}}

    @yield('scripts')
    
    {{-- <script>
        (function($) {
            "use strict";

            jQuery('#vmap').vectorMap({
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: ['#1de9b6', '#03a9f5'],
                normalizeFunction: 'polynomial'
            });
        })(jQuery);
    </script> --}}

</body>

</html>
