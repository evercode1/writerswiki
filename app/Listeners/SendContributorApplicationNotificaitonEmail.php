<?php

namespace App\Listeners;

use App\Events\UserAppliedForContributorStatus;
use App\Mail\NotificationOfContributorApplication;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use App\User;

class SendContributorApplicationNotificaitonEmail
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
    public function handle(UserAppliedForContributorStatus $event)
    {

        $user = User::where('email', 'ikon321@yahoo.com')->first();

        Mail::to($user)->send(new NotificationOfContributorApplication($event->user));

    }
}
