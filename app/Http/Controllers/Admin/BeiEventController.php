<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BeiEvent;
use App\Services\FileUploadService;
use Illuminate\Http\Request;

/**
 * BEI Event Controller
 * 
 * Handles CRUD operations for BEI events
 */
class BeiEventController extends Controller
{
    public function __construct(
        private FileUploadService $fileUploadService
    ) {}

    /**
     * Display a listing of events
     */
    public function index(Request $request)
    {
        $filters = [
            'search' => $request->get('search'),
            'is_published' => $request->get('is_published'),
            'is_registration_open' => $request->get('is_registration_open'),
        ];

        $query = BeiEvent::query();

        if ($filters['is_published'] !== null && $filters['is_published'] !== '') {
            $query->where('is_published', $filters['is_published']);
        }

        if ($filters['is_registration_open'] !== null && $filters['is_registration_open'] !== '') {
            $query->where('is_registration_open', $filters['is_registration_open']);
        }

        if (!empty($filters['search'])) {
            $query->where('title', 'like', "%{$filters['search']}%");
        }

        $events = $query->latest('starts_at')->paginate(15)->withQueryString();

        return view('bei.admin.events.index', compact('events', 'filters'));
    }

    /**
     * Show the form for creating a new event
     */
    public function create()
    {
        return view('bei.admin.events.create');
    }

    /**
     * Store a newly created event
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'starts_at' => ['nullable', 'date'],
            'location' => ['nullable', 'string', 'max:255'],
            'max_participants' => ['nullable', 'integer', 'min:1'],
            'banner_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:3072'],
            'is_published' => ['boolean'],
            'is_registration_open' => ['boolean'],
        ]);

        $validated['is_published'] = $request->boolean('is_published');
        $validated['is_registration_open'] = $request->boolean('is_registration_open');

        try {
            // Handle image upload if present
            if ($request->hasFile('banner_image')) {
                $validated['banner_image'] = $this->fileUploadService->uploadImage(
                    $request->file('banner_image'),
                    config('filesystems.upload_paths.bei.events')
                );
            }

            BeiEvent::create($validated);

            return redirect()
                ->route('admin.bei.events.index')
                ->with('success', 'Event berhasil ditambahkan!');
        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->with('error', 'Gagal menambahkan event: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified event
     */
    public function edit(BeiEvent $event)
    {
        return view('bei.admin.events.edit', compact('event'));
    }

    /**
     * Update the specified event
     */
    public function update(Request $request, BeiEvent $event)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'starts_at' => ['nullable', 'date'],
            'location' => ['nullable', 'string', 'max:255'],
            'max_participants' => ['nullable', 'integer', 'min:1'],
            'banner_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:3072'],
            'is_published' => ['boolean'],
            'is_registration_open' => ['boolean'],
        ]);

        $validated['is_published'] = $request->boolean('is_published');
        $validated['is_registration_open'] = $request->boolean('is_registration_open');

        try {
            // Handle image upload if present
            if ($request->hasFile('banner_image')) {
                // Delete old image if exists
                if ($event->banner_image) {
                    $this->fileUploadService->delete($event->banner_image);
                }
                $validated['banner_image'] = $this->fileUploadService->uploadImage(
                    $request->file('banner_image'),
                    config('filesystems.upload_paths.bei.events')
                );
            }

            $event->update($validated);

            return redirect()
                ->route('admin.bei.events.index')
                ->with('success', 'Event berhasil diupdate!');
        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->with('error', 'Gagal mengupdate event: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified event
     */
    public function destroy(BeiEvent $event)
    {
        try {
            // Delete image if exists
            if ($event->banner_image) {
                $this->fileUploadService->delete($event->banner_image);
            }

            $event->delete();

            return redirect()
                ->route('admin.bei.events.index')
                ->with('success', 'Event berhasil dihapus!');
        } catch (\Exception $e) {
            return back()
                ->with('error', 'Gagal menghapus event: ' . $e->getMessage());
        }
    }

    /**
     * Show registrations for specific event
     */
    public function registrations(BeiEvent $event)
    {
        $registrations = $event->registrations()->latest()->paginate(20);
        return view('bei.admin.events.registrations', compact('event', 'registrations'));
    }
}
