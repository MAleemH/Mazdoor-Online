<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Determine the user's role (assuming you have the 'role' field in the users table)
        $userRole = auth()->user()->role;

        // Redirect the user to the appropriate dashboard based on their role
        switch ($userRole) {
            case 'admin':
                return view('home_admin');
                break;
            case 'employer':
                return view('home_employer');
                break;
            case 'labour':
                return view('home_labour');
                break;
            default:
                return view('home_default'); // A default view in case the user's role doesn't match any of the above.
        }
    }
}
