@extends('layouts.user')
@section('title', 'Riwayat Permohonan')

@section('content')
<div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
    <div class="p-6 border-b border-gray-200 flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h2 class="text-lg font-bold text-gray-900">Semua Permohonan Anda</h2>
            <p class="text-sm text-gray-500">Daftar permohonan informasi publik yang pernah Anda ajukan.</p>
        </div>
        <a href="{{ route('requests.create') }}" class="inline-flex items-center gap-2 bg-brand-green text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-brand-dark transition shrink-0">
            <i data-lucide="plus" class="w-4 h-4"></i> Ajukan Permohonan
        </a>
    </div>

    @if($requests->count() > 0)
    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">Tanggal</th>
                    <th scope="col" class="px-6 py-3">Subjek</th>
                    <th scope="col" class="px-6 py-3">Status</th>
                    <th scope="col" class="px-6 py-3 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($requests as $req)
                <tr class="bg-white border-b hover:bg-gray-50 transition">
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ $req->created_at->format('d M Y') }}
                    </td>
                    <td class="px-6 py-4 font-medium text-gray-900">
                        {{ $req->subject }}
                    </td>
                    <td class="px-6 py-4">
                        <span class="inline-flex px-2 py-1 rounded text-[10px] font-bold uppercase tracking-wider
                            {{ $req->status == 'Menunggu' ? 'bg-yellow-100 text-yellow-700' : '' }}
                            {{ $req->status == 'Diproses' ? 'bg-blue-100 text-blue-700' : '' }}
                            {{ $req->status == 'Selesai' ? 'bg-green-100 text-green-700' : '' }}
                            {{ $req->status == 'Ditolak' ? 'bg-red-100 text-red-700' : '' }}">
                            {{ $req->status }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <a href="{{ route('user.requests.show', $req->id) }}" class="text-brand-green hover:text-brand-dark font-medium inline-flex items-center gap-1">
                            Detail <i data-lucide="chevron-right" class="w-4 h-4"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="p-4 border-t border-gray-200">
        {{ $requests->links() }}
    </div>
    @else
    <div class="p-12 text-center">
        <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
            <i data-lucide="inbox" class="w-8 h-8 text-gray-400"></i>
        </div>
        <h3 class="text-lg font-bold text-gray-900 mb-1">Belum Ada Permohonan</h3>
        <p class="text-gray-500 mb-6">Anda belum pernah mengajukan permohonan informasi publik.</p>
    </div>
    @endif
</div>
@endsection
