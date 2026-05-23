<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\GalleryImage;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $clients = Client::where('is_active', true)
            ->orderBy('order')
            ->withCount('activeImages')
            ->get();

        return view('gallery.index', compact('clients'));
    }

    public function show(string $slug)
    {
        $client = Client::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        $images = $client->activeImages;

        return view('gallery.show', compact('client', 'images'));
    }
}