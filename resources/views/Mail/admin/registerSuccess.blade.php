@component('mail::message')
  {{-- <strong>Account creation</strong> --}}

  <section>
    <article>
      <p>
        Hello  <strong>{{ $user->name }}</strong>
      </p>
    </article>
    <article>
      <p>
        Your account with  media.krokrokoo.com has been created.kindly click on the link below to login.
      </p>
    </article>
    <article>
      <p>
        Email : {{ $user->email }} <br>
        Password : {{ $password }}    
      </p>
      <article>
        <p>
          <a href="http://media.kokrokooad.com">http://media.kokrokooad.com</a>
        </p>
      </article>
    </article>
  </section>



Thanks,<br>
<strong>{{ env('MAIL_FROM_NAME') }}</strong>
@endcomponent
