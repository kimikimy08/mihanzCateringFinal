<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceSelection extends Model
{
    use HasFactory;

    protected $table = 'service_selections'; 
    protected $fillable = [
        'services_category',
        'services_image',
    ];

    public function service_promos()
    {
        return $this->hasMany(ServicePackage::class);
    }

    public function themeSelections()
    {
        return $this->hasMany(ThemeSelection::class);
    }
}
