<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CdcEvent;
use App\Models\CdcEventRegistration;
use Illuminate\Http\Request;

class CdcRegistrationController extends Controller
{
    public function index(Request $request)
    {
        $query = CdcEventRegistration::with('event')
            ->latest('registered_at')
            ->latest('id');

        if ($request->filled('event_id')) {
            $query->where('event_id', $request->event_id);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $registrations = $query->paginate(20)->withQueryString();
        $events = CdcEvent::orderBy('start_date', 'desc')->get();

        return view('cdc.admin.registrations.index', compact('registrations', 'events'));
    }
}
