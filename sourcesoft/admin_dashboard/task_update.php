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

                <body>
                    <div class="container">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="">Update Task</h5>
                                <hr>
                                <?php
                                $id = $_GET['id'];
                                $query_result = mysqli_query($conn, "SELECT *, ROW_NUMBER() OVER (ORDER BY id DESC) as row_num FROM assign_task WHERE id='$id'");
                                $result = mysqli_fetch_array($query_result);
                                ?>
                                <form class="row g-3" action="#" method="POST" onsubmit="return validateForm()">
                                    <div class="col-md-6">
                                        <label for="" class="form-label">Employee ID</label>
                                        <select class="form-control form-control form-control-sm" name="emp_id"
                                            required>
                                            <option value="<?php echo $result['emp_id']; ?>"
                                                data-fname="<?php echo $result['fname']; ?>">
                                                <?php echo $result['emp_id']; ?>
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
                                        <input type="text" name="fname" id="employeeName"
                                            class="form-control form-control-sm" readonly
                                            value="<?php echo $result['fname']; ?>">
                                        <span id="employeeNameError" class="error"></span>
                                    </div>
                                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

                                    <script>
                                    $(document).ready(function() {
                                        $('select[name="emp_id"]').change(function() {
                                            var selectedEmployeeId = $(this).val();
                                            var selectedEmployeeName = $(
                                                'select[name="emp_id"] option:selected').attr(
                                                'data-fname');

                                            // Set the selected Employee Name in the Employee Name input field
                                            $('input[name="fname"]').val(selectedEmployeeName);
                                        });
                                    });
                                    </script>

                                    <div class="col-md-6">
                                        <label for="" class="form-label">Project</label>
                                        <select class="form-control form-control form-control-sm" name="emp_project"
                                            required>

                                            <option value="<?php echo $result['emp_project']; ?>">
                                                <?php echo $result['emp_project']; ?></option>
                                            <?php

                                            $query_show_project = mysqli_query($conn, "SELECT * FROM project");

                                            while ($show_project = mysqli_fetch_array($query_show_project)) {

                                            ?>
                                            <option value="<?php echo $show_project['project']; ?>">
                                                <?php echo $show_project['project']; ?></option>
                                            <?php
                                            }
                                            ?>

                                        </select>
                                        <span id="emp_projectError" class="error"></span>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="form-label">Team</label>
                                        <select class="form-control form-control form-control-sm" name="emp_team"
                                            required>

                                            <option value="<?php echo $result['emp_team']; ?>">
                                                <?php echo $result['emp_team']; ?></option>
                                            <?php

                                            $query_show_team = mysqli_query($conn, "SELECT * FROM team_member");

                                            while ($show_team = mysqli_fetch_array($query_show_team)) {

                                            ?>
                                            <option value="<?php echo $show_team['team_name']; ?>">
                                                <?php echo $show_team['team_name']; ?></option>
                                            <?php
                                            }
                                            ?>

                                        </select>
                                        <span id="emp_teamError" class="error"></span>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="taskModule" class="form-label">Task Module</label>
                                        <input type="text" class="form-control form-control-sm" id="TaskModule"
                                            name="taskmodule" placeholder="Enter Task Module " required
                                            value="<?php echo $result['taskmodule']; ?>">
                                        <span id="taskmoduleError" class="error"></span>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputemail" class="form-label">Task Description</label>
                                        <textarea class="form-control" name="task" id="" cols="30" rows="3"
                                            placeholder="Description" required><?php echo $result['task']; ?></textarea>
                                        <span id="taskError" class="error"></span>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="startDate" class="required">Starting Date</label>
                                        <input type="date" class="form-control form-control-sm" name="start_date"
                                            required value="<?php echo $result['start_date']; ?>">
                                        <span id="start_dateError" class="error"></span>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="dueDate" class="required">Due Date</label>
                                        <input type="date" class="form-control form-control-sm" name="due_date" required
                                            value="<?php echo $result['due_date']; ?>">
                                        <span id="due_dateError" class="error"></span>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="status" class="required">Status</label>
                                        <select class="form-control form-control form-control-sm" name="status"
                                            required>

                                            <option value="<?php echo $result['status']; ?>">
                                                <?php echo $result['status']; ?></option>
                                            <option>To-Do</option>
                                            <option>In Progress</option>
                                            <option>In Review</option>
                                            <option>Completed</option>
                                        </select>
                                        <span id="statusError" class="error"></span>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="priority" class="required">Priority Level</label>
                                        <select class="form-control form-control form-control-sm" name="priority"
                                            required>

                                            <option value="<?php echo $result['priority']; ?>">
                                                <?php echo $result['priority']; ?></option>
                                            <option>Low</option>
                                            <option>Medium</option>
                                            <option>High</option>
                                        </select>
                                        <span id="priorityError" class="error"></span>
                                    </div>
                                    <div class="col-md-6">

                                        <label for="upload">Upload file</label>
                                        <input type="file" class="form-control form-control-sm" name="upload"
                                            id="upload" placeholder="Upload Passbook" autocomplete="off"
                                            onchange="checkFileSize(this)" required>



                                        <!-- <input type="file" class="form-control form-control-sm" name="upload"
    placeholder="Upload Passbook" required autocomplete="off"
    onchange="checkFileSize(this)"> -->
                                        <small class="text-muted">Max file size: 5 MB</small>
                                        <span id="uploadError" class="error"></span>
                                    </div>
                                    <div class="col-md-12 text-center">
                                        <button type="submit" class="btn btn-success" name="submit"
                                            onclick="return validateForm()">Update</button>
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
                        var isValid = true;

                        // Reset error messages
                        $('.error').text('');

                        // Employee ID validation
                        var empId = $('select[name="emp_id"]').val();
                        if (empId === '') {
                            $('#emp_idError').text('Employee ID is required');
                            isValid = false;
                        }

                        // Employee Name validation
                        var employeeName = $('input[name="fname"]').val();
                        if (employeeName === '') {
                            $('#employeeNameError').text('Employee Name is required');
                            isValid = false;
                        }

                        // Project validation
                        var project = $('select[name="emp_project"]').val();
                        if (project === '') {
                            $('#emp_projectError').text('Project is required');
                            isValid = false;
                        }

                        // Team validation
                        var team = $('select[name="emp_team"]').val();
                        if (team === '') {
                            $('#emp_teamError').text('Team is required');
                            isValid = false;
                        }

                        // Task Module validation
                        var taskModule = $('#TaskModule').val();
                        if (taskModule === '') {
                            $('#taskmoduleError').text('Task Module is required');
                            isValid = false;
                        }

                        // Task Description validation
                        var taskDescription = $('textarea[name="task"]').val();
                        if (taskDescription === '') {
                            $('#taskError').text('Task Description is required');
                            isValid = false;
                        }

                        // Starting Date validation
                        var startDate = $('input[name="start_date"]').val();
                        if (startDate === '') {
                            $('#start_dateError').text('Starting Date is required');
                            isValid = false;
                        }

                        // Due Date validation
                        var dueDate = $('input[name="due_date"]').val();
                        if (dueDate === '') {
                            $('#due_dateError').text('Due Date is required');
                            isValid = false;
                        }

                        // Status validation
                        var status = $('select[name="status"]').val();
                        if (status === '') {
                            $('#statusError').text('Status is required');
                            isValid = false;
                        }

                        // Priority validation
                        var priority = $('select[name="priority"]').val();
                        if (priority === '') {
                            $('#priorityError').text('Priority Level is required');
                            isValid = false;
                        }

                        // File upload validation
                        var fileUpload = $('#upload').val();
                        if (fileUpload === '') {
                            $('#uploadError').text('File Upload is required');
                            isValid = false;
                        }

                        return isValid;
                    }


                    function checkFileSize(input) {
                        var file = input.files[0];
                        if (file.size > 5 * 1024 * 1024) { // 5MB limit
                            alert("File size exceeds 5MB");
                            input.value = ''; // Reset the input field
                        }
                    }
                    </script>


                </body>

                </html>



            </div>

            <?php
            if (isset($_POST['submit'])) {
                $emp_id=$_POST['emp_id'];
                $fname = $_POST['fname'];
                $emp_project = $_POST['emp_project'];
                $emp_team = $_POST['emp_team'];
                $taskmodule = $_POST['taskmodule'];
                $task = $_POST['task'];
                $start_date = $_POST['start_date'];
                $due_date = $_POST['due_date'];
                $status = $_POST['status'];
                $priority = $_POST['priority'];

                  // File upload handling
      // File upload handling
      $targetDirectory = "files&img/";
$filename = $_FILES['upload']['name'];
$tempname = $_FILES['upload']['tmp_name'];

if (!empty($filename)) {
    // Check if a new file is provided
    $targetFilePath = $targetDirectory . $filename;

    if (!file_exists($targetDirectory)) {
        mkdir($targetDirectory, 0777, true);
    }

    // Move the uploaded file to the target directory
    move_uploaded_file($tempname, $targetFilePath);
} else {
    // Keep the existing file if no new file is provided
    $targetFilePath = $result['upload'];
}

                $sql = "UPDATE assign_task SET emp_id ='$emp_id', fname = '$fname' , emp_project = '$emp_project', emp_team = '$emp_team',taskmodule = '$taskmodule', task = '$task', start_date= '$start_date', due_date= '$due_date', status = '$status', priority = '$priority',upload='$targetFilePath'  WHERE id='$id'";
                $execute = mysqli_query($conn, $sql);

                if ($execute) {
                    echo "<script type='text/javascript'>
                    Swal.fire({
                        text: 'Task updated successfully',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(function() {
                        window.location.replace('assign_work');
                    });
                </script>";
                } else {
                    echo "Failed to uassign.";
                }
            }
            $conn->close();
            ?>
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