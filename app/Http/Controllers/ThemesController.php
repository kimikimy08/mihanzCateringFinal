<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ThemeSelection;
use App\Models\ServiceSelection;


class ThemesController extends Controller
{
    public function index()
    {
        $serviceSelections = ServiceSelection::with('themeSelections')->get();
        $status = 'all';
        foreach ($serviceSelections as $serviceSelection) {
            foreach ($serviceSelection->themeSelections as $themeSelection) {
                $themeSelection->theme_image = asset("images/themes/" . rawurlencode($themeSelection->theme_image));
            }
        }

        return view('user.themes', ['serviceSelections' => $serviceSelections, 'status'=>$status]);
    }
}
