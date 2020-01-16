{{--@extends('layouts.app')--}}

{{--@section('content')--}}

{{--@section('styles')--}}

{{--    @include('includes.links')--}}
{{--@endsection--}}

{{--    <nav class="navbar navbar-fixed-top yellow " style="background: grey">--}}
{{--        <div class="container-fluid">--}}
{{--            <div class="navbar-header">--}}
{{--                <a class="navbar-brand" href="{{route('welcome')}}"><img src="images/kokro-yellow.png"  alt="kokrokoo"></a>--}}
{{--            </div>--}}
{{--            <div class="container">--}}
{{--                <!-- Collect the nav links, forms, and other content for toggling -->--}}
{{--                --}}{{--<div class="collapse navbar-collapse navbar-ex1-collapse  ">--}}
{{--                    --}}{{--<ul class="nav navbar-nav navbar-right">--}}
{{--                        --}}{{--<li><a href="{{route('welcome')}}">Home</a></li>--}}
{{--                        --}}{{--<li class="dropdown">--}}
{{--                            --}}{{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Register <span class="caret"></span></a>--}}
{{--                            --}}{{--<ul class="dropdown-menu">--}}
{{--                                --}}{{--<li><a href="{{route('register.personal')}}" style="color: #0c0c0c">Personal</a></li>--}}
{{--                                --}}{{--<li><a href="{{route('register.org')}}" style="color: #0c0c0c">Organisation</a></li>--}}
{{--                                --}}{{--<li><a href="{{route('register.media')}}" style="color: #0c0c0c">Media house</a></li>--}}
{{--                            --}}{{--</ul>--}}
{{--                        --}}{{--</li>--}}
{{--                    --}}{{--</ul>--}}
{{--                --}}{{--</div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </nav>--}}


{{--    <!-- about-us-1 start -->--}}
{{--    <div id="about-us-1" class="big-padding">--}}
{{--        <div class="row">--}}
{{--            <div class="col-sm-12">--}}

