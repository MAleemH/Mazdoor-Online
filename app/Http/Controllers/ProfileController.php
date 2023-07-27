<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function index()
    {
        // Get the currently authenticated user
        $user = auth()->user();

        return view('profile.profile', compact('user'));
    }
}
