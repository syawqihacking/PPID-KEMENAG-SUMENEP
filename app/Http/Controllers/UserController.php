<?php

namespace App\Http\Controllers;

use App\Models\InformationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Show the user dashboard.
     */
    public function dashboard()
    {
        $user = Auth::user();
        
        $stats = [
            'total' => $user->informationRequests()->count(),
            'pending' => $user->informationRequests()->where('status', 'Menunggu')->count(),
            'processed' => $user->informationRequests()->where('status', 'Diproses')->count(),
            'completed' => $user->informationRequests()->where('status', 'Selesai')->count(),
        ];

        $recentRequests = $user->informationRequests()->latest()->take(5)->get();

        return view('user.dashboard', compact('stats', 'recentRequests'));
    }

    /**
     * List all requests by the user.
     */
    public function requests()
    {
        $requests = Auth::user()->informationRequests()->latest()->paginate(10);
        return view('user.requests.index', compact('requests'));
    }

    /**
     * Show details of a specific request.
     */
    public function showRequest($id)
    {
        $request = Auth::user()->informationRequests()->findOrFail($id);
        return view('user.requests.show', compact('request'));
    }

    /**
     * Show the user profile.
     */
    public function profile()
    {
        $user = Auth::user();
        return view('user.profile', compact('user'));
    }

    /**
     * Update the user profile details.
     */
    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return back()->with('success', 'Profil berhasil diperbarui!');
    }

    /**
     * Update the user password.
     */
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = Auth::user();

        if (!\Illuminate\Support\Facades\Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Password saat ini salah.'])->withInput();
        }

        $user->update([
            'password' => \Illuminate\Support\Facades\Hash::make($request->password),
        ]);

        return back()->with('success_password', 'Password berhasil diubah!');
    }

    /**
     * Submit an objection for a rejected request.
     */
    public function submitObjection(Request $req, $id)
    {
        $request = Auth::user()->informationRequests()->where('status', 'Ditolak')->findOrFail($id);

        $req->validate([
            'objection_reason' => 'required|string|min:10',
        ]);

        $request->update([
            'objection_reason' => $req->objection_reason,
            'objection_status' => 'Menunggu Review',
            'objection_date' => now(),
        ]);

        return back()->with('success_objection', 'Keberatan Anda telah berhasil dikirim dan sedang dalam tinjauan tim PPID.');
    }
}
