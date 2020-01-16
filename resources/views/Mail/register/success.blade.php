@component('mail::message')
  <h2>Registration Successful</h2>

  <section>
    <article>
      <p>
        Congratulations and welcome to Kokrokoo!
      </p>
    </article>
    <article>
      <p>
        Your registration details have been received and will be reviewed for  approved!
      </p>
    </article>
    <article>
      <p>
        Find attached to this email is a copy of our Code of Operations and Instruction Manual
        as a company, which we believe will boost our working relations and tell you everything you need to know about us.
      </p>
      <article>
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
