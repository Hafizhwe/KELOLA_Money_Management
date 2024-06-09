<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    public function index()
    {
        return view('settings');
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'username' => 'required|string|max:255|unique:users,username,'.$user->id,
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        if ($request->password) {
            $request->validate([
                'password_confirmation' => 'required|string|min:8|same:password',
            ]);
        }

        // Update hanya jika ada perubahan
        if ($request->username !== $user->username) {
            $user->username = $request->username;
        }
        
        if ($request->email !== $user->email) {
            $user->email = $request->email;
        }
        
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }
        
        $user->save();

        return redirect()->back()->with('success', 'Account updated successfully.');
    }
}