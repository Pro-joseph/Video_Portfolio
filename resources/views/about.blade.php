@extends('layouts.app')

@push('styles')
<style>
    .stat-card {
        background: var(--surface);
        border: 1px solid var(--border);
        padding: 2rem;
        text-align: center;
        transition: all 0.4s ease;
        cursor: pointer;
    }

    .stat-card:hover {
        border-color: rgba(234, 88, 12, 0.3);
        box-shadow: 0 40px 80px rgba(0,0,0,0.6);
        transform: translateY(-4px);
    }

    .stat-number {
        font-family: 'Bebas Neue', sans-serif;
        font-size: 3.5rem;
        color: var(--orange);
        line-height: 1;
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
        box-shadow: 0 40px 80px rgba(0,0,0,0.6);
        transform: translateY(-4px);
    }

    .testimonial-card {
        background: var(--surface);
        border: 1px solid var(--border);
        padding: 2rem;
        position: relative;
        transition: all 0.4s ease;
    }

    .testimonial-card:hover {
        border-color: rgba(234, 88, 12, 0.3);
    }

    .testimonial-card::before {
        content: '"';
        position: absolute;
        top: 1rem;
        left: 1.5rem;
        font-family: 'Bebas Neue', sans-serif;
        font-size: 4rem;
        color: var(--orange);
        opacity: 0.15;
        line-height: 1;
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

@section('title', 'About — FrameFlow')

@section('content')
@php
$about = $sections['about'] ?? null;
$stats = $siteSettings ?? [
    'experience' => '15+',
    'projects' => '200+',
    'clients' => '150+',
    'awards' => '50+'
];
@endphp

<div style="padding: 10rem 1.5rem 6rem;">
    <div class="max-w-7xl mx-auto">
        @if($about)
        <div class="grid grid-cols-1 md:grid-cols-2 gap-16 mb-24 items-center section-fade">
            <div>
                <div class="relative">
                    <div style="aspect-ratio: 4/5; overflow: hidden; border: 1px solid var(--border);">
                        @if($about && $about->getImageUrl())
                        <img src="{{ $about->getImageUrl() }}" alt="About Us" class="w-full h-full object-cover">
                        @else
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=600&q=80" alt="About Us" class="w-full h-full object-cover">
                        @endif
                    </div>
                    <div style="position: absolute; bottom: -1.5rem; right: -1.5rem; width: 8rem; height: 8rem; background: var(--orange); display: flex; align-items: center; justify-content: center;">
                        <span style="color: white; font-family: 'Bebas Neue', sans-serif; font-size: 1.5rem; text-align: center; line-height: 1.1;">5+<br>Years</span>
                    </div>
                </div>
            </div>
            <div>
                @if($about->title)
                <div class="accent-line"></div>
                <h1 class="section-title" style="margin-bottom: 1.5rem;">{{ $about->title }}</h1>
                @endif
                @if($about->body)
                <p style="color: var(--muted); line-height: 1.7; margin-bottom: 2rem;">{{ $about->body }}</p>
                @endif
                <a href="{{ route('contact') }}" class="btn-primary">Work With Us</a>
            </div>
        </div>
        @endif

        @if(count($stats) > 0)
        <section class="section-fade" style="margin-bottom: 6rem; padding: 3rem; border: 1px solid var(--border); background: var(--surface);">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                @if(isset($stats['experience']))
                <div class="stat-card">
                    <p class="stat-number">{{ $stats['experience'] }}</p>
                    <p style="color: var(--muted); font-size: 0.85rem;">Years Experience</p>
                </div>
                @endif
                @if(isset($stats['projects']))
                <div class="stat-card">
                    <p class="stat-number">{{ $stats['projects'] }}</p>
                    <p style="color: var(--muted); font-size: 0.85rem;">Projects</p>
                </div>
                @endif
                @if(isset($stats['clients']))
                <div class="stat-card">
                    <p class="stat-number">{{ $stats['clients'] }}</p>
                    <p style="color: var(--muted); font-size: 0.85rem;">Clients</p>
                </div>
                @endif
                @if(isset($stats['awards']))
                <div class="stat-card">
                    <p class="stat-number">{{ $stats['awards'] }}</p>
                    <p style="color: var(--muted); font-size: 0.85rem;">Awards</p>
                </div>
                @endif
            </div>
        </section>
        @endif

        @if($packages->count() > 0)
        <section class="section-fade" style="margin-bottom: 6rem;">
            <div class="text-center mb-16">
                <div class="accent-line" style="margin: 0 auto 1.5rem;"></div>
                <h2 class="section-title">Our Services</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($packages as $package)
                    <div class="service-card">
                        <h3 style="font-family: 'Bebas Neue', sans-serif; font-size: 1.8rem; color: var(--text); letter-spacing: 0.03em; margin-bottom: 0.75rem;">{{ $package->name }}</h3>
                        <p style="color: var(--muted); margin-bottom: 1rem;">{{ $package->description }}</p>
                        @if($package->price)
                            <p style="font-family: 'Bebas Neue', sans-serif; font-size: 2.5rem; color: var(--orange);">${{ number_format($package->price, 0) }}</p>
                        @endif
                    </div>
                @endforeach
            </div>
        </section>
        @endif

        @if($testimonials->count() > 0)
        <section class="section-fade">
            <div class="text-center mb-16">
                <div class="accent-line" style="margin: 0 auto 1.5rem;"></div>
                <h2 class="section-title">What Clients Say</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach($testimonials as $t)
                    <div class="testimonial-card">
                        <p style="color: var(--muted); line-height: 1.7; margin-bottom: 1.5rem;">"{{ $t->body }}"</p>
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 flex items-center justify-center text-white font-bold" style="background: var(--orange);">
                                {{ strtoupper(substr($t->client_name, 0, 1)) }}
                            </div>
                            <div>
                                <p style="font-weight: 600; color: var(--text);">{{ $t->client_name }}</p>
                                @if($t->service_type)
                                    <p style="color: var(--muted); font-size: 0.85rem;">{{ $t->service_type }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
        @endif
    </div>
</div>
@endsection