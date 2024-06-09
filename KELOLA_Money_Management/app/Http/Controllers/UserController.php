<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUserData()
    {
        $user = auth()->user(); // Mengambil data user yang sedang login
        return response()->json([
            'user' => $user->name,
            'email' => $user->email
        ]);
    }
}
