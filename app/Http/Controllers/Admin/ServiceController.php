<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServiceSelection;
use App\Models\ServicePackage;
use App\Models\MenuSelection;

class ServiceController extends Controller
{
    public function index()
    {
        $services = ServiceSelection::all();
        $categories = MenuSelection::all();
        return view('admin.service.index', compact('services', 'categories'));
    }

    public function show($id)
    {

        $services = ServiceSelection::findOrFail($id);
        $categories = MenuSelection::all();
        $packages = ServicePackage::where('service_selection_id', $services->id)->get();

        foreach ($packages as $package) {
            $package->service_promo_image = asset("images/services/packages/".rawurlencode($package->service_promo_image));
        }
    
        return view('admin.service.viewservice', compact('services', 'packages', 'categories'));
    }

    public function create()
    {
        return view('admin.service.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'services_category' => 'required|string|unique:service_selections',
            'services_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images/services/service_selection'), $imagePath);
        }

        ServiceSelection::create([
            'services_category' => $request->input('services_category'),
            'services_image' => $imagePath,
        ]);

        return redirect()->route('admin.service.index')->with('success', 'Service added successfully.');
    }

    public function edit($id)
    {
        $services = ServiceSelection::findOrFail($id);
        $categories = MenuSelection::all();
        $services = ServiceSelection::all();

        return view('admin.services.editservice', ['services' => $services, 'categories' => $categories, 'services' => $services]);
    }

        public function update(Request $request, $id)
    {
        $services = ServiceSelection::findOrFail($id);

        $request->validate([
            'services_category' => 'required|string|unique:service_selections',
            'services_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            // Update other fields
            $services->services_category = $request->input('services_category');

            // Handle image upload
            if ($request->hasFile('image')) {
                // Delete the old image if it exists
                if ($services->services_image) {
                    $oldImagePath = public_path('images/services/service_selection/') . $services->services_image;
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }

                // Move the new image to the desired directory
                $newImage = $request->file('image');
                $imageName = time() . '_' . $newImage->getClientOriginalName();
                $newImage->move(public_path('images/services/service_selection/'), $imageName);

                // Update the menu with the new image name
                $services->services_image = $imageName;
            }

            $services->save();

            return redirect()->back()->with('success', 'Services updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error updating theme item: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $services = ServiceSelection::findOrFail($id);

        // Delete the associated image if it exists
        if ($services->services_image) {
            $imagePath = public_path('images/services/service_selection/') . $services->services_image;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        // Delete the menu item
        $services->delete();

        return redirect()->back()->with('success', 'Services deleted successfully!');
    }
}
