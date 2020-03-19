@extends('layouts.dashboard')

@section('dashboard')

{{-- <create-admins></create-admins>--}}
<div class="page-wrapper">
    <!-- Page-header start -->
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <div class="d-inline">
                        <h4>Change Password</h4>
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
                    {{-- <div class="card-block"> --}}
                        <form class="md-float-material form-material" method="post" action="{{route('change.password')}}">
                            @csrf
                            <input type="hidden" name="admin-type" value="">
                            <div class="auth-box card">
                                <div class="card-block">
                                    {{-- <div class="row m-b-20">
                                        <div class="col-md-12">
                                            <h4 class="text-left">Recover your password</h4>
                                        </div>
                                    </div> --}}

                                    <div class="form-group form-primary">
                                        <input type="password" name="old_pass" class="form-control {{ $errors->has('old_pass') ? 'input-errors' : '' }}"  required="" placeholder="Old password" value="{{old('old_pass')}}">
                                          @if ($errors->has('old_pass'))
                                        <span class="error" role="alert" style="color: red;font-weight: lighter">
                                        <strong>{{ $errors->first('old_pass') }}</strong>
                                    </span>
                                    @endif
                                        {{-- <span class="form-bar"></span> --}}
                                    </div>
                                    <div class="form-group form-primary">
                                        <input type="password" name="new_pass" class="form-control {{ $errors->has('new_pass') ? 'input-errors' : '' }}" required="" placeholder="New password" value="{{old('new_pass')}}">
                                          @if ($errors->has('new_pass'))
                                        <span class="error" role="alert" style="color: red;font-weight: lighter">
                                        <strong>{{ $errors->first('new_pass') }}</strong>
                                    </span>
                                    @endif
                                        <span class="form-bar"></span>

                                    </div>
                                    <div class="form-group form-primary">
                                        <input type="password" name="confirm_new_pass" class="form-control {{ $errors->has('confirm_new_pass') ? 'input-errors' : '' }}" required="" placeholder="Confirm password" value="{{old('confirm_new_pass')}}">
                                          @if ($errors->has('confirm_new_pass'))
                                        <span class="error" role="alert" style="color: red;font-weight: lighter">
                                        <strong>{{ $errors->first('confirm_new_pass') }}</strong>
                                    </span>
                                    @endif
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


                    {{-- </div> --}}
                </div>
            </div>
            <form-validation-message :message="'{!! \Illuminate\Support\Facades\Session::get('admin-created') !!}'"></form-validation-message>
        </div>
    </div>
    <!-- Page body end -->
</div>

@endsection