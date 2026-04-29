@extends('layouts.admin')

@section('title', 'Kelola Lowongan Kerja')
@section('page-title', 'Lowongan Kerja')

@section('content')
<div class="space-y-6">
    <!-- Header & Actions -->
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold text-gray-900">Kelola Lowongan Kerja</h2>
            <p class="mt-1 text-sm text-gray-600">Manage job postings dan internship opportunities</p>
        </div>
        <a href="{{ route('admin.cdc.jobs.create') }}" class="inline-flex items-center px-4 py-2 bg-[#8A4BE2] text-white text-sm font-medium rounded-lg hover:bg-[#7A3BD6] transition-colors">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Tambah Lowongan
        </a>
    </div>

    <!-- Filters -->
    <div class="bg-white rounded-lg border border-gray-200 p-4">
        <form method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div>
                <input type="text" name="search" value="{{ $filters['search'] ?? '' }}" placeholder="Cari lowongan..." class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#8A4BE2] focus:border-transparent">
            </div>
            <div>
                <select name="type" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#8A4BE2] focus:border-transparent">
                    <option value="">Semua Tipe</option>
                    <option value="full-time" {{ ($filters['type'] ?? '') === 'full-time' ? 'selected' : '' }}>Full-time</option>
                    <option value="part-time" {{ ($filters['type'] ?? '') === 'part-time' ? 'selected' : '' }}>Part-time</option>
                    <option value="internship" {{ ($filters['type'] ?? '') === 'internship' ? 'selected' : '' }}>Internship</option>
                    <option value="freelance" {{ ($filters['type'] ?? '') === 'freelance' ? 'selected' : '' }}>Freelance</option>
                    <option value="contract" {{ ($filters['type'] ?? '') === 'contract' ? 'selected' : '' }}>Contract</option>
                </select>
            </div>
            <div>
                <select name="is_active" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#8A4BE2] focus:border-transparent">
                    <option value="">Semua Status</option>
                    <option value="1" {{ ($filters['is_active'] ?? '') === '1' ? 'selected' : '' }}>Aktif</option>
                    <option value="0" {{ ($filters['is_active'] ?? '') === '0' ? 'selected' : '' }}>Tidak Aktif</option>
                </select>
            </div>
            <div class="flex gap-2">
                <button type="submit" class="flex-1 px-4 py-2 bg-gray-900 text-white text-sm font-medium rounded-lg hover:bg-gray-800">
                    Filter
                </button>
                <a href="{{ route('admin.cdc.jobs.index') }}" class="px-4 py-2 bg-gray-200 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-300">
                    Reset
                </a>
            </div>
        </form>
    </div>

    <!-- Jobs Table -->
    <div class="bg-white rounded-lg border border-gray-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Posisi</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Perusahaan</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Lokasi</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tipe</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Views</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($jobs as $job)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4">
                            <div class="text-sm font-medium text-gray-900">{{ $job->title }}</div>
                            <div class="text-xs text-gray-500">{{ $job->salary_range ?? '-' }}</div>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $job->company_name }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $job->location }}</td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 text-xs font-medium rounded-full bg-blue-100 text-blue-800">
                                {{ ucfirst($job->type) }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <form method="POST" action="{{ route('admin.cdc.jobs.toggle-active', $job) }}" class="inline">
                                @csrf
                                <button type="submit" class="px-2 py-1 text-xs font-medium rounded-full {{ $job->is_active ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                    {{ $job->is_active ? 'Aktif' : 'Tidak Aktif' }}
                                </button>
                            </form>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $job->views_count }}</td>
                        <td class="px-6 py-4 text-right text-sm font-medium">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.cdc.jobs.edit', $job) }}" class="text-blue-600 hover:text-blue-900" title="Edit">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                </a>
                                <form id="delete-form-{{ $job->id }}" method="POST" action="{{ route('admin.cdc.jobs.destroy', $job) }}" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" onclick="openDeleteModal({{ $job->id }}, '{{ addslashes($job->title) }}')" class="p-2 rounded-full bg-red-50 text-red-600 hover:bg-red-100 hover:text-red-700 transition-colors" title="Hapus">
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
                        <td colspan="7" class="px-6 py-12 text-center text-gray-500">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            <p class="mt-2 text-sm">Belum ada lowongan kerja</p>
                            <a href="{{ route('admin.cdc.jobs.create') }}" class="mt-4 inline-flex items-center px-4 py-2 bg-[#8A4BE2] text-white text-sm font-medium rounded-lg hover:bg-[#7A3BD6]">
                                Tambah Lowongan Pertama
                            </a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($jobs->hasPages())
        <div class="px-6 py-4 border-t border-gray-200">
            {{ $jobs->links() }}
        </div>
        @endif
    </div>
</div>
@endsection

<div id="deleteModal" class="hidden" role="dialog" aria-modal="true" style="position: fixed; inset: 0; z-index: 9999; display: none;">
    <div onclick="closeDeleteModal()" style="position: fixed; inset: 0; background: rgba(0,0,0,0.5);"></div>
    <div style="position: fixed; inset: 0; display: flex; align-items: center; justify-content: center; padding: 16px;">
        <div class="bg-white rounded-xl shadow-2xl p-5 sm:p-6 relative" style="width: 100%; max-width: 360px;">
            <h3 class="text-lg font-bold text-gray-900 mb-2">Hapus Lowongan</h3>
            <p class="text-sm text-gray-600 mb-5 leading-relaxed">
                Yakin ingin menghapus "<span id="delete-job-title" class="font-semibold text-gray-800"></span>"?
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
        document.getElementById('delete-job-title').textContent = title;
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
