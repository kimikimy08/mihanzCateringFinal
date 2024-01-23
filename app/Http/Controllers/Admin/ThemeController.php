<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ThemeSelection;
use App\Models\MenuSelection;
use App\Models\ServiceSelection;


class ThemeController extends Controller
{
    public function index()
    {
        $themes = ThemeSelection::all();
        $categories = MenuSelection::all();
        $services = ServiceSelection::all(); 

        return view('admin.theme.index', ['themes' => $themes, 'categories' => $categories, 'services' => $services]);
    }

    public function create()
    {
        $services = ServiceSelection::all();
        return view('admin.theme.create', compact('services'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'theme_name' => 'required|string|unique:theme_selections',
            'themes_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'service_selection_id' => 'required|exists:service_selections,id',
        ]);

        $newMenu = new ThemeSelection;
        $newMenu->theme_name = $request->input('theme_name');
        $newMenu->service_selection_id = $request->input('service_selection_id');

        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images/themes'), $imagePath);
            $newMenu->theme_image = $imagePath;
        }

        $newMenu->save();

        return redirect()->route('admin.theme.index')->with('success', 'Theme added successfully.');
    }

    public function edit($id)
    {
        $themes = ThemeSelection::with('serviceSelection')->findOrFail($id);
        $categories = MenuSelection::all();
        $services = ServiceSelection::all();

        return view('admin.menu.editmenu', ['themes' => $themes, 'categories' => $categories, 'services' => $services]);
    }

        public function update(Request $request, $id)
    {
        $themes = ThemeSelection::findOrFail($id);

        $request->validate([
            'theme_name' => 'required|string|unique:theme_selections',
            'service_selection_id' => 'required|exists:service_selections,id',
            'themes_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            // Update other fields
            $themes->theme_name = $request->input('theme_name');
            $themes->service_selection_id = $request->input('service_selection_id');

            // Handle image upload
            if ($request->hasFile('image')) {
                // Delete the old image if it exists
                if ($themes->theme_image) {
                    $oldImagePath = public_path('images/themes/') . $themes->theme_image;
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }

                // Move the new image to the desired directory
                $newImage = $request->file('image');
                $imageName = time() . '_' . $newImage->getClientOriginalName();
                $newImage->move(public_path('images/themes/'), $imageName);

                // Update the menu with the new image name
                $themes->theme_image = $imageName;
            }

            $themes->save();

            return redirect()->back()->with('success', 'Themes updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error updating theme item: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        $themes = ThemeSelection::findOrFail($id);
        return view('admin.theme.viewtheme', compact('themes'));
    }

    public function destroy($id)
    {
        $themes = ThemeSelection::findOrFail($id);

        // Delete the associated image if it exists
        if ($themes->theme_image) {
            $imagePath = public_path('images/themes/') . $themes->theme_image;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        // Delete the menu item
        $themes->delete();

        return redirect()->back()->with('success', 'Theme deleted successfully!');
    }
}
