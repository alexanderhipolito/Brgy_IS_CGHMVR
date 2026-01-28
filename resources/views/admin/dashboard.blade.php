@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="space-y-6">

    <!-- Top bar with title + actions -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-bold text-slate-900">Dashboard</h1>
            <p class="text-slate-500 text-sm">Overview of barangay operations</p>
        </div>
    </div>

    <!-- Summary cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        @php
            $stats = [
                ['label' => 'Total Population', 'value' => '12,450', 'color' => 'blue', 'trend' => '+5.2%'],
                ['label' => 'Households', 'value' => '3,280', 'color' => 'emerald', 'trend' => '+2.1%'],
                ['label' => 'Blotter Cases', 'value' => '47', 'color' => 'orange', 'trend' => '+12%'],
            ];
        @endphp
                    @foreach ($stats as $item)
                        <div class="bg-white border border-slate-200 rounded-xl p-5 shadow-sm flex items-center justify-between">
                            <div>
                                <p class="text-xs font-semibold text-slate-500 uppercase">{{ $item['label'] }}</p>
                                <p class="text-2xl font-bold text-slate-900 mt-1">{{ $item['value'] }}</p>
                                <p class="text-xs font-semibold text-{{ $item['color'] }}-600 mt-1">{{ $item['trend'] }} vs last mo.</p>
                            </div>
                            <div class="w-10 h-10 rounded-lg bg-{{ $item['color'] }}-100 text-{{ $item['color'] }}-700 flex items-center justify-center font-bold">
                                •
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Staff Accounts -->
                <div class="bg-white border border-slate-200 rounded-xl shadow-sm">
                        <div class="p-4 border-b border-slate-200 flex items-center justify-between">
                            <div>
                                <h2 class="text-lg font-bold text-slate-900">Staff Accounts</h2>
                                <p class="text-xs text-slate-500">UI only, dummy data</p>
                            </div>
                            <button class="px-4 py-2 bg-blue-600 text-white text-sm font-semibold rounded-lg hover:bg-blue-700 transition">+ Add Staff</button>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm">
                                <thead class="bg-slate-50 text-slate-600 uppercase text-xs">
                                    <tr>
                                        <th class="px-4 py-3 text-left">Name</th>
                                        <th class="px-4 py-3 text-left">Email</th>
                                        <th class="px-4 py-3 text-left">Role</th>
                                        <th class="px-4 py-3 text-left">Status</th>
                                        <th class="px-4 py-3 text-left">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-100">
                                    @foreach ([
                                        ['name' => 'Juan Dela Cruz', 'email' => 'juan@barangay.gov', 'role' => 'Staff', 'status' => 'Active'],
                                        ['name' => 'Maria Buendia', 'email' => 'maria@barangay.gov', 'role' => 'Staff', 'status' => 'Active'],
                                        ['name' => 'Ramon Castillo', 'email' => 'ramon@barangay.gov', 'role' => 'Staff', 'status' => 'Deactivated'],
                                    ] as $row)
                                        <tr class="hover:bg-slate-50">
                                            <td class="px-4 py-3 font-semibold text-slate-900">{{ $row['name'] }}</td>
                                            <td class="px-4 py-3 text-slate-600">{{ $row['email'] }}</td>
                                            <td class="px-4 py-3">
                                                <span class="px-2 py-1 rounded-full bg-blue-50 text-blue-700 text-xs font-semibold">{{ $row['role'] }}</span>
                                            </td>
                                            <td class="px-4 py-3">
                                                @if ($row['status'] === 'Active')
                                                    <span class="px-2 py-1 rounded-full bg-emerald-50 text-emerald-700 text-xs font-semibold">Active</span>
                                                @else
                                                    <span class="px-2 py-1 rounded-full bg-red-50 text-red-700 text-xs font-semibold">Deactivated</span>
                                                @endif
                                            </td>
                                            <td class="px-4 py-3 flex gap-2 text-xs font-semibold">
                                                <button class="px-3 py-1 rounded bg-slate-100 text-slate-700 hover:bg-slate-200">Edit</button>
                                                <button class="px-3 py-1 rounded bg-red-100 text-red-700 hover:bg-red-200">Deactivate</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                <!-- Reports + Activity -->
                <div class="grid grid-cols-1 xl:grid-cols-3 gap-4">
                    <div class="bg-white border border-slate-200 rounded-xl shadow-sm p-4">
                        <div class="flex items-center justify-between mb-4">
                            <h2 class="text-lg font-bold text-slate-900">Demographics</h2>
                            <div class="flex gap-2 text-xs font-semibold">
                                <button class="px-3 py-1 border border-slate-200 rounded-lg hover:bg-slate-50">Excel</button>
                                <button class="px-3 py-1 border border-slate-200 rounded-lg hover:bg-slate-50">PDF</button>
                            </div>
                        </div>
                        <div class="space-y-3 text-sm">
                            <div>
                                <div class="flex justify-between text-slate-700 font-semibold">
                                    <span>Senior Citizens</span><span>2,840</span>
                                </div>
                                <div class="h-2 bg-slate-100 rounded-full overflow-hidden mt-1">
                                    <div class="h-full bg-purple-600" style="width: 65%"></div>
                                </div>
                            </div>
                            <div>
                                <div class="flex justify-between text-slate-700 font-semibold">
                                    <span>Youth (15-30)</span><span>4,210</span>
                                </div>
                                <div class="h-2 bg-slate-100 rounded-full overflow-hidden mt-1">
                                    <div class="h-full bg-blue-600" style="width: 35%"></div>
                                </div>
                            </div>
                            <div>
                                <div class="flex justify-between text-slate-700 font-semibold">
                                    <span>Children (0-14)</span><span>5,400</span>
                                </div>
                                <div class="h-2 bg-slate-100 rounded-full overflow-hidden mt-1">
                                    <div class="h-full bg-emerald-600" style="width: 45%"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="xl:col-span-2 bg-white border border-slate-200 rounded-xl shadow-sm">
                        <div class="p-4 border-b border-slate-200">
                            <h2 class="text-lg font-bold text-slate-900">Activity Logs</h2>
                            <p class="text-xs text-slate-500">Dummy data, UI only</p>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm">
                                <thead class="bg-slate-50 text-slate-600 uppercase text-xs">
                                    <tr>
                                        <th class="px-4 py-3 text-left">User</th>
                                        <th class="px-4 py-3 text-left">Action</th>
                                        <th class="px-4 py-3 text-left">Date & Time</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-100">
                                    @foreach ([
                                        ['user' => 'Juan Dela Cruz', 'action' => 'Created Staff Account - Maria Buendia', 'time' => 'Jan 20, 2026 • 2:34 PM'],
                                        ['user' => 'Maria Buendia', 'action' => 'Updated Resident Record - Juan Santos', 'time' => 'Jan 20, 2026 • 1:15 PM'],
                                    ] as $log)
                                        <tr class="hover:bg-slate-50">
                                            <td class="px-4 py-3 font-semibold text-slate-900">{{ $log['user'] }}</td>
                                            <td class="px-4 py-3 text-slate-600">{{ $log['action'] }}</td>
                                            <td class="px-4 py-3 text-slate-600">{{ $log['time'] }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

</div>
@endsection