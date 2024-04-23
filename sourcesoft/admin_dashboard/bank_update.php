<?php
include("connection.php");
$idd = $_GET['id'];

$query = "SELECT * FROM bank_details where id='$idd'";
$data = mysqli_query($conn, $query);

$result = mysqli_fetch_assoc($data);
$total = mysqli_num_rows($data);

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>
    .error {
        color: red;
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

        <div class="pagetitle mt-3">
            <h1 class="fw-bold">Bank Details</h1>

        </div><!-- End Page Title -->


        <!-- Form -->
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <h5 class="mt-4">Employee Bank Details</h5>
                    <hr>
                    <form class="row g-3" action="#" method="POST" onsubmit="return validateForm()"
                        enctype="multipart/form-data">
                        <div class="col-md-6">
                            <label for="" class="form-label">Employee ID</label>
                            <select class="form-control form-control form-control-sm" id="employeeId" name="empid"
                                required>
                                <option value="<?php echo $result['empid']; ?>"><?php echo $result['empid']; ?></option>
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
                            <input type="text" name="employeeName" id="employeeName"
                                class="form-control form-control-sm" placeholder="Employee Name" readonly
                                value="<?php echo $result['employeeName'];?>">
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
                            <label for="accountNumber">Account Number</label>
                            <input type="number" class="form-control form-control-sm" name="accountNumber"
                                placeholder="Enter account number" required autocomplete="off"
                                value="<?php echo $result['accountNumber'];?>">
                            <span id="accountNumberError" class="error"></span>
                        </div>
                        <div class="col-md-6">
                            <label for="bankName">Bank Name</label>
                            <input type="text" class="form-control form-control-sm" name="bankName"
                                placeholder="Enter bank name" required value="<?php echo $result['bankName'];?>"
                                autocomplete="off">
                            <span id="bankNameError" class="error"></span>
                        </div>
                        <div class="col-md-6">
                            <label for="branchName">Branch Name</label>
                            <input type="text" class="form-control form-control-sm" name="branchName"
                                placeholder="Enter branch name" required value="<?php echo $result['branchName'];?>"
                                autocomplete="off">
                            <span id="branchNameError" class="error"></span>
                        </div>
                        <div class="col-md-6">
                            <label for="ifscCode">IFSC Code</label>
                            <input type="text" class="form-control form-control-sm" name="ifscCode"
                                placeholder="Enter IFSC code" required value="<?php echo $result['ifscCode'];?>"
                                autocomplete="off">
                            <span id="ifscCodeError" class="error"></span>
                        </div>
                        <div class="col-md-6">
                            <label for="bankpass">Upload Passbook</label>
                            <input type="file" class="form-control form-control-sm" name="bankpass"
                                placeholder="Upload Passbook" autocomplete="off" required
                                value="<?php echo $result['bankpass'];?>" accept=".jpg, .jpeg, .png, .gif, .pdf"
                                onchange="checkFileSize(this)">
                            <small class="text-muted">Max file size: 5 MB</small>
                            <span id="bankpassError" class="error"></span>
                        </div>


                        <script>
                        function validateForm() {
                            var isValid = true;
                            // Validate Employee ID
                            var employeeId = document.getElementById('employeeId');
                            var employeeIdError = document.getElementById('emp_idError');
                            if (employeeId.value === '' || employeeId.value === null || employeeId.value ===
                                'Employee ID') {
                                employeeIdError.innerText = 'Employee ID is required';
                                isValid = false;
                            } else {
                                employeeIdError.innerText = '';
                            }

                            // Validate Employee Name
                            var employeeName = document.getElementById('employeeName');
                            var employeeNameError = document.getElementById('employeeNameError');
                            if (employeeName.value === '' || employeeName.value === null || employeeName
                                .value.trim() ===
                                '') {
                                employeeNameError.innerText = 'Employee Name is required';
                                isValid = false;
                            } else {
                                employeeNameError.innerText = '';
                            }


                            // Validate Bank Name
                            var bankName = document.getElementsByName("bankName")[0].value;
                            var bankNameError = document.getElementById("bankNameError");
                            var lettersOnly = /^[A-Za-z\s]+$/;

                            if (bankName === "") {
                                bankNameError.innerHTML = "Bank Name is required";
                                isValid = false;
                            } else if (!bankName.match(lettersOnly)) {
                                bankNameError.innerHTML = "Please enter only alphabetic characters";
                                isValid = false;
                            } else {
                                bankNameError.innerHTML = "";
                            }

                            // Validate Branch Name
                            var branchName = document.getElementsByName("branchName")[0].value;
                            var branchNameError = document.getElementById("branchNameError");

                            if (branchName === "") {
                                branchNameError.innerHTML = "Branch Name is required";
                                isValid = false;
                            } else if (!branchName.match(lettersOnly)) {
                                branchNameError.innerHTML = "Please enter only alphabetic characters";
                                isValid = false;
                            } else {
                                branchNameError.innerHTML = "";
                            }
                           
                            var accountNumber = document.getElementsByName("accountNumber")[0].value;
                            
                            var ifscCode = document.getElementsByName("ifscCode")[0].value;
                            var bankpass = document.getElementsByName("bankpass")[0].value;

                            if (accountNumber === "") {
                                document.getElementById("accountNumberError").innerHTML =
                                    "Account Number is required";
                                isValid = false;
                            } else {
                                document.getElementById("accountNumberError").innerHTML = "";
                            }

                            
                            if (ifscCode === "") {
                                document.getElementById("ifscCodeError").innerHTML =
                                    "IFSC Code is required";
                                isValid = false;
                            } else {
                                document.getElementById("ifscCodeError").innerHTML = "";
                            }

                            if (bankpass === "") {
                                document.getElementById("bankpassError").innerHTML =
                                    "Upload Passbook is required";
                                isValid = false;
                            } else {
                                document.getElementById("bankpassError").innerHTML = "";
                            }

                            return isValid;
                        }

                        function checkFileSize(input) {
                            if (input.files.length > 0) {
                                const file = input.files[0];
                                const maxSizeInBytes = 5 * 1024 * 1024; // 5 MB
                                if (file.size > maxSizeInBytes) {
                                    alert("File size exceeds 5 MB. Please choose a smaller file.");
                                    input.value = ''; // Clear the file input
                                }
                            }
                        }
                        </script>
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-success btn-sm" name="update" value="update"
                                onclick="return validateForm()">update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <br><br>
        <!-- ------------table start----------------- -->

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
if (isset($_POST['update'])) {
    $employeeID = $_POST['empid'];
    $employeeName = $_POST['employeeName'];
    $accountNumber = $_POST['accountNumber'];
    $bankName = $_POST['bankName'];
    $branchName = $_POST['branchName'];
    $ifscCode = $_POST['ifscCode'];

    // Check if a new file was uploaded
    if ($_FILES['bankpass']['error'] === 0) {
        $filename = $_FILES['bankpass']['name'];
        $tempname = $_FILES['bankpass']['tmp_name'];
        $targetDirectory = "file/";

        if (!file_exists($targetDirectory)) {
            mkdir($targetDirectory, 0777, true);
        }
        $targetFilePath = $targetDirectory . $filename;

        if (move_uploaded_file($tempname, $targetFilePath)) {
            // File uploaded successfully
        } else {
            die("File upload failed.");
        }
    } else {
        // No new file uploaded, keep the existing file path
        $targetFilePath = $result['bankpass'];
    }

    $sql = "UPDATE bank_details SET empid='$employeeID', employeeName='$employeeName', accountNumber='$accountNumber', bankName='$bankName', branchName='$branchName', ifscCode='$ifscCode', bankpass='$targetFilePath' WHERE id='$idd'";

    $updateResult = mysqli_query($conn, $sql);

    if ($updateResult) {
        echo "<script type='text/javascript'>
            Swal.fire({
                text: 'Updated Details successfully',
                icon: 'success',
                showConfirmButton: false,
                timer: 2000
            }).then(function() {
                window.location.replace('bank_details');
            });
            </script>";
    } else {
        die("Error updating record: " . mysqli_error($conn));
    }
}
?>