<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDocumentController extends Controller
{
    public function index()
    {
        $documents = \App\Models\Document::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.documents.index', compact('documents'));
    }

    public function create()
    {
        return view('admin.documents.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'description' => 'required|string',
            'file' => 'required|file|max:10240', // 10MB max
        ]);

        $doc = new \App\Models\Document();
        $doc->title = $validated['title'];
        $doc->category = $validated['category'];
        $doc->description = $validated['description'];
        
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $doc->file_extension = strtoupper($file->getClientOriginalExtension());
            $size = $file->getSize();
            $doc->file_size = $size > 1048576 ? round($size / 1048576, 1) . ' MB' : round($size / 1024, 1) . ' KB';
            
            $path = $file->store('documents', 'public');
            $doc->file_path = '/storage/' . $path;
        }

        $doc->save();

        return redirect()->route('admin.documents.index')->with('success', 'Document uploaded successfully');
    }

    public function edit(\App\Models\Document $document)
    {
        return view('admin.documents.edit', compact('document'));
    }

    public function update(Request $request, \App\Models\Document $document)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'description' => 'required|string',
            'file' => 'nullable|file|max:10240', // 10MB max
        ]);

        $document->title = $validated['title'];
        $document->category = $validated['category'];
        $document->description = $validated['description'];
        
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $document->file_extension = strtoupper($file->getClientOriginalExtension());
            $size = $file->getSize();
            $document->file_size = $size > 1048576 ? round($size / 1048576, 1) . ' MB' : round($size / 1024, 1) . ' KB';
            
            $path = $file->store('documents', 'public');
            $document->file_path = '/storage/' . $path;
        }

        $document->save();

        return redirect()->route('admin.documents.index')->with('success', 'Document updated successfully');
    }

    public function destroy(\App\Models\Document $document)
    {
        $document->delete();
        return redirect()->route('admin.documents.index')->with('success', 'Document deleted successfully');
    }
}
