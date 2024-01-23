<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ServicePackage;

class ServicePackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $servicePromoData = [
            ['name' => 'Birthday Promo #1', 'pax' => '50', 'price' => '23000', 'service_pckg_image' => 'birthday package 1.png', 'service_selection_id' => 1],
            ['name' => 'Birthday Promo #2', 'pax' => '100', 'price' => '35000','service_pckg_image' => 'birthday package 2.png', 'service_selection_id' => 1],
            ['name' => 'Birthday Promo #3', 'pax' => '150', 'price' => '70000', 'service_pckg_image' => 'birthday package 3.png', 'service_selection_id' => 1],
            ['name' => 'Baptismal Promo #1', 'pax' => '50', 'price' => '23000', 'service_pckg_image' => 'baptismal package 1.png', 'service_selection_id' => 2],
            ['name' => 'Baptismal Promo #2', 'pax' => '100', 'price' => '35000', 'service_pckg_image' => 'baptismal package 2.png', 'service_selection_id' => 2],
            ['name' => 'Baptismal Promo #3', 'pax' => '150', 'price' => '70000', 'service_pckg_image' => 'baptismal package 3.png', 'service_selection_id' => 2],
        ];

        foreach ($servicePromoData as $servicePromo) {
            ServicePackage::create($servicePromo);
        }
    }
}
