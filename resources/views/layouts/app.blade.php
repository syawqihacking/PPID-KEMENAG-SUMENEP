<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'PPID Kemenag Sumenep')</title>
    
    <!-- Meta Tags for SEO & Social Media -->
    <meta name="description" content="@yield('meta_description', 'Portal Resmi Layanan Informasi dan Dokumentasi Kementerian Agama Kabupaten Sumenep.')">
    <meta property="og:title" content="@yield('title', 'PPID Kemenag Sumenep')">
    <meta property="og:description" content="@yield('meta_description', 'Portal Resmi Layanan Informasi dan Dokumentasi Kementerian Agama Kabupaten Sumenep.')">
    <meta property="og:image" content="@yield('meta_image', asset('logo_kemenag.png'))">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <meta name="twitter:card" content="summary_large_image">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        body { font-family: 'Inter', sans-serif; }
        .whatsapp-float {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background-color: #25d366;
            color: #FFF;
            border-radius: 50px;
            text-align: center;
            font-size: 30px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.15);
            z-index: 1000;
            display: flex;
            align-items: center;
            padding: 12px 20px;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        .whatsapp-float:hover {
            transform: scale(1.1);
            background-color: #128c7e;
            color: #FFF;
        }
        .whatsapp-float span {
            font-size: 14px;
            font-weight: 700;
            margin-left: 10px;
            display: none;
        }
        @media (min-width: 768px) {
            .whatsapp-float span { display: block; }
        }
    </style>
