@extends('layouts.app')

@push('styles')
<style>
    .hero-section {
        position: relative;
        min-height: 100vh;
        display: flex;
        align-items: center;
        overflow: hidden;
    }

    .hero-section::before {
        content: 'CINEMA';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -55%);
        font-family: 'Bebas Neue', sans-serif;
        font-size: clamp(8rem, 22vw, 20rem);
        color: transparent;
        -webkit-text-stroke: 1px rgba(255,255,255,0.04);
        pointer-events: none;
        white-space: nowrap;
        z-index: 1;
        letter-spacing: 0.05em;
    }

    .hero-slider {
        position: absolute; inset: 0; z-index: 0;
    }

    .hero-slider .slide {
        position: absolute; inset: 0;
        opacity: 0;
        transition: opacity 1.5s ease-in-out;
        z-index: 0;
    }

    .hero-slider .slide.active { opacity: 1; z-index: 1; }

    .hero-slider .slide img {
        width: 100%; height: 100%; object-fit: cover;
    }

    .hero-slider .slide::after {
        content: '';
        position: absolute; inset: 0;
        background: linear-gradient(180deg, rgba(0,0,0,0.3) 0%, rgba(0,0,0,0.85) 100%);
    }

    @media (max-width: 768px) {
        .hero-slider .slide img {
            object-position: center 30%;
        }
        .hero-slider .slide::after {
            background: linear-gradient(180deg, rgba(0,0,0,0.45) 0%, rgba(0,0,0,0.92) 100%);
        }
    }

    .hero-dots {
        position: absolute;
        bottom: 6rem; left: 50%;
        transform: translateX(-50%);
        z-index: 20;
        display: flex; gap: 0.75rem;
    }

    .hero-dot {
        width: 10px; height: 10px;
        border-radius: 50%;
        background: rgba(255,255,255,0.3);
        border: none;
        cursor: pointer;
        transition: all 0.3s ease;
        padding: 0;
    }

    .hero-dot.active { background: var(--orange); transform: scale(1.3); }
    .hero-dot:hover { background: rgba(255,255,255,0.7); }

    .hero-content {
        position: relative;
        z-index: 10;
    }

    .hero-title {
        font-family: 'Bebas Neue', sans-serif;
        font-size: clamp(4rem, 10vw, 9rem);
        line-height: 0.9;
        color: var(--text);
        letter-spacing: 0.02em;
        margin-bottom: 2rem;
        opacity: 0;
        transform: translateY(30px);
        animation: fadeUp 0.9s ease forwards 0.35s;
    }

    .hero-title span {
        color: transparent;
        -webkit-text-stroke: 1px var(--orange);
    }

    .hero-subtitle {
        font-family: 'DM Sans', sans-serif;
        font-size: 1rem;
        color: var(--muted);
        max-width: 480px;
        line-height: 1.7;
        opacity: 0;
        transform: translateY(20px);
        animation: fadeUp 0.9s ease forwards 0.5s;
    }

    .hero-eyebrow {
        font-family: 'DM Sans', sans-serif;
        font-size: 0.7rem;
        font-weight: 500;
        letter-spacing: 0.25em;
        text-transform: uppercase;
        color: var(--orange);
        display: flex;
        align-items: center;
        gap: 0.75rem;
        margin-bottom: 1.5rem;
        opacity: 0;
        transform: translateY(20px);
        animation: fadeUp 0.8s ease forwards 0.2s;
    }

    .hero-eyebrow::before {
        content: '';
        width: 40px;
        height: 1px;
        background: var(--orange);
    }

    .hero-btns {
        opacity: 0;
        transform: translateY(20px);
        animation: fadeUp 0.9s ease forwards 0.65s;
    }

    .scroll-indicator {
        position: absolute;
        bottom: 2rem; left: 50%;
        transform: translateX(-50%);
        z-index: 10;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 0.5rem;
        color: var(--muted);
        font-size: 0.7rem;
        text-transform: uppercase;
        letter-spacing: 0.15em;
        opacity: 0;
        animation: fadeUp 0.8s ease forwards 0.8s;
    }

    .scroll-indicator .line {
        width: 1px;
        height: 60px;
        background: linear-gradient(to bottom, var(--muted), transparent);
        animation: scrollLine 2s ease-in-out infinite;
    }

    @keyframes scrollLine {
        0%, 100% { transform: scaleY(1); opacity: 1; }
        50% { transform: scaleY(0.5); opacity: 0.5; }
    }

    .featured-card {
        background: var(--surface);
        border: 1px solid var(--border);
        overflow: hidden;
        cursor: pointer;
        text-decoration: none;
        display: block;
        opacity: 0;
        transform: translateY(60px) rotateX(8deg);
        transition:
            transform 0.7s cubic-bezier(0.23, 1, 0.32, 1),
            box-shadow 0.5s ease,
            border-color 0.4s ease;
        transform-style: preserve-3d;
        perspective: 1000px;
    }

    .featured-card.in-view {
        opacity: 1;
        transform: translateY(0) rotateX(0deg);
    }

    .featured-card:hover {
        border-color: rgba(234, 88, 12, 0.3);
        box-shadow:
            0 40px 80px rgba(0,0,0,0.6),
            0 0 0 1px rgba(234, 88, 12, 0.15),
            inset 0 1px 0 rgba(255,255,255,0.05);
        transform: translateY(-6px) scale(1.005);
    }

    .featured-card-media {
        position: relative;
        overflow: hidden;
        aspect-ratio: 16/10;
    }

    .featured-card-media img {
        width: 100%; height: 100%;
        object-fit: cover;
        transition: transform 0.9s cubic-bezier(0.23, 1, 0.32, 1), filter 0.5s ease;
        display: block;
    }

    .featured-card:hover .featured-card-media img {
        transform: scale(1.08);
        filter: brightness(0.75);
    }

    .featured-card-glare {
        position: absolute; inset: 0;
        background: linear-gradient(135deg, rgba(255,255,255,0.07) 0%, transparent 60%);
        opacity: 0;
        transition: opacity 0.4s ease;
        pointer-events: none;
        z-index: 2;
    }

    .featured-card:hover .featured-card-glare { opacity: 1; }

    .featured-play {
        position: absolute;
        top: 50%; left: 50%;
        transform: translate(-50%, -50%) scale(0.7);
        width: 72px; height: 72px;
        border-radius: 50%;
        background: rgba(234, 88, 12, 0.9);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        z-index: 3;
        backdrop-filter: blur(4px);
    }

    .featured-play::before {
        content: '';
        width: 0; height: 0;
        border-top: 11px solid transparent;
        border-bottom: 11px solid transparent;
        border-left: 18px solid white;
        margin-left: 4px;
    }

    .featured-play::after {
        content: '';
        position: absolute;
        inset: -8px;
        border-radius: 50%;
        border: 1px solid rgba(234, 88, 12, 0.4);
        animation: ringPulse 2s ease-in-out infinite;
    }

    .featured-card:hover .featured-play {
        opacity: 1;
        transform: translate(-50%, -50%) scale(1);
    }

    .featured-card-info {
        padding: 1.25rem 1.5rem;
        position: relative;
    }

    .featured-card-info::before {
        content: '';
        position: absolute;
        top: 0; left: 1.5rem; right: 1.5rem;
        height: 1px;
        background: var(--border);
    }

    .featured-card-cat {
        font-family: 'DM Sans', sans-serif;
        font-size: 0.65rem;
        font-weight: 500;
        letter-spacing: 0.2em;
        text-transform: uppercase;
        color: var(--orange);
        margin-bottom: 0.25rem;
    }

    .featured-card-title {
        font-family: 'Bebas Neue', sans-serif;
        font-size: 1.6rem;
        color: var(--text);
        letter-spacing: 0.03em;
        line-height: 1;
        transition: color 0.3s ease;
    }

    .section-header {
        opacity: 0;
        transform: translateY(30px);
        transition: opacity 0.8s ease, transform 0.8s ease;
    }

    .section-header.in-view {
        opacity: 1;
        transform: translateY(0);
    }

    .service-card {
        background: var(--surface);
        border: 1px solid var(--border);
        padding: 2rem;
        transition: all 0.4s ease;
        cursor: pointer;
    }

    .service-card:hover {
        border-color: rgba(234, 88, 12, 0.3);
        box-shadow: 0 40px 80px rgba(0,0,0,0.6), 0 0 0 1px rgba(234, 88, 12, 0.15);
        transform: translateY(-4px);
    }

    .testimonial-card {
        background: var(--surface);
        border: 1px solid var(--border);
        padding: 2rem;
        transition: all 0.4s ease;
    }

    .testimonial-card:hover {
        border-color: rgba(234, 88, 12, 0.3);
    }
