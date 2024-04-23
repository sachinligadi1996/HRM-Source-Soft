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
            <h1>Performance Details</h1>

        </div><!-- End Page Title -->
        <?php
        include("connection.php");
        $id = $_GET['id'];

        $query = "SELECT * FROM performance where id='$id'";
        $data = mysqli_query($conn, $query);

        $result = mysqli_fetch_assoc($data);
        $total = mysqli_num_rows($data);

        ?>

<script>
                    function validateForm() {
                        const ename = document.querySelector('input[name="ename"]').value;
                        const imonth = document.querySelector('input[name="imonth"]').value;
                       
                        const rating = document.querySelector('input[name="rating"]').value;


                        // Check if required fields are empty
                        if (!ename || !imonth || !rating) {
                            showAlert('Please fill in all required fields.');
                            return false;
                        }
                        if (isNaN(rating) || parseFloat(rating) >10) {
                                    showAlert('rating should be upto 10.');
                                    return false;
                                }
                              

                        return true; // Allow form submission if validation passes
                    }

                    function showAlert(message) {
                        Swal.fire({
                            title: 'Validation Error',
                            text: message,
                            icon: 'error',
                            confirmButtonText: 'Ok'
                        });
                    }
                    </script>
        <!-- -------- -->
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <h5 class="mt-3">Performance Details</h5>
                    <hr>
                    <form class="row g-3" action="#" method="POST" onsubmit="return validateForm()">
                    <div class="col-md-6">
                                        <label for="" class="form-label">Employee ID</label>
                                        <select class="form-control form-control form-control-sm" id="employeeId"
                                            name="emp_id" required>
                                            <option value="<?php echo $result['emp_id']; ?>"><?php echo $result['emp_id']; ?>
                                </option>
                                            <?php

                      $query_show_emp = mysqli_query($conn, "SELECT * FROM emp_details");

                      while ($show_emp = mysqli_fetch_array($query_show_emp)) {

                      ?>
                                            <option value="<?php echo $show_emp['empid']; ?>"
                                                data-fname="<?php echo $show_emp['fname']; ?>">
                                                <?php echo $show_emp['empid']; ?>
                                            </option>

                                            <?php
                      }
                      ?>

                                        </select>
                                        <span id="emp_idError" class="error"></span>

                                    </div>

                                    <div class="col-md-6">
                                        <label for="" class="form-label">Employee Name</label>
                                        <input type="text" name="ename" id="employeeName"
                                            class="form-control form-control-sm" placeholder="Employee Name"  value="<?php echo $result['ename']; ?>" readonly >
                                        <span id="employeeNameError" class="error"></span>

                                    </div>
                                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

                                    <script>
                                    $(document).ready(function() {
                                        $('#employeeId').change(function() {
                                            var selectedEmployee = $(this).children("option:selected");
                                            var fname = selectedEmployee.attr(
                                                'data-fname'); // Get the selected Employee Name

                                            // Set the value in the Employee Name input field
                                            $('#employeeName').val(fname);
                                        });
                                    });
                                    </script>

                        <div class="col-md-6">
                            <label for="exampleFormControlTextarea1" class="form-label">Select Month </label>
                            <input type="month" name="imonth" class="form-control form-control-sm" id="inputmonth"
                                value="<?php echo $result['imonth'];?>">
                                <div class="error" id="inputmonthError"></div>
                        </div>

                        <div class="col-md-6">
                            <label for="inputrating" class="form-label">Rating (1-10)</label>
                            <input type="number" class="form-control" id="inputrating" name="rating"
                                value="<?php echo $result['rating']; ?>">
                                <div class="error" id="inputratingError"></div>
                        </div>

                        <center> <button type="submit" class="btn btn-success btn-sm" name="update"
                                onclick="return validateForm()">Update</button></center>

                    </form>

                </div>
            </div>

    </main>
    <!-- Include Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@2.9.4/dist/umd/popper.min.js"></script>
    </div>
    </div>
</body>
<style>
    .error {
        color: red;
    }
</style>

<script>
    function validateForm() {
        var empId = document.getElementsByName('emp_id')[0].value;
        var empName = document.getElementById('inputename').value;
        var month = document.getElementById('inputmonth').value;
        var rating = document.getElementById('inputrating').value;

        document.getElementById('empIdError').innerText = empId.trim() === "" ? 'Employee ID is required' : '';
        document.getElementById('inputenameError').innerText = empName.trim() === "" ? 'Employee Name is required' : '';
        document.getElementById('inputmonthError').innerText = month.trim() === "" ? 'Select Month is required' : '';
        document.getElementById('inputratingError').innerText = rating.trim() === "" ? 'Rating is required' : '';

        return (empId.trim() !== "" && empName.trim() !== "" && month.trim() !== "" && rating.trim() !== "");


    }
</script>


</html>

</div>
<?php

if (isset($_POST['update'])) {
    $emp_id = $_POST['emp_id'];
    $ename = $_POST['ename'];
    $imonth = $_POST['imonth'];
    $rating = $_POST['rating'];


    $query = "UPDATE performance set emp_id='$emp_id',ename='$ename', imonth='$imonth',rating='$rating'WHERE id='$id'";

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
    window.location.replace('performance');
    });
    </script>";
                } else {

                    echo "update failed";
                }
            }

            ?>
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