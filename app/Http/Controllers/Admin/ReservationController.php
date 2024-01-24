<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\MenuSelection;

class ReservationController extends Controller
{
    public function index()
    {
        $categories = MenuSelection::all();

        return view('admin.reservation.index', ['categories' => $categories]);
    }
}
