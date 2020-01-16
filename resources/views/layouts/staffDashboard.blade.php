@extends('layouts.staffApp')

@section('styles')
    {{--<link href="{{asset('css/app.css')}}" rel="stylesheet">--}}
    <!-- Favicon icon -->
    <link rel="icon" href="https://colorlib.com//polygon/adminty/files/assets/images/favicon.ico" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
    {{--<!-- jquery file upload Frame work -->--}}
    {{--<link href="https://colorlib.com//polygon/adminty/files/assets/pages/jquery.filer/css/jquery.filer.css" type="text/css" rel="stylesheet" />--}}
    {{--<link href="https://colorlib.com//polygon/adminty/files/assets/pages/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css" type="text/css" rel="stylesheet" />--}}
    <!-- Required Fremwork -->
    {{--<link rel="stylesheet" type="text/css" href="https://colorlib.com//polygon/adminty/files/bower_components/bootstrap/css/bootstrap.min.css">--}}
    <link rel="stylesheet" type="text/css" href="https://colorlib.com//polygon/adminty/files/bower_components/sweetalert/css/sweetalert.css">

    <!-- feather Awesome -->
    <link rel="stylesheet" type="text/css" href="https://colorlib.com//polygon/adminty/files/assets/icon/feather/css/feather.css">
    <!-- hover-effect.css -->
    <link rel="stylesheet" type="text/css" href="https://colorlib.com//polygon/adminty/files/assets/pages/hover-effect/normalize.css">
    <link rel="stylesheet" type="text/css" href="https://colorlib.com//polygon/adminty/files/assets/pages/hover-effect/set2.css">
    <!-- animation nifty modal window effects css -->
    <link rel="stylesheet" type="text/css" href="https://colorlib.com//polygon/adminty/files/assets/css/component.css">

    <!-- Calender css -->
    <link rel="stylesheet" type="text/css" href="https://colorlib.com//polygon/adminty/files/bower_components/fullcalendar/css/fullcalendar.css">
    <link rel="stylesheet" type="text/css" href="https://colorlib.com//polygon/adminty/files/bower_components/fullcalendar/css/fullcalendar.print.css" media='print'>
    <link rel="stylesheet" type="text/css" href="https://colorlib.com//polygon/adminty/files/assets/pages/notification/notification.css">

    <!-- notify js Fremwork -->
    <link rel="stylesheet" type="text/css" href="https://colorlib.com//polygon/adminty/files/bower_components/pnotify/css/pnotify.css">
    <link rel="stylesheet" type="text/css" href="https://colorlib.com//polygon/adminty/files/bower_components/pnotify/css/pnotify.brighttheme.css">
    <link rel="stylesheet" type="text/css" href="https://colorlib.com//polygon/adminty/files/bower_components/pnotify/css/pnotify.buttons.css">
    <link rel="stylesheet" type="text/css" href="https://colorlib.com//polygon/adminty/files/bower_components/pnotify/css/pnotify.history.css">
    <link rel="stylesheet" type="text/css" href="https://colorlib.com//polygon/adminty/files/bower_components/pnotify/css/pnotify.mobile.css">
    <link rel="stylesheet" type="text/css" href="https://colorlib.com//polygon/adminty/files/assets/pages/pnotify/notify.css">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.css">


    <!-- Style.css -->
    {{--<link rel="stylesheet" type="text/css" href="https://colorlib.com//polygon/adminty/files/assets/css/style.css">--}}
    <link rel="stylesheet" type="text/css" href="https://colorlib.com//polygon/adminty/files/assets/css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" type="text/css" href="https://colorlib.com//polygon/adminty/files/bower_components/datedropper/css/datedropper.min.css">
