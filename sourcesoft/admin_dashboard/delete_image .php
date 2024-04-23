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

<body>

</body>

</html>
<?php
include("connection.php");

$typeId = $_GET['type'];
$id = $_GET['id'];

$getimg = "SELECT * from emp_details where id='$id'";
$imgresult = mysqli_query($conn,$getimg);
$data = mysqli_fetch_assoc($imgresult);
$data1;

if($typeId == 1)
{
    $query = "Update bank_details SET bankpass = '' where id ='$id'" ;
    $data1 =mysqli_query($conn, $query);
    $path ='./file/bankpass/'.$data['bankpass'];
    unlink($path);
}
else if($typeId == 2)
{
    $query = "Update emp_details SET adhar_card = '' where id ='$id'" ;
    $data1 =mysqli_query($conn, $query);
    $path ='./assets/adhar/'.$data['adhar_card'];
    unlink($path);
} 
else if($typeId == 3)
{
    $query = "Update emp_details SET  pan_card = '' where id ='$id'" ;
    $data1 =mysqli_query($conn, $query);
    $path ='./assets/pan/'.$data['pan_card'];
    unlink($path);
}

if($data1)
{
     echo
    "<script type='text/javascript'>
    Swal.fire({
    text:'deleted successfully',
    icon:'success',
    showConfirmButton: false,
    timer:2000
    }).then(function() {
    window.history.go(-1);
    });
    </script>";
}


else
{
    echo
    "<script type='text/javascript'>
    Swal.fire({
    text:'deleted unsuccessfully',
    icon:'error',
    showConfirmButton: false,
    timer:2000
    }).then(function() {
    window.history.go(-1);
    });
    </script>";
}

?>
