@extends('layouts.admin')

@section('title', 'Request Details')

@section('content')
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <div class="lg:col-span-2 bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <h3 class="text-xl font-bold text-gray-900 mb-4">{{ $request->subject }}</h3>
        
        <div class="mb-6">
            <h4 class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Message</h4>
            <div class="bg-gray-50 p-4 rounded-lg text-sm text-gray-800 whitespace-pre-wrap">{{ $request->message }}</div>
        </div>

        <div class="flex gap-4 border-t border-gray-200 pt-6">
            <a href="mailto:{{ $request->email }}" class="bg-brand-dark hover:bg-green-900 text-white font-medium py-2 px-6 rounded-md shadow-sm transition flex items-center gap-2">
                <i data-lucide="mail" class="w-4 h-4"></i> Reply via Email
            </a>
            <a href="{{ route('admin.requests.index') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium py-2 px-6 rounded-md transition flex items-center gap-2">
                <i data-lucide="arrow-left" class="w-4 h-4"></i> Back
            </a>
        </div>
    </div>

    <div class="lg:col-span-1 space-y-6">
        <!-- Applicant Info -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h4 class="font-bold text-gray-900 mb-4">Applicant Info</h4>
            <div class="space-y-3 text-sm">
                <div>
                    <span class="block text-xs text-gray-500 font-medium mb-1">Name</span>
                    <span class="font-semibold text-gray-900">{{ $request->name }}</span>
                </div>
                <div>
                    <span class="block text-xs text-gray-500 font-medium mb-1">Email</span>
                    <a href="mailto:{{ $request->email }}" class="text-brand-green hover:underline">{{ $request->email }}</a>
                </div>
                <div>
                    <span class="block text-xs text-gray-500 font-medium mb-1">Submitted At</span>
                    <span class="text-gray-700">{{ \Carbon\Carbon::parse($request->created_at)->format('d M Y, H:i') }}</span>
                </div>
            </div>
        </div>

        <!-- Status Management -->
        <!-- Status Management & Response -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h4 class="font-bold text-gray-900 mb-4">Proses Permohonan</h4>
            <form action="{{ route('admin.requests.update', $request->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="mb-4">
                    <label class="block text-xs font-medium text-gray-500 mb-2">Ubah Status</label>
                    <select name="status" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-brand-green focus:border-brand-green text-sm">
                        <option value="Menunggu" {{ $request->status == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
                        <option value="Diproses" {{ $request->status == 'Diproses' ? 'selected' : '' }}>Diproses</option>
                        <option value="Selesai" {{ $request->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                        <option value="Ditolak" {{ $request->status == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-xs font-medium text-gray-500 mb-2">Balasan Resmi Admin</label>
                    <textarea name="admin_response" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-brand-green focus:border-brand-green text-sm" placeholder="Tuliskan alasan penolakan atau keterangan balasan...">{{ $request->admin_response }}</textarea>
                </div>

                <div class="mb-6">
                    <label class="block text-xs font-medium text-gray-500 mb-2">Lampirkan File Jawaban (Opsional)</label>
                    @if($request->response_file)
                        <div class="mb-2">
                            <a href="{{ asset('storage/responses/'.$request->response_file) }}" target="_blank" class="text-xs text-brand-green hover:underline flex items-center gap-1"><i data-lucide="paperclip" class="w-3 h-3"></i> Lihat File Saat Ini</a>
                        </div>
                    @endif
                    <input type="file" name="response_file" class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm">
                    <p class="text-[10px] text-gray-400 mt-1">Maks. 5MB (PDF/JPG/PNG/DOCX)</p>
                </div>

                <button type="submit" class="w-full bg-brand-dark hover:bg-green-900 text-white font-medium py-2 px-4 rounded-md shadow-sm transition">
                    Simpan Perubahan
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
