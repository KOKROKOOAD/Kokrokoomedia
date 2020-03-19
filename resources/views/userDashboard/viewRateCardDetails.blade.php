@extends('layouts.dashboard')

@section('dashboard')

    {{--    <view-rate-cards :message="'{!! \Illuminate\Support\Facades\Session::get('delete') !!}'"  :media="'{!! auth()->user()->media !!}'"></view-rate-cards>--}}

    {{--    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">--}}
    {{--        <div class="modal-dialog modal-lg">--}}
    {{--            <div class="modal-content">--}}
    {{--                <h3>Hello world</h3>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}

    <div class="page-wrapper">
        <!-- Page-header start -->
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <div class="d-inline">
                            <h4>Rate Cards</h4>
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
                                        <th>Rate card ID</th>
                                        <th>Rate card</th>
                                        <th>Created at</th>
                                        <th>Updated at</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>

                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>



@endsection
{{--@section('datatable-scripts')--}}
{{--    <script src="{{ asset('js/datatable-files/rate_cards.js') }}"></script>--}}
{{--@stop--}}