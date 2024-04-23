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
    <!-- Include SweetAlert2 script -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>

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

            <h1>Assign Task</h1>

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
                                <h5 class="">Assign Task</h5>
                                <hr>
                                <form class="row g-3" action="#" method="POST" enctype="multipart/form-data"
                                    onsubmit="return validateForm()">

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
                                        <input type="text" name="fname" id="employeeName"
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
                                        <label for="" class="form-label">Project</label>
                                        <select class="form-control form-control form-control-sm" name="emp_project"
                                            required>
                                            <option selected disabled value=''>Select Project</option>
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
                                            <option selected disabled value=''>Select Team</option>
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
                                            autocomplete="off">
                                        <span id="taskmoduleError" class="error"></span>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputemail" class="form-label">Task Description</label>
                                        <textarea class="form-control" name="task" id="" cols="30" rows="3"
                                            placeholder="Description" required autocomplete="off"></textarea>
                                        <span id="taskError" class="error"></span>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="startDate" class="required">Starting Date</label>
                                        <input type="date" class="form-control form-control-sm" name="start_date"
                                            required min="<?php echo date('Y-m-d'); ?>">
                                        <span id="start_dateError" class="error"></span>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="dueDate" class="required">Due Date</label>
                                        <input type="date" class="form-control form-control-sm" name="due_date" required
                                            min="<?php echo date('Y-m-d'); ?>">
                                        <span id="due_dateError" class="error"></span>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="status" class="required">Status</label>
                                        <select class="form-control form-control form-control-sm" name="status"
                                            required>
                                            <option selected disabled value=''>Select Status</option>
                                            <option value="To-Do">To-Do</option>
                                            <option value="In Progress">In Progress</option>
                                            <option value="In Review">In Review</option>
                                            <option value="Completed">Completed</option>
                                        </select>
                                        <span id="statusError" class="error"></span>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="priority" class="required">Priority Level</label>
                                        <select class="form-control form-control form-control-sm" name="priority"
                                            required>
                                            <option selected disabled value=''>Select Priority</option>
                                            <option>Low</option>
                                            <option>Medium</option>
                                            <option>High</option>
                                        </select>
                                        <span id="priorityError" class="error"></span>
                                    </div>
                                    <div class="col-md-6">

                                        <label for="upload">Upload file</label>
                                        <input type="file" class="form-control form-control-sm" name="upload"
                                            id="upload" placeholder="Upload Passbook" required autocomplete="off"
                                            onchange="checkFileSize(this)">

                                        <small class="text-muted">Max file size: 5 MB</small>
                                        <span id="uploadError" class="error"></span>
                                    </div>
                                    <div class="col-md-12 text-center">
                                        <button type="submit" class="btn btn-success " name="submit"
                                            onclick="return validateForm()">Submit</button>
                                    </div>
                                </form>

                            </div>

                            <!-- Include Bootstrap JS and Popper.js -->
                            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js">
                            </script>
                            <script src="https://cdn.jsdelivr.net/npm/popper.js@2.9.4/dist/umd/popper.min.js">
                            </script>
                        </div>
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
                        if (employeeName.value === '' || employeeName.value === null || employeeName.value.trim() ===
                            '') {
                            employeeNameError.innerText = 'Employee Name is required';
                            isValid = false;
                        } else {
                            employeeNameError.innerText = '';
                        }

                        // Validate Project
                        var empProject = document.getElementsByName('emp_project')[0];
                        var empProjectError = document.getElementById('emp_projectError');
                        if (empProject.value === '' || empProject.value === null || empProject.value.trim() === '') {
                            empProjectError.innerText = 'Select Project ';
                            isValid = false;
                        } else {
                            empProjectError.innerText = '';
                        }

                        // Validate Team
                        var empTeam = document.getElementsByName('emp_team')[0];
                        var empTeamError = document.getElementById('emp_teamError');
                        if (empTeam.value === '' || empTeam.value === null || empTeam.value.trim() === '') {
                            empTeamError.innerText = 'Select Team';
                            isValid = false;
                        } else {
                            empTeamError.innerText = '';
                        }

                        // Validate Task Module
                        var taskModule = document.getElementById('TaskModule');
                        var taskModuleError = document.getElementById('taskmoduleError');
                        if (taskModule.value === '' || taskModule.value === null || taskModule.value.trim() === '') {
                            taskModuleError.innerText = 'Task Module is required';
                            isValid = false;
                        } else {
                            taskModuleError.innerText = '';
                        }

                        // Validate Task Description
                        var taskDescription = document.querySelector('textarea[name="task"]');
                        var taskError = document.getElementById('taskError');
                        if (taskDescription.value === '' || taskDescription.value === null || taskDescription.value
                            .trim() === '') {
                            taskError.innerText = 'Task Description is required';
                            isValid = false;
                        } else {
                            taskError.innerText = '';
                        }

                        // Validate Starting Date
                        var startDate = document.getElementsByName('start_date')[0];
                        var startDateError = document.getElementById('start_dateError');
                        if (startDate.value === '' || startDate.value === null) {
                            startDateError.innerText = 'Starting Date is required';
                            isValid = false;
                        } else {
                            startDateError.innerText = '';
                        }

                        // Validate Due Date
                        var dueDate = document.getElementsByName('due_date')[0];
                        var dueDateError = document.getElementById('due_dateError');
                        if (dueDate.value === '' || dueDate.value === null) {
                            dueDateError.innerText = 'Due Date is required';
                            isValid = false;
                        } else {
                            dueDateError.innerText = '';
                        }

                        // Validate Status
                        var status = document.getElementsByName('status')[0];
                        var statusError = document.getElementById('statusError');
                        if (status.value === '' || status.value === null || status.value.trim() === '') {
                            statusError.innerText = 'Status is required';
                            isValid = false;
                        } else {
                            statusError.innerText = '';
                        }

                        // Validate Priority
                        var priority = document.getElementsByName('priority')[0];
                        var priorityError = document.getElementById('priorityError');
                        if (priority.value === '' || priority.value === null || priority.value.trim() === '') {
                            priorityError.innerText = 'Priority is required';
                            isValid = false;
                        } else {
                            priorityError.innerText = '';
                        }

                        // Validate File Upload
                        var upload = document.getElementById('upload');
                        var uploadError = document.getElementById('uploadError');
                        if (upload.value === '' || upload.value === null || upload.value.trim() === '') {
                            uploadError.innerText = 'File Upload is required';
                            isValid = false;
                        } else {
                            uploadError.innerText = '';
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

                </body>

                </html>

            </div>
            <?php

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', '1');

if (isset($_POST['submit'])) {
    $emp_id = $_POST['emp_id'];
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
    if (isset($_FILES['upload']) && $_FILES['upload']['error'] === UPLOAD_ERR_OK) {
        $filename = $_FILES['upload']["name"];
        $tempname = $_FILES['upload']["tmp_name"];
        $targetDirectory = "files&img/";

        if (!file_exists($targetDirectory)) {
            mkdir($targetDirectory, 0777, true);
        }
        $targetFilePath = $targetDirectory . $filename;

        if (move_uploaded_file($tempname, $targetFilePath)) {
            // Checking for duplicate entry
            $checkDuplicateQuery = "SELECT * FROM assign_task WHERE emp_id = '$emp_id' AND fname='$fname'";
            $duplicateResult = mysqli_query($conn, $checkDuplicateQuery);

            if (mysqli_num_rows($duplicateResult) > 0) {
                echo "<script>
                Swal.fire({
                    title: 'Duplicate Entry',
                    text: 'This task assignment already exists for the selected employee.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                }).then(function() {
                    window.location.replace('assign_work');
                });
            </script>";
            } else {
                // Insert data into the database
                $sql = "INSERT INTO assign_task (emp_id, fname, emp_project, emp_team, taskmodule, task, start_date, due_date, status, priority, upload)
                        VALUES ('$emp_id', '$fname', '$emp_project', '$emp_team', '$taskmodule', '$task', '$start_date', '$due_date', '$status', '$priority', '$targetFilePath')";

                $execute = mysqli_query($conn, $sql);

                if ($execute) {
                    echo "
                        <script>
                            Swal.fire({
                                title: 'Task assigned successfully',
                                icon: 'success',
                                showConfirmButton: false,
                                timer: 2000
                            }).then(function() {
                                window.location.replace('assign_work');
                            });
                        </script>";
                } else {
                    echo "Failed to assign task: " . mysqli_error($conn);
                }
            }
        } else {
            echo "Failed to move uploaded file. Check permissions and folder structure.";
            echo "Upload error: " . $_FILES['upload']['error'];
        }
    } else {
        echo "No file uploaded or an error occurred during the upload.";
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

    <!---Creating Folder--->
    <?php

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Retrieve form data
    $emp_id = $_POST['emp_id'];
    $fname = $_POST['fname'];
    $emp_project = $_POST['emp_project'];
    $emp_team = $_POST['emp_team'];
    $taskmodule = $_POST['taskmodule'];
    $task = $_POST['task'];
    $start_date = $_POST['start_date'];
    $due_date = $_POST['due_date'];
    $status = $_POST['status'];
    $priority = $_POST['priority'];

    // Dates Format 
    $formatted_start_date = date('d-m-Y', strtotime($start_date));
    $formatted_due_date = date('d-m-Y', strtotime($due_date));

    // Main folder creation logic
    $mainFolderPath = "c:/HRM_Software/Tasks";


    if (!file_exists($mainFolderPath)) {
        mkdir($mainFolderPath, 0777, true); // Creates the main folder if it doesn't exist
    }

    // Subfolder creation for employee ID
    $employeeFolderPath = $mainFolderPath . "/Employee_$emp_id";

    if (!file_exists($employeeFolderPath)) {
        mkdir($employeeFolderPath, 0777, true); 
    }

    // File path with employee ID in the file name inside the employee's subfolder
    $filePath = $employeeFolderPath . "/task_assignment_employee_$emp_id.txt";

    // Data to be saved in the file
    $taskData = "Employee ID: $emp_id\n";
    $taskData = "Employee Name: $fname\n";
    $taskData .= "Project: $emp_project\n";
    $taskData .= "Team: $emp_team\n";
    $taskData .= "Task Module: $taskmodule\n";
    $taskData .= "Task Description: $task\n";
    $taskData .= "Start Date: $formatted_start_date\n"; // Formatted start date
    $taskData .= "Due Date: $formatted_due_date\n"; // Formatted due date
    $taskData .= "Status: $status\n";
    $taskData .= "Priority: $priority\n";
    // $filePath = $employeeFolderPath . "/task_assignment_employee_$emp_id.txt";
$taskData .= "Task data stored in '$filePath'.";

    // Save data to the file
    file_put_contents($filePath, $taskData);

    echo "Task data stored in '$filePath'.";
}
?>

</body>

</html>