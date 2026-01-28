<?php

namespace App\Http\Controllers;

use App\Models\Resident;
use Illuminate\Http\Request;

class ResidentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $residents = Resident::latest()->paginate(10);
        return view('residents.index', compact('residents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('residents.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'birthdate' => 'required|date',
            'gender' => 'required',
            'civil_status' => 'required',
            'address' => 'required',
            'middle_name' => 'nullable',
            'contact_number' => 'nullable',
        ]);

        Resident::create($validated);

        return redirect()->route('residents.index')->with('success', 'Resident created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Resident $resident)
    {
        return view('residents.show', compact('resident'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Resident $resident)
    {
        return view('residents.edit', compact('resident'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Resident $resident)
    {
        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'birthdate' => 'required|date',
            'gender' => 'required',
            'civil_status' => 'required',
            'address' => 'required',
            'middle_name' => 'nullable',
            'contact_number' => 'nullable',
        ]);

        $resident->update($validated);

        return redirect()->route('residents.index')->with('success', 'Resident updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Resident $resident)
    {
        $resident->delete();

        return redirect()->route('residents.index')->with('success', 'Resident deleted successfully.');
    }
}
