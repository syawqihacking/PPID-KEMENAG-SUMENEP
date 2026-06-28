@extends('layouts.user')
@section('title', 'Detail Permohonan')

@section('content')
<div class="mb-4">
    <a href="{{ route('user.requests.index') }}" class="inline-flex items-center gap-2 text-sm text-gray-500 hover:text-brand-green transition">
        <i data-lucide="arrow-left" class="w-4 h-4"></i> Kembali ke Riwayat
    </a>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
    <div class="p-6 border-b border-gray-200 flex justify-between items-start md:items-center flex-col md:flex-row gap-4">
        <div>
            <h2 class="text-xl font-bold text-gray-900">{{ $request->subject }}</h2>
            <p class="text-sm text-gray-500">Diajukan pada {{ $request->created_at->format('d F Y, H:i') }}</p>
        </div>
        <span class="inline-flex px-3 py-1.5 rounded-full text-xs font-bold uppercase tracking-wider
            {{ $request->status == 'Menunggu' ? 'bg-yellow-100 text-yellow-700' : '' }}
            {{ $request->status == 'Diproses' ? 'bg-blue-100 text-blue-700' : '' }}
            {{ $request->status == 'Selesai' ? 'bg-green-100 text-green-700' : '' }}
            {{ $request->status == 'Ditolak' ? 'bg-red-100 text-red-700' : '' }}">
            Status: {{ $request->status }}
        </span>
    </div>

    <div class="p-6">
        <h3 class="text-sm font-bold text-gray-900 uppercase tracking-wider mb-4 border-b border-gray-100 pb-2">Isi Permohonan</h3>
        <div class="bg-gray-50 rounded-lg p-4 mb-6">
            <p class="text-gray-700 whitespace-pre-wrap">{{ $request->message }}</p>
        </div>

        <h3 class="text-sm font-bold text-gray-900 uppercase tracking-wider mb-4 border-b border-gray-100 pb-2">Informasi Pemohon</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
            <div>
                <span class="block text-xs font-medium text-gray-500 mb-1">Nama Lengkap</span>
                <span class="block text-sm font-medium text-gray-900">{{ $request->name }}</span>
            </div>
            <div>
                <span class="block text-xs font-medium text-gray-500 mb-1">Email</span>
                <span class="block text-sm font-medium text-gray-900">{{ $request->email }}</span>
            </div>
            <div>
                <span class="block text-xs font-medium text-gray-500 mb-1">Tiket ID</span>
                <span class="block text-sm font-mono bg-gray-100 px-2 py-1 rounded inline-block">{{ str_pad($request->id, 5, '0', STR_PAD_LEFT) }}</span>
            </div>
        </div>

        @if($request->admin_response || $request->response_file)
        <h3 class="text-sm font-bold text-gray-900 uppercase tracking-wider mb-4 border-b border-gray-100 pb-2">Balasan Admin</h3>
        <div class="bg-blue-50 border border-blue-100 rounded-lg p-4 mb-8">
            @if($request->admin_response)
                <p class="text-gray-800 whitespace-pre-wrap text-sm mb-4">{{ $request->admin_response }}</p>
            @endif
            
            @if($request->response_file)
                <a href="{{ asset('storage/responses/'.$request->response_file) }}" target="_blank" class="inline-flex items-center gap-2 bg-white border border-blue-200 text-blue-700 px-4 py-2 rounded-md text-sm font-medium hover:bg-blue-50 transition shadow-sm">
                    <i data-lucide="download" class="w-4 h-4"></i> Download File Lampiran
                </a>
            @endif
        </div>
        @endif

        @if($request->status == 'Selesai')
        <div class="bg-green-50 border border-green-100 rounded-lg p-6 text-center">
            <div class="w-12 h-12 bg-green-100 text-green-600 rounded-full flex items-center justify-center mx-auto mb-3">
                <i data-lucide="check-circle" class="w-6 h-6"></i>
            </div>
            <h4 class="font-bold text-green-900 mb-2">Permohonan Selesai</h4>
            <p class="text-green-700 text-sm mb-4">Informasi yang Anda minta telah diberikan. Bagaimana penilaian Anda terhadap layanan kami?</p>
            <a href="{{ route('reviews.index') }}#form-ulasan" class="inline-flex items-center gap-2 bg-green-600 text-white px-5 py-2 rounded-md font-medium text-sm hover:bg-green-700 transition">
                <i data-lucide="star" class="w-4 h-4"></i> Berikan Ulasan
            </a>
        </div>
        @endif

        @if($request->status == 'Ditolak' && !$request->objection_reason)
        <div class="mt-8 border-t border-gray-200 pt-8">
            <h3 class="text-lg font-bold text-gray-900 mb-2 flex items-center gap-2 text-red-600">
                <i data-lucide="alert-triangle" class="w-5 h-5"></i> Ajukan Keberatan
            </h3>
            <p class="text-sm text-gray-500 mb-4">Sesuai UU KIP, Anda berhak mengajukan keberatan atas penolakan ini. Silakan jelaskan alasan keberatan Anda.</p>
            
            @if(session('success_objection'))
            <div class="bg-green-50 text-green-700 p-4 rounded-md text-sm mb-4 border border-green-100">
                {{ session('success_objection') }}
            </div>
            @endif

            <form action="{{ route('user.requests.objection', $request->id) }}" method="POST">
                @csrf
                <textarea name="objection_reason" rows="4" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-red-500 focus:border-red-500 text-sm mb-4" required placeholder="Tuliskan alasan keberatan Anda di sini..."></textarea>
                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-medium py-2 px-6 rounded-md shadow-sm transition inline-flex items-center gap-2">
                    <i data-lucide="send" class="w-4 h-4"></i> Kirim Keberatan
                </button>
            </form>
        </div>
        @elseif($request->objection_reason)
        <div class="mt-8 border-t border-gray-200 pt-8">
            <h3 class="text-sm font-bold text-gray-900 uppercase tracking-wider mb-4 border-b border-gray-100 pb-2">Status Keberatan</h3>
            <div class="bg-orange-50 border border-orange-100 rounded-lg p-4">
                <div class="flex items-center gap-2 mb-2">
                    <span class="bg-orange-200 text-orange-800 text-[10px] px-2 py-0.5 rounded font-bold uppercase tracking-wider">{{ $request->objection_status ?? 'Menunggu Review' }}</span>
                    <span class="text-xs text-gray-500">{{ \Carbon\Carbon::parse($request->objection_date)->format('d M Y') }}</span>
                </div>
                <p class="text-sm text-gray-800 whitespace-pre-wrap">{{ $request->objection_reason }}</p>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
