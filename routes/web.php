<?php

use App\Models\Project;
use App\Models\PageSection;
use App\Models\Testimonial;
use App\Models\Package;
use App\Models\Category;
use App\Http\Controllers\GalleryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Home
Route::get('/', function () {
    $sections = PageSection::whereIn('key', ['hero', 'about', 'cta'])
        ->where('is_visible', true)
        ->get()
        ->keyBy('key');
    $featuredProjects = Project::with('media')->where('is_featured', true)->latest()->take(6)->get();
    $testimonials = Testimonial::where('is_visible', true)->latest()->get();
    $packages = Package::where('is_active', true)->get();
    return view('home', compact('sections', 'featuredProjects', 'testimonials', 'packages'));
})->name('home');

// Portfolio
Route::get('/portfolio', function () {
    $projects = Project::with('media', 'category')->where('is_reels', false)->latest()->get();
    $categories = Category::where('is_active', true)->get();
    return view('portfolio', compact('projects', 'categories'));
})->name('portfolio');

// Gallery
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');
Route::get('/gallery/{slug}', [GalleryController::class, 'show'])->name('gallery.show');

// Reels
Route::get('/reels', function () {
    $reels = Project::with('media', 'category')->where('is_reels', true)->latest()->get();
    return view('reels', compact('reels'));
})->name('reels');

Route::get('/portfolio/{project}', function (Project $project) {
    $project->load('media');
    return view('project_detail', compact('project'));
})->name('portfolio.show');

// About
Route::get('/about', function () {
    $sections = PageSection::whereIn('key', ['about', 'stats'])->get()->keyBy('key');
    $testimonials = Testimonial::where('is_visible', true)->latest()->get();
    $packages = Package::where('is_active', true)->get();
    $siteSettings = \App\Models\SiteSettings::getGroup('stats');
    return view('about', compact('sections', 'testimonials', 'packages', 'siteSettings'));
})->name('about');

// Contact
Route::get('/contact', function () {
    $packages = Package::where('is_active', true)->get();
    $categories = Category::where('is_active', true)->get();
    $siteSettings = \App\Models\SiteSettings::getGroup('contact');
    return view('contact', compact('packages', 'categories', 'siteSettings'));
})->name('contact');

Route::post('/contact', function (Request $request) {
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'category_id' => 'nullable|exists:categories,id',
        'subject' => 'nullable|string|max:255',
        'body' => 'required|string',
    ]);
    \App\Models\ContactMessage::create($validated);
    return back()->with('success', true);
})->name('contact.store');

// API Routes
Route::prefix('api')->group(function () {
    Route::get('/projects', fn () => response()->json(Project::with('media', 'category')->latest()->get()));
    Route::get('/projects/featured', fn () => response()->json(Project::with('media', 'category')->where('is_featured', true)->latest()->take(6)->get()));
    Route::get('/projects/{project}', fn (Project $project) => response()->json($project->load('media')));
    Route::get('/sections', fn () => response()->json(PageSection::whereIn('key', ['hero', 'about', 'cta', 'services'])->get()->keyBy('key')));
    Route::get('/sections/about', fn () => response()->json(PageSection::whereIn('key', ['about', 'stats'])->get()->keyBy('key')));
    Route::get('/testimonials', fn () => response()->json(Testimonial::where('is_visible', true)->latest()->get()));
    Route::get('/packages', fn () => response()->json(Package::where('is_active', true)->get()));
    Route::get('/categories', fn () => response()->json(Category::where('is_active', true)->get()));
});

// Auth routes
require __DIR__.'/auth.php';