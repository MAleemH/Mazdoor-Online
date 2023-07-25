<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portfolio;
use Illuminate\Support\Facades\Auth;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::where('user_id', Auth::id())->get();
        return view('portfolios.index', compact('portfolios'));
    }

    public function create()
    {
        return view('portfolios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'specialization' => 'required|string|max:255',
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

        return view('portfolios.edit', compact('portfolio'));
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
