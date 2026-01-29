<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password | Barangay IS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#f8fafc] min-h-screen flex items-center justify-center p-6 antialiased">

    <div class="w-full max-w-xl">
        <div class="bg-white rounded-[2.5rem] shadow-[0_20px_60px_-15px_rgba(0,0,0,0.05)] border border-slate-100 p-10 sm:p-14">
            
            <div class="mb-10 text-center sm:text-left">
                <h2 class="text-2xl font-bold text-slate-800">Reset Password</h2>
                <p class="text-slate-500 mt-2 font-medium">Forgot your password? No problem. Just let us know your email address.</p>
            </div>

            @if(session('success'))
                <div class="mb-6 p-4 bg-green-50 border-l-4 border-green-500 text-green-700 text-sm font-bold rounded-r-xl">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('password.email') }}" method="POST" class="space-y-7">
                @csrf
                <div class="space-y-2">
                    <label class="text-[11px] font-black text-slate-400 uppercase tracking-widest ml-2">Email Address</label>
                    <input type="email" name="email" required
                        class="w-full px-6 py-5 bg-slate-50 border border-transparent rounded-2xl focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 focus:bg-white outline-none transition-all text-lg text-slate-700 placeholder-slate-300 shadow-sm"
                        placeholder="admin@barangay.gov" autofocus>
                </div>

                <button type="submit" 
                    class="w-full py-5 bg-slate-900 hover:bg-blue-600 text-white font-extrabold text-lg rounded-2xl shadow-xl shadow-slate-200 transition-all duration-300 transform active:scale-[0.98]">
                    Email Password Reset Link
                </button>
            </form>

            <div class="mt-10 pt-8 border-t border-slate-50 text-center">
                <a href="{{ route('login') }}" class="text-sm font-bold text-blue-600 hover:text-blue-700 transition">
                    &larr; Back to Login
                </a>
            </div>
        </div>
    </div>
</body>
</html>