@extends('layouts.app')

@section('title', 'Residents List')

@section('content')
<div class="mb-6 flex flex-col md:flex-row justify-between items-end gap-4">
    <div>
        <h1 class="text-2xl font-bold text-slate-800">Residents List</h1>
        <p class="text-sm text-slate-500 italic">List of all registered residents in the barangay.</p>
    </div>

    <div class="flex items-center gap-3">
        <div class="relative group">
            <input type="text" id="search-input" name="search" value="{{ request('search') }}" 
                   placeholder="Search residents..." autocomplete="off"
                   class="pl-10 pr-4 py-2 bg-white border border-slate-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all text-sm w-64 shadow-sm">
            <div class="absolute left-3 top-2.5 text-slate-400">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
        </div>

        <a href="{{ route('residents.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg font-bold text-sm hover:bg-blue-700 transition-all flex items-center gap-2 shadow-sm">
            <span>+ Add New Resident</span>
        </a>
    </div>
</div>

<div class="bg-white rounded-xl shadow-sm border border-slate-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="border-b border-slate-100">
                    <th class="px-6 py-4 text-[11px] font-bold text-slate-400 uppercase tracking-wider">Full Name</th>
                    <th class="px-6 py-4 text-[11px] font-bold text-slate-400 uppercase tracking-wider">Address</th>
                    <th class="px-6 py-4 text-[11px] font-bold text-slate-400 uppercase tracking-wider text-center">Age</th>
                    <th class="px-6 py-4 text-[11px] font-bold text-slate-400 uppercase tracking-wider text-center">Voter Status</th>
                    <th class="px-6 py-4 text-[11px] font-bold text-slate-400 uppercase tracking-wider text-right">Actions</th>
                </tr>
            </thead>
            <tbody id="residents-table-body" class="divide-y divide-slate-50">
                @include('residents.partials.table-rows')
            </tbody>
        </table>
    </div>
</div>

<div class="mt-4" id="pagination-links">
    {{ $residents->links() }}
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        let timer;
        let fetchResidents = function(query) {
            $.ajax({
                url: "{{ route('residents.index') }}",
                type: 'GET',
                data: { 'search': query },
                beforeSend: function() {
                    $('#residents-table-body').css('opacity', '0.5');
                },
                success: function(data) {
                    $('#residents-table-body').html(data).css('opacity', '1');
                }
            });
        };

        $('#search-input').on('keyup', function() {
            clearTimeout(timer); // I-reset ang timer sa bawat pindot
            let query = $(this).val();
            timer = setTimeout(function() {
                fetchResidents(query);
            }, 300); // Maghihintay ng 0.3 seconds bago mag-search
        });
    });
</script>
@endsection