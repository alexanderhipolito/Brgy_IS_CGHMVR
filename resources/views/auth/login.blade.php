<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | Barangay Information System</title>
    
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
                <h2 class="text-2xl font-bold text-slate-800">Administrator Login</h2>
                <p class="text-slate-500 mt-2 font-medium">Please enter your credentials to access the portal.</p>
            </div>

            <form id="login-form" action="{{ route('login') }}" method="POST" class="space-y-7">
                @csrf
                
                <div class="space-y-2">
                    <label class="text-[11px] font-black text-slate-400 uppercase tracking-widest ml-2">Email Address</label>
                    <input type="email" name="email" value="{{ old('email') }}" required
                        class="w-full px-6 py-5 bg-slate-50 border border-transparent rounded-2xl focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 focus:bg-white outline-none transition-all text-lg text-slate-700 placeholder-slate-300 shadow-sm"
                        placeholder="admin@barangay.gov" autofocus>
                    @error('email')
                        <p class="text-xs text-red-500 font-bold mt-2 ml-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-2">
                    <div class="flex justify-between items-center px-2">
                        <label class="text-[11px] font-black text-slate-400 uppercase tracking-widest">Password</label>
                        <a href="#" class="text-xs font-bold text-blue-600 hover:text-blue-700 transition">Forgot password?</a>
                    </div>
                    <input type="password" name="password" required
                        class="w-full px-6 py-5 bg-slate-50 border border-transparent rounded-2xl focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 focus:bg-white outline-none transition-all text-lg text-slate-700 placeholder-slate-300 shadow-sm"
                        placeholder="Password">
                </div>

                <div class="flex items-center px-2">
                    <label class="flex items-center cursor-pointer group">
                        <input type="checkbox" name="remember" class="w-5 h-5 rounded-lg border-slate-300 text-blue-600 focus:ring-blue-500 cursor-pointer transition">
                        <span class="ml-3 text-sm font-semibold text-slate-500 group-hover:text-slate-700 transition">Keep me signed in</span>
                    </label>
                </div>

                <button type="submit" 
                    class="w-full py-5 bg-slate-900 hover:bg-blue-600 text-white font-extrabold text-lg rounded-2xl shadow-xl shadow-slate-200 transition-all duration-300 transform active:scale-[0.98] flex items-center justify-center gap-3 group">
                    <span>Sign In</span>
                   
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                    </svg>
                </button>
            </form>
        </div>

        <div class="mt-12 text-center text-[10px] font-bold text-slate-300 uppercase tracking-[0.5em]">
            Official Barangay Digital Portal &bull; 2026
        </div>
    </div>

    <script src="{{ asset('js/login-handler.js') }}"></script>
</body>
</html>