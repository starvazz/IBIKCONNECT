<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Panel') - IBI Connect</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="icon" href="{{ asset('Favicon.png') }}" type="image/png">
    <link rel="shortcut icon" href="{{ asset('Favicon.png') }}" type="image/png">
    <link rel="apple-touch-icon" href="{{ asset('Favicon.png') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .sidebar-collapsed #sidebar-content { width: 4rem; }
        .sidebar-collapsed .sidebar-text { display: none; }
        .sidebar-collapsed .sidebar-icon { margin-right: 0; }
        .sidebar-collapsed .sidebar-logo { margin-left: 0; }
    </style>
</head>
<body class="min-h-screen bg-gray-50 antialiased">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <aside id="sidebar" class="hidden lg:flex lg:shrink-0 transition-all duration-300 ease-in-out">
            <div id="sidebar-content" class="flex flex-col w-64 bg-white border-r border-gray-200 transition-all duration-300">
                <!-- Logo -->
                <div class="flex items-center justify-center h-16 px-4 border-b border-gray-200">
                    <img src="{{ asset('LOGO_IBIK.png') }}" alt="IBI" class="h-10 sidebar-logo">
                    <span class="ml-2 text-lg font-bold text-gray-900 sidebar-text">Admin Panel</span>
                </div>

                <!-- Navigation -->
                <nav class="flex-1 px-3 py-4 space-y-1 overflow-y-auto">
                    <!-- Overview Menu -->
                    <a href="{{ route('admin.overview') }}" class="flex items-center px-3 py-2 text-sm font-medium rounded-lg {{ request()->routeIs('admin.overview') ? 'bg-[#8A4BE2] text-white' : 'text-gray-700 hover:bg-gray-100' }}" title="Overview">
                        <svg class="w-5 h-5 sidebar-icon mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h4a1 1 0 011 1v7a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM14 5a1 1 0 011-1h4a1 1 0 011 1v7a1 1 0 01-1 1h-4a1 1 0 01-1-1V5zM4 16a1 1 0 011-1h4a1 1 0 011 1v3a1 1 0 01-1 1H5a1 1 0 01-1-1v-3zM14 16a1 1 0 011-1h4a1 1 0 011 1v3a1 1 0 01-1 1h-4a1 1 0 01-1-1v-3z"/>
                        </svg>
                        <span class="sidebar-text">Overview</span>
                    </a>

                    @if(auth()->user()->isCdcAdmin())
                    <div class="mb-4">
                        <p class="px-3 text-xs font-semibold text-gray-400 uppercase tracking-wider sidebar-text">CDC Management</p>
                        <a href="{{ route('admin.cdc.dashboard') }}" class="flex items-center px-3 py-2 mt-2 text-sm font-medium rounded-lg {{ request()->routeIs('admin.cdc.dashboard') ? 'bg-[#8A4BE2] text-white' : 'text-gray-700 hover:bg-gray-100' }}" title="Dashboard">
                            <svg class="w-5 h-5 sidebar-icon mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                            </svg>
                            <span class="sidebar-text">Dashboard</span>
                        </a>
                        <a href="{{ route('admin.cdc.jobs.index') }}" class="flex items-center px-3 py-2 mt-1 text-sm font-medium rounded-lg {{ request()->routeIs('admin.cdc.jobs.*') ? 'bg-[#8A4BE2] text-white' : 'text-gray-700 hover:bg-gray-100' }}" title="Lowongan Kerja">
                            <svg class="w-5 h-5 sidebar-icon mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            <span class="sidebar-text">Lowongan Kerja</span>
                        </a>
                        <a href="{{ route('admin.cdc.events.index') }}" class="flex items-center px-3 py-2 mt-1 text-sm font-medium rounded-lg {{ request()->routeIs('admin.cdc.events.*') ? 'bg-[#8A4BE2] text-white' : 'text-gray-700 hover:bg-gray-100' }}" title="Event & Agenda">
                            <svg class="w-5 h-5 sidebar-icon mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            <span class="sidebar-text">Event & Agenda</span>
                        </a>
                        <a href="{{ route('admin.cdc.news.index') }}" class="flex items-center px-3 py-2 mt-1 text-sm font-medium rounded-lg {{ request()->routeIs('admin.cdc.news.*') ? 'bg-[#8A4BE2] text-white' : 'text-gray-700 hover:bg-gray-100' }}" title="Berita">
                            <svg class="w-5 h-5 sidebar-icon mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                            </svg>
                            <span class="sidebar-text">Berita</span>
                        </a>
                    </div>
                    @endif

                    @if(auth()->user()->isBeiAdmin())
                    <div class="mb-4">
                        <p class="px-3 text-xs font-semibold text-gray-400 uppercase tracking-wider sidebar-text">BEI Management</p>
                        <a href="{{ route('admin.bei.dashboard') }}" class="flex items-center px-3 py-2 mt-2 text-sm font-medium rounded-lg {{ request()->routeIs('admin.bei.dashboard') ? 'bg-[#8A4BE2] text-white' : 'text-gray-700 hover:bg-gray-100' }}" title="Dashboard">
                            <svg class="w-5 h-5 sidebar-icon mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                            </svg>
                            <span class="sidebar-text">Dashboard</span>
                        </a>
                        <a href="{{ route('admin.bei.events.index') }}" class="flex items-center px-3 py-2 mt-1 text-sm font-medium rounded-lg {{ request()->routeIs('admin.bei.events.*') ? 'bg-[#8A4BE2] text-white' : 'text-gray-700 hover:bg-gray-100' }}" title="Event">
                            <svg class="w-5 h-5 sidebar-icon mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            <span class="sidebar-text">Event</span>
                        </a>
                        <a href="{{ route('admin.bei.educations.index') }}" class="flex items-center px-3 py-2 mt-1 text-sm font-medium rounded-lg {{ request()->routeIs('admin.bei.educations.*') ? 'bg-[#8A4BE2] text-white' : 'text-gray-700 hover:bg-gray-100' }}" title="Edukasi">
                            <svg class="w-5 h-5 sidebar-icon mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                            </svg>
                            <span class="sidebar-text">Edukasi</span>
                        </a>
                        <a href="{{ route('admin.bei.galleries.index') }}" class="flex items-center px-3 py-2 mt-1 text-sm font-medium rounded-lg {{ request()->routeIs('admin.bei.galleries.*') ? 'bg-[#8A4BE2] text-white' : 'text-gray-700 hover:bg-gray-100' }}" title="Galeri">
                            <svg class="w-5 h-5 sidebar-icon mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            <span class="sidebar-text">Galeri</span>
                        </a>
                        <a href="{{ route('admin.bei.registrations.index') }}" class="flex items-center px-3 py-2 mt-1 text-sm font-medium rounded-lg {{ request()->routeIs('admin.bei.registrations.*') ? 'bg-[#8A4BE2] text-white' : 'text-gray-700 hover:bg-gray-100' }}" title="Member Registrations">
                            <svg class="w-5 h-5 sidebar-icon mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
                            </svg>
                            <span class="sidebar-text">Pendaftaran</span>
                        </a>
                    </div>
                    @endif

                    @if(auth()->user()->isSuperAdmin())
                    <div class="mb-4">
                        <p class="px-3 text-xs font-semibold text-gray-400 uppercase tracking-wider sidebar-text">System</p>
                        <a href="{{ route('admin.users.index') }}" class="flex items-center px-3 py-2 mt-2 text-sm font-medium rounded-lg {{ request()->routeIs('admin.users.*') ? 'bg-[#8A4BE2] text-white' : 'text-gray-700 hover:bg-gray-100' }}" title="User Management">
                            <svg class="w-5 h-5 sidebar-icon mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                            </svg>
                            <span class="sidebar-text">User Management</span>
                        </a>
                    </div>
                    @endif
                </nav>

                <!-- User Menu -->
                <div class="shrink-0 p-4 border-t border-gray-200">
                    <div class="flex items-center">
                        <div class="shrink-0">
                            <div class="w-10 h-10 rounded-full bg-[#8A4BE2] flex items-center justify-center text-white font-bold">
                                {{ substr(auth()->user()->name, 0, 1) }}
                            </div>
                        </div>
                        <div class="ml-3 flex-1 sidebar-text overflow-hidden">
                            <p class="text-sm font-medium text-gray-900 truncate">{{ auth()->user()->name }}</p>
                            <p class="text-xs text-gray-500 truncate">{{ ucfirst(str_replace('_', ' ', auth()->user()->role)) }}</p>
                        </div>
                        <form method="POST" action="{{ route('logout') }}" id="logout-form">
                            @csrf
                            <button type="button" onclick="confirmLogout()" class="text-gray-400 hover:text-gray-600 ml-2" title="Logout">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex flex-col flex-1 overflow-hidden">
            <!-- Top Bar -->
            <header class="flex items-center justify-between h-16 px-6 bg-white border-b border-gray-200">
                <div class="flex items-center">
                    <!-- Sidebar Toggle Button -->
                    <button id="sidebar-toggle" class="hidden lg:block text-gray-500 hover:text-gray-700 mr-4 transition-colors" title="Toggle Sidebar">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                    <h1 class="text-xl font-semibold text-gray-900">@yield('page-title', 'Dashboard')</h1>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('home') }}" target="_blank" class="text-sm text-gray-600 hover:text-gray-900 transition-colors">
                        <svg class="w-5 h-5 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                        </svg>
                        Lihat Website
                    </a>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 overflow-y-auto bg-gray-50">
                <div class="px-6 py-8">
                    <!-- Flash Messages -->
                    @if(session('success'))
                    <div class="mb-6 rounded-lg border border-green-200 bg-green-50 p-4 flex items-center">
                        <svg class="w-5 h-5 text-green-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <p class="text-sm font-medium text-green-800">{{ session('success') }}</p>
                    </div>
                    @endif

                    @if(session('error'))
                    <div class="mb-6 rounded-lg border border-red-200 bg-red-50 p-4 flex items-center">
                        <svg class="w-5 h-5 text-red-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <p class="text-sm font-medium text-red-800">{{ session('error') }}</p>
                    </div>
                    @endif

                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <script>
        // Logout Confirmation with SweetAlert2
        function confirmLogout() {
            Swal.fire({
                title: 'Konfirmasi Logout',
                html: 'Apakah Anda yakin ingin keluar dari admin panel?<br><small class="text-gray-500">Anda perlu login kembali untuk mengakses halaman ini.</small>',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc2626',
                cancelButtonColor: '#6b7280',
                confirmButtonText: '<i class="fas fa-sign-out-alt"></i> Ya, Logout',
                cancelButtonText: 'Batal',
                reverseButtons: true,
                customClass: {
                    popup: 'rounded-2xl',
                    title: 'text-xl font-bold',
                    confirmButton: 'rounded-lg px-5 py-2.5 font-medium',
                    cancelButton: 'rounded-lg px-5 py-2.5 font-medium'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('logout-form').submit();
                }
            });
        }

        // Sidebar Toggle
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('sidebar');
            const toggleBtn = document.getElementById('sidebar-toggle');
            
            // Load saved state
            const isCollapsed = localStorage.getItem('sidebarCollapsed') === 'true';
            if (isCollapsed) {
                sidebar.classList.add('sidebar-collapsed');
            }
            
            toggleBtn.addEventListener('click', function() {
                sidebar.classList.toggle('sidebar-collapsed');
                const collapsed = sidebar.classList.contains('sidebar-collapsed');
                localStorage.setItem('sidebarCollapsed', collapsed);
            });
        });
    </script>
</body>
</html>
