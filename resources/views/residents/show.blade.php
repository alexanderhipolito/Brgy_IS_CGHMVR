@extends('layouts.app')
@section('title', 'Resident Details')
@section('content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <a href="{{ route('residents.index') }}" class="text-blue-600 hover:text-blue-800">&larr; Back to List</a>
        <h1 class="text-2xl font-bold mt-2">Resident Details</h1>
    </div>
</div>

{{-- Layout changed to a simpler single column or 2/3 width to handle the removed sidebar --}}
<div class="max-w-5xl space-y-6">
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="bg-blue-50 px-6 py-4 border-b border-blue-100">
            <h3 class="text-lg font-bold text-blue-800 uppercase tracking-wide">1. Personal Profile</h3>
        </div>
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-y-6 gap-x-8">
                <div>
                    <dt class="text-xs font-semibold text-gray-500 uppercase">Full Name</dt>
                    <dd class="mt-1 text-lg text-gray-900 font-bold uppercase">
                        {{ $resident->first_name }} {{ $resident->middle_name }} {{ $resident->last_name }} {{ $resident->suffix }}
                    </dd>
                </div>
                <div>
                    <dt class="text-xs font-semibold text-gray-500 uppercase">Birth Information</dt>
                    <dd class="mt-1 text-sm text-gray-900">
                        <strong>{{ \Carbon\Carbon::parse($resident->birthdate)->format('F d, Y') }}</strong> 
                        <span class="text-gray-500 ml-1">({{ \Carbon\Carbon::parse($resident->birthdate)->age }} yrs old)</span>
                        <br><span class="text-xs italic text-gray-500">Born in: {{ $resident->birthplace ?? 'Not Specified' }}</span>
                    </dd>
                </div>
                <div>
                    <dt class="text-xs font-semibold text-gray-500 uppercase">Gender & Civil Status</dt>
                    <dd class="mt-1 text-sm text-gray-900">
                        {{ $resident->gender }} | {{ $resident->civil_status }}
                    </dd>
                </div>
                <div>
                    <dt class="text-xs font-semibold text-gray-500 uppercase">Citizenship & Occupation</dt>
                    <dd class="mt-1 text-sm text-gray-900">
                        {{ $resident->citizenship }} | {{ $resident->occupation ?? 'None/Unemployed' }}
                    </dd>
                    {{-- CONTACT NUMBER MOVED HERE --}}
                    <div class="mt-4 pt-4 border-t border-gray-50">
                        <dt class="text-xs font-semibold text-gray-500 uppercase">Contact Number</dt>
                        <dd class="mt-1 text-lg text-blue-600 font-bold">
                            {{ $resident->contact_number ?? 'No Number' }}
                        </dd>
                    </div>
                </div>
                <div>
                    <dt class="text-xs font-semibold text-gray-500 uppercase">Voter Status</dt>
                    <dd class="mt-1">
                        @if($resident->is_voter)
                            <span class="px-3 py-1 text-xs font-bold bg-green-100 text-green-700 rounded-full italic">REGISTERED VOTER</span>
                        @else
                            <span class="px-3 py-1 text-xs font-bold bg-gray-100 text-gray-500 rounded-full italic">NON-VOTER</span>
                        @endif
                    </dd>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="bg-blue-50 px-6 py-4 border-b border-blue-100">
            <h3 class="text-lg font-bold text-blue-800 uppercase tracking-wide">2. Household & Location</h3>
        </div>
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="md:col-span-2">
                    <dt class="text-xs font-semibold text-gray-500 uppercase">Full Address</dt>
                    <dd class="mt-1 text-sm text-gray-900 font-medium">{{ $resident->address }}</dd>
                </div>
                <div>
                    <dt class="text-xs font-semibold text-gray-500 uppercase">Household ID</dt>
                    <dd class="mt-1 text-sm text-gray-900 font-mono">{{ $resident->household_id ?? 'N/A' }}</dd>
                </div>
                <div>
                    <dt class="text-xs font-semibold text-gray-500 uppercase">Ownership & Role</dt>
                    <dd class="mt-1 text-sm text-gray-900">
                        {{ $resident->home_ownership }} 
                        {!! $resident->is_family_head ? '<span class="ml-2 font-bold text-indigo-600">(Head of Family)</span>' : '' !!}
                    </dd>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection