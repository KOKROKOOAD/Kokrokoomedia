@extends('layouts.app')

   @include('Registration.home')
   @yield('content')
    @include('Registration.personalAccount')
   {{--@include('Registration.companyAccount')--}}
   {{--@include('Registration.services')--}}

