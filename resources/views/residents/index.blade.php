@extends('layouts.app')
@section('title', 'Residents List')
@section('content')

<div class="mb-6 flex justify-between items-center">
    <div>
        <h1 class="text-2xl font-bold text-gray-800">Residents List</h1>
        <p class="text-sm text-gray-500 italic">List of all registered residents in the barangay.</p>
    </div>
    <a href="{{ route('residents.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg font-bold text-sm hover:bg-blue-700 shadow-md transition">
        + Add New Resident
    </a>
</div>

@if(session('success'))
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 px-4 py-3 rounded shadow-sm mb-6 transition duration-150">
        <span class="font-bold">Success!</span> {{ session('success') }}
    </div>
@endif

<div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="bg-gray-50 uppercase text-xs font-bold text-gray-600 border-b">
                <th class="p-4">Full Name</th>
                <th class="p-4">Address</th>
                <th class="p-4 text-center">Age</th>
                <th class="p-4 text-center">Voter Status</th>
                <th class="p-4 text-center">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @forelse($residents as $resident)
            <tr class="hover:bg-blue-50 transition duration-100">
                <td class="p-4">
                    <div class="font-bold text-gray-900 uppercase text-sm">
                        {{ $resident->last_name }}, {{ $resident->first_name }} {{ $resident->suffix }}
                    </div>
                    <div class="text-xs text-gray-500 italic">{{ $resident->gender }} | {{ $resident->civil_status }}</div>
                </td>
                <td class="p-4 text-sm text-gray-600">
                    {{ Str::limit($resident->address, 40) }}
                </td>
                <td class="p-4 text-sm text-center font-medium">
                    {{ \Carbon\Carbon::parse($resident->birthdate)->age }}
                </td>
                <td class="p-4 text-center">
                    @if($resident->is_voter)
                        <span class="px-2 py-1 text-[10px] font-bold bg-green-100 text-green-700 rounded-full">REGISTERED</span>
                    @else
                        <span class="px-2 py-1 text-[10px] font-bold bg-red-100 text-red-600 rounded-full">NON-VOTER</span>
                    @endif
                </td>
                <td class="p-4">
                    <div class="flex justify-center items-center space-x-2">
                        <a href="{{ route('residents.show', $resident) }}" 
                           class="bg-blue-100 text-blue-600 px-3 py-1.5 rounded-md text-xs font-bold hover:bg-blue-600 hover:text-white transition shadow-sm">
                            View
                        </a>
                        
                        <a href="{{ route('residents.edit', $resident) }}" 
                           class="bg-indigo-100 text-indigo-600 px-3 py-1.5 rounded-md text-xs font-bold hover:bg-indigo-600 hover:text-white transition shadow-sm">
                            Edit
                        </a>

                        <form action="{{ route('residents.destroy', $resident) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this resident record? This action cannot be undone.');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="bg-red-100 text-red-600 px-3 py-1.5 rounded-md text-xs font-bold hover:bg-red-600 hover:text-white transition shadow-sm">
                                Delete
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="p-10 text-center text-gray-400 italic">
                    No resident records found.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
    
    <div class="p-4 bg-gray-50 border-t">
        {{ $residents->links() }}
    </div>
</div>

@endsection