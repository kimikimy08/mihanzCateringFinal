<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuSelection;
use App\Models\Menu;
use App\Models\Reservation;
use App\Models\ReservationSelection;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;


class MenuController extends Controller
{
    public function index()
    {
        
        $menuItems = MenuSelection::all();
        foreach ($menuItems as $menuItem) {
            $menuItem->menu_image = asset("images/menu/menu_selection/".rawurlencode($menuItem->menu_image));
        }
        return view('user.menus', compact('menuItems'));
    }

    public function specificmenuindex($category = null)
    {
        $categoryName = MenuSelection::where('menu_category', $category)->firstOrFail()->menu_category;
        $menus = Menu::whereHas('menuSelection', function ($query) use ($category) {
            $query->where('menu_category', $category);
        })->get();

        return view('user.menuContainer', compact('menus', 'categoryName'));
    }



    public function mostOrderedMenuPerCategory()
    {
    // List of menu categories
    $menuCategories = [
        'pork_menu_id',
        'beef_menu_id',
        'pasta_menu_id',
        'chicken_menu_id',
        'veggies_menu_id',
        'fish_menu_id',
        'seafood_menu_id',
        'dessert_menu_id',
        'drink_menu_id',
    ];

    $result = [];

    foreach ($menuCategories as $menuCategory) {
        $mostOrderedMenus = Reservation::groupBy($menuCategory)
            ->select($menuCategory, DB::raw('count(*) as count'))
            ->orderByDesc('count')
            ->get();

        $maxCount = $mostOrderedMenus->max('count');

        $menus = $mostOrderedMenus->filter(function ($menu) use ($maxCount) {
            return $menu->count == $maxCount;
        });

        foreach ($menus as $mostOrderedMenu) {
            $menuId = $mostOrderedMenu->{$menuCategory};
            $menu = Menu::find($menuId);
            $result[] = [
                'category_name' => ucfirst(str_replace('_menu_id', '', $menuCategory)),
                'menu_id' => $menuId,
                'menu_name' => $menu ? $menu->name : null,
                'price' => $menu ? $menu->price : null,
                    'serving' => $menu ? $menu->serving : null,
                    'description' => $menu ? $menu->description : null,
                    'count' => $mostOrderedMenu->count,
                    'menus_image' =>  $menu ? $menu->menus_image : null,
            ];
        }
    }

    return view('mostOrderedMenu', compact('result'));
    }
    





    private function getMostOrderedMenuId($categoryIds)
    {
        $menuIdCounts = array_count_values(array_filter($categoryIds));

        if (empty($menuIdCounts)) {
            return null;
        }

        arsort($menuIdCounts);

        return key($menuIdCounts);
    }



    


}
