<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proposal;
use App\Models\Job;
use Illuminate\Support\Facades\Auth;

class ProposalController extends Controller
{   
    public function create(Job $job)
    {
        return view('place_proposal', compact('job'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'job_id' => 'required|exists:jobs,id',
            'proposal_text' => 'required|string',
            'price' => 'required_if:rate,bidding|numeric|min:0', // Only required if job rate is 'bidding'
        ]);

        $user = Auth::user();
        $job = Job::findOrFail($request->input('job_id'));

        // Check if the user already has a proposal for this job (prevent multiple proposals)
        $existingProposal = Proposal::where('user_id', $user->id)->where('job_id', $job->id)->first();

        if ($existingProposal) {
            return back()->with('error', 'You have already submitted a proposal for this job.');
        }

        $proposalData = [
            'user_id' => $user->id,
            'job_id' => $job->id,
            'proposal_text' => $request->input('proposal_text'),
        ];

        // Add the price to the proposal data if the job rate is 'bidding'
        if ($job->rate === 'bidding') {
            $proposalData['price'] = $request->input('price');
        }

        // Create the proposal
        Proposal::create($proposalData);

        return redirect()->route('jobs.show', $job->id)->with('success', 'Your proposal has been submitted successfully.');
    }
}
