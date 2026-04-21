<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BeiEducation;
use Illuminate\Http\Request;

/**
 * BEI Education Controller
 * 
 * Handles CRUD operations for BEI education materials
 */
class BeiEducationController extends Controller
{
    /**
     * Display a listing of education materials
     */
    public function index(Request $request)
    {
        $filters = [
            'search' => $request->get('search'),
        ];

        $query = BeiEducation::query();

        if (!empty($filters['search'])) {
            $query->where('title', 'like', "%{$filters['search']}%");
        }

        $educations = $query->latest()->paginate(15)->withQueryString();

        return view('bei.admin.educations.index', compact('educations', 'filters'));
    }

    /**
     * Show the form for creating a new education material
     */
    public function create()
    {
        return view('bei.admin.educations.create');
    }

    /**
     * Store a newly created education material
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['nullable', 'string'],
        ]);

        try {
            BeiEducation::create($validated);

            return redirect()
                ->route('admin.bei.educations.index')
                ->with('success', 'Materi edukasi berhasil ditambahkan!');
        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->with('error', 'Gagal menambahkan materi: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified education material
     */
    public function edit(BeiEducation $education)
    {
        return view('bei.admin.educations.edit', compact('education'));
    }

    /**
     * Update the specified education material
     */
    public function update(Request $request, BeiEducation $education)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['nullable', 'string'],
        ]);

        try {
            $education->update($validated);

            return redirect()
                ->route('admin.bei.educations.index')
                ->with('success', 'Materi edukasi berhasil diupdate!');
        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->with('error', 'Gagal mengupdate materi: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified education material
     */
    public function destroy(BeiEducation $education)
    {
        try {
            $education->delete();

            return redirect()
                ->route('admin.bei.educations.index')
                ->with('success', 'Materi edukasi berhasil dihapus!');
        } catch (\Exception $e) {
            return back()
                ->with('error', 'Gagal menghapus materi: ' . $e->getMessage());
        }
    }
}
