<?php
// Include the database connection file
include 'connection.php'; // Ensure you have this file with your database connection details
session_start();

// Redirect if the user is not authenticated
if (!isset($_SESSION['auth_user'])) {
    header('location: index.php');
    exit();
}

date_default_timezone_set('Asia/Kolkata');

$loggedInUserId = $_SESSION['auth_user'];
$receiverId = isset($_GET['id']) ? $_GET['id'] : null;

// Handle form submission to store messages
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $message = mysqli_real_escape_string($conn, $_POST['message']);
    $timestamp = date('Y-m-d H:i:s');

    if ($receiverId) {
        $sql = "INSERT INTO chat (sender, receiver, message, timestamp) 
                VALUES ('$loggedInUserId', '$receiverId', '$message', '$timestamp')";

        if ($conn->query($sql) !== TRUE) {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error: Receiver ID is not valid.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Direct Chat</title>
    <link href="assets/img/sourcesoft_logo.png" rel="icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
    .chat-message.sent {
        text-align: right;
    }

    .chat-message.received {
        text-align: left;
    }

    .message-bubble.sent {
        background-color: #007bff;
        color: #fff;
        border-radius: 10px;
        padding: 10px;
        max-width: 70%;
        display: inline-block;
        margin: 5px;
    }

    .message-bubble.received {
        background-color: #28a745;
        color: #fff;
        border-radius: 10px;
        padding: 10px;
        max-width: 70%;
        display: inline-block;
        margin: 5px;
    }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        Direct Chat with Sender ID: <?php echo $loggedInUserId; ?> and Receiver ID:
                        <?php echo $receiverId; ?>
                    </div>
                    <div class="card-body" style="max-height: 400px; overflow-y: auto;">
                        <?php
                       if ($receiverId) {
                        $sql = "SELECT * FROM chat 
                                WHERE (sender = '$loggedInUserId' AND receiver = '$receiverId') 
                                OR (sender = '$receiverId' AND receiver = '$loggedInUserId') 
                                ORDER BY timestamp ASC";
                        $result = $conn->query($sql);
            
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $message = $row['message'];
                                $messageAlignment = ($row['sender'] == $loggedInUserId) ? 'sent' : 'received';
                                $messageSender = ($row['sender'] == $loggedInUserId) ? "You" : "Other user";
                                echo "<div class='chat-message $messageAlignment'>
                                    <div class='message-bubble $messageAlignment'>
                                        <p><strong>$messageSender:</strong> $message</p>
                                        <span>{$row['timestamp']}</span>
                                    </div>
                                </div>";
                            }
                        } else {
                            echo "No messages available.";
                        }
                    }
                        ?>
                    </div>
                    <div class="card-footer">
                        <form method="post">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="message" placeholder="Type a message...">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary" name="submit">Send</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
    $(document).ready(function() {
        fetchMessages(); // Fetch messages when the page loads
        setInterval(fetchMessages,
        3000); // Fetch messages every 3 seconds (adjust this time interval as needed)
    });

    function fetchMessages() {
        $.ajax({
            type: "POST",
            url: "emp_directchat.php", // The PHP script to fetch messages
            data: {
                receiverId: <?php echo $receiverId; ?>
            }, // Pass the receiver ID
            success: function(response) {
                $("#chat-messages").html(response); // Update the chat messages
            }
        });
    }
    </script>
</body>

</html>