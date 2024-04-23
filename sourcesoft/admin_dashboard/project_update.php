<?php
include("connection.php");
$idd = $_GET['id'];

$query = "SELECT * FROM project where id='$idd'";
$data = mysqli_query($conn, $query);

$result = mysqli_fetch_array($data);
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

                <body>
                    <div class="container">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="">Update Project</h5>
                                <hr>
                                <form class="row g-3" action="#" method="POST" onsubmit="return validateForm()">
                                    <!-- Employee Information -->
                                    <div class="col-md-6">
                                        <label for="project" class="required">Project Title</label>
                                        <input type="text" class="form-control form-control-sm" name="project"
                                            placeholder="Enter project title"
                                            value="<?php echo isset($result['project']) ? $result['project'] : ''; ?>"
                                            autocomplete="off">
                                        <span class="error-message" id="project-error"></span>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="requirement">Requirements</label>
                                        <input type="file" class="form-control form-control-sm" name="requirement"
                                            accept=".pdf,.doc,.docx" required
                                            value="<?php echo isset($result['requirement']) ? $result['requirement'] : ''; ?>"
                                            autocomplete="off">
                                        <span class="error-message" id="requirement-error"></span>
                                    </div>
                                    <!-- Team Members Section -->
                                    <div class="col-md-6">
                                        <label for="TeamMember" class="required">Team Members</label>
                                        <div class="form-control">
                                            <?php
        // Get the IDs of previously selected team members
        $selectedTeamMembers = isset($result['TeamMember']) ? explode(",", $result['TeamMember']) : array();

        // Fetch all team members
        $employeeQuery = mysqli_query($conn, "SELECT empid, fname FROM emp_details");
        while ($employee = mysqli_fetch_assoc($employeeQuery)) {
            $empID = $employee['empid'];
            $isChecked = in_array($empID, $selectedTeamMembers) ? 'checked' : '';

            // Check if the current employee's ID is in the selectedTeamMembers array
            echo "<input type='checkbox' name='TeamMember[]' value='" . $empID . "' " . $isChecked . "> " . $employee['fname'] . " (ID: " . $empID . ")<br>";
        }
        ?>
                                        </div>
                                        <span class="error-message" id="TeamMember-error"></span>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="Teamsize" class="required">TeamSize<span
                                                class="question-icon"></span></label>
                                        <input type="number" class="form-control form-control-sm" name="Teamsize"
                                            placeholder="Enter TeamSize" required autocomplete="off"
                                            value="<?php echo isset($result['Teamsize']) ? $result['Teamsize'] : ''; ?>">
                                        <span class="error-message" id="Teamsize-error"></span>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="projectclient" class="required">Client Name<span
                                                class="question-icon"></span></label>
                                        <input type="text" class="form-control form-control-sm" name="projectclient"
                                            placeholder="Enter project client" required
                                            value="<?php echo isset($result['projectclient']) ? $result['projectclient'] : ''; ?>"
                                            autocomplete="off">
                                        <span class="error-message" id="projectclient-error"></span>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="date" class="required">Starting Date</label>
                                        <input type="date" class="form-control form-control-sm" name="date" required
                                            value="<?php echo isset($result['project']) ? date('Y-m-d', strtotime($result['date'])) : date('Y-m-d'); ?>"
                                            min="<?php echo date('Y-m-d'); ?>">
                                        <span class="error-message" id="date-error"></span>
                                    </div>


                                    <!-- <div class="col-md-6">
                                        <label for="date" class="required">Starting Date</label>
                                        <input type="date" class="form-control form-control-sm" name="date" required
                                            value="<?php echo isset($result['project']) ? $result['date'] : ''; ?>">
                                    </div> -->
                                    <div class="col-md-6">
                                        <label for="duedate" class="required">Due Date</label>
                                        <input type="date" class="form-control form-control-sm" name="duedate" required
                                            value="<?php echo isset($result['project']) ? $result['duedate'] : ''; ?>"
                                            min="<?php echo date('Y-m-d'); ?>">
                                        <span class="error-message" id="duedate-error"></span>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="apptype" class="required">Application Type</label>
                                        <select class="form-control form-control-sm form-select" name="app_type"
                                            required autocomplete="off">
                                            <option
                                                <?php if (isset($result['app_type']) && $result['app_type'] === 'Web App') echo 'selected'; ?>>
                                                Web App</option>
                                            <option
                                                <?php if (isset($result['app_type']) && $result['app_type'] === 'Mobile App') echo 'selected'; ?>>
                                                Mobile App</option>
                                            <option
                                                <?php if (isset($result['app_type']) && $result['app_type'] === 'Hybrid') echo 'selected'; ?>>
                                                Hybrid</option>
                                        </select>
                                        <span class="error-message" id="app_type-error"></span>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="status" class="required">Status</label>
                                        <select class="form-control form-control-sm form-select" name="status" required>
                                            <option value="Not Started"
                                                <?php if (isset($result['status']) && $result['status'] === 'Not Started') echo 'selected'; ?>>
                                                Not Started </option>
                                            <option value="started"
                                                <?php if (isset($result['status']) && $result['status'] === 'Started') echo 'selected'; ?>>
                                                Started</option>
                                        </select>
                                        <span class="error-message" id="status-error"></span>
                                    </div>

                                    <div class="col-md-12 text-center">
                                        <!-- <button type="submit" class="btn btn-success btn-sm" name="update" value="update">Update</button> -->
                                        <button type="submit" class="btn btn-success " name="update" value="update"
                                            onclick="return validateForm()">Update</button>
                                    </div>
                                </form>
                            </div>


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

    // TeamSize
    var Teamsize = document.forms[0]["Teamsize"].value;
    if (Teamsize === "") {
        document.getElementById("Teamsize-error").innerHTML = "TeamSize is required.";
        isValid = false;
    } else {
        document.getElementById("Teamsize-error").innerHTML = "";
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

</html>



</div>


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
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['update'] === 'update') {
        $newProjectName = isset($_POST['project']) ? $_POST['project'] : '';

      

       
            // Proceed with the update query
            $project = isset($_POST['project']) ? $_POST['project'] : '';
           
            $date = isset($_POST['date']) ? $_POST['date'] : '';
            $duedate = isset($_POST['duedate']) ? $_POST['duedate'] : '';
            $requirement = isset($_POST['requirement']) ? $_POST['requirement'] : '';
            $Teamsize = isset($_POST['Teamsize']) ? $_POST['Teamsize'] : '';
            $TeamMember = isset($_POST['TeamMember']) ? $_POST['TeamMember'] : '';
            $TeamMember = isset($_POST['TeamMember']) ? implode(",", $_POST['TeamMember']) : ''; 
            $projectclient = isset($_POST['projectclient']) ? $_POST['projectclient'] : '';
            $status = isset($_POST['status']) ? $_POST['status'] : '';
            $app_type = isset($_POST['app_type']) ? $_POST['app_type'] : '';
                // Check for duplicate project name
        $checkDuplicateQuery = "SELECT COUNT(*) as count FROM project WHERE project = '$project' AND id != '$idd'";
        $duplicateResult = mysqli_query($conn, $checkDuplicateQuery);
        $duplicateCount = mysqli_fetch_assoc($duplicateResult)['count'];
        if ($duplicateCount > 0) {
            // Duplicate project name found
            echo "<script type='text/javascript'>
                Swal.fire({
                    text: 'Duplicate project name. Please choose a different name.',
                    icon: 'error',
                    showConfirmButton: true,
                });
            </script>";
        } else {

            $updateQuery = "UPDATE project SET 
            project='$project',
            date='$date',
            duedate='$duedate',
            Teamsize='$Teamsize',
            requirement='$requirement',
            TeamMember='$TeamMember',
            projectclient='$projectclient',
            status='$status',
            app_type='$app_type'
            WHERE id='$idd'";
        

            $data = mysqli_query($conn, $updateQuery);

            if ($data) {
                echo "<script type='text/javascript'>
                    Swal.fire({
                        text: 'Details updated successfully',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 2000
                    }).then(function() {
                        window.location.replace('project_details');
                    });
                </script>";
            }  else {
                // Handle MySQL error
                echo "MySQL Error: " . mysqli_error($conn);
            }
        }
    }
}
?>