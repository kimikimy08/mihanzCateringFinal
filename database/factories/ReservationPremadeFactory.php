<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ReservationPremade;

class ReservationPremadeFactory extends Factory
{
    protected $model = ReservationPremade::class;
    public function definition()
    {
        return [
            'reservation_id' => \App\Models\Reservation::factory(),
            'package_id' => \App\Models\ServicePackage::factory(),
        ];
    }
}
