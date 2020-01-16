@extends('layouts.staffDashboard')

@section('dashboard')
    <div class="page-wrapper">
        <!-- Page-header start -->
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <div class="d-inline">

                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="page-header-breadcrumb">
                        <ul class="breadcrumb-title">

                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page-header end -->

        <!-- Page body start -->
        <div class="page-body">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Default select start -->
                    <div class="card">
                        <div class="card-header">

                        </div>
                        <div class="card-block">
                            <form  method="post" action="{{route('store.rate.card.title')}}">
                                {{ csrf_field() }}
                                <div class="row">
                                <div class="col-md-12 col-sm-12 col-xl-12 m-b-30">
                                    <h4 class="sub-title">Provide rate card title</h4>
                                    <input name="rateCardTitle" class="form-control form-control-primary">
                                </div>
                                <div class="animated fadeIn" style="padding-left: 16px;">
                                    <button   role="button" type="submit" class="btn btn-primary">Submit
{{--                                        <img v-show="disabled"  src="/images/loading.gif" width="20" height="20">--}}

                                    </button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

{{--    <rate-card-title></rate-card-title>--}}
@endsection


