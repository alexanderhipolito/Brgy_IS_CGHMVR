@extends('layouts.app')
@section('title', 'Resident Details')
@section('content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <a href="{{ route('residents.index') }}" class="text-blue-600 hover:text-blue-800">&larr; Back to List</a>
        <h1 class="text-2xl font-bold mt-2">Resident Details</h1>
    </div>
    <div>
        <a href="{{ route('residents.edit', $resident) }}" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 mr-2">Edit</a>
        <form action="{{ route('residents.destroy', $resident) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this resident?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700">Delete</button>
        </form>
    </div>
</div>

<div class="bg-white rounded-lg shadow overflow-hidden">
    <div class="px-6 py-4 border-b border-gray-200">
        <h3 class="text-lg font-medium text-gray-900">Personal Information</h3>
    </div>
    <div class="px-6 py-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-4 gap-y-6">
            <div>
                <dt class="text-sm font-medium text-gray-500">Full Name</dt>
                <dd class="mt-1 text-sm text-gray-900 font-semibold">{{ $resident->first_name }} {{ $resident->middle_name }} {{ $resident->last_name }}</dd>
            </div>
            <div>
                <dt class="text-sm font-medium text-gray-500">Address</dt>
                <dd class="mt-1 text-sm text-gray-900">{{ $resident->address }}</dd>
            </div>
             <div>
                <dt class="text-sm font-medium text-gray-500">Birthdate</dt>
                <dd class="mt-1 text-sm text-gray-900">{{ \Carbon\Carbon::parse($resident->birthdate)->format('F d, Y') }} ({{ \Carbon\Carbon::parse($resident->birthdate)->age }} years old)</dd>
            </div>
             <div>
                <dt class="text-sm font-medium text-gray-500">Gender</dt>
                <dd class="mt-1 text-sm text-gray-900">{{ $resident->gender }}</dd>
            </div>
             <div>
                <dt class="text-sm font-medium text-gray-500">Civil Status</dt>
                <dd class="mt-1 text-sm text-gray-900">{{ $resident->civil_status }}</dd>
            </div>
             <div>
                <dt class="text-sm font-medium text-gray-500">Contact Number</dt>
                <dd class="mt-1 text-sm text-gray-900">{{ $resident->contact_number ?? 'N/A' }}</dd>
            </div>
        </div>
    </div>
</div>
@endsection
