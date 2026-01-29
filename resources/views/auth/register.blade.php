<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account | Barangay Information System</title>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}?v=1">
    <link rel="apple-touch-icon" href="{{ asset('favicon.png') }}?v=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#f8fafc] min-h-screen flex items-center justify-center p-6 antialiased">

    <div class="w-full max-w-xl">
        <div class="flex items-center justify-center gap-5 mb-12">
            <img src="{{ asset('favicon.png') }}?v=1" alt="Logo" class="w-16 h-16 object-contain">
            <div class="flex flex-col">
                <h1 class="text-4xl font-black text-slate-900 tracking-tight leading-none">
                    Barangay <span class="text-blue-600">IS</span>
                </h1>
                <p class="text-slate-400 text-xs font-bold uppercase tracking-[0.3em] mt-1.5 ml-0.5">
                    Information System
                </p>
            </div>
        </div>

        <div class="bg-white rounded-[2.5rem] shadow-[0_20px_60px_-15px_rgba(0,0,0,0.05)] border border-slate-100 p-10 sm:p-14">
            <div class="mb-10 text-center sm:text-left">
                <h2 class="text-2xl font-bold text-slate-800">Create Admin Account</h2>
                <p class="text-slate-500 mt-2 font-medium">Register a new administrator to manage the portal.</p>
            </div>

            <form action="{{ route('register.post') }}" method="POST" class="space-y-6">
                @csrf
                
                <div class="space-y-2">
                    <label class="text-[11px] font-black text-slate-400 uppercase tracking-widest ml-2">Full Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" required
                        class="w-full px-6 py-4 bg-slate-50 border border-transparent rounded-2xl focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 focus:bg-white outline-none transition-all text-lg text-slate-700 placeholder-slate-300 shadow-sm"
                        placeholder="Juan Dela Cruz" autofocus>
                </div>

                <div class="space-y-2">
                    <label class="text-[11px] font-black text-slate-400 uppercase tracking-widest ml-2">Email Address</label>
                    <input type="email" name="email" value="{{ old('email') }}" required
                        class="w-full px-6 py-4 bg-slate-50 border border-transparent rounded-2xl focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 focus:bg-white outline-none transition-all text-lg text-slate-700 placeholder-slate-300 shadow-sm"
                        placeholder="admin@barangay.gov">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="space-y-2">
                        <label class="text-[11px] font-black text-slate-400 uppercase tracking-widest ml-2">Password</label>
                        <input type="password" name="password" required
                            class="w-full px-6 py-4 bg-slate-50 border border-transparent rounded-2xl focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 focus:bg-white outline-none transition-all text-lg text-slate-700 placeholder-slate-300 shadow-sm"
                            placeholder="••••••••">
                    </div>
                    <div class="space-y-2">
                        <label class="text-[11px] font-black text-slate-400 uppercase tracking-widest ml-2">Confirm</label>
                        <input type="password" name="password_confirmation" required
                            class="w-full px-6 py-4 bg-slate-50 border border-transparent rounded-2xl focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 focus:bg-white outline-none transition-all text-lg text-slate-700 placeholder-slate-300 shadow-sm"
                            placeholder="••••••••">
                    </div>
                </div>

                <button type="submit" 
                    class="w-full py-5 mt-4 bg-slate-900 hover:bg-blue-600 text-white font-extrabold text-lg rounded-2xl shadow-xl shadow-slate-200 transition-all duration-300 transform active:scale-[0.98]">
                    Register Account
                </button>
            </form>

            <div class="mt-10 pt-8 border-t border-slate-50 text-center">
                <p class="text-sm text-slate-500 font-medium">
                    Already have an account? 
                    <a href="{{ route('login') }}" class="text-blue-600 font-bold hover:underline ml-1">Sign In here</a>
                </p>
            </div>
        </div>

        <div class="mt-12 text-center text-[10px] font-bold text-slate-300 uppercase tracking-[0.5em]">
            Official Barangay Digital Portal &bull; 2026
        </div>
    </div>
</body>
</html>