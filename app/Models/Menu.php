<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'status',
        'menu_selection_id'
    ];

    public function menuSelection()
    {
        return $this->belongsTo(MenuSelection::class);
    }

    public function reservation()
    {
        return $this->hasMany(Reservation::class);
    }

    public function getCategoryNameAttribute()
    {
        return $this->menuSelection->menu_category;
    }

    public function typeOfDish()
    {
        return $this->belongsTo(MenuSelection::class, 'menu_selection_id');
    }

}
