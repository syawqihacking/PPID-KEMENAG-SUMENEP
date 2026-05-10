@extends('layouts.admin')

@section('title', 'Manage DIP')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold text-gray-900">Daftar Informasi Publik (DIP)</h1>
    <a href="{{ route('admin.dip.create') }}" class="bg-brand-green hover:bg-green-700 text-white font-medium py-2 px-4 rounded-lg text-sm transition flex items-center gap-2">
        <i data-lucide="plus" class="w-4 h-4"></i> Tambah Data
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
                <th class="px-6 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Tipe</th>
                <th class="px-6 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Judul Informasi</th>
                <th class="px-6 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Ringkasan</th>
                <th class="px-6 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider text-right">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @forelse($dips as $dip)
            <tr class="hover:bg-gray-50 transition">
                <td class="px-6 py-4">
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                        {{ $dip->type == 'Berkala' ? 'bg-blue-100 text-blue-800' : '' }}
                        {{ $dip->type == 'Serta Merta' ? 'bg-yellow-100 text-yellow-800' : '' }}
                        {{ $dip->type == 'Setiap Saat' ? 'bg-green-100 text-green-800' : '' }}
                        {{ $dip->type == 'Dikecualikan' ? 'bg-red-100 text-red-800' : '' }}
                    ">
                        {{ $dip->type }}
                    </span>
                </td>
                <td class="px-6 py-4 text-sm font-semibold text-gray-900">{{ $dip->title }}</td>
                <td class="px-6 py-4 text-sm text-gray-500 line-clamp-1 max-w-xs">{{ $dip->description }}</td>
                <td class="px-6 py-4 text-right">
                    <div class="flex justify-end gap-2">
                        <a href="{{ route('admin.dip.edit', $dip) }}" class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition">
                            <i data-lucide="edit-3" class="w-4 h-4"></i>
                        </a>
                        <form action="{{ route('admin.dip.destroy', $dip) }}" method="POST" onsubmit="return confirm('Hapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition">
                                <i data-lucide="trash-2" class="w-4 h-4"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="px-6 py-10 text-center text-gray-500 text-sm italic">Belum ada data DIP.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
