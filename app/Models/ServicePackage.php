<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicePackage extends Model
{
    use HasFactory;

    public function premades()
    {
        return $this->hasMany(ReservationPremade::class, 'package_id');
    }

    public function serviceSelection()
    {
        return $this->belongsTo(ServiceSelection::class, 'service_selection_id');
    }
}
