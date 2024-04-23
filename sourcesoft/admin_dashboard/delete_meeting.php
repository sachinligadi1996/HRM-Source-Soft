<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Delete page</title>

    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">


</head>

<body></body>

</html>

<?php
include("connection.php");
$id = $_GET['id'];

$query = "DELETE FROM meeting where id='$id'";
$data = mysqli_query($conn, $query);
if ($data) {
    echo
    "<script type='text/javascript'>
    Swal.fire({
    text:'Meeting deleted successfully',
    icon:'success',
    showConfirmButton: false,
    timer:2000
    }).then(function() {
    window.location.replace('team_meeting');
    });
    </script>";
} else {
    echo "<script>alert('Failed to Delete')</script>";
}


?>