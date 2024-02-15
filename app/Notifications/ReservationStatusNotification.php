<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ReservationStatusNotification extends Notification
{
    public $user;
    public $reservation;

    public function __construct($user, $reservation)
    {
        $this->user = $user;
        $this->reservation = $reservation;
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject($this->status == 'Approved' ? 'Reservation Approved' : 'Reservation Declined')
            ->view('emails.reservation-status', [
                'user' => $this->user,
                'reservation' => $this->reservation,
            ]);
    }
}
