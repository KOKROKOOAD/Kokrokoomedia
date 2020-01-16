@extends('layouts.staffDashboard')

@section('dashboard')

    <div class="page-wrapper">
        <!-- Page-header start -->
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <div class="d-inline">
                            <h4>Create <strong class="text-danger"> {{\Illuminate\Support\Facades\Session::get('card_title')}} </strong> rate card</h4>
                            <!--<span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>-->
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="page-header-breadcrumb">

                        <ul class="breadcrumb-title">
                            <li class="breadcrumb-item">
{{--                                <a href="index.html"> <i class="feather icon-home"></i> </a>--}}
                            </li>
                            <li class="breadcrumb-item"><i class="feather icon-arrows-drag-vert"></i>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    <create-rate-card :rate_card_title_id="'{!! \Illuminate\Support\Facades\Session::get('rate_card_title_id') !!}'"></create-rate-card>
    </div>

{{--    <router-view></router-view>--}}

@endsection
