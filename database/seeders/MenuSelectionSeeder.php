<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 

class MenuSelectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $menuSelection = [
            [
                'menu_category' => 'Pork',
                'menu_image' => 'crispy pata (pork menu).jpg',
            ],
            [
                'menu_category' => 'Beef',
                'menu_image' => 'caldereta beef (beef menu).jpg', 
            ],
            [
                'menu_category' => 'Chicken',
                'menu_image' => 'ChickenMenu.jpg', 
            ],
            [
                'menu_category' => 'Fish',
                'menu_image' => 'sweet n sour fish fillet.jpg', 
            ],
            [
                'menu_category' => 'SeaFood',
                'menu_image' => 'seafood.jpg', 
            ],
            [
                'menu_category' => 'Pasta',
                'menu_image' => 'chicken-pancit-sotanghon-guisado-recipe.jpg', 
            ],
            [
                'menu_category' => 'Vegetables',
                'menu_image' => 'vegetable.jpg', 
            ],
            [
                'menu_category' => 'Desserts',
                'menu_image' => 'filipino-fruit-salad-1.jpg', 
            ],
            [
                'menu_category' => 'Drinks',
                'menu_image' => 'Southern-Sweet-Tea-3-of-6-scaled.jpg', 
            ],
        ];

        foreach ($menuSelection as $item) {
            DB::table('menu_selections')->insert($item);
        }
    }
}
