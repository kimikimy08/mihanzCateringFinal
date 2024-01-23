<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Reservation;

class ReservationFactory extends Factory
{
    protected $model = Reservation::class;
    public function definition()
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'celebrant_name' => $this->faker->name,
            'celebrant_age' => $this->faker->numberBetween(1, 100),
            'event_theme' => $this->faker->word,
            'celebrant_gender' => $this->faker->randomElement(['male', 'female']),
            'event_date' => $this->faker->date,
            'event_time' => $this->faker->time,
            'venue_address' => $this->faker->name,
            'agree_terms' => $this->faker->boolean,
            'pork_menu_id' => \App\Models\Menu::factory(),
            'beef_menu_id' => \App\Models\Menu::factory(),
            'pasta_menu_id' => \App\Models\Menu::factory(),
            'chicken_menu_id' => \App\Models\Menu::factory(),
            'veggies_menu_id' => \App\Models\Menu::factory(),
            'fish_menu_id' => \App\Models\Menu::factory(),
            'seafood_menu_id' => \App\Models\Menu::factory(),
            'dessert_menu_id' => \App\Models\Menu::factory(),
            'drink_menu_id' => \App\Models\Menu::factory(),
        ];
    }
}
