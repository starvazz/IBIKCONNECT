@extends('layouts.admin')

@section('title', 'Kelola Galeri BEI')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Kelola Galeri Foto</h1>
            <p class="text-gray-600 mt-1">Kelola foto kegiatan Gallery BEI</p>
        </div>
        <a href="{{ route('admin.bei.galleries.create') }}" 
            class="px-4 py-2.5 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition-colors flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Upload Foto
        </a>
    </div>

    <!-- Gallery Grid -->
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        @forelse($galleries as $gallery)
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden group">
            <div class="aspect-square relative overflow-hidden bg-gray-100">
                @if($gallery->image_path)
                    <img src="{{ $gallery->image_url }}" alt="{{ $gallery->title }}" 
                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                @else
                    <div class="w-full h-full flex items-center justify-center">
                        <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                @endif
            </div>
            <div class="p-4">
                @if($gallery->title)
                    <p class="text-sm font-medium text-gray-900 mb-2">{{ $gallery->title }}</p>
                @endif
                <div class="flex items-center gap-2">
                    <a href="{{ route('admin.bei.galleries.edit', $gallery) }}" 
                        class="flex-1 text-center px-3 py-1.5 text-sm bg-blue-50 text-blue-600 rounded hover:bg-blue-100 transition-colors">
                        Edit
                    </a>
                    <form id="delete-form-{{ $gallery->id }}" action="{{ route('admin.bei.galleries.destroy', $gallery) }}" method="POST" class="flex-1">
                        @csrf
                        @method('DELETE')
                        <button type="button"
                            onclick="openDeleteModal({{ $gallery->id }}, '{{ addslashes($gallery->title ?? 'foto ini') }}')"
                            class="w-full px-3 py-1.5 text-sm bg-red-50 text-red-600 rounded hover:bg-red-100 transition-colors">
                            Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <div class="col-span-full">
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-12 text-center">
                <svg class="w-16 h-16 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                <p class="text-lg font-medium text-gray-900">Belum ada foto</p>
                <p class="text-gray-600 mt-1">Mulai dengan mengupload foto kegiatan</p>
            </div>
        </div>
        @endforelse
    </div>

    <!-- Pagination -->
    @if($galleries->hasPages())
    <div class="flex justify-center">
        {{ $galleries->links() }}
    </div>
    @endif
</div>
@endsection

<div id="deleteModal" class="hidden" role="dialog" aria-modal="true" style="position: fixed; inset: 0; z-index: 9999; display: none;">
    <div onclick="closeDeleteModal()" style="position: fixed; inset: 0; background: rgba(0,0,0,0.5);"></div>
    <div style="position: fixed; inset: 0; display: flex; align-items: center; justify-content: center; padding: 16px;">
        <div class="bg-white rounded-xl shadow-2xl p-5 sm:p-6 relative" style="width: 100%; max-width: 360px;">
            <h3 class="text-lg font-bold text-gray-900 mb-2">Hapus Foto</h3>
            <p class="text-sm text-gray-600 mb-5 leading-relaxed">
                Yakin ingin menghapus "<span id="delete-gallery-title" class="font-semibold text-gray-800"></span>"?
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
        document.getElementById('delete-gallery-title').textContent = title;
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
