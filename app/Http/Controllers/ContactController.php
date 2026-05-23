<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\Package;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $packages = Package::where('is_active', true)->get();
        return view('contact_page', compact('packages'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'nullable|string|max:255',
            'body' => 'required|string',
        ]);

        ContactMessage::create($validated);

        return back()->with('success', true);
    }
}