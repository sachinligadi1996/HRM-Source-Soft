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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>
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
            <h1>Employee Details</h1>
        </div>
        <!-- End Page Title -->

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
            $query = "SELECT *, ROW_NUMBER() OVER (ORDER BY id DESC) as row_num FROM emp_details";
            $data = mysqli_query($conn, $query);
            $total = mysqli_num_rows($data);


            if ($total != 0) {
            ?>

            <section class="section">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="card">
                            <div class="card-body">
                                <h5 class="">Employee Details</h5>
                                <hr>

                                <!-- Table with stripped rows -->
                                <div class="table-responsive">
                                    <table class="table datatable ">
                                        <thead>
                                            <tr>
                                                <th scope="col">S.No.</th>
                                                <th scope="col">Employee ID</th>
                                                <th scope="col">Employee Name</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Phone</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>

                                        <?php
                                            while ($result = mysqli_fetch_assoc($data)) {
                                            ?>
                                        <tr>
                                            <td><?php echo $result['row_num']; ?></td>
                                            <td><?php echo $result['username']; ?></td>
                                            <td><?php echo $result['fname']; ?></td>
                                            <td><?php echo $result['email']; ?></td>
                                            <td><?php echo $result['phno']; ?></td>
                                            <td><a class=''
                                                    href='employee_profile?id=<?php echo $result['empid']; ?>'><i
                                                        class='fa fa-user text-primary'></i></a>
                                                <a class='' href='empdetails_update?id=<?php echo $result['id']; ?>'><i
                                                        class='fa fa-edit text-warning'></i></a>
                                                <a class='' href='employee_details?id=<?php echo $result['id']; ?>'><i
                                                        class='fa fa-trash text-danger'></i></a>

                                            </td>
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

            <body>
                <div class="container">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="">Employee Registration</h5>
                            <hr>
                            <form class="row g-3" action="#" method="POST" onsubmit="return validateForm()"
                                id="employeeForm">
                                <!-- Employee Information -->
                                <!-- <div class="col-md-6">
                                    <label for="employeeID" class="form-label">Employee ID</label>
                                    <input type="text" class="form-control form-control-sm" id="employeeID" name="empid"
                                        placeholder="Enter employee ID" required autocomplete="off">
                                </div> -->
                                <div class="col-md-6">
                                    <label for="employeeUserName" class="form-label">Employee ID</label>
                                    <input type="text" class="form-control form-control-sm" id="employeeUserName"
                                        name="username" placeholder="Enter employee ID" required autocomplete="off">
                                    <span class="error-message" id="emp_idError"></span>

                                </div>
                                <div class="col-md-6">
                                    <label for="employeeName" class="form-label">Employee Name</label>
                                    <input type="text" class="form-control form-control-sm" id="employeeName"
                                        name="fname" placeholder="Enter name" required autocomplete="off">
                                    <div class="error" id="employee_nameError"></div>

                                </div>

                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control form-control-sm" id="email" name="email"
                                        placeholder="Enter email" autocomplete="off" required>
                                    <span class="error-message" id="employee_emailError"></span>

                                </div>
                                <div class="col-md-6">
                                    <label for="phone" class="form-label">Phone</label>


                                    <input type="text" class="form-control" id="phone" placeholder="Phone Number"
                                        name="phno" pattern="\d{10}" maxlength="10">

                                    <!-- <input type="tel" class="form-control form-control-sm" id="phone" name="phno"
                                        placeholder="Enter phone number" required autocomplete="off"> -->
                                    <span class="error-message" id="emp_phoneNoError"></span>

                                </div>
                                <!-- <div class="col-md-6">
                                    <label for="employeeUserName" class="form-label">UserName</label>
                                    <input type="text" class="form-control form-control-sm" id="employeeUserName"
                                        name="username" placeholder="Enter employee UserName" required
                                        autocomplete="off">
                                </div> -->
                                <div class="col-md-6">
                                    <label for="employeepass" class="form-label">Password</label>
                                    <input type="password" class="form-control form-control-sm" id="employeepass"
                                        name="pass" placeholder="Enter employee Password" required autocomplete="off">
                                    <span class="error-message" id="emp_passwordError"></span>

                                </div>

                                <!-- Employment Information -->
                                <div class="col-md-6">
                                    <label for="department" class="form-label">Department</label>
                                    <input type="text" class="form-control form-control-sm" id="department"
                                        name="department" placeholder="Enter department" required autocomplete="off">
                                    <span class="error-message" id="emp_departmentError"></span>

                                </div>
                                <div class="col-md-6">
                                    <label for="position" class="form-label">Position</label>
                                    <input type="text" class="form-control form-control-sm" id="position"
                                        name="position" placeholder="Enter position" required autocomplete="off">
                                    <span class="error-message" id="employee_positionError"></span>

                                </div>
                                <div class="col-md-6">
                                    <label for="dob" class="form-label">Date of Joining</label>
                                    <input type="date" class="form-control form-control-sm" name="jdate" id="dob"
                                        required autocomplete="off">
                                    <span class="error-message" id="emp_DateofJoingError"></span>


                                </div>

                                <!-- Additional Information -->
                                <div class="col-md-6">
                                    <label for="dob" class="form-label">Date of Birth</label>
                                    <input type="date" class="form-control form-control-sm" name="bdate" id="dob"
                                        placeholder required autocomplete="off">
                                    <span class="error-message" id="emp_DateofBirthError"></span>

                                </div>


                                <!-- Education and Skills -->
                                <div class="col-md-6">
                                    <label for="education" class="form-label">Education</label>
                                    <input type="text" class="form-control form-control-sm" id="education" name="edu"
                                        placeholder="Enter education" required autocomplete="off">
                                    <span class="error-message" id="emp_educationError"></span>

                                </div>
                                <div class="col-md-6">
                                    <label for="skills" class="form-label">Skills</label>
                                    <input type="text" class="form-control form-control-sm" id="skills" name="skills"
                                        placeholder="Enter skills" required autocomplete="off">
                                    <span class="error-message" id="emp_skillError"></span>

                                </div>
                                <div class="col-md-6">
                                    <label for="address" class="form-label">Address</label>
                                    <textarea class="form-control form-control-sm" id="address" name="add" rows="4"
                                        placeholder="Enter address" required autocomplete="off"></textarea>
                                    <span class="error-message" id="emp_addressError"></span>

                                </div>

                                <!-- Submit Button -->

                                <div class="col-md-12">
                                    <center><button type="submit" class="btn btn-success" name="submit"
                                            onclick="return validateForm()">Submit</button></center>
                                </div>
                            </form>
                        </div>

                        <!-- Include Bootstrap JS and Popper.js -->
                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
                        <script src="https://cdn.jsdelivr.net/npm/popper.js@2.9.4/dist/umd/popper.min.js"></script>
                    </div>
                </div>

                <script>
                function validateForm() {
                    var isValid = true; // Flag to track overall validation status

                    // Function to clear error messages and reset styling
                    function clearErrorMessages() {
                        var errorElements = document.getElementsByClassName('error-message');
                        for (var i = 0; i < errorElements.length; i++) {
                            errorElements[i].innerHTML = '';
                            errorElements[i].style.color = ''; // Reset text color
                        }
                    }

                    // Clear existing error messages and styling
                    clearErrorMessages();

                    // Function to set error message and styling
                    function setError(elementId, errorMessage) {
                        document.getElementById(elementId).innerHTML = errorMessage;
                        document.getElementById(elementId).style.color = 'red';
                        isValid = false;
                    }

                    // Employee ID
                    var empID = document.getElementById('employeeUserName').value.trim();
                    if (empID === '') {
                        setError('emp_idError', 'Employee ID is required.');
                    }

                    // Employee Name
                    var empName = document.getElementById('employeeName').value.trim();
                    var nameRegex = /^[A-Za-z\s]+$/; // Only characters and spaces allowed
                    if (empName === '') {
                        setError('employee_nameError', 'Employee Name is required.');
                    } else if (!nameRegex.test(empName)) {
                        setError('employee_nameError', 'Name should contain only characters and spaces.');
                    }


                    // Email
                    var empEmail = document.getElementById('email').value.trim();
                    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Email format
                    if (empEmail === '') {
                        setError('employee_emailError', 'Email is required.');
                    } else if (!emailRegex.test(empEmail)) {
                        setError('employee_emailError', 'Enter a valid email address.');
                    }

                    // Phone
                    var empPhone = document.getElementById('phone').value.trim();
                    var phoneRegex = /^[0-9]+$/; // Only numbers allowed
                    if (empPhone === '') {
                        setError('emp_phoneNoError', 'Phone No is required.');
                    } else if (!phoneRegex.test(empPhone)) {
                        setError('emp_phoneNoError', 'Phone number should contain only numbers.');
                    }

                    // Password
                    var empPassword = document.getElementById('employeepass').value.trim();
                    if (empPassword === '') {
                        setError('emp_passwordError', 'Password is required.');
                    }

                    // ... (other field validations)
                    // Department
                    var empDepartment = document.getElementById('department').value.trim();
                    if (empDepartment === '') {
                        setError('emp_departmentError', 'Department is required.');
                    }

                    // Position
                    var empPosition = document.getElementById('position').value.trim();
                    if (empPosition === '') {
                        setError('employee_positionError', 'Position is required.');
                    }

                    // Date of Joining
                    var empJoiningDate = document.getElementById('dob').value.trim();
                    if (empJoiningDate === '') {
                        setError('emp_DateofJoingError', 'Date of Joining is required.');
                    }

                    // Date of Birth
                    var empBirthDate = document.getElementsByName('bdate')[0].value.trim();
                    if (empBirthDate === '') {
                        setError('emp_DateofBirthError', 'Date of Birth is required.');
                    }

                    // Education
                    var empEducation = document.getElementById('education').value.trim();
                    var educationRegex = /^[A-Za-z]+$/; // Only characters allowed
                    if (empEducation === '') {
                        setError('emp_educationError', 'Education is required.');
                    } else if (!educationRegex.test(empEducation)) {
                        setError('emp_educationError', 'Education should contain only characters.');
                    }



                    // Skills
                    var empSkills = document.getElementById('skills').value.trim();
                    if (empSkills === '') {
                        setError('emp_skillError', 'Skills are required.');
                    }

                    // Address
                    var empAddress = document.getElementById('address').value.trim();
                    if (empAddress === '') {
                        setError('emp_addressError', 'Address is required.');
                    }

                    return isValid; // Return the overall validation status
                }
                </script>

            </body>

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

    $firstname = $_POST['fname'];
    $empid = $_POST['username'];
    $mail = $_POST['email'];
    $phone = $_POST['phno'];
    $username = $_POST['username'];
    $pwd = $_POST['pass'];
    $department = $_POST['department'];
    $position = $_POST['position'];
    $project = $_POST['proname'];
    $startdate = $_POST['sdate'];
    $endtdate = $_POST['edate'];
    $manager = $_POST['man'];
    $jdate = $_POST['jdate'];
    $bdate = $_POST['bdate'];
    $address = $_POST['add'];
    $education = $_POST['edu'];
    $skill = $_POST['skills'];

    $check_query = "SELECT * FROM emp_details WHERE email = '$mail' OR phno = '$phone' OR username='$empid' OR fname='$firstname'";
$check_result = $conn->query($check_query);
if ($check_result->num_rows > 0) {
    
    echo "<script type='text/javascript'>
                    Swal.fire({
                        text: ' Employee Details already exists',
                        icon: 'error',
                        showConfirmButton: false,
                        timer: 2000
                    }).then(function() {
                        window.location.replace('employee_details');
                    });
                </script>";
}else{
    $sql = "INSERT INTO `emp_details`(`fname`, `empid`, `email`, `phno`, `username`, `pass`, `department`, `position`, `proname`, `sdate`, `edate`, `man`, `jdate`, `bdate`, `add`, `edu`, `skills`) VALUES ('$firstname','$empid','$mail','$phone','$username','$pwd','$department','$position','$project','$startdate','$endtdate','$manager','$jdate','$bdate','$address','$education','$skill')";
    $data = mysqli_query($conn, $sql);

    if ($data) {

        echo "<script type='text/javascript'>
                    Swal.fire({
                        text: ' Employee Details Submit successfully',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 2000
                    }).then(function() {
                        window.location.replace('employee_details');
                    });
                </script>";
    } else {
        echo "Data not inserted";
    }
}     
}

?>

</html>
<?php
if (!empty($_GET['id']) && isset($_GET['confirm']) && $_GET['confirm'] === 'true') {
    // Perform the deletion
    $idd = $_GET['id'];
    $query = "DELETE FROM `emp_details` WHERE id='$idd'";
    $data = mysqli_query($conn, $query);

    if ($data) {
       
        echo "<script type='text/javascript'>
                    Swal.fire({
                        text: 'Employee Detalis Deleted',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 2000
                    }).then(function() {
                        window.location.replace('employee_details');
                    });
                </script>";
    } else {
        echo "<script>alert('Failed To Delete')</script>";
    }
} else if (!empty($_GET['id'])) {
    // SweetAlert confirmation dialog
    $idd = $_GET['id'];
    echo "<script>
            Swal.fire({
                title: 'Are you sure want to delete this Record?',
                //text: 'You won\'t be able to revert this!',
                //icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'employee_details?id=$idd&confirm=true';
                } else {
                    window.location.href = 'employee_details';
                }
            });
          </script>";
}
?>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $emp_id = $_POST['empid'];
    $emp_name = $_POST['fname'];
    $mail = $_POST['email'];
    $phone = $_POST['phno'];
    $username = $_POST['username'];
    $pwd = $_POST['pass'];
    $department = $_POST['department'];
    $position = $_POST['position'];
    $jdate = $_POST['jdate'];
    $bdate = $_POST['bdate'];
    $address = $_POST['add'];
    $education = $_POST['edu'];
    $skill = $_POST['skills'];

    // Dates  Format
    $formatted_start_date = date('d-m-Y', strtotime($jdate));
    $formatted_due_date = date('d-m-Y', strtotime($bdate));

    //  main folder for employee details
    $emp_folder_path = "c:/HRM_Software/EmployeeDetails/$emp_name";

    // Create a subfolder for the new employee 
    if (!file_exists($emp_folder_path)) {
        mkdir($emp_folder_path, 0777, true);
    }

    // File path with employee ID 
    $file_path = $emp_folder_path . "/employee_details.txt";

    // Data to be saved in the file
    $employee_data = "Employee ID: $emp_id\n";
    $employee_data .= "Employee Name: $emp_name\n";
    $employee_data .= "Email: $mail\n";
    $employee_data .= "Phone: $phone\n";
    $employee_data .= "Username: $username\n";
    $employee_data .= "Password: $pwd\n";
    $employee_data .= "Department: $department\n";
    $employee_data .= "Position: $position\n";
    $employee_data .= "Joining Date: $formatted_start_date\n";
    $employee_data .= "Birth Date: $formatted_due_date\n";
    $employee_data .= "Address: $address\n";
    $employee_data .= "Education: $education\n";
    $employee_data .= "Skills: $skill\n";

    // Save employee details in the file
    file_put_contents($file_path, $employee_data);

    

    echo "Employee details saved successfully in '$file_path'.";
}






?>