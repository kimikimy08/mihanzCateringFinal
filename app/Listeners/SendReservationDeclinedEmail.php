<?php

namespace App\Listeners;

use App\Events\ReservationApproved;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReservationDeclinedMail;

class SendReservationDeclinedEmail implements ShouldQueue
{
    use InteractsWithQueue;

    public function handle(ReservationDeclined $event)
    {
        Mail::to($event->reservation->user->email)->send(new ReservationDeclinedMail($event->reservation));
    }
}
