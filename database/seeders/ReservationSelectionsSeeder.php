<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ReservationSelection;
use Illuminate\Support\Facades\DB;

class ReservationSelectionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ReservationSelection::factory(50)->create();
    }
}
