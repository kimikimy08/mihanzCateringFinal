<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CallStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'reservation_id',
        'call_status_date',
        'call_status_time',
        'call_status',
        'call_remarks',
    ];

    // Define relationship with reservation
    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }
}
