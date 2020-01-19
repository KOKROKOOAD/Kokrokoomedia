@extends('layouts.dashboard')

@section('dashboard')
{{--<user-transact></user-transact>--}}

<div class="page-wrapper">
    <!-- Page-header start -->
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <div class="d-inline">
                        <h4>Transactions</h4>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Page-header end -->

    <!-- Page-body start -->
    <div class="page-body">
        <!-- Default Styling table start -->
        <div class="card">
{{--            <search></search>--}}

            <div class="card-block table-border-style">
                <div class="table-responsive">
{{--                    <table   class="table  table-striped table-bordered nowrap">--}}
{{--                        <thead>--}}
{{--                        <tr class="table-primary">--}}
{{--                            <th>#</th>--}}
{{--                            <th>Transaction Date</th>--}}
{{--                            <th>Transaction id</th>--}}
{{--                            <th>Payment source</th>--}}
{{--                            <th>Amount Paid(GHC)</th>--}}
{{--                            <th>Status</th>--}}
{{--                        </tr>--}}
{{--                        </thead>--}}
{{--                        <tbody>--}}
{{--                        <tr v-for="(trans,index) in transactions">--}}
{{--                            <th scope="row">{{index + 1}}.</th>--}}
{{--                            <td>{{trans.created_at}}</td>--}}
{{--                            <td>{{trans.transaction_id}}</td>--}}
{{--                            <td>{{trans.service}}</td>--}}
{{--                            <td>{{trans.payment_source}}</td>--}}
{{--                            <td>{{trans.amount}}</td>--}}
{{--                            <!--                                <td></td>-->--}}

{{--                        </tr>--}}
{{--                        </tbody>--}}
{{--                    </table>--}}
                    <table id="laravel_datatable" class="table table-striped table-bordered table-responsive">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>#</th>
                            <th>Transaction ID</th>
                            <th>Invoice number</th>
                            <th>Service</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Channel</th>
                            <th>Transaction date</th>
{{--                            <th>Updated at</th>--}}
                            <th>Action</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

