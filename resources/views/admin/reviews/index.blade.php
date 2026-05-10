@extends('layouts.admin')

@section('title', 'Manage Reviews')

@section('content')
<div class="mb-6">
    <h1 class="text-2xl font-bold text-gray-900">Moderasi Ulasan & Penilaian</h1>
    <p class="text-gray-600 text-sm">Verifikasi ulasan dari masyarakat sebelum ditampilkan di website publik.</p>
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
                <th class="px-6 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Pengirim</th>
                <th class="px-6 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider w-32">Rating</th>
                <th class="px-6 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Komentar</th>
                <th class="px-6 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider w-32">Status</th>
                <th class="px-6 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider text-right">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @forelse($reviews as $review)
            <tr class="hover:bg-gray-50 transition">
                <td class="px-6 py-4">
                    <div class="text-sm font-semibold text-gray-900">{{ $review->name }}</div>
                    <div class="text-xs text-gray-500">{{ $review->created_at->format('d/m/Y H:i') }}</div>
                </td>
                <td class="px-6 py-4 text-sm">
                    <div class="flex text-yellow-400">
                        @for($i = 1; $i <= 5; $i++)
                        <i data-lucide="star" class="w-3 h-3 {{ $i <= $review->rating ? 'fill-current' : 'text-gray-200' }}"></i>
                        @endfor
                    </div>
                </td>
                <td class="px-6 py-4 text-sm text-gray-600 italic">"{{ $review->comment }}"</td>
                <td class="px-6 py-4">
                    @if($review->is_approved)
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">Tampil</span>
                    @else
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">Menunggu</span>
                    @endif
                </td>
                <td class="px-6 py-4 text-right">
                    <div class="flex justify-end gap-2">
                        @if(!$review->is_approved)
                        <form action="{{ route('admin.reviews.approve', $review) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="p-2 text-green-600 hover:bg-green-50 rounded-lg transition" title="Setujui">
                                <i data-lucide="check" class="w-4 h-4"></i>
                            </button>
                        </form>
                        @endif
                        <form action="{{ route('admin.reviews.destroy', $review) }}" method="POST" onsubmit="return confirm('Hapus ulasan ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition" title="Hapus">
                                <i data-lucide="trash-2" class="w-4 h-4"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="px-6 py-10 text-center text-gray-500 text-sm italic">Belum ada ulasan masuk.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