</style>
@endpush

@section('content')
@php
$hero = $sections['hero'] ?? null;
$about = $sections['about'] ?? null;
$cta = $sections['cta'] ?? null;
@endphp

@if($hero)
<section class="hero-section">
    <div class="hero-slider" id="hero-slider">
        @if($hero->getImages()->count() > 0)
            @foreach($hero->getImages() as $index => $image)
                <div class="slide {{ $index === 0 ? 'active' : '' }}" data-index="{{ $index }}">
                    <img src="{{ $image }}" alt="Hero background {{ $index + 1 }}">
                </div>
            @endforeach
        @else
            <div class="slide active" style="background:linear-gradient(135deg,var(--bg) 0%,var(--surface) 100%)"></div>
        @endif
    </div>

    @if($hero->getImages()->count() > 1)
    <div class="hero-dots" id="hero-dots">
        @foreach($hero->getImages() as $index => $image)
            <button class="hero-dot {{ $index === 0 ? 'active' : '' }}" data-index="{{ $index }}" aria-label="Slide {{ $index + 1 }}"></button>
        @endforeach
    </div>
    @endif

    <div class="hero-content max-w-7xl mx-auto px-6 pt-32 pb-20 w-full">
        <div class="max-w-3xl">
            <p class="hero-eyebrow">Professional Videography</p>
            <h1 class="hero-title">
                {{ $hero->title ?? 'Cinematic' }}<br><span>Stories</span>
            </h1>
            <p class="hero-subtitle mb-10">
                {{ $hero->body ?? 'We transform your moments into compelling visual narratives that resonate with your audience and leave lasting impressions.' }}
            </p>
            <div class="hero-btns flex flex-wrap gap-4">
                <a href="{{ route('portfolio') }}" class="btn-primary group">
                    <span>View Our Work</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
                <a href="{{ route('contact') }}" class="btn-secondary">
                    Get In Touch
                </a>
            </div>
        </div>
    </div>

    <div class="scroll-indicator">
        <span>Scroll</span>
        <div class="line"></div>
    </div>
