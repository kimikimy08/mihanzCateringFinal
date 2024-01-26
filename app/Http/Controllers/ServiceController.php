<?php

namespace App\Http\Controllers;

use App\Models\ServicePackage;
use App\Models\ServiceSelection;

class ServiceController extends Controller
{
    public function index()
    {
        $status = 'all';
        $servicesItems = ServiceSelection::all();
        foreach ($servicesItems as $servicesItem) {
            $servicesItem->services_image = asset("images/services/service_selection/" . rawurlencode($servicesItem->services_image));
        }
        return view('user.services', compact('servicesItems', 'status'));
    }

    public function servicePromoIndex($serviceCategory)
    {
        // If $serviceCategory is not provided or not found in the database, use the default category
        

        $serviceSelection = $serviceCategory
            ? ServiceSelection::where('services_category', $serviceCategory)->first()
            : ServiceSelection::where('services_category', $this->getDefaultCategory())->first();

            $categoryName = $serviceSelection->services_category;

        if (!$serviceSelection) {
            return redirect()->route('guest.services');
        }

        $categoryName = $serviceSelection->services_category;

        $promos = ServicePackage::whereHas('serviceSelection', function ($query) use ($categoryName) {
            $query->where('services_category', $categoryName);
        })->get();

        session(['categoryName' => $categoryName]);

        return view('user.servicePackages', compact('promos', 'categoryName'));
    }

    protected function getDefaultCategory()
    {
        // You can implement your logic here to determine the default category.
        // For example, you might retrieve it from a database table or use a configuration.
        // For simplicity, I'm returning 'default' as the default category.
        return 'default';
    }
}
