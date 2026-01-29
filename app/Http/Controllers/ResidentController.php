<?php

namespace App\Http\Controllers;

use App\Models\Resident; 
use Illuminate\Http\Request;

class ResidentController extends Controller
{
    public function index()
    {
        $residents = Resident::latest()->paginate(10);
        return view('residents.index', compact('residents'));
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
        // 1. I-validate lahat ng fields para pwedeng baguhin kahit alin dyan
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

        // 2. I-update ang record sa database
        $resident->update($validated);

        // 3. Balik sa listahan o sa details page
        return redirect()->route('residents.index')->with('success', 'Resident profile updated successfully!');
    }

    public function destroy(Resident $resident)
    {
        $resident->delete();
        return redirect()->route('residents.index')->with('success', 'Deleted successfully!');
    }
}