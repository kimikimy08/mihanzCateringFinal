<?php

namespace App\Listeners;

use App\Events\ReservationApproved;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReservationApprovedMail;

class SendReservationApprovedEmail implements ShouldQueue
{
    use InteractsWithQueue;

    public function handle(ReservationApproved $event)
    {
        Mail::to($event->reservation->user->email)->send(new ReservationApprovedMail($event->reservation));
    }
}
