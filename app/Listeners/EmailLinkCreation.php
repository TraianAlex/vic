<?php

namespace App\Listeners;

use App\Mail\LinkCreated;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\LinkCreated as LnkCreated;
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
    public function newLink(LnkCreated $event)
    {
        //var_dump('Notify '. $event->admin->name . ' created a new link on the site.');
        //var_dump('Notify '. $event->admin . ' created a new link on the site.');
        Mail::to('victor_traian@yahoo.com')->send(new LinkCreated($event->admin));//App\Mail\AdminLoggedin as Adm;
    }
}
