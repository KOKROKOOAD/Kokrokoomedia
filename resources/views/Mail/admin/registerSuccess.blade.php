@component('mail::message')
  <h2>Account creation</h2>

  <section>
    <article>
      <p>
        Hello  <strong>{{ $user->name }}</strong>
      </p>
    </article>
    <article>
      <p>
        Your account with  media.krokrokoo.com has been created.kindly login with the credentials below.
      </p>
    </article>
    <article>
      <p>
        Email : {{ $user->email }} <br>
        Password : {{ $password }}    
      </p>
      <article>
        <p>
        </p>
      </article>
    </article>
  </section>



Thanks,<br>
<strong>{{ env('MAIL_FROM_NAME') }}</strong>
@endcomponent