</head>
<body class="bg-gray-50 flex flex-col min-h-screen text-gray-800">

    <!-- Navigation -->
    <nav class="bg-white border-b border-gray-100 py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center">
            <div class="flex items-center gap-2">
                <!-- Placeholder for logo, replace with actual SVG or image -->
                <div class="w-8 h-8 flex items-center justify-center">
                   <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-brand-green">
                        <path d="M12 2L2 7L12 12L22 7L12 2Z" fill="currentColor"/>
                        <path d="M2 17L12 22L22 17" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M2 12L12 17L22 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                   </svg>
                </div>
                <span class="font-bold text-lg text-brand-green tracking-tight">PPID KEMENAG SUMENEP</span>
            </div>
            
            <div class="hidden md:flex space-x-8 items-center text-sm font-medium">
                <a href="{{ route('home') }}" class="text-gray-600 hover:text-brand-green transition {{ request()->routeIs('home') ? 'text-brand-green border-b-2 border-brand-green pb-1' : '' }}">Home</a>
                <a href="{{ route('profil.index') }}" class="text-gray-600 hover:text-brand-green transition {{ request()->routeIs('profil.index') ? 'text-brand-green border-b-2 border-brand-green pb-1' : '' }}">Profil PPID</a>
                <a href="{{ route('prosedur.index') }}" class="text-gray-600 hover:text-brand-green transition {{ request()->routeIs('prosedur.index') ? 'text-brand-green border-b-2 border-brand-green pb-1' : '' }}">Standar Layanan</a>
                <a href="{{ route('news.index') }}" class="text-gray-600 hover:text-brand-green transition {{ request()->routeIs('news.index') ? 'text-brand-green border-b-2 border-brand-green pb-1' : '' }}">News</a>
                <a href="{{ route('documents.index') }}" class="text-gray-600 hover:text-brand-green transition {{ request()->routeIs('documents.index') ? 'text-brand-green border-b-2 border-brand-green pb-1' : '' }}">PPID Info</a>
            </div>

            <div class="hidden md:flex items-center gap-4">
                <form action="{{ route('search') }}" method="GET" class="relative">
                    <input type="text" name="q" placeholder="Cari..." class="w-32 lg:w-48 bg-gray-50 border border-gray-200 rounded-full pl-8 pr-3 py-1.5 text-sm focus:outline-none focus:ring-1 focus:ring-brand-green focus:border-brand-green transition-all" required minlength="2">
                    <i data-lucide="search" class="w-4 h-4 text-gray-400 absolute left-2.5 top-2"></i>
                </form>
                @auth
                    @if(auth()->user()->isAdmin())
                        <a href="{{ route('admin.dashboard') }}" class="bg-brand-dark text-white px-5 py-2 rounded-md font-medium text-sm hover:bg-green-900 transition shadow-sm">Dashboard Admin</a>
                    @elseif(auth()->user()->isOperator())
                        <a href="{{ route('operator.livechat.index') }}" class="bg-brand-dark text-white px-5 py-2 rounded-md font-medium text-sm hover:bg-green-900 transition shadow-sm">CS Dashboard</a>
                    @endif
                @else
                    <a href="{{ route('login') }}" class="bg-brand-dark text-white px-5 py-2 rounded-md font-medium text-sm hover:bg-green-900 transition shadow-sm">Login</a>
                @endauth
            </div>

            <!-- Mobile menu button -->
            <div class="md:hidden flex items-center">
                <button id="mobile-menu-btn" class="text-gray-600 hover:text-gray-900 focus:outline-none">
                    <i data-lucide="menu"></i>
                </button>
            </div>
        </div>
        
        <!-- Mobile Menu (Hidden by default) -->
        <div id="mobile-menu" class="hidden md:hidden border-t border-gray-100 bg-white">
            <div class="px-4 pt-2 pb-4 space-y-1">
                <a href="{{ route('home') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-brand-green hover:bg-gray-50">Home</a>
                <a href="{{ route('profil.index') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-brand-green hover:bg-gray-50">Profil PPID</a>
                <a href="{{ route('prosedur.index') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-brand-green hover:bg-gray-50">Standar Layanan</a>
                <a href="{{ route('news.index') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-brand-green hover:bg-gray-50">News</a>
                <a href="{{ route('documents.index') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-brand-green hover:bg-gray-50">PPID Info</a>
                @auth
                    @if(auth()->user()->isAdmin())
                        <a href="{{ route('admin.dashboard') }}" class="block px-3 py-2 mt-4 text-center rounded-md text-base font-medium bg-brand-dark text-white hover:bg-green-900">Dashboard Admin</a>
                    @elseif(auth()->user()->isOperator())
                        <a href="{{ route('operator.livechat.index') }}" class="block px-3 py-2 mt-4 text-center rounded-md text-base font-medium bg-brand-dark text-white hover:bg-green-900">Dashboard CS</a>
                    @endif
                @else
                    <a href="{{ route('login') }}" class="block px-3 py-2 mt-4 text-center rounded-md text-base font-medium bg-brand-dark text-white hover:bg-green-900">Login</a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-100 py-12 mt-12 border-t border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="col-span-1 md:col-span-1">
                    <div class="flex items-center gap-2 mb-4">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-brand-green">
                            <path d="M12 2L2 7L12 12L22 7L12 2Z" fill="currentColor"/>
                            <path d="M2 17L12 22L22 17" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M2 12L12 17L22 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                       </svg>
                        <span class="font-bold text-brand-green">PPID KEMENAG SUMENEP</span>
                    </div>
                    <p class="text-gray-500 text-sm leading-relaxed mb-4">
                        Portal Resmi Layanan Informasi dan Dokumentasi Kementerian Agama Kabupaten Sumenep.
                    </p>
                </div>
                
                <div>
                    <h3 class="font-semibold text-gray-900 mb-4 text-sm">Tautan Terkait</h3>
                    <ul class="space-y-3 text-sm text-gray-600">
                        <li><a href="https://kemenag.go.id" target="_blank" class="hover:text-brand-green transition underline">Kementerian Agama RI</a></li>
                        <li><a href="https://jatim.kemenag.go.id" target="_blank" class="hover:text-brand-green transition underline">Kanwil Kemenag Jatim</a></li>
                        <li><a href="https://sumenepkab.go.id" target="_blank" class="hover:text-brand-green transition underline">Pemkab Sumenep</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="font-semibold text-gray-900 mb-4 text-sm">Layanan Kami</h3>
                    <ul class="space-y-3 text-sm text-gray-600">
                        <li><a href="{{ route('dip.index') }}" class="hover:text-brand-green transition underline">Daftar Informasi Publik (DIP)</a></li>
                        <li><a href="{{ route('requests.create') }}" class="hover:text-brand-green transition underline">Permohonan Informasi</a></li>
                        <li><a href="{{ route('faq.index') }}" class="hover:text-brand-green transition underline">FAQ (Tanya Jawab)</a></li>
                        <li><a href="{{ route('reviews.index') }}" class="hover:text-brand-green transition underline">Ulasan & Penilaian</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="font-semibold text-gray-900 mb-4 text-sm">Hubungi Kami</h3>
                    <ul class="space-y-3 text-sm text-gray-600">
                        <li><a href="{{ route('kontak.index') }}" class="hover:text-brand-green transition underline">Kontak & Lokasi</a></li>
                        <li class="flex gap-2 items-start"><i data-lucide="phone" class="w-4 h-4 mt-0.5 text-gray-400"></i> {{ \App\Models\Setting::get('kontak_telepon', '(0328) 662-124') }}</li>
                        <li class="flex gap-2 items-start"><i data-lucide="mail" class="w-4 h-4 mt-0.5 text-gray-400"></i> {{ explode(',', \App\Models\Setting::get('kontak_email', 'ppid.sumenep@kemenag.go.id'))[0] }}</li>
                    </ul>
                </div>
            </div>
            
            <div class="mt-12 pt-8 border-t border-gray-200">
                <p class="text-xs text-gray-500">
                    &copy; {{ date('Y') }} PPID Kemenag Sumenep. All rights reserved. Official Portal for Public Information.<b>{Syawqi Developer} </b>
                </p>
            </div>
        </div>
    </footer>

    <!-- WhatsApp Floating Button -->
    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', \App\Models\Setting::get('kontak_wa', '6283166576553')) }}?text=Halo%20PPID%20Kemenag%20Sumenep,%20saya%20ingin%20bertanya..." class="whatsapp-float" target="_blank">
        <i data-lucide="message-circle" class="w-6 h-6"></i>
        <span>Hubungi Kami</span>
    </a>

    <!-- AI Chatbot Floating Button & Window -->
    <div id="chatbot-container" class="fixed bottom-[90px] right-[30px] z-[1000] flex flex-col items-end">
        <!-- Chat Window (Hidden by default) -->
        <div id="chatbot-window" class="hidden w-[350px] bg-white rounded-2xl shadow-2xl border border-gray-100 overflow-hidden mb-4 flex flex-col transition-all duration-300 transform origin-bottom-right" style="height: 450px;">
            <!-- Header -->
            <div class="bg-brand-dark text-white p-4 flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center">
                        <i data-lucide="bot" class="w-5 h-5"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-sm">Asisten Virtual PPID</h4>
                        <p class="text-[10px] text-green-200">Online | AI Powered</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <button id="chatbot-reset" class="text-white/80 hover:text-white transition" title="Mulai Obrolan Baru">
                        <i data-lucide="refresh-cw" class="w-4 h-4"></i>
                    </button>
                    <button id="chatbot-close" class="text-white/80 hover:text-white transition">
                        <i data-lucide="x" class="w-5 h-5"></i>
                    </button>
                </div>
            </div>
            
            <!-- Messages Area -->
            <div id="chatbot-messages" class="flex-grow p-4 overflow-y-auto bg-gray-50 flex flex-col gap-3 text-sm">
                <!-- Welcome Message -->
                <div class="flex gap-2 max-w-[85%]">
                    <div class="w-6 h-6 bg-brand-green rounded-full flex-shrink-0 flex items-center justify-center text-white mt-1">
                        <i data-lucide="bot" class="w-3.5 h-3.5"></i>
                    </div>
                    <div class="bg-white border border-gray-100 p-3 rounded-2xl rounded-tl-sm text-gray-700 shadow-sm leading-relaxed text-left text-[13px]">
                        Halo! Saya Asisten Virtual PPID Kemenag Sumenep. Ada yang bisa saya bantu terkait layanan informasi publik?
                    </div>
                </div>
            </div>
            
            <!-- Input Area -->
            <div class="p-3 bg-white border-t border-gray-100">
                <form id="chatbot-form" class="flex items-center gap-2">
                    <input type="text" id="chatbot-input" class="flex-grow px-3 py-2 bg-gray-100 border-transparent focus:bg-white border focus:border-brand-green rounded-full text-sm outline-none transition" placeholder="Ketik pesan Anda..." required autocomplete="off">
                    <button type="submit" id="chatbot-submit" class="w-9 h-9 bg-brand-green text-white rounded-full flex items-center justify-center flex-shrink-0 hover:bg-brand-dark transition shadow-sm disabled:opacity-50 disabled:cursor-not-allowed">
                        <i data-lucide="send" class="w-4 h-4 ml-0.5"></i>
                    </button>
                </form>
            </div>
        </div>

        <!-- Floating Toggle Button -->
        <button id="chatbot-toggle" class="w-[60px] h-[60px] bg-brand-dark text-white rounded-full shadow-lg flex items-center justify-center hover:scale-110 transition-transform duration-300">
            <i data-lucide="bot-message-square" class="w-7 h-7"></i>
        </button>
    </div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
    <script>
        lucide.createIcons();
        AOS.init({
            duration: 800,
            once: true,
            easing: 'ease-out-cubic'
        });

        // Mobile Menu Toggle
        const mobileBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        
        if(mobileBtn && mobileMenu) {
            mobileBtn.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });
        }

        // Chatbot Logic
        document.addEventListener('DOMContentLoaded', function() {
            const chatbotToggle = document.getElementById('chatbot-toggle');
            const chatbotClose = document.getElementById('chatbot-close');
            const chatbotReset = document.getElementById('chatbot-reset');
            const chatbotWindow = document.getElementById('chatbot-window');
            const chatbotForm = document.getElementById('chatbot-form');
            const chatbotInput = document.getElementById('chatbot-input');
            const chatbotMessages = document.getElementById('chatbot-messages');
            const chatbotSubmit = document.getElementById('chatbot-submit');
            
            // Notification sound for new incoming messages
            const notifSound = new Audio('https://assets.mixkit.co/active_storage/sfx/2869/2869-preview.mp3');

            let sessionId = localStorage.getItem('chatbot_session_id');
            if (!sessionId) {
                sessionId = 'sess_' + Math.random().toString(36).substr(2, 9);
                localStorage.setItem('chatbot_session_id', sessionId);
            }
            let lastId = 0;
            let pollInterval = null;
            let hasPlayedCsSound = false;

            // Configure marked options
            if (window.marked) {
                marked.setOptions({
                    breaks: true, // converts \n to <br>
                    gfm: true     // GitHub Flavored Markdown
                });
            }

            // Toggle window visibility
            chatbotToggle.addEventListener('click', () => {
                chatbotWindow.classList.toggle('hidden');
                if(!chatbotWindow.classList.contains('hidden')) {
                    chatbotInput.focus();
                    startPolling();
                    pollMessages(); // Fetch immediately
                } else {
                    stopPolling();
                }
            });

            chatbotClose.addEventListener('click', () => {
                chatbotWindow.classList.add('hidden');
                stopPolling();
            });

            // Reset Chat Session
            chatbotReset.addEventListener('click', () => {
                if(confirm('Mulai obrolan baru dan hapus riwayat percakapan ini?')) {
                    localStorage.removeItem('chatbot_session_id');
                    sessionId = 'sess_' + Math.random().toString(36).substr(2, 9);
                    localStorage.setItem('chatbot_session_id', sessionId);
                    lastId = 0;
                    hasPlayedCsSound = false;
                    chatbotMessages.innerHTML = `
                        <div class="flex gap-2 max-w-[85%]">
                            <div class="w-6 h-6 bg-brand-green rounded-full flex-shrink-0 flex items-center justify-center text-white mt-1">
                                <i data-lucide="bot" class="w-3.5 h-3.5"></i>
                            </div>
                            <div class="bg-white border border-gray-100 p-3 rounded-2xl rounded-tl-sm text-gray-700 shadow-sm leading-relaxed text-left text-[13px]">
                                Halo! Saya Asisten Virtual PPID Kemenag Sumenep. Riwayat obrolan telah dibersihkan. Ada yang bisa saya bantu sekarang?
                            </div>
                        </div>
                    `;
                    lucide.createIcons();
                }
            });

            // Append message helper
            function appendMessage(sender, text, msgId = null, playSound = false) {
                if (msgId && document.querySelector(`[data-msg-id="${msgId}"]`)) return;
                
                const isUser = sender === 'user';
                const div = document.createElement('div');
                div.className = `flex gap-2 max-w-[85%] ${isUser ? 'self-end flex-row-reverse' : ''}`;
                if (msgId) {
                    div.setAttribute('data-msg-id', msgId);
                    if (msgId > lastId) lastId = msgId;
                }
                
                const avatar = isUser ? '' : `
                    <div class="w-6 h-6 bg-brand-green rounded-full flex-shrink-0 flex items-center justify-center text-white mt-1">
                        <i data-lucide="${sender === 'admin' ? 'headphones' : 'bot'}" class="w-3.5 h-3.5"></i>
                    </div>
                `;
                
                // Parse markdown for non-user messages
                let displayHtml = text;
                if (!isUser && window.marked) {
                    displayHtml = marked.parse(text);
                } else if (!isUser) {
                    // Fallback if marked is somehow not loaded
                    displayHtml = text.replace(/\n/g, '<br>');
                }

                // Add markdown styling classes if it's parsed HTML
                const contentClass = !isUser ? '[&>p]:mb-2 [&>p:last-child]:mb-0 [&>ul]:list-disc [&>ul]:pl-4 [&>ul]:mb-2 [&>ol]:list-decimal [&>ol]:pl-4 [&>ol]:mb-2 [&>strong]:font-bold [&>em]:italic [&>a]:text-blue-600 [&>a]:underline whitespace-normal' : 'whitespace-pre-wrap';
                
                const messageBubble = `
                    <div class="${isUser ? 'bg-brand-dark text-white rounded-tr-sm' : (sender === 'admin' ? 'bg-blue-50 border border-blue-100 text-gray-800 rounded-tl-sm' : 'bg-white border border-gray-100 text-gray-700 rounded-tl-sm')} p-3 rounded-2xl shadow-sm leading-relaxed text-left text-[13px] inline-block ${contentClass}">${displayHtml}</div>
                `;
                
                div.innerHTML = avatar + messageBubble;
                chatbotMessages.appendChild(div);
                if (window.lucide) lucide.createIcons();
                
                // Scroll to bottom
                chatbotMessages.scrollTop = chatbotMessages.scrollHeight;

                if (playSound && !isUser && !chatbotWindow.classList.contains('hidden')) {
                    try { notifSound.play(); } catch(e) {}
                }
            }

            // Show typing indicator
            function showTyping() {
                const id = 'typing-' + Date.now();
                const div = document.createElement('div');
                div.id = id;
                div.className = `flex gap-2 max-w-[85%]`;
                div.innerHTML = `
                    <div class="w-6 h-6 bg-brand-green rounded-full flex-shrink-0 flex items-center justify-center text-white mt-1">
                        <i data-lucide="bot" class="w-3.5 h-3.5"></i>
                    </div>
                    <div class="bg-white border border-gray-100 p-3 rounded-2xl rounded-tl-sm shadow-sm flex items-center gap-1">
                        <div class="w-1.5 h-1.5 bg-gray-400 rounded-full animate-bounce"></div>
                        <div class="w-1.5 h-1.5 bg-gray-400 rounded-full animate-bounce" style="animation-delay: 0.2s"></div>
                        <div class="w-1.5 h-1.5 bg-gray-400 rounded-full animate-bounce" style="animation-delay: 0.4s"></div>
                    </div>
                `;
                chatbotMessages.appendChild(div);
                chatbotMessages.scrollTop = chatbotMessages.scrollHeight;
                if (window.lucide) lucide.createIcons();
                return id;
            }

            function removeTyping(id) {
                const el = document.getElementById(id);
                if(el) el.remove();
            }

            async function pollMessages() {
                try {
                    const response = await fetch(`{{ route('chatbot.poll') }}?session_id=${sessionId}&last_id=${lastId}`);
                    const data = await response.json();
                    
                    if (data.messages && data.messages.length > 0) {
                        // Clear welcome message if it's the first time we load history
                        if (lastId === 0) {
                            chatbotMessages.innerHTML = ''; 
                        }

                        data.messages.forEach(msg => {
                            // Only play sound ONCE when the very first message from CS (Admin) arrives
                            const shouldPlaySound = (lastId !== 0 && msg.sender_type === 'admin' && !hasPlayedCsSound);
                            if (shouldPlaySound) hasPlayedCsSound = true;
                            
                            appendMessage(msg.sender_type, msg.message, msg.id, shouldPlaySound);
                        });
                    }
                } catch (e) {
                    console.error("Polling error", e);
                }
            }

            function startPolling() {
                if (pollInterval) return;
                pollInterval = setInterval(pollMessages, 3000);
            }

            function stopPolling() {
                if (pollInterval) {
                    clearInterval(pollInterval);
                    pollInterval = null;
                }
            }

            // Handle submission
            chatbotForm.addEventListener('submit', async (e) => {
                e.preventDefault();
                const message = chatbotInput.value.trim();
                if(!message) return;

                // Disable input & button
                chatbotInput.value = '';
                chatbotInput.disabled = true;
                chatbotSubmit.disabled = true;

                // Append optimistic user message (without ID, polling will fetch it and replace/dedup if we used IDs, but since we don't have ID here, polling will actually duplicate it if we aren't careful. Let's just wait for polling or use a temp ID!)
                // Actually, to prevent duplicates, we don't append optimistic user message. We wait for POST response to give us IDs.
                
                // Show typing indicator
                const typingId = showTyping();

                try {
                    const response = await fetch("{{ route('chatbot.chat') }}", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({ message, session_id: sessionId })
                    });

                    const data = await response.json();
                    
                    removeTyping(typingId);
                    
                    // If response returns messages array (userMsgId, botMsgId), we can just call pollMessages immediately to render them!
                    await pollMessages();

                } catch (error) {
                    removeTyping(typingId);
                    appendMessage('bot', 'Maaf, sepertinya koneksi terputus. Silakan coba lagi nanti.');
                } finally {
                    chatbotInput.disabled = false;
                    chatbotSubmit.disabled = false;
                    chatbotInput.focus();
                }
            });
            
            // Initial load of messages if session exists
            pollMessages();
        });
    </script>
</body>
</html>
