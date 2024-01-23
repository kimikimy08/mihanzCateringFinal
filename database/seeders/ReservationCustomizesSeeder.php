<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ReservationCustomize;
use Illuminate\Support\Facades\DB;

class ReservationCustomizesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ReservationCustomize::factory(50)->create();
    }
}
