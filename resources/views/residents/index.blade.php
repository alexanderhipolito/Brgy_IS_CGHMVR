@extends('layouts.app')
@section('title', 'Residents List')
@section('content')
<div class="mb-6 flex justify-between items-center">
    <h1 class="text-2xl font-bold">Residents List</h1>
</div>

@if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

<div class="bg-white rounded-lg shadow overflow-x-auto">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Birthdate / Age</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Address</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Contact</th>
                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @forelse($residents as $resident)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm font-medium text-gray-900">{{ $resident->last_name }}, {{ $resident->first_name }} {{ $resident->middle_name }}</div>
                    <div class="text-sm text-gray-500">{{ $resident->gender }} | {{ $resident->civil_status }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">{{ \Carbon\Carbon::parse($resident->birthdate)->format('M d, Y') }}</div>
                    <div class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($resident->birthdate)->age }} years old</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    {{ Str::limit($resident->address, 30) }}
                </td>
                 <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    {{ $resident->contact_number ?? 'N/A' }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <a href="{{ route('residents.show', $resident) }}" class="text-blue-600 hover:text-blue-900 mr-3">View Info</a>
                    <a href="{{ route('residents.edit', $resident) }}" class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</a>
                    <form action="{{ route('residents.destroy', $resident) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this resident?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">No residents found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <div class="px-6 py-4">
        {{ $residents->links() }}
    </div>
</div>
@endsection
