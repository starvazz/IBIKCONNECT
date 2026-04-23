@extends('layouts.app')

@section('title', $event->title . ' - CDC IBI')

@section('content')
<div class="space-y-8 py-8">
    <!-- Breadcrumb -->
    <nav class="flex items-center gap-2 text-sm text-gray-600">
        <a href="{{ route('home') }}" class="hover:text-purple-600">Home</a>
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
        </svg>
        <a href="{{ route('cdc.events') }}" class="hover:text-purple-600">Agenda</a>
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
        </svg>
        <span class="text-gray-900 font-medium">{{ $event->title }}</span>
    </nav>

    <div class="grid lg:grid-cols-3 gap-8">
        <!-- Main Content -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Event Header -->
            <div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
                @if($event->banner_image)
                <img src="{{ $event->banner_image_url }}" alt="{{ $event->title }}" class="w-full h-64 object-cover">
                @else
                <div class="w-full h-64 bg-linear-to-br from-blue-500 to-purple-500"></div>
                @endif
                
                <div class="p-8">
                    <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ $event->title }}</h1>
                    
                    <div class="grid sm:grid-cols-2 gap-4 mb-6">
                        <div class="flex items-center gap-3 text-gray-700">
                            <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500">Tanggal</p>
                                <p class="font-semibold">{{ $event->start_date->format('d F Y') }}</p>
                            </div>
                        </div>
                        
                        <div class="flex items-center gap-3 text-gray-700">
                            <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500">Waktu</p>
                                <p class="font-semibold">{{ $event->start_date->format('H:i') }} WIB</p>
                            </div>
                        </div>
                        
                        @if($event->location)
                        <div class="flex items-center gap-3 text-gray-700">
                            <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500">Lokasi</p>
                                <p class="font-semibold">{{ $event->location }}</p>
                            </div>
                        </div>
                        @endif
                        
                        @if($event->max_participants)
                        <div class="flex items-center gap-3 text-gray-700">
                            <div class="w-10 h-10 bg-orange-100 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500">Kuota</p>
                                <p class="font-semibold">{{ $event->registered_count }}/{{ $event->max_participants }} peserta</p>
                            </div>
                        </div>
                        @endif
                    </div>

                    <div class="prose prose-blue max-w-none text-gray-700">
                        {!! nl2br(e($event->description)) !!}
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            <!-- Registration Form -->
            <div class="bg-white rounded-xl border border-gray-200 p-6 sticky top-24">
                <h3 class="text-xl font-bold text-gray-900 mb-4">Daftar Event</h3>
                
                @if(session('success'))
                <div class="mb-4 p-4 bg-green-50 border border-green-200 rounded-lg text-green-700 text-sm">
                    {{ session('success') }}
                </div>
                @endif

                @if(session('error'))
                <div class="mb-4 p-4 bg-red-50 border border-red-200 rounded-lg text-red-700 text-sm">
                    {{ session('error') }}
                </div>
                @endif

                @if($event->is_registration_open)
                <form action="{{ route('cdc.events.register', $event) }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap *</label>
                        <input type="text" name="name" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email *</label>
                        <input type="email" name="email" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">No. Telepon *</label>
                        <input type="tel" name="phone" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">NIM *</label>
                        <input type="text" name="nim" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Pesan (Opsional)</label>
                        <textarea name="message" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent"></textarea>
                    </div>
                    <button type="submit" class="w-full bg-purple-600 text-white font-bold py-3 rounded-lg hover:bg-purple-700 transition-colors">
                        Daftar Sekarang
                    </button>
                </form>
                @else
                <div class="text-center py-8">
                    <svg class="w-12 h-12 mx-auto text-gray-400 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                    </svg>
                    <p class="text-gray-600 font-medium">Pendaftaran Ditutup</p>
                </div>
                @endif
            </div>

            <!-- Related Events -->
            @if($relatedEvents->count() > 0)
            <div class="bg-white rounded-xl border border-gray-200 p-6">
                <h3 class="font-bold text-gray-900 mb-4">Event Lainnya</h3>
                <div class="space-y-4">
                    @foreach($relatedEvents as $related)
                    <a href="{{ route('cdc.events.detail', $related) }}" class="block group">
                        <h4 class="font-semibold text-gray-900 group-hover:text-purple-600 transition-colors line-clamp-2 mb-1">
                            {{ $related->title }}
                        </h4>
                        <p class="text-sm text-gray-600">{{ $related->start_date->format('d M Y') }}</p>
                    </a>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
