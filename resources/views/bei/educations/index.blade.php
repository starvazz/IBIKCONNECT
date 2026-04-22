@extends('layouts.app')

@section('title', 'Materi Edukasi Pasar Modal - Gallery BEI')

@section('content')
<div class="space-y-12 py-8">

    <!-- Header -->
    <div class="text-center space-y-4">
        <div class="inline-flex items-center gap-2 px-4 py-2 bg-purple-100 text-purple-700 rounded-full text-sm font-semibold">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3z"/>
            </svg>
            Investment Academy
        </div>
        <h1 class="text-4xl md:text-5xl font-bold text-gray-900">Materi Edukasi Pasar Modal</h1>
        <p class="text-lg text-gray-600 max-w-2xl mx-auto">Pelajari dasar-dasar investasi hingga strategi trading yang efektif</p>
    </div>

    @php
    $gradients = [
        'from-purple-600 to-violet-700',
        'from-purple-600 to-violet-700',
        'from-purple-600 to-violet-700',
        'from-purple-600 to-violet-700',
        'from-purple-600 to-violet-700',
        'from-purple-600 to-violet-700',
        'from-purple-600 to-violet-700',
        'from-purple-600 to-violet-700',
    ];
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
    @endphp

    @if($educations->count() > 0)
    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
        @foreach($educations as $i => $education)
        @php
            $grad = $gradients[$i % count($gradients)];
            $icon = $icons[$i % count($icons)];
            $num  = str_pad(($educations->currentPage() - 1) * $educations->perPage() + $i + 1, 2, '0', STR_PAD_LEFT);
        @endphp
        <article class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-lg transition-all duration-300 flex flex-col">

            <!-- Colored Header -->
            <div class="bg-gradient-to-br from-purple-600 to-blue-600 p-6 relative min-h-[160px] flex flex-col justify-between">
                <!-- Number badge -->
                <div class="self-end">
                    <span class="bg-white/25 text-white text-xs font-bold px-2.5 py-1 rounded-full">{{ $num }}</span>
                </div>
                <!-- Icon -->
                <div>
                    <svg class="w-10 h-10 text-white mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        {!! $icon !!}
                    </svg>
                    <h3 class="text-white font-bold text-lg leading-tight line-clamp-2">
                        {{ $education->title }}
                    </h3>
                </div>
            </div>

            <!-- Body -->
            <div class="p-5 flex flex-col flex-1">
                <p class="text-sm text-gray-600 leading-relaxed line-clamp-4 flex-1">
                    {{ Str::limit(strip_tags($education->content), 130) ?: 'Klik untuk membaca materi selengkapnya.' }}
                </p>

                <a href="{{ route('bei.educations.detail', $education) }}"
                    class="mt-5 inline-flex items-center justify-center gap-1.5 w-full px-4 py-2.5 border border-gray-300 text-gray-700 text-sm font-semibold rounded-lg hover:border-purple-400 hover:text-purple-600 hover:bg-purple-50 transition-colors">
                    Pelajari Lebih Lanjut
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
            </div>
        </article>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="flex justify-center">
        {{ $educations->links() }}
    </div>

    @else
    <div class="text-center py-20">
        <div class="w-20 h-20 mx-auto mb-4 rounded-full bg-gray-100 flex items-center justify-center">
            <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
            </svg>
        </div>
        <h3 class="text-xl font-semibold text-gray-900 mb-2">Belum Ada Materi</h3>
        <p class="text-gray-500">Materi edukasi akan segera ditambahkan.</p>
    </div>
    @endif

    <!-- CTA -->
    <div class="bg-gradient-to-br from-purple-600 to-blue-600 rounded-2xl p-8 text-center text-white">
        <h2 class="text-2xl font-bold mb-3">Ingin Belajar Langsung dari Ahli?</h2>
        <p class="text-purple-100 mb-6">Ikuti seminar dan workshop kami untuk mendapatkan insight langsung dari praktisi pasar modal</p>
        <a href="{{ route('bei.events') }}"
            class="inline-flex items-center gap-2 px-6 py-3 bg-white text-purple-600 font-bold rounded-lg hover:bg-purple-50 transition-colors">
            Lihat Event Mendatang
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
            </svg>
        </a>
    </div>

</div>
@endsection
