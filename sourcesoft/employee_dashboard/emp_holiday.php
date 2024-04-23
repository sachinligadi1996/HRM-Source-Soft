<?php
include 'connection.php';
session_start();
$userprofile = $_SESSION['auth_user'];
if ($userprofile == true) {
} else {
    header('location:../index.php');
}
?>

<?php include "include/log_timeout.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>HRM - Empoyee Dashboard </title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/sourcesoft_logo.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

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
            <h1>Holidays Details</h1>
            <nav>

            </nav>
        </div><!-- End Page Title -->

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

                </html>

            </div>

            <?php
     include ("connection.php");

     $query="SELECT * FROM holiday";
    $data=mysqli_query($conn,$query);

     $result=mysqli_fetch_assoc($data);
     $total=mysqli_num_rows($data);

     if ($total != 0) {
        ?>

            <section class="section">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="card">
                            <div class="card-body">
                                <h5 class="">Holidays Details</h5>
                                <hr>

                                <!-- Table with stripped rows -->
                                <table class="table datatable">
                                    <thead>
                                        <tr>
                                            <th width="10%" scope="col">SR NO</th>
                                            <th width="15%" scope="col">Holiday Name</th>
                                            <th width="10%" scope="col">From Date</th>
                                            <th width="10%" scope="col">To Date</th>
                                            <th width="15%" scope="col">Number Of Days</th>
                                            <th width="15%" scope="col">Description</th>
                                            
                                        </tr>
                                    </thead>
                                    <?php
                                            include "connection.php";

                                            $i = 1;

                                            $query_result = mysqli_query($conn, "SELECT *, ROW_NUMBER() OVER (ORDER BY id DESC) as row_num FROM `holiday`");

                                            while ($result = mysqli_fetch_array($query_result)) {
                                            ?>
                                    <tr>
                                        <th scope="row"><?php echo $result['row_num']; ?></th>
                                        <td><?php echo $result['hdname']; ?></td>
                                        <td><?php echo date('d-m-Y', strtotime($result['fromDate'])); ?></td>
                                        <td><?php echo date('d-m-Y', strtotime($result['toDate'])); ?></td>
                                        <td><?php echo $result['numberOfDays']; ?></td>
                                        <td><?php echo $result['descr']; ?></td>

                                      
                                    </tr>
                                    <?php
                                     $i++;
        }
    }
       ?>
                                </table>
                                <!-- End Table with stripped rows -->

                            </div>
                        </div>

                    </div>
                </div>
            </section>
        </section>

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