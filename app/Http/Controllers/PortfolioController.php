<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portfolio;
use App\Models\WorkCategory;
use Illuminate\Support\Facades\Auth;

class PortfolioController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $portfolios = Portfolio::where('user_id', $user->id)->get();
        return view('portfolios.index', compact('portfolios', 'user'));
    }

    public function create()
    {
        $specializations = WorkCategory::all();
        return view('portfolios.create', compact('specializations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'specialization' => 'required',
            'description' => 'required|string',
        ]);

        // Create a new portfolio record
        Portfolio::create([
            'user_id' => Auth::id(),
            'specialization' => $request->input('specialization'),
            'description' => $request->input('description'),
        ]);

        return redirect()->route('portfolios.index')->with('success', 'Portfolio created successfully!');
    }

    public function edit(Portfolio $portfolio)
    {
        // Check if the portfolio belongs to the authenticated user
        if ($portfolio->user_id !== Auth::id()) {
            return redirect()->route('portfolios.index')->with('error', 'You are not authorized to edit this portfolio.');
        }

        // Fetch all work categories
        $workCategories = WorkCategory::all();

        return view('portfolios.edit', compact('portfolio', 'workCategories'));
    }

    public function update(Request $request, Portfolio $portfolio)
    {
        // Check if the portfolio belongs to the authenticated user
        if ($portfolio->user_id !== Auth::id()) {
            return redirect()->route('portfolios.index')->with('error', 'You are not authorized to update this portfolio.');
        }

        $request->validate([
            'specialization' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // Update the portfolio record
        $portfolio->update([
            'specialization' => $request->input('specialization'),
            'description' => $request->input('description'),
        ]);

        return redirect()->route('portfolios.index')->with('success', 'Portfolio updated successfully!');
    }
}
