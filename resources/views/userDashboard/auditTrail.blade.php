@extends('layouts.dashboard')

@section('dashboard')

{{--    <create-admins></create-admins>--}}
<div class="page-wrapper">
    <!-- Page-header start -->
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <div class="d-inline">
                        <h4>Admin activities</h4>
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
                       <div class="table-responsive">
                                <table  class="table  table-striped table-bordered nowrap">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Date</th>
                                        <th>Username</th>
                                        <th>Activities</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($auditTrail as $key=>$audit)
                                        <tr>
                                            <td>
                                                {{$key + 1}}
                                            </td>

                                            <td>{{$audit->created_at}}</td>
                                            <td>{{$audit->action_by}}</td>
                                            <td>{{$audit->activities}}</td>


                                        </tr>
                                         @endforeach
                                    </tbody>
                                </table>

                            </div>
                    </div>
                </div>
              
            </div>
            <form-validation-message :message="'{!! \Illuminate\Support\Facades\Session::get('admin-created') !!}'"></form-validation-message>
        </div>
    </div>
    <!-- Page body end -->
</div>

@endsection




















