<?php

namespace App\Listeners;

use App\Events\LinkCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailLinkCreation implements ShouldQueue
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
     * @param  LinkCreated  $event
     * @return void
     */
    public function handle(LinkCreated $event)
    {
        var_dump('Notify '. $event->admin->name . ' created a new link on the site.');
    }
}
