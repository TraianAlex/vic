<?php

namespace App\Listeners;

use App\Events\LinkCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailLinkCreation
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
    public function newLink(LinkCreated $event)
    {
        var_dump('Notify '. $event->admin->name . ' created a new link on the site.');
        //var_dump('Notify '. $event->admin . ' created a new link on the site.');
    }
}
