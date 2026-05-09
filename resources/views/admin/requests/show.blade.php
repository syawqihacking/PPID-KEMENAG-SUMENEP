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
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h4 class="font-bold text-gray-900 mb-4">Manage Status</h4>
            <form action="{{ route('admin.requests.update', $request->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label class="block text-xs font-medium text-gray-500 mb-2">Current Status</label>
                    <select name="status" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-brand-green focus:border-brand-green text-sm">
                        <option value="pending" {{ $request->status == 'pending' ? 'selected' : '' }}>Pending (Menunggu)</option>
                        <option value="approved" {{ $request->status == 'approved' ? 'selected' : '' }}>Approved (Disetujui)</option>
                        <option value="rejected" {{ $request->status == 'rejected' ? 'selected' : '' }}>Rejected (Ditolak)</option>
                    </select>
                </div>
                <button type="submit" class="w-full bg-brand-dark hover:bg-green-900 text-white font-medium py-2 px-4 rounded-md shadow-sm transition">
                    Update Status
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
