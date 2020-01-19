@extends('layouts.dashboard')

@section('dashboard')
{{-- <create-ad></create-ad>--}}

<div class="page-wrapper">
    <!-- Page-header start -->
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <div class="d-inline">
                        <h4>Subscriptions</h4>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Page-header end -->

    <!-- Page-body start -->
    <div class="page-body">
        <!-- Default Styling table start -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    {{--            <search></search>--}}
                    <div class="card-block">

                        <div  class="dt-responsive table-responsive">
                            <table id="laravel_datatable" class="table table-striped table-bordered nowrap">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Subscription ID</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Spots</th>
                                    <th>Subscription title</th>
{{--                                    <th>Segment</th>--}}
                                    <th>Duration</th>
                                    <th>Rate card</th>
                                    <th>Status</th>
                                    <th>Created date</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection

