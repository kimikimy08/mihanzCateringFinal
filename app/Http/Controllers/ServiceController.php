<?php

namespace App\Http\Controllers;

use App\Models\ServicePackage;
use Illuminate\Http\Request;
use App\Models\ServiceSelection;

class ServiceController extends Controller
{
    public function index()
    {
        $servicesItems = ServiceSelection::all();
        foreach ($servicesItems as $servicesItem) {
            $servicesItem->services_image = asset("images/services/service_selection/".rawurlencode($servicesItem->services_image));
        }
        return view('user.services', compact('servicesItems'));
    }

    public function servicePromoIndex($serviceCategory = null)
    {
        $categoryName = ServiceSelection::where('services_category', $serviceCategory)->first()->services_category;
        $promos = ServicePackage::whereHas('serviceSelection', function ($query) use ($serviceCategory) {
            $query->where('services_category', $serviceCategory);
        })->get();

        session(['categoryName' => $categoryName ]);
    
        return view('user.servicePackages', compact('promos', 'categoryName'));
    }
}
