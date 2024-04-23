<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>
    <link href="assets/img/sourcesoft_logo.png" rel="icon">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
</head>

<body>

    <?php
session_start();
unset($_SESSION['auth_user']);
session_destroy();

echo "<SCRIPT type='text/javascript'> 
        Swal.fire({
            title:'',
            text:'Admin dashboard logged out successfully',
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