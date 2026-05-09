@extends('layouts.admin')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <!-- Stat Card 1 -->
    <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm flex flex-col justify-between hover:shadow-lg transition duration-300 transform hover:-translate-y-1 cursor-pointer" data-aos="fade-up" data-aos-delay="50">
        <div class="flex justify-between items-start mb-4">
            <div class="w-12 h-12 bg-brand-green rounded-lg flex items-center justify-center text-white">
                <i data-lucide="file-text" class="w-6 h-6"></i>
            </div>
            <span class="bg-green-100 text-green-800 text-xs font-bold px-2.5 py-1 rounded-full">+12%</span>
        </div>
        <div>
            <h4 class="text-gray-500 text-sm font-medium mb-1">Total News Posts</h4>
            <div class="text-3xl font-bold text-brand-dark">{{ $newsCount }}</div>
        </div>
    </div>

    <!-- Stat Card 2 -->
    <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm flex flex-col justify-between hover:shadow-lg transition duration-300 transform hover:-translate-y-1 cursor-pointer" data-aos="fade-up" data-aos-delay="150">
        <div class="flex justify-between items-start mb-4">
            <div class="w-12 h-12 bg-yellow-400 rounded-lg flex items-center justify-center text-white">
                <i data-lucide="folder" class="w-6 h-6"></i>
            </div>
            <span class="bg-green-100 text-green-800 text-xs font-bold px-2.5 py-1 rounded-full">+5%</span>
        </div>
        <div>
            <h4 class="text-gray-500 text-sm font-medium mb-1">Total Documents</h4>
            <div class="text-3xl font-bold text-brand-dark">{{ $docsCount }}</div>
        </div>
    </div>

    <!-- Stat Card 3 -->
    <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm flex flex-col justify-between hover:shadow-lg transition duration-300 transform hover:-translate-y-1 cursor-pointer" data-aos="fade-up" data-aos-delay="250">
        <div class="flex justify-between items-start mb-4">
            <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center text-red-500">
                <i data-lucide="mail" class="w-6 h-6"></i>
            </div>
            <span class="bg-red-100 text-red-800 text-xs font-bold px-2.5 py-1 rounded-full">8 Pending</span>
        </div>
        <div>
            <h4 class="text-gray-500 text-sm font-medium mb-1">Information Requests</h4>
            <div class="text-3xl font-bold text-brand-dark">{{ $requestsCount }}</div>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Manage Content -->
    <div class="lg:col-span-2 bg-white border border-gray-200 rounded-xl shadow-sm flex flex-col" data-aos="fade-right" data-aos-delay="100">
        <div class="p-6 border-b border-gray-200 flex justify-between items-center">
            <h3 class="text-xl font-bold text-brand-dark">Manage Content</h3>
            <a href="{{ route('admin.news.create') }}" class="bg-[#8b6e23] hover:bg-[#735b1d] text-white px-4 py-2 rounded-md text-sm font-medium flex items-center gap-2 transition shadow-sm">
                <i data-lucide="plus" class="w-4 h-4"></i> Add New
            </a>
        </div>
        <div class="p-0 overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-200 text-sm text-gray-500">
                        <th class="p-4 font-medium">Title</th>
                        <th class="p-4 font-medium">Status</th>
                        <th class="p-4 font-medium">Date</th>
                        <th class="p-4 font-medium text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-sm divide-y divide-gray-100">
                    @foreach($recentNews as $newsItem)
                    <tr class="hover:bg-gray-50">
                        <td class="p-4 text-gray-900 font-medium max-w-xs truncate">{{ $newsItem->title }}</td>
                        <td class="p-4"><span class="bg-green-100 text-brand-green text-xs font-bold px-2.5 py-1 rounded-full">Published</span></td>
                        <td class="p-4 text-gray-600">{{ \Carbon\Carbon::parse($newsItem->created_at)->format('M d, Y') }}</td>
                        <td class="p-4 text-right space-x-2">
                            <a href="{{ route('admin.news.edit', $newsItem->id) }}" class="inline-block text-gray-400 hover:text-gray-600"><i data-lucide="edit-2" class="w-4 h-4"></i></a>
                            <form action="{{ route('admin.news.destroy', $newsItem->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this news?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-gray-400 hover:text-red-500"><i data-lucide="trash-2" class="w-4 h-4"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="p-4 border-t border-gray-200 text-center">
            <a href="{{ route('admin.news.index') }}" class="text-sm font-bold text-brand-dark hover:text-brand-green transition">View All News</a>
        </div>
    </div>

    <!-- Upload Document -->
    <div class="lg:col-span-1 bg-white border border-gray-200 rounded-xl shadow-sm p-6 flex flex-col group hover:shadow-md transition duration-300" data-aos="fade-left" data-aos-delay="200">
        <h3 class="text-xl font-bold text-brand-dark mb-6">Upload Document</h3>
        
        <div class="border-2 border-dashed border-gray-300 rounded-xl p-8 text-center flex-grow flex flex-col items-center justify-center bg-gray-50 hover:bg-gray-100 transition cursor-pointer mb-6">
            <div class="w-12 h-12 bg-brand-green rounded-full flex items-center justify-center text-white mb-4 shadow-sm">
                <i data-lucide="cloud-upload" class="w-6 h-6"></i>
            </div>
            <p class="text-sm font-bold text-brand-dark mb-2">Drag and drop files here</p>
            <p class="text-sm text-gray-500 mb-6">or click to browse<br>from your computer</p>
            <p class="text-xs text-gray-400">Supported formats: PDF,<br>DOCX, XLSX (Max 10MB)</p>
        </div>
        
        <a href="{{ route('admin.documents.create') }}" class="w-full bg-brand-dark hover:bg-green-900 text-white py-3 rounded-md font-medium text-sm flex items-center justify-center gap-2 transition shadow-sm mt-auto">
            <i data-lucide="file-plus" class="w-4 h-4"></i> Import File
        </a>
    </div>
</div>
@endsection