</section>
@endif

@if($featuredProjects->count() > 0)
<section style="padding: 6rem 1.5rem 8rem;">
    <div class="max-w-7xl mx-auto">
        <div class="section-header flex flex-col md:flex-row justify-between items-start md:items-end mb-16 gap-6">
            <div>
                <div class="accent-line"></div>
                <h2 class="section-title">Featured Work</h2>
                <p style="color: var(--muted); max-width: 400px; margin-top: 0.5rem;">A curated selection of our most impactful projects</p>
            </div>
            <a href="{{ route('portfolio') }}" style="color: var(--orange); font-family: 'DM Sans', sans-serif; font-size: 0.85rem; letter-spacing: 0.1em; text-transform: uppercase; text-decoration: none; display: flex; align-items: center; gap: 0.5rem;">
                View All
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($featuredProjects as $project)
                <a href="{{ route('portfolio.show', $project) }}" class="featured-card" style="transition-delay: {{ $loop->index * 100 }}ms;">
                    <div class="featured-card-media">
                        <img src="{{ $project->coverImageUrl ?? 'https://images.unsplash.com/photo-1574717024653-61fd2cf4d44d?w=600&q=80' }}" alt="{{ $project->title }}" loading="lazy">
                        <div class="featured-card-glare"></div>
                        <div class="featured-play"></div>
                    </div>
                    <div class="featured-card-info">
                        <p class="featured-card-cat">{{ $project->category?->name ?? 'Project' }}</p>
                        <h3 class="featured-card-title">{{ $project->title }}</h3>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>
