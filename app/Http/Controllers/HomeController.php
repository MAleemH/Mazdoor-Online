<?php

namespace App\Http\Controllers;

use App\Models\User;

use App\Models\EmployerCategory;

use App\Models\Job;

use App\Models\Proposal;

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

    public function viewCategory()
    {
        $user = Auth::user();
        $category = $user->employerCategories ? $user->employerCategories->category : null;
        return view('employer_category', compact('user', 'category'));
    }

    public function updateCategory(Request $request)
    {
        $user = Auth::user();
        $category = $request->input('category');

        if ($user->employerCategories) {
            $user->employerCategories->update(['category' => $category]);
        } else {
            $user->employerCategories()->create(['category' => $category]);
        }

        return redirect()->route('viewCategory')->with('success', 'Category updated successfully!');
    }

    public function jobs()
    {
        // Fetch all available jobs
        $jobs = Job::where('status', 'available')->get();
        return view('view_jobs', compact('jobs'));
    }

    public function createJob()
    {
        return view('create_jobs');
    }

    public function storeJob(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'rate' => 'required|in:flat,bidding',
            'flat_rate' => 'required_if:rate,flat|nullable|numeric',
        ]);

        // Create a new job record
        $job = Job::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'rate' => $request->input('rate'),
            'flat_rate' => $request->input('rate') === 'flat' ? $request->input('flat_rate') : null,
            'user_id' => auth()->id(),
        ]);

        // If the rate is 'flat', save the 'Flat Rate' value in the database
        if ($request->input('rate') === 'flat') {
            $job->flat_rate = $request->input('flat_rate');
            $job->save();
        }

        // Redirect to the show page of the newly created job
        return redirect()->route('jobs.show', $job->id)->with('success', 'Job created successfully!');
    }

    public function jobDetails(Job $job)
    {
        return view('job_details', compact('job'));
    }

    public function showProposals($jobId)
    {
        $job = Job::findOrFail($jobId);
        $proposals = Proposal::where('job_id', $job->id)->get();

        return view('proposals', compact('job', 'proposals'));
    }

    public function placedProposals()
    {
        $user = auth()->user();
        $proposals = Proposal::where('user_id', $user->id)->get();

        return view('placed_proposals', compact('proposals'));
    }

}
