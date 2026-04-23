<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cdc\StoreEventRequest;
use App\Models\CdcEvent;
use App\Models\CdcEventRegistration;
use App\Services\Cdc\CdcEventService;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CdcEventRegistrationsExport;

/**
 * CDC Event Controller
 * 
 * Handles CRUD operations for CDC events and registration management
 */
class CdcEventController extends Controller
{
    public function __construct(
        private CdcEventService $eventService
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

        $events = $this->eventService->getPaginated($filters, 15);

        return view('cdc.admin.events.index', compact('events', 'filters'));
    }

    /**
     * Show the form for creating a new event
     */
    public function create()
    {
        return view('cdc.admin.events.create');
    }

    /**
     * Store a newly created event
     */
    public function store(StoreEventRequest $request)
    {
        try {
            $this->eventService->create($request->validated());

            return redirect()
                ->route('admin.cdc.events.index')
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
    public function edit(CdcEvent $event)
    {
        return view('cdc.admin.events.edit', compact('event'));
    }

    /**
     * Update the specified event
     */
    public function update(StoreEventRequest $request, CdcEvent $event)
    {
        try {
            $this->eventService->update($event, $request->validated());

            return redirect()
                ->route('admin.cdc.events.index')
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
    public function destroy(CdcEvent $event)
    {
        try {
            $this->eventService->delete($event);

            return redirect()
                ->route('admin.cdc.events.index')
                ->with('success', 'Event berhasil dihapus!');
        } catch (\Exception $e) {
            return back()
                ->with('error', 'Gagal menghapus event: ' . $e->getMessage());
        }
    }

    /**
     * Show registrations for specific event
     */
    public function registrations(CdcEvent $event)
    {
        $registrations = $event->registrations()
            ->latest()
            ->paginate(20);

        return view('cdc.admin.events.registrations', compact('event', 'registrations'));
    }

    /**
     * Approve a registration
     */
    public function approveRegistration(CdcEventRegistration $registration)
    {
        try {
            $this->eventService->approveRegistration($registration);

            return back()->with('success', 'Pendaftaran berhasil disetujui!');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal menyetujui pendaftaran: ' . $e->getMessage());
        }
    }

    /**
     * Reject a registration
     */
    public function rejectRegistration(CdcEventRegistration $registration)
    {
        try {
            $this->eventService->rejectRegistration($registration);

            return back()->with('success', 'Pendaftaran berhasil ditolak!');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal menolak pendaftaran: ' . $e->getMessage());
        }
    }

    /**
     * Reset registration status back to pending
     */
    public function resetRegistration(CdcEventRegistration $registration)
    {
        try {
            $registration->update(['status' => CdcEventRegistration::STATUS_PENDING]);

            return back()->with('success', 'Status pendaftaran direset ke pending!');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal mereset status: ' . $e->getMessage());
        }
    }

    /**
     * Delete a registration
     */
    public function destroyRegistration(CdcEventRegistration $registration)
    {
        try {
            $registration->delete();

            return back()->with('success', 'Pendaftaran berhasil dihapus!');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal menghapus pendaftaran: ' . $e->getMessage());
        }
    }

    /**
     * Export registrations to Excel
     */
    public function exportRegistrations(CdcEvent $event)
    {
        $filename = 'registrations-' . \Str::slug($event->title) . '-' . now()->format('Y-m-d') . '.xlsx';
        
        return Excel::download(
            new CdcEventRegistrationsExport($event),
            $filename
        );
    }

    /**
     * Toggle publish status
     */
    public function togglePublish(CdcEvent $event)
    {
        $event->update(['is_published' => !$event->is_published]);
        $status = $event->is_published ? 'dipublikasikan' : 'dijadikan draft';
        return back()->with('success', "Event berhasil {$status}!");
    }

    /**
     * Toggle registration open/close
     */
    public function toggleRegistration(CdcEvent $event)
    {
        $event->update(['is_registration_open' => !$event->is_registration_open]);
        $status = $event->is_registration_open ? 'dibuka' : 'ditutup';
        return back()->with('success', "Pendaftaran berhasil {$status}!");
    }
}
