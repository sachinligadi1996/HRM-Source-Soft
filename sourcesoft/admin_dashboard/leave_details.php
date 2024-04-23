<?php
include("connection.php");
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
            <h1>Leave Details</h1>


        </div><!-- End Page Title -->

        <div class="row">
            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <!-- Include Bootstrap CSS -->
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
            </head>

            <body>
                <?php
        $query = "SELECT *, ROW_NUMBER() OVER (ORDER BY id DESC) as row_num FROM `user_leave`";
        $data = mysqli_query($conn, $query);
        $total = mysqli_num_rows($data);

        if ($total != 0) {
        ?>
                <section class="section">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">

                            <div class="card">
                                <div class="card-body">
                                    <h5 class="">Leave Requests</h5>
                                    <hr>

                                    <!-- Table with stripped rows -->
                                    <table class="table datatable">
                                        <thead>
                                            <tr class="">
                                                <th scope="col">Sr.No</th>
                                                <th scope="col">Employee ID</th>
                                                <th scope="col">Employee Name</th>
                                                <th scope="col">Leave Type</th>
                                                <th scope="col">Start Date</th>
                                                <th scope="col">End Date</th>
                                                <th scope="col">Reason</th>
                                                <th scope="col">Action</th>
                                                
                                            </tr>
                                        </thead>
                                        <?php
                      while ($result = mysqli_fetch_assoc($data)) {
                      ?>
                                        <tr>
                                            <td><?php echo $result['row_num']; ?></td>
                                            <td><?php echo $result['empid']; ?></td>
                                            <td><?php echo $result['fname']; ?></td>
                                            <td><?php echo $result['leavet']; ?></td>
                                            <td><?php echo date('d-m-Y', strtotime($result['sdate'])); ?></td>
                                            <td><?php echo date('d-m-Y', strtotime($result['edate'])); ?></td>
                                            <td><?php echo $result['reason']; ?></td>
                                            <td><?php
                              if ($result['status'] == 1) {
                                echo '<p><a href=""><i class="bi bi-check2-circle text-success px-1">Approved</i></a></p>';
                              } else {
                                echo '<p><a href="leave_status?id=' . $result['id'] . '&status=1"><i class="bi bi-check2-circle text-warning px-1">Mark as Approved</i></a></p>';
                              }
                              if ($result['status'] == 2) {
                                echo '<p><a href=""><i class="bi bi-check2-circle text-danger px-1">Rejected</i></a></p>';
                              } else {
                                echo '<p><a href="leave_status?id=' . $result['id'] . '&status=2"><i class="bi bi-check2-circle text-warning px-1">Mark as Rejected</i></a></p>';
                              }
                              ?></td>
                                        </tr>
                                        <?php

                      }
                    } else {

                      echo "No records Found";
                    }
                    ?>

                                    </table>
                                    <!-- End Table with stripped rows -->

                                </div>
                            </div>

                        </div>
                    </div>

                </section>
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
            <?php
      error_reporting(0);
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

            </html>