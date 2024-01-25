<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuSelection extends Model
{
    use HasFactory;

    protected $fillable = [
        'menu_category'
    ];

    public function menus()
    {
        return $this->hasMany(Menu::class, 'menu_selection_id');
    }

    public function reservation()
    {
        return $this->hasMany(Reservation::class);
    }
    
    
}
