<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WorkCategory;

class WorkCategoryController extends Controller
{
    public function index()
    {
        // Fetch all work categories from the database
        $categories = WorkCategory::all();

        return view('work_categories.index', compact('categories'));
    }

    public function create()
    {
        return view('work_categories.create');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|unique:work_categories|max:255',
        ]);

        // Create a new work category in the database
        WorkCategory::create([
            'name' => $request->name,
        ]);

        return redirect()->route('work_categories.index')->with('success', 'Work category added successfully!');
    }
}
