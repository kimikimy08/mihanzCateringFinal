<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\MenuSelection;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    public function showMenuByCategory($category)
    {
        if ($category === 'all') {
            $menus = Menu::all();
        } else {
            $menuSelection = MenuSelection::where('menu_category', $category)->first();
            $menus = $menuSelection ? $menuSelection->menus : [];
        }

        $categories = MenuSelection::all();

        return view('admin.menu.index', [
            'menus' => $menus,
            'category' => $category,
            'categories' => $categories,
        ]);
    }

    public function create()
    {
        $categories = MenuSelection::all();
        $reservation_categories = Reservation::all();

        return view('admin.menu.addmenu', ['categories' => $categories, 'reservation_categories'=>$reservation_categories]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'menu_selection_id' => 'required|exists:menu_selections,id',
            'description' => 'required|string',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/|min:0',
            'serving' => 'required|integer|min:0',
            'status' => 'required|in:active,inactive',
            'menus_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $newMenu = new Menu;
        $newMenu->name = $request->input('name');
        $newMenu->menu_selection_id = $request->input('menu_selection_id');
        $newMenu->description = $request->input('description');
        $newMenu->price = $request->input('price');
        $newMenu->serving = $request->input('serving');
        $newMenu->status = $request->input('status');

        if ($request->hasFile('menus_image')) {
            $image = $request->file('menus_image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images/menu/'), $imageName);
            $newMenu->menus_image = $imageName;
        }

        $newMenu->save();

        return redirect()->route('admin.dashboard')->with('success', 'Menu item added successfully!');
    }

    public function edit($id)
    {
        $menu = Menu::with('menuSelection')->findOrFail($id);
        $categories = MenuSelection::all();

        return view('admin.menu.editmenu', ['menu' => $menu, 'categories' => $categories]);
    }

    public function update(Request $request, $id)
{
    $menu = Menu::findOrFail($id);

    $request->validate([
        'name' => 'required|string|max:255',
        'menu_selection_id' => 'required|exists:menu_selections,id',
        'description' => 'required|string',
        'price' => 'required|regex:/^\d+(\.\d{1,2})?$/|min:0',
        'serving' => 'required|integer|min:0',
        'status' => 'required|in:active,inactive',
        'menus_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    try {
        // Update other fields
        $menu->name = $request->input('name');
        $menu->menu_selection_id = $request->input('menu_selection_id');
        $menu->description = $request->input('description');
        $menu->price = $request->input('price');
        $menu->serving = $request->input('serving');
        $menu->status = $request->input('status');

        // Handle image upload
        if ($request->hasFile('menus_image')) {
            // Delete the old image if it exists
            if ($menu->menus_image) {
                $oldImagePath = public_path('images/menu/') . $menu->menus_image;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            // Move the new image to the desired directory
            $newImage = $request->file('menus_image');
            $imageName = time() . '_' . $newImage->getClientOriginalName();
            $newImage->move(public_path('images/menu/'), $imageName);

            // Update the menu with the new image name
            $menu->menus_image = $imageName;
        }

        $menu->save();

        return redirect()->back()->with('success', 'Menu item updated successfully!');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Error updating menu item: ' . $e->getMessage());
    }
}

public function destroy($id)
{
    $menu = Menu::findOrFail($id);

    // Delete the associated image if it exists
    if ($menu->menus_image) {
        $imagePath = public_path('images/menu/') . $menu->menus_image;
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    }

    // Delete the menu item
    $menu->delete();

    return redirect()->back()->with('success', 'Menu item deleted successfully!');
}


}
