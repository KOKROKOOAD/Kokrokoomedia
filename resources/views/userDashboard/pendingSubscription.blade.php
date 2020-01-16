@extends('layouts.dashboard')

@section('dashboard')
   <pending-sub></pending-sub>

   <form-validation-message :message="'{!! \Illuminate\Support\Facades\Session::get('sub-reviewed') !!}'"></form-validation-message>
   <form-validation-message :message="'{!! \Illuminate\Support\Facades\Session::get('sub-rejected') !!}'"></form-validation-message>



@endsection