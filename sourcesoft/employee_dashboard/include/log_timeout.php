<?php

$user_id = $_SESSION['empid'];
date_default_timezone_set('Asia/Kolkata');
$lastTime = date("Y-m-d H:i:s");
$last_act = "UPDATE `emp_details` SET `last_act` = '$lastTime'  WHERE `empid` = '$user_id'";
$act_data = mysqli_query($conn, $last_act);

if (isset($_SESSION['start_time'])) {
    $currentTime = time();
    $startTime = $_SESSION['start_time'];
}
?>

<script type="text/javascript">
    setTimeout(function() {
        location.reload();
    }, 1260000);
</script>

<?php

$session_timeout = 20 * 60;

if (isset($_SESSION['auth_user']) && isset($_SESSION['last_activity'])) {
    if (time() - $_SESSION['last_activity'] > $session_timeout) {
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

        $login_query = "UPDATE `emp_details` SET `status` = '$status'  WHERE `empid` = '$user_id'";
        $login_data = mysqli_query($conn, $login_query);

        unset($_SESSION['auth_user']);
        unset($_SESSION['start_time']);
        unset($_SESSION['session_id']);
        unset($_SESSION['inTime']);
        session_destroy();
        header("Location: ../index");
        exit();
    }
}

$_SESSION['last_activity'] = time();

?>