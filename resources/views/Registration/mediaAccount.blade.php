@extends('layouts.app')

@section('styles')

    @include('includes.links')
@endsection


@section('content')
    @include('Registration.home')

<!-- about us start -->
<section id="services5">

    <!-- about-us-1 start -->
    <div id="service-1" class="big-padding">
        <div class="container">
            <form method="post"  action="{{route('register')}}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="account" value="MEDIA">
                <div class="row">
                    <div class="col-sm-12 wow fadeIn">
                        <div class="outer-bound">
                            <div class=" vertical-heading">
                                <h2 style="color: #E6AA00; font-size: 25px;font-weight: 400">Media House Informations</h2><hr>
                            </div><br><br>
                            <div class="col-sm-offset-2">
                                <div class="right-section" id="form-elements">
                                    <div class="row">
                                        <div class="col-md-12 center"><div id="result"></div> </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="company_name">Company name<span class="required">*</span></label>
                                                <input type="text" class="form-control {{ $errors->has('company_name')  ?  "is-invalid" : '' }}" placeholder="Enter company name"  id="company_name" name="company_name" value="{{old('company_name')}}">
                                                <span class="text-danger"></span>
                                                @if ($errors->has('company_name'))
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('company_name') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Job Title<span class="required">*</span></label>
                                                <input type="text" class="form-control" placeholder="Job title" id="title" name="title" value="{{old('title')}}">
                                                @if ($errors->has('title'))
                                                    <span class="invalid-feedback" role="alert">
                                                      <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Website<span class="required">*</span></label>
                                                <input type="text" class="form-control{{ $errors->has('website') ? ' is-invalid' : '' }}" placeholder="website"  id="website" name="website" value="{{old('website')}}">
                                                @if ($errors->has('website'))
                                                    <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $errors->first('website') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Media type<span class="required">*</span></label>

                                                {{--<input type="text" class="form-control{{ $errors->has('industry_type') ? ' is-invalid' : '' }}" placeholder="Radio"  id="industry_type" name="industry_type" value="{{old('website')}}">--}}
                                                <select name="media_type" class="form-control">
                                                    <option disabled="" selected="">- Select media type-</option>
                                                    <option value="Radio" {{old("media_type") == "Radio" ? "selected" : ""}}>Radio</option>
                                                    <option value="TV">TV</option>
                                                    <option value="Print">Print</option>
                                                </select>
                                                @if ($errors->has('media_type'))
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('media_type') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Address<span class="required">*</span></label>
                                                <textarea class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" placeholder="Address"  id="address" name="address">{{old('address')}}</textarea>
                                                @if ($errors->has('address'))
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Profile<span class="required">*</span></label>
                                                <textarea class="form-control{{ $errors->has('company_profile') ? ' is-invalid' : '' }}" placeholder="Tell us about your company"  id="company_profile"  name="company_profile">{{old('company_profile')}}</textarea>
                                                @if ($errors->has('company_profile'))
                                                    <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $errors->first('company_profile') }}</strong>
                                                 </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">

                                            <div class="form-group">
                                                <label>Industry type<span class="required">*</span></label>
                                                <input class="form-control{{ $errors->has('industry_type') ? ' is-invalid' : '' }}" placeholder="industry type"  id="industry_type" name="industry_type" {{old('industry_type')}}>
                                                @if ($errors->has('industry_type'))
                                                    <span class="invalid-feedback" role="alert">
                                                       <strong>{{ $errors->first('industry_type') }}</strong>
                                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Media house<span class="required">*</span></label>
                                                <input type="text" class="form-control{{ $errors->has('media_house') ? ' is-invalid' : '' }}" placeholder="-GTV-"  id="media_house" name="media_house" value="{{old('media_house')}}">
                                                @if ($errors->has('media_house'))
                                                    <span class="invalid-feedback" role="alert">
                                                       <strong>{{ $errors->first('media_house') }}</strong>
                                                        </span>
                                                @endif
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Policy<span class="required">*</span></label>
                                                <textarea class="form-control{{ $errors->has('policies') ? ' is-invalid' : '' }}" placeholder="Share your policies"  id="policies" name="policies">{{old('policies')}}</textarea>
                                                @if ($errors->has('policies'))
                                                    <span class="invalid-feedback" role="alert">
                                                       <strong>{{ $errors->first('policies') }}</strong>
                                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="logo">Upload logo(Required, only .jpg,.jpeg,.png files:)<span class="required">*</span></label>
                                                <input type="file"  required  class="{{ $errors->has('file') ? ' is-invalid' : '' }}"  id="logo" name="file" value="{{old('file')}}">
                                                @if ($errors->has('file'))
                                                    <span class="invalid-feedback">
                                                          <strong>{{ $errors->first('file') }}</strong>
                                                        </span>
                                                @endif
                                            </div>
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
                                                <input type="text" class="form-control" placeholder="Your Name"  name="name" value="{{old('name')}}">
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
                                                <input type="email" class="form-control" placeholder="Email Address"  name="email" value="{{old('email')}}">
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
                                                <input type="text" class="form-control" placeholder="Phone No.1"   name="phone1" value="{{old('phone1')}}">
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
                                                <input type="text" class="form-control" placeholder="Phone No. 2"   name="phone2" value="{{old('phone2')}}">
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
                                                <label>Password<span class="required">*</span></label>
                                                <input type="password" class="form-control{{$errors->has('password') ? 'is-valid' :''}}" placeholder="Enter password"   name="password">
                                                <span class="agileits_grid">
                                                    @if ($errors->has('password'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('password') }}</strong></span>
                                                    @endif
							                       </span>
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Re-type Password<span class="required">*</span></label>
                                                <input type="password" class="form-control" placeholder="Re-type password"  name="password_confirmation">
                                            </div>
                                        </div>

                                    </div>
                                    <button type="submit" class="btn button" id="submit_btn">Submit</button>
                                <span style="color:#E6AA00 ">Already  registered?
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
