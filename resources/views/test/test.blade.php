{{--<!DOCTYPE html>--}}
{{--<html>--}}
{{--<head>--}}
{{--    <title>Laravel 5.8 Datatables Tutorial - ItSolutionStuff.com</title>--}}
{{--    <meta name="csrf-token" content="{{ csrf_token() }}">--}}
{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />--}}
{{--    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">--}}
{{--    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">--}}
{{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>--}}
{{--    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>--}}
{{--    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>--}}
{{--    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>--}}
{{--</head>--}}
{{--<body>--}}

{{--<div class="container">--}}
{{--    <h1>Laravel 5.8 Datatables Tutorial <br/> HDTuto.com</h1>--}}
{{--    <table class="table table-bordered data-table">--}}
{{--        <thead>--}}
{{--        <tr>--}}
{{--            <th>No</th>--}}
{{--            <th>Subscription ID</th>--}}
{{--            <th>Start Date</th>--}}
{{--            <th>End Date</th>--}}
{{--            <th>Spot</th>--}}
{{--            <th>Subscription title</th>--}}
{{--            <th>Segments</th>--}}
{{--            <th>Duration</th>--}}
{{--            <th>Rate card</th>--}}
{{--            <th>Status</th>--}}
{{--            <th>Date created</th>--}}
{{--            <th width="100px">Action</th>--}}
{{--        </tr>--}}
{{--        </thead>--}}
{{--        <tbody>--}}
{{--        </tbody>--}}
{{--    </table>--}}
{{--</div>--}}

{{--</body>--}}

{{--<script type="text/javascript">--}}
{{--    $(function () {--}}

{{--        var table = $('.data-table').DataTable({--}}
{{--            processing: true,--}}
{{--            serverSide: true,--}}
{{--            ajax: "{{ route('datatables') }}",--}}
{{--            columns: [--}}
{{--                {data: 'DT_RowIndex', name: 'DT_RowIndex'},--}}
{{--                {data: 'subscription_id', name: 'subscription_id'},--}}
{{--                {data: 'created_ad_data[0].startDate', name:'created_ad_data[0].startDate'},--}}
{{--                {data: 'created_ad_data[0].endDate', name:'created_ad_data[0].endDate'},--}}
{{--                {data: 'created_ad_data[0].spot', name:'created_ad_data[0].spot'},--}}
{{--                {data: 'title', name:'title'},--}}
{{--                {data: 'created_ad_data[0].startTime', name:'created_ad_data[0].startTime'},--}}
{{--                {data: 'created_ad_data[0].durations', name:'created_ad_data[0].durations'},--}}
{{--                {data: 'created_ad_data[0].rate_card', name:'created_ad_data[0].rate_card'},--}}
{{--                {data: 'status', name:'status'},--}}
{{--                {data: 'created_at', name:'created_at'},--}}

{{--                {data: 'action', name: 'action', orderable: false, searchable: false},--}}
{{--            ]--}}
{{--        });--}}

{{--    });--}}
{{--</script>--}}
{{--</html>--}}



@extends('layouts.dashboard')

@section('dashboard')

{{--                <div class="page-wrapper">--}}
{{--                    <!-- Page-header start -->--}}
{{--                    <div class="page-header">--}}
{{--                        <div class="row align-items-end">--}}
{{--                            <div class="col-lg-8">--}}
{{--                                <div class="page-header-title">--}}
{{--                                    <div class="d-inline">--}}
{{--                                        <h4>Sources Datatable</h4>--}}
{{--                                        <span>Printable version of the DataTable</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-lg-4">--}}
{{--                                <div class="page-header-breadcrumb">--}}
{{--                                    <ul class="breadcrumb-title">--}}
{{--                                        <li class="breadcrumb-item">--}}
{{--                                            <a href="index.html"> <i class="feather icon-home"></i> </a>--}}
{{--                                        </li>--}}
{{--                                        <li class="breadcrumb-item"><a href="#!">Data Table</a>--}}
{{--                                        </li>--}}
{{--                                        <li class="breadcrumb-item"><a href="#!">Data Sources</a>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!-- Page-header end -->--}}

{{--                    <!-- Page-body start -->--}}
{{--                    <div class="page-body">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-sm-12">--}}
{{--                                <div class="card">--}}
{{--                                    <div class="card-header">--}}

{{--                                    </div>--}}
{{--                                    <div class="card-block">--}}
{{--                                        <div class="dt-responsive table-responsive">--}}
{{--                                            <table id="jsource-table" class="table table-striped table-bordered nowrap">--}}
{{--                                                        <thead>--}}
{{--                                                        <tr>--}}
{{--                                                            <th>No</th>--}}
{{--                                                            <th>Subscription ID</th>--}}
{{--                                                            <th>Start Date</th>--}}
{{--                                                            <th>End Date</th>--}}
{{--                                                            <th>Spot</th>--}}
{{--                                                            <th>Subscription title</th>--}}
{{--                                                            <th>Segments</th>--}}
{{--                                                            <th>Duration</th>--}}
{{--                                                            <th>Rate card</th>--}}
{{--                                                            <th>Status</th>--}}
{{--                                                            <th>Date created</th>--}}
{{--                                                            <th width="100px">Action</th>--}}
{{--                                                        </tr>--}}
{{--                                                        </thead>--}}
{{--                                            </table>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

<data-tables></data-tables>

                    <!-- Page-body end -->
@endsection

