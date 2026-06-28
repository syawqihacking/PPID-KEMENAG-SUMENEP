@extends('layouts.user')
@section('title', 'Dashboard Pemohon')

@section('content')
<div class="space-y-6">
    <!-- Welcome Banner -->
    <div class="bg-gradient-to-r from-brand-green to-brand-dark rounded-2xl p-6 text-white shadow-lg relative overflow-hidden">
        <div class="relative z-10">
            <h2 class="text-2xl font-bold mb-2">Selamat datang, {{ auth()->user()->name }}!</h2>
            <p class="text-green-50 opacity-90">Pantau status permohonan informasi publik Anda di sini.</p>
        </div>
        <div class="absolute right-0 top-0 w-64 h-full bg-white opacity-10 blur-3xl rounded-full transform translate-x-1/2 -translate-y-1/2"></div>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <!-- Total -->
        <div class="bg-white rounded-xl p-5 border border-gray-100 shadow-sm flex flex-col justify-center">
            <div class="text-gray-500 text-xs font-semibold uppercase tracking-wider mb-2">Total Diajukan</div>
            <div class="text-3xl font-bold text-gray-900">{{ $stats['total'] }}</div>
        </div>
        <!-- Pending -->
        <div class="bg-yellow-50 rounded-xl p-5 border border-yellow-100 shadow-sm flex flex-col justify-center">
            <div class="text-yellow-700 text-xs font-semibold uppercase tracking-wider mb-2">Menunggu</div>
            <div class="text-3xl font-bold text-yellow-700">{{ $stats['pending'] }}</div>
        </div>
        <!-- Processed -->
        <div class="bg-blue-50 rounded-xl p-5 border border-blue-100 shadow-sm flex flex-col justify-center">
            <div class="text-blue-700 text-xs font-semibold uppercase tracking-wider mb-2">Diproses</div>
            <div class="text-3xl font-bold text-blue-700">{{ $stats['processed'] }}</div>
        </div>
        <!-- Completed -->
        <div class="bg-green-50 rounded-xl p-5 border border-green-100 shadow-sm flex flex-col justify-center">
            <div class="text-brand-green text-xs font-semibold uppercase tracking-wider mb-2">Selesai</div>
            <div class="text-3xl font-bold text-brand-green">{{ $stats['completed'] }}</div>
        </div>
    </div>

    <!-- Recent Requests -->
    <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
        <div class="p-5 border-b border-gray-200 flex justify-between items-center bg-gray-50/50">
            <h3 class="font-bold text-gray-900">Permohonan Terbaru</h3>
            <a href="{{ route('user.requests.index') }}" class="text-sm font-medium text-brand-green hover:underline">Lihat Semua</a>
        </div>
        <div class="divide-y divide-gray-100">
            @forelse($recentRequests as $req)
            <div class="p-5 flex items-start justify-between hover:bg-gray-50 transition">
                <div>
                    <h4 class="font-semibold text-gray-900 text-sm mb-1">{{ $req->subject }}</h4>
                    <p class="text-xs text-gray-500 mb-2">Diajukan pada {{ $req->created_at->format('d M Y') }}</p>
                    <span class="inline-flex px-2 py-1 rounded text-[10px] font-bold uppercase tracking-wider
                        {{ $req->status == 'Menunggu' ? 'bg-yellow-100 text-yellow-700' : '' }}
                        {{ $req->status == 'Diproses' ? 'bg-blue-100 text-blue-700' : '' }}
                        {{ $req->status == 'Selesai' ? 'bg-green-100 text-green-700' : '' }}
                        {{ $req->status == 'Ditolak' ? 'bg-red-100 text-red-700' : '' }}">
                        {{ $req->status }}
                    </span>
                </div>
                <a href="{{ route('user.requests.show', $req->id) }}" class="p-2 text-gray-400 hover:text-brand-green hover:bg-green-50 rounded-lg transition">
                    <i data-lucide="chevron-right" class="w-5 h-5"></i>
                </a>
            </div>
            @empty
            <div class="p-8 text-center">
                <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-3">
                    <i data-lucide="inbox" class="w-8 h-8 text-gray-400"></i>
                </div>
                <p class="text-gray-500 text-sm mb-4">Anda belum pernah mengajukan permohonan informasi.</p>
                <a href="{{ route('requests.create') }}" class="inline-flex items-center gap-2 bg-brand-green text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-brand-dark transition">
                    <i data-lucide="plus" class="w-4 h-4"></i> Buat Permohonan Baru
                </a>
            </div>
            @endforelse
        </div>
    </div>
</div>
@endsection
