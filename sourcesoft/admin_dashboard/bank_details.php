<?php
include 'connection.php';
session_start();
$userprofile = $_SESSION['login_user'];
if ($userprofile == true) {
} else {
    header('location:../index.php');
    exit(); 
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

        <div class="pagetitle">
            <h1>Bank Details</h1>

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

                <body>
                    <div class="container">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="">Employee Bank Details</h5>
                                <hr>
                                <form class="row g-3" action="#" method="POST" onsubmit="return validateForm()"
                                    enctype="multipart/form-data">
                                    <div class="col-md-6">
                                        <label for="" class="form-label">Employee ID</label>
                                        <select class="form-control form-control form-control-sm" id="employeeId"
                                            name="empid" required>
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
                                        <input type="text" name="employeeName" id="employeeName"
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
                                        <label for="accountNumber">Account Number</label>
                                        <input type="number" class="form-control form-control-sm" name="accountNumber"
                                            placeholder="Enter account number" required autocomplete="off">
                                        <span id="accountNumberError" class="error"></span>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="bankName">Bank Name</label>
                                        <input type="text" class="form-control form-control-sm" name="bankName"
                                            placeholder="Enter bank name" required autocomplete="off">
                                        <span id="bankNameError" class="error"></span>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="branchName">Branch Name</label>
                                        <input type="text" class="form-control form-control-sm" name="branchName"
                                            placeholder="Enter branch name" required autocomplete="off">
                                        <span id="branchNameError" class="error"></span>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="ifscCode">IFSC Code</label>
                                        <input type="text" class="form-control form-control-sm" name="ifscCode"
                                            placeholder="Enter IFSC code" required autocomplete="off">
                                        <span id="ifscCodeError" class="error"></span>
                                    </div>
                                    <div class="col-md-6">

                                        <label for="bankpass">Upload Passbook</label>
                                        <input type="file" class="form-control form-control-sm" name="bankpass"
                                            placeholder="Upload Passbook" required autocomplete="off"
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
                                        <button type="submit" class="btn btn-success " name="submit"
                                            onclick="return validateForm()">Submit</button>
                                    </div>


                                </form>
                            </div>

                            <!-- Include Bootstrap JS and Popper.js -->
                            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js">
                            </script>
                            <script src="https://cdn.jsdelivr.net/npm/popper.js@2.9.4/dist/umd/popper.min.js"></script>
                        </div>
                    </div>
                </body>

                </html>

            </div>

            <section class="section">
                <div class="row">
                    <div class="col-lg-12 col-md-12">

                        <div class="card">
                            <div class="card-body">
                                <h5 class="mt-2">Bank Details</h5>
                                <hr>
                                <div class="table-responsive">
                                    <table class="table datatable">
                                        <thead>
                                            <tr>
                                                <th scope="col">Sr.No</th>
                                                <th scope="col">EmpID</th>
                                                <th scope="col">Employee Name</th>
                                                <th scope="col">Account Number</th>
                                                <th scope="col">Bank Name</th>
                                                <th scope="col">Branch Name</th>
                                                <th scope="col">IFSC Code</th>
                                                <th scope="col">Upload Passbook</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        $i = 1;

                                        $query_result = mysqli_query($conn, "SELECT *, ROW_NUMBER() OVER (ORDER BY id DESC) as row_num FROM bank_details");

                                        while ($result = mysqli_fetch_array($query_result)) {
                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo $result['row_num']; ?></th>
                                            <td><?php echo $result['empid']; ?></td>
                                            <td><?php echo $result['employeeName']; ?></td>
                                            <td><?php echo $result['accountNumber']; ?></td>
                                            <td><?php echo $result['bankName']; ?></td>
                                            <td><?php echo $result['branchName']; ?></td>
                                            <td><?php echo $result['ifscCode']; ?></td>
                                            <td><?php echo $result['bankpass']; ?></td>

                                            <td><a class='' href='bank_update?id=<?php echo $result['id']; ?>'><i
                                                        class='fa fa-edit text-warning'></i></a>
                                                <a class='' href='bank_details?id=<?php echo $result['id']; ?>'><i
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

<?php
if (isset($_POST['submit'])) {
    $empid = $_POST['empid'];
    $employeeName = $_POST['employeeName'];
    $accountNumber = $_POST['accountNumber'];
    $bankName = $_POST['bankName'];
    $branchName = $_POST['branchName'];
    $ifscCode = $_POST['ifscCode'];

    // File upload
    $filename = $_FILES["bankpass"]["name"];
    $tempname = $_FILES["bankpass"]["tmp_name"];
    $targetDirectory = "file/";

    if (!file_exists($targetDirectory)) {
        mkdir($targetDirectory, 0777, true);
    }
    $targetFilePath = $targetDirectory . $filename;

    if (move_uploaded_file($tempname, $targetFilePath)) {
        $sql = "INSERT INTO bank_details (empid, employeeName, accountNumber, bankName, branchName, ifscCode, bankpass) VALUES ('$empid', '$employeeName', '$accountNumber', '$bankName', '$branchName', '$ifscCode', '$targetFilePath')";

        $data = mysqli_query($conn, $sql);

        if ($data) {
            echo "
            <script type='text/javascript'>
                Swal.fire({
                    title:'Add Details successfully',
                    icon:'success',
                    showConfirmButton: false,
                    timer:2000
                }).then(function() {
                    window.location.replace('bank_details');
                });
            </script>";
        } else {
            echo "data not inserted";
        }
    } else {
        echo "File upload failed.";
    }
}
?>
<!-- delete--------------- -->


<!-- creating folder -->
<?php
if (isset($_POST['submit'])) {
    $empid = $_POST['empid'];
    $employeeName = $_POST['employeeName'];
    $accountNumber = $_POST['accountNumber'];
    $bankName = $_POST['bankName'];
    $branchName = $_POST['branchName'];
    $ifscCode = $_POST['ifscCode'];

    // File upload
    $filename = $_FILES["bankpass"]["name"];
    $tempname = $_FILES["bankpass"]["tmp_name"];
    $targetDirectory = "file/";

    // Create a main folder for storing employee bank details
    $mainFolderPath = "c:/HRM_Software/Bank_Details";

    if (!file_exists($mainFolderPath)) {
        mkdir($mainFolderPath, 0777, true); // Creates the main folder if it doesn't exist
    }

    // Create a subfolder for each employee using their name
    $employeeFolderPath = $mainFolderPath . "/Employee_$employeeName";

    if (!file_exists($employeeFolderPath)) {
        mkdir($employeeFolderPath, 0777, true); // Create a subfolder for the specific employee
    }

    // File path with employee name in the file name inside the employee's subfolder
    $filePath = $employeeFolderPath . "/bank_details_employee_$employeeName.txt";

    // Data to be saved in the file
    $bankData = "Employee ID: $empid\n";
    $bankData .= "Employee Name: $employeeName\n";
    $bankData .= "Account Number: $accountNumber\n";
    $bankData .= "Bank Name: $bankName\n";
    $bankData .= "Branch Name: $branchName\n";
    $bankData .= "IFSC Code: $ifscCode\n";
    $bankData .= "Passbook File Name: $filename\n";

    // Save data to the text file
    file_put_contents($filePath, $bankData);

    // Move the uploaded passbook file to the employee's subfolder
    $targetFilePath = $employeeFolderPath . "/" . $filename;
    move_uploaded_file($tempname, $targetFilePath);

    echo "Bank details and passbook file stored in '$filePath'.";
}
?>

<?php
if (!empty($_GET['id']) && isset($_GET['confirm']) && $_GET['confirm'] === 'true') {
    // Perform the deletion
    $idd = $_GET['id'];
    $query = "DELETE FROM bank_details WHERE id='$idd'";
    $data = mysqli_query($conn, $query);

    if ($data) {
        echo "<script type='text/javascript'>
                Swal.fire({
                    title: 'Delete Details successfully',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 2000
                }).then(function() {
                    window.location.href = 'bank_details'; // Change 'replace' to 'href'
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
                    window.location.href = 'bank_details'; // Change 'replace' to 'href'
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
                    window.location.href = 'bank_details?id=$idd&confirm=true';
                } else {
                    window.location.href = 'bank_details';
                }
            });
          </script>";
}
?>