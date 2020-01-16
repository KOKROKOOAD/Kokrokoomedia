@component('mail::message')
 #{{$greeting}}

  Your subscription is successfully created.Its being reviewed.We will send you a confirmation email once its approved.

{{--@component('mail::button', ['url' => ''])--}}
{{--Button Text--}}
{{--@endcomponent--}}

Thanks,<br>
{{ config('dash') }}
@endcomponent
