<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationCustomize extends Model
{
    use HasFactory;

    protected $fillable = [
        'pax', // Add this line
        'price',
        // other fields...
    ];

    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }
}
