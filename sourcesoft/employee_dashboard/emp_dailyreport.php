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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

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
            <h1>Daily Project Report Details</h1>

        </div><!-- End Page Title -->

        <!-- -------- -->
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <h5 class="mt-3">Daily Project Report Details</h5>
                    <hr>
                    <?php
                    $emp_id = $show_data['empid'];
                    $emp_name = $show_data['fname'];

                    ?>

                    <form class="row g-3" action="#" method="POST" onsubmit="return validateForm()">
                    <div class="col-md-6">
                            <label for="inputhdname" class="form-label">Employee ID</label>
                            <input type="text" name="id" class="form-control form-control-sm" id="inputid"
                                value="<?php echo $emp_id ?>" required disabled>
                            <input type="hidden" name="empid" class="form-control form-control-sm" id="inputid"
                                value="<?php echo $emp_id ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="inputhdname" class="form-label">Employee Name </label>
                            <input type="text" name="name" class="form-control form-control-sm" id="inputhdname"
                                value="<?php echo $emp_name ?>" required disabled>
                            <input type="hidden" name="fname" class="form-control form-control-sm" id="inputhdname"
                                value="<?php echo $emp_name ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="inputhdname" class="form-label">Month </label>
                            <?php
                                include "connection.php";
                                 $query_result = mysqli_query($conn, "SELECT * FROM `noticedpr`");
                                 while ($result = mysqli_fetch_array($query_result)) {
                                  ?>&nbsp;
                                  <input type="text"  class="form-control form-control-sm" 
                                  value="<?php echo date('M', strtotime($result['imonth'])); ?>" >

                                  <?php
                                  }
                                 ?>
                         </div>
                        
                        
                        <div class="col-md-6">
                            <label for="inputhdname" class="form-label">Link</label>
                            <?php
                                include "connection.php";
                                $query_result = mysqli_query($conn, "SELECT * FROM `noticedpr`");
                                while ($result = mysqli_fetch_array($query_result)) {
                                ?>&nbsp;
                                <a type="text"  class="form-control form-control-sm"  target="_blank" href="<?php echo $result['link']; ?>"><?php echo $result['link']; ?></a> 
                                <?php
                                }
                                ?>
                            
                        </div>
</form>
</div>


    </main>
    <!-- ======= Footer ======= -->
    <?php include "include/footer.php"; ?>
    <!-- End Footer -->

    <!-- Include Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@2.9.4/dist/umd/popper.min.js"></script>

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

