<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThemeSelection extends Model
{
    use HasFactory;

    protected $fillable = [
        'theme_name'
    ];

    public function serviceSelection()
{
    return $this->belongsTo(ServiceSelection::class, 'service_selection_id', 'id');
}
}
