@extends('layouts.admin')

@section('title', 'Kelola Event CDC')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Kelola Event CDC</h1>
            <p class="text-gray-600 mt-1">Kelola event dan workshop untuk mahasiswa</p>
        </div>
        <a href="{{ route('admin.cdc.events.create') }}" 
            class="px-4 py-2.5 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Tambah Event
        </a>
    </div>

    <!-- Filters -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4">
        <form method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div>
                <input type="text" name="search" value="{{ $filters['search'] ?? '' }}" 
                    placeholder="Cari event..." 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>
            <div>
                <select name="is_published" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option value="">Semua Status</option>
                    <option value="1" {{ ($filters['is_published'] ?? '') === '1' ? 'selected' : '' }}>Published</option>
                    <option value="0" {{ ($filters['is_published'] ?? '') === '0' ? 'selected' : '' }}>Draft</option>
                </select>
            </div>
            <div>
                <select name="is_registration_open" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option value="">Semua Pendaftaran</option>
                    <option value="1" {{ ($filters['is_registration_open'] ?? '') === '1' ? 'selected' : '' }}>Buka</option>
                    <option value="0" {{ ($filters['is_registration_open'] ?? '') === '0' ? 'selected' : '' }}>Tutup</option>
                </select>
            </div>
            <div class="flex gap-2">
                <button type="submit" class="flex-1 px-4 py-2 bg-gray-900 text-white rounded-lg hover:bg-gray-800 transition-colors">
                    Filter
                </button>
                <a href="{{ route('admin.cdc.events.index') }}" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors">
                    Reset
                </a>
            </div>
        </form>
    </div>

    <!-- Events Table -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Event</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Lokasi</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Peserta</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($events as $event)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                @if($event->banner_image)
                                    <img src="{{ $event->banner_image_url }}" alt="{{ $event->title }}" 
                                        class="w-12 h-12 rounded object-cover">
                                @else
                                    <div class="w-12 h-12 bg-gray-200 rounded flex items-center justify-center">
                                        <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                @endif
                                <div>
                                    <div class="font-medium text-gray-900">{{ $event->title }}</div>
                                    @if($event->event_type)
                                        <div class="text-sm text-gray-500">{{ $event->event_type }}</div>
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-900">
                            {{ $event->start_date->format('d M Y') }}
                            @if($event->end_date)
                                <br><span class="text-gray-500">s/d {{ $event->end_date->format('d M Y') }}</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $event->location }}</td>
                        <td class="px-6 py-4 text-sm">
                            <div class="font-medium text-gray-900">{{ $event->registered_count }}</div>
                            @if($event->max_participants)
                                <div class="text-gray-500">/ {{ $event->max_participants }} max</div>
                            @else
                                <div class="text-gray-500">Unlimited</div>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex flex-col gap-1">
                                <form action="{{ route('admin.cdc.events.toggle-publish', $event) }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium w-full justify-center transition-colors
                                        {{ $event->is_published ? 'bg-green-100 text-green-800 hover:bg-green-200' : 'bg-gray-100 text-gray-800 hover:bg-gray-200' }}">
                                        {{ $event->is_published ? 'Published' : 'Draft' }}
                                    </button>
                                </form>
                                <form action="{{ route('admin.cdc.events.toggle-registration', $event) }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium w-full justify-center transition-colors
                                        {{ $event->is_registration_open ? 'bg-blue-100 text-blue-800 hover:bg-blue-200' : 'bg-red-100 text-red-800 hover:bg-red-200' }}">
                                        {{ $event->is_registration_open ? 'Buka' : 'Tutup' }}
                                    </button>
                                </form>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-right text-sm font-medium">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.cdc.events.registrations', $event) }}" 
                                    class="text-purple-600 hover:text-purple-900" title="Lihat Pendaftar">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                    </svg>
                                </a>
                                <a href="{{ route('admin.cdc.events.edit', $event) }}" 
                                    class="text-blue-600 hover:text-blue-900" title="Edit">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                </a>
                                <form id="delete-form-{{ $event->id }}" action="{{ route('admin.cdc.events.destroy', $event) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" onclick="openDeleteModal({{ $event->id }}, '{{ addslashes($event->title) }}')" class="p-2 rounded-full bg-red-50 text-red-600 hover:bg-red-100 hover:text-red-700 transition-colors" title="Hapus">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                            <svg class="w-12 h-12 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            <p class="text-lg font-medium">Belum ada event</p>
                            <p class="mt-1">Mulai dengan menambahkan event baru</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($events->hasPages())
        <div class="px-6 py-4 border-t border-gray-200">
            {{ $events->links() }}
        </div>
        @endif
    </div>
</div>
@endsection

<div id="deleteModal" class="hidden" role="dialog" aria-modal="true" style="position: fixed; inset: 0; z-index: 9999; display: none;">
    <div onclick="closeDeleteModal()" style="position: fixed; inset: 0; background: rgba(0,0,0,0.5);"></div>
    <div style="position: fixed; inset: 0; display: flex; align-items: center; justify-content: center; padding: 16px;">
        <div class="bg-white rounded-xl shadow-2xl p-5 sm:p-6 relative" style="width: 100%; max-width: 360px;">
            <h3 class="text-lg font-bold text-gray-900 mb-2">Hapus Event</h3>
            <p class="text-sm text-gray-600 mb-5 leading-relaxed">
                Yakin ingin menghapus "<span id="delete-event-title" class="font-semibold text-gray-800"></span>"?
                Data yang dihapus tidak bisa dikembalikan.
            </p>
            <div class="flex justify-end gap-3">
                <button type="button" onclick="closeDeleteModal()" class="px-3 py-2 border border-gray-300 rounded-md text-sm text-gray-700 font-medium hover:bg-gray-50 transition-colors">
                    Cancel
                </button>
                <button type="button" onclick="confirmDelete()" class="inline-flex items-center justify-center gap-1.5 px-3 py-2 bg-red-600 rounded-md text-sm text-white font-semibold shadow-sm hover:bg-red-700 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                    </svg>
                    Delete
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    let deleteFormId = null;

    function openDeleteModal(id, title) {
        deleteFormId = 'delete-form-' + id;
        document.getElementById('delete-event-title').textContent = title;
        const modal = document.getElementById('deleteModal');
        modal.classList.remove('hidden');
        modal.style.display = 'block';
    }

    function closeDeleteModal() {
        deleteFormId = null;
        const modal = document.getElementById('deleteModal');
        modal.classList.add('hidden');
        modal.style.display = 'none';
    }

    function confirmDelete() {
        if (deleteFormId) {
            document.getElementById(deleteFormId).submit();
        }
        closeDeleteModal();
    }

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && !document.getElementById('deleteModal').classList.contains('hidden')) {
            closeDeleteModal();
        }
    });
</script>
