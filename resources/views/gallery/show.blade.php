@extends('layouts.app')

@push('styles')
<style>
    .gallery-image {
        background: var(--surface);
        border: 1px solid var(--border);
        transition: all 0.4s ease;
        cursor: pointer;
        overflow: hidden;
    }

    .gallery-image:hover {
        border-color: rgba(234, 88, 12, 0.3);
        box-shadow: 0 40px 80px rgba(0,0,0,0.6);
        transform: scale(1.02);
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

@section('title', $client->name . ' Gallery — FrameFlow')

@section('content')
<div style="padding: 10rem 1.5rem 6rem;">
    <div class="max-w-7xl mx-auto">
        <div class="section-fade text-center" style="margin-bottom: 3rem;">
            @if($client->logo)
                <img src="{{ $client->logo_url }}" alt="{{ $client->name }}" style="height: 5rem; margin: 0 auto 1.5rem; object-fit: contain;">
            @endif
            <div class="accent-line" style="margin: 0 auto 1.5rem;"></div>
            <h1 class="section-title">{{ $client->name }}</h1>
            @if($client->description)
                <p style="color: var(--muted); margin-top: 0.5rem;">{{ $client->description }}</p>
            @endif
            <a href="{{ route('gallery') }}" class="btn-secondary" style="margin-top: 2rem; display: inline-flex;">Back to Gallery</a>
        </div>

        @if($images->count() > 0)
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @foreach($images as $image)
            <div class="gallery-image relative group aspect-square cursor-pointer section-fade" onclick="openLightbox('{{ $image->image_url }}', '{{ $image->caption ?? '' }}')" style="transition-delay: {{ $loop->index * 50 }}ms;">
                <img src="{{ $image->image_url }}" alt="{{ $image->caption ?? $client->name }}" class="w-full h-full object-cover" style="transition: transform 0.6s ease;">
                @if($image->caption)
                <div style="position: absolute; inset: 0; display: flex; align-items: center; justify-content: center; background: var(--overlay-bg); opacity: 0; transition: opacity 0.3s ease;" onmouseover="this.style.opacity='1'" onmouseout="this.style.opacity='0'">
                    <p style="color: white; text-align: center; padding: 1rem; font-size: 0.9rem;">{{ $image->caption }}</p>
                </div>
                @endif
            </div>
            @endforeach
        </div>
        @else
        <div style="text-align: center; padding: 4rem 2rem;">
            <p style="color: var(--muted);">No images for this client yet.</p>
        </div>
        @endif
    </div>
</div>

<div id="lightbox" style="position: fixed; inset: 0; z-index: 999; display: none; align-items: center; justify-content: center; padding: 2rem; background: var(--overlay-heavy); cursor: pointer;" onclick="closeLightbox()">
    <button style="position: absolute; top: 1rem; right: 1rem; color: white; font-size: 2.5rem; background: none; border: none; cursor: pointer; z-index: 10;" onclick="event.stopPropagation(); closeLightbox();">&times;</button>
    <img id="lightbox-img" src="" alt="" style="max-width: 100%; max-height: 90vh; object-fit: contain;">
    <p id="lightbox-caption" style="color: white; text-align: center; margin-top: 1rem;"></p>
</div>

@push('scripts')
<script>
function openLightbox(src, caption) {
    document.getElementById('lightbox-img').src = src;
    document.getElementById('lightbox-caption').textContent = caption;
    var lb = document.getElementById('lightbox');
    lb.style.display = 'flex';
    document.body.style.overflow = 'hidden';
}

function closeLightbox() {
    var lb = document.getElementById('lightbox');
    lb.style.display = 'none';
    document.body.style.overflow = 'auto';
}
</script>
@endpush
@endsection