@stop
{{--@section('dashboard')--}}
    {{--<link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
{{--@endsection--}}
@section('content')

    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="ball-scale">
            <div class='contain'>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pre-loader end -->

    {{--ajax preloader--}}
    {{--<pre-loader></pre-loader>--}}


    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

            <nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">

                    <div class="navbar-logo">
                        <a class="mobile-menu" id="mobile-collapse" href="#!">
                            <i class="feather icon-menu"></i>
                        </a>
                        <a href="{{route('dashboard')}}">
                           
                            @if(Auth::guard('admin')->check())
                            <img class="img-fluid" src="{{asset('/images/'.auth()->guard('admin')->user()->logo)}}" width="50px" height="10px" alt="" />
                            @endif
                            <!--<a class="navbar-brand" href="#"><img src="images/kokro-yellow.png"  alt="kokrokoo"></a>-->

                        </a>
                        <a class="mobile-options">
                            <i class="feather icon-more-horizontal"></i>
                        </a>
                    </div>

                    <div class="navbar-container container-fluid">
                        <ul class="nav-left">
                            <li class="header-search">
                                <div class="main-search morphsearch-search">
                                    
                                </div>
                            </li>
                            {{--<li>--}}
                                {{--<a href="#!" onclick="javascript:toggleFullScreen()">--}}
                                    {{--<i class="feather icon-maximize full-screen"></i>--}}
                                {{--</a>--}}
                            {{--</li>--}}
                        </ul>
                        {{--<show-processing></show-processing>--}}

                        <ul class="nav-right">


                            <li class="user-profile header-notification">
                                <div class="dropdown-primary dropdown">
                                    <div class="dropdown-toggle" data-toggle="dropdown">
                                        <img src="https://colorlib.com//polygon/adminty/files/assets/images/avatar-4.jpg" class="img-radius" alt="User-Profile-Image">
                                        <span>
                                            
                                            @if(Auth::guard('admin'))
                                            {{--<i class="nc-icon fa fa-user"></i>--}}
                                            {{Auth::guard('admin')->user()->name}}
                                            @endif
                                        </span>
                                        <i class="feather icon-chevron-down"></i>
                                    </div>
                                    <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                        <li>
                                            <a href="{{route('staff.profile')}}">
                                                <i class="feather icon-settings"></i> Settings
                                            </a>
                                        </li>

                                        <li>
                                            <a href="{{ route('logout.staff') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                <i class="feather icon-log-out"></i> Logout
                                            </a>
                                           
                                        </li>

                                    </ul>

                                    <form id="logout-form" action="{{ route('logout.staff') }}" method="POST" style="display: none;">
                                    {@csrf}}
                                   </form>

                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- Sidebar chat start -->
            <div id="sidebar" class="users p-chat-user showChat">
                <div class="had-container">
                    <div class="card card_main p-fixed users-main">
                        <div class="user-box">
                            <div class="chat-inner-header">
                                <div class="back_chatBox">
                                    <div class="right-icon-control">
                                        <input type="text" class="form-control  search-text" placeholder="Search Friend" id="search-friends">
                                        <div class="form-icon">
                                            <i class="icofont icofont-search"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="main-friend-list">
                                <div class="media userlist-box" data-id="1" data-status="online" data-username="Josephin Doe" data-toggle="tooltip" data-placement="left" title="Josephin Doe">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-radius img-radius" src="https://colorlib.com//polygon/adminty/files/assets/images/avatar-3.jpg" alt="Generic placeholder image ">
                                        <div class="live-status bg-success"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Josephin Doe</div>
                                    </div>
                                </div>
                                <div class="media userlist-box" data-id="2" data-status="online" data-username="Lary Doe" data-toggle="tooltip" data-placement="left" title="Lary Doe">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-radius" src="https://colorlib.com//polygon/adminty/files/assets/images/avatar-2.jpg" alt="Generic placeholder image">
                                        <div class="live-status bg-success"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Lary Doe</div>
                                    </div>
                                </div>
                                <div class="media userlist-box" data-id="3" data-status="online" data-username="Alice" data-toggle="tooltip" data-placement="left" title="Alice">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-radius" src="https://colorlib.com//polygon/adminty/files/assets/images/avatar-4.jpg" alt="Generic placeholder image">
                                        <div class="live-status bg-success"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Alice</div>
                                    </div>
                                </div>
                                <div class="media userlist-box" data-id="4" data-status="online" data-username="Alia" data-toggle="tooltip" data-placement="left" title="Alia">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-radius" src="https://colorlib.com//polygon/adminty/files/assets/images/avatar-3.jpg" alt="Generic placeholder image">
                                        <div class="live-status bg-success"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Alia</div>
                                    </div>
                                </div>
                                <div class="media userlist-box" data-id="5" data-status="online" data-username="Suzen" data-toggle="tooltip" data-placement="left" title="Suzen">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-radius" src="https://colorlib.com//polygon/adminty/files/assets/images/avatar-2.jpg" alt="Generic placeholder image">
                                        <div class="live-status bg-success"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Suzen</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sidebar inner chat start-->
            <div class="showChat_inner">
                <div class="media chat-inner-header">
                    <a class="back_chatBox">
                        <i class="feather icon-chevron-left"></i> Josephin Doe
                    </a>
                </div>
                <div class="media chat-messages">
                    <a class="media-left photo-table" href="#!">
                        <img class="media-object img-radius img-radius m-t-5" src="https://colorlib.com//polygon/adminty/files/assets/images/avatar-3.jpg" alt="Generic placeholder image">
                    </a>
                    <div class="media-body chat-menu-content">
                        <div class="">
                            <p class="chat-cont">I'm just looking around. Will you tell me something about yourself?</p>
                            <p class="chat-time">8:20 a.m.</p>
                        </div>
                    </div>
                </div>
                <div class="media chat-messages">
                    <div class="media-body chat-menu-reply">
                        <div class="">
                            <p class="chat-cont">I'm just looking around. Will you tell me something about yourself?</p>
                            <p class="chat-time">8:20 a.m.</p>
                        </div>
                    </div>
                    <div class="media-right photo-table">
                        <a href="#!">
                            <img class="media-object img-radius img-radius m-t-5" src="https://colorlib.com//polygon/adminty/files/assets/images/avatar-4.jpg" alt="Generic placeholder image">
                        </a>
                    </div>
                </div>
                <div class="chat-reply-box p-b-20">
                    <div class="right-icon-control">
                        <input type="text" class="form-control search-text" placeholder="Share Your Thoughts">
                        <div class="form-icon">
                            <i class="feather icon-navigation"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sidebar inner chat end-->
               {{--side bar and main content goes here--}}
            {{--<side-bar></side-bar>--}}

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <nav class="pcoded-navbar">
                        <div class="pcoded-inner-navbar main-menu">

                            <div class="pcoded-navigatio-lavel">Navigation</div>
                            <ul class="pcoded-item pcoded-left-item">

                                @if(Auth::guard('admin')->check() && Auth::guard('admin')->user()->admin_type !== 'broadcaster')
                                <li class="pcoded-hasmenu active pcoded-trigger">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                        <span class="pcoded-mtext">Dashboard</span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class="active">
                                            <a href="{{route('staff.dashboard')}}">
                                                <span class="pcoded-mtext">home</span>
                                            </a>
                                        </li>
                                        
                                    </ul>
                                </li>
                                @endif
                                
                                    @if(Auth::guard('admin')->user()->admin_type == 'marketers' || Auth::guard('admin')->user()->admin_type == 'admin')
 
                                    <li class="pcoded-hasmenu active pcoded-trigger">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="feather icon-shield"></i></span>
                                        <span class="pcoded-mtext">Subscriptions</span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li>
                                            <a href="{{route('staff.sub.all')}}">
                                                <span class="pcoded-micon"><i class="feather icon-menu"></i></span>
                                                <span class="pcoded-mtext">All</span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="{{route('staff.sub.pending')}}">
                                                <span class="pcoded-micon"><i class="feather icon-menu"></i></span>
                                                <span class="pcoded-mtext">Pending</span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="{{route('staff.sub.new')}}">
                                                <span class="pcoded-micon"><i class="feather icon-menu"></i></span>
                                                <span class="pcoded-mtext">Accepted</span>
                                            </a>
                                        </li>

                                        <li class="">
                                            <a href="{{route('staff.sub.active')}}">
                                                <span class="pcoded-micon"><i class="feather icon-menu"></i></span>
                                                <span class="pcoded-mtext">Active</span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="{{route('staff.sub.expired')}}">
                                                <span class="pcoded-micon"><i class="feather icon-menu"></i></span>
                                                <span class="pcoded-mtext">Expired</span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="{{route('staff.sub.reject')}}">
                                                <span class="pcoded-micon"><i class="feather icon-menu"></i></span>
                                                <span class="pcoded-mtext">Rejected</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="pcoded-hasmenu active pcoded-trigger">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="feather icon-shield"></i></span>
                                        <span class="pcoded-mtext">Rate cards</span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li>
                                            <a href="{{route('staff.create.ratecard')}}">
                                                <span class="pcoded-micon"><i class="feather icon-menu"></i></span>
                                                <span class="pcoded-mtext">create</span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="{{route('staff.view.ratecard')}}">
                                                <span class="pcoded-micon"><i class="feather icon-menu"></i></span>
                                                <span class="pcoded-mtext">view</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                @endif
                                    @if(Auth::guard('admin')->user()->admin_type == 'broadcaster' || Auth::guard('admin')->user()->admin_type == 'admin')

                                    <li class="pcoded-hasmenu active pcoded-trigger">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="feather icon-shield"></i></span>
                                        <span class="pcoded-mtext">Downloadable subs.</span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li>
                                            <a href="{{route('staff.downloadable.subs')}}">
                                                <span class="pcoded-micon"><i class="feather icon-menu"></i></span>
                                                <span class="pcoded-mtext">subscriptions</span>
                                            </a>
                                        </li>

                                    </ul>
                                </li>
                                   @endif


                                <ul class="pcoded-item pcoded-left-item">
                                    @if(Auth::guard('admin')->check() &&  Auth::guard('admin')->user()->admin_type == 'finance' || Auth::guard('admin')->user()->admin_type == 'admin')
                                    <li class=" ">
                                        <a href="{{route('staff.transact')}}">
                                            <span class="pcoded-micon"><i class="feather icon-edit-1"></i></span>
                                            <span class="pcoded-mtext" >Transactions</span>
                                            <!--<span class="pcoded-badge label label-warning">NEW</span>-->
                                        </a>
                                    </li>
                                    @endif

                                        @if(Auth::guard('admin') && Auth::guard('admin')->user()->admin_type == 'super_admin')

                                        <li class="pcoded-hasmenu active pcoded-trigger">
                                        <a href="javascript:void(0)">
                                            <span class="pcoded-micon"><i class="feather icon-shield"></i></span>
                                            <span class="pcoded-mtext">Manage Admin</span>
                                        </a>
                                        <ul class="pcoded-submenu">
                                            <li>
                                                <a href="{{route('staff.manage.admins')}}">
                                                    <span class="pcoded-micon"><i class="feather icon-menu"></i></span>
                                                    <span class="pcoded-mtext">View admins</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{route('staff.create.admins')}}">
                                                    <span class="pcoded-micon"><i class="feather icon-menu"></i></span>
                                                    <span class="pcoded-mtext">Create new admin</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                    @endif
                            </ul>
                        </div>

                    </nav>

                    <!-- main content starts here -->
                    <div class="pcoded-content">

                        <div class="pcoded-inner-content">
                            <div class="main-body">

                            @yield('dashboard')
                                {{--<router-view></router-view>--}}

