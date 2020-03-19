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
        <div class="row">
            <div class="col-sm-12">
        <div class="card">
{{--            <search></search>--}}
            <div class="card-block">

            <div  class="dt-responsive table-responsive">
                    <table id="laravel_datatable" class="table table-striped table-bordered nowrap">
                        <thead>
                        <tr class="table-primary">
                            <th>#</th>
                            <th>ID</th>
                            <th>Transaction ID</th>
                            <th>Invoice number</th>
                            <th>Service</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Channel</th>
                            <th>Transaction date</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <trans-subs></trans-subs>
        </div>
        </div>
    </div>
    </div>
</div>

@endsection
@section('datatable-scripts')
    <script src="{{ asset('js/datatable-files/transactions.js') }}"></script>
@stop
