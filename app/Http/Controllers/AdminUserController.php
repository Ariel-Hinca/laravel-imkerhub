<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id')->get();
        return view('admin.users.index', compact('users'));
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
