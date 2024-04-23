<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat System</title>

    <link href="assets/img/sourcesoft_logo.png" rel="icon">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        #container {
            max-width: 800px;
            margin: 20px auto;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
        }

        #chat-container {
            max-height: 600px; /* Adjust the height as needed */
            overflow-y: auto;
            margin: 0;
            padding: 10px;
            box-sizing: border-box;
            display: flex;
            flex-direction: column; /* Adjusted to a column layout */
        }

        .chat-bubble {
            max-width: 70%;
            padding: 10px;
            margin: 5px;
            border-radius: 10px;
        }

        .incoming-bubble {
            background-color: #e0e0e0;
            align-self: flex-start; /* Adjusted alignment for incoming messages */
        }

        .outgoing-bubble {
            background-color: #4CAF50;
            color: #fff;
            align-self: flex-end; /* Adjusted alignment for outgoing messages */
        }

        .align-left {
            justify-content: flex-start;
        }

        .align-right {
            justify-content: flex-end;
        }

        #input-container {
            display: flex;
            margin-top: 10px;
            max-width: 100%;
            box-sizing: border-box;
        }

        #message-input {
            flex: 1;
            padding: 8px;
            margin-right: 10px;
            box-sizing: border-box;
        }

        #send-button {
            padding: 8px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        #load-more-button {
            padding: 8px;
            background-color: #008CBA;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
 
</head>
<body>
    <div id="container">
        <div id="chat-container">
            <!-- Chat messages will be displayed here -->
        </div>
        <div id="input-container">
            <input type="text" id="message-input" placeholder="Type your message...">
            <button id="send-button">Send</button>
        </div>
        
        <button id="load-more-button" style="display:none;">Load More</button>
    </div>

    <script>
        $(document).ready(function () {
            var urlParams = new URLSearchParams(window.location.search);
            var senderId = urlParams.get('sid');
            var receiverId = urlParams.get('rid');
            var messageOffset = 0;

            setInterval(function () {
                loadMessages(senderId, receiverId);
            }, 3000);

            loadMessages(senderId, receiverId);

            $('#send-button').click(function () {
                var message = $('#message-input').val();

                if (message !== '') {
                    $.ajax({
                        type: 'POST',
                        url: 'ajax.php',
                        data: {
                            sender_id: senderId,
                            receiver_id: receiverId,
                            message: message
                        },
                        success: function () {
                            $('#message-input').val('');
                            loadMessages(senderId, receiverId);
                        }
                    });
                }
            });

            $('#load-more-button').click(function () {
                messageOffset += 10;
                loadMessages(senderId, receiverId);
            });

           

            function loadMessages(senderId, receiverId) {
                $.ajax({
                    type: 'GET',
                    url: 'ajax.php',
                    data: {
                        receiver_id: receiverId,
                        offset: messageOffset
                    },
                    success: function (data) {
                        var messages = JSON.parse(data);
                        var chatContainer = $('#chat-container');

                        if (messageOffset === 0) {
                            chatContainer.empty();
                        }

                        messages.sort(function (a, b) {
                            return new Date(a.timestamp) - new Date(b.timestamp);
                        });

                        var lastSenderId = null;

                        for (var i = 0; i < messages.length; i++) {
                            var message = messages[i];
                            var isSender = (message.sender_id == senderId);
                            var isNewSender = lastSenderId !== message.sender_id;

                            var bubbleClass = isSender ? 'outgoing-bubble' : 'incoming-bubble';
                            var alignmentClass = isNewSender ? (isSender ? 'align-right' : 'align-left') : '';

                            var timestamp = new Date(message.timestamp).toLocaleTimeString();

                            var messageHtml = '<div class="chat-bubble ' + bubbleClass + ' ' + alignmentClass + '">';
                            messageHtml += '<span class="message-sender">Emp ID: ' + message.sender_id + '</span>';
                            messageHtml += '<p>' + message.message + '</p>';
                            messageHtml += '<span class="timestamp">' + timestamp + '</span>';
                            messageHtml += '</div>';

                            chatContainer.append(messageHtml);

                            lastSenderId = message.sender_id;
                        }

                        // Scroll to the bottom of the chat container to always show the latest message
                        chatContainer.scrollTop(chatContainer[0].scrollHeight);

                        if (messages.length >= 10) {
                            $('#load-more-button').show();
                        } else {
                            $('#load-more-button').hide();
                        }
                    }
                });
            }
        });
    </script>
</body>
</html>