@extends('layouts.dashboard')

@section('dashboard')

    <div class="page-wrapper">
        <!-- Page-header start -->
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <div class="d-inline">
                            <h4>User Profile</h4>
                            <span></span>
                        </div>
                    </div>
                    <hr>
                </div>
{{--                <div class="col-lg-4">--}}
{{--                    <div class="page-header-breadcrumb">--}}
{{--                        <ul class="breadcrumb-title">--}}
{{--                            <li class="breadcrumb-item">--}}
{{--                                <a href="index.html"> <i class="feather icon-home"></i> </a>--}}
{{--                            </li>--}}
{{--                            <li class="breadcrumb-item"><a href="#!">User Profile</a>--}}
{{--                            </li>--}}
{{--                            <li class="breadcrumb-item"><a href="#!">User Profile</a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
        <!-- Page-header end -->

        <!-- Page-body start -->
        <div class="page-body">
            <!--profile cover start-->
            {{-- <div class="row">
                <div class="col-lg-12">
                    <div class="cover-profile">
                        <div class="profile-bg-img">
                            <img class="profile-bg-img img-fluid" src="https://colorlib.com//polygon/adminty/files/assets/images/user-profile/bg-img1.jpg" alt="bg-img">
                            <div class="card-block user-info">
                                <div class="col-md-12">
                                    <div class="media-left">
                                        <a href="#" class="profile-image">
                                            <img class="user-img img-radius" src="{{asset('/images/'.auth()->user()->logo)}}" alt="user-img">
                                        </a>
                                    </div>
                                    <div class="media-body row">
                                        <div class="col-lg-12">
                                            <div class="user-title">
                                                <h2>{{auth()->user()->name}}</h2>
                                                <span class="text-white">{{auth()->user()->title}}</span>
                                            </div>
                                        </div>
                                        <div>
{{--                                            <div class="pull-right cover-btn">--}}
{{--                                                <button type="button" class="btn btn-primary m-r-10 m-b-5"><i class="icofont icofont-edit"></i> Edit</button>--}}
{{--                                                <button type="button" class="btn btn-primary"  data-toggle="tab" href="#binfo" role="tab"><i class="icofont icofont-lock"></i> Reset Password</button>--}}
{{--                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <!--profile cover end-->
            <div class="row">
                <div class="col-lg-12">
                    <!-- tab header start -->
                    <div class="tab-header card">
                        <ul class="nav nav-tabs md-tabs tab-timeline" role="tablist" id="mytab">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#contacts" role="tab">Update Profile</a>
                                <div class="slide"></div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#binfo" role="tab">Company Info</a>
                                <div class="slide"></div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#personal" role="tab">My Personal Info</a>
                                <div class="slide"></div>
                            </li>
                            {{-- <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#review" role="tab">Security</a>
                                <div class="slide"></div>
                            </li> --}}
                        </ul>
                    </div>
                    <!-- tab header end -->
                    <!-- tab content start -->
                    <div class="tab-content">
                        <!-- tab panel personal start -->
                        <div class="tab-pane" id="personal" role="tabpanel">
                            <!-- personal card start -->
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-header-text">About Me</h5>
                                    {{-- <button id="edit-btn" type="button" class="btn btn-sm btn-primary waves-effect waves-light f-right">
                                        <i class="icofont icofont-edit"></i>
                                    </button> --}}
                                </div>
                                <div class="card-block">
                                    <div class="view-info">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="general-info">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-xl-6">
                                                            <div class="table-responsive">
                                                                <table class="table m-0" style="font-family:Spinnaker, sans-serif;font-size:14px;">
                                                                    <tbody>
                                                                    <tr>
                                                                        <th scope="row"><i class="fa fa-user text-primary"></i> Full Name</th>
                                                                        <td>{{auth()->user()->name}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row"><i class="fa fa-envelope text-primary"></i> Email</th>
                                                                        <td>{{auth()->user()->email}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row"><i class="fa fa-phone text-primary"></i> Phone Number</th>
                                                                        <td>{{auth()->user()->phone1}}</td>
                                                                    </tr>


                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <!-- end of table col-lg-6 -->
                                                        <div class="col-lg-12 col-xl-6">
                                                            <div class="table-responsive">
                                                                <table class="table" style="font-family:Spinnaker, sans-serif;font-size:14px;">
                                                                    <tbody>
                                                                    <tr>
                                                                        <th scope="row"><i class="fa fa-mobile text-primary"> </i> Phone Number 2</th>
                                                                        <td>{{auth()->user()->userProfile->phone2}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row"><i class="fa fa-user-plus  text-primary"> </i> Job Title</th>
                                                                        <td>{{auth()->user()->title}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row"><i class="fa fa-phone-square text-primary"> </i> Role</th>
                                                                        <td>{{auth()->user()->role}}</td>
                                                                    </tr>

                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <!-- end of table col-lg-6 -->
                                                    </div>
                                                    <!-- end of row -->
                                                </div>
                                                <!-- end of general info -->
                                            </div>
                                            <!-- end of col-lg-12 -->
                                        </div>
                                        <!-- end of row -->
                                    </div>
                                    <!-- end of view-info -->

                                </div>
                                <!-- end of card-block -->
                            </div>

                        </div>
                        <!-- tab pane personal end -->
                        <!-- tab pane info start -->
                        <div class="tab-pane" id="binfo" role="tabpanel">


                            <!-- personal card start -->
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-header-text">About Company</h5>
                                    <button id="edit-btn" type="button" class="btn btn-sm btn-primary waves-effect waves-light f-right">
                                        <i class="icofont icofont-edit"></i>
                                    </button>
                                </div>
                                <div class="card-block">
                                    <div class="view-info">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="general-info">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-xl-6">
                                                            <div class="table-responsive">
                                                                <table class="table m-0">
                                                                    <tbody>

                                                                    <tr>
                                                                        <th scope="row"><i class="fa fa-user text-primary"> </i> Company name</th>
                                                                        <td>{{auth()->user()->userProfile->company_name}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row"><i class="fa fa-envelope-o text-primary"> </i> website</th>
                                                                        <td>{{auth()->user()->userProfile->website}}</td>
                                                                    </tr>

                                                                    <tr>
                                                                        <th scope="row"><i class="fa fa-address-book text-primary"> </i> Location</th>
                                                                        <td>{{auth()->user()->userProfile->address}}</td>
                                                                    </tr>

                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <!-- end of table col-lg-6 -->
                                                        <div class="col-lg-12 col-xl-6">
                                                            <div class="table-responsive">
                                                                <table class="table">
                                                                    <tbody>

                                                                    <tr>
                                                                        <th scope="row"><i class="fa fa- text-primary"> </i> Policy</th>
                                                                        <td>{{auth()->user()->userProfile->policies}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row"><i class="fa fa-user-plus text-primary"> </i> Company profile</th>
                                                                        <td>{{auth()->user()->userProfile->company_profile}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row"><i class="fa fa-mic text-primary"> </i> Industrial type</th>
                                                                        <td>{{auth()->user()->userProfile->industry_type}}</td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <!-- end of table col-lg-6 -->
                                                    </div>
                                                    <!-- end of row -->
                                                </div>
                                                <!-- end of general info -->
                                            </div>
                                            <!-- end of col-lg-12 -->
                                        </div>
                                        <!-- end of row -->
                                    </div>
                                    <!-- end of view-info -->

                                </div>
                                <!-- end of card-block -->
                            </div>

                                    <!-- end of row -->
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




                        </div>
                        <!-- tab pane info end -->
                        <!-- tab pane contact start -->
                        <div class="tab-pane active" id="contacts" role="tabpanel">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <!-- contact data table card start -->
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5 class="card-header-text">Contacts</h5>
                                                </div>
                                                <div class="card-block contact-details">
                                                    <div class="data_table_main table-responsive dt-responsive">
                                                        <div class="edit-info">
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="general-info">
                                                                        <form method="post" action="{{route('admin.profile')}}">
                                                                            @csrf
                                                                        <div class="row">
                                                                            <div class="col-lg-6">
                                                                                <table class="table">
                                                                                    <tbody>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <div class="input-group">
                                                                                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                                                                                <input type="text" class="form-control" name="name" placeholder="Full Name" value="{{auth()->user()->name}}">
                                                                                            </div>
                                                                                        </td>
                                                                                    </tr>

                                                                                    <tr>
                                                                                        <td>
                                                                                            <div class="input-group">
                                                                                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                                                                                <input type="text" name="email" class="form-control" placeholder="email" value="{{auth()->user()->email}}">
                                                                                            </div>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <div class="input-group">
                                                                                                <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                                                                                                <input type="text" name="address" class="form-control" placeholder="address" value="{{auth()->user()->userProfile->address}}">
                                                                                            </div>
                                                                                        </td>
                                                                                    </tr>


                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                            <!-- end of table col-lg-6 -->
                                                                            <div class="col-lg-6">
                                                                                <table class="table">
                                                                                    <tbody>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <div class="input-group">
                                                                                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                                                                                <input type="text" class="form-control" name="phone1" placeholder="phone number" value="{{auth()->user()->phone1}}">
                                                                                            </div>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <div class="input-group">
                                                                                                <span class="input-group-addon"><i class="fa fa-phone-square"></i></span>
                                                                                                <input type="text" class="form-control" name="phone2" placeholder="phone number 2" value="{{auth()->user()->userProfile->phone2}}">
                                                                                            </div>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <div class="input-group">
                                                                                                <span class="input-group-addon"><i class="fa fa-user-plus"></i></span>
                                                                                                <input type="text" class="form-control" name="title" placeholder="Job title" value="{{auth()->user()->title}}">
                                                                                            </div>
                                                                                        </td>
                                                                                    </tr>


                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                            <!-- end of table col-lg-6 -->
                                                                     </div>
                                                                        <!-- end of row -->
                                                                        <div class="text-center">
                                                                            <button type="submit" class="btn btn-primary waves-effect waves-light ">Save</button>
                                                                        </div>
                                                                        </form>
                                                                    </div>

                                                                    <!-- end of edit info -->
                                                                </div>
                                                                <!-- end of col-lg-12 -->
                                                            </div>
                                                            <!-- end of row -->
                                                        </div>
                                                        <!-- end of edit-info -->
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- contact data table card end -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
{{-- 
                        <div class="tab-pane" id="review" role="tabpanel">

                            <div class="row">
                                <div class="col-sm-12">
                                    <!-- Authentication card start -->

                                    <form class="md-float-material form-material" method="post" action="{{route('change.password')}}">
                                        @csrf

                                        <input type="hidden" name="admin-type" value="">
                                        <div class="auth-box card">
                                            <div class="card-block">
                                                <div class="row m-b-20">
                                                    <div class="col-md-12">
                                                        <h4 class="text-left">Recover your password</h4>
                                                    </div>
                                                </div>

                                                <div class="form-group form-primary">
                                                    <input type="password" name="old_pass" class="form-control" required="" placeholder="Old password">
                                                    <span class="form-bar"></span>
                                                </div>
                                                <div class="form-group form-primary">
                                                    <input type="password" name="new_pass" class="form-control" required="" placeholder="New password">
                                                    <span class="form-bar"></span>
                                                </div>
                                                <div class="form-group form-primary">
                                                    <input type="password" name="confirm_new_pass" class="form-control" required="" placeholder="Confirm password">
                                                    <span class="form-bar"></span>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <button type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Save</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </form>
                                    <!-- Authentication card end -->
                                </div>
                                <!-- end of col-sm-12 -->
                            </div>
                        </div> --}}

                    </div>



                    <!-- tab content end -->
                </div>
            </div>
            <form-validation-message :message="'{!! \Illuminate\Support\Facades\Session::get('admin-profile') !!}'"></form-validation-message>

        </div>
        <!-- Page-body end -->
    </div>
    <!-- Main body end -->
    {{-- <div id="styleSelector">

    </div> --}}



@endsection