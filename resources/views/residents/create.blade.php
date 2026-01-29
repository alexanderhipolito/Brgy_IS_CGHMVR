@extends('layouts.app')
@section('title', isset($resident) ? 'Edit Resident' : 'Add Resident')
@section('content')

<div class="mb-6 flex items-center justify-between">
    <div class="flex items-center gap-4">
        <a href="{{ route('residents.index') }}" 
           class="group flex items-center justify-center w-10 h-10 bg-white border border-slate-200 rounded-full text-slate-600 hover:bg-blue-600 hover:text-white hover:border-blue-600 transition-all duration-300 shadow-sm">
            <svg class="w-5 h-5 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </a>
        <div>
            <h1 class="text-2xl font-bold text-slate-800 tracking-tight">{{ isset($resident) ? 'Edit Resident Profile' : 'Add New Resident Profile' }}</h1>
            <p class="text-sm text-slate-500">Ensure all information is accurate and up to date.</p>
        </div>
    </div>
</div>

<div class="bg-white rounded-[2rem] shadow-xl shadow-slate-100/50 border border-slate-100 overflow-hidden">
    <form action="{{ isset($resident) ? route('residents.update', $resident->id) : route('residents.store') }}" method="POST" class="p-8 sm:p-12">
        @csrf 
        @if(isset($resident))
            @method('PUT')
        @endif

        <div class="mb-12">
            <h2 class="flex items-center gap-2 text-sm font-black text-blue-600 uppercase tracking-[0.2em] mb-8">
                <span class="w-8 h-px bg-blue-600"></span>
                1. Resident Personal Profile
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-x-8 gap-y-6">
                <div>
                    <label class="block text-[11px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">First Name</label>
                    <input type="text" name="first_name" value="{{ old('first_name', $resident->first_name ?? '') }}" class="w-full py-4 px-5 bg-slate-50 border-transparent rounded-2xl focus:ring-4 focus:ring-blue-600/5 focus:border-blue-600 focus:bg-white outline-none transition-all" required>
                </div>
                <div>
                    <label class="block text-[11px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">Middle Name</label>
                    <input type="text" name="middle_name" value="{{ old('middle_name', $resident->middle_name ?? '') }}" class="w-full py-4 px-5 bg-slate-50 border-transparent rounded-2xl focus:ring-4 focus:ring-blue-600/5 focus:border-blue-600 focus:bg-white outline-none transition-all">
                </div>
                <div>
                    <label class="block text-[11px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">Last Name</label>
                    <input type="text" name="last_name" value="{{ old('last_name', $resident->last_name ?? '') }}" class="w-full py-4 px-5 bg-slate-50 border-transparent rounded-2xl focus:ring-4 focus:ring-blue-600/5 focus:border-blue-600 focus:bg-white outline-none transition-all" required>
                </div>
                <div>
                    <label class="block text-[11px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">Suffix</label>
                    <input type="text" name="suffix" value="{{ old('suffix', $resident->suffix ?? '') }}" class="w-full py-4 px-5 bg-slate-50 border-transparent rounded-2xl focus:ring-4 focus:ring-blue-600/5 focus:border-blue-600 focus:bg-white outline-none transition-all" placeholder="e.g. Jr.">
                </div>
                
                <div>
                    <label class="block text-[11px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">Birthdate</label>
                    <input type="date" name="birthdate" value="{{ old('birthdate', isset($resident) ? $resident->birthdate->format('Y-m-d') : '') }}" class="w-full py-4 px-5 bg-slate-50 border-transparent rounded-2xl focus:ring-4 focus:ring-blue-600/5 focus:border-blue-600 focus:bg-white outline-none transition-all" required>
                </div>
                <div>
                    <label class="block text-[11px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">Place of Birth</label>
                    <input type="text" name="birthplace" value="{{ old('birthplace', $resident->birthplace ?? '') }}" class="w-full py-4 px-5 bg-slate-50 border-transparent rounded-2xl focus:ring-4 focus:ring-blue-600/5 focus:border-blue-600 focus:bg-white outline-none transition-all">
                </div>
                <div>
                    <label class="block text-[11px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">Gender</label>
                    <select name="gender" class="w-full py-4 px-5 bg-slate-50 border-transparent rounded-2xl focus:ring-4 focus:ring-blue-600/5 focus:border-blue-600 focus:bg-white outline-none transition-all appearance-none">
                        <option value="Male" {{ old('gender', $resident->gender ?? '') == 'Male' ? 'selected' : '' }}>Male</option>
                        <option value="Female" {{ old('gender', $resident->gender ?? '') == 'Female' ? 'selected' : '' }}>Female</option>
                    </select>
                </div>
                <div>
                    <label class="block text-[11px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">Civil Status</label>
                    <select name="civil_status" class="w-full py-4 px-5 bg-slate-50 border-transparent rounded-2xl focus:ring-4 focus:ring-blue-600/5 focus:border-blue-600 focus:bg-white outline-none transition-all appearance-none">
                        @foreach(['Single', 'Married', 'Widowed', 'Separated'] as $status)
                            <option value="{{ $status }}" {{ old('civil_status', $resident->civil_status ?? '') == $status ? 'selected' : '' }}>{{ $status }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-[11px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">Citizenship</label>
                    <input type="text" name="citizenship" value="{{ old('citizenship', $resident->citizenship ?? 'Filipino') }}" class="w-full py-4 px-5 bg-slate-50 border-transparent rounded-2xl focus:ring-4 focus:ring-blue-600/5 focus:border-blue-600 focus:bg-white outline-none transition-all">
                </div>
                <div>
                    <label class="block text-[11px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">Occupation</label>
                    <input type="text" name="occupation" value="{{ old('occupation', $resident->occupation ?? '') }}" class="w-full py-4 px-5 bg-slate-50 border-transparent rounded-2xl focus:ring-4 focus:ring-blue-600/5 focus:border-blue-600 focus:bg-white outline-none transition-all">
                </div>
                <div>
                    <label class="block text-[11px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">Voter Status</label>
                    <select name="is_voter" class="w-full py-4 px-5 bg-slate-50 border-transparent rounded-2xl focus:ring-4 focus:ring-blue-600/5 focus:border-blue-600 focus:bg-white outline-none transition-all appearance-none">
                        <option value="1" {{ old('is_voter', $resident->is_voter ?? '') == '1' ? 'selected' : '' }}>Registered</option>
                        <option value="0" {{ old('is_voter', $resident->is_voter ?? '') == '0' ? 'selected' : '' }}>Non-Registered</option>
                    </select>
                </div>
                <div>
                    <label class="block text-[11px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">Contact Number</label>
                    <input type="text" name="contact_number" value="{{ old('contact_number', $resident->contact_number ?? '') }}" class="w-full py-4 px-5 bg-slate-50 border-transparent rounded-2xl focus:ring-4 focus:ring-blue-600/5 focus:border-blue-600 focus:bg-white outline-none transition-all" placeholder="09xxxxxxxxx">
                </div>
            </div>
        </div>

        <div class="mb-12">
            <h2 class="flex items-center gap-2 text-sm font-black text-blue-600 uppercase tracking-[0.2em] mb-8">
                <span class="w-8 h-px bg-blue-600"></span>
                2. Household & Location Data
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <label class="block text-[11px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">Household No.</label>
                    <input type="text" name="household_id" value="{{ old('household_id', $resident->household_id ?? '') }}" class="w-full py-4 px-5 bg-slate-50 border-transparent rounded-2xl focus:ring-4 focus:ring-blue-600/5 focus:border-blue-600 focus:bg-white outline-none transition-all">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-[11px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">Full Address</label>
                    <input type="text" name="address" value="{{ old('address', $resident->address ?? '') }}" class="w-full py-4 px-5 bg-slate-50 border-transparent rounded-2xl focus:ring-4 focus:ring-blue-600/5 focus:border-blue-600 focus:bg-white outline-none transition-all" placeholder="Block, Street, Brgy, City" required>
                </div>
                <div>
                    <label class="block text-[11px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">Home Ownership</label>
                    <select name="home_ownership" class="w-full py-4 px-5 bg-slate-50 border-transparent rounded-2xl focus:ring-4 focus:ring-blue-600/5 focus:border-blue-600 focus:bg-white outline-none transition-all appearance-none">
                        @foreach(['Owner', 'Tenant', 'Sharer'] as $owner)
                            <option value="{{ $owner }}" {{ old('home_ownership', $resident->home_ownership ?? '') == $owner ? 'selected' : '' }}>{{ $owner }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-[11px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">Head of Family?</label>
                    <select name="is_family_head" class="w-full py-4 px-5 bg-slate-50 border-transparent rounded-2xl focus:ring-4 focus:ring-blue-600/5 focus:border-blue-600 focus:bg-white outline-none transition-all appearance-none">
                        <option value="0" {{ old('is_family_head', $resident->is_family_head ?? '') == '0' ? 'selected' : '' }}>No</option>
                        <option value="1" {{ old('is_family_head', $resident->is_family_head ?? '') == '1' ? 'selected' : '' }}>Yes</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="flex items-center justify-end gap-4 pt-10 border-t border-slate-50">
            <a href="{{ route('residents.index') }}" 
               class="px-8 py-4 text-sm font-bold text-slate-400 hover:text-slate-600 transition-colors uppercase tracking-widest">
                Cancel
            </a>
            <button type="submit" 
                    class="relative px-10 py-4 bg-slate-900 hover:bg-blue-600 text-white font-black text-sm uppercase tracking-widest rounded-2xl shadow-xl shadow-slate-200 hover:shadow-blue-200 transition-all duration-300 transform active:scale-95 flex items-center gap-3 group">
                <span>{{ isset($resident) ? 'Update Resident' : 'Save Resident' }}</span>
                <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                </svg>
            </button>
        </div>
    </form>
</div>

@endsection