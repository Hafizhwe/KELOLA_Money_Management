<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function showAccountSettings()
    {
        return view('account-settings');
    }

    public function updateAccount(Request $request)
    {
        $user = Auth::user();

        $user->username = $request->input('username');
        $user->email = $request->input('email');
        
        if ($request->has('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = $avatarPath;
        }

        $user->save();

        return redirect()->back()->with('success', 'Account settings updated successfully!');
    }
}
