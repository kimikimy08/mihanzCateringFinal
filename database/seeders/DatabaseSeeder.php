<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
use App\Models\MenuSelection;
use App\Models\ServiceSelection;
use App\Models\ThemeSelection;
use App\Models\Menu;
use App\Models\ServicePackage;
use App\Models\Reservation;  // Added the Reservation model
use App\Models\ReservationCustomize;  // Added the ReservationCustomize model
use App\Models\ReservationPremade;  // Added the ReservationPremade model
use App\Models\ReservationSelection;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            MenuSelectionSeeder::class,
            ServiceSelectionSeeder::class,
            ThemeSelectionSeeder::class,
            MenuSeeder::class,
            ServicePackageSeeder::class,
    	]);
    }
}
