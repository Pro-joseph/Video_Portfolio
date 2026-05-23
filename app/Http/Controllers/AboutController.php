<?php

namespace App\Http\Controllers;

use App\Models\PageSection;
use App\Models\Testimonial;
use App\Models\Package;

class AboutController extends Controller
{
    public function index()
    {
        $sections = PageSection::whereIn('key', ['about', 'about2', 'stats'])
            ->get()
            ->keyBy('key');

        $testimonials = Testimonial::where('is_visible', true)
            ->latest()
            ->get();

        $packages = Package::where('is_active', true)
            ->get();

        return view('about_page', compact('sections', 'testimonials', 'packages'));
    }
}