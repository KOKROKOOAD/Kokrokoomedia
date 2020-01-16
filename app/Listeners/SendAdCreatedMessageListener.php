<?php

namespace App\Listeners;

use App\Events\SendAdCreatedMessageEvent;
use App\Jobs\SendAdCreatedMessagedJob;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendAdCreatedMessageListener
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
     * @param  SendAdCreatedMessageEvent  $event
     * @return void
     */
    public function handle(SendAdCreatedMessageEvent $event)
    {

        SendAdCreatedMessagedJob::dispatch($event->user)->delay(now()->addSecond(5));
    }
}
