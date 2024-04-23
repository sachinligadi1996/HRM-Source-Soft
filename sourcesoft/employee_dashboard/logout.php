<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
    <link href="assets/img/sourcesoft_logo.png" rel="icon">
</head>

<body>
    <?php
    session_start();
    include "connection.php";

    $id = $_SESSION['session_id'];
    date_default_timezone_set('Asia/Kolkata');
    $currentDateTime = date("H:i:s");

    if (isset($_SESSION['start_time'])) {
        $currentTime = time();
        $startTime = $_SESSION['start_time'];
    }

    $sessionDuration = $currentTime - $startTime;
    $formattedDuration = gmdate("H:i:s", $sessionDuration);
    $status = "Offline";

    $log_query = "UPDATE `user_log` SET `out_timestamp` = '$currentDateTime', `sessTime` = '$formattedDuration', `status` = '$status'  WHERE `session_id` = '$id'";
    $log_data = mysqli_query($conn, $log_query);

    $user_id = $_SESSION['empid'];

    $login_query = "UPDATE `emp_details` SET `status` = '$status'  WHERE `empid` = '$user_id'";
    $login_data = mysqli_query($conn, $login_query);

    unset($_SESSION['auth_user']);
    unset($_SESSION['empid']);
    unset($_SESSION['start_time']);
    unset($_SESSION['session_id']);
    unset($_SESSION['inTime']);
    session_destroy();

    echo "<SCRIPT type='text/javascript'> 
        Swal.fire({
            title:'',
            text:'User dashboard logged out successfully',
            icon:'success',
            showConfirmButton: false,
            timer:2000
        }).then(function() {
            window.location.replace('../index');
        });
             </SCRIPT>";
    ?>
</body>

</html>