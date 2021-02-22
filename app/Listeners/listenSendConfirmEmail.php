<?php

namespace App\Listeners;

use App\Events\sendConfirmEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;

class listenSendConfirmEmail
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
     * @param  sendConfirmEmail  $event
     * @return void
     */
    public function handle(sendConfirmEmail $event) {

        $user        = new \stdClass();
        $user->email = $event->email;
        $user->name  = $event->email;
        Cache::forget('codeDisableUser');
        $codeDisableUser = Cache::remember('codeDisableUser', 1000, function () {
            return rand(1000, 9999);
        });
        Mail::send('emails.reminder', ['user' => $codeDisableUser], function ($m) use ($user) {
            $m->from('hello@app.com', 'Your Application');
            $m->to($user->email, $user->name)
              ->subject('Verify to disable user!');
        });
    }
}
