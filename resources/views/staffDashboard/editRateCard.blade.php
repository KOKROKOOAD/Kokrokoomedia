@extends('layouts.staffDashboard')

@section('dashboard')

    <edit-rate-card :message="'{!! \Illuminate\Support\Facades\Session::get('delete') !!}'"></edit-rate-card>

    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <h3>Hello world</h3>
            </div>
        </div>
    </div>
@endsection