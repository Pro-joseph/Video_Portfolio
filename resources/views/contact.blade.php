@extends('layouts.app')

@push('styles')
<style>
    .form-input {
        font-family: 'DM Sans', sans-serif;
        background: var(--surface);
        border: 1px solid var(--border);
        color: var(--text);
        padding: 12px 16px;
        font-size: 0.95rem;
        transition: border-color 0.3s ease;
        width: 100%;
    }

    .form-input:focus {
        outline: none;
        border-color: var(--orange);
    }

    .form-input::placeholder { color: var(--muted); }
    .form-input option { background: var(--surface); color: var(--text); }

    .service-card {
        background: var(--surface);
        border: 1px solid var(--border);
        padding: 1.5rem;
        transition: all 0.4s ease;
        cursor: pointer;
    }

    .service-card:hover {
        border-color: rgba(234, 88, 12, 0.3);
        box-shadow: 0 40px 80px rgba(0,0,0,0.6);
    }

    .section-fade {
        opacity: 0;
        transform: translateY(30px);
        transition: opacity 0.8s ease, transform 0.8s ease;
    }

    .section-fade.in-view {
        opacity: 1;
        transform: translateY(0);
    }
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    var observer = new IntersectionObserver(function(entries) {
        entries.forEach(function(entry) {
            if (entry.isIntersecting) {
                entry.target.classList.add('in-view');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1 });
    document.querySelectorAll('.section-fade').forEach(function(el) { observer.observe(el); });
});
</script>
@endpush

@section('title', 'Contact — Oumalk')

@section('content')
@php
$email = $siteSettings['contact']['contact_email'] ?? 'hello@frameflow.com';
$phone = $siteSettings['contact']['contact_phone'] ?? '+1 (555) 123-4567';
@endphp

<div style="padding: 10rem 1.5rem 6rem;">
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-16">
        <div class="section-fade">
            <div class="accent-line"></div>
            <h1 class="section-title" style="margin-bottom: 1rem;">Get in Touch</h1>
            <p style="color: var(--muted); margin-bottom: 3rem;">Have a project in mind? Let's discuss how we can bring your vision to life.</p>

            @if(session('success'))
                <div style="margin-bottom: 2rem; padding: 1rem; border: 1px solid var(--orange); color: var(--orange); background: rgba(234, 88, 12, 0.1);">
                    Thank you! We'll get back to you soon.
                </div>
            @endif

            <form action="{{ route('contact.store') }}" method="POST" style="display: flex; flex-direction: column; gap: 1.5rem;">
                @csrf
                <div>
                    <label style="display: block; font-size: 0.85rem; font-weight: 500; color: var(--text); margin-bottom: 0.5rem;">Name *</label>
                    <input type="text" name="name" required class="form-input" placeholder="Your name">
                </div>
                <div>
                    <label style="display: block; font-size: 0.85rem; font-weight: 500; color: var(--text); margin-bottom: 0.5rem;">Email *</label>
                    <input type="email" name="email" required class="form-input" placeholder="your@email.com">
                </div>
                <div>
                    <label style="display: block; font-size: 0.85rem; font-weight: 500; color: var(--text); margin-bottom: 0.5rem;">Project Type</label>
                    <select name="category_id" class="form-input">
                        <option value="">Select project type</option>
                        @foreach($categories as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label style="display: block; font-size: 0.85rem; font-weight: 500; color: var(--text); margin-bottom: 0.5rem;">Message *</label>
                    <textarea name="body" rows="6" required class="form-input" style="resize: vertical;" placeholder="Tell us about your project..."></textarea>
                </div>
                <button type="submit" class="btn-primary" style="justify-content: center;">Send Message</button>
            </form>

            <div style="margin-top: 3rem; padding-top: 2rem; border-top: 1px solid var(--border); display: flex; flex-direction: column; gap: 0.75rem;">
                <a href="mailto:{{ $email }}" style="color: var(--muted); text-decoration: none; display: flex; align-items: center; gap: 0.75rem; transition: color 0.3s ease;">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    {{ $email }}
                </a>
                <a href="tel:{{ $phone }}" style="color: var(--muted); text-decoration: none; display: flex; align-items: center; gap: 0.75rem; transition: color 0.3s ease;">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                    {{ $phone }}
                </a>
            </div>
        </div>

        <div class="section-fade" style="transition-delay: 200ms;">
            <h2 style="font-family: 'Bebas Neue', sans-serif; font-size: 2rem; color: var(--text); letter-spacing: 0.03em; margin-bottom: 2rem;">Our Services</h2>
            <div style="display: flex; flex-direction: column; gap: 1rem;">
                @forelse($packages as $pkg)
                    <div class="service-card">
                        <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 0.75rem;">
                            <h3 style="font-family: 'Bebas Neue', sans-serif; font-size: 1.5rem; color: var(--text); letter-spacing: 0.03em;">{{ $pkg->name }}</h3>
                            @if($pkg->price)
                                <span style="font-family: 'Bebas Neue', sans-serif; font-size: 1.5rem; color: var(--orange);">${{ number_format($pkg->price, 0) }}</span>
                            @endif
                        </div>
                        <p style="color: var(--muted); font-size: 0.9rem; margin-bottom: 0.75rem;">{{ $pkg->description }}</p>
                        @if($pkg->features)
                            <ul style="list-style: none; padding: 0;">
                                @foreach(array_slice($pkg->features, 0, 3) as $feature)
                                    <li style="display: flex; align-items: center; gap: 0.5rem; color: var(--muted); font-size: 0.85rem; padding: 0.25rem 0;">
                                        <svg class="w-4 h-4" style="color: var(--orange); flex-shrink: 0;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                        {{ $feature }}
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                @empty
                    <p style="color: var(--muted);">No services available.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection