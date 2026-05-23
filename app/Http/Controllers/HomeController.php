<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\PageSection;
use App\Models\Testimonial;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index()
    {
        $sections = PageSection::whereIn('key', ['hero', 'about', 'cta', 'services'])
            ->get()
            ->keyBy('key');

        $featuredProjects = Project::with('media')
            ->where('is_featured', true)
            ->latest()
            ->take(6)
            ->get();

        $recentProjects = Project::with('media')
            ->latest()
            ->take(6)
            ->get();

        $testimonials = Testimonial::where('is_visible', true)
            ->latest()
            ->get();

        $packages = Package::where('is_active', true)
            ->get();

        return view('narrative_landing_page', compact(
            'sections',
            'featuredProjects',
            'recentProjects',
            'testimonials',
            'packages'
        ));
    }
}