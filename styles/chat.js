document.getElementById('formMessage').addEventListener('submit', function(e) {
    e.preventDefault();
  
    var message = $("#message-input").val();
  
    if (message.length >= 3) {
      $.ajax({
        type: "POST",
        url: "styles/envoie_chat.php",
        data: { envoie_msg: message },
        success: function(response) {
  
          $("#message-input").val("");
  
          displayMessage(message, '<?= $result->pseudo ?>', '<?= $result->date_heure_message ?>');
  
          scrollChatToBottom();
        },
        error: function() {
          console.error("Erreur dans l'envoie du message");
        }
      });
    } else {
      alert("Le message doit contenir au moins 3 caractères.");
    }
  });
  
  function displayMessage(message) {
    let date = new Date();
    const chatMessages = document.querySelector('.chat-messages');
  
    const messageElement = document.createElement('div');
    messageElement.classList.add('message');
    messageElement.innerHTML = `
      <div class="message-sender">${pseudo}</div>
      <div class="message-content">${message}</div>
      <div class="message-statu"> ${date.getFullYear() + "-" + Math.floor(date.getMonth() + 1) + "-" + date.getDate() + " " + date.getHours() + ":" + date.getMinutes() + ":" + date.getSeconds()} </div>
    `;
  
    chatMessages.appendChild(messageElement);
  }
  
  function scrollChatToBottom() {
    const chatMessages = document.querySelector('.chat-messages');
    chatMessages.scrollTop = chatMessages.scrollHeight;
  }