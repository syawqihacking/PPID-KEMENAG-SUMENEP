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
        return view('admin.requests.show', compact('request'));
    }

    public function update(Request $req, \App\Models\InformationRequest $request)
    {
        $validated = $req->validate([
            'status' => 'required|in:pending,approved,rejected',
        ]);

        $request->status = $validated['status'];
        $request->save();

        return redirect()->route('admin.requests.index')->with('success', 'Status updated successfully');
    }
}
