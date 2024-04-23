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

    <title>HRM - Emplyoee Dashboard </title>
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
            <h1>Leave Details</h1>

        </div><!-- End Page Title -->
       

        <?php
        $emp_id = $show_data['empid'];
        $query = "SELECT *, ROW_NUMBER() OVER (ORDER BY id DESC) as row_num FROM `user_leave` WHERE empid='$emp_id'";
        $data = mysqli_query($conn, $query);
        $total = mysqli_num_rows($data);
        ?>
        <section class="section">
            <div class="row">
                <div class="col-lg-12 col-md-6">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="mt-3">Leave Details</h5>
                            <hr>

                            <!-- Table with stripped rows -->
                            <table class="table datatable cellspacing= '5' width='70%'">
                                <thead>
                                    <tr class="table-primary">
                                        <th scope="col">Sr.No</th>
                                        <th scope="col">Leave Type</th>
                                        <th scope="col">Start Date</th>
                                        <th scope="col">End Date</th>
                                        <th scope="col">Reason</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <?php
                                while ($result = mysqli_fetch_assoc($data)) {
                                ?>
                                <tr>
                                    <td><?php echo $result['row_num']; ?></td>
                                    <td><?php echo $result['leavet']; ?></td>
                                    <td><?php echo date('d-m-Y', strtotime($result['sdate'])); ?></td>
                                    <td><?php echo date('d-m-Y', strtotime($result['edate'])); ?></td>
                                    <td><?php echo $result['reason']; ?></td>
                                    <td><?php
                                            if ($result['status'] == 1) {
                                                echo '<p><i class="bi bi-check2-circle text-success px-1">Approved</i></p>';
                                            } else {
                                            }
                                            if ($result['status'] == 2) {
                                                echo '<p><i class="bi bi-check2-circle text-danger px-1">Rejected</i></p>';
                                            } else {
                                            }
                                            if ($result['status'] == 0) {
                                                echo '<p><i class="bi bi-check2-circle text-warning px-1">Pending</i></p>';
                                            }
                                            ?></td>
                                </tr>
                                <?php
                                }
                                ?>

                            </table>
                            <!-- End Table with stripped rows -->

                        </div>
                    </div>

                </div>
            </div>

        </section>
       

        <div class="container">
            <div class="card">
                <div class="card-body">
                    <h5 class="mt-3">Request Leave</h5>
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
    <label for="inputhdname" class="form-label">Start Date</label>
    <input type="date" name="sdate" class="form-control form-control-sm" id="inputdate"
        required min="<?php echo date('Y-m-d'); ?>">
    <span class="error-message" id="inputdateError"></span>
</div>

<div class="col-md-6">
    <label for="inputhdname" class="form-label">End Date</label>
    <input type="date" name="edate" class="form-control form-control-sm" id="inputenddate"
        required min="<?php echo date('Y-m-d'); ?>">
    <span class="error-message" id="inputenddateError"></span>
</div>

<div class="col-md-6">
    <label for="leavet" class="required">Leave Type</label>
    <select class="form-control form-control-sm" name="leavet" id="leavetype" required>
        <option value="">Select Leave Type</option>
        <option>Sick Leave</option>
        <option>Casual Leave</option>
        <option>Medical Leave</option>
        <option>Privileged Leave</option>
    </select>
    <span class="error-message" id="leavetypeError"></span>
</div>

<div class="col-md-6">
    <label for="exampleFormControlTextarea1" class="form-label">Reason</label>
    <textarea class="form-control form-control-sm" name="reason" id="reasonforleave" rows="3"
        placeholder="Provide a reason for your leave" required></textarea>
    <span class="error-message" id="reasonforleaveError"></span>
</div>

<center>
    <button type="submit" class="btn btn-success" name="submit" onclick="return validateForm()">Submit</button>
</center>


                    </form>
                </div>
            </div>
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
    

    <style>
    .error-message {
        color: red;
    }
</style>

<script>
    function validateForm() {
        var startDate = document.getElementById('inputdate').value;
        var endDate = document.getElementById('inputenddate').value;
        var leaveType = document.getElementById('leavetype').value;
        var reason = document.getElementById('reasonforleave').value;

        document.getElementById('inputdateError').innerText = startDate.trim() === "" ? 'Start Date is required' : '';
        document.getElementById('inputdateError').style.color = startDate.trim() === "" ? 'red' : 'inherit';

        document.getElementById('inputenddateError').innerText = endDate.trim() === "" ? 'End Date is required' : '';
        document.getElementById('inputenddateError').style.color = endDate.trim() === "" ? 'red' : 'inherit';

        document.getElementById('leavetypeError').innerText = leaveType.trim() === "" ? 'Leave Type is required' : '';
        document.getElementById('leavetypeError').style.color = leaveType.trim() === "" ? 'red' : 'inherit';

        document.getElementById('reasonforleaveError').innerText = reason.trim() === "" ? 'Reason is required' : '';
        document.getElementById('reasonforleaveError').style.color = reason.trim() === "" ? 'red' : 'inherit';

        return (startDate.trim() !== "" && endDate.trim() !== "" && leaveType.trim() !== "" && reason.trim() !== "");
    }
</script>


</body>

</html>

<?php

if (isset($_POST['submit'])) {
    $EmployeeName = $_POST['fname'];
    $EmployeeID = $_POST['empid'];
    $ltype = $_POST['leavet'];
    $StartDate = $_POST['sdate'];
    $EndDate = $_POST['edate'];
    $Reason = $_POST['reason'];


    $sql = "INSERT INTO `user_leave`(`fname`, `empid`, `leavet`, `sdate`, `edate`, `reason`) VALUES ('$EmployeeName','$EmployeeID','$ltype','$StartDate','$EndDate','$Reason')";
    $data = mysqli_query($conn, $sql);

    if ($data) {
        echo "<script type='text/javascript'>
        Swal.fire({
            text: 'Leave requested successfully',
            icon: 'success',
            showConfirmButton: false,
            timer: 2000
        }).then(function() {
            window.location.replace('emp_leave');
        });
    </script>";
    } else {
        echo "Failed to uassign.";
    }
}

?>