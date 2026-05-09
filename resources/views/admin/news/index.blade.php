@extends('layouts.admin')

@section('title', 'Manage News')

@section('content')
<div class="bg-white rounded-xl shadow-sm border border-gray-200">
    <div class="p-6 border-b border-gray-200 flex justify-between items-center">
        <h3 class="text-xl font-bold text-brand-dark">News List</h3>
        <a href="{{ route('admin.news.create') }}" class="bg-brand-dark hover:bg-green-900 text-white px-4 py-2 rounded-md text-sm font-medium flex items-center gap-2 transition shadow-sm">
            <i data-lucide="plus" class="w-4 h-4"></i> Add News
        </a>
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
                    <th class="p-4 font-medium">Title</th>
                    <th class="p-4 font-medium">Category</th>
                    <th class="p-4 font-medium">Date</th>
                    <th class="p-4 font-medium text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="text-sm divide-y divide-gray-100">
                @forelse($news as $item)
                <tr class="hover:bg-gray-50">
                    <td class="p-4 text-gray-900 font-medium max-w-xs truncate">{{ $item->title }}</td>
                    <td class="p-4"><span class="bg-gray-100 text-gray-800 text-xs px-2.5 py-1 rounded-full">{{ $item->category ?: 'General' }}</span></td>
                    <td class="p-4 text-gray-600">{{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}</td>
                    <td class="p-4 text-right space-x-2">
                        <a href="{{ route('admin.news.edit', $item->id) }}" class="inline-block text-gray-400 hover:text-gray-600"><i data-lucide="edit-2" class="w-4 h-4"></i></a>
                        <form action="{{ route('admin.news.destroy', $item->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this news?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-gray-400 hover:text-red-500"><i data-lucide="trash-2" class="w-4 h-4"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="p-8 text-center text-gray-500">No news found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="p-4 border-t border-gray-200">
        {{ $news->links() }}
    </div>
</div>
@endsection
