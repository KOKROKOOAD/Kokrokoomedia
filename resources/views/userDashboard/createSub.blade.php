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
                                    <th>ID</th>
                                    <th>Client ID</th>
                                    <th>Rate card ID</th>
                                    <th>Subscription ID</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Spots</th>
                                    <th>Subscription title</th>
                                    <th>File extension</th>
                                    <th>Duration</th>
                                    <th>Rate card</th>
                                    <th>Status</th>
                                    <th>Created date</th>
                                    <th>Action</th>

                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="viewFile" tabindex="-1" role="dialog" style="margin-left: 225px;">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
{{--                            <h4 class-modal-title>{{$file_name}}</h4>--}}
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body text-center">
                            <div>
{{--                                @if($ext == 'mp4' || $ext == 'mp3' || $ext == 'mkv' || $ext == 'wav' || $ext == 'wmv')--}}
{{--                                    <video--}}
{{--                                            class="embed-responsive-item"--}}
{{--                                            controls  src="/test_uploads/{{$file_name}}" style="width:80%;min-height:400px;" frameborder="0">--}}

{{--                                    </video>--}}
{{--                                @endif--}}
                            </div>

                            <!--if file type is image-->
{{--                            @if($ext == 'jpeg' || $ext == 'jpg' || $ext == 'png')--}}
{{--                                <img src="/test_uploads/{{$file_name}}" width="320" height="240px" frameborder="0"/>--}}
{{--                            @endif--}}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>



@endsection

@section('datatable-scripts')
    <script src="{{ asset('js/datatable-files/subscriptions.js') }}"></script>
@stop