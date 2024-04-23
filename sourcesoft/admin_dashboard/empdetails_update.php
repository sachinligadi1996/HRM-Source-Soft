<?php
include("connection.php");
$idd = $_GET['id'];

$query = "SELECT * FROM emp_details where id='$idd'";
$data = mysqli_query($conn, $query);

$result = mysqli_fetch_assoc($data);

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
            <h1>Employee Details</h1>
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
                                <h5 class="">Update Employee Details</h5>
                                <hr>
                                <form class="row g-3" action="#" method="POST">
                                    <!-- Employee Information -->
                                    <!-- <div class="col-md-6">
                                        <label for="employeeID" class="form-label">Employee ID</label>
                                        <input type="text" class="form-control form-control-sm" id="employeeID"
                                            name="empid" value="<?php echo $result['empid'] ?>"
                                            placeholder="Enter employee ID" required autocomplete="off">
                                    </div> -->
                                    <div class="col-md-6">
                                        <label for="employeeUserName" class="form-label">Employee ID</label>
                                        <input type="text" class="form-control form-control-sm" id="employeeUsername"
                                            name="username" value="<?php echo $result['username'] ?>"
                                            placeholder="Enter employee ID" required autocomplete="off" readonly>
                                        <span class="error-message" id="emp_idError"></span>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="employeeName" class="form-label">Employee Name</label>
                                        <input type="text" class="form-control form-control-sm" id="employeeName"
                                            value="<?php echo $result['fname'] ?>" name="fname" placeholder="Enter name"
                                            required autocomplete="off">
                                        <div class="error" id="employee_nameError"></div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control form-control-sm" id="email" name="email"
                                            value="<?php echo $result['email'] ?>" placeholder="Enter email" required
                                            autocomplete="off">
                                        <span class="error-message" id="employee_emailError"></span>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="phone" class="form-label">Phone</label>
                                        <!-- 
                                        <input type="text" class="form-control" id="phone" placeholder="Phone Number"
                                        name="phno" pattern="\d{10}" maxlength="10"> -->

                                        <input type="tel" class="form-control form-control-sm" id="phone" name="phno"
                                            value="<?php echo $result['phno'] ?>" placeholder="Enter phone number"
                                            required autocomplete="off" pattern="\d{10}" maxlength="10">
                                        <span class="error-message" id="emp_phoneNoError"></span>
                                    </div>
                                    <!-- <div class="col-md-6">
                                        <label for="employeeUserName" class="form-label">Username</label>
                                        <input type="text" class="form-control form-control-sm" id="employeeUsername"
                                            name="username" value="<?php echo $result['username'] ?>"
                                            placeholder="Enter employee UserName" required autocomplete="off">
                                    </div> -->
                                    <div class="col-md-6">
                                        <label for="employeepass" class="form-label">Password</label>
                                        <input type="password" class="form-control form-control-sm" id="employeepass"
                                            name="pass" value="<?php echo $result['pass'] ?>"
                                            placeholder="Enter employee Password" required autocomplete="off">
                                        <span class="error-message" id="emp_passwordError"></span>

                                    </div>

                                    <!-- Employment Information -->
                                    <div class="col-md-6">
                                        <label for="department" class="form-label">Department</label>
                                        <input type="text" class="form-control form-control-sm" id="department"
                                            name="department" value="<?php echo $result['department'] ?>"
                                            placeholder="Enter department" required autocomplete="off">
                                        <span class="error-message" id="emp_departmentError"></span>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="position" class="form-label">Position</label>
                                        <input type="text" class="form-control form-control-sm" id="position"
                                            name="position" value="<?php echo $result['position'] ?>"
                                            placeholder="Enter position" required autocomplete="off">
                                        <span class="error-message" id="employee_positionError"></span>
                                    </div>
                                    <!-- Manager/Team Leader -->
                                    <div class="col-md-6">
                                        <label for="dob" class="form-label">Date of Joining</label>
                                        <input type="date" class="form-control form-control-sm" name="jdate"
                                            value="<?php echo $result['jdate'] ?>" id="dob" required autocomplete="off">
                                        <span class="error-message" id="emp_DateofJoingError"></span>
                                    </div>

                                    <!-- Additional Information -->
                                    <div class="col-md-6">
                                        <label for="dob" class="form-label">Date of Birth</label>
                                        <input type="date" class="form-control form-control-sm" name="bdate"
                                            value="<?php echo $result['bdate'] ?>" id="dob" required autocomplete="off">
                                        <span class="error-message" id="emp_DateofBirthError"></span>
                                    </div>


                                    <!-- Education and Skills -->
                                    <div class="col-md-6">
                                        <label for="education" class="form-label">Education</label>
                                        <input type="text" class="form-control form-control-sm" id="education"
                                            name="edu" value="<?php echo $result['edu'] ?>"
                                            placeholder="Enter education" required autocomplete="off">
                                        <span class="error-message" id="emp_educationError"></span>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="skills" class="form-label">Skills</label>
                                        <input type="text" class="form-control form-control-sm" id="skills"
                                            name="skills" value="<?php echo $result['skills'] ?>"
                                            placeholder="Enter skills" required autocomplete="off">
                                        <span class="error-message" id="emp_skillError"></span>

                                    </div>
                                    <div class="col-md-6">
                                        <label for="address" class="form-label">Address</label>
                                        <textarea class="form-control form-control-sm" id="address" name="add" rows="4"
                                            placeholder="Enter address" required
                                            autocomplete="off"><?php echo $result['add']; ?></textarea>
                                        <span class="error-message" id="emp_addressError"></span>
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="col-md-12">
                                        <center><button type="submit" class="btn btn-success" name="submit"
                                                onclick="return validateForm()">Update</button></center>
                                    </div>
                                </form>
                            </div>

                            <!-- Include Bootstrap JS and Popper.js -->
                            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js">
                            </script>
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

                </html>

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


    $sql = "UPDATE `emp_details` SET `fname`='$firstname',`username`='$empid',`email`='$mail',`phno`='$phone',`username`='$username',`pass`='$pwd',`department`='$department',`position`='$position',`proname`='$project',`sdate`='$startdate',`edate`='$endtdate',`man`='$manager',`jdate`='$jdate',`bdate`='$bdate',`add`='$address',`edu`='$education',`skills`='$skill' WHERE id='$idd' ";
    $data = mysqli_query($conn, $sql);

    if ($data) {

        echo
        "<script type='text/javascript'>
      Swal.fire({
      text:'Update successfully',
      icon:'success',
      showConfirmButton: false,
      timer:2000
      }).then(function() {
      window.location.replace('employee_details');
      });
      </script>";
    } else {
        echo "Data not inserted";
    }
}

?>

</html>