{{--                                <div id="styleSelector">--}}

                                </div>
                            </div>
                        </div>
                    </div>

                    <!--main content ends here -->
                </div>
            </div>

{{--            <h3>Hello world</h3>--}}
        </div>
    </div>


@endsection
                    @section('scripts')

                    {{--<script src="{{asset('js/app.js')}}"></script>--}}
                    <![endif]-->
                    <!-- Warning Section Ends -->
                    <!-- Required Jquery -->
                    <script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/bower_components/jquery/js/jquery.min.js"></script>
                    <script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
                    <script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/bower_components/popper.js/js/popper.min.js"></script>
                    <script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/bower_components/bootstrap/js/bootstrap.min.js"></script>

                    <script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>
                    <script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/assets/js/bootstrap-growl.min.js"></script>
                    {{--<script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/assets/pages/notification/notification.js"></script>--}}



                    <script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/assets/pages/advance-elements/moment-with-locales.min.js"></script>
                    <script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/bower_components/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

                    <script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/assets/pages/advance-elements/bootstrap-datetimepicker.min.js"></script>

                    <script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/bower_components/bootstrap-daterangepicker/js/daterangepicker.js"></script>

                    <script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/bower_components/datedropper/js/datedropper.min.js"></script>

                    <script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/bower_components/spectrum/js/spectrum.js"></script>
                    <script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/bower_components/jscolor/js/jscolor.js"></script>

                    <script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/bower_components/jquery-minicolors/js/jquery.minicolors.min.js"></script>

                    <!-- calender js -->
                                       <script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/bower_components/moment/js/moment.min.js"></script>
                    <script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/bower_components/fullcalendar/js/fullcalendar.min.js"></script>

                    <script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/bower_components/modernizr/js/modernizr.js"></script>
                    <script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/bower_components/modernizr/js/css-scrollbars.js"></script>

                    {{--<!-- jquery file upload js -->--}}
                    {{--<script src="https://colorlib.com//polygon/adminty/files/assets/pages/jquery.filer/js/jquery.filer.min.js"></script>--}}
                    {{--<script src="https://colorlib.com//polygon/adminty/files/assets/pages/filer/custom-filer.js" type="text/javascript"></script>--}}
                    {{--<script src="https://colorlib.com//polygon/adminty/files/assets/pages/filer/jquery.fileuploads.init.js" type="text/javascript"></script>--}}


                    <!-- pnotify js -->
                    <script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/bower_components/pnotify/js/pnotify.js"></script>
                    <script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/bower_components/pnotify/js/pnotify.desktop.js"></script>
                    <script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/bower_components/pnotify/js/pnotify.buttons.js"></script>
                    <script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/bower_components/pnotify/js/pnotify.confirm.js"></script>
                    <script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/bower_components/pnotify/js/pnotify.callbacks.js"></script>
                    <script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/bower_components/pnotify/js/pnotify.animate.js"></script>
                    <script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/bower_components/pnotify/js/pnotify.history.js"></script>
                    <script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/bower_components/pnotify/js/pnotify.mobile.js"></script>
                    <script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/bower_components/pnotify/js/pnotify.nonblock.js"></script>
                    {{--<script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/assets/pages/pnotify/notify.js"></script>--}}

                    <!-- sweet alert js -->
                    <script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/bower_components/sweetalert/js/sweetalert.min.js"></script>
                    {{--                    <script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/assets/js/modal.js"></script>--}}
                    <!-- sweet alert modal.js intialize js -->
                    <!-- modalEffects js nifty modal window effects -->
                    <script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/assets/js/modalEffects.js"></script>
                    <script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/assets/js/classie.js"></script>
                    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>



                    <script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/bower_components/i18next/js/i18next.min.js"></script>
                    <script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/bower_components/i18next-xhr-backend/js/i18nextXHRBackend.min.js"></script>
                    <script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/bower_components/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.min.js"></script>
                    <script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/bower_components/jquery-i18next/js/jquery-i18next.min.js"></script>

                    {{--                    <script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/assets/pages/advance-elements/custom-picker.js"></script>--}}
                    {{--<script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/assets/pages/full-calender/calendar.js"></script>--}}

                    <script src="https://colorlib.com//polygon/adminty/files/assets/js/pcoded.min.js"></script>
                    <script src="https://colorlib.com//polygon/adminty/files/assets/js/vartical-layout.min.js"></script>
                    <script src="https://colorlib.com//polygon/adminty/files/assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
                    {{--<script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/assets/js/script.js"></script>--}}

                    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
                    <!-- Global site tag (gtag.js) - Google Analytics -->
                    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
                    <script>
                        window.dataLayer = window.dataLayer || [];
                        function gtag(){dataLayer.push(arguments);}
                        gtag('js', new Date());

                        gtag('config', 'UA-23581568-13');
                    </script>

   


@endsection