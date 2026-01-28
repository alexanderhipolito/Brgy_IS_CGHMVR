<aside class="fixed left-0 top-0 h-screen w-72 bg-white border-r border-slate-100 flex flex-col z-50">
    
    <div class="p-8 flex items-center justify-center">
        <div class="w-16 h-16 rounded-2xl flex items-center justify-center shadow-lg overflow-hidden">
            <img src="{{ asset('favicon.png') }}" alt="Barangay Logo" class="w-full h-full object-cover">
        </div>
    </div>

    <nav class="flex-1 px-4 space-y-1 overflow-y-auto">
        <div class="px-4 py-4">
            <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.3em]">Main Menu</p>
        </div>

        <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-4 px-4 py-4 rounded-2xl transition-all group {{ request()->routeIs('admin.dashboard') ? 'bg-blue-50 text-blue-600' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-900' }}">
            <svg class="w-6 h-6 {{ request()->routeIs('admin.dashboard') ? '' : 'opacity-40 group-hover:opacity-100' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-3m0 0l7-4 7 4M5 5v14a1 1 0 001 1h12a1 1 0 001-1V5m-9 5h4" />
            </svg>
            <span class="font-bold text-[15px]">Dashboard</span>
        </a>

        <a href="{{ route('residents.index') }}" class="flex items-center gap-4 px-4 py-4 rounded-2xl transition-all group {{ request()->routeIs('residents.index') || request()->routeIs('residents.show') || request()->routeIs('residents.edit') ? 'bg-blue-50 text-blue-600' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-900' }}">
            <svg class="w-6 h-6 {{ request()->routeIs('residents.index') || request()->routeIs('residents.show') || request()->routeIs('residents.edit') ? '' : 'opacity-40 group-hover:opacity-100' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
            </svg>
            <span class="font-bold text-[15px]">Residents List</span>
        </a>

        <a href="{{ route('residents.create') }}" class="flex items-center gap-4 px-4 py-4 rounded-2xl transition-all group {{ request()->routeIs('residents.create') ? 'bg-blue-50 text-blue-600' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-900' }}">
            <svg class="w-6 h-6 {{ request()->routeIs('residents.create') ? '' : 'opacity-40 group-hover:opacity-100' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
            </svg>
            <span class="font-bold text-[15px]">Add Resident</span>
        </a>

        <a href="{{ route('demographic.index') }}" class="flex items-center gap-4 px-4 py-4 rounded-2xl transition-all group {{ request()->routeIs('demographic.*') ? 'bg-blue-50 text-blue-600' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-900' }}">
            <svg class="w-6 h-6 {{ request()->routeIs('demographic.*') ? '' : 'opacity-40 group-hover:opacity-100' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z" />
            </svg>
            <span class="font-bold text-[15px]">Demographic</span>
        </a>
    </nav>
</aside>