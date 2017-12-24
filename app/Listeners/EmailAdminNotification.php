<?php

namespace App\Listeners;

use App\Mail\AdminLoggedin as Adm;
use App\Events\AdminLoggedin;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailAdminNotification implements ShouldQueue
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
     * @param  AdminLoggedin  $event
     * @return void
     */
    public function handle(AdminLoggedin $event)
    {
        Mail::to($event->admin->email)->send(new Adm($event->admin));
    }
}
