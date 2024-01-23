<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReservationPremade extends Model
{
    protected $fillable = [
        'reservation_id', 'package_id',

    ];

    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }

    public function servicePackage()
    {
        return $this->belongsTo(ServicePackage::class, 'package_id');
    }
}
