@extends('layouts.admin')

@section('title', 'Manage FAQ')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold text-gray-900">Pertanyaan Umum (FAQ)</h1>
    <a href="{{ route('admin.faqs.create') }}" class="bg-brand-green hover:bg-green-700 text-white font-medium py-2 px-4 rounded-lg text-sm transition flex items-center gap-2">
        <i data-lucide="plus" class="w-4 h-4"></i> Tambah FAQ
    </a>
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
                <th class="px-6 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider w-16 text-center">Urutan</th>
                <th class="px-6 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Pertanyaan</th>
                <th class="px-6 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider w-32">Status</th>
                <th class="px-6 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider w-32 text-right">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @forelse($faqs as $faq)
            <tr class="hover:bg-gray-50 transition">
                <td class="px-6 py-4 text-sm text-gray-500 text-center font-medium">{{ $faq->order }}</td>
                <td class="px-6 py-4">
                    <div class="text-sm font-semibold text-gray-900 mb-1">{{ $faq->question }}</div>
                    <div class="text-xs text-gray-500 line-clamp-1">{{ $faq->answer }}</div>
                </td>
                <td class="px-6 py-4">
                    @if($faq->is_active)
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">Aktif</span>
                    @else
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">Draft</span>
                    @endif
                </td>
                <td class="px-6 py-4 text-right">
                    <div class="flex justify-end gap-2">
                        <a href="{{ route('admin.faqs.edit', $faq) }}" class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition" title="Edit">
                            <i data-lucide="edit-3" class="w-4 h-4"></i>
                        </a>
                        <form action="{{ route('admin.faqs.destroy', $faq) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus FAQ ini?')">
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
                <td colspan="4" class="px-6 py-10 text-center text-gray-500 text-sm italic">Belum ada data FAQ.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
