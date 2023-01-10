<?php

namespace App\Listeners;

use App\Services\FCMService;
use App\Events\SendNotification;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendNotificationListener
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
    public function handle(SendNotification $event)
    {
        try {
            Log::channel('sendNotification')->info("date (".date('F j, Y, g:i a').") - user ID (".$event->user->id .") - Title (".$event->notification["title"] .")");
            FCMService::send($event->user->fcm_token,$event->notification); //code...
        } catch (\Throwable $th) {
            Log::channel('sendNotification')->error("user ID (".$event->user->id .") - Title (".$event->notification["title"] .") - Error =>".$th );
        }
        
    }
}
