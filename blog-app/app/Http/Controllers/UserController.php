<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function dashboard()
    {
        $user = auth()->user();
        $posts = $user->posts; 

        return view('dashboard', compact('user', 'posts'));
    }
}
