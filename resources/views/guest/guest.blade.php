@extends('layouts.app')

@section('content')

@section('styles')

    @include('includes.links')
@endsection

    <nav class="navbar navbar-fixed-top yellow " style="background: grey">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{route('welcome')}}"><img src="images/kokro-yellow.png"  alt="kokrokoo"></a>
            </div>
            <div class="container">

            </div>
        </div>
    </nav>


    <!-- about-us-1 start -->
    <div id="about-us-1" class="big-padding">
        <div class="row">
            <div class="col-sm-12">

        <div class="container">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">

                        <div class="" style="margin-top: 60px;">
                            <h2 style="color: #E6AA00; font-size: 20px;font-weight: 800"> MEDIA ADMIN LOGIN</h2>
                        </div>

                </div>
                <div class="col-md-4"></div>
            </div>

            <div class="well-sm" style="background: transparent !important;">
                <form method="post" action="{{route('check.admin')}}">
                    @csrf
                    <div class="row">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-4">
                            <select  class="form-control" name="role">
                                <option value="">Select a role</option>
                                <option value="super_admin">super_admin</option>
                                <option value="marketers">marketers</option>
                                <option value="finance">finance</option>
                                <option value="broadcaster">broadcaster</option>
                            </select>
                        </div>

                        <div class="col-sm-4"></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <button type="submit" class="btn button" id="submit_btn" style="color: #1b1e21;background: #F1CF00;margin-top:20px;">Next</button>

                            </div>

                        </div>
                    </div>
                </form>
            </div>
            </div>

    </div>

            @section('scripts')
                @include('includes.scripts')
            @endsection






























    {{--<div class="limiter">--}}
        {{--<span class="login100-form-title p-b-49">--}}
                        						{{--Login--}}
					{{--</span>--}}
        {{--<div class="container-login100" style="background-image:url('images/bgs.jpeg'); background-repeat: no-repeat;background-size: cover">--}}
             {{--<div class="container-fluid">--}}
            {{--<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54 animated fade-in">--}}
                {{--<div style="text-align: center;">--}}
                    {{--<a class="navbar-brand" href="{{route('welcome')}}"><img src="images/kokro-yellow.png"  alt="kokrokoo"></a>--}}

                    {{--<h6 style="font-weight: bold;font-size: 26px;padding-bottom: 40px;font-family: Poppins-Bold">Login</h6></div>--}}
                {{--<form class="login100-form validate-form" action="{{route('login')}}" method="post">--}}

                   {{--@csrf--}}


                    {{--<div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">--}}
                        {{--<span class="label-input100">Username</span>--}}
                        {{--<input class="input100" type="email" name="email" placeholder="Type your email" required="">--}}
                        {{--<span class="focus-input100" data-symbol="&#xf206;"></span>--}}
                        {{--@if ($errors->has('email'))--}}
                        {{--<span class="invalid-feedback">--}}
                        {{--<strong>{{ $errors->first('email') }}</strong>--}}
                        {{--</span>--}}
                        {{--@endif--}}
                    {{--</div>--}}

                    {{--<div class="wrap-input100 validate-input" data-validate="Password is required">--}}
                        {{--<span class="label-input100">Password</span>--}}
                        {{--<input class="input100" type="password" name="password" placeholder="Type your password" required="">--}}
                        {{--<span class="focus-input100" data-symbol="&#xf190;"></span>--}}
                        {{--@if ($errors->has('password'))--}}
                        {{--<span class="invalid-feedback">--}}
                        {{--<strong>{{ $errors->first('password') }}</strong>--}}
                        {{--</span>--}}
                        {{--@endif--}}
                    {{--</div>--}}

                    {{--<div class="text-right p-t-8 p-b-31">--}}
                        {{--<a href="#">--}}
                            {{--Forgot password?--}}
                        {{--</a>--}}
                    {{--</div>--}}

                    {{--<div class="container-login100-form-btn">--}}
                        {{--<div class="wrap-login100-form-btn">--}}
                            {{--<div class="login100-form-bgbtn"></div>--}}
                            {{--<button type="submit" class="login100-form-btn" style="font-weight: bolder !important;background: none !important;">--}}
                                {{--Login--}}
                            {{--</button>--}}
        </div>
    </div>

@endsection

{{--@section('scripts')--}}
    {{--@include('includes.scripts')--}}
{{--@stop--}}

{{--@push('loader')--}}
    {{--@include('includes.loader')--}}
{{--@endpush--}}
{{--@push('styles')--}}
    {{--@include('includes.links')--}}
{{--@endpush--}}
