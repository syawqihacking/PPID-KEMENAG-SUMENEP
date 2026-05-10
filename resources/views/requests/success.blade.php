@extends('layouts.app')

@section('content')
<div class="bg-gray-50 py-20 min-h-[70vh] flex items-center">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="bg-white p-12 rounded-[3rem] shadow-xl border border-gray-100" data-aos="zoom-in">
            <div class="w-20 h-20 bg-green-100 text-brand-green rounded-full flex items-center justify-center mx-auto mb-8">
                <i data-lucide="check-circle" class="w-12 h-12"></i>
            </div>
            
            <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-4">Berhasil Dikirim!</h1>
            <p class="text-lg text-gray-600 mb-10 leading-relaxed">
                Terima kasih, <strong>{{ $request->name }}</strong>. Permohonan informasi Anda telah kami terima dengan nomor referensi <strong>#REQ-{{ str_pad($request->id, 5, '0', STR_PAD_LEFT) }}</strong>.
            </p>

            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="{{ route('requests.receipt', $request->id) }}" target="_blank" class="inline-flex items-center px-8 py-4 bg-brand-green hover:bg-green-600 text-white font-bold rounded-xl shadow-lg transition transform hover:-translate-y-1">
                    <i data-lucide="download" class="w-5 h-5 mr-2"></i>
                    Unduh Bukti Tanda Terima
                </a>
                <a href="{{ route('home') }}" class="inline-flex items-center px-8 py-4 bg-gray-100 hover:bg-gray-200 text-gray-700 font-bold rounded-xl transition">
                    Kembali ke Beranda
                </a>
            </div>

            <div class="mt-12 pt-8 border-t border-gray-100">
                <p class="text-sm text-gray-500 italic">
                    <i data-lucide="info" class="w-4 h-4 inline mr-1"></i>
                    Sesuai UU KIP, kami akan merespons permohonan Anda dalam waktu maksimal 10 hari kerja.
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
