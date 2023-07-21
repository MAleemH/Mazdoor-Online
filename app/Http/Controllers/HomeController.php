<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

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
         // Check if the user is authenticated and approved
         if (Auth::check() && Auth::user()->status === 'approved') {
            // Determine the user's role (assuming you have the 'role' field in the users table)
            $userRole = Auth::user()->role;

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
        } else {
            // Redirect unapproved users to a page with a message or simply log them out
            Auth::logout();
            return redirect()->route('login')->with('error', 'Your account is not approved yet.');
        }
    }

    public function homeAdmin()
    {
        // Fetch the pending accounts
        $pendingAccounts = User::where('status', 'pending')->get();

        // Initialize as an empty array if null
        $pendingAccounts = $pendingAccounts ?? [];

        return view('pending_accounts', compact('pendingAccounts'));
    }

    public function approveReject(Request $request, $userId, $action)
    {
        $user = User::findOrFail($userId);

        if ($action === 'approve') {
            // Update the status to 'approved'
            $user->status = 'approved';
            $user->save();
        } elseif ($action === 'reject') {
            // Update the status to 'rejected'
            $user->status = 'rejected';
            $user->save();
        }

        return back()->with('success', 'Account status updated.');
    }

    public function profile()
    {
        return view('profile');
    }

    public function categories()
    {
        return view('categories');
    }

    public function availableJobs()
    {
        return view('available_jobs');
    }

    public function postJob()
    {
        return view('post_job');
    }
}
