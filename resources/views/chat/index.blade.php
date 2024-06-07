<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('style.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


  <title>QuickChat </title>
</head>

<body>

  <section class="msger">
    <header class="msger-header">
      <div class="msger-header-title">
        <i class="fas fa-comment chat-icon"></i> QuickChat
      </div>
      <div class="msger-header-options">
        <span><i class="fas fa-user user-icon"></i> Chat with {{ $receiver->name }}</span>
        <form method="GET" action="{{ route('users.index') }}" class="msger-logout-form">
          <button type="submit" class="msger-logout-btn">
            <i class="fas fa-sign-out-alt"></i>
          </button>
        </form>
      </div>
    </header>


    <main class="msger-chat" id="chat-area">

    </main>

    <form class="msger-inputarea">
      <input type="text" id="message" name="message" class="msger-input" placeholder="Enter your message...">
      <button type="submit" id="send" class="msger-send-btn">Send</button>
    </form>
  </section>

  <script>
    $(document).ready(function() {
      var receiverId = {{ $receiver->id }};
      $.get('/chat/' + receiverId + '/messages', function(messages) {
        messages.forEach(function(message) {
          let messageHtml =
            '<div class="msg ' + (message.sender == {{ auth()->user()->id }} ? 'right-msg' : 'left-msg') +
            '">' +
            '<div class="msg-bubble">' +
            '<div class="msg-info">' +
            '<div class="msg-info-name">' + (message.sender == {{ auth()->user()->id }} ? 'You' :
              '{{ $receiver->name }}') + '</div>' +
            '<div class="msg-info-time">' + new Date(message.created_at).toLocaleTimeString() + '</div>' +
            '</div>' +
            '<div class="msg-text">' + message.message + '</div>' +
            '</div>' +
            '</div>';
          $("#chat-area").append(messageHtml);
        });
      });

      $("#send").click(function(event) {
        event.preventDefault();
        const message = $("#message").val();
        $.post("/chat/{{ $receiver->id }}", {
          message: message,
        }, function(data, status) {
          console.log("Sending message:", message);
          let senderMessage = '' +
            '<div class="msg right-msg">' +
            '<div class="msg-bubble">' +
            '<div class="msg-info">' +
            '<div class="msg-info-name">You</div>' +
            '<div class="msg-info-time">Just now</div>' +
            '</div>' +
            '<div class="msg-text">' + message + '</div>' +
            '</div>' +
            '</div>';
          $("#chat-area").append(senderMessage);
          $("#message").val('');
        });
      });

      Pusher.logToConsole = true;
      var pusher = new Pusher('ace124451e5aa17167b0', {
        cluster: 'eu'
      });

      var channel = pusher.subscribe('Chat.{{ auth()->user()->id }}');
      channel.bind('chat-event', function(data) {
        const messageData = JSON.parse(data.message);
        let senderId = messageData.sender;
        let senderNames = @json(App\Models\User::pluck('name', 'id'));

        let senderName = senderNames[senderId];

        let receiverMessage =
          '<div class="msg left-msg">' +
          '<div class="msg-bubble">' +
          '<div class="msg-info">' +
          '<div class="msg-info-name">' + senderName + '</div>' +
          '<div class="msg-info-time">Just now</div>' +
          '</div>' +
          '<div class="msg-text">' + messageData.message + '</div>' +
          '</div>' +
          '</div>';

        $("#chat-area").append(receiverMessage);
      });
    });
  </script>

</body>

</html>
