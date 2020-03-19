@component('mail::message')
  <h2>Hello {{$user->name}},</h2>

  <section>
    <article>
      <p>
        Congratulations and welcome to Kokrokoo!
      </p>
    </article>
    <article>
      <p>
        Your subscription with id  <strong style="font-weight:800">{{$sub_id}}</strong> has been approved.You will be notified when subscription is going live.
      </p>
    </article>
   
        <p>
          We are glad you registered with us and we look forward to bringing you more services in the future.
        </p>
      </article>
    </article>
  </section>

{{--@component('mail::button', ['url' => ''])--}}
{{--Button Text--}}
{{--@endcomponent--}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
