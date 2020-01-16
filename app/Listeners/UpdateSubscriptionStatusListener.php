<?php

namespace App\Listeners;

use App\Events\UpdateSubscriptionStatusEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdateSubscriptionStatusListener
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
     * @param  UpdateSubscriptionStatusEvent  $event
     * @return void
     */
    public function handle(UpdateSubscriptionStatusEvent $event)
    {
        //
    }
}