@endif

@if($packages->count() > 0)
<section style="padding: 6rem 1.5rem 8rem; background: var(--surface);">
    <div class="max-w-7xl mx-auto">
        <div class="section-header text-center mb-16">
            <div class="accent-line" style="margin: 0 auto 1.5rem;"></div>
            <h2 class="section-title">Our Services</h2>
            <p style="color: var(--muted); margin-top: 0.5rem;">Tailored videography solutions for every need</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($packages as $package)
                <div class="service-card">
                    <div class="w-14 h-14 flex items-center justify-center mb-6" style="background: rgba(234, 88, 12, 0.1);">
                        <svg class="w-7 h-7" style="color: var(--orange);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            @switch($loop->index)
                                @case(0)
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                                    @break
                                @case(1)
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z"/>
                                    @break
                                @case(2)
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/>
                                    @break
                                @default
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                            @endswitch
                        </svg>
                    </div>
                    <h3 style="font-family: 'Bebas Neue', sans-serif; font-size: 1.8rem; color: var(--text); letter-spacing: 0.03em; margin-bottom: 0.75rem;">{{ $package->name }}</h3>
                    <p style="color: var(--muted); margin-bottom: 1.5rem;">{{ $package->description }}</p>
                    @if($package->price)
                        <p style="font-family: 'Bebas Neue', sans-serif; font-size: 2.5rem; color: var(--orange); margin-bottom: 1.5rem;">${{ number_format($package->price, 0) }}</p>
                    @endif
                    @if($package->features)
                        <ul style="list-style: none; padding: 0; margin-bottom: 2rem;">
                            @foreach($package->features as $feature)
                                <li style="display: flex; align-items: center; gap: 0.75rem; color: var(--muted); font-size: 0.9rem; padding: 0.4rem 0;">
                                    <svg class="w-4 h-4" style="color: var(--orange); flex-shrink: 0;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    {{ $feature }}
                                </li>
                            @endforeach
                        </ul>
                    @endif
                    <a href="{{ route('contact') }}" class="btn-secondary w-full" style="justify-content: center;">Inquire Now</a>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

