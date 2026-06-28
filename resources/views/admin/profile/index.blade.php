@extends('layouts.admin')

@section('title', 'Manajemen Akun')

@section('content')
<div class="max-w-4xl">
    @if(session('success'))
    <div class="mb-6 bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg flex items-center gap-2">
        <i data-lucide="check-circle" class="w-5 h-5"></i> {{ session('success') }}
    </div>
    @endif

    @if($errors->any())
    <div class="mb-6 bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-lg">
        <ul class="list-disc list-inside text-sm">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Sidebar Info -->
        <div class="lg:col-span-1 space-y-6">
            <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm text-center">
                <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=0D8ABC&color=fff&size=128" class="w-24 h-24 rounded-full mx-auto mb-4 border-4 border-gray-50" alt="User">
                <h3 class="font-bold text-gray-900 text-lg">{{ auth()->user()->name }}</h3>
                <p class="text-gray-500 text-sm mb-4">{{ auth()->user()->email }}</p>
                <span class="inline-block bg-brand-green/10 text-brand-green text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider">Administrator</span>
            </div>

            <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm">
                <h4 class="font-bold text-gray-900 text-sm mb-4 border-b border-gray-100 pb-2">Detail Akun</h4>
                <div class="space-y-3">
                    <div class="flex justify-between items-center text-sm">
                        <span class="text-gray-500">ID Pengguna</span>
                        <span class="font-medium text-gray-900">#{{ auth()->user()->id }}</span>
                    </div>
                    <div class="flex justify-between items-center text-sm">
                        <span class="text-gray-500">Terdaftar</span>
                        <span class="font-medium text-gray-900">{{ auth()->user()->created_at->format('d/m/Y') }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form Section -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Security / Password -->
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden" id="security-section">
                <div class="p-6 border-b border-gray-100 bg-gray-50/50">
                    <h3 class="font-bold text-gray-900 flex items-center gap-2">
                        <i data-lucide="lock" class="w-5 h-5 text-brand-green"></i> Keamanan & Kata Sandi
                    </h3>
                </div>
                <div class="p-6">
                    <form action="{{ route('admin.profile.password') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Kata Sandi Saat Ini</label>
                                <input type="password" name="current_password" required class="w-full border border-gray-300 rounded-lg px-4 py-2 text-sm focus:ring-brand-green focus:border-brand-green outline-none transition">
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Kata Sandi Baru</label>
                                    <input type="password" name="new_password" required class="w-full border border-gray-300 rounded-lg px-4 py-2 text-sm focus:ring-brand-green focus:border-brand-green outline-none transition">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Sandi Baru</label>
                                    <input type="password" name="new_password_confirmation" required class="w-full border border-gray-300 rounded-lg px-4 py-2 text-sm focus:ring-brand-green focus:border-brand-green outline-none transition">
                                </div>
                            </div>
                            <div class="pt-4">
                                <button type="submit" class="bg-brand-dark hover:bg-green-900 text-white font-bold py-2.5 px-6 rounded-lg text-sm transition shadow-sm flex items-center gap-2">
                                    <i data-lucide="save" class="w-4 h-4"></i> Perbarui Kata Sandi
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Active Session - Loaded via AJAX -->
            <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm">
                <h3 class="font-bold text-gray-900 mb-4 flex items-center gap-2">
                    <i data-lucide="shield-check" class="w-5 h-5 text-blue-500"></i> Sesi Aktif
                </h3>

                <!-- Loading State -->
                <div id="session-loading" class="flex items-center gap-3 p-4 bg-gray-50 rounded-lg border border-gray-200 animate-pulse">
                    <div class="w-10 h-10 bg-gray-200 rounded-lg"></div>
                    <div class="flex-grow space-y-2">
                        <div class="h-4 bg-gray-200 rounded w-48"></div>
                        <div class="h-3 bg-gray-200 rounded w-32"></div>
                    </div>
                </div>

                <!-- Session Data (hidden until AJAX loads) -->
                <div id="session-data" class="hidden">
                    <div class="flex items-center gap-4 p-4 bg-blue-50 rounded-lg border border-blue-100">
                        <div class="flex-shrink-0 w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                            <i id="device-icon" data-lucide="monitor" class="w-6 h-6 text-blue-600"></i>
                        </div>
                        <div class="flex-grow min-w-0">
                            <p class="text-sm font-bold text-blue-900" id="session-browser"></p>
                            <p class="text-xs text-blue-700" id="session-details"></p>
                        </div>
                        <span class="flex-shrink-0 inline-flex items-center gap-1 bg-green-100 text-green-700 text-[10px] font-bold px-2 py-1 rounded-full">
                            <span class="w-1.5 h-1.5 bg-green-500 rounded-full animate-pulse"></span> Aktif
                        </span>
                    </div>

                    <div class="mt-4 grid grid-cols-2 gap-3">
                        <div class="bg-gray-50 rounded-lg p-3">
                            <p class="text-[10px] text-gray-400 uppercase tracking-wider font-semibold mb-1">Alamat IP</p>
                            <p class="text-sm font-medium text-gray-900" id="session-ip">-</p>
                        </div>
                        <div class="bg-gray-50 rounded-lg p-3">
                            <p class="text-[10px] text-gray-400 uppercase tracking-wider font-semibold mb-1">Resolusi Layar</p>
                            <p class="text-sm font-medium text-gray-900" id="session-resolution">-</p>
                        </div>
                        <div class="bg-gray-50 rounded-lg p-3">
                            <p class="text-[10px] text-gray-400 uppercase tracking-wider font-semibold mb-1">Sistem Operasi</p>
                            <p class="text-sm font-medium text-gray-900" id="session-os">-</p>
                        </div>
                        <div class="bg-gray-50 rounded-lg p-3">
                            <p class="text-[10px] text-gray-400 uppercase tracking-wider font-semibold mb-1">Waktu Login</p>
                            <p class="text-sm font-medium text-gray-900" id="session-timestamp">-</p>
                        </div>
                    </div>
                </div>

                <!-- Error State -->
                <div id="session-error" class="hidden p-4 bg-red-50 rounded-lg border border-red-200 text-center">
                    <p class="text-sm text-red-600">Gagal memuat informasi sesi.</p>
                    <button onclick="loadSessionInfo()" class="mt-2 text-xs font-bold text-red-700 underline">Coba Lagi</button>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
function loadSessionInfo() {
    const loadingEl = document.getElementById('session-loading');
    const dataEl    = document.getElementById('session-data');
    const errorEl   = document.getElementById('session-error');

    // Show loading, hide   
    loadingEl.classList.remove('hidden');
    dataEl.classList.add('hidden');
    errorEl.classList.add('hidden');

    // AJAX fetch to server endpoint
    fetch('{{ route("admin.profile.session") }}', {
        method: 'GET',
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json',
        }
    })
    .then(response => {
        if (!response.ok) throw new Error('Network response was not ok');
        return response.json();
    })
    .then(data => {
        // Populate data from server response
        document.getElementById('session-browser').textContent = data.browser + ' on ' + data.os;
        document.getElementById('session-details').textContent  = 'IP: ' + data.ip + ' • ' + data.device;
        document.getElementById('session-ip').textContent        = data.ip;
        document.getElementById('session-os').textContent        = data.os;
        document.getElementById('session-timestamp').textContent = data.timestamp;

        // Client-side only: screen resolution
        document.getElementById('session-resolution').textContent = window.screen.width + ' × ' + window.screen.height;

        // Swap icon if mobile
        if (data.is_mobile) {
            const iconEl = document.getElementById('device-icon');
            iconEl.setAttribute('data-lucide', 'smartphone');
            lucide.createIcons();
        }

        // Show data, hide loading
        loadingEl.classList.add('hidden');
        dataEl.classList.remove('hidden');
    })
    .catch(error => {
        console.error('AJAX Error:', error);
        loadingEl.classList.add('hidden');
        errorEl.classList.remove('hidden');
    });
}

// Auto-load on page ready
document.addEventListener('DOMContentLoaded', loadSessionInfo);
</script>
@endpush
@endsection
