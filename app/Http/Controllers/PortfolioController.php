<?php

namespace App\Http\Controllers;

use App\Models\Project;

class PortfolioController extends Controller
{
    public function index()
    {
        $projects = Project::with('media')->latest()->get();
        return view('cinema_sahara_portfolio', compact('projects'));
    }

    public function show(Project $project)
    {
        $project->load('media');
        return view('golden_hour_detail_page', compact('project'));
    }
}