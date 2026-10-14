@extends('layouts.user')

@section('content')

<section class="min-h-screen bg-neutral-950 pt-32 pb-20">
    <div class="max-w-4xl mx-auto px-6">

        <div class="text-center mb-10">
            <p class="text-yellow-400 font-semibold mb-3">
                Tjahaja AI Assistant
            </p>

            <h1 class="text-4xl md:text-5xl font-bold mb-4">
                AI Chatbot
            </h1>

            <p class="text-gray-400 max-w-2xl mx-auto">
                Tanyakan informasi mengenai produk, harga, promo,
                cara pemesanan, dan layanan Tjahaja Group Company.
            </p>
        </div>

        <div class="bg-neutral-900 border border-neutral-800 rounded-3xl overflow-hidden shadow-2xl">

            <div class="bg-neutral-800 px-6 py-4 flex items-center gap-3">
                <div class="w-11 h-11 rounded-full bg-yellow-400 text-black
                            flex items-center justify-center font-bold">
                    AI
                </div>

                <div>
                    <h2 class="font-bold">Tjahaja AI Chatbot</h2>
                    <p class="text-sm text-green-400">● Online</p>
                </div>
            </div>

            <div id="chatBox"
                 class="h-[450px] overflow-y-auto p-6 space-y-4 bg-neutral-950">

                <div class="flex justify-start">
                    <div class="bg-neutral-800 text-gray-200 px-5 py-3 rounded-2xl
                                rounded-tl-none max-w-[80%] whitespace-pre-line">
                        Halo! Saya AI Chatbot Tjahaja. Saya dapat membantu memberikan informasi mengenai produk, harga, promo, cara pemesanan, dan lokasi.
                    </div>
                </div>

            </div>

            <div class="p-5 border-t border-neutral-800 bg-neutral-900">

                <div class="flex flex-wrap gap-2 mb-4">
                    <button type="button"
                            onclick="sendSuggestion('Tampilkan daftar produk')"
                            class="text-sm border border-neutral-700 rounded-full
                                   px-4 py-2 hover:border-yellow-400 hover:text-yellow-400">
                        Daftar Produk
                    </button>

                    <button type="button"
                            onclick="sendSuggestion('Promo apa yang tersedia?')"
                            class="text-sm border border-neutral-700 rounded-full
                                   px-4 py-2 hover:border-yellow-400 hover:text-yellow-400">
                        Promo
                    </button>

                    <button type="button"
                            onclick="sendSuggestion('Bagaimana cara melakukan pemesanan?')"
                            class="text-sm border border-neutral-700 rounded-full
                                   px-4 py-2 hover:border-yellow-400 hover:text-yellow-400">
                        Cara Pesan
                    </button>

                    <button type="button"
                            onclick="sendSuggestion('Tampilkan menu pizza')"
                            class="text-sm border border-neutral-700 rounded-full
                                   px-4 py-2 hover:border-yellow-400 hover:text-yellow-400">
                        Menu Pizza
                    </button>
                </div>

                <form id="chatForm" class="flex gap-3">
                    @csrf

                    <input
                        id="messageInput"
                        type="text"
                        name="message"
                        maxlength="500"
                        autocomplete="off"
                        placeholder="Ketik pertanyaan..."
                        class="flex-1 bg-neutral-800 border border-neutral-700
                               rounded-full px-5 py-3 text-white
                               focus:outline-none focus:border-yellow-400"
                        required
                    >

                    <button
                        id="sendButton"
                        type="submit"
                        class="bg-yellow-400 text-black font-bold
                               px-6 py-3 rounded-full hover:bg-yellow-300
                               disabled:opacity-50"
                    >
                        Kirim
                    </button>
                </form>

                <p id="errorMessage"
                   class="hidden text-red-400 text-sm mt-3">
                </p>
            </div>
        </div>
    </div>
</section>

<script>
    const chatForm = document.getElementById('chatForm');
    const chatBox = document.getElementById('chatBox');
    const messageInput = document.getElementById('messageInput');
    const sendButton = document.getElementById('sendButton');
    const errorMessage = document.getElementById('errorMessage');

    chatForm.addEventListener('submit', async function (event) {
        event.preventDefault();

        const message = messageInput.value.trim();

        if (!message) {
            return;
        }

        addMessage(message, 'user');
        messageInput.value = '';
        setLoading(true);

        try {
            const response = await fetch("{{ route('chatbot.send') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector(
                        'input[name="_token"]'
                    ).value
                },
                body: JSON.stringify({
                    message: message
                })
            });

            const data = await response.json();

            if (!response.ok) {
                throw new Error(
                    data.message ?? 'Chatbot gagal memberikan jawaban.'
                );
            }

            addMessage(data.reply, 'bot');
            hideError();
        } catch (error) {
            showError(error.message);
            addMessage(
                'Maaf, terjadi gangguan pada sistem. Silakan coba kembali.',
                'bot'
            );
        } finally {
            setLoading(false);
            messageInput.focus();
        }
    });

    function sendSuggestion(message) {
        messageInput.value = message;
        chatForm.requestSubmit();
    }

    function addMessage(message, sender) {
        const wrapper = document.createElement('div');
        const bubble = document.createElement('div');

        wrapper.className = sender === 'user'
            ? 'flex justify-end'
            : 'flex justify-start';

        bubble.className = sender === 'user'
            ? 'bg-yellow-400 text-black px-5 py-3 rounded-2xl rounded-tr-none max-w-[80%] whitespace-pre-line'
            : 'bg-neutral-800 text-gray-200 px-5 py-3 rounded-2xl rounded-tl-none max-w-[80%] whitespace-pre-line';

        bubble.textContent = message;
        wrapper.appendChild(bubble);
        chatBox.appendChild(wrapper);

        chatBox.scrollTop = chatBox.scrollHeight;
    }

    function setLoading(isLoading) {
        sendButton.disabled = isLoading;
        messageInput.disabled = isLoading;
        sendButton.textContent = isLoading ? 'Menjawab...' : 'Kirim';
    }

    function showError(message) {
        errorMessage.textContent = message;
        errorMessage.classList.remove('hidden');
    }

    function hideError() {
        errorMessage.textContent = '';
        errorMessage.classList.add('hidden');
    }
</script>

@endsection