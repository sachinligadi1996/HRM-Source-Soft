<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "chat";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['sender_id']) && isset($_POST['receiver_id']) && isset($_POST['message'])) {
    $sender_id = $_POST['sender_id'];
    $receiver_id = $_POST['receiver_id'];
    $message = $_POST['message'];

    if ($sender_id != $receiver_id) {
        $sql = "INSERT INTO chat_messages (sender_id, receiver_id, message) VALUES ($sender_id, $receiver_id, '$message')";
        $conn->query($sql);
    } else {
        echo "Cannot send a message to yourself.";
        exit;
    }
}

if (isset($_GET['receiver_id'])) {
    $receiver_id = $_GET['receiver_id'];
    $offset = isset($_GET['offset']) ? (int)$_GET['offset'] : 0;

    $sql = "SELECT * FROM chat_messages WHERE (sender_id = $receiver_id OR receiver_id = $receiver_id) ORDER BY timestamp DESC LIMIT $offset, 10";
    $result = $conn->query($sql);

    $messages = array();
    while ($row = $result->fetch_assoc()) {
        $messages[] = $row;
    }

    echo json_encode($messages);
}

$conn->close();
?>
