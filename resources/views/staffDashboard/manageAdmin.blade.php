@extends('layouts.staffDashboard')

@section('dashboard')

    <div class="page-wrapper">
        <!-- Page-header start -->
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <div class="d-inline">
                            <h4>Manage Admin</h4>
                            <!--<span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>-->
                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="page-header-breadcrumb">
{{--                         <a href="{{route('create.admins')}}" role="button" class="btn btn-primary">New admin</a>
 --}}
                    </div>
                </div>
            </div>
        </div>
        <!-- Page-header end -->

        <!-- Page-body start -->
        <div class="page-body">
            <!-- Default Styling table start -->
            <div class="card">
                <search></search>
                <!--                <div class="card-header">-->
                <!--                    &lt;!&ndash;<h5>Default Styling</h5>&ndash;&gt;-->
                <!--                    &lt;!&ndash;<span>use class <code>table table-styling</code> inside table element</span>&ndash;&gt;-->

                <!--                </div>-->
                <div class="card-block table-border-style">
                    <div class="table-responsive">
                        <table id="simpletable" class="table  table-striped table-bordered nowrap">
                            <thead>
                            <tr class="table-primary">
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Title</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Created at</th>
                                <th>Updated at</th>
                                <th>Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($admins as $key => $admin)
                            <tr>
                                <th>{{$key + 1}}</th>
                                <td>{{$admin->name}}</td>
                                <td>{{$admin->email}}</td>
                                <td>{{$admin->phone}}</td>
                                <td>{{$admin->job_title}}</td>
                                <td>{{$admin->admin_type}}</td>
                                <td>{{$admin->status}}</td>
                                <td>{{$admin->created_at}}</td>
                                <td>{{$admin->updated_at}}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{ \Illuminate\Support\Facades\URL::route('edit.admin') }}?&id={{urlencode($admin->admin_id)}}" type="button" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="feather icon-edit"> </i></a>
                                       <update-admin-controls :id="'{{$admin->admin_id}}'" :status="'{{$admin->status}}'"></update-admin-controls>
                                    </div>
                                </td>
                            </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
                <form-validation-message :message="'{!! \Illuminate\Support\Facades\Session::get('updated-admin') !!}'"></form-validation-message>

            </div>
        </div>
        <div class="pull-right">
            {{$admins->links()}}
        </div>


        <div class="modal fade update-admin" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

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
                                            <form  method="post" action="{{route('admin.store')}}">
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
                                                        <input class="btn btn-primary" value="Save" type="submit">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                                    </div>
                                                </div>
                                            </form>


                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <form-validation-message :message="'{!! \Illuminate\Support\Facades\Session::get('block-admin') !!}'"></form-validation-message>

        </div>

    </div>





{{--    <manage-admins></manage-admins>--}}


@endsection