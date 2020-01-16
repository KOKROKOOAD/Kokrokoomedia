<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Event Registration Form Widget Flat Responsive Widget Template :: w3layouts</title>
    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Event Registration Form Widget Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    {{--<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);--}}
        {{--function hideURLbar(){ window.scrollTo(0,1); } </script>--}}
    <!-- //for-mobile-apps -->
    <!-- //custom-theme -->
    <link href="css/register/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/register/css/jquery-ui.css" rel="stylesheet" type="text/css" media="all" />
    <!-- js -->
    <script type="text/javascript" src="css/register/js/jquery-2.1.4.min.js"></script>
    <!-- //js -->
    <!-- font-awesome-icons -->
    <!-- //font-awesome-icons -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
</head>
<body>
<!-- banner -->
<div class="center-container">
    <div class="main">
        <h3 class="w3layouts_head">Business Registration Form</h3>
        <div class="w3layouts_main_grid">
            <form action="{{route('register')}}" method="POST" class="w3_form_post">
                @csrf
                <div class="w3_agileits_main_grid w3l_main_grid">
							<span class="agileits_grid">

								<input type="text" name="name" value="{{ old('name') }}" placeholder="Your Name" required="">
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
							</span>
                </div>
                <div class="agileits_w3layouts_main_grid w3ls_main_grid">
							<span class="agileinfo_grid">

								<div class="agileits_w3layouts_main_gridl">
									<input  id="email" name="email" type="email" placeholder="email" value="{{ old('email') }}" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}" required="">
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
								<div class="agileits_w3layouts_main_gridl">
									<input type="text" name="title" placeholder="title " value="{{ old('title') }}" required="">
                                    @if ($errors->has('title'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                    @endif
                                </div>
									<div class="clear"> </div>
							</span>
                </div>
                <div class="w3_agileits_main_grid w3l_main_grid">
							<span class="agileits_grid">

								<textarea type="text" name="address" placeholder="Address"  required="">{{ old('address') }}</textarea>
								</span>
                    @if ($errors->has('address'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                    @endif
                </div>
				<div class="w3_agileits_main_grid w3l_main_grid">
							<span class="agileits_grid">

								<textarea type="text" name="industry_type" placeholder="Industry type"  required="">{{ old('industry_type') }}</textarea>
								</span>
                    @if ($errors->has('industry_type'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('industry_type') }}</strong>
                                    </span>
                    @endif
				</div>
				<div class="w3_agileits_main_grid w3l_main_grid">
							<span class="agileits_grid">

								<textarea type="text" name="policies" placeholder="Policies"  required="">{{ old('policies') }}</textarea>
								</span>
                    @if ($errors->has('policies'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('policies') }}</strong>
                                    </span>
                    @endif
				</div>
                <div class="w3_agileits_main_grid w3l_main_grid">
							<span class="agileits_grid">

								<textarea type="text" name="company_profile" placeholder="A brief Profile"  required="">{{ old('company_profile') }}</textarea>
								</span>
                    @if ($errors->has('profile'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('company_profile') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="agileits_w3layouts_main_grid w3ls_main_grid">
							<span class="agileinfo_grid">

								<div class="agileits_w3layouts_main_gridl">
									<input  name="phone1" type="text" placeholder="phone1" value="{{ old('phone1') }}"  required="">
                                    @if ($errors->has('phone1'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone1') }}</strong>
                                    </span>
                                    @endif
                                </div>
								<div class="agileits_w3layouts_main_gridl">
									<input type="text" name="phone2" placeholder="Phone2" value="{{ old('phone2') }}" required="">
                                    @if ($errors->has('phone2'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone2') }}</strong>
                                    </span>
                                    @endif
								</div>
									<div class="clear"> </div>
							</span>
                </div>
                <div class="agileits_w3layouts_main_grid w3ls_main_grid">
							<span class="agileinfo_grid">

								<div class="agileits_w3layouts_main_gridl">
									<input   name="website" type="text" placeholder="website" value="{{ old('website') }}"  required="">
                                    @if ($errors->has('website'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('website') }}</strong>
                                    </span>
                                    @endif
                                </div>
								<div class="agileits_w3layouts_main_gridl">
									<input type="text" name="company_name" placeholder="company name " value="{{ old('company_name') }}" required="">
                                    @if ($errors->has('company_name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('company_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
									<div class="clear"> </div>
							</span>
                </div>
                <div class="agileits_w3layouts_main_grid w3ls_main_grid">
							<span class="agileinfo_grid">


								<div class="agileits_w3layouts_main_gridl">
									<input type="text" name="logo" placeholder="Upload logo " value="{{ old('logo') }}" >
                                    @if ($errors->has('logo'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('logo') }}</strong>
                                    </span>
                                    @endif
                                </div>
									<div class="clear"> </div>
							</span>
                </div>


                <div class="agileits_w3layouts_main_grid w3ls_main_grid">
							<span class="agileinfo_grid">

								<div class="agileits_w3layouts_main_gridl">
									<input  name="password" type="password" placeholder="password"  required="">
								</div>
								<div class="agileits_w3layouts_main_gridl">
									<input type="password" name="password_confirmation" placeholder="Re-type password " required="">
								</div>
									<div class="clear"> </div>
							</span>
                </div>


                <div class="w3_main_grid">
                    <div class="w3_main_grid_right">
                        <input type="submit" value="Submit">
                    </div>
                </div>
            </form>
        </div>
        <!-- Calendar -->
        <link rel="stylesheet" href="css/register/css/jquery-ui.css" />
        <script src="css/register/js/jquery-ui.js"></script>
        <script>
            $(function() {
                $( "#datepicker" ).datepicker();
            });
        </script>
        <!-- //Calendar -->
        <div class="w3layouts_copy_right">
            <div class="container">

            </div>
        </div>
    </div>
</div>
<!-- //footer -->
</body>
</html>