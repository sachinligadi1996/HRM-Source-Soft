<?php
include 'connection.php';
session_start();
$userprofile = $_SESSION['login_user'];
if ($userprofile == true) {
} else {
    header('location:../index.php');
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

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
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
            <h1>Task Details</h1>

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

            <section class="section">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="card">
                            <div class="card-body">
                                <h5 class="">Task Details</h5>
                                <hr>

                                <!-- Table with stripped rows -->
                                <div class="table-responsive">
                                    <table class="table datatable">
                                        <thead>
                                            <tr>
                                                <th scope="col">Sr.No</th>
                                                <th scope="col">Employee Id</th>
                                                <th scope="col">Employee Name</th>
                                                <th scope="col">Project Title</th>
                                                <th scope="col">Team</th>
                                                <th scope="col">Task Module</th>
                                                <th scope="col">Task Description</th>
                                                <th scope="col">Start Date</th>
                                                <th scope="col">Due Date</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Priority</th>
                                                <th scope="col">upload</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        $i = 1;

                                        $query_result = mysqli_query($conn, "SELECT *, ROW_NUMBER() OVER (ORDER BY id DESC) as row_num FROM `assign_task`");

                                        while ($result = mysqli_fetch_array($query_result)) {
                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo $result['row_num']; ?></th>
                                            <td><?php echo $result['emp_id']; ?></td>
                                            <td><?php echo $result['fname']; ?></td>
                                            <td><?php echo $result['emp_project']; ?></td>
                                            <td><?php echo $result['emp_team']; ?></td>
                                            <td><?php echo $result['taskmodule']; ?></td>
                                            <td><?php echo $result['task']; ?></td>
                                            <td><?php echo date('d-m-Y', strtotime($result['start_date'])); ?></td>
                                            <td><?php echo date('d-m-Y', strtotime($result['due_date'])); ?></td>
                                            <td><?php echo $result['status']; ?></td>
                                            <td><?php echo $result['priority']; ?></td>
                                            <td><?php echo $result['upload']; ?></td>
                                            <td><a class='' href='task_update?id=<?php echo $result['id']; ?>'><i
                                                        class='fa fa-edit text-warning'></i></a>
                                                <a class='' href='task_details?id=<?php echo $result['id']; ?>'><i
                                                        class='fa fa-trash text-danger'></i></a>
                                            </td>


                                        </tr>
                                        <?php $i++;
                                        }
                                        ?>

                                    </table>


                                    <!-- End Table with stripped rows -->

                                </div>
                            </div>

                        </div>
                    </div>
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

<?php
if (!empty($_GET['id']) && isset($_GET['confirm']) && $_GET['confirm'] === 'true') {
    // Perform the deletion
    $idd = $_GET['id'];
    $query = "DELETE FROM `assign_task` WHERE id='$idd'";
    $data = mysqli_query($conn, $query);

    if ($data) {
        echo "<script type='text/javascript'>
                Swal.fire({
                    title: 'Details Deleted successfully',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 2000
                }).then(function() {
                    window.location.replace('task_details');
                });
              </script>";
    } else {
        echo "<script>
                Swal.fire({
                    title: 'Failed To Delete',
                    icon: 'error',
                    showConfirmButton: false,
                    timer: 2000
                }).then(function() {
                    window.location.replace('task_details');
                });
              </script>";
    }
} else if (!empty($_GET['id'])) {
    // SweetAlert confirmation dialog
    $idd = $_GET['id'];
    echo "<script>
            Swal.fire({
                title: 'Are you sure want to delete this Record?',
                // text: 'You won\'t be able to revert this!',
                // icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'task_details?id=$idd&confirm=true';
                } else {
                    window.location.href = 'task_details';
                }
            });
          </script>";
}
?>