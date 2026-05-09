@extends('layouts.app')

@section('content')
<div class="bg-gray-50 py-16 min-h-[70vh]">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="mb-10 text-center" data-aos="fade-up">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Cek Status Permohonan</h1>
            <p class="text-gray-600 max-w-2xl mx-auto">Pantau status permohonan informasi publik yang telah Anda ajukan dengan memasukkan alamat email Anda.</p>
        </div>

        <!-- Search Form -->
        <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm mb-8" data-aos="fade-up" data-aos-delay="100">
            <form action="{{ route('requests.track') }}" method="GET" class="flex flex-col md:flex-row gap-4">
                <div class="flex-grow">
                    <label for="email" class="sr-only">Alamat Email</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i data-lucide="mail" class="h-5 w-5 text-gray-400"></i>
                        </div>
                        <input type="email" name="email" id="email" value="{{ request('email') }}" class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:ring-brand-green focus:border-brand-green sm:text-sm" placeholder="Masukkan alamat email Anda yang terdaftar..." required>
                    </div>
                </div>
                <button type="submit" class="bg-brand-dark hover:bg-green-900 text-white font-medium py-3 px-6 rounded-lg shadow-sm transition flex items-center justify-center gap-2 whitespace-nowrap">
                    <i data-lucide="search" class="w-4 h-4"></i> Cek Status
                </button>
            </form>
        </div>

        <!-- Results -->
        @if(request('email'))
            @if($requests && $requests->count() > 0)
                <div class="space-y-4" data-aos="fade-up" data-aos-delay="200">
                    <h2 class="text-xl font-bold text-gray-900 mb-4">Hasil Pencarian untuk: <span class="text-brand-green">{{ request('email') }}</span></h2>
                    
                    @foreach($requests as $req)
                        <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm hover:shadow-md transition">
                            <div class="flex flex-col md:flex-row justify-between md:items-center gap-4 mb-4 border-b border-gray-100 pb-4">
                                <div>
                                    <h3 class="text-lg font-bold text-gray-900">{{ $req->subject }}</h3>
                                    <div class="text-sm text-gray-500 mt-1 flex items-center gap-2">
                                        <i data-lucide="calendar" class="w-3.5 h-3.5"></i>
                                        Diajukan pada {{ \Carbon\Carbon::parse($req->created_at)->format('d M Y, H:i') }}
                                    </div>
                                </div>
                                <div>
                                    @if($req->status === 'pending')
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                            <i data-lucide="clock" class="w-3 h-3 mr-1"></i> Menunggu Proses
                                        </span>
                                    @elseif($req->status === 'approved')
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                            <i data-lucide="check-circle" class="w-3 h-3 mr-1"></i> Disetujui
                                        </span>
                                    @elseif($req->status === 'rejected')
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                            <i data-lucide="x-circle" class="w-3 h-3 mr-1"></i> Ditolak
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                            {{ ucfirst($req->status) }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div>
                                <h4 class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Rincian Pesan</h4>
                                <p class="text-sm text-gray-700 bg-gray-50 p-4 rounded-lg">{{ $req->message }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="bg-white border border-gray-200 rounded-xl p-8 text-center" data-aos="fade-up" data-aos-delay="200">
                    <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i data-lucide="search-x" class="w-8 h-8 text-gray-400"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Tidak Ada Data</h3>
                    <p class="text-gray-500">Kami tidak menemukan permohonan informasi dengan alamat email <span class="font-medium text-gray-900">{{ request('email') }}</span>.</p>
                    <p class="text-sm text-gray-400 mt-2">Pastikan email yang Anda masukkan sama dengan saat mengajukan permohonan.</p>
                </div>
            @endif
        @endif

    </div>
</div>
@endsection
