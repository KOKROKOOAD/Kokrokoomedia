@extends('layouts.staffDashboard')

@section('dashboard')

{{--    <create-admins></create-admins>--}}
<div class="page-wrapper">
    <!-- Page-header start -->
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <div class="d-inline">
                        <h4>Create an Admin</h4>
                        <!--                            <span>Lorem ipsum dolor sit <code>amet</code>, consectetur adipisicing elit</span>-->
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                   
                </div>
            </div>
        </div>
    </div>
    <!-- Page-header end -->

    <!-- Page body start -->
    <div class="page-body">
        <div class="row">
            <div class="col-sm-12">
                <!-- Basic Form Inputs card start -->
                <div class="card">
                    <div class="card-header">


                    </div>
                    <div class="card-block">
                        <!--                            <h4 class="sub-title">Basic Inputs</h4>-->
                        <form  method="post" action="{{route('staff.admin.store')}}">
                            @csrf

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Full name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control {{ $errors->has('name') ? 'input-errors' : '' }}" id="name" placeholder="Enter fullname" name="name" value="{{old('name')}}">
                                    <span class="messages"></span>
                                @if ($errors->has('name'))
                                        <span class="error" role="alert" style="color: red;font-weight: lighter">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control {{ $errors->has('email') ? 'input-errors' : '' }}" id="email" placeholder="Enter  email" name="email" value="{{old('email')}}">
                                    <span class="messages"></span>
                                @if ($errors->has('email'))
                                        <span class="error" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Phone</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control {{ $errors->has('phone') ? 'input-errors' : '' }}" id="phone" placeholder="Enter phone number" name="phone" value="{{old('phone')}}">
                                    @if ($errors->has('phone'))
                                        <span class="error" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control {{ $errors->has('title') ? 'input-errors' : '' }}" id="title" PLACEHOLDER="Enter  admin title" name="title" value="{{old('title')}}">
                                    <span class="messages"></span>
                                @if ($errors->has('title'))
                                        <span class="error" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Select Role</label>
                                <div class="col-sm-10">
                                    <select  class="form-control {{ $errors->has('role') ? 'input-errors' : '' }}" name="role" id="role">
                                        <option value="">Select a role</option>
                                        <option value="super_admin">super_admin</option>
                                        <option value="marketers">marketers</option>
                                        <option value="finance">finance</option>
                                        <option value="broadcaster">broadcaster</option>
                                    </select>
                                    @if ($errors->has('role'))
                                        <span class="error" role="alert">
                                        <strong>{{ $errors->first('role') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <input class="btn btn-primary" value="Submit" type="submit">

                                </div>
                            </div>
                        </form>


                    </div>
                </div>
                <!-- Basic Form Inputs card end -->


                <!-- Input Alignment card end -->
            </div>
            <form-validation-message :message="'{!! \Illuminate\Support\Facades\Session::get('admin-created') !!}'"></form-validation-message>
        </div>
    </div>
    <!-- Page body end -->
</div>

@endsection
