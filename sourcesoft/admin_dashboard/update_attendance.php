<?php
include 'connection.php';
session_start();
$userprofile = $_SESSION['login_user'];
if ($userprofile == true) {
} else {
    header('location:../index.php');
}
?>

<?php

function calculateTotalTime($checkin, $checkout)
{
    // Convert the date and time strings to DateTime objects
    $checkinDateTime = new DateTime($checkin);
    $checkoutDateTime = new DateTime($checkout);

    // Calculate the difference in days and hours
    $interval = $checkinDateTime->diff($checkoutDateTime);
    $totalDays = $interval->days;
    $totalHours = $interval->h;

    // Format the result in an English string format
    $result = '';

    if ($totalDays > 0) {
        $result .= $totalDays . ($totalDays === 1 ? ' day' : 'days');
    }

    if ($totalHours > 0) {
        if ($result !== '') {
            $result .= ' and ';
        }
        $result .= $totalHours . ($totalHours === 1 ? ' hour' : ' hours');
    }

    return $result;
}

function formatDateTime($inputDateTime)
{
    // Convert the input date string to a DateTime object
    $date = new DateTime($inputDateTime);

    // Format the date to remove 'T' and show local time in AM/PM format
    return $date->format('Y-m-d h:i A');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>HRM - Admin Dashboard </title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/sourcesoft_logo.png" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <style>
    li {
        list-style: none;
    }
    </style>

</head>

<body>

    <!-- ======= Header ======= -->
    <?php include "include/header.php"; ?>
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <?php include "include/sidebar.php"; ?>
    <!-- End Sidebar-->

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Attendance Details</h1>

        </div><!-- End Page Title -->
        <?php
        include("connection.php");
        $id = $_GET['id'];

        $query = "SELECT * FROM attendance where id='$id'";
        $data = mysqli_query($conn, $query);

        $result = mysqli_fetch_assoc($data);
        $total = mysqli_num_rows($data);

        ?>
        <section class="section dashboard">
            <div class="row">
                <!DOCTYPE html>
                <html lang="en">

                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <!-- Include Bootstrap CSS -->
                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
                        rel="stylesheet">
                </head>

                <body>
                    <div class="container">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="">Attendance Form</h5>
                                <hr>
                                <form class="row g-3" action="#" method="POST">
                                    <div class="col-md-6">
                                        <label for="" class="form-label">Employee ID</label>
                                        <select class="form-control form-control form-control-sm" name="emp_id">
                                            <option selected disabled>Employee ID</option>
                                            <?php

                                            $query_show_emp = mysqli_query($conn, "SELECT * FROM emp_details");

                                            while ($show_emp = mysqli_fetch_array($query_show_emp)) {

                                            ?>
                                            <option value="<?php echo $show_emp['empid']; ?>">
                                                <?php echo $show_emp['empid']; ?> : <?php echo $show_emp['fname']; ?>
                                            </option>
                                            <?php
                                            }
                                            ?>

                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="startDate" class="required">Date</label>
                                        <input type="date" class="form-control form-control-sm" name="date"
                                            value="<?php echo $result['date'] ?>" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="startDate" class="required">Check In</label>
                                        <input type="time" class="form-control form-control-sm" name="checkin"
                                            value="<?php echo $result['checkin'] ?>" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="dueDate" class="required">Check Out</label>
                                        <input type="time" class="form-control form-control-sm" name="checkout"
                                            value="<?php echo $result['checkout'] ?>" required>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="status" class="required">Status</label>
                                        <select class="form-control form-control-sm form-select" name="status"
                                            value="<?php echo $result['status'] ?>">
                                            <option selected disabled>Select</option>
                                            <option>Present</option>
                                            <option>Absent</option>
                                        </select>
                                    </div>
                                    <center> <button type="submit" class="btn btn-success btn-sm" name="submit"
                                            onclick="return validateForm()">Submit</button></center>
                                </form>

                            </div>

                        </div>

                    </div>

                    <!-- Include Bootstrap JS and Popper.js -->
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/popper.js@2.9.4/dist/umd/popper.min.js"></script>
            </div>
            </div>
</body>

</html>

</div>

</table>
<!-- End Table with stripped rows -->

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<?php include "include/footer.php"; ?>
<!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/chart.js/chart.umd.js"></script>
<script src="assets/vendor/echarts/echarts.min.js"></script>
<script src="assets/vendor/quill/quill.min.js"></script>
<script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
<script src="assets/vendor/tinymce/tinymce.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

</body>

</html>

<?php

if (isset($_POST['submit'])) {
   
    $date = $_POST['date'];
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];
    $status = $_POST['status'];

    $query = "UPDATE ATTENDANCE set date='$date',checkin='$checkin',checkout='$checkout',status='$status' WHERE id='$id'";

    $data = mysqli_query($conn, $query);

    if ($data) {

        echo
        "<script type='text/javascript'>
    Swal.fire({
    text:'Update Details successfully',
    icon:'success',
    showConfirmButton: false,
    timer:2000
    }).then(function() {
    window.location.replace('attendance');
    });
    </script>";
    } else {

        echo "update failed";
    }
}

?>