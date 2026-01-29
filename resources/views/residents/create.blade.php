@extends('layouts.app')
@section('title', isset($resident) ? 'Edit Resident' : 'Add Resident')
@section('content')

<div class="mb-6">
    <a href="{{ route('residents.index') }}" class="text-blue-600 hover:text-blue-800">&larr; Back to List</a>
    <h1 class="text-2xl font-bold mt-2">{{ isset($resident) ? 'Edit Resident Profile' : 'Add New Resident Profile' }}</h1>
</div>

<div class="bg-white rounded-lg shadow p-8">
    {{-- Ang form action ay magbabago depende kung may $resident (Edit) o wala (Add) --}}
    <form action="{{ isset($resident) ? route('residents.update', $resident->id) : route('residents.store') }}" method="POST">
        @csrf 
        @if(isset($resident))
            @method('PUT') {{-- Kailangan ito para sa Update route --}}
        @endif

        <div class="mb-10">
            <h2 class="text-lg font-semibold text-blue-700 border-b pb-2 mb-4 italic">1. Resident Personal Profile</h2>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">First Name</label>
                    <input type="text" name="first_name" value="{{ old('first_name', $resident->first_name ?? '') }}" class="w-full py-3 px-4 border-gray-300 rounded-lg shadow-sm focus:ring-blue-500" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Middle Name</label>
                    <input type="text" name="middle_name" value="{{ old('middle_name', $resident->middle_name ?? '') }}" class="w-full py-3 px-4 border-gray-300 rounded-lg shadow-sm focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Last Name</label>
                    <input type="text" name="last_name" value="{{ old('last_name', $resident->last_name ?? '') }}" class="w-full py-3 px-4 border-gray-300 rounded-lg shadow-sm focus:ring-blue-500" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Suffix (e.g. Jr., III)</label>
                    <input type="text" name="suffix" value="{{ old('suffix', $resident->suffix ?? '') }}" class="w-full py-3 px-4 border-gray-300 rounded-lg shadow-sm focus:ring-blue-500">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Birthdate</label>
                    <input type="date" name="birthdate" value="{{ old('birthdate', isset($resident) ? $resident->birthdate->format('Y-m-d') : '') }}" class="w-full py-3 px-4 border-gray-300 rounded-lg shadow-sm focus:ring-blue-500" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Place of Birth</label>
                    <input type="text" name="birthplace" value="{{ old('birthplace', $resident->birthplace ?? '') }}" class="w-full py-3 px-4 border-gray-300 rounded-lg shadow-sm focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Gender</label>
                    <select name="gender" class="w-full py-3 px-4 border-gray-300 rounded-lg shadow-sm focus:ring-blue-500">
                        <option value="Male" {{ old('gender', $resident->gender ?? '') == 'Male' ? 'selected' : '' }}>Male</option>
                        <option value="Female" {{ old('gender', $resident->gender ?? '') == 'Female' ? 'selected' : '' }}>Female</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Civil Status</label>
                    <select name="civil_status" class="w-full py-3 px-4 border-gray-300 rounded-lg shadow-sm focus:ring-blue-500">
                        @foreach(['Single', 'Married', 'Widowed', 'Separated'] as $status)
                            <option value="{{ $status }}" {{ old('civil_status', $resident->civil_status ?? '') == $status ? 'selected' : '' }}>{{ $status }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Citizenship</label>
                    <input type="text" name="citizenship" value="{{ old('citizenship', $resident->citizenship ?? 'Filipino') }}" class="w-full py-3 px-4 border-gray-300 rounded-lg shadow-sm focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Occupation</label>
                    <input type="text" name="occupation" value="{{ old('occupation', $resident->occupation ?? '') }}" class="w-full py-3 px-4 border-gray-300 rounded-lg shadow-sm focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Voter Status</label>
                    <select name="is_voter" class="w-full py-3 px-4 border-gray-300 rounded-lg shadow-sm focus:ring-blue-500">
                        <option value="1" {{ old('is_voter', $resident->is_voter ?? '') == '1' ? 'selected' : '' }}>Registered</option>
                        <option value="0" {{ old('is_voter', $resident->is_voter ?? '') == '0' ? 'selected' : '' }}>Non-Registered</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Contact Number</label>
                    <input type="text" name="contact_number" value="{{ old('contact_number', $resident->contact_number ?? '') }}" class="w-full py-3 px-4 border-gray-300 rounded-lg shadow-sm focus:ring-blue-500">
                </div>
            </div>
        </div>

        <div class="mb-10">
            <h2 class="text-lg font-semibold text-blue-700 border-b pb-2 mb-4 italic">2. Household & Location Data</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Household ID/No.</label>
                    <input type="text" name="household_id" value="{{ old('household_id', $resident->household_id ?? '') }}" class="w-full py-3 px-4 border-gray-300 rounded-lg shadow-sm focus:ring-blue-500">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Full Address</label>
                    <input type="text" name="address" value="{{ old('address', $resident->address ?? '') }}" class="w-full py-3 px-4 border-gray-300 rounded-lg shadow-sm focus:ring-blue-500" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Home Ownership</label>
                    <select name="home_ownership" class="w-full py-3 px-4 border-gray-300 rounded-lg shadow-sm focus:ring-blue-500">
                        @foreach(['Owner', 'Tenant', 'Sharer'] as $owner)
                            <option value="{{ $owner }}" {{ old('home_ownership', $resident->home_ownership ?? '') == $owner ? 'selected' : '' }}>{{ $owner }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Head of Family?</label>
                    <select name="is_family_head" class="w-full py-3 px-4 border-gray-300 rounded-lg shadow-sm focus:ring-blue-500">
                        <option value="0" {{ old('is_family_head', $resident->is_family_head ?? '') == '0' ? 'selected' : '' }}>No</option>
                        <option value="1" {{ old('is_family_head', $resident->is_family_head ?? '') == '1' ? 'selected' : '' }}>Yes</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="flex justify-end pt-6 border-t">
            <a href="{{ route('residents.index') }}" class="bg-gray-200 text-gray-700 px-6 py-3 rounded-lg mr-2 hover:bg-gray-300">Cancel</a>
            <button type="submit" class="bg-blue-600 text-white px-10 py-3 rounded-lg hover:bg-blue-700 font-bold text-lg shadow-lg">
                {{ isset($resident) ? 'UPDATE RESIDENT DATA' : 'SUBMIT RESIDENT DATA' }}
            </button>
        </div>
    </form>
</div>

@endsection