<!DOCTYPE html>
<html>

<head>
    <title>HRM - Admin Dashboard </title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
    <!-- Favicons -->
    <link href="assets/img/sourcesoft_logo.png" rel="icon">
</head>

<body>
    <?php
    include "connection.php";
    $id = $_GET['id'];
    $status = $_GET['status'];
    date_default_timezone_set('Asia/Kolkata');
    $date = date("Y-m-d");

    $query = "SELECT * FROM `emp_details` WHERE empid='$id'";
    $data = mysqli_query($conn, $query);
    $show = mysqli_fetch_assoc($data);

    $emp_name = $show['fname'];

    $duplicate = mysqli_query($conn, "SELECT * FROM attendance WHERE emp_id='$id' AND date='$date'");
    if (mysqli_num_rows($duplicate) != 0) {

        $query_mark = "UPDATE attendance SET status ='$status' WHERE emp_id='$id'";
        $data_mark = mysqli_query($conn, $query_mark);

        if ($data_mark) {
            echo "<script type='text/javascript'>
                Swal.fire({
                    text: 'Attendance updated successfully',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 2000
                }).then(function() {
                    window.location.replace('login_details');
                });
            </script>";
        } else {
            echo "Failed to assign.";
        }
    } else {

        $sql = "INSERT INTO `attendance` (`emp_id`, `emp_name`, `date`, `status`) VALUES ('$id', '$emp_name', '$date', '$status')";
        $execute = mysqli_query($conn, $sql);

        if ($execute) {
            echo "<script type='text/javascript'>
            Swal.fire({
                text: 'Attendance marked successfully',
                icon: 'success',
                showConfirmButton: false,
                timer: 2000
            }).then(function() {
                window.location.replace('login_details');
            });
        </script>";
        } else {
            echo "Failed to assign.";
        }
    }
    $conn->close();
    ?>
</body>

</html>