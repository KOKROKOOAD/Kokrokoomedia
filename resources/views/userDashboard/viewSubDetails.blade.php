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
                                          <h4>Subscription Details</h4>
                                          @foreach($sub as $subs)
                                          <p class="float-right">{{$subs->file_name}} | {{$subs->file_size .'kb'}}</p>
                                                @endforeach
                                    </div>
                              </div>
                        </div>

                  </div>
            </div>
            <!-- Page-header end -->

            <!-- Page-body start -->
            <div class="page-body">
                  <!-- Default Styling table start -->
                  @foreach($sub as $subs)
                  <div class="row">
                        <div class="col-sm-12">
                              <div class="card text-center">
                                    {{--            <search></search>--}}
                                    <div class="card-block ">


                                          @if($subs->file_type === 'mp3' || $subs->file_type === 'wav')
                                                <audio controls src="{{$subs->file_path.$subs->file_name}}" type="audio/*"></audio>
                                          @endif

                                          @if($subs->file_type === 'jpeg' || $subs->file_type == 'jpg' || $subs->file_type == 'png')
                                          <img src="{{$subs->file_path.$subs->file_name}}"  alt="image">
                                                @endif

                                                @if($subs->file_type === 'mp4' || $subs->file_type === 'avi' || $subs->file_type === 'wma')
                                                      <video src="{{$subs->file_path.$subs->file_name}}"  ></video>
                                                      @endif



                                                @if($subs->file_type == 'csv' || $subs->file_type == 'odt' || $subs->file_type == 'xlsx' || $subs->file_type == 'xls' || $subs->file_type == 'docx' || $subs->file_type == 'doc')
                                                <p>Please download file to view</p>
                                                <a href="download-sub/{{$subs->subscription_id}}" class="btn btn-primary"> Download file <i class="fa fa-download"></i> </a>
                                                @endif
                                    </div>


                              </div>
                        </div>
                        <div class="btn-group  pull-right" style="padding-left: 20px;">
                              <a href="#" class="btn btn-primary">Approve</a>
                              <a href="#" class="btn btn-danger">Reject</a>
                              <a href="{{route('sub.all')}}" class="btn btn-secondary">Back to subscriptions</a>

                        </div>
                  </div>
                        @endforeach
            </div>
      </div>



@endsection
@section('datatable-scripts')
      <script src="{{ asset('js/datatable-files/rate_cards.js') }}"></script>
@stop