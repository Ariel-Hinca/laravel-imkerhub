<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id')->get();
        return view('admin.users.index', compact('users'));
    }

    // Nieuwe user aanmaken (view tonen)
    public function create()
    {
        return view('admin.users.create');
    }

    // Nieuwe user opslaan
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role'     => 'required|in:user,seller,admin',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => $request->role,
        ]);

        return redirect()->route('admin.users.index')->with('success', 'Gebruiker succesvol aangemaakt.');
    }

    public function destroy(User $user)
    {
        // Om te vermijden dat de admin per ongeluk verwijderd zou willen worden
        if ($user->email === 'admin@ehb.be') {
            return redirect()->route('admin.users.index');
        }

        $user->delete(); // cascade verwijdert ook products
        return redirect()->route('admin.users.index');
    }

    // User role wijzigen
    public function updateRole(Request $request, User $user)
    {
        $request->validate([
            'role' => 'required|in:user,seller,admin',
        ]);

        $user->role = $request->role;
        $user->save();

        return redirect()->back()->with('success', 'Rol succesvol aangepast.');
    }
}
