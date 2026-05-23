@extends('layouts.app')

@section('title', 'Cinematic Research | Blog')

@section('content')
<main class="pt-32 pb-24 bg-background">
    <div class="px-margin-mobile md:px-margin-desktop space-y-16">
        <header class="space-y-6">
            <span class="technical-hud text-tertiary block">// RESEARCH_LOGS_ACTIVE</span>
            <h1 class="font-display-hero text-6xl md:text-8xl text-white uppercase leading-none">Cinematic Research</h1>
        </header>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
            @forelse($posts as $post)
                <article class="glass border border-white/5 p-8 space-y-6 group cursor-pointer hover:border-tertiary transition-colors">
                    <span class="technical-hud text-tertiary text-[10px]">{{ $post->published_at?->format('Y.m.d') }}</span>
                    <h2 class="font-display-hero text-2xl text-white uppercase group-hover:text-tertiary transition-colors">{{ $post->title }}</h2>
                    <p class="font-body-md text-secondary line-clamp-3">
                        {{ Str::limit(strip_tags($post->body), 150) }}
                    </p>
                    <a href="{{ route('blog.show', $post) }}" class="technical-hud text-white group-hover:text-tertiary flex items-center gap-2">
                        READ_FULL_LOG <span class="material-symbols-outlined text-sm">arrow_forward</span>
                    </a>
                </article>
            @empty
                <div class="col-span-full py-24 text-center border border-dashed border-white/10">
                    <p class="technical-hud text-secondary italic">NO_RESEARCH_LOGS_FOUND_IN_ARCHIVE</p>
                </div>
            @endforelse
        </div>
    </div>
</main>
@endsection
