<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\MenuSelection;

class AdminController extends Controller
{
    public function index()
    {
        $userCount = User::count();
        $categories = MenuSelection::all();
        return view('admin.dashboard', compact('categories', 'userCount'));
    }
}
