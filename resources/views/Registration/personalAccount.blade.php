@extends('layouts.app')
@section('styles')

    @include('includes.links')
@endsection

@section('content')
    @include('Registration.home')
<!-- about us start -->
<section id="about-us4">

    <!-- about-us-1 start -->
    <div id="about-us-1" class="big-padding">
        <div class="container">
            <form id="personal-account-form" action="{{route('register')}}" method="post">
                @csrf
                <input type="hidden" name="account" value="personal">
            <div class="row">
                <div class="col-sm-12 wow fadeIn">
                    <div class="outer-bound">
                        <div class=" vertical-heading">
                            <h2 style="color: #E6AA00; font-size: 25px;font-weight: 400">Personal Informations</h2><hr>
                        </div><br><br>
                        <div class="col-sm-offset-2">
                            <div class="right-section" id="form-elements">


                                    <div class="row">
                                        <div class="col-md-12 center"><div id="result"></div> </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Industrial type<span class="required">*</span></label>
                                                <input type="text" class="form-control" placeholder="Industrial type" required="required"  name="industry_type" value="{{old('industry_type')}}">
                                                <span class="agileits_grid">
                                                    @if ($errors->has('industry_type'))
                                                        <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('industry_type') }}</strong></span>
                                                    @endif
							                       </span>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Job Title<span class="required">*</span></label>
                                                <input type="text" class="form-control" placeholder="Job title" required="required"  name="title" value="{{old('title')}}">
                                                <span class="agileits_grid">
                                                    @if ($errors->has('title'))
                                                        <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('title') }}</strong></span>
                                                    @endif
							                       </span>
                                            </div>
                                        </div>


                                    </div>
                                 <div class="row">

                                     <div class="col-sm-8">
                                         <div class="form-group">
                                             <label>Address<span class="required">*</span></label>
                                             <textarea class="form-control" placeholder="Address" required="required"  name="address">{{old('address')}}</textarea>
                                             <span class="agileits_grid">
                                                    @if ($errors->has('address'))
                                                     <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('address') }}</strong></span>
                                                 @endif
							                       </span>
                                         </div>
                                         {{--<button type="submit" class="btn button" id="submit_btn">Submit</button>--}}

                                     </div>

                                 </div>


                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12 wow fadeIn">
                    <div class="outer-bound">
                        <div class=" vertical-heading">
                            <h2 style="color: #E6AA00; font-size: 25px;font-weight: 400">User account Information</h2><hr>
                        </div><br><br>
                        <div class="col-sm-offset-2">
                            <div class="right-section" id="form-elements">


                                    <div class="row">
                                        <div class="col-md-12 center"><div id="result"></div> </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Full name<span class="required">*</span></label>
                                                <input type="text" class="form-control" placeholder="Your Name" required="required"  name="name" value="{{ old('name') }}">
                                                   <span class="agileits_grid">
                                                    @if ($errors->has('name'))
                                                        <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('name') }}</strong></span>
                                                    @endif
							                       </span>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Email<span class="required">*</span></label>
                                                <input type="email" class="form-control" placeholder="Email Address" required="required"  name="email" value="{{old('email')}}">
                                                <span class="agileits_grid">
                                                    @if ($errors->has('email'))
                                                        <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('email') }}</strong></span>
                                                    @endif
							                       </span>
                                            </div>
                                        </div>
                                    </div>
                                       <div class="row">

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Phone no. 1<span class="required">*</span></label>
                                                <input type="text" class="form-control" placeholder="Phone No.1" required="required"  name="phone1" value="{{old('phone1')}}">
                                                <span class="agileits_grid">
                                                    @if ($errors->has('phone1'))
                                                        <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('phone1') }}</strong></span>
                                                    @endif
							                       </span>
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Phone no. 2</label>
                                                <input type="text" class="form-control" placeholder="Phone No. 2" required="required"  name="phone2" {{old('phone2')}}>
                                                <span class="agileits_grid">
                                                    @if ($errors->has('phone2'))
                                                        <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('phone2') }}</strong></span>
                                                    @endif
							                       </span>
                                            </div>
                                        </div>
                                       </div>
                                        <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="password">Password<span class="required">*</span></label>
                                                <input type="password" class="form-control" placeholder="Enter password" required="required" id="password"  name="password">
                                                <span class="agileits_grid">
                                                    @if ($errors->has('password'))
                                                        <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('password') }}</strong></span>
                                                    @endif
							                       </span>
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Re-type Password<span class="required">*</span></label>
                                                <input type="password" class="form-control" placeholder="Re-type password" required="required"  name="password_confirmation">

                                                <span class="invalid-feedback" role="alert"><strong></strong></span>


                                            </div>
                                        </div>

                                    </div>
                                <button type="submit" class="btn button" id="submit_btn" style="color: #1b1e21;background: #F1CF00">Submit</button>
                                <span style="color:#E6AA00 ">Already registered?
                                </span><a href="{{route('login')}}" class="link text-info">Login</a>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
            </form>
        </div>

    </div>
</section>

@endsection
@section('scripts')
    @include('includes.scripts')
@endsection