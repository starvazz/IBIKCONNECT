@extends('layouts.admin')

@section('title', 'Pendaftar Event')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.cdc.events.index') }}" class="text-gray-600 hover:text-gray-900">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
            </a>
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Pendaftar Event</h1>
                <p class="text-gray-600 mt-1">{{ $event->title }}</p>
            </div>
        </div>
        <a href="{{ route('admin.cdc.events.export', $event) }}" 
            class="px-4 py-2.5 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
            </svg>
            Export Excel
        </a>
    </div>

    <!-- Flash Messages -->
    @if(session('success'))
    <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg">{{ session('success') }}</div>
    @endif
    @if(session('error'))
    <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg">{{ session('error') }}</div>
    @endif

    <!-- Event Info Card -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <div>
                <div class="text-sm text-gray-500 mb-1">Total Pendaftar</div>
                <div class="text-2xl font-bold text-gray-900">{{ $event->registered_count }}</div>
            </div>
            <div>
                <div class="text-sm text-gray-500 mb-1">Kapasitas</div>
                <div class="text-2xl font-bold text-gray-900">
                    {{ $event->max_participants ?? 'Unlimited' }}
                </div>
            </div>
            <div>
                <div class="text-sm text-gray-500 mb-1">Tanggal Event</div>
                <div class="text-lg font-semibold text-gray-900">{{ $event->start_date->format('d M Y') }}</div>
            </div>
            <div>
                <div class="text-sm text-gray-500 mb-1">Status Pendaftaran</div>
                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $event->is_registration_open ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                    {{ $event->is_registration_open ? 'Buka' : 'Tutup' }}
                </span>
            </div>
        </div>
    </div>

    <!-- Registrations Table -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pendaftar</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kontak</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">NIM</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Daftar</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($registrations as $registration)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4">
                            <div class="font-medium text-gray-900">{{ $registration->name }}</div>
                            @if($registration->message)
                                <div class="text-sm text-gray-500 mt-1">{{ Str::limit($registration->message, 50) }}</div>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-sm">
                            <div class="text-gray-900">{{ $registration->email }}</div>
                            <div class="text-gray-500">{{ $registration->phone }}</div>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $registration->nim }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">
                            {{ $registration->registered_at->format('d M Y H:i') }}
                        </td>
                        <td class="px-6 py-4">
                            @if($registration->status === 'pending')
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                    Pending
                                </span>
                            @elseif($registration->status === 'approved')
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    Disetujui
                                </span>
                            @elseif($registration->status === 'rejected')
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                    Ditolak
                                </span>
                            @elseif($registration->status === 'attended')
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                    Hadir
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-right text-sm font-medium">
                            <div class="flex items-center justify-end gap-2">
                                @if($registration->status === 'pending')
                                <form action="{{ route('admin.cdc.events.registrations.approve', $registration) }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit" class="p-1.5 rounded bg-green-50 text-green-600 hover:bg-green-100" title="Setujui">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                    </button>
                                </form>
                                <form action="{{ route('admin.cdc.events.registrations.reject', $registration) }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit" class="p-1.5 rounded bg-red-50 text-red-600 hover:bg-red-100" title="Tolak">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                        </svg>
                                    </button>
                                </form>
                                @else
                                <form action="{{ route('admin.cdc.events.registrations.reset', $registration) }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit" class="p-1.5 rounded bg-blue-50 text-blue-600 hover:bg-blue-100" title="Reset ke Pending">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                                    </button>
                                </form>
                                @endif
                                <form id="delete-reg-{{ $registration->id }}" action="{{ route('admin.cdc.events.registrations.destroy', $registration) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" onclick="openDeleteModal({{ $registration->id }}, '{{ addslashes($registration->name) }}')" class="p-1.5 rounded bg-gray-50 text-gray-600 hover:bg-gray-100" title="Hapus">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                            <svg class="w-12 h-12 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                            <p class="text-lg font-medium">Belum ada pendaftar</p>
                            <p class="mt-1">Pendaftar akan muncul di sini</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($registrations->hasPages())
        <div class="px-6 py-4 border-t border-gray-200">
            {{ $registrations->links() }}
        </div>
        @endif
    </div>
</div>
@endsection

<div id="deleteModal" class="hidden" role="dialog" aria-modal="true" style="position: fixed; inset: 0; z-index: 9999; display: none;">
    <div onclick="closeDeleteModal()" style="position: fixed; inset: 0; background: rgba(0,0,0,0.5);"></div>
    <div style="position: fixed; inset: 0; display: flex; align-items: center; justify-content: center; padding: 16px;">
        <div class="bg-white rounded-xl shadow-2xl p-5 sm:p-6 relative" style="width: 100%; max-width: 360px;">
            <h3 class="text-lg font-bold text-gray-900 mb-2">Hapus Pendaftaran</h3>
            <p class="text-sm text-gray-600 mb-5 leading-relaxed">
                Yakin ingin menghapus pendaftaran "<span id="delete-reg-name" class="font-semibold text-gray-800"></span>"?
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

    function openDeleteModal(id, name) {
        deleteFormId = 'delete-reg-' + id;
        document.getElementById('delete-reg-name').textContent = name;
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
