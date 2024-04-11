<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Additional extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'additional_selection_id'
    ];

    public function additionalSelection()
    {
        return $this->belongsTo(AdditionalSelection::class);
    }

    public function reservations()
{
    return $this->hasMany(Reservation::class, 'f_menu_id')
        ->orWhere('pe_menu_id', $this->id)
        ->orWhere('pb_menu_id', $this->id)
        ->orWhere('cf_menu_id', $this->id)
        ->orWhere('fp_menu_id', $this->id)
        ->orWhere('ct_menu_id', $this->id)
        ->orWhere('f_menu_id', $this->id);
       
        
}
    

    public function getCategoryNameAttribute()
    {
        return $this->additionalSelection->additional_category;
    }

    public function typeOfAdditional()
    {
        return $this->belongsTo(AdditionalSelection::class, 'additional_selection_id');
    }

    public function getMenuNameAttribute()
    {
        return $this->name;
    }
}
