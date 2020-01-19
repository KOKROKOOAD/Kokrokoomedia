@extends('layouts.dashboard')

@section('dashboard')

{{--    <downloadable-subs></downloadable-subs>--}}
<div class="page-wrapper">
    <!-- Page-header start -->
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <div class="d-inline">
                        <h4>Downloadable Subscriptions</h4>
                        <!--<span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>-->
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

    <!-- Page-body start -->
    <div class="page-body">
        <!-- Default Styling table start -->
        <div class="card">
            <div class="card-header">
{{--                <input class="form-control" name="search" placeholder="What are you looking for?">--}}
            </div>

            <!--                <div class="card-header">-->
            <!--                    &lt;!&ndash;<h5>Default Styling</h5>&ndash;&gt;-->
            <!--                    &lt;!&ndash;<span>use class <code>table table-styling</code> inside table element</span>&ndash;&gt;-->

            <!--                </div>-->
            <div class="card-block table-border-style">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr class="table-primary">
                            <th>#</th>
                            <th>Subscription Date</th>
                            <th>Subscription Title</th>
                            <th>Segment</th>
                            <th>File type</th>
                            <th>Action</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($accepted_sub as $key=>$subs)
                        <tr>
                            <th scope="row">{{$key + 1}}</th>
                            <td>{{$subs->created_at}}</td>
                            <td>{{$subs->title}}</td>
                            <td>{{substr($subs->start,10)}} - {{substr($subs->end,10)}}</td>
                            <td>{{$subs->file_type}}</td>

                            <td>
                                    <a href="download-sub/{{$subs->subscription_id}}" role="button" class="btn btn-default btn-sm"><i class="fa fa-download"> </i></a>
                                    <!--                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target=".bd-example-modal-lg" ><i class="fa fa-edit"> </i> </button>-->
                            </td>
                        </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="pull-left">
        <span>Page {{$accepted_sub->currentPage()}}-{{$accepted_sub->total()}} Total:{{$accepted_sub->total()}}</span>
    </div>
    <div class="pull-right">
        {{$accepted_sub->links()}}

    </div>
</div>


@endsection