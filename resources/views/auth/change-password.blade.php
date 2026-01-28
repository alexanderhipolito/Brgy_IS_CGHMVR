@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="mb-6">
        <p class="text-sm text-gray-500">Account Security</p>
        <h1 class="text-2xl font-bold text-gray-900">Change Password</h1>
        <p class="text-sm text-gray-600 mt-1">This UI is Fortify-compatible. Wire to Fortify `password.update` action when backend is ready.</p>
    </div>

    <div class="bg-white border border-gray-100 rounded-xl shadow-sm">
        <div class="p-6 space-y-6">
            <div>
                <h2 class="text-lg font-semibold">Update your password</h2>
                <p class="text-sm text-gray-500">Use a strong password with at least 12 characters, numbers, and symbols.</p>
            </div>
            <form class="space-y-5" action="#" method="POST">
                <div class="grid md:grid-cols-2 gap-4">
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Current Password</label>
                        <input type="password" name="current_password" class="w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="••••••••">
                        <p class="mt-1 text-xs text-gray-500">Required to confirm your identity.</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">New Password</label>
                        <input type="password" name="password" class="w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="At least 12 characters">
                        <p class="mt-1 text-xs text-gray-500">Minimum 12 characters with numbers and symbols.</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Confirm New Password</label>
                        <input type="password" name="password_confirmation" class="w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Repeat new password">
                    </div>
                </div>
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-2 text-sm text-gray-600">
                        <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0-3.866 3-7 3-7s3 3.134 3 7-3 7-3 7-3-3.134-3-7z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14" />
                        </svg>
                        <span>Passwords are encrypted and never stored in plain text.</span>
                    </div>
                    <button type="submit" class="px-5 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Save changes</button>
                </div>
            </form>
        </div>
        <div class="border-t border-gray-100 p-6 bg-gray-50 text-sm text-gray-600">
            <p class="font-semibold text-gray-800">Fortify wiring notes</p>
            <ul class="list-disc list-inside space-y-1 mt-2">
                <li>Update form `action` to route(`password.update`) and method POST.</li>
                <li>Include `@csrf` and `@method('put')` when backend is live.</li>
                <li>Display validation errors via `@error` blocks next to fields.</li>
                <li>On success, show session `status` message (e.g., `password-updated`).</li>
            </ul>
        </div>
    </div>
</div>
@endsection
