<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portfolio;

class PortfolioController extends Controller
{
    /**
     * Show the labor's portfolio.
     *
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\View\View
     */
    public function show(Portfolio $portfolio)
    {
        return view('portfolios.show', compact('portfolio'));
    }
    /**
     * Display the labor's portfolio if it exists or show the create form otherwise.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $user = auth()->user();

        // Check if the labor already has a portfolio
        $portfolio = Portfolio::where('user_id', $user->id)->first();

        // If the portfolio exists, redirect to the update form
        if ($portfolio) {
            return redirect()->route('portfolios.edit', $portfolio->id);
        }

        return view('portfolios.create');
    }

    /**
     * Show the form for creating a new portfolio.
     *
     * @return \Illuminate\View\View
     */
    public function createForm()
    {
        return view('portfolios.create');
    }

    /**
     * Store a newly created portfolio in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'specialization' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Portfolio::create([
            'user_id' => auth()->id(),
            'specialization' => $request->input('specialization'),
            'description' => $request->input('description'),
        ]);

        return redirect()->route('portfolios.create')->with('success', 'Portfolio created successfully!');
    }

    /**
     * Show the form for updating the labor's portfolio.
     *
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\View\View
     */
    public function edit(Portfolio $portfolio)
    {
        return view('portfolios.edit', compact('portfolio'));
    }

    /**
     * Update the specified portfolio in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Portfolio $portfolio)
    {
        $request->validate([
            'specialization' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $portfolio->update([
            'specialization' => $request->input('specialization'),
            'description' => $request->input('description'),
        ]);

        return redirect()->route('portfolios.edit', $portfolio->id)->with('success', 'Portfolio updated successfully!');
    }
}
