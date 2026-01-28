@extends('layouts.app')
@section('title', 'Edit Resident')
@section('content')
<div class="mb-6">
    <a href="{{ route('residents.index') }}" class="text-blue-600 hover:text-blue-800">&larr; Back to List</a>
    <h1 class="text-2xl font-bold mt-2">Edit Resident: {{ $resident->first_name }} {{ $resident->last_name }}</h1>
</div>

<div class="bg-white rounded-lg shadow p-6">
    <form action="{{ route('residents.update', $resident) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
            <div>
                <label for="first_name" class="block text-sm font-medium text-gray-700 mb-1">First Name</label>
                <input type="text" name="first_name" id="first_name" value="{{ old('first_name', $resident->first_name) }}" class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                @error('first_name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
             <div>
                <label for="middle_name" class="block text-sm font-medium text-gray-700 mb-1">Middle Name</label>
                <input type="text" name="middle_name" id="middle_name" value="{{ old('middle_name', $resident->middle_name) }}" class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500">
                @error('middle_name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
             <div>
                <label for="last_name" class="block text-sm font-medium text-gray-700 mb-1">Last Name</label>
                <input type="text" name="last_name" id="last_name" value="{{ old('last_name', $resident->last_name) }}" class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                @error('last_name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div>
                <label for="birthdate" class="block text-sm font-medium text-gray-700 mb-1">Birthdate</label>
                <input type="date" name="birthdate" id="birthdate" value="{{ old('birthdate', $resident->birthdate) }}" class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                @error('birthdate') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label for="contact_number" class="block text-sm font-medium text-gray-700 mb-1">Contact Number</label>
                <input type="text" name="contact_number" id="contact_number" value="{{ old('contact_number', $resident->contact_number) }}" class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500">
                @error('contact_number') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
             <div>
                <label for="gender" class="block text-sm font-medium text-gray-700 mb-1">Gender</label>
                <select name="gender" id="gender" class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                    <option value="">Select Gender</option>
                    <option value="Male" {{ old('gender', $resident->gender) == 'Male' ? 'selected' : '' }}>Male</option>
                    <option value="Female" {{ old('gender', $resident->gender) == 'Female' ? 'selected' : '' }}>Female</option>
                </select>
                @error('gender') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
             <div>
                <label for="civil_status" class="block text-sm font-medium text-gray-700 mb-1">Civil Status</label>
                <select name="civil_status" id="civil_status" class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                    <option value="">Select Status</option>
                    <option value="Single" {{ old('civil_status', $resident->civil_status) == 'Single' ? 'selected' : '' }}>Single</option>
                    <option value="Married" {{ old('civil_status', $resident->civil_status) == 'Married' ? 'selected' : '' }}>Married</option>
                    <option value="Widowed" {{ old('civil_status', $resident->civil_status) == 'Widowed' ? 'selected' : '' }}>Widowed</option>
                    <option value="Separated" {{ old('civil_status', $resident->civil_status) == 'Separated' ? 'selected' : '' }}>Separated</option>
                </select>
                @error('civil_status') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
        </div>

        <div class="mb-6">
            <label for="address" class="block text-sm font-medium text-gray-700 mb-1">Full Address</label>
            <textarea name="address" id="address" rows="3" class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500" required>{{ old('address', $resident->address) }}</textarea>
            @error('address') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="flex justify-end">
             <a href="{{ route('residents.index') }}" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg mr-2 hover:bg-gray-300">Cancel</a>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Update Resident</button>
        </div>
    </form>
</div>
@endsection
