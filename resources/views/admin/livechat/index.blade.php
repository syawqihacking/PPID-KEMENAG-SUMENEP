@extends('layouts.operator')

@section('title', 'Antrean Live Chat')

@section('content')
<div class="flex justify-between items-center mb-6">
    <div>
        <h1 class="text-2xl font-bold text-gray-900">Live Chat Customer Service</h1>
        <p class="text-gray-500 text-sm mt-1">Kelola dan tanggapi pesan dari pengunjung yang meminta bantuan manusia.</p>
    </div>
</div>

@if(session('success'))
<div class="mb-6 bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg flex items-center gap-2">
    <i data-lucide="check-circle" class="w-5 h-5"></i> {{ session('success') }}
</div>
@endif

<div class="bg-white border border-gray-200 rounded-xl overflow-hidden shadow-sm">
    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="bg-gray-50 border-b border-gray-200">
                <th class="px-6 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">ID Sesi</th>
                <th class="px-6 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Status</th>
                <th class="px-6 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Pesan Terakhir</th>
                <th class="px-6 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Waktu</th>
                <th class="px-6 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider w-32 text-right">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @forelse($sessions as $session)
            <tr class="hover:bg-gray-50 transition">
                <td class="px-6 py-4">
                    <div class="text-sm font-semibold text-gray-900 font-mono">{{ substr($session->session_id, 0, 12) }}...</div>
                </td>
                <td class="px-6 py-4">
                    @if($session->status == 'waiting')
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800 animate-pulse">Menunggu CS</span>
                    @else
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">Sedang Live</span>
                    @endif
                </td>
                <td class="px-6 py-4">
                    <div class="text-xs text-gray-500 line-clamp-1">
                        @if($session->messages->count() > 0)
                            {{ $session->messages->first()->message }}
                        @else
                            -
                        @endif
                    </div>
                </td>
                <td class="px-6 py-4 text-xs text-gray-500">
                    {{ $session->updated_at->diffForHumans() }}
                </td>
                <td class="px-6 py-4 text-right">
                    <a href="{{ route('operator.livechat.show', $session) }}" class="inline-flex items-center gap-1 bg-blue-600 hover:bg-blue-700 text-white font-medium py-1.5 px-3 rounded-lg text-xs transition">
                        <i data-lucide="message-square" class="w-3.5 h-3.5"></i> Balas
                    </a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="px-6 py-10 text-center text-gray-500 text-sm italic">Belum ada obrolan live chat saat ini.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<script>
    // Refresh page every 10 seconds to check for new waiting chats
    setTimeout(function() {
        window.location.reload();
    }, 10000);
</script>
@endsection
