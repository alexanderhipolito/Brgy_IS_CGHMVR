@forelse($residents as $resident)
<tr class="hover:bg-slate-50/50 transition-colors">
    <td class="px-6 py-4">
        <div class="font-bold text-slate-700 uppercase text-sm">{{ $resident->last_name }}, {{ $resident->first_name }} {{ $resident->middle_name }}</div>
        <div class="text-[10px] text-slate-400 italic">{{ $resident->gender }} | {{ $resident->civil_status }}</div>
    </td>
    <td class="px-6 py-4 text-xs text-slate-600 lowercase">{{ $resident->address }}</td>
    <td class="px-6 py-4 text-center text-sm font-semibold text-slate-700">
        {{ \Carbon\Carbon::parse($resident->birthdate)->age }}
    </td>
    <td class="px-6 py-4 text-center">
        @if($resident->is_voter)
            <span class="px-3 py-1 text-[9px] font-black bg-green-100 text-green-600 rounded-md uppercase tracking-tighter">Registered</span>
        @else
            <span class="px-3 py-1 text-[9px] font-black bg-slate-100 text-slate-400 rounded-md uppercase tracking-tighter">Non-Voter</span>
        @endif
    </td>
    <td class="px-6 py-4">
        <div class="flex justify-end gap-1">
            <a href="{{ route('residents.show', $resident->id) }}" class="px-3 py-1 bg-blue-100 text-blue-600 rounded text-[10px] font-bold hover:bg-blue-600 hover:text-white transition-all">View</a>
            <a href="{{ route('residents.edit', $resident->id) }}" class="px-3 py-1 bg-indigo-100 text-indigo-600 rounded text-[10px] font-bold hover:bg-indigo-600 hover:text-white transition-all">Edit</a>
            
            <form action="{{ route('residents.destroy', $resident->id) }}" method="POST" onsubmit="return confirm('Sigurado ka ba na gusto mong burahin ito?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-3 py-1 bg-red-100 text-red-600 rounded text-[10px] font-bold hover:bg-red-600 hover:text-white transition-all">
                    Delete
                </button>
            </form>
        </div>
    </td>
</tr>
@empty
<tr>
    <td colspan="5" class="px-6 py-10 text-center text-slate-400 italic text-sm">Walang nahanap na record.</td>
</tr>
@endforelse