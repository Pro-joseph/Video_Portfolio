@extends('layouts.app')

@section('title', 'Research Log | ' . $post->title)

@section('content')
<main class="pt-32 pb-24 bg-background">
    <article class="max-w-4xl mx-auto px-margin-mobile space-y-12">
        <header class="space-y-6">
            <span class="technical-hud text-tertiary block">// RESEARCH_LOG_{{ $post->id }} // {{ $post->published_at?->format('Y.m.d') }}</span>
            <h1 class="font-display-hero text-5xl md:text-7xl text-white uppercase leading-none">{{ $post->title }}</h1>
            @if($post->cover_image)
                <div class="aspect-video glass border border-white/5 overflow-hidden">
                    @if(str_starts_with($post->cover_image, 'http'))
                    <img src="{{ $post->cover_image }}" class="w-full h-full object-cover grayscale">
                    @else
                    <img src="{{ asset('images/' . $post->cover_image) }}" class="w-full h-full object-cover grayscale">
                    @endif
                </div>
            @endif
        </header>

        <div class="font-body-md text-secondary text-xl leading-relaxed space-y-8 prose prose-invert max-w-none">
            {!! $post->body !!}
        </div>

        <footer class="pt-12 border-t border-white/5">
            <a href="{{ route('blog') }}" class="technical-hud text-tertiary flex items-center gap-2 hover:text-white transition-colors">
                <span class="material-symbols-outlined text-sm">arrow_back</span> RETURN_TO_ARCHIVE
            </a>
        </footer>
    </article>
</main>
@endsection
