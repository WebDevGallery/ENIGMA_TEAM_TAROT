function sendMessage() {
    const userInput = document.getElementById('user-input');
    const message = userInput.value;
    
    if (message.trim() !== '') {
      appendMessage('You: ' + message);
      // You can add your logic here to handle the user's message (e.g., using APIs, processing logic, etc.)
      
      // Simulating bot response (replace this with your actual bot logic)
      setTimeout(() => {
        const botResponse = 'Bot: Hello! This is a sample response.';
        appendMessage(botResponse);
      }, 500);
      
      userInput.value = '';
    }
  }
  
  function appendMessage(message) {
    const chatContent = document.getElementById('chat-content');
    const messageElement = document.createElement('div');
    messageElement.innerText = message;
    chatContent.appendChild(messageElement);
    chatContent.scrollTop = chatContent.scrollHeight; // Scroll to the bottom
  }
  