<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AdminProfileController extends Controller
{
    public function index()
    {
        return view('admin.profile.index');
    }

    /**
     * Return session/environment info as JSON for AJAX requests.
     */
    public function sessionInfo(Request $request)
    {
        $ua = $request->header('User-Agent', '');

        // Parse Browser
        $browser = 'Unknown Browser';
        if (str_contains($ua, 'Edg/'))          $browser = 'Microsoft Edge';
        elseif (str_contains($ua, 'OPR/') || str_contains($ua, 'Opera')) $browser = 'Opera';
        elseif (str_contains($ua, 'Chrome/'))   $browser = 'Google Chrome';
        elseif (str_contains($ua, 'Firefox/'))  $browser = 'Mozilla Firefox';
        elseif (str_contains($ua, 'Safari/') && !str_contains($ua, 'Chrome')) $browser = 'Safari';

        // Parse OS
        $os = 'Unknown OS';
        if (str_contains($ua, 'Windows NT 10')) $os = 'Windows 10/11';
        elseif (str_contains($ua, 'Windows NT')) $os = 'Windows';
        elseif (str_contains($ua, 'Mac OS X'))   $os = 'macOS';
        elseif (str_contains($ua, 'Android'))    $os = 'Android';
        elseif (str_contains($ua, 'iPhone'))     $os = 'iOS (iPhone)';
        elseif (str_contains($ua, 'iPad'))       $os = 'iOS (iPad)';
        elseif (str_contains($ua, 'Linux'))      $os = 'Linux';

        // Device type
        $isMobile = (bool) preg_match('/Android|iPhone|iPad|iPod|Opera Mini|IEMobile/i', $ua);

        return response()->json([
            'browser'    => $browser,
            'os'         => $os,
            'device'     => $isMobile ? 'Perangkat Seluler' : 'Komputer Desktop',
            'is_mobile'  => $isMobile,
            'ip'         => $request->ip(),
            'user_agent' => $ua,
            'language'   => $request->getPreferredLanguage() ?? 'id',
            'timestamp'  => now()->format('d M Y, H:i:s'),
        ]);
    }

    public function updatePassword(Request $request)
    {
        $validated = $request->validate([
            'current_password' => ['required', 'current_password'],
            'new_password' => ['required', Password::defaults(), 'confirmed'],
        ]);

        $request->user()->update([
            'password' => Hash::make($validated['new_password']),
        ]);

        return back()->with('success', 'Kata sandi berhasil diperbarui.');
    }
}