@if($testimonials->count() > 0)
<section style="padding: 6rem 1.5rem 8rem;">
    <div class="max-w-7xl mx-auto">
        <div class="section-header text-center mb-16">
            <div class="accent-line" style="margin: 0 auto 1.5rem;"></div>
            <h2 class="section-title">Client Stories</h2>
            <p style="color: var(--muted); margin-top: 0.5rem;">What our clients say about working with us</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach($testimonials as $testimonial)
                <div class="testimonial-card">
                    <p style="color: var(--muted); font-size: 1rem; line-height: 1.7; margin-bottom: 1.5rem;">"{{ $testimonial->body }}"</p>
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 flex items-center justify-center text-white font-bold" style="background: var(--orange);">
                            {{ strtoupper(substr($testimonial->client_name, 0, 1)) }}
                        </div>
                        <div>
                            <p style="font-family: 'DM Sans', sans-serif; font-weight: 600; color: var(--text);">{{ $testimonial->client_name }}</p>
                            @if($testimonial->service_type)
                                <p style="color: var(--muted); font-size: 0.85rem;">{{ $testimonial->service_type }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

@if($about)
<section style="padding: 6rem 1.5rem 8rem; background: var(--surface);">
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-16 items-center">
        <div>
            <div class="relative">
                <div style="aspect-ratio: 4/5; overflow: hidden; border: 1px solid var(--border);">
                    @if($about->getImageUrl())
                        <img src="{{ $about->getImageUrl() }}" alt="About" class="w-full h-full object-cover">
                    @else
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=600&q=80" alt="About" class="w-full h-full object-cover">
                    @endif
                </div>
                <div style="position: absolute; bottom: -1.5rem; right: -1.5rem; width: 8rem; height: 8rem; background: var(--orange); display: flex; align-items: center; justify-content: center;">
                    <span style="color: white; font-family: 'Bebas Neue', sans-serif; font-size: 1.5rem; text-align: center; line-height: 1.1;">5+<br>Years</span>
                </div>
            </div>
        </div>
        <div>
            <div class="accent-line"></div>
            <h2 class="section-title" style="margin-bottom: 1.5rem;">{{ $about->title ?? 'About Us' }}</h2>
            <p style="color: var(--muted); line-height: 1.7; margin-bottom: 2rem;">{{ $about->body ?? 'We are a team of passionate videographers dedicated to capturing your most precious moments with cinematic excellence.' }}</p>
            <a href="{{ route('about') }}" class="btn-primary">Learn More</a>
        </div>
    </div>
</section>
@endif

@if($cta)
<section style="padding: 6rem 1.5rem; background: var(--orange);">
    <div class="max-w-3xl mx-auto text-center">
        <h2 style="font-family: 'Bebas Neue', sans-serif; font-size: clamp(3rem, 6vw, 5rem); line-height: 0.9; color: white; margin-bottom: 1.5rem;">{{ $cta->title ?? 'Ready to Create Something Amazing?' }}</h2>
        <p style="color: rgba(255,255,255,0.85); font-size: 1.1rem; margin-bottom: 2.5rem;">{{ $cta->body ?? 'Let\'s discuss your project and bring your vision to life.' }}</p>
        <a href="{{ route('contact') }}" class="btn-primary" style="background: white; color: var(--orange);">
            <span>Get in Touch</span>
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
        </a>
    </div>
</section>
@endif
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    var slider = document.getElementById('hero-slider');
    var dotsContainer = document.getElementById('hero-dots');

    if (slider && dotsContainer) {
        var slides = slider.querySelectorAll('.slide');
        var dots = dotsContainer.querySelectorAll('.hero-dot');
        var current = 0;

        function goTo(index) {
            if (index < 0 || index >= slides.length || index === current) return;
            slides[current].classList.remove('active');
            dots[current].classList.remove('active');
            current = index;
            slides[current].classList.add('active');
            dots[current].classList.add('active');
        }

        dots.forEach(function(dot, idx) {
            dot.addEventListener('click', function() { goTo(idx); });
        });

        if (slides.length > 1) {
            setInterval(function() { goTo((current + 1) % slides.length); }, 5000);
        }
    }

    var revealObserver = new IntersectionObserver(function(entries) {
        entries.forEach(function(entry) {
            if (entry.isIntersecting) {
                entry.target.classList.add('in-view');
                revealObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1, rootMargin: '0px 0px -60px 0px' });

    document.querySelectorAll('.featured-card, .section-header').forEach(function(el) {
        revealObserver.observe(el);
    });

    document.querySelectorAll('.featured-card').forEach(function(card) {
        card.addEventListener('mousemove', function (e) {
            var rect = this.getBoundingClientRect();
            var x = (e.clientX - rect.left) / rect.width - 0.5;
            var y = (e.clientY - rect.top) / rect.height - 0.5;
            this.style.transform = 'translateY(-6px) rotateX(' + (-y * 6) + 'deg) rotateY(' + (x * 6) + 'deg) scale(1.01)';
        });
        card.addEventListener('mouseleave', function () {
            this.style.transform = '';
        });
    });
});
</script>
@endpush