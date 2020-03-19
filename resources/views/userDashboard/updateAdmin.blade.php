@extends('layouts.dashboard')

@section('dashboard')

<div class="page-wrapper">
    <!-- Page-header start -->
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <div class="d-inline">
                        <h4>Update Admin</h4>
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
                <div class="card">
                    <div class="card-header">

                    </div>
                    <div class="card-block">
                        @foreach($admin as $user)
                        <form  method="post" action="{{route('update.admin')}}">
                            @csrf
                            <input name="id" value="{{$user->client_id}}" type="hidden">

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Full name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control {{ $errors->has('name') ? 'input-errors' : '' }}" id="name" placeholder="Enter fullname" name="name" value="{{$user->name}}" required>
                                    <input type="hidden" name="id" value="{{$user->client_id}}">

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
                                    <input type="text" class="form-control {{ $errors->has('email') ? 'input-errors' : '' }}" id="email" placeholder="Enter  email" name="email" value="{{$user->email}}" required>
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
                                    <input type="text" class="form-control {{ $errors->has('phone1') ? 'input-errors' : '' }}" id="phone" placeholder="Enter phone number" name="phone1" value="{{$user->phone1}}" required>
                                    @if ($errors->has('phone1'))
                                        <span class="error" role="alert">
                                        <strong>{{ $errors->first('phone1') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control {{ $errors->has('title') ? 'input-errors' : '' }}" id="title" PLACEHOLDER="Enter  admin title" name="title" value="{{$user->title}}" required>
                                    <span class="messages"></span>
                                    @if ($errors->has('title'))
                                        <span class="error" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Current Role</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" disabled  value="{{$user->role}}" required>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Select Role</label>
                                <div class="col-sm-10">
                                    <select  class="form-control {{ $errors->has('role') ? 'input-errors' : '' }}" name="role" id="role">
                                        <option value="">Select a role</option>
                                        <option value="admin">admin</option>
                                        <option value="marketers">marketer</option>
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
                                    <input class="btn btn-primary" value="Update" type="submit">

                                </div>
                            </div>
                        </form>
                        @endforeach


                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Page body end -->
</div>
@endsection