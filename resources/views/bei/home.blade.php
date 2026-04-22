@extends('layouts.app')

@section('content')
<div class="space-y-24 pb-20">
    <!-- Hero Section: Clean Fintech Style -->
    <section class="relative pt-2 lg:pt-4 pb-20 lg:pb-28 -mt-1 sm:-mt-2 overflow-hidden bg-white w-screen left-1/2 right-1/2 -ml-[50vw] -mr-[50vw]">
        <!-- Background accents -->
        <div class="absolute top-0 right-0 -z-10 w-1/2 h-full bg-linear-to-bl from-[#F1E9FB] to-transparent"></div>
        <div class="absolute top-1/4 left-1/4 -z-10 w-64 h-64 bg-[#D7C2F5] rounded-full blur-3xl opacity-50"></div>

        <div class="max-w-360 mx-auto px-4 sm:px-8 lg:px-12">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div class="space-y-8">
                    <!-- Badge -->
                    <div class="inline-flex items-center gap-2 px-4 py-2 bg-[#D7C2F5] text-[#8A4BE2] rounded-full text-sm font-semibold tracking-wide border border-blue-100">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3z"/>
                        </svg>
                        Edukasi Pasar Modal IBI Kesatuan
                    </div>

                    <!-- Main Heading -->
                    <h1 class="text-5xl md:text-6xl lg:text-7xl font-extrabold text-gray-900 leading-tight tracking-tight">
                        Cerdas Investasi <br/>
                        Mulai <span class="text-[#8A4BE2]">Dari Kampus</span>
                    </h1>

                    <!-- Description -->
                    <p class="text-xl text-gray-600 leading-relaxed max-w-xl">
                        Akses literasi keuangan dan pasar modal terlengkap. Gallery BEI IBI Bogor membantu Anda memahami dunia investasi secara profesional dan aman.
                    </p>

                    <!-- CTA Group -->
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="#edukasi" class="inline-flex items-center justify-center px-8 py-4 bg-[#8A4BE2] text-white font-bold rounded-xl hover:bg-[#7A3BD6] transition-all shadow-lg hover:-translate-y-1">
                            Mulai Belajar
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </a>
                        <a href="#daftar" class="inline-flex items-center justify-center px-8 py-4 bg-white text-gray-700 font-bold rounded-xl hover:bg-gray-50 transition-all border-2 border-gray-200">
                            Daftar Event
                        </a>
                    </div>

                    <!-- Market Status Preview -->
                    <div class="pt-8 flex items-center gap-8 border-t border-gray-100">
                        <div>
                            <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">Market Status</p>
                            <div class="flex items-center gap-2">
                                <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
                                <span class="font-bold text-gray-900">OPEN</span>
                            </div>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">IHSG Overview</p>
                            <p class="font-bold text-gray-900">7,245.32 <span class="text-green-500 ml-1 text-sm">+0.45%</span></p>
                        </div>
                    </div>
                </div>

                <!-- Hero Visual: Mockup Dashbaord -->
                <div class="relative">
                    <div class="relative z-10 bg-white rounded-3xl shadow-2xl border border-gray-100 p-6 overflow-hidden duration-500">
                        <div class="flex items-center justify-between mb-8 border-b border-gray-50 pb-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-[#8A4BE2] rounded-xl flex items-center justify-center text-white shadow-lg">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm font-bold text-gray-900">Portfolio Growth</p>
                                    <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest">Real-time Data</p>
                                </div>
                            </div>
                            <div class="flex gap-1">
                                <span class="w-6 h-1 bg-blue-600 rounded-full"></span>
                                <span class="w-6 h-1 bg-gray-100 rounded-full"></span>
                            </div>
                        </div>
                        
                        <!-- Chart Mockup -->
                        <div class="h-48 flex items-end gap-2 mb-8 px-2">
                            @foreach([40, 60, 45, 80, 55, 90, 75, 100, 85, 95] as $h)
                            <div class="flex-1 bg-blue-50 rounded-full relative group transition-all hover:bg-[#8A4BE2]" style="height: {{ $h }}%">
                                <div class="absolute -top-8 left-1/2 -translate-x-1/2 bg-gray-900 text-white text-[10px] px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap">
                                    +{{ $h }}%
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div class="bg-blue-50/50 rounded-2xl p-4">
                                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1">Total Assets</p>
                                <p class="text-xl font-black text-gray-900">Rp 2.5B+</p>
                            </div>
                            <div class="bg-gray-50 rounded-2xl p-4">
                                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1">Active Students</p>
                                <p class="text-xl font-black text-gray-900">1.2k+</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Floating Elements -->
                    <div class="absolute -top-10 -right-10 w-40 h-40 bg-blue-600/10 rounded-full mix-blend-multiply blur-2xl animate-pulse"></div>
                    <div class="absolute -bottom-8 -left-8 bg-white border border-gray-100 shadow-xl rounded-2xl p-4 hidden md:block">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 bg-green-100 text-green-600 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                            </div>
                            <p class="text-xs font-bold text-gray-700">OJK & BEI Licensed</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Partners Section -->
    <section class="max-w-360 mx-auto px-4 sm:px-8 lg:px-12 -mt-12 relative z-20">
        <div class="bg-white rounded-3xl shadow-xl border border-gray-100 p-8">
            <div class="flex flex-col md:flex-row items-center gap-12">
                <div class="shrink-0 border-r-2 border-gray-50 pr-12 hidden md:block">
                    <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1">Official Partners</p>
                    <p class="text-sm font-bold text-gray-900">Bursa Efek Indonesia & Sekuritas</p>
                </div>
                <div class="flex-1 flex flex-wrap justify-center md:justify-around items-center gap-12 opacity-50 grayscale hover:grayscale-0 transition-all duration-500">
                    <!-- Partner Logos (Placeholder with Text/Logos) -->
                    <span class="text-xl font-black text-blue-900 tracking-tighter">IDX</span>
                    <span class="text-xl font-black text-red-700 tracking-tighter">OJK</span>
                    <span class="text-xl font-black text-red-600 tracking-tighter">MNC <span class="text-gray-400">Sekuritas</span></span>
                    <span class="text-xl font-black text-blue-600 tracking-tighter">IndoPremier</span>
                    <span class="text-xl font-black text-indigo-900 tracking-tighter">PhillipCapital</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Visi & Misi Section -->
    <section class="max-w-360 mx-auto px-4 sm:px-8 lg:px-12 py-12">
        <div class="grid lg:grid-cols-2 gap-16">
            <div class="space-y-6">
                <div class="inline-block px-4 py-1.5 bg-[#F1E9FB] text-[#8A4BE2] rounded-lg text-xs font-bold uppercase tracking-widest">
                    Visi Kami
                </div>
                <h2 class="text-4xl font-extrabold text-gray-900 leading-tight">Menjadi Pusat <span class="text-[#8A4BE2]">Literasi Pasar Modal</span> Terdepan di Jawa Barat.</h2>
                <p class="text-lg text-gray-600 leading-relaxed">Gallery BEI IBI Kesatuan berkomitmen untuk menjembatani dunia pendidikan dengan industri pasar modal secara rill, menciptakan ekosistem belajar yang inklusif dan profesional bagi mahasiswa.</p>
            </div>
            <div class="grid sm:grid-cols-2 gap-8">
                <div class="p-8 bg-gray-50 rounded-3xl border border-gray-100">
                    <div class="w-12 h-12 bg-white rounded-xl shadow-sm flex items-center justify-center text-blue-600 mb-6">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                    </div>
                    <h4 class="text-xl font-bold text-gray-900 mb-3">Edukasi Mandiri</h4>
                    <p class="text-sm text-gray-500 leading-relaxed">Memberikan pemahaman mendalam tentang instrumen pasar modal secara berkelanjutan.</p>
                </div>
                <div class="p-8 bg-gray-50 rounded-3xl border border-gray-100">
                    <div class="w-12 h-12 bg-white rounded-xl shadow-sm flex items-center justify-center text-blue-600 mb-6">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                    </div>
                    <h4 class="text-xl font-bold text-gray-900 mb-3">Kolaborasi Industri</h4>
                    <p class="text-sm text-gray-500 leading-relaxed">Membangun network antara mahasiswa dengan pakar finansial dan bursa efek.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Market Insights: Wide Ticker -->
    <section class="max-w-360 mx-auto px-4 sm:px-8 lg:px-12">
        <div class="bg-[#A67CE6] rounded-3xl p-1 flex items-center shadow-xl shadow-[#8A4BE2]/30 overflow-hidden">
            <div class="bg-[#8A4BE2] px-6 py-4 rounded-2xl font-black text-white text-xs tracking-widest uppercase shrink-0">
                Market_Live
            </div>
            <div class="flex-1 overflow-hidden">
                <div class="flex animate-marquee whitespace-nowrap gap-16 items-center">
                    @foreach([['IHSG', '7,245.32', '+0.45%', 'text-white'], ['BBCA', '10,450', '-1.2%', 'text-blue-200'], ['TLKM', '3,890', '+2.1%', 'text-white'], ['ASII', '5,125', '0.0%', 'text-blue-100'], ['GOTO', '88', '+4.5%', 'text-white'], ['BMRI', '6,750', '+1.1%', 'text-white']] as $stock)
                    <div class="flex items-center gap-3">
                        <span class="text-xs font-black text-white tracking-widest">{{ $stock[0] }}</span>
                        <span class="text-xs font-mono font-bold text-blue-200">{{ $stock[1] }}</span>
                        <span class="text-[10px] font-mono font-black {{ $stock[3] }}">{{ $stock[2] }}</span>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Why Invest & Steps Section -->
    <section class="bg-blue-50/30 py-24">
        <div class="max-w-360 mx-auto px-4 sm:px-8 lg:px-12">
            <div class="grid lg:grid-cols-2 gap-24 items-start">
                <!-- Why Invest (Benefits) -->
                <div class="space-y-12">
                    <div class="space-y-4">
                        <h2 class="text-4xl font-extrabold text-gray-900 leading-tight">Kenapa Harus Mulai <span class="text-[#8A4BE2]">Investasi Sejak Mahasiswa?</span></h2>
                        <p class="text-lg text-gray-600">Waktu adalah aset terbesar Anda. Semakin cepat Anda mulai, semakin besar efek bunga majemuk yang Anda dapatkan.</p>
                    </div>
                    
                    <div class="grid gap-6">
                        <div class="flex gap-6 p-6 bg-white rounded-3xl border border-blue-100 shadow-sm">
                            <div class="w-12 h-12 bg-[#8A4BE2] text-white rounded-2xl flex items-center justify-center shrink-0">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                            </div>
                            <div>
                                <h4 class="text-lg font-bold text-gray-900 mb-1">Melawan Inflasi</h4>
                                <p class="text-sm text-gray-500 leading-relaxed">Menjaga nilai uang Anda agar tidak tergerus kenaikan harga barang di masa depan.</p>
                            </div>
                        </div>
                        <div class="flex gap-6 p-6 bg-white rounded-3xl border border-blue-100 shadow-sm">
                            <div class="w-12 h-12 bg-[#8A4BE2] text-white rounded-2xl flex items-center justify-center shrink-0">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            </div>
                            <div>
                                <h4 class="text-lg font-bold text-gray-900 mb-1">Financial Freedom</h4>
                                <p class="text-sm text-gray-500 leading-relaxed">Membangun kebiasaan finansial yang sehat untuk kemandirian keuangan jangka panjang.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Steps (Panduan) with Step-by-Step Animation -->
                <div class="bg-white rounded-[3rem] p-12 shadow-2xl shadow-blue-600/5 border border-gray-100 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-[#F1E9FB] rounded-full blur-3xl -translate-y-1/2 translate-x-1/2"></div>
                    <div class="relative z-10 space-y-10">
                        <div class="text-center pb-8 border-b border-gray-50">
                            <h3 class="text-2xl font-extrabold text-gray-900">4 Langkah Mudah Mulai</h3>
                            <p class="text-sm text-gray-500 mt-2 tracking-wide uppercase font-bold">Trading Floor Access Guide</p>
                        </div>
                        
                        <div class="space-y-8 relative">
                            <!-- Progress Line -->
                            <div class="absolute left-5 top-5 bottom-5 w-0.5 bg-gray-100"></div>
                            
                            <!-- Step 1 -->
                            <div class="flex gap-6 items-start relative step-animation" style="--step-delay: 0s">
                                <div class="w-10 h-10 bg-white border-2 border-[#8A4BE2] text-[#8A4BE2] rounded-full flex items-center justify-center font-black shrink-0 relative z-10 step-circle transition-all duration-500">1</div>
                                <div class="pt-1">
                                    <h5 class="font-bold text-gray-900 step-title transition-all duration-500">Registrasi Kelas</h5>
                                    <p class="text-xs text-gray-500 leading-relaxed mt-1">Daftar Sekolah Pasar Modal (SPM) untuk mendapatkan basic knowledge.</p>
                                </div>
                            </div>
                            
                            <!-- Step 2 -->
                            <div class="flex gap-6 items-start relative step-animation" style="--step-delay: 2s">
                                <div class="w-10 h-10 bg-white border-2 border-[#8A4BE2] text-[#8A4BE2] rounded-full flex items-center justify-center font-black shrink-0 relative z-10 step-circle transition-all duration-500">2</div>
                                <div class="pt-1">
                                    <h5 class="font-bold text-gray-900 step-title transition-all duration-500">Buka Rekening RDN</h5>
                                    <p class="text-xs text-gray-500 leading-relaxed mt-1">Siapkan KTP dan KTM untuk pembukaan akun trading melalui partner resmi.</p>
                                </div>
                            </div>
                            
                            <!-- Step 3 -->
                            <div class="flex gap-6 items-start relative step-animation" style="--step-delay: 4s">
                                <div class="w-10 h-10 bg-white border-2 border-[#8A4BE2] text-[#8A4BE2] rounded-full flex items-center justify-center font-black shrink-0 relative z-10 step-circle transition-all duration-500">3</div>
                                <div class="pt-1">
                                    <h5 class="font-bold text-gray-900 step-title transition-all duration-500">Deposit Modal Awal</h5>
                                    <p class="text-xs text-gray-500 leading-relaxed mt-1">Cukup dengan Rp 100.000, Anda sudah bisa mulai beli saham perdana Anda.</p>
                                </div>
                            </div>
                            
                            <!-- Step 4 -->
                            <div class="flex gap-6 items-start relative step-animation" style="--step-delay: 6s">
                                <div class="w-10 h-10 bg-white border-2 border-[#8A4BE2] text-[#8A4BE2] rounded-full flex items-center justify-center font-black shrink-0 relative z-10 step-circle transition-all duration-500">4</div>
                                <div class="pt-1">
                                    <h5 class="font-bold text-gray-900 step-title transition-all duration-500">Mulai Trading</h5>
                                    <p class="text-xs text-gray-500 leading-relaxed mt-1">Gunakan aplikasi dari partner sekuritas untuk bertransaksi secara rill!</p>
                                </div>
                            </div>
                        </div>
                        
                        <a href="#daftar" class="block w-full text-center py-4 bg-gray-900 text-white font-bold rounded-2xl hover:bg-gray-800 transition-colors mt-8">
                            Daftar Sekarang
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Academy Section: Wide Grid -->
    <section id="edukasi" class="max-w-360 mx-auto px-4 sm:px-8 lg:px-12">
        <div class="flex items-center justify-between mb-16">
            <div class="text-center flex-1">
                <h2 class="text-4xl font-extrabold text-gray-900 tracking-tight">Investment Academy</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto mt-4">Kami merancang kurikulum yang mudah dipahami bagi siapa saja yang ingin memulai perjalanan investasi mereka.</p>
            </div>
            <a href="{{ route('bei.educations') }}" class="hidden sm:inline-flex items-center text-sm font-bold text-[#8A4BE2] hover:text-[#7A3BD6] transition-colors whitespace-nowrap ml-4">
                Lihat Semua
                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </a>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            @php
            $eduIcons = [
                '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>',
                '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>',
                '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>',
                '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>',
                '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>',
                '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"/>',
            ];
            @endphp
            @forelse($educations as $index => $education)
            <div class="bg-white border border-gray-100 rounded-3xl overflow-hidden hover:shadow-xl hover:shadow-purple-600/10 transition-all group flex flex-col">
                <!-- Header gradient dengan judul di dalamnya -->
                <div class="relative p-8 min-h-[200px] flex flex-col justify-between" style="background: linear-gradient(135deg, #9333ea, #2563eb);">
                    <!-- Number badge -->
                    <div class="self-end">
                        <span class="bg-white/25 text-white text-xs font-bold px-2.5 py-1 rounded-full">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                    </div>
                    <!-- Icon & Title -->
                    <div>
                        <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center mb-4">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                {!! $eduIcons[$index % count($eduIcons)] !!}
                            </svg>
                        </div>
                        <h3 class="text-white font-bold text-lg leading-tight line-clamp-2">
                            {{ $education->title }}
                        </h3>
                    </div>
                </div>
                <!-- Body -->
                <div class="p-6 flex flex-col flex-1 min-h-[180px]">
                    <p class="text-gray-600 leading-relaxed text-sm flex-1 line-clamp-4 mb-5">
                        {{ Str::limit(strip_tags($education->content), 120) ?: 'Klik untuk membaca materi selengkapnya.' }}
                    </p>
                    <a href="{{ route('bei.educations.detail', $education) }}" 
                        class="inline-flex items-center text-[#8A4BE2] font-bold text-sm gap-1 hover:gap-2 transition-all self-start">
                        Selengkapnya
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
            </div>
            @empty
            <div class="col-span-3 text-center py-12">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                </svg>
                <p class="mt-2 text-sm text-gray-500">Belum ada materi edukasi tersedia</p>
            </div>
            @endforelse
        </div>
    </section>

    <section class="bg-gray-50 py-24">
        <div class="max-w-360 mx-auto px-4 sm:px-8 lg:px-12">
            <div class="flex items-center justify-between mb-12">
                <div>
                    <h2 class="text-3xl font-extrabold text-gray-900">Galeri Kegiatan</h2>
                    <p class="text-gray-600 mt-1">Dokumentasi perjalanan literasi keuangan mahasiswa IBI.</p>
                </div>
                <a href="{{ route('bei.gallery') }}" class="text-[#8A4BE2] font-black text-sm uppercase tracking-widest hover:text-[#7A3BD6] transition-colors">Lihat Semua</a>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                @forelse($galleries as $gallery)
                <div class="aspect-square rounded-3xl overflow-hidden bg-gray-200 shadow-md hover:shadow-xl transition-shadow group">
                    @if($gallery->image_path)
                        <img src="{{ $gallery->image_url }}" alt="{{ $gallery->title }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    @else
                        <div class="w-full h-full flex items-center justify-center bg-linear-to-br from-purple-400 to-blue-600">
                            <svg class="w-12 h-12 text-white opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                    @endif
                </div>
                @empty
                <div class="col-span-4 text-center py-12">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    <p class="mt-2 text-sm text-gray-500">Belum ada foto galeri tersedia</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Investment Simulator Section: Light Theme -->
    <section class="max-w-360 mx-auto px-4 sm:px-8 lg:px-12 py-24">
        <div class="bg-white border-2 border-blue-50 rounded-[3.5rem] p-12 lg:p-20 overflow-hidden relative shadow-2xl shadow-[#8A4BE2]/10">
            <div class="absolute top-0 right-0 w-full h-full opacity-[0.03]" style="background-image: radial-gradient(circle at 2px 2px, #2563eb 1px, transparent 0); background-size: 32px 32px;"></div>
            
            <div class="relative z-10 grid lg:grid-cols-2 gap-20 items-center">
                <div class="space-y-10">
                    <div class="space-y-4">
                        <div class="inline-flex items-center gap-2 px-4 py-2 bg-[#F1E9FB] text-[#8A4BE2] rounded-xl text-xs font-black uppercase tracking-widest">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                            Profit Simulator
                        </div>
                        <h2 class="text-5xl font-extrabold text-gray-900 leading-tight">Simulasi Masa <br/><span class="text-[#8A4BE2]">Depan Finansialmu</span></h2>
                        <p class="text-gray-500 text-lg leading-relaxed">Lihat bagaimana investasi kecil yang rutin bisa tumbuh besar melalui efek <span class="font-bold text-gray-900 italic">compounding magic</span>.</p>
                    </div>
                    
                    <div class="space-y-6">
                        <div class="grid sm:grid-cols-2 gap-6">
                            <div class="space-y-3">
                                <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest pl-1">Modal Awal (Rp)</label>
                                <input type="number" id="calc-initial" value="1000000" class="w-full bg-gray-50 border-2 border-gray-100 rounded-2xl px-6 py-4 text-gray-900 font-bold text-xl outline-hidden focus:border-blue-600 focus:bg-white transition-all">
                            </div>
                            <div class="space-y-3">
                                <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest pl-1">Durasi (Tahun)</label>
                                <input type="number" id="calc-year" value="10" class="w-full bg-gray-50 border-2 border-gray-100 rounded-2xl px-6 py-4 text-gray-900 font-bold text-xl outline-hidden focus:border-blue-600 focus:bg-white transition-all">
                            </div>
                        </div>
                        <button onclick="calculateInvestment()" class="w-full bg-[#8A4BE2] hover:bg-[#7A3BD6] text-white font-black py-5 rounded-2xl shadow-xl shadow-[#8A4BE2]/30 transition-all transform active:scale-95 text-lg">Hitung Pertumbuhan</button>
                    </div>
                </div>

                <div class="relative">
                    <!-- Decorative Circles -->
                    <div class="absolute -top-12 -right-12 w-64 h-64 bg-blue-100/50 rounded-full blur-3xl opacity-50"></div>
                    
                    <div class="relative z-10 bg-white rounded-[3rem] p-12 border border-blue-50 text-center space-y-8 shadow-2xl shadow-[#8A4BE2]/15">
                        <div class="space-y-2">
                            <p class="text-[10px] font-black text-[#8A4BE2] uppercase tracking-[0.2em]">Estimated Result</p>
                            <p id="calc-result" class="text-4xl lg:text-6xl font-black text-gray-900 tracking-tighter transition-all">Rp 2,593,742</p>
                        </div>
                        
                        <div class="flex items-center justify-center gap-4">
                            <span class="h-px w-8 bg-gray-100"></span>
                            <p id="calc-desc" class="text-gray-400 font-bold uppercase text-[9px] tracking-widest">Growth 10% per tahun</p>
                            <span class="h-px w-8 bg-gray-100"></span>
                        </div>

                        <div class="grid grid-cols-2 gap-4 pt-4">
                            <div class="bg-blue-50/50 rounded-2xl p-6">
                                <p class="text-[9px] text-[#8A4BE2] font-black uppercase tracking-widest mb-1">Total Return</p>
                                <p id="calc-return" class="text-2xl font-black text-gray-900">159%</p>
                            </div>
                            <div class="bg-gray-50 rounded-2xl p-6">
                                <p class="text-[9px] text-gray-400 font-black uppercase tracking-widest mb-1">Strategy</p>
                                <p class="text-2xl font-black text-gray-900">Majemuk</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Refined Social Proof & KSPM Section -->
    <section class="max-w-360 mx-auto px-4 sm:px-8 lg:px-12 py-12">
        <div class="grid lg:grid-cols-4 gap-8">
            <!-- KSPM Card: Enhanced Branding -->
            <div class="lg:col-span-1 bg-[#8A4BE2] rounded-[3rem] p-10 text-white flex flex-col justify-between relative overflow-hidden shadow-2xl shadow-[#8A4BE2]/20 group">
                <div class="absolute inset-0 bg-linear-to-br from-white/10 to-transparent"></div>
                <div class="relative space-y-10">
                    <div class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center text-[#8A4BE2] shadow-xl shadow-black/10">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <div>
                        <h3 class="text-3xl font-black leading-none tracking-tighter uppercase mb-2">Testimonial <br/>IBI Bogor</h3>
                        <p class="text-blue-100 text-sm font-medium leading-relaxed opacity-90">Organisasi resmi penggerak literasi finansial di Institut Bisnis dan Informatika Kesatuan.</p>
                    </div>
                </div>
                <div class="relative mt-20 pt-8 border-t border-white/20">
                    <div class="flex items-center gap-3">
                        <div class="flex -space-x-3">
                            <div class="w-8 h-8 rounded-full bg-blue-400 border-2 border-blue-600 flex items-center justify-center text-[8px] font-black">ST</div>
                            <div class="w-8 h-8 rounded-full bg-blue-300 border-2 border-blue-600 flex items-center justify-center text-[8px] font-black">RD</div>
                            <div class="w-8 h-8 rounded-full bg-blue-200 border-2 border-blue-600 flex items-center justify-center text-[8px] font-black">AM</div>
                        </div>
                        <p class="text-[10px] font-black uppercase tracking-widest text-blue-100 italic">40+ Active Members</p>
                    </div>
                </div>
            </div>

            <!-- Testimonial Cards: Premium Floating Layout -->
            <div class="lg:col-span-3 grid md:grid-cols-2 gap-8">
                <!-- Testi 1 -->
                <div class="bg-white border-2 border-gray-50 p-10 rounded-[3rem] flex flex-col justify-between shadow-2xl shadow-gray-200/20 hover:border-[#8A4BE2]/10 hover:shadow-2xl hover:shadow-[#8A4BE2]/10 transition-all relative overflow-hidden">
                    <div class="absolute top-0 right-0 p-8 opacity-5">
                        <svg class="w-20 h-20" fill="currentColor" viewBox="0 0 24 24"><path d="M14.017 21L14.017 18C14.017 16.895 14.912 16 16.017 16H19.017V14C19.017 11.791 17.226 10 15.017 10H14.017V7H15.017C18.883 7 22.017 10.134 22.017 14V21H14.017ZM3.017 21L3.017 18C3.017 16.895 3.912 16 5.017 16H8.017V14C8.017 11.791 6.226 10 4.017 10H3.017V7H4.017C7.883 7 11.017 10.134 11.017 14V21H3.017Z"/></svg>
                    </div>
                    <div class="relative space-y-6">
                        <p class="text-xl font-bold text-gray-800 leading-relaxed">"Program di Gallery BEI Bogor sangat membantu, dari tidak tahu apa-apa jadi berani terjun langsung ke pasar saham."</p>
                        <div class="flex items-center gap-4">
                            <div class="w-14 h-14 bg-linear-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center text-white font-black shadow-lg shadow-blue-600/20">MA</div>
                            <div>
                                <p class="text-lg font-black text-gray-900 leading-none">Muhammad Algi</p>
                                <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mt-1">S1 Akuntansi 2024</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Testi 2 -->
                <div class="bg-white border-2 border-gray-50 p-10 rounded-[3rem] flex flex-col justify-between shadow-2xl shadow-gray-200/20 hover:border-[#8A4BE2]/10 hover:shadow-2xl hover:shadow-[#8A4BE2]/10 transition-all relative overflow-hidden">
                    <div class="absolute top-0 right-0 p-8 opacity-5">
                        <svg class="w-20 h-20" fill="currentColor" viewBox="0 0 24 24"><path d="M14.017 21L14.017 18C14.017 16.895 14.912 16 16.017 16H19.017V14C19.017 11.791 17.226 10 15.017 10H14.017V7H15.017C18.883 7 22.017 10.134 22.017 14V21H14.017ZM3.017 21L3.017 18C3.017 16.895 3.912 16 5.017 16H8.017V14C8.017 11.791 6.226 10 4.017 10H3.017V7H4.017C7.883 7 11.017 10.134 11.017 14V21H3.017Z"/></svg>
                    </div>
                    <div class="relative space-y-6">
                        <p class="text-xl font-bold text-gray-800 leading-relaxed">"Trading floor-nya real-time dan sangat informatif. Seminar yang diadakan selalu menghadirkan pembicara ahli."</p>
                        <div class="flex items-center gap-4">
                            <div class="w-14 h-14 bg-linear-to-br from-green-500 to-green-600 rounded-2xl flex items-center justify-center text-white font-black shadow-lg shadow-green-600/20">SN</div>
                            <div>
                                <p class="text-lg font-black text-gray-900 leading-none">Siti Nurhaliza</p>
                                <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mt-1">S1 Manajemen 2025</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Registration & Contact: Wide Section -->
    <section id="daftar" class="max-w-360 mx-auto px-4 sm:px-8 lg:px-12">
        <div class="bg-[#D7C2F5] border-2 border-blue-50 rounded-[3rem] overflow-hidden shadow-2xl shadow-blue-600/5">
            <div class="grid lg:grid-cols-2">
                <div class="p-12 lg:p-20 bg-[#8A4BE2] text-white space-y-8 flex flex-col justify-center">
                    <h2 class="text-4xl font-extrabold leading-[1.1]">Siap Mulai Perjalanan <br/>Investasimu?</h2>
                    <p class="text-blue-100 text-lg leading-relaxed">Daftarkan diri Anda untuk mengikuti seminar atau workshop terdekat. Kursi terbatas untuk setiap sesi.</p>
                    
                    <div class="space-y-6">
                        <div class="flex items-center gap-4 bg-white/10 p-4 rounded-2xl border border-white/10 backdrop-blur-md">
                            <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"/></svg>
                            </div>
                            <div>
                                <p class="text-sm font-bold">Butuh Bantuan?</p>
                                <p class="text-xs text-blue-100">Hubungi kami via email: bei@ibik.ac.id</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="p-12 lg:p-20 bg-[#F1E9FB]">
                    @if(session('success'))
                        <div class="mb-8 rounded-2xl border border-green-200 bg-green-50 p-4 flex items-center gap-3 text-green-700 font-bold text-sm">
                            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                            {{ session('success') }}
                        </div>
                    @endif
                    @if(session('error'))
                        <div class="mb-8 rounded-2xl border border-red-200 bg-red-50 p-4 flex items-center gap-3 text-red-700 font-bold text-sm">
                            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            {{ session('error') }}
                        </div>
                    @endif

                    @if($openEvents->isEmpty())
                        <div class="text-center py-8">
                            <svg class="w-12 h-12 mx-auto text-purple-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            <p class="font-bold text-gray-700">Belum ada event yang membuka pendaftaran.</p>
                            <p class="text-sm text-gray-500 mt-1">Pantau terus halaman ini!</p>
                        </div>
                    @else
                    <form method="POST" action="{{ route('bei.registration.submit') }}" class="space-y-4">
                        @csrf
                        <div>
                            <label class="block text-xs font-bold text-gray-400 tracking-widest uppercase mb-2">Nama Lengkap</label>
                            <input name="name" value="{{ old('name') }}" required
                                class="w-full bg-white border-2 border-gray-200 rounded-xl px-4 py-3 font-semibold text-gray-900 focus:border-[#8A4BE2] focus:outline-none transition-all"
                                type="text" placeholder="Masukkan nama lengkap">
                        </div>

                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <label class="block text-xs font-bold text-gray-400 tracking-widest uppercase mb-2">NIM (Opsional)</label>
                                <input name="nim" value="{{ old('nim') }}"
                                    class="w-full bg-white border-2 border-gray-200 rounded-xl px-4 py-3 font-semibold text-gray-900 focus:border-[#8A4BE2] focus:outline-none transition-all"
                                    type="text" placeholder="Nomor Induk Mahasiswa">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-gray-400 tracking-widest uppercase mb-2">No. Telepon</label>
                                <input name="phone" value="{{ old('phone') }}"
                                    class="w-full bg-white border-2 border-gray-200 rounded-xl px-4 py-3 font-semibold text-gray-900 focus:border-[#8A4BE2] focus:outline-none transition-all"
                                    type="tel" placeholder="08xxxxxxxxxx">
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-400 tracking-widest uppercase mb-2">Email</label>
                            <input name="email" value="{{ old('email') }}" required
                                class="w-full bg-white border-2 border-gray-200 rounded-xl px-4 py-3 font-semibold text-gray-900 focus:border-[#8A4BE2] focus:outline-none transition-all"
                                type="email" placeholder="nama@email.com">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-400 tracking-widest uppercase mb-2">Pilih Event</label>
                            <select name="event_id" required
                                class="w-full bg-white border-2 border-gray-200 rounded-xl px-4 py-3 font-semibold text-gray-900 focus:border-[#8A4BE2] focus:outline-none transition-all appearance-none">
                                <option value="">-- Pilih Event --</option>
                                @foreach($openEvents as $ev)
                                <option value="{{ $ev->id }}" {{ old('event_id') == $ev->id ? 'selected' : '' }}>
                                    {{ $ev->title }}{{ $ev->starts_at ? ' — ' . $ev->starts_at->format('d M Y') : '' }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="pt-2">
                            <button type="submit" class="bg-[#8A4BE2] hover:bg-[#7A3BD6] text-white font-bold px-8 py-3 rounded-xl shadow-lg shadow-[#8A4BE2]/30 transition-all active:scale-95 inline-flex items-center gap-2 text-sm">
                                Kirim Pendaftaran
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                            </button>
                        </div>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </section>
</div>

<style>
@keyframes stepHighlight {
    0%, 25% { 
        transform: scale(1.1);
        background-color: #8A4BE2;
        color: white;
        box-shadow: 0 0 20px rgba(138,75,226,0.4);
    }
    100% {
        transform: scale(1);
        background-color: white;
        color: #8A4BE2;
        box-shadow: none;
    }
}

@keyframes textHighlight {
    0%, 25% { color: #8A4BE2; transform: translateX(5px); }
    100% { color: #111827; transform: translateX(0); }
}

.step-animation .step-circle {
    animation: stepHighlight 8s infinite;
    animation-delay: var(--step-delay);
}

.step-animation .step-title {
    animation: textHighlight 8s infinite;
    animation-delay: var(--step-delay);
}

@keyframes marquee {
    0% { transform: translateX(0); }
    100% { transform: translateX(-50%); }
}
.animate-marquee {
    display: inline-flex;
    animation: marquee 30s linear infinite;
}
.animate-marquee:hover {
    animation-play-state: paused;
}
</style>

<script>
// Real-time Investment Calculator
function calculateInvestment() {
    const initial = parseFloat(document.getElementById('calc-initial').value) || 0;
    const years = parseFloat(document.getElementById('calc-year').value) || 0;
    const rate = 0.10; // 10% per tahun

    // Compound interest formula: FV = PV * (1 + r)^n
    const futureValue = initial * Math.pow(1 + rate, years);
    const totalReturn = ((futureValue - initial) / initial * 100).toFixed(0);

    // Format currency
    const formatted = new Intl.NumberFormat('id-ID').format(Math.round(futureValue));

    // Update UI
    document.getElementById('calc-result').textContent = 'Rp ' + formatted;
    document.getElementById('calc-desc').textContent = `Growth ${(rate * 100)}% per tahun`;
    document.getElementById('calc-return').textContent = totalReturn + '%';
}

// Real-time calculation on input
document.addEventListener('DOMContentLoaded', function() {
    const initialInput = document.getElementById('calc-initial');
    const yearInput = document.getElementById('calc-year');

    if (initialInput && yearInput) {
        // Calculate on page load
        calculateInvestment();

        // Real-time update on input
        initialInput.addEventListener('input', calculateInvestment);
        yearInput.addEventListener('input', calculateInvestment);
    }
});
</script>
@endsection
