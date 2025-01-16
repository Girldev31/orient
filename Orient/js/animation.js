document.addEventListener("DOMContentLoaded", () => {
    const sendButton = document.getElementById('send-btn');
    sendButton.addEventListener('click', () => {
        sendButton.classList.add('clicked');
        setTimeout(() => {
            sendButton.classList.remove('clicked');
        }, 300);
    });
});


/*document.addEventListener("DOMContentLoaded", () => {
    const chatForm = document.getElementById('chat-form');
    const userMessageInput = document.getElementById('user-message');
    const messagesContainer = document.getElementById('messages');

    chatForm.addEventListener('submit', async (event) => {
        event.preventDefault(); // Empêche le rechargement de la page

        const userMessage = userMessageInput.value.trim();
        if (!userMessage) return;

        // Ajouter le message utilisateur à l'interface
        const userMessageElement = document.createElement('div');
        userMessageElement.classList.add('message', 'user');
        userMessageElement.textContent = userMessage;
        messagesContainer.appendChild(userMessageElement);

        // Réinitialiser l'entrée utilisateur
        userMessageInput.value = '';

        // Envoyer le message au serveur
        try {
            const response = await fetch('chat.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: `user_message=${encodeURIComponent(userMessage)}`
            });

            const botResponse = await response.text();

            // Ajouter la réponse du chatbot à l'interface
            const botMessageElement = document.createElement('div');
            botMessageElement.classList.add('message', 'bot');
            botMessageElement.textContent = botResponse;
            messagesContainer.appendChild(botMessageElement);

            // Scroller vers le bas
            messagesContainer.scrollTop = messagesContainer.scrollHeight;

        } catch (error) {
            console.error('Erreur lors de l\'envoi du message:', error);
        }
    });
});*/
