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
  
     <!-- Include Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
                        rel="stylesheet">
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
            <h1>Performance Details</h1>

        </div><!-- End Page Title -->
       


        <!-- -------- -->
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <h5 class="mt-3">Add Performance Details</h5>
                    <hr>
                    <form class="row g-3" action="#" method="POST" onsubmit="return validateForm()">
                    <div class="col-md-6">
                                        <label for="" class="form-label">Employee ID</label>
                                        <select class="form-control form-control form-control-sm" id="employeeId"
                                            name="emp_id" required>
                                            <option selected disabled>Employee ID</option>
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
                                            class="form-control form-control-sm" placeholder="Employee Name" readonly>
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
        <input type="month" name="imonth" class="form-control form-control-sm" id="inputmonth" required>
        <div class="error" id="inputmonthError"></div>
    </div>

    <div class="col-md-6">
        <label for="inputrating" class="form-label">Rating (1-10)</label>
        <input type="number" class="form-control" id="inputrating" name="rating" required>
        <div class="error" id="inputratingError"></div>
    </div>

    <center>
        <button type="submit" class="btn btn-success btn-sm" name="submit" onclick="return validateForm()">Submit</button>
    </center>
</form>



                </div>
                </div>
                <section class="section">
                <div class="row">
                    <div class="col-lg-12 col-md-12">

                        <div class="card">
                            <div class="card-body">
                                <h5 class="mt-2">Performance Details</h5>
                                <hr>
                                <div class="table-responsive">
                                    <table class="table datatable">
                                        <thead>
                                            <tr>
                                                <th scope="col">Sr.No</th>
                                                <th scope="col">EmpID</th>
                                                <th scope="col">Employee Name</th>
                                                <th scope="col">Month</th>
                                                <th scope="col">Rating</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        $i = 1;

                                        $query_result = mysqli_query($conn, "SELECT *, ROW_NUMBER() OVER (ORDER BY id DESC) as row_num FROM `performance`");

                                        while ($result = mysqli_fetch_array($query_result)) {
                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo $result['row_num']; ?></th>
                                            <td><?php echo $result['emp_id']; ?></td>
                                            <td><?php echo $result['ename']; ?></td>
                                            <td><?php echo date('M', strtotime($result['imonth'])); ?></td>
                                            <td><?php echo $result['rating']; ?></td>
                                            <td><a class='' href='update_performance?id=<?php echo $result['id']; ?>'><i
                                                        class='fa fa-edit text-warning'></i></a>
                                                <a class='' href='performance?id=<?php echo $result['id']; ?>'><i
                                                        class='fa fa-trash text-danger'></i></a>
                                            </td>

                                        </tr>
                                        <?php $i++;
                                        }
                                        ?>

                                    </table>
                                    </section>
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
    .error {
        color: red;
    }
</style>

<script>
   function validateForm() {
    var isValid = true;

    // Validate Employee ID
    var employeeId = document.getElementById('employeeId');
    var employeeIdError = document.getElementById('emp_idError');
    if (employeeId.value === '' || employeeId.value === null || employeeId.value === 'Employee ID') {
        employeeIdError.innerText = 'Employee ID is required';
        isValid = false;
    } else {
        employeeIdError.innerText = '';
    }

    // Validate Employee Name
    var employeeName = document.getElementById('employeeName');
    var employeeNameError = document.getElementById('employeeNameError');
    if (employeeName.value === '' || employeeName.value === null || employeeName.value.trim() === '') {
        employeeNameError.innerText = 'Employee Name is required';
        isValid = false;
    } else {
        employeeNameError.innerText = '';
    }

    // Validate Select Month
    var month = document.getElementById('inputmonth').value;
    var monthError = document.getElementById('inputmonthError');
    if (month.trim() === '' || month === null) {
        monthError.innerText = 'Select Month is required';
        isValid = false;
    } else {
        monthError.innerText = '';
    }

    // Validate Rating
    var rating = document.getElementById('inputrating').value;
    var ratingError = document.getElementById('inputratingError');
    if (rating.trim() === '' || rating === null) {
        ratingError.innerText = 'Rating is required';
        isValid = false;
    } else {
        ratingError.innerText = '';
    }

    return isValid;
}

</script>




</body>

</html>

<?php

if (isset($_POST['submit'])) {
    $emp_id = $_POST['emp_id'];
    $ename = $_POST['ename'];
    $imonth = $_POST['imonth'];
    $rating = $_POST['rating'];


    $check_query = "SELECT * FROM performance WHERE emp_id = '$emp_id' and imonth='$imonth'";
$check_result = $conn->query($check_query);
if ($check_result->num_rows > 0) {
    
    echo "<script type='text/javascript'>
                    Swal.fire({
                       text: ' Your form is already submit',
                        icon: 'error',
                        showConfirmButton: false,
                        timer: 2000
                    }).then(function() {
                        window.location.replace('performance');
                   });
                </script>";
            }else{
    

    $sql = "INSERT INTO `performance`(`emp_id`, `ename`, `imonth`, `rating`) VALUES ('$emp_id','$ename','$imonth','$rating')";
    $data = mysqli_query($conn, $sql);

    if ($data) {
        echo "<script type='text/javascript'>
        Swal.fire({
            text: 'Submit details successfully',
            icon: 'success',
            showConfirmButton: false,
            timer: 2000
        }).then(function() {
            window.location.replace('performance');
        });
    </script>";
    } else {
        echo "Failed to uassign.";
    }
}

}
?>

[4:28 PM, 12/1/2023] Pallavi@efficient Shinde: <?php
if (!empty($_GET['id']) && isset($_GET['confirm']) && $_GET['confirm'] === 'true') {
    // Perform the deletion
    $idd = $_GET['id'];
    $query = "DELETE FROM team_member WHERE id='$idd'";
    $data = mysqli_query($conn, $query);

    if ($data) {
        echo "<script type='text/javascript'>
                Swal.fire({
                    title: 'Delete Details successfully',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 2000
                }).then(function() {
                    window.location.replace('team_members');
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
                    window.location.replace('team_members');
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
                    window.location.href = 'team_members?id=$idd&confirm=true';
                } else {
                    window.location.href = 'team_members';
                }
            });
          </script>";
}
?>
<?php
if (!empty($_GET['id']) && isset($_GET['confirm']) && $_GET['confirm'] === 'true') {
    // Perform the deletion
    $idd = $_GET['id'];
    $query = "DELETE FROM performance WHERE id='$idd'";
    $data = mysqli_query($conn, $query);

    if ($data) {
        echo "<script type='text/javascript'>
                Swal.fire({
                    title: 'Delete Details successfully',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 2000
                }).then(function() {
                    window.location.replace('performance');
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
                    window.location.replace('performance');
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
                    window.location.href = 'performance?id=$idd&confirm=true';
                } else {
                    window.location.href = 'performance';
                }
            });
          </script>";
}
     
?>