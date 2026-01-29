<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Barangay Information System' }}</title>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}?v=1">
    <link rel="apple-touch-icon" href="{{ asset('favicon.png') }}?v=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-900">
    @include('layouts.sidebar')

    <div class="ml-72">
        <div class="flex items-center justify-end gap-3 p-4 md:px-8 pb-0">
            <button class="relative p-2 rounded-full hover:bg-slate-100 transition">
                <svg class="w-6 h-6 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                </svg>
                <span class="absolute top-2 right-2 inline-flex h-2 w-2 bg-red-500 rounded-full"></span>
            </button>
            
            <div class="relative" id="user-menu">
                <button onclick="toggleUserMenu()" class="flex items-center gap-2 px-3 py-2 rounded-full bg-white border border-slate-200 shadow-sm hover:shadow transition">
                    <img src="{{ asset('favicon.png') }}" class="w-8 h-8 rounded-full object-cover" alt="Profile">
                    <span class="text-sm font-semibold text-slate-800">{{ Auth::user()->name ?? 'Admin' }}</span>
                    <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div id="user-dropdown" class="hidden absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-lg shadow-lg text-sm z-50">
                    <div class="px-4 py-2 border-b border-gray-100">
                        <p class="font-semibold">{{ Auth::user()->name ?? 'Administrator' }}</p>
                        <p class="text-gray-500 text-xs">{{ Auth::user()->email ?? 'Admin User' }}</p>
                    </div>
                    <div class="border-t border-gray-100"></div>
                     <form action="{{ route('logout') }}" method="POST">
                         @csrf
                        <button type="submit" class="w-full text-left block px-4 py-2 text-red-600 hover:bg-red-50">Sign out</button>
                    </form>
                </div>
            </div>
        </div>

        <main class="p-4 md:p-8 min-h-screen">
            @yield('content')
        </main>
    </div>

    <script>
        function toggleUserMenu() {
            const dropdown = document.getElementById('user-dropdown');
            dropdown.classList.toggle('hidden');
        }

        window.onclick = function(event) {
            if (!event.target.closest('#user-menu')) {
                const dropdown = document.getElementById('user-dropdown');
                if (dropdown && !dropdown.classList.contains('hidden')) {
                    dropdown.classList.add('hidden');
                }
            }
        }
    </script>
</body>
</html>