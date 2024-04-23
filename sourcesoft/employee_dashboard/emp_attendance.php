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

    <title>HRM - Employee Dashboard </title>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

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


            </div>

</body>

</html>

<?php
$id = $show_data['empid'];

           

                        if(isset($_POST['filter'])){
                         $from=$_POST['from'];
                         $to=$_POST['to'];
                         $query = mysqli_query($conn, "SELECT *, ROW_NUMBER() OVER (ORDER BY id DESC) as row_num FROM `attendance` WHERE emp_id='$id' AND  `date` BETWEEN '$from' and '$to'  ");
                        }
                        ?>

<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="">Attendance Details</h5>
                    <!-- Table with stripped rows -->
                    <br>
                    <div>
                        <form action="#" method="post" class="row g-3">

                            <div class="col-md-4">
                                <label for="from">From:</label>
                                <input type="date" id="from" name="from" value="<?php echo $from ?>"
                                    class="form-control form-control-sm" required>
                            </div>
                            <div class="col-md-4">
                                <label for="to">to:</label>
                                <input type="date" id="to" name="to" value="<?php echo $to ?>"
                                    class="form-control form-control-sm" required>
                            </div>

                            <div class="col-md-4 p-4">
                                <button type="submit" class="btn btn-primary btn-sm" name="filter">Filter</button>
                            </div>
                        </form>
                    </div>
                    <hr>

                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th scope="col">Sr No</th>
                                <th scope="col">Date</th>
                                <th scope="col">Employee ID</th>
                                <th scope="col">Employee Name</th>
                                <th scope="col">Check In</th>
                                <th scope="col">Check Out</th>
                                <th scope="col">Status</th>

                            </tr>

                        </thead>
                        <?php
                             error_reporting(0);
                            $i = 1;
                            

                            while ($result = mysqli_fetch_assoc($query)) {
                            ?>
                        <tr>
                            <td><?php echo $result['row_num']; ?></td>
                            <td><?php echo date('d-m-Y', strtotime($result['date'])); ?></td>
                            <td><?php echo $result['emp_id']; ?></td>
                            <td><?php echo $result['emp_name']; ?></td>
                            <td><?php echo $result['checkin']; ?></td>
                            <td><?php echo $result['checkout']; ?></td>
                            <td class="mt-1">
                                <?php
                                        if ($result['status'] == "1") {
                                        ?>
                                <p><span class="text-success"> <b>Present</b></span></p>
                                <?php
                                        } else {
                                        ?>

                                <p><span class="text-danger"> <b>Absent</b></span></p>
                                <?php
                                        }
                                        ?>
                            </td>

                        </tr>
                        <?php
                        $i++;
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