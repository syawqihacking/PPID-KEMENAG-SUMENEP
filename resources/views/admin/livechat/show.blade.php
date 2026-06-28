@extends('layouts.operator')

@section('title', 'Live Chat')

@section('content')
<div class="mb-4 flex justify-between items-center">
    <a href="{{ route('operator.livechat.index') }}" class="text-sm font-medium text-gray-500 hover:text-gray-900 flex items-center gap-1">
        <i data-lucide="arrow-left" class="w-4 h-4"></i> Kembali
    </a>
    <form action="{{ route('operator.livechat.close', $session) }}" method="POST" onsubmit="return confirm('Akhiri sesi obrolan ini?')">
        @csrf
        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-medium py-1.5 px-3 rounded-lg text-sm transition">Akhiri Chat</button>
    </form>
</div>

<div class="bg-white border border-gray-200 rounded-xl overflow-hidden shadow-sm flex flex-col h-[600px]">
    <!-- Header -->
    <div class="px-6 py-4 border-b border-gray-200 bg-gray-50 flex items-center gap-3">
        <div class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center text-gray-500">
            <i data-lucide="user" class="w-5 h-5"></i>
        </div>
        <div>
            <h2 class="text-sm font-bold text-gray-900">Pengunjung Anonim</h2>
            <p class="text-xs text-gray-500 font-mono">ID: {{ substr($session->session_id, 0, 12) }}...</p>
        </div>
    </div>

    <!-- Messages -->
    <div id="chat-messages" class="flex-1 overflow-y-auto p-6 bg-gray-50 flex flex-col gap-4">
        @foreach($session->messages as $msg)
            @if($msg->sender_type == 'admin')
                <div class="flex gap-2 max-w-[85%] self-end flex-row-reverse" data-id="{{ $msg->id }}">
                    <div class="bg-blue-600 text-white p-3 rounded-2xl rounded-tr-sm shadow-sm leading-relaxed text-[13px] inline-block">
                        {{ $msg->message }}
                    </div>
                </div>
            @elseif($msg->sender_type == 'bot')
                <div class="flex gap-2 max-w-[85%]" data-id="{{ $msg->id }}">
                    <div class="w-8 h-8 bg-brand-dark rounded-full flex-shrink-0 flex items-center justify-center text-white">
                        <i data-lucide="bot" class="w-4 h-4"></i>
                    </div>
                    <div class="bg-gray-200 text-gray-700 p-3 rounded-2xl rounded-tl-sm shadow-sm leading-relaxed text-[13px] inline-block">
                        {{ $msg->message }}
                    </div>
                </div>
            @else
                <div class="flex gap-2 max-w-[85%]" data-id="{{ $msg->id }}">
                    <div class="w-8 h-8 bg-gray-300 rounded-full flex-shrink-0 flex items-center justify-center text-gray-600">
                        <i data-lucide="user" class="w-4 h-4"></i>
                    </div>
                    <div class="bg-white border border-gray-200 text-gray-800 p-3 rounded-2xl rounded-tl-sm shadow-sm leading-relaxed text-[13px] inline-block">
                        {{ $msg->message }}
                    </div>
                </div>
            @endif
        @endforeach
    </div>

    <!-- Input -->
    <div class="p-4 bg-white border-t border-gray-200">
        <form id="reply-form" class="flex gap-2">
            <input type="text" id="reply-input" class="flex-1 border border-gray-300 rounded-full px-4 py-2 text-sm focus:outline-none focus:border-blue-500" placeholder="Ketik balasan CS di sini..." autocomplete="off">
            <button type="submit" id="reply-submit" class="bg-blue-600 text-white w-10 h-10 rounded-full flex items-center justify-center hover:bg-blue-700 transition flex-shrink-0">
                <i data-lucide="send" class="w-4 h-4 ml-0.5"></i>
            </button>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const chatContainer = document.getElementById('chat-messages');
    chatContainer.scrollTop = chatContainer.scrollHeight;

    const form = document.getElementById('reply-form');
    const input = document.getElementById('reply-input');
    const submitBtn = document.getElementById('reply-submit');
    let lastId = {{ $session->messages->max('id') ?? 0 }};

    function appendAdminMessage(text, id) {
        if(document.querySelector(`[data-id="${id}"]`)) return;
        const div = document.createElement('div');
        div.className = "flex gap-2 max-w-[85%] self-end flex-row-reverse";
        div.setAttribute('data-id', id);
        div.innerHTML = `<div class="bg-blue-600 text-white p-3 rounded-2xl rounded-tr-sm shadow-sm leading-relaxed text-[13px] inline-block">${text}</div>`;
        chatContainer.appendChild(div);
        chatContainer.scrollTop = chatContainer.scrollHeight;
        if(id > lastId) lastId = id;
    }

    function appendUserMessage(text, id) {
        if(document.querySelector(`[data-id="${id}"]`)) return;
        const div = document.createElement('div');
        div.className = "flex gap-2 max-w-[85%]";
        div.setAttribute('data-id', id);
        div.innerHTML = `
            <div class="w-8 h-8 bg-gray-300 rounded-full flex-shrink-0 flex items-center justify-center text-gray-600">
                <i data-lucide="user" class="w-4 h-4"></i>
            </div>
            <div class="bg-white border border-gray-200 text-gray-800 p-3 rounded-2xl rounded-tl-sm shadow-sm leading-relaxed text-[13px] inline-block">
                ${text}
            </div>
        `;
        chatContainer.appendChild(div);
        lucide.createIcons();
        chatContainer.scrollTop = chatContainer.scrollHeight;
        if(id > lastId) lastId = id;
    }

    // Notification sound for incoming user messages
    const notifSound = new Audio('https://assets.mixkit.co/active_storage/sfx/2869/2869-preview.mp3');

    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        const msg = input.value.trim();
        if(!msg) return;

        input.disabled = true;
        submitBtn.disabled = true;

        try {
            const res = await fetch("{{ route('operator.livechat.reply', $session) }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ message: msg })
            });
            const data = await res.json();
            if(data.status === 'success') {
                input.value = '';
                appendAdminMessage(data.message.message, data.message.id);
            }
        } catch(e) {
            alert('Gagal mengirim pesan');
        } finally {
            input.disabled = false;
            submitBtn.disabled = false;
            input.focus();
        }
    });

    setInterval(async () => {
        try {
            const res = await fetch(`{{ route('operator.livechat.poll', $session) }}?last_id=${lastId}`);
            const data = await res.json();
            if(data.messages && data.messages.length > 0) {
                data.messages.forEach(m => {
                    if(m.sender_type === 'user') {
                        appendUserMessage(m.message, m.id);
                        try { notifSound.play(); } catch(e) {}
                    } else if (m.sender_type === 'admin') {
                        appendAdminMessage(m.message, m.id);
                    }
                });
            }
        } catch(e) {}
    }, 3000);
});
</script>
@endsection
