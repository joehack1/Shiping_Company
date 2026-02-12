<div id="chat-widget-btn" class="chat-widget-btn">
    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
    </svg>
</div>

<div id="chat-widget-window" class="chat-widget-window" style="display: none;">
    <div class="chat-header">
        <div class="chat-title">
            <span class="chat-avatar">🤖</span>
            <div>
                <strong>Anzunzu Assistant</strong>
                <span class="chat-status">Online</span>
            </div>
        </div>
        <button id="chat-close" class="chat-close">&times;</button>
    </div>
    <div id="chat-body" class="chat-body">
        <div class="chat-msg bot">
            Hi 👋 Need help shipping goods locally or internationally? Start our smart shipping quiz!
        </div>
        <div class="chat-actions">
            <button class="chat-option-btn" onclick="startQuiz()">👉 Start Shipping Assessment</button>
        </div>
    </div>
    <div class="chat-footer">
        <form id="chat-form">
            <input type="text" id="chat-input" placeholder="Type a message..." autocomplete="off">
            <button type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="22" y1="2" x2="11" y2="13"></line>
                    <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                </svg>
            </button>
        </form>
    </div>
</div>

<script>
    (function() {
        const btn = document.getElementById('chat-widget-btn');
        const win = document.getElementById('chat-widget-window');
        const close = document.getElementById('chat-close');
        const body = document.getElementById('chat-body');
        const form = document.getElementById('chat-form');
        const input = document.getElementById('chat-input');
        
        // Toggle Chat
        btn.addEventListener('click', () => {
            win.style.display = win.style.display === 'none' ? 'flex' : 'none';
            if (win.style.display === 'flex') input.focus();
        });
        
        close.addEventListener('click', () => {
            win.style.display = 'none';
        });

        // Send Message
        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            const msg = input.value.trim();
            if (!msg) return;

            addMessage(msg, 'user');
            input.value = '';
            
            // Remove previous options
            const oldActions = body.querySelectorAll('.chat-actions');
            oldActions.forEach(el => el.remove());

            setLoading(true);

            try {
                const res = await fetch('{{ route('chat.send') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({ message: msg })
                });
                const data = await res.json();
                setLoading(false);
                addMessage(data.reply, 'bot');
                
                if (data.options && data.options.length > 0) {
                    addOptions(data.options);
                }

            } catch (err) {
                setLoading(false);
                addMessage("Sorry, I'm having trouble connecting. Please try again.", 'bot');
            }
        });

        window.startQuiz = function() {
            const input = document.getElementById('chat-input');
            input.value = "Start Shipping Quiz";
            form.dispatchEvent(new Event('submit'));
        };
        
        window.sendOption = function(opt) {
            const input = document.getElementById('chat-input');
            input.value = opt;
            form.dispatchEvent(new Event('submit'));
        };

        function addMessage(text, sender) {
            const div = document.createElement('div');
            div.className = `chat-msg ${sender}`;
            div.textContent = text;
            body.appendChild(div);
            scrollToBottom();
        }
        
        function addOptions(options) {
            const div = document.createElement('div');
            div.className = 'chat-actions';
            options.forEach(opt => {
                const btn = document.createElement('button');
                btn.className = 'chat-option-btn';
                btn.textContent = opt;
                btn.onclick = () => window.sendOption(opt);
                div.appendChild(btn);
            });
            body.appendChild(div);
            scrollToBottom();
        }

        function setLoading(isLoading) {
            if (isLoading) {
                const div = document.createElement('div');
                div.className = 'chat-msg bot loading';
                div.innerHTML = '<span>.</span><span>.</span><span>.</span>';
                div.id = 'chat-loading';
                body.appendChild(div);
            } else {
                const loading = document.getElementById('chat-loading');
                if (loading) loading.remove();
            }
            scrollToBottom();
        }

        function scrollToBottom() {
            body.scrollTop = body.scrollHeight;
        }
    })();
</script>
