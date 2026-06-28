@extends('layouts.admin')

@section('title', 'Settings & Konten Statis')

@section('content')
<div class="max-w-4xl">
    @if(session('success'))
    <div class="mb-6 bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg flex items-center gap-2">
        <i data-lucide="check-circle" class="w-5 h-5"></i> {{ session('success') }}
    </div>
    @endif

    <div class="mb-6 border-b border-gray-200 overflow-x-auto scrollbar-hide">
        <nav class="-mb-px flex space-x-8 min-w-max">
            <button onclick="switchTab('tab-profil')" id="btn-tab-profil" class="tab-btn border-brand-green text-brand-green whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">Profil & Visi Misi</button>
            <button onclick="switchTab('tab-kontak')" id="btn-tab-kontak" class="tab-btn border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">Kontak & Lokasi</button>
            <button onclick="switchTab('tab-prosedur')" id="btn-tab-prosedur" class="tab-btn border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">Prosedur & Maklumat</button>
        </nav>
    </div>

    <!-- Tab Profil -->
    <div id="tab-profil" class="tab-content block">
        <form action="{{ route('admin.settings.general') }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm">
                <h2 class="text-lg font-bold text-gray-900 mb-6 flex items-center gap-2"><i data-lucide="info" class="w-5 h-5"></i> Konten Profil</h2>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Latar Belakang</label>
                        <textarea name="profil_latar_belakang" rows="5" class="w-full border border-gray-300 rounded-lg px-4 py-2 text-sm focus:ring-brand-green focus:border-brand-green">{{ \App\Models\Setting::get('profil_latar_belakang') }}</textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Visi</label>
                        <textarea name="profil_visi" rows="3" class="w-full border border-gray-300 rounded-lg px-4 py-2 text-sm focus:ring-brand-green focus:border-brand-green">{{ \App\Models\Setting::get('profil_visi') }}</textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Misi (Pisahkan per baris)</label>
                        <textarea name="profil_misi" rows="6" class="w-full border border-gray-300 rounded-lg px-4 py-2 text-sm focus:ring-brand-green focus:border-brand-green">{{ \App\Models\Setting::get('profil_misi') }}</textarea>
                    </div>
                </div>
                <div class="mt-6">
                    <button type="submit" class="bg-brand-green hover:bg-green-700 text-white font-medium py-2 px-6 rounded-lg text-sm transition">Simpan Perubahan</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Tab Kontak -->
    <div id="tab-kontak" class="tab-content hidden">
        <form action="{{ route('admin.settings.general') }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm">
                <h2 class="text-lg font-bold text-gray-900 mb-6 flex items-center gap-2"><i data-lucide="phone" class="w-5 h-5"></i> Informasi Kontak</h2>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Alamat Kantor</label>
                        <textarea name="kontak_alamat" rows="2" class="w-full border border-gray-300 rounded-lg px-4 py-2 text-sm focus:ring-brand-green focus:border-brand-green">{{ \App\Models\Setting::get('kontak_alamat') }}</textarea>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Telepon</label>
                            <input type="text" name="kontak_telepon" value="{{ \App\Models\Setting::get('kontak_telepon') }}" class="w-full border border-gray-300 rounded-lg px-4 py-2 text-sm focus:ring-brand-green focus:border-brand-green">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <input type="text" name="kontak_email" value="{{ \App\Models\Setting::get('kontak_email') }}" class="w-full border border-gray-300 rounded-lg px-4 py-2 text-sm focus:ring-brand-green focus:border-brand-green">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Jam Kerja</label>
                        <input type="text" name="kontak_jam_kerja" value="{{ \App\Models\Setting::get('kontak_jam_kerja') }}" class="w-full border border-gray-300 rounded-lg px-4 py-2 text-sm focus:ring-brand-green focus:border-brand-green">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Google Maps Embed URL</label>
                        <input type="text" name="kontak_maps_embed" value="{{ \App\Models\Setting::get('kontak_maps_embed') }}" class="w-full border border-gray-300 rounded-lg px-4 py-2 text-sm focus:ring-brand-green focus:border-brand-green">
                        <p class="text-xs text-gray-500 mt-1">Copy 'src' attribute from Google Maps embed code.</p>
                    </div>
                </div>
                <div class="mt-6">
                    <button type="submit" class="bg-brand-green hover:bg-green-700 text-white font-medium py-2 px-6 rounded-lg text-sm transition">Simpan Perubahan</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Tab Prosedur -->
    <div id="tab-prosedur" class="tab-content hidden">
        <form action="{{ route('admin.settings.general') }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm">
                <h2 class="text-lg font-bold text-gray-900 mb-6 flex items-center gap-2"><i data-lucide="file-text" class="w-5 h-5"></i> Maklumat Pelayanan</h2>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Teks Maklumat</label>
                        <textarea name="prosedur_maklumat" rows="4" class="w-full border border-gray-300 rounded-lg px-4 py-2 text-sm focus:ring-brand-green focus:border-brand-green">{{ \App\Models\Setting::get('prosedur_maklumat') }}</textarea>
                    </div>
                </div>
                <div class="mt-6">
                    <button type="submit" class="bg-brand-green hover:bg-green-700 text-white font-medium py-2 px-6 rounded-lg text-sm transition">Simpan Perubahan</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    function switchTab(tabId) {
        // Update hash
        window.location.hash = tabId.replace('tab-', '');
        
        // Hide all contents
        document.querySelectorAll('.tab-content').forEach(content => {
            content.classList.add('hidden');
            content.classList.remove('block');
        });
        
        // Show target content
        const target = document.getElementById(tabId);
        if(target) {
            target.classList.remove('hidden');
            target.classList.add('block');
        }
        
        // Update tab styling
        document.querySelectorAll('.tab-btn').forEach(btn => {
            btn.classList.remove('border-brand-green', 'text-brand-green');
            btn.classList.add('border-transparent', 'text-gray-500');
        });
        
        const activeBtn = document.getElementById('btn-' + tabId);
        if(activeBtn) {
            activeBtn.classList.add('border-brand-green', 'text-brand-green');
            activeBtn.classList.remove('border-transparent', 'text-gray-500');
        }
    }

    // Handle hash on load
    window.addEventListener('DOMContentLoaded', () => {
        const hash = window.location.hash.replace('#', '');
        if (hash) {
            switchTab('tab-' + hash);
        }
    });
</script>
@endsection
