@component('mail::message')
  <h2>Hello {{$user->name}},</h2>

  <section style="font-family:'Market Sans', Helvetica, Arial, sans-serif;font-size:14px;font-weight:600;lint-height:27px;font-color:rgb(17, 24, 32)">
    <article>
      <p>
        Sorry for the inconvinience!
      </p>
    </article>
    <article>
      <p>
        Your subscription has been disapproved.Kindly go through the reasons below and make the neccessary corrections.
      </p>
    </article>
    <article>
      <ol>
      @foreach($messages as $msg)
      <li>
        {{$msg}}
      </li>
            @endforeach

    </ol>
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
