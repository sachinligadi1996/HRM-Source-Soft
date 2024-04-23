<!DOCTYPE html>
<html>

<head>
    <title>HRM - Admin Dashboard </title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
    <link href="assets/img/sourcesoft_logo.png" rel="icon">
</head>

<body>
    <?php
    include "connection.php";
    $id = $_GET['id'];
    $status = $_GET['status'];

    $query = "UPDATE user_leave SET status=$status WHERE id=$id";

    mysqli_query($conn, $query);

    echo "
            <script type='text/javascript'>
                Swal.fire({
                    title: '',
                    text: 'Status response successfully.',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 2000
                }).then(function() {
                    window.location.replace('leave_details');
                });
            </script>";
    ?>
</body>

</html>