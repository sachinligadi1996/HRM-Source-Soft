// Function to fetch and display messages
function fetchMessages() {
    $.ajax({
        url: 'emp_directchat.php',
        type: 'GET',
        success: function(response) {
            // Assuming the response is an array of messages
            response.forEach(function(message) {
                addMessage(message.sender, 'assets/img/sourcesoft_logo.png', 'received', message.message);
            });
        },
        error: function(error) {
            console.error("Error fetching messages:", error);
        }
    });
}

$(document).ready(function() {
    // Load messages when the chat interface loads
    fetchMessages();

    $('#sendMessageBtn').on('click', function() {
        sendMessage();
    });

    $('#messageInput').keypress(function(event) {
        if (event.which === 13) {
            sendMessage();
        }
    });
});

function sendMessage() {
    // Your existing code to send messages
}

function addMessage(sender, profilePic, type, message) {
    // Your existing code to add messages
}
// JavaScript - client.js
const socket = new WebSocket('ws://localhost:8080'); // Connect to the WebSocket server

socket.addEventListener('open', function(event) {
    console.log('Connected to the WebSocket server');
});

socket.addEventListener('message', function(event) {
    console.log('Received message:', event.data);
    // Handle the received message, display in the chat interface, etc.
});

function sendMessage(message) {
    socket.send(message); // Send a message to the server
    console.log('Sent message:', message);
}
// Node.js WebSocket server with Socket.IO
const http = require('http');
const express = require('express');
const { Server } = require("socket.io");

const app = express();
const server = http.createServer(app);
const io = new Server(server);

// Handle WebSocket connections
io.on('connection', (socket) => {
  console.log('A user connected');

  // Handle incoming messages
  socket.on('message', (data) => {
    // Broadcast the message to all connected clients
    io.emit('message', data);
  });

  socket.on('disconnect', () => {
    console.log('User disconnected');
  });
});

// Start the server
server.listen(8080, () => {
  console.log('Server is running on port 8080');
});


