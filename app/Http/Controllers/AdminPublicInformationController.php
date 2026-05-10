<?php

namespace App\Http\Controllers;

use App\Models\PublicInformation;
use Illuminate\Http\Request;

class AdminPublicInformationController extends Controller
{
    public function index()
    {
        $dips = PublicInformation::orderBy('type')->orderBy('order')->get();
        return view('admin.dip.index', compact('dips'));
    }

    public function create()
    {
        return view('admin.dip.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|in:Berkala,Serta Merta,Setiap Saat,Dikecualikan',
            'description' => 'nullable|string',
            'order' => 'integer',
        ]);

        PublicInformation::create($request->all());

        return redirect()->route('admin.dip.index')->with('success', 'Data DIP berhasil ditambahkan!');
    }

    public function edit(PublicInformation $dip)
    {
        return view('admin.dip.edit', compact('dip'));
    }

    public function update(Request $request, PublicInformation $dip)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|in:Berkala,Serta Merta,Setiap Saat,Dikecualikan',
            'description' => 'nullable|string',
            'order' => 'integer',
        ]);

        $dip->update($request->all());

        return redirect()->route('admin.dip.index')->with('success', 'Data DIP berhasil diperbarui!');
    }

    public function destroy(PublicInformation $dip)
    {
        $dip->delete();
        return redirect()->route('admin.dip.index')->with('success', 'Data DIP berhasil dihapus!');
    }
}
