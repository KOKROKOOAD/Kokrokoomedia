<?php

namespace App\Listeners;

use App\Events\RegistrationSuccessEvent;
use App\Jobs\RegistrationSuccessfullJob;
use Carbon\Carbon;
use Illuminate\Notifications\Notification;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegistrationSuccessListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  RegistrationSuccessEvent  $event
     * @return void
     */
    public function handle(RegistrationSuccessEvent $event)
    {
        RegistrationSuccessfullJob::dispatch($event)->delay(Carbon::now()->addSecond(10));

    }
}