{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-md-4"></div>--}}
{{--                <div class="col-md-4">--}}

{{--                        <div class="" style="margin-top: 60px;">--}}
{{--                            <h2 style="color: #E6AA00; font-size: 20px;font-weight: 800"> MEDIA ADMIN LOGIN</h2>--}}
{{--                        </div>--}}

{{--                </div>--}}
{{--                <div class="col-md-4"></div>--}}
{{--            </div>--}}

{{--            <div class="well-sm" style="background: transparent !important;">--}}
{{--                <form method="post" action="{{route('login')}}">--}}
{{--                    @csrf--}}
{{--                    <div class="row" style="margin-top: 80px;">--}}
{{--                        <div class="col-sm-4"></div>--}}
{{--                        <div class="col-sm-4">--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="email">Email</label>--}}
{{--                                <input type="email" name="email" required id="email" class="form-control {{$errors->has('email' ? 'is-invalid' : '')}} " value="{{old('email')}}">--}}
{{--                                <span>--}}
{{--                                    @if ($errors->has('email'))--}}
{{--                                        <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('email') }}</strong></span>--}}
{{--                                    @endif--}}
{{--                                       </span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-sm-4"></div>--}}
{{--                    </div>--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-sm-4"></div>--}}
{{--                        <div class="col-sm-4">--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="password">Password</label>--}}
{{--                                <input type="password" name="password" required id="password" class="form-control {{$errors->has('password' ? 'is-invalid' : '')}} " value="{{old('password')}}">--}}
{{--                                <span>--}}
{{--                                    @if ($errors->has('password'))--}}
{{--                                        <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('password') }}</strong></span>--}}
{{--                                    @endif--}}
{{--                                </span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-sm-4"></div>--}}
{{--                    </div>--}}

{{--                    <div class="row">--}}
{{--                        <div class="col-sm-4"></div>--}}
{{--                        <div class="col-sm-4">--}}
{{--                            <div class="form-group">--}}
{{--                                <button type="submit" class="btn button" id="submit_btn" style="color: #1b1e21;background: #F1CF00;margin-top:20px;">Login</button>--}}

{{--                            </div>--}}

{{--                        </div>--}}
{{--                        <div class="col-sm-4"></div>--}}

{{--                    </div>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--            </div>--}}

{{--    </div>--}}

{{--            @section('scripts')--}}
{{--                @include('includes.scripts')--}}
{{--            @endsection--}}






























{{--    --}}{{--<div class="limiter">--}}
{{--        --}}{{--<span class="login100-form-title p-b-49">--}}
{{--                        						--}}{{--Login--}}
{{--					--}}{{--</span>--}}
{{--        --}}{{--<div class="container-login100" style="background-image:url('images/bgs.jpeg'); background-repeat: no-repeat;background-size: cover">--}}
{{--             --}}{{--<div class="container-fluid">--}}
{{--            --}}{{--<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54 animated fade-in">--}}
{{--                --}}{{--<div style="text-align: center;">--}}
{{--                    --}}{{--<a class="navbar-brand" href="{{route('welcome')}}"><img src="images/kokro-yellow.png"  alt="kokrokoo"></a>--}}

{{--                    --}}{{--<h6 style="font-weight: bold;font-size: 26px;padding-bottom: 40px;font-family: Poppins-Bold">Login</h6></div>--}}
{{--                --}}{{--<form class="login100-form validate-form" action="{{route('login')}}" method="post">--}}

{{--                   --}}{{--@csrf--}}


{{--                    --}}{{--<div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">--}}
{{--                        --}}{{--<span class="label-input100">Username</span>--}}
{{--                        --}}{{--<input class="input100" type="email" name="email" placeholder="Type your email" required="">--}}
{{--                        --}}{{--<span class="focus-input100" data-symbol="&#xf206;"></span>--}}
{{--                        --}}{{--@if ($errors->has('email'))--}}
{{--                        --}}{{--<span class="invalid-feedback">--}}
{{--                        --}}{{--<strong>{{ $errors->first('email') }}</strong>--}}
{{--                        --}}{{--</span>--}}
{{--                        --}}{{--@endif--}}
{{--                    --}}{{--</div>--}}

{{--                    --}}{{--<div class="wrap-input100 validate-input" data-validate="Password is required">--}}
{{--                        --}}{{--<span class="label-input100">Password</span>--}}
{{--                        --}}{{--<input class="input100" type="password" name="password" placeholder="Type your password" required="">--}}
{{--                        --}}{{--<span class="focus-input100" data-symbol="&#xf190;"></span>--}}
{{--                        --}}{{--@if ($errors->has('password'))--}}
{{--                        --}}{{--<span class="invalid-feedback">--}}
{{--                        --}}{{--<strong>{{ $errors->first('password') }}</strong>--}}
{{--                        --}}{{--</span>--}}
{{--                        --}}{{--@endif--}}
{{--                    --}}{{--</div>--}}

{{--                    --}}{{--<div class="text-right p-t-8 p-b-31">--}}
{{--                        --}}{{--<a href="#">--}}
{{--                            --}}{{--Forgot password?--}}
{{--                        --}}{{--</a>--}}
{{--                    --}}{{--</div>--}}

{{--                    --}}{{--<div class="container-login100-form-btn">--}}
{{--                        --}}{{--<div class="wrap-login100-form-btn">--}}
{{--                            --}}{{--<div class="login100-form-bgbtn"></div>--}}
{{--                            --}}{{--<button type="submit" class="login100-form-btn" style="font-weight: bolder !important;background: none !important;">--}}
{{--                                --}}{{--Login--}}
{{--                            --}}{{--</button>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--@endsection--}}

{{--@section('scripts')--}}
{{--    --}}{{--@include('includes.scripts')--}}
{{--@stop--}}

{{--@push('loader')--}}
{{--    --}}{{--@include('includes.loader')--}}
{{--@endpush--}}
{{--@push('styles')--}}
{{--    --}}{{--@include('includes.links')--}}
{{--@endpush--}}

        <!DOCTYPE html>
<html lang="en">


<!-- Mirrored from colorlib.com//polygon/adminty/default/auth-sign-in-social.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Jan 2019 23:33:47 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <title>Adminty - Premium Admin Template by Colorlib </title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="#">
    <meta name="keywords" content="Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="#">
    <!-- Favicon icon -->

    <link rel="icon" href="https://colorlib.com//polygon/adminty/files/assets/images/favicon.ico" type="image/x-icon">
    <!-- Google font--><link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="https://colorlib.com//polygon/adminty/files/bower_components/bootstrap/css/bootstrap.min.css">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="https://colorlib.com//polygon/adminty/files/assets/icon/themify-icons/themify-icons.css">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="https://colorlib.com//polygon/adminty/files/assets/icon/icofont/css/icofont.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="https://colorlib.com//polygon/adminty/files/assets/css/style.css">
</head>

<body class="fix-menu">
<!-- Pre-loader start -->
<div class="theme-loader">
    <div class="ball-scale">
        <div class='contain'>
            <div class="ring"><div class="frame"></div></div>
            <div class="ring"><div class="frame"></div></div>
            <div class="ring"><div class="frame"></div></div>
            <div class="ring"><div class="frame"></div></div>
            <div class="ring"><div class="frame"></div></div>
            <div class="ring"><div class="frame"></div></div>
            <div class="ring"><div class="frame"></div></div>
            <div class="ring"><div class="frame"></div></div>
            <div class="ring"><div class="frame"></div></div>
            <div class="ring"><div class="frame"></div></div>
        </div>
    </div>
</div>


<nav class="navbar navbar-fixed-top yellow " style="background: transparent;">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{route('login')}}"><img src="/images/kokro-yellow.png"  alt="kokrokoo"></a>
        </div>
        <div class="container">
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-default">
                <ul class="nav navbar-nav navbar-right">
                    <li class="pull-right"><a href="">MEDIA HOUSE ADMIM</a></li>

                </ul>
            </div>
        </div>
    </div>
</nav>

<!-- Pre-loader end -->
<section class="login-block" style="background: transparent !important;margin-top: -140px !important; ">
    <!-- Container-fluid starts -->
    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <!-- Authentication card start -->
                <p>{{$errors}}</p>
                <form class="md-float-material form-material" method="post"  action="{{route('login.staff')}}">
                    @csrf
                    <div class="text-center">
                        {{--                        <img src="images/kokro-yellow.png"  alt="kokrokoo Media Admin">--}}
                    </div>
                    <div class="auth-box card">
                        <div class="card-block">
                            <div class="row m-b-20">
                                <div class="col-md-12">
                                    <h3 class="text-center txt-primary">Sign In</h3>
                                </div>
                            </div>
                            <div class="row m-b-20">
                                <div class="col-md-6">
                                    <button class="btn btn-facebook m-b-20 btn-block"><i class="icofont icofont-social-facebook"></i>facebook</button>
                                </div>
                                <div class="col-md-6">
                                    <button class="btn btn-google-plus m-b-20 btn-block"><i class="icofont icofont-social-google-plus"></i>google</button>
                                </div>
                            </div>
                            <p class="text-muted text-center p-b-5">Sign in with your regular account</p>
{{--                            <div class="input-group form-primary">--}}
{{--                                <span class="input-group-addon" id="basic-addon1"><i class="icofont icofont-user"></i> </span>--}}

{{--                                <select  name="role" required id="role" class="form-control {{$errors->has('role' ? 'is-invalid' : '')}} ">--}}
{{--                                    <option selected>Who are you?</option>--}}
{{--                                    <option>Finance</option>--}}
{{--                                    <option>Broadcaster</option>--}}
{{--                                    <option>Advertisers</option>--}}
{{--                                    <option>Admin</option>--}}




{{--                                </select>--}}

{{--                                @if ($errors->has('role'))--}}
{{--                                    <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('role') }}</strong></span>--}}
{{--                                @endif--}}


{{--                                <span class="form-bar"></span>--}}
{{--                            </div>--}}
                            <div class="input-group form-primary">
                                <span class="input-group-addon" id="basic-addon1"><i class="icofont icofont-envelope"></i> </span>

                                <input type="email" name="email" required id="email" class="form-control {{$errors->has('email' ? 'is-invalid' : '')}} " value="{{old('email')}}" placeholder="emial">

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('email') }}</strong></span>
                                @endif


                                <span class="form-bar"></span>
                            </div>
                            <div class="input-group form-primary">
                                <span class="input-group-addon" id="basic-addon2"><i class="icofont icofont-key"></i> </span>

                                <input type="password" name="password" required id="password" class="form-control {{$errors->has('password' ? 'is-invalid' : '')}} " value="{{old('password')}}" placeholder="password">

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('password') }}</strong></span>
                                @endif

                                <span class="form-bar"></span>
                            </div>
                            <div class="row m-t-25 text-left">
                                <div class="col-12">
                                    <div class="checkbox-fade fade-in-primary">
                                        <label>
                                            <input type="checkbox"  name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                            <span class="text-inverse">Remember me</span>
                                        </label>
                                    </div>
                                    <div class="forgot-phone text-right f-right">
                                        <a href="{{route('password.request')}}" class="text-right f-w-600"> Forgot Password?</a>
                                    </div>
                                </div>
                            </div>
                            <div class="row m-t-30">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary btn-md btn-block waves-ripple text-center m-b-20">LOGIN <i class="icofont icofont-sign-in"> </i> </button>

                                </div>
                            </div>
                            {{--                            <p class="text-inverse text-left">Don't have an account?<a href="auth-sign-up-social.html"> <b class="f-w-600">Register here </b></a>for free!</p>--}}
                        </div>
                    </div>
                </form>
                <!-- end of form -->
            </div>
            <!-- Authentication card end -->
        </div>
        <!-- end of col-sm-12 -->
    </div>
    <!-- end of row -->
    </div>
    <!-- end of container-fluid -->
</section>
<!-- Warning Section Starts -->
<!-- Older IE warning message -->
<!--[if lt IE 10]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="../files/assets/images/browser/chrome.png" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="../files/assets/images/browser/firefox.png" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="../files/assets/images/browser/opera.png" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="../files/assets/images/browser/safari.png" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="../files/assets/images/browser/ie.png" alt="">
                    <div>IE (9 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->
<!-- Warning Section Ends -->
<!-- Required Jquery -->
<script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/bower_components/jquery/js/jquery.min.js"></script>
<script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/bower_components/popper.js/js/popper.min.js"></script>
<script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/bower_components/bootstrap/js/bootstrap.min.js"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>
<!-- modernizr js -->
<script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/bower_components/modernizr/js/modernizr.js"></script>
<script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/bower_components/modernizr/js/css-scrollbars.js"></script>
<!-- i18next.min.js -->
<script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/bower_components/i18next/js/i18next.min.js"></script>
<script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/bower_components/i18next-xhr-backend/js/i18nextXHRBackend.min.js"></script>
<script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/bower_components/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.min.js"></script>
<script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/bower_components/jquery-i18next/js/jquery-i18next.min.js"></script>
<script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/assets/js/common-pages.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-23581568-13');
</script>
</body>


<!-- Mirrored from colorlib.com//polygon/adminty/default/auth-sign-in-social.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Jan 2019 23:33:47 GMT -->
</html>

@section('scripts')
    @include('includes.scripts')
@stop

@push('loader')
    @include('includes.loader')
@endpush
@push('styles')
    @include('includes.links')
@endpush