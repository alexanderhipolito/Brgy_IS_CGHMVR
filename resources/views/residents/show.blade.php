@extends('layouts.app')

@section('title', 'Resident Details')

@section('content')
{{-- Header Section with Circle Back Button --}}
<div class="mb-8 flex flex-col md:flex-row justify-between items-center gap-4">
    <div class="flex items-center gap-4">
        {{-- Circle Back Button --}}
        <a href="{{ route('residents.index') }}" 
           class="flex items-center justify-center w-10 h-10 bg-white border border-slate-200 rounded-full text-slate-600 hover:text-blue-600 hover:border-blue-100 hover:shadow-md transition-all duration-300 shadow-sm group">
            <svg class="w-5 h-5 group-hover:-translate-x-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7" />
            </svg>
        </a>

        <div>
            <h1 class="text-2xl font-bold text-slate-800 tracking-tight">Resident Profile View</h1>
            <p class="text-sm text-slate-500 font-medium tracking-tight">Reviewing personal and household information.</p>
        </div>
    </div>

    <div class="flex items-center gap-3">
        {{-- Action Button Styled like "Add New Resident" --}}
        <a href="{{ route('residents.edit', $resident->id) }}" 
           class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-lg font-bold text-sm shadow-sm transition-all flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
            </svg>
            Edit Profile
        </a>
    </div>
</div>

<div class="max-w-5xl space-y-6">
    {{-- Personal Profile Card --}}
    <div class="bg-white rounded-xl shadow-sm border border-slate-100 overflow-hidden">
        <div class="bg-slate-50/50 px-6 py-4 border-b border-slate-100">
            <h3 class="text-sm font-black text-slate-400 uppercase tracking-widest">1. Personal Profile</h3>
        </div>
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-y-6 gap-x-8">
                <div>
                    <dt class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Full Name</dt>
                    <dd class="mt-1 text-lg text-slate-700 font-black uppercase tracking-tight">
                        {{ $resident->first_name }} {{ $resident->middle_name }} {{ $resident->last_name }} {{ $resident->suffix }}
                    </dd>
                </div>
                <div>
                    <dt class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Birth Information</dt>
                    <dd class="mt-1 text-sm text-slate-600">
                        <strong class="text-slate-800">{{ \Carbon\Carbon::parse($resident->birthdate)->format('F d, Y') }}</strong> 
                        <span class="text-slate-400 ml-1 italic">({{ \Carbon\Carbon::parse($resident->birthdate)->age }} yrs old)</span>
                        <br><span class="text-xs text-slate-400 italic font-medium">Place of Birth: {{ $resident->birthplace ?? 'Not Specified' }}</span>
                    </dd>
                </div>
                <div>
                    <dt class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Gender & Civil Status</dt>
                    <dd class="mt-1 text-sm text-slate-700 font-semibold uppercase">
                        {{ $resident->gender }} <span class="text-slate-300 mx-2">|</span> {{ $resident->civil_status }}
                    </dd>
                </div>
                <div>
                    <dt class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Citizenship & Occupation</dt>
                    <dd class="mt-1 text-sm text-slate-700 font-semibold uppercase">
                        {{ $resident->citizenship }} <span class="text-slate-300 mx-2">|</span> {{ $resident->occupation ?? 'None/Unemployed' }}
                    </dd>
                    
                    <div class="mt-4 pt-4 border-t border-slate-50">
                        <dt class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Contact Number</dt>
                        <dd class="mt-1 text-lg text-blue-600 font-black">
                            {{ $resident->contact_number ?? '---' }}
                        </dd>
                    </div>
                </div>
                <div>
                    <dt class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Voter Status</dt>
                    <dd class="mt-1">
                        @if($resident->is_voter)
                            <span class="px-3 py-1 text-[10px] font-black bg-green-100 text-green-600 rounded-md uppercase italic">REGISTERED VOTER</span>
                        @else
                            <span class="px-3 py-1 text-[10px] font-black bg-slate-100 text-slate-400 rounded-md uppercase italic">NON-VOTER</span>
                        @endif
                    </dd>
                </div>
            </div>
        </div>
    </div>

    {{-- Household & Location Card --}}
    <div class="bg-white rounded-xl shadow-sm border border-slate-100 overflow-hidden">
        <div class="bg-slate-50/50 px-6 py-4 border-b border-slate-100">
            <h3 class="text-sm font-black text-slate-400 uppercase tracking-widest">2. Household & Location</h3>
        </div>
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="md:col-span-2">
                    <dt class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Full Address</dt>
                    <dd class="mt-1 text-sm text-slate-700 font-bold uppercase">{{ $resident->address }}</dd>
                </div>
                <div>
                    <dt class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Household ID</dt>
                    <dd class="mt-1 text-sm text-slate-600 font-mono font-bold">{{ $resident->household_id ?? 'N/A' }}</dd>
                </div>
                <div>
                    <dt class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Ownership & Role</dt>
                    <dd class="mt-1 text-sm text-slate-700 font-bold uppercase">
                        {{ $resident->home_ownership }} 
                        {!! $resident->is_family_head ? '<span class="ml-2 text-indigo-600 italic tracking-tighter">(Head of Family)</span>' : '' !!}
                    </dd>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection