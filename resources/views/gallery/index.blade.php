@extends('layouts.app')

@push('styles')
<style>
    .gallery-card {
        background: var(--surface);
        border: 1px solid var(--border);
        transition: all 0.4s ease;
        cursor: pointer;
        text-decoration: none;
        display: block;
    }

    .gallery-card:hover {
        border-color: rgba(234, 88, 12, 0.3);
        box-shadow: 0 40px 80px rgba(0,0,0,0.6);
        transform: translateY(-4px);
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

    .card-fade {
        opacity: 0;
        transform: translateY(40px);
        transition: opacity 0.6s ease, transform 0.6s ease;
    }

    .card-fade.in-view {
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
    document.querySelectorAll('.section-fade, .card-fade').forEach(function(el) { observer.observe(el); });
});
</script>
@endpush

@section('title', 'Client Gallery — FrameFlow')

@section('content')
<div style="padding: 10rem 1.5rem 6rem;">
    <div class="max-w-7xl mx-auto">
        <div class="section-fade text-center" style="margin-bottom: 4rem;">
            <div class="accent-line" style="margin: 0 auto 1.5rem;"></div>
            <h1 class="section-title">Client Gallery</h1>
            <p style="color: var(--muted);">Browse our portfolio of work organized by client</p>
        </div>

        @if($clients->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($clients as $client)
            <a href="{{ route('gallery.show', $client->slug) }}" class="gallery-card card-fade" style="transition-delay: {{ $loop->index * 80 }}ms;">
                <div style="position: relative; overflow: hidden; aspect-ratio: 1/1;">
                    @if($client->logo)
                        <img src="{{ $client->logo_url }}" alt="{{ $client->name }}" class="w-full h-full object-contain p-8" style="transition: transform 0.6s ease;">
                    @else
                        <div class="w-full h-full flex items-center justify-center" style="background: rgba(234, 88, 12, 0.05);">
                            <span style="font-family: 'Bebas Neue', sans-serif; font-size: 3rem; color: rgba(234, 88, 12, 0.3);">{{ strtoupper(substr($client->name, 0, 1)) }}</span>
                        </div>
                    @endif
                    <div style="position: absolute; inset: 0; display: flex; align-items: center; justify-content: center; background: rgba(234, 88, 12, 0.9); opacity: 0; transition: opacity 0.3s ease;" onmouseover="this.style.opacity='1'" onmouseout="this.style.opacity='0'">
                        <div style="color: white; text-align: center;">
                            <p style="font-family: 'Bebas Neue', sans-serif; font-size: 1.5rem; letter-spacing: 0.03em;">{{ $client->images_count }} images</p>
                            <p style="font-size: 0.85rem; opacity: 0.8;">Click to view</p>
                        </div>
                    </div>
                </div>
                <div style="padding: 1.25rem; text-align: center;">
                    <h3 style="font-family: 'Bebas Neue', sans-serif; font-size: 1.6rem; color: var(--orange); letter-spacing: 0.03em;">{{ $client->name }}</h3>
                    @if($client->description)
                        <p style="color: var(--muted); font-size: 0.85rem; margin-top: 0.25rem;">{{ $client->description }}</p>
                    @endif
                </div>
            </a>
            @endforeach
        </div>
        @else
        <div style="text-align: center; padding: 4rem 2rem;">
            <p style="color: var(--muted);">No gallery clients yet.</p>
        </div>
        @endif
    </div>
</div>
@endsection