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


    <style>
        .error-message {
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
            <h1>Project Details</h1>

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
                    <div class="col-lg-12 col-md-12">

                        <div class="card">
                            <div class="card-body">
                                <h5 class="">Project Details</h5>
                                <hr>
                                <div class="table-responsive">
                                    <table class="table datatable">
                                        <thead>
                                            <tr>
                                                <th scope="col">Sr.No</th>
                                                <th scope="col">Project Name</th>
                                                <th scope="col"> Requirement</th>
                                                <th scope="col"> TeamSize</th>
                                                <th scope="col"> TeamMember</th>
                                                <th scope="col">Client Name</th>

                                                <th scope="col">Start Date</th>
                                                <th scope="col">Due Date</th>
                                                <th scope="col">Application Type</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <?php
                    $i = 1;

                    $query_result = mysqli_query($conn, "SELECT *, ROW_NUMBER() OVER (ORDER BY id DESC) as row_num FROM `project`");

                    while ($result = mysqli_fetch_array($query_result)) {
                    ?>
                                        <tr>
                                            <th scope="row"><?php echo $result['row_num']; ?></th>
                                            <td><?php echo $result['project']; ?></td>
                                            <td><?php echo $result['requirement']; ?></td>
                                            <td><?php echo $result['Teamsize']; ?></td>
                                            <td><?php echo $result['TeamMember']; ?></td>
                                            <td><?php echo $result['projectclient']; ?></td>


                                            <td><?php echo date('d-m-Y', strtotime($result['date'])); ?></td>
                                            <td><?php echo date('d-m-Y', strtotime($result['duedate'])); ?></td>

                                            <td><?php echo $result['app_type']; ?></td>
                                            <td><?php echo $result['status']; ?></td>

                                            <td><a class='' href='project_update?id=<?php echo $result['id']; ?>'><i
                                                        class='fa fa-edit text-warning'></i></a>
                                                <a class='' href='project_details?id=<?php echo $result['id']; ?>'><i
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

            <body>


                <div class="container">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="">Add New Project</h5>
                            <hr>
                            <form class="row g-3" action="#" method="POST" onsubmit="return validateForm()"
                                enctype="multipart/form-data">

                                <!-- Employee Information -->
                                <div class="col-md-6">
                                    <label for="project" class="required">Project Title</label>
                                    <input type="text" class="form-control form-control-sm" name="project"
                                        placeholder="Enter project title" required autocomplete="off">
                                        <span class="error-message" id="project-error"></span>
                                </div>
                                <div class="col-md-6">
                                    <label for="requirement">Requirements</label>
                                    <input type="file" class="form-control form-control-sm" name="requirement"
                                        accept=".pdf,.doc,.docx">
                                        <span class="error-message" id="requirement-error"></span>
                                </div>

                                <div class="col-md-6">
                                    <label for="TeamMember" class="required">Team Members</label>
                                    <div class="form-control">
                                        <?php
        // Display checkboxes for each team member with empid
        $employeeQuery = mysqli_query($conn, "SELECT empid, fname FROM emp_details");
while ($employee = mysqli_fetch_assoc($employeeQuery)) {
    echo "<input type='checkbox' name='TeamMember[]' value='" . $employee['empid'] . "'> " . $employee['fname'] . " (ID: " . $employee['empid'] . ")<br>";
}
        ?>
                                    </div>
                                    <span class="error-message" id="TeamMember-error"></span>
                                </div>


                                <div class="col-md-6">
                                    <label for="Teamsize" class="required">TeamSize<span
                                            class="question-icon"></span></label>
                                    <input type="number" class="form-control form-control-sm" name="Teamsize"
                                        placeholder="Enter TeamSize" required autocomplete="off">
                                        <span class="error-message" id="Teamsize-error"></span>
                                </div>

                                <div class="col-md-6">
                                    <label for="projectclient" class="required">Client Name<span
                                            class="question-icon"></span></label>
                                    <input type="text" class="form-control form-control-sm" name="projectclient"
                                        placeholder="Enter project client" required autocomplete="off">
                                        <span class="error-message" id="projectclient-error"></span>
                                </div>

                                <div class="col-md-6">
                                    <label for="date" class="required">Starting Date</label>
                                    <input type="date" class="form-control form-control-sm" name="date"
                                        value="<?php echo date('Y-m-d'); ?>" min="<?php echo date('Y-m-d'); ?>"
                                        required>
                                        <span class="error-message" id="date-error"></span>
                                </div>


                                <!-- <div class="col-md-6">
                                    <label for="date" class="required">Starting Date</label>
                                    <input type="date" class="form-control form-control-sm" name="date" required>
                                </div> -->
                                <div class="col-md-6">
                                    <label for="duedate" class="required">Due Date</label>
                                    <input type="date" class="form-control form-control-sm" name="duedate" required min="<?php echo date('Y-m-d'); ?>">
                                    <span class="error-message" id="duedate-error"></span>
                                </div>
                                <div class="col-md-6">
                                    <label for="status" class="required">Application Type</label>
                                    <select class="form-control form-control-sm" name="app_type" required>
                                        <option>Web App</option>
                                        <option>Mobile App</option>
                                        <option>Hybrid</option>
                                    </select>
                                    <span class="error-message" id="app_type-error"></span>
                                </div>
                                <div class="col-md-6">
                                    <label for="status" class="required">Status</label>
                                    <select class="form-control form-control-sm" name="status" required>
                                        <option value="Not Started">Not Started</option>
                                        <option value="started">Started</option>
                                    </select>
                                    <span class="error-message" id="status-error"></span>
                                </div>
                                <div class="col-md-12 text-center">

                                    <!-- <button type="submit" name="submit" value="submit" class="btn btn-success btn-sm" >Create</button> -->
                                    <button type="submit" class="btn btn-success" name="submit" value="submit"
                                        onclick="return validateForm()">Create</button>
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
        // Project Title
       
    var isValid = true; // Flag to track overall validation status
    

    // Project Title
    var project = document.forms[0]["project"].value;
    if (project === "") {
        document.getElementById("project-error").innerHTML = "Project title is required.";
        isValid = false;
    } else {
        document.getElementById("project-error").innerHTML = "";
    }

    // Requirements
    var requirement = document.forms[0]["requirement"].value;
    if (requirement === "") {
        document.getElementById("requirement-error").innerHTML = "Requirements are required.";
        isValid = false;
    } else {
        document.getElementById("requirement-error").innerHTML = "";
    }

    // Team Members
    var teamMembers = document.forms[0]["TeamMember[]"];
    var teamMembersChecked = false;
    for (var i = 0; i < teamMembers.length; i++) {
        if (teamMembers[i].checked) {
            teamMembersChecked = true;
            break;
        }
    }
    if (!teamMembersChecked) {
        document.getElementById("TeamMember-error").innerHTML = "At least one Team Member must be selected.";
        isValid = false;
    } else {
        document.getElementById("TeamMember-error").innerHTML = "";
    }

    // TeamSize
    var Teamsize = document.forms[0]["Teamsize"].value;
    if (Teamsize === "") {
        document.getElementById("Teamsize-error").innerHTML = "TeamSize is required.";
        isValid = false;
    } else {
        document.getElementById("Teamsize-error").innerHTML = "";
    }

    var teamMembers = document.forms[0]["TeamMember[]"];
        var teamMembersChecked = 0;

        for (var i = 0; i < teamMembers.length; i++) {
            if (teamMembers[i].checked) {
                teamMembersChecked++;
            }
        }

        var teamSize = document.forms[0]["Teamsize"].value;

        if (teamMembersChecked != teamSize) {
            document.getElementById("TeamMember-error").innerHTML = "Please select exactly " + teamSize + " Team Members.";
            isValid = false;
        } else {
            document.getElementById("TeamMember-error").innerHTML = "";
        }

    // Project Client
    var projectclient = document.forms[0]["projectclient"].value;
    var clientNameRegex = /^[a-zA-Z]+$/; // Regular expression to allow only alphabets

    if (projectclient === "") {
        document.getElementById("projectclient-error").innerHTML = "Client Name is required.";
        isValid = false;
    } else if (!clientNameRegex.test(projectclient)) {
        document.getElementById("projectclient-error").innerHTML = "Numbers are not allowed.";
        isValid = false;
    } else {
        document.getElementById("projectclient-error").innerHTML = "";
    }

    // Starting Date
    var date = document.forms[0]["date"].value;
    if (date === "") {
        document.getElementById("date-error").innerHTML = "Starting Date is required.";
        isValid = false;
    } else {
        document.getElementById("date-error").innerHTML = "";
    }

    // Due Date
    var duedate = document.forms[0]["duedate"].value;
    if (duedate === "") {
        document.getElementById("duedate-error").innerHTML = "Due Date is required.";
        isValid = false;
    } else {
        document.getElementById("duedate-error").innerHTML = "";
    }

    // Application Type
    var app_type = document.forms[0]["app_type"].value;
    if (app_type === "") {
        document.getElementById("app_type-error").innerHTML = "Application Type is required.";
        isValid = false;
    } else {
        document.getElementById("app_type-error").innerHTML = "";
    }

    // Status
    var status = document.forms[0]["status"].value;
    if (status === "") {
        document.getElementById("status-error").innerHTML = "Status is required.";
        isValid = false;
    } else {
        document.getElementById("status-error").innerHTML = "";
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

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $project = mysqli_real_escape_string($conn, $_POST['project']);
  
    $date = date('Y-m-d', strtotime($_POST['date'])); // Format start date
    $duedate = date('Y-m-d', strtotime($_POST['duedate'])); // Format due date
 
    $projectclient = mysqli_real_escape_string($conn, $_POST['projectclient']);
    $status = $_POST['status'];
    $Teamsize = $_POST['Teamsize'];
    $TeamMember = implode(", ", $_POST['TeamMember']);


    // 
    if (isset($_POST['TeamMember'])) {
        $selectedTeamMembers = $_POST['TeamMember'];
        $teamMembersInfo = [];

        foreach ($selectedTeamMembers as $selectedMember) {
            list($empid, $fname) = explode(":", $selectedMember);
            $teamMembersInfo[] = "$empid - $fname";
        }
        $teamMembersString = implode(", ", $teamMembersInfo);
    }

    $app_type = $_POST['app_type'];
  

       // File upload
    $filename = $_FILES["requirement"]["name"];
    $tempname = $_FILES["requirement"]["tmp_name"];
    $targetDirectory = "file/";
   
    
    $targetFilePath = $targetDirectory . $filename;
    
    if (!empty($filename)) {
        // Perform file upload if a file is selected
        move_uploaded_file($tempname, $targetFilePath);
    }
    $checkDuplicateQuery = "SELECT * FROM `project` WHERE `project` = '$project'";
    $duplicateResult = mysqli_query($conn, $checkDuplicateQuery);
    if (mysqli_num_rows($duplicateResult) > 0) {
        // Duplicate entry found - display a SweetAlert
        echo "<script type='text/javascript'>
                Swal.fire({
                    title: 'Duplicate Entry',
                    text: 'Project with the same name already exists. Please use a different name.',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                });
              </script>";
            } else {

    $sql = "INSERT INTO `project` (`project`, `date`, `duedate`, `Teamsize`, `TeamMember`, `projectclient`, `status`, `app_type`, `requirement`) 
    VALUES ('$project', '$date', '$duedate', '$Teamsize', '$TeamMember', '$projectclient', '$status', '$app_type', '$filename')";

        if (mysqli_query($conn, $sql)) {
            // Create a unique folder for the new project
            $project_folder_path = "c:/HRM_Software/Projects/" . str_replace(' ', '_', $project);

            if (!file_exists($project_folder_path)) {
                mkdir($project_folder_path, 0777, true);
            }

            // File path with project details inside the project's folder
            $file_path = $project_folder_path . "/project_details.txt";

            // Data to be saved in the file
            $project_data = "Project Name: $project\n";
           
            $project_data .= "Start Date: " . date('d-m-Y', strtotime($date)) . "\n"; // Format start date
            $project_data .= "Due Date: " . date('d-m-Y', strtotime($duedate)) . "\n"; // Format due date
            $project_data .= "Teamsize: $Teamsize\n";
            $project_data .= "TeamMember: $TeamMember\n";
            $project_data .= "requirement: $requirement\n";
            $project_data .= "Client Name: $projectclient\n";
            $project_data .= "Status: $status\n";
            $project_data .= "Application Type: $app_type\n";

            // Save project details in the file
            file_put_contents($file_path, $project_data);

            echo "<script type='text/javascript'>
                    Swal.fire({
                        title: 'Details added successfully',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 2000
                    }).then(function() {
                        window.location.replace('project_details');
                    });
                </script>";
        } else {
            // echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            echo "<script type='text/javascript'>
            Swal.fire({
                title: 'Error',
                text: 'Error: " . mysqli_error($conn) . "',
                icon: 'error',
                confirmButtonText: 'Ok'
            });
          </script>";
        }
    }


function showAlert($message) {
    echo "<script type='text/javascript'>
            Swal.fire({
                title: 'Validation Error',
                text: '$message',
                icon: 'error',
                confirmButtonText: 'Ok'
            });
          </script>";
}
}
?>

<!--  -->
<?php
if (!empty($_GET['id']) && isset($_GET['confirm']) && $_GET['confirm'] === 'true') {
    // Perform the deletion
    $idd = $_GET['id'];
    $query = "DELETE FROM `project` WHERE id='$idd'";
    $data = mysqli_query($conn, $query);

    if ($data) {
        echo "<script type='text/javascript'>
                Swal.fire({
                    title: 'Delete Details successfully',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 2000
                }).then(function() {
                    window.location.replace('project_details');
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
                    window.location.replace('project_details');
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
                    window.location.href = 'project_details?id=$idd&confirm=true';
                } else {
                    window.location.href = 'project_details';
                }
            });
          </script>";
}
?>
