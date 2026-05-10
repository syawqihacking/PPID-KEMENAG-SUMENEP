@extends('layouts.admin')

@section('title', 'Information Requests')

@section('content')
<div class="bg-white rounded-xl shadow-sm border border-gray-200">
    <div class="p-6 border-b border-gray-200">
        <h3 class="text-xl font-bold text-brand-dark">Incoming Requests</h3>
    </div>

    @if(session('success'))
        <div class="bg-green-50 border-l-4 border-green-500 p-4 m-6 text-green-700">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50 border-b border-gray-200 text-sm text-gray-500">
                    <th class="p-4 font-medium">Name</th>
                    <th class="p-4 font-medium">Subject</th>
                    <th class="p-4 font-medium">Status</th>
                    <th class="p-4 font-medium">Deadline</th>
                    <th class="p-4 font-medium">Date</th>
                    <th class="p-4 font-medium text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="text-sm divide-y divide-gray-100">
                @forelse($requests as $req)
                <tr class="hover:bg-gray-50">
                    <td class="p-4 text-gray-900 font-medium max-w-xs truncate">
                        {{ $req->name }}<br>
                        <span class="text-xs text-gray-500 font-normal">{{ $req->email }}</span>
                    </td>
                    <td class="p-4 text-gray-700">{{ $req->subject }}</td>
                    <td class="p-4">
                        @if($req->status === 'pending')
                            <span class="bg-yellow-100 text-yellow-800 text-xs px-2.5 py-1 rounded-full font-medium">Pending</span>
                        @elseif($req->status === 'approved' || $req->status === 'Selesai')
                            <span class="bg-green-100 text-green-800 text-xs px-2.5 py-1 rounded-full font-medium">Selesai</span>
                        @elseif($req->status === 'rejected')
                            <span class="bg-red-100 text-red-800 text-xs px-2.5 py-1 rounded-full font-medium">Rejected</span>
                        @else
                            <span class="bg-gray-100 text-gray-800 text-xs px-2.5 py-1 rounded-full font-medium">{{ ucfirst($req->status) }}</span>
                        @endif
                    </td>
                    <td class="p-4">
                        @if($req->remaining_days !== null)
                            @if($req->remaining_days > 3)
                                <span class="text-green-600 font-bold">{{ $req->remaining_days }} Hari</span>
                            @elseif($req->remaining_days >= 0)
                                <span class="text-yellow-600 font-bold">{{ $req->remaining_days }} Hari (Segera!)</span>
                            @else
                                <span class="text-red-600 font-bold">Terlambat!</span>
                            @endif
                        @else
                            <span class="text-gray-400">-</span>
                        @endif
                    </td>
                    <td class="p-4 text-gray-600">{{ \Carbon\Carbon::parse($req->created_at)->format('d M Y') }}</td>
                    <td class="p-4 text-right space-x-2">
                        <a href="{{ route('admin.requests.show', $req->id) }}" class="inline-block text-gray-400 hover:text-brand-green"><i data-lucide="eye" class="w-4 h-4"></i> View</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="p-8 text-center text-gray-500">No requests found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="p-4 border-t border-gray-200">
        {{ $requests->links() }}
    </div>
</div>
@endsection
