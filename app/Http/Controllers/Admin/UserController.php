<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\MenuSelection;
use Illuminate\Support\Facades\Hash;
use App\Models\Reservation;
use Illuminate\Support\Carbon;

class UserController extends Controller
{
    

    public function index()
    {
        $status = 'all';
        $users = User::all();
        $categories = MenuSelection::all();
        $reservation_categories = Reservation::all();
        $roles = Role::all();
        return view('admin.user.index', compact('users', 'categories', 'roles', 'reservation_categories', 'status'));
    }

    public function show($id)
    {
        $users = User::findOrFail($id);
        return view('user.show', compact('users'));
    }

    public function edit($id)
{
    $user = User::findOrFail($id);
    $roles = Role::all();

    return view('admin.users.edit', compact('user', 'roles'));
}

public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'address' => 'required|string',
            'contact_number' => 'required|string',
            'role_id' => 'required|exists:roles,id',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'contact_number' => $request->input('contact_number'),
            'role_id' => $request->input('role_id'),
            'password' => $request->filled('password') ? Hash::make($request->input('password')) : $user->password,
        ]);

        return redirect()->back()->with('success', 'User details updated successfully!');
    }

}
