<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ReservationPremade;
use App\Models\ServicePackage;
use Illuminate\Support\Facades\DB;

class ReservationPremadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ReservationPremade::factory(50)->create();
    }
}
