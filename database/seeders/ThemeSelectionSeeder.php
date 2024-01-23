<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ThemeSelection;

class ThemeSelectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $themesData = [
            ['theme_name' => 'Birthday 1', 'theme_image' => 'birthday1.jpg', 'service_selection_id' => 1],
            ['theme_name' => 'Birthday 2', 'theme_image' => 'birthday2.jpg', 'service_selection_id' => 1],
            ['theme_name' => 'Birthday 3', 'theme_image' => 'birthday3.jpg', 'service_selection_id' => 1],
            ['theme_name' => 'Birthday 4', 'theme_image' => 'birthday4.jpg', 'service_selection_id' => 1],
            ['theme_name' => 'Birthday 5', 'theme_image' => 'birthday5.jpg', 'service_selection_id' => 1],
            ['theme_name' => 'Birthday 6', 'theme_image' => 'birthday6.jpg', 'service_selection_id' => 1],
            ['theme_name' => 'Birthday 7', 'theme_image' => 'birthday7.jpg', 'service_selection_id' => 1],
            ['theme_name' => 'Birthday 8', 'theme_image' => 'birthday8.jpg', 'service_selection_id' => 1],
            ['theme_name' => 'Birthday 9', 'theme_image' => 'birthday9.jpg', 'service_selection_id' => 1],
            ['theme_name' => 'Birthday 10', 'theme_image' => 'birthday10.jpg', 'service_selection_id' => 1],
            ['theme_name' => 'Birthday 11', 'theme_image' => 'birthday11.jpg', 'service_selection_id' => 1],
            ['theme_name' => 'Baptismal 1', 'theme_image' => 'baptismal1.jpg', 'service_selection_id' => 2],
            ['theme_name' => 'Baptismal 2', 'theme_image' => 'baptismal2.jpg', 'service_selection_id' => 2],
            ['theme_name' => 'Baptismal 3', 'theme_image' => 'baptismal3.jpg', 'service_selection_id' => 2],
            ['theme_name' => 'Baptismal 4', 'theme_image' => 'baptismal4.jpg', 'service_selection_id' => 2],
        ];

        foreach ($themesData as $theme) {
            ThemeSelection::create($theme);
        }
    }
}
