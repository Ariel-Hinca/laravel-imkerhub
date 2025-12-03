<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserProfileController extends Controller
{
    // Publiek profiel tonen, zodat gelogde of niet gelogde users de users kunnen zien
    public function show(User $user)
    {
        return view('profile.show', compact('user'));
    }

    // Extra profielvelden editten
    public function edit(Request $request)
    {
        return view('profile.edit', ['user' => $request->user()]);
    }

    // Extra profielvelden opslaan
    public function update(Request $request)
    {
        $user = $request->user();

        // Simple validation
        $data = $request->validate([
            'username' => 'nullable|string|max:255',
            'birthday' => 'nullable|date',
            'about'    => 'nullable|string',
            'avatar'   => 'nullable|image|max:2048',
        ]);

        // Foto opslaan
        if ($request->hasFile('avatar')) {
            $data['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }

        // Updaten
        $user->update($data);

        return redirect()->route('profile.show', $user->id)
            ->with('status', 'Profiel bijgewerkt!');
    }
}
