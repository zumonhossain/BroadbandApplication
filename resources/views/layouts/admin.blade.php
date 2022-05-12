<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <link href="{{ asset('contents/admin') }}/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="{{ asset('contents/admin') }}/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('contents/admin') }}/assets/plugins/morrisjs/morris.css" rel="stylesheet">
    <link href="{{ asset('contents/admin') }}/css/adminpress.css" rel="stylesheet">
    <link href="{{ asset('contents/admin') }}/css/style.css" rel="stylesheet">
    <link href="{{ asset('contents/admin') }}/css/colors/blue.css" id="theme" rel="stylesheet">
    <link href="{{ asset('contents/admin') }}/css/toastr.css" id="theme" rel="stylesheet">
    
    <script src="{{asset('contents/admin')}}/assets/plugins/jquery/jquery.min.js"></script>
    <script src="{{asset('contents/admin')}}/js/sweetalert.min.js"></script>
</head>

<body class="fix-header fix-sidebar card-no-border">
    <div id="main-wrapper">
        <header class="topbar print_none">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">

                <div class="navbar-header">
                    <a class="navbar-brand" href="{{ route('admin') }}">
                        <b>
                            <img src="{{ asset('contents/admin') }}/assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                            <img src="{{ asset('contents/admin') }}/assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />
                        </b>
                        <span>
                            <img src="{{ asset('contents/admin') }}/assets/images/logo-text.png" alt="homepage" class="dark-logo" /> 
                            <img src="{{ asset('contents/admin') }}/assets/images/logo-light-text.png" class="light-logo" alt="homepage" />
                        </span>
                    </a>
                </div>

                <div class="navbar-collapse">
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <li class="nav-item dropdown">
                        </li>
                    </ul>
                    <ul class="navbar-nav my-lg-0">
                        <li class="nav-item hidden-sm-down search-box"> <a class="nav-link hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-search"></i></a>
                            <form class="app-search">
                                <input type="text" class="form-control" placeholder="Search & enter">
                                <a class="srh-btn"><i class="ti-close"></i></a>
                            </form>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{ asset('contents/admin') }}/assets/images/users/1.jpg" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right scale-up">
                                <ul class="dropdown-user">
                                    <li>
                                        <div class="dw-user-box">
                                            <div class="u-img"><img src="{{ asset('contents/admin') }}/assets/images/users/1.jpg" alt="user"></div>
                                            <div class="u-text">
                                                <h4>{{Auth::user()->name}}</h4>
                                                <p class="text-muted">{{Auth::user()->email}}</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#"><i class="ti-user"></i> My Profile</a></li>
                                    <li><a href="#"><i class="ti-wallet"></i> My Balance</a></li>
                                    <li><a href="#"><i class="ti-email"></i> Inbox</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#"><i class="ti-settings"></i> Account Setting</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li>
                                        <a class="waves-effect waves-dark" href="{{ url('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="mdi mdi-power"></i><span class="hide-menu">Logout</span></a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <aside class="left-sidebar print_none">
            <div class="scroll-sidebar">
                <div class="user-profile">
                    <div class="profile-img"> <img src="{{ asset('contents/admin') }}/assets/images/users/1.jpg" alt="user" />
                        <div class="notify setpos"> <span class="heartbit"></span> <span class="point"></span> </div>
                    </div>
                    <div class="profile-text">
                        <h5>{{Auth::user()->name}}</h5>
                    </div>
                </div>
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li>
                            <a class="waves-effect waves-dark" href="{{ route('admin') }}"><i class="mdi mdi-home"></i><span class="hide-menu">Dashboard</span></a>
                        </li>
                        <li>
                            <a class="waves-effect waves-dark" href="{{ route('company_profile_form') }}"><i class="mdi mdi-home"></i><span class="hide-menu">Company Profile</span></a>
                        </li>
                        <li>
                            <a class="waves-effect waves-dark" href="{{ route('banner_new_form') }}"><i class="mdi mdi-home"></i><span class="hide-menu">Banner</span></a>
                        </li>
                        <li>
                            <a class="waves-effect waves-dark" href="{{ route('service_type_new_form') }}"><i class="mdi mdi-home"></i><span class="hide-menu">Service Type</span></a>
                        </li>
                        <li>
                            <a class="waves-effect waves-dark" href="{{ route('package_info_new_form') }}"><i class="mdi mdi-home"></i><span class="hide-menu">Package Info</span></a>
                        </li>
                        <li> 
                            <a class="has-arrow waves-effect waves-dark" aria-expanded="false"><i class="mdi mdi-settings"></i><span class="hide-menu">General Setting</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{ route('division_new_form') }}">Division</a></li>
                                <li><a href="{{ route('district_new_form') }}">District</a></li>
                                <li><a href="{{ route('upazila_new_form') }}">Upazila</a></li>
                                <li><a href="{{ route('union_new_form') }}">Union</a></li>
                                <li><a href="{{ route('service_area_new_form') }}">Service Area</a></li>
                                <li><a href="{{ route('service_sub_area_new_form') }}">Service Sub Area</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="waves-effect waves-dark" href="{{ route('daily_cost_new_form') }}"><i class="mdi mdi-home"></i><span class="hide-menu">Daily Cost</span></a>
                        </li>
                        <li>
                            <a class="waves-effect waves-dark" href="{{ route('customer_new_form') }}"><i class="mdi mdi-home"></i><span class="hide-menu">Customer</span></a>
                        </li>
                        <li>
                            <a class="waves-effect waves-dark" href="{{ url('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="mdi mdi-power"></i><span class="hide-menu">Logout</span></a>
                        </li>
                    </ul>
                </nav>
                <form id="logout-form" method="POST" action="{{ url('logout') }}">
                    @csrf
                </form>
            </div>
        </aside>
        <div class="page-wrapper">
            <div class="row page-titles print_none">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Dashboard</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>

            <div class="container-fluid">
                @yield('content')
            </div>

            <footer class="footer print_none"> © 2020 Zumon Hossain </footer>

        </div>

    </div>



    <script src="{{ asset('contents/admin') }}/js/dataTables.bootstrap.js"></script>
    <script src="{{ asset('contents/admin') }}/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('contents/admin') }}/assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="{{ asset('contents/admin') }}/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{ asset('contents/admin') }}/js/jquery.slimscroll.js"></script>
    <script src="{{ asset('contents/admin') }}/js/waves.js"></script>
    <script src="{{ asset('contents/admin') }}/js/sidebarmenu.js"></script>
    <script src="{{ asset('contents/admin') }}/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="{{ asset('contents/admin') }}/js/custom.min.js"></script>
    <script src="{{ asset('contents/admin') }}/assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <script src="{{ asset('contents/admin') }}/assets/plugins/raphael/raphael-min.js"></script>
    <script src="{{ asset('contents/admin') }}/assets/plugins/morrisjs/morris.min.js"></script>
    <script src="{{ asset('contents/admin') }}/js/dashboard1.js"></script>
    <script src="{{ asset('contents/admin') }}/js/bootstrap-datepicker.min.js"></script>
    <script src="{{ asset('contents/admin') }}/assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
    <script src="{{ asset('contents/admin') }}/js/sweetalert/sweetalert.min.js"></script>
    <script src="{{ asset('contents/admin') }}/js/sweetalert/code.js"></script>
    <script src="{{ asset('contents/admin') }}/js/custom.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        @if(Session::has('messege'))
            var type="{{Session::get('alert-type','info')}}"
            switch(type){
                case 'info':
                    toastr.info("{{ Session::get('messege') }}");
                    break;
                case 'success':
                    toastr.success("{{ Session::get('messege') }}");
                    break;
                case 'warning':
                    toastr.warning("{{ Session::get('messege') }}");
                    break;
                case 'error':
                    toastr.error("{{ Session::get('messege') }}");
                break;
            }
        @endif
    </script>
    

<script type="text/javascript">
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    })
</script>


</body>

</html>