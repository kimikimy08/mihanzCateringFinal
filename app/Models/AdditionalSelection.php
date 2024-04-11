<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdditionalSelection extends Model
{
    use HasFactory;

    protected $fillable = [
        'additional_category'
    ];

    public function additionals()
    {
        return $this->hasMany(Additional::class, 'additional_selection_id');
    }

    public function reservation()
    {
        return $this->hasMany(Reservation::class);
    }
}
