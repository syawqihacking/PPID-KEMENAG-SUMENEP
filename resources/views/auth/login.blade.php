<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - PPID Kemenag Sumenep</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-50 flex items-center justify-center h-screen">

    <div class="bg-white p-8 rounded-xl shadow-md border border-gray-100 w-full max-w-md">
        <div class="flex justify-center mb-6">
            <div class="flex items-center gap-2">
                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-brand-green">
                    <path d="M12 2L2 7L12 12L22 7L12 2Z" fill="currentColor"/>
                    <path d="M2 17L12 22L22 17" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M2 12L12 17L22 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <span class="font-bold text-xl text-brand-green tracking-tight">PPID ADMIN</span>
            </div>
        </div>

        <h2 class="text-2xl font-bold text-center text-gray-900 mb-8">Sign in to your account</h2>

        @if($errors->any())
        <div class="bg-red-50 text-red-600 p-3 rounded-md text-sm mb-6 border border-red-100">
            {{ $errors->first() }}
        </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf
            
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                <input type="email" name="email" id="email" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-brand-green focus:border-brand-green text-sm" value="{{ old('email') }}" placeholder="user@example.com">
            </div>
            
            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input type="password" name="password" id="password" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-brand-green focus:border-brand-green text-sm" placeholder="Masukkan password">
            </div>
            
            <button type="submit" class="w-full bg-brand-dark hover:bg-green-900 text-white py-2.5 rounded-md font-medium transition shadow-sm">
                Sign In
            </button>
        </form>
        <div class="mt-6 text-center text-sm text-gray-600">
            Belum punya akun? 
            <a href="{{ route('register') }}" class="text-brand-green font-semibold hover:underline">Daftar sekarang</a>
        </div>
        <div class="mt-4 text-center">
            <a href="{{ route('home') }}" class="text-xs text-gray-400 hover:text-gray-600 underline">Kembali ke Beranda Web</a>
        </div>
    </div>

</body>
</html>
