<?php

namespace App\Http\Controllers;

use App\Models\Resident; 
use Illuminate\Http\Request;

class ResidentController extends Controller
{
    /**
     * Display a listing of the residents.
     * Supports Live Search via AJAX.
     */
    public function index(Request $request)
    {
        // 1. Kunin ang search query mula sa request
        $search = $request->input('search');

        // 2. Query logic na may Search Filter para sa iba't ibang fields
        $residents = Resident::query()
            ->when($search, function ($query, $search) {
                return $query->where(function($q) use ($search) {
                    $q->where('first_name', 'like', "%{$search}%")
                      ->orWhere('middle_name', 'like', "%{$search}%")
                      ->orWhere('last_name', 'like', "%{$search}%")
                      ->orWhere('household_id', 'like', "%{$search}%")
                      ->orWhere('address', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->paginate(10)
            ->withQueryString(); // Panatilihin ang search term sa pagination links

        // 3. AJAX Check: Kung ang request ay galing sa JavaScript (keyup), 
        // ibalik lang ang partial view (table rows) para hindi mag-refresh ang buong page.
        if ($request->ajax()) {
            return view('residents.partials.table-rows', compact('residents'))->render();
        }

        // 4. Normal Load: I-pass ang $residents at $search value sa buong view
        return view('residents.index', compact('residents', 'search'));
    }

    public function create()
    {
        return view('residents.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name'     => 'required|string|max:255',
            'middle_name'    => 'nullable|string|max:255',
            'last_name'      => 'required|string|max:255',
            'suffix'         => 'nullable|string|max:50',
            'birthdate'      => 'required|date',
            'birthplace'     => 'nullable|string|max:255',
            'gender'         => 'required|string',
            'civil_status'   => 'required|string',
            'citizenship'    => 'required|string',
            'occupation'     => 'nullable|string',
            'is_voter'       => 'required|in:0,1',
            'household_id'   => 'nullable|string',
            'address'        => 'required|string',
            'home_ownership' => 'required|string',
            'is_family_head' => 'required|in:0,1',
            'contact_number' => 'nullable|string',
        ]);

        Resident::create($validated);

        return redirect()->route('residents.index')
                         ->with('success', 'Bagong resident ay matagumpay na naidagdag!');
    }

    public function show(Resident $resident)
    {
        return view('residents.show', compact('resident'));
    }

    public function edit(Resident $resident)
    {
        // Ipinapasa ang $resident data sa form para magkaroon ng value ang mga fields
        return view('residents.create', compact('resident'));
    }

    public function update(Request $request, Resident $resident)
    {
        $validated = $request->validate([
            'first_name'     => 'required|string|max:255',
            'middle_name'    => 'nullable|string|max:255',
            'last_name'      => 'required|string|max:255',
            'suffix'         => 'nullable|string|max:50',
            'birthdate'      => 'required|date',
            'birthplace'     => 'nullable|string|max:255',
            'gender'         => 'required|string',
            'civil_status'   => 'required|string',
            'citizenship'    => 'required|string',
            'occupation'     => 'nullable|string',
            'is_voter'       => 'required|in:0,1',
            'household_id'   => 'nullable|string',
            'address'        => 'required|string',
            'home_ownership' => 'required|string',
            'is_family_head' => 'required|in:0,1',
            'contact_number' => 'nullable|string',
        ]);

        $resident->update($validated);

        return redirect()->route('residents.index')->with('success', 'Resident profile updated successfully!');
    }

    public function destroy(Resident $resident)
    {
        $resident->delete();
        return redirect()->route('residents.index')->with('success', 'Deleted successfully!');
    }
}