@extends('layouts.app')

@section('title', $education->title . ' - Gallery BEI')

@section('content')
<div class="space-y-8 py-8">

    <!-- Breadcrumb -->
    <nav class="flex items-center gap-2 text-sm text-gray-500">
        <a href="{{ route('bei.home') }}" class="hover:text-purple-600 transition-colors">Home</a>
        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
        </svg>
        <a href="{{ route('bei.educations') }}" class="hover:text-purple-600 transition-colors">Edukasi</a>
        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
        </svg>
        <span class="text-gray-800 font-medium">{{ Str::limit($education->title, 50) }}</span>
    </nav>

    <div class="grid lg:grid-cols-3 gap-8 items-start">

        <!-- Main Content -->
        <div class="lg:col-span-2">
            <article class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">

                <!-- Purple Header Banner -->
                <div class="relative min-h-[220px] flex items-center justify-center p-8 bg-gradient-to-br from-purple-600 to-blue-600">
                    <!-- Decorative circles -->
                    <div class="absolute top-0 right-0 w-48 h-48 bg-white/5 rounded-full -translate-y-1/2 translate-x-1/4"></div>
                    <div class="absolute bottom-0 left-0 w-32 h-32 bg-white/5 rounded-full translate-y-1/2 -translate-x-1/4"></div>

                    @php
                    $icons = [
                        '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>',
                        '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>',
                        '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>',
                        '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>',
                        '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>',
                        '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/>',
                        '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"/>',
                        '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>',
                    ];
                    $iconPath = $icons[($education->id - 1) % count($icons)];
                    @endphp

                    <div class="relative text-center">
                        <div class="w-16 h-16 mx-auto mb-4 bg-white/20 rounded-2xl flex items-center justify-center">
                            <svg class="w-9 h-9 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                {!! $iconPath !!}
                            </svg>
                        </div>
                        <span class="inline-block px-3 py-1 bg-white/20 text-white text-xs font-semibold rounded-full">
                            Materi Edukasi
                        </span>
                    </div>
                </div>

                <!-- Content Body -->
                <div class="p-8">
                    <!-- Meta -->
                    <div class="flex items-center gap-3 text-sm text-gray-500 mb-5">
                        <span class="flex items-center gap-1.5">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            {{ $education->created_at->format('d F Y') }}
                        </span>
                        <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                        <span class="px-2.5 py-0.5 bg-purple-100 text-purple-700 rounded-full text-xs font-medium">
                            Materi Edukasi
                        </span>
                    </div>

                    <!-- Title -->
                    <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6 leading-tight">
                        {{ $education->title }}
                    </h1>

                    <!-- Divider -->
                    <div class="w-12 h-1 bg-gradient-to-r from-purple-600 to-violet-500 rounded-full mb-6"></div>

                    <!-- Content -->
                    <div class="text-gray-700 leading-relaxed space-y-4 text-[15px]">
                        {!! nl2br(e($education->content)) !!}
                    </div>

                    <!-- Back button -->
                    <div class="mt-10 pt-6 border-t border-gray-100">
                        <a href="{{ route('bei.educations') }}"
                            class="inline-flex items-center gap-2 text-sm font-semibold text-purple-600 hover:text-purple-700 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                            </svg>
                            Kembali ke Daftar Materi
                        </a>
                    </div>
                </div>
            </article>
        </div>

        <!-- Sidebar -->
        <div class="space-y-5 lg:sticky lg:top-24">

            <!-- Related Education -->
            @if($relatedEducations->count() > 0)
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
                <h3 class="font-bold text-gray-900 mb-4 flex items-center gap-2">
                    <span class="w-1 h-5 bg-purple-600 rounded-full inline-block"></span>
                    Materi Lainnya
                </h3>
                <div class="space-y-4">
                    @foreach($relatedEducations as $related)
                    <a href="{{ route('bei.educations.detail', $related) }}"
                        class="flex items-start gap-3 group p-3 rounded-xl hover:bg-purple-50 transition-colors">
                        <div class="w-9 h-9 shrink-0 bg-purple-100 rounded-lg flex items-center justify-center group-hover:bg-purple-200 transition-colors">
                            <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                            </svg>
                        </div>
                        <div class="min-w-0">
                            <h4 class="text-sm font-semibold text-gray-800 group-hover:text-purple-600 transition-colors line-clamp-2 leading-snug">
                                {{ $related->title }}
                            </h4>
                            <p class="text-xs text-gray-400 mt-1">{{ $related->created_at->diffForHumans() }}</p>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
            @endif

            <!-- CTA Card -->
            <div class="bg-gradient-to-br from-purple-600 to-blue-600 rounded-2xl p-6 text-white relative overflow-hidden">
                <div class="absolute top-0 right-0 w-24 h-24 bg-white/10 rounded-full -translate-y-1/2 translate-x-1/2"></div>
                <div class="relative">
                    <h3 class="text-lg font-bold mb-2">Siap Praktik?</h3>
                    <p class="text-purple-200 text-sm mb-5 leading-relaxed">
                        Daftar event kami untuk belajar langsung dengan praktisi pasar modal
                    </p>
                    <a href="{{ route('bei.events') }}"
                        class="block w-full bg-white text-purple-600 font-bold py-2.5 px-4 rounded-xl hover:bg-purple-50 transition-colors text-center text-sm">
                        Lihat Event
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
