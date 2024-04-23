<?php
include 'connection.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['sender_id']) && isset($_POST['receiver_id']) && isset($_POST['message'])) {
    $sender_id = $_POST['sender_id'];
    $receiver_id = $_POST['receiver_id'];
    $message = $_POST['message'];

    if ($sender_id != $receiver_id) {
        $sql = "INSERT INTO chat_messages (sender_id, receiver_id, message) VALUES (?, ?, ?)";
        
        // Use prepared statements to prevent SQL injection
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $sender_id, $receiver_id, $message);

        // Execute the query
        if ($stmt->execute()) {
            echo "Record inserted successfully.";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Cannot send a message to yourself.";
        exit;
    }
}

if (isset($_GET['receiver_id'])) {
    $receiver_id = $_GET['receiver_id'];
    $offset = isset($_GET['offset']) ? (int)$_GET['offset'] : 0;

    $sql = "SELECT * FROM chat_messages WHERE (sender_id = ? OR receiver_id = ?) ORDER BY timestamp DESC LIMIT ?, 10";

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $receiver_id, $receiver_id, $offset);

    // Execute the query
    $stmt->execute();

    // Get metadata of the result set
    $meta = $stmt->result_metadata();

    // Dynamically bind result variables
    $resultVars = [];
    while ($field = $meta->fetch_field()) {
        $resultVars[] = &$row[$field->name];
    }

    call_user_func_array([$stmt, 'bind_result'], $resultVars);

    $messages = array();
    while ($stmt->fetch()) {
        $message = array();
        foreach ($row as $key => $value) {
            $message[$key] = $value;
        }
        $messages[] = $message;
    }

    echo json_encode($messages);

    // Close the statement
    $stmt->close();
}

$conn->close();
?>