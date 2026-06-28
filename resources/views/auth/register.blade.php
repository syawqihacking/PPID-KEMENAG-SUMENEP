<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun - PPID Kemenag Sumenep</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen p-4">

    <div class="bg-white rounded-2xl shadow-xl w-full max-w-md overflow-hidden border border-gray-100">
        <!-- Header -->
        <div class="bg-brand-green p-6 text-center text-white relative overflow-hidden">
            <div class="absolute -right-10 -top-10 w-32 h-32 bg-white opacity-10 rounded-full blur-2xl"></div>
            <img src="{{ asset('images/logo.svg') }}" alt="Logo" class="h-12 mx-auto mb-3 relative z-10" onerror="this.src='https://upload.wikimedia.org/wikipedia/commons/f/f2/Lambang_Kementerian_Agama.svg'">
            <h1 class="text-xl font-bold relative z-10">Daftar Akun Pemohon</h1>
            <p class="text-sm text-green-50 opacity-90 relative z-10">Portal PPID Kemenag Sumenep</p>
        </div>

        <!-- Form -->
        <div class="p-6 md:p-8">
            <form action="{{ route('register') }}" method="POST" class="space-y-4">
                @csrf
                
                <!-- Name -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i data-lucide="user" class="w-5 h-5 text-gray-400"></i>
                        </div>
                        <input type="text" name="name" value="{{ old('name') }}" required 
                            class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand-green focus:border-brand-green outline-none transition @error('name') border-red-500 @enderror"
                            placeholder="Masukkan nama sesuai KTP">
                    </div>
                    @error('name') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Email Aktif</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i data-lucide="mail" class="w-5 h-5 text-gray-400"></i>
                        </div>
                        <input type="email" name="email" value="{{ old('email') }}" required 
                            class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand-green focus:border-brand-green outline-none transition @error('email') border-red-500 @enderror"
                            placeholder="nama@email.com">
                    </div>
                    @error('email') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Password -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Kata Sandi</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i data-lucide="lock" class="w-5 h-5 text-gray-400"></i>
                        </div>
                        <input type="password" name="password" required 
                            class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand-green focus:border-brand-green outline-none transition @error('password') border-red-500 @enderror"
                            placeholder="Minimal 8 karakter">
                    </div>
                    @error('password') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Confirm Password -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Kata Sandi</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i data-lucide="check-circle" class="w-5 h-5 text-gray-400"></i>
                        </div>
                        <input type="password" name="password_confirmation" required 
                            class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand-green focus:border-brand-green outline-none transition"
                            placeholder="Ulangi kata sandi">
                    </div>
                </div>

                <div class="pt-2">
                    <button type="submit" class="w-full bg-brand-green hover:bg-brand-dark text-white font-medium py-2.5 rounded-lg transition shadow-md hover:shadow-lg flex justify-center items-center gap-2">
                        <span>Daftar Sekarang</span>
                        <i data-lucide="arrow-right" class="w-4 h-4"></i>
                    </button>
                </div>
            </form>

            <div class="mt-6 text-center text-sm text-gray-600">
                Sudah punya akun? 
                <a href="{{ route('login') }}" class="text-brand-green font-semibold hover:underline">Masuk di sini</a>
            </div>
            <div class="mt-4 text-center">
                <a href="{{ route('home') }}" class="text-xs text-gray-400 hover:text-gray-600 underline">Kembali ke Beranda Web</a>
            </div>
        </div>
    </div>

    <script>lucide.createIcons();</script>
</body>
</html>
