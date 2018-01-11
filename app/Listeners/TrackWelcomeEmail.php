<?php

namespace App\Listeners;

use App\Events\UserHasRegistered;
use App\Mail\TrackUserRegistered;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class TrackWelcomeEmail implements ShouldQueue
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
     * @param  object  $event
     * @return void
     */
    public function handle(UserHasRegistered $event)
    {
        Mail::to('victor_traian@yahoo.com')->send(new TrackUserRegistered($event));
    }
}
