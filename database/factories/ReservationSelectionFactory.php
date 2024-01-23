<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ReservationSelection;

class ReservationSelectionFactory extends Factory
{
    protected $model = ReservationSelection::class;
    public function definition()
    {
        return [
            'categoryName' => $this->faker->word,
            'choice' => $this->faker->randomElement(['customize', 'premade']),
            'reservation_id' => \App\Models\Reservation::factory(),
        ];
    }
}
