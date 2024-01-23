<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ReservationCustomize;

class ReservationCustomizeFactory extends Factory
{
    protected $model = ReservationCustomize::class;
    public function definition()
    {
        return [
            'reservation_id' => \App\Models\Reservation::factory(),
            'pax' => $this->faker->numberBetween(1, 100),
            'price' => $this->faker->randomFloat(2, 100, 1000),
        ];
    }
}
