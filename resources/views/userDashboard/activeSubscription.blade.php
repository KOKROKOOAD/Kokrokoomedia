@extends('layouts.dashboard')

@section('dashboard')

   <active-sub></active-sub>
    @if(session()->has('sub_is_active'))
     <p>{{session()->get('sub_is_active')}}</p>
   @endif
@endsection