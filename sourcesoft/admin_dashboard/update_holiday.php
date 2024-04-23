<?php
function calculatetotalDays($fromDate, $toDate) {
    // Convert the date and time strings to DateTime objects
  $fromDate = new DateTime($fromDate);
   $toDate = new DateTime($toDate);

    // Calculate the difference in days and hours
   $interval = $fromDate->diff($toDate);
    $totalDays = $interval->days;
    // $totalHours = $interval->h;

    // Format the result in an English string format
    $result = '';

    if ($totalDays > 0) {
        $result .= $totalDays . ($totalDays === 1 ? ' day' : 'days');
   }

     return $result;
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">

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
            <h1>Holiday Details</h1>
            <nav>

            </nav>
        </div><!-- End Page Title -->
        <?php
        include("connection.php");
        $id = $_GET['id'];

        $query = "SELECT * FROM holiday where id='$id'";
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
                                <h5 class="">Add Holiday</h5>
                                <hr>
                                <form class="row g-3" action="#" method="POST" onsubmit="return validateForm()">
                                    <div class="col-md-12">
                                        <label for="inputhdname" class="form-label">Holiday Name</label>
                                        <input type="text" name="hdname" class="form-control"
                                            placeholder="Enter Holiday Name" id="inputhdname" required
                                            autocomplete="off" value="<?php echo $result['hdname']; ?>">
                                            <div class="error" id="inputhdnameError"></div>
                                    </div>


                                    <div class="col-md-4">
                                        <label for="inputFromDate" class="form-label">From Date</label>
                                        <input type="date" class="form-control" id="inputFromDate" name="fromDate"
                                            required value="<?php echo $result['fromDate']; ?>" min="<?php echo date('Y-m-d'); ?>">
                                            <div class="error" id="inputFromError"></div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="inputToDate" class="form-label">To Date</label>
                                        <input type="date" class="form-control" id="inputToDate" name="toDate" required
                                            value="<?php echo $result['toDate']; ?>" min="<?php echo date('Y-m-d'); ?>">
                                            <div class="error" id="inputToDateError"></div>
                                    </div>
                                    <!--<div class="col-md-4">
                                        <label for="inputNumberOfDays" class="form-label">Number of Days</label>
                                        <input type="number" class="form-control" id="inputNumberOfDays"
                                            name="numberOfDays" required value="<?php echo $result['numberOfDays']; ?>">
                                    </div>-->
                                    <div class="col-md-12">
                                    
                                        <label for="floatingTextarea2">Description</label>
                                            <textarea class="form-control" placeholder="Enter holiday description"
                                                id="floatingTextarea2" style="height: 100px"
                                                name="descr"><?php echo $result['descr']; ?></textarea>
                                                <div class="error" id="floatingTextarea2Error"></div>
                                            
                                        </div>
                                    </div>
                                    <center>
                                        <div class="col-md-6">
                                            <button type="submit" class="btn btn-success" name="update"
                                                onclick="return validateForm()">Update</button><br>
                                        </div>
                                    </center>
                                </form>
                            </div>

                            <!-- Include Bootstrap JS and Popper.js -->
                            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js">
                            </script>
                            <script src="https://cdn.jsdelivr.net/npm/popper.js@2.9.4/dist/umd/popper.min.js"></script>
                        </div>
                    </div>
                    <style>
    .error {
        color: red;
        font-size: 14px;
    }
</style>
<script>
    function validateForm() {
    var hdname = document.getElementById('inputhdname').value;
    var fromDate = document.getElementById('inputFromDate').value;
    var toDate = document.getElementById('inputToDate').value;
    var descr = document.getElementById('floatingTextarea2').value;

    // Validation for holiday name (should not contain numbers)
    var isValidHolidayName = /^[a-zA-Z\s]+$/.test(hdname);

    document.getElementById('inputhdnameError').innerText =
        hdname.trim() === ""
            ? 'Holiday Name is required'
            : isValidHolidayName
            ? ''
            : 'Holiday Name should not contain numbers';

    document.getElementById('inputFromError').innerText =
        fromDate.trim() === "" ? 'From Date is required' : '';
    document.getElementById('inputToDateError').innerText =
        toDate.trim() === "" ? 'To Date is required' : '';
    document.getElementById('floatingTextarea2Error').innerText =
        descr.trim() === "" ? 'Description is required' : '';

    return (
        hdname.trim() !== "" &&
        isValidHolidayName &&
        fromDate.trim() !== "" &&
        toDate.trim() !== "" &&
        descr.trim() !== ""
    );
}
</script>
                </body>

                </html>

            </div>
            <?php

            if (isset($_POST['update'])) {
                $holidayname=$_POST['hdname'];
               $fromDate=$_POST['fromDate'];
               $toDate=$_POST['toDate'];
              //$numberOfDays=$_POST['numberOfDays'];
              $total = calculatetotalDays($fromDate, $toDate);
              $description=$_POST['descr'];
    
                $query = "UPDATE holiday set hdname ='$holidayname',fromDate='$fromDate',toDate='$toDate',numberOfDays='$total',descr='$description' WHERE id='$id'";

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
    window.location.replace('holidays');
    });
    </script>";
                } else {

                    echo "update failed";
                }
            }

            ?>

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