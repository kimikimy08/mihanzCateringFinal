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



    public function showMostOrderedMenu($categoryName)
    {
        $validCategories = ['pork', 'beef', 'fish', 'chicken', 'veggies', 'pasta', 'seafood', 'dessert', 'drink'];

    $mostOrderedMenus = [];

    foreach ($validCategories as $category) {
        $maxCount = ReservationSelection::where('categoryName', $categoryName)
            ->leftJoin('reservations', 'reservation_selections.reservation_id', '=', 'reservations.id')
            ->select(DB::raw("COUNT(*) as count"))
            ->groupBy("reservations.{$category}_menu_id")
            ->orderByDesc('count')
            ->value('count');

        if ($maxCount > 0) {
            $menusWithMaxCount = Menu::leftJoin('reservations', 'menus.id', '=', "reservations.{$category}_menu_id")
                ->leftJoin('reservation_selections', 'reservations.id', '=', 'reservation_selections.reservation_id')
                ->where('reservation_selections.categoryName', $categoryName)
                ->select('menus.id', 'menus.price', 'menus.description', 'menus.serving', 'menus.name', 'menus.menus_image', "reservations.{$category}_menu_id", DB::raw("COUNT(*) as count"))
                ->groupBy('menus.id', 'menus.name', 'menus.price', 'menus.description', 'menus.serving', 'menus.menus_image', "reservations.{$category}_menu_id")
                ->having('count', '=', $maxCount)
                ->get();

            $mostOrderedMenus[$category] = $menusWithMaxCount;
        } else {
            // Handle case where there are no orders for the category
            $mostOrderedMenus[$category] = [];
        }
    }




    return view('mostOrderedMenu', compact('mostOrderedMenus'));

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
