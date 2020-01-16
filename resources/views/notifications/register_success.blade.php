@extends('layouts.dashboard')
{{--@section('styles')--}}

{{--    @include('includes.links')--}}
{{--@endsection--}}
@section('dashboard')
<section>

    {{--<div class="jumbotron text-xs-center">--}}
        {{--<h1 class="display-3">Thank You!</h1>--}}
        {{--<p class="lead"><strong>Please check your email</strong> for further instructions on how to complete your account setup.</p>--}}
        {{--<hr>--}}
        {{--<p>--}}
            {{--Having trouble? <a href="">Contact us</a>--}}
        {{--</p>--}}
        {{--<p class="lead">--}}
            {{--<a class="btn btn-primary btn-sm" href="https://bootstrapcreative.com/" role="button">Continue to homepage</a>--}}
        {{--</p>--}}
    {{--</div>--}}




    <div class="card text-center">

        <h3 style="margin-top: 120px;font-family: Raleway, sans-serif;font-weight: 800">Rate Card  successfully created</h3><br>
{{--                    <p><strong class="text-muted">Your registration was successful</strong>.We will send you an email to activate your account within 24hrs.</p><hr>--}}
                    <p class="lead">
                     <a class="btn btn-primary btn-lg" href="{{route('create.ratecard')}}" role="button">Create new </a>
                        <a class="btn btn-secondary btn-lg" href="{{route('view.ratecard')}}" role="button">View rate cards</a>

                    </p>
                </div>




</section>
@endsection

{{--@section('scripts')--}}
{{--    @include('includes.scripts')--}}
{{--@endsection--}}