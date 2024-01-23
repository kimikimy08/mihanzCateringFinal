<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSelectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $serviceSelection = [
            [
                'services_category' => 'Birthday',
                'services_image' => 'filbd.jpg',
            ],
            [
                'services_category' => 'Baptismal',
                'services_image' => 'filb.jpg', 
            ],
            
        ];

        foreach ($serviceSelection as $item) {
            DB::table('service_selections')->insert($item);
        }
    }
}
