@extends('layouts.app')

@section('title', $news->title . ' - CDC IBI')

@section('content')
<div class="space-y-8 py-8">
    <!-- Breadcrumb -->
    <nav class="flex items-center gap-2 text-sm text-gray-600">
        <a href="{{ route('home') }}" class="hover:text-purple-600">Home</a>
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
        </svg>
        <a href="{{ route('cdc.news') }}" class="hover:text-purple-600">Berita</a>
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
        </svg>
        <span class="text-gray-900 font-medium">{{ Str::limit($news->title, 50) }}</span>
    </nav>

    <div class="grid lg:grid-cols-3 gap-8">
        <!-- Main Content -->
        <div class="lg:col-span-2">
            <article class="bg-white rounded-xl border border-gray-200 overflow-hidden">
                @if($news->featured_image)
                <img src="{{ $news->featured_image_url }}" alt="{{ $news->title }}" class="w-full h-96 object-cover">
                @endif
                
                <div class="p-8">
                    <div class="flex items-center gap-4 text-sm text-gray-600 mb-4">
                        <span class="flex items-center">
                            <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            {{ $news->published_at->format('d F Y') }}
                        </span>
                        @if($news->category)
                        <span class="px-3 py-1 bg-[#F1E9FB] text-[#8A4BE2] rounded-full font-medium">
                            {{ $news->category }}
                        </span>
                        @endif
                    </div>
                    
                    <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">{{ $news->title }}</h1>
                    
                    <div class="prose prose-lg prose-blue max-w-none text-gray-700 leading-relaxed">
                        {!! nl2br(e($news->content)) !!}
                    </div>
                </div>
            </article>
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            <!-- Related News -->
            @if($relatedNews->count() > 0)
            <div class="bg-white rounded-xl border border-gray-200 p-6">
                <h3 class="font-bold text-gray-900 mb-4">Berita Lainnya</h3>
                <div class="space-y-4">
                    @foreach($relatedNews as $related)
                    <a href="{{ route('cdc.news.detail', $related) }}" class="block group">
                        <h4 class="font-semibold text-gray-900 group-hover:text-purple-600 transition-colors line-clamp-2 mb-1">
                            {{ $related->title }}
                        </h4>
                        <p class="text-xs text-gray-500">{{ $related->published_at->format('d M Y') }}</p>
                    </a>
                    @endforeach
                </div>
            </div>
            @endif

            <!-- CTA -->
            <div class="bg-gradient-to-br from-purple-600 to-blue-600 rounded-xl p-6 text-white">
                <h3 class="text-xl font-bold mb-3">Ikuti Event Kami</h3>
                <p class="text-purple-100 text-sm mb-4">Jangan lewatkan berbagai kegiatan menarik dari CDC IBI</p>
                <a href="{{ route('cdc.events') }}" class="block w-full bg-white text-purple-600 font-bold py-2.5 px-4 rounded-lg hover:bg-purple-50 transition-colors text-center">
                    Lihat Agenda
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
