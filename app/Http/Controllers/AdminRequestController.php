<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminRequestController extends Controller
{
    public function index()
    {
        $requests = \App\Models\InformationRequest::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.requests.index', compact('requests'));
    }

    public function show(\App\Models\InformationRequest $request)
    {
        // Mark as read when viewed
        $request->is_read = true;
        $request->save();

        return view('admin.requests.show', compact('request'));
    }

    public function update(Request $req, \App\Models\InformationRequest $request)
    {
        $validated = $req->validate([
            'status' => 'required|in:Menunggu,Diproses,Selesai,Ditolak',
            'admin_response' => 'nullable|string',
            'response_file' => 'nullable|file|mimes:pdf,doc,docx,jpg,png|max:5120', // Max 5MB
        ]);

        $request->status = $validated['status'];
        
        if ($req->has('admin_response')) {
            $request->admin_response = $validated['admin_response'];
        }

        if ($req->hasFile('response_file')) {
            $file = $req->file('response_file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/responses', $filename);
            $request->response_file = $filename;
        }

        $request->save();

        return redirect()->route('admin.requests.index')->with('success', 'Status permohonan berhasil diperbarui');
    }
}
