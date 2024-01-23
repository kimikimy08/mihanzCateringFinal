<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServiceSelection;
use App\Models\ServicePackage;

class PackageController extends Controller
{
    public function create($id)
    {
        $serviceSelection = ServiceSelection::findOrFail($id);

        return view('admin.package.create', ['serviceSelection' => $serviceSelection]);
    }

    public function store(Request $request, $id)
    {
        $service = ServiceSelection::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'pax' => 'required|integer|min:1',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/|min:0',
            'service_pckg_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 

        ]);

        // Create a new service promo
        $servicePackage = new ServicePackage();
        $servicePackage->name = $validatedData['name'];
        $servicePackage->pax = $validatedData['pax'];
        $servicePackage->price = $validatedData['price'];
        $servicePackage->service_selection_id = $id; 

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = 'images/services/packages/';
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path($imagePath), $imageName);

            $servicePackage->service_pckg_image = $imageName;
        }

        $servicePackage->save();

        return redirect()->route('admin.service.viewservice', ['id' => $servicePackage->service_selection_id]);
    }

    public function edit($serviceId, $packageId)
    {
        $servicePackage = ServicePackage::findOrFail($packageId);
        $servicePackage->service_promo_image = asset("images/services/packages/" . rawurlencode($servicePackage->service_promo_image));

        return view('admin.packages.edit', ['servicePackage' => $servicePackage]);
    }

    public function update(Request $request, $serviceId, $packageId)
    {
        $service = ServiceSelection::findOrFail($serviceId);
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'pax' => 'required|integer|min:1',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/|min:0',
            'service_pckg_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Load the service package for updating
        $servicePackage = ServicePackage::findOrFail($packageId);
        $servicePackage->name = $validatedData['name'];
        $servicePackage->pax = $validatedData['pax'];
        $servicePackage->price = $validatedData['price'];

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = 'images/services/packages/';
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path($imagePath), $imageName);

            // Remove the old image if it exists
            if ($servicePackage->service_pckg_image) {
                $oldImagePath = public_path($imagePath . $servicePackage->service_pckg_image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $servicePackage->service_pckg_image = $imageName;
        }

        $servicePackage->save();

        return redirect()->route('admin.service.viewservice', ['id' => $servicePackage->service_selection_id]);
    }

    public function show($serviceId, $packageId)
    {
        $servicePackage = ServicePackage::findOrFail($packageId);
        $servicePackage->service_promo_image = asset("images/services/packages/" . rawurlencode($servicePackage->service_promo_image));

        return view('admin.package.viewpackage', ['servicePackage' => $servicePackage]);
    }

    public function destroy($serviceId, $packageId)
    {
        $servicePackage = ServicePackage::findOrFail($packageId);

        // Delete the associated image if it exists
        if ($servicePackage->service_pckg_image) {
            $imagePath = public_path('images/services/packages/') . $servicePackage->service_pckg_image;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        // Delete the menu item
        $servicePackage->delete();

        return redirect()->back()->with('success', 'Package deleted successfully!');
    }
}
