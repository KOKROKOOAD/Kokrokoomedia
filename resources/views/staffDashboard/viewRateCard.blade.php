@extends('layouts.staffDashboard')

@section('dashboard')

    <view-rate-cards :message="'{!! \Illuminate\Support\Facades\Session::get('delete') !!}'"></view-rate-cards>

    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <h3>Hello world</h3>
            </div>
        </div>
    </div>
@endsection