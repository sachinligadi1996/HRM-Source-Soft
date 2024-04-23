<?php
include 'connection.php';
session_start();
$userprofile = $_SESSION['login_user'];
if ($userprofile == true) {
} else {
  header('location:../index');
}
?>
<?php
include("connection.php");
// Query to get counts for each service
$sql_employee = "SELECT COUNT(*) as employee_count FROM emp_details";
$sql_project = "SELECT COUNT(*) as project_count FROM project";
$sql_task = "SELECT COUNT(*) as task_count FROM assign_task";
$sql_team = "SELECT COUNT(*) as team_count FROM team_member";
$sql_leave = "SELECT COUNT(*) as leave_count FROM user_leave WHERE status='1'";
$sql_holiday = "SELECT COUNT(*) as holiday_count FROM holiday";
$sql_online = "SELECT COUNT(*) as online_count FROM emp_details WHERE status='online'";



$result_employee = $conn->query($sql_employee);
$result_project = $conn->query($sql_project);
$result_task = $conn->query($sql_task);
$result_team = $conn->query($sql_team);
$result_leave = $conn->query($sql_leave);
$result_holiday = $conn->query($sql_holiday);
$result_online = $conn->query($sql_online);



// Fetch counts
$row_employee = $result_employee->fetch_assoc();
$row_project = $result_project->fetch_assoc();
$row_task = $result_task->fetch_assoc();
$row_team = $result_team->fetch_assoc();
$row_leave = $result_leave->fetch_assoc();
$row_holiday = $result_holiday->fetch_assoc();
$row_online = $result_online->fetch_assoc();

// Close the database connection
$conn->close();
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
            <h1>Dashboard</h1>

            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-12">
                    <!-- first row -->
                    <div class="row">

                        <!-- Employee Card -->
                        <div class="col-xxl-3 col-md-12">
                            <a href="employee_details">
                                <div class="card info-card sales-card">

                                    <div class="card-body">
                                        <br>
                                        <span h5 class="card-title"> Employees</span>|All</span>
                                        <br><br>

                                        <div class="d-flex align-items-center">
                                            <div
                                                class="card-icon rounded-circle d-flex align-items-center justify-content-center me-3">
                                                <i class="bi bi-people"></i>
                                            </div>
                                            <h3>
                                                <?php echo $row_employee['employee_count']; ?>
                                            </h3>
                                        </div>
                                    </div>

                                </div>
                            </a>
                        </div>
                        <!-- End Employee Card -->

                        <!-- project Card -->
                        <div class="col-xxl-3 col-md-12">
                            <a href="project_details">
                                <div class="card info-card sales-card">

                                    <div class="card-body">
                                        <br>
                                        <span h5 class="card-title"> Projects</span>|All</span>
                                        <br><br>

                                        <div class="d-flex align-items-center">
                                            <div
                                                class="card-icon rounded-circle d-flex align-items-center justify-content-center me-3">
                                                <i class="bi bi-terminal"></i>
                                            </div>

                                            <h3>
                                                <?php echo $row_project['project_count']; ?>
                                            </h3>
                                        </div>
                                    </div>

                                </div>
                            </a>
                        </div>


                        <!-- End project Card -->

                        <!-- task Card -->
                        <div class="col-xxl-3 col-md-12">
                            <div class="card info-card sales-card">
                                <a href="task_details">
                                    <div class="card-body">
                                        <br>
                                        <span h5 class="card-title"> Task Details</span>|All</span>
                                        <br><br>

                                        <div class="d-flex align-items-center">
                                            <div
                                                class="card-icon rounded-circle d-flex align-items-center justify-content-center me-3">
                                                <i class="bi bi-file-earmark-easel"></i>
                                            </div>

                                            <h3>
                                                <?php echo $row_task['task_count']; ?>
                                            </h3>
                                        </div>
                                    </div>

                            </div>
                            </a>
                        </div>
                        <!-- End task Card -->
                        <!-- Employee Card -->
                        <div class="col-xxl-3 col-md-12">
                            <a href="team_members">
                                <div class="card info-card sales-card">

                                    <div class="card-body">
                                        <br>
                                        <span h5 class="card-title"> Teams</span>|All</span>
                                        <br><br>

                                        <div class="d-flex align-items-center">
                                            <div
                                                class="card-icon rounded-circle d-flex align-items-center justify-content-center me-3">
                                                <i class="bi bi-diagram-3"></i>
                                            </div>

                                            <h3>
                                                <?php echo $row_team['team_count']; ?>
                                            </h3>
                                        </div>
                                    </div>

                                </div>
                            </a>
                        </div>
                        <!-- End Employee Card -->


                    </div>
                </div>
            </div>
            <!-- end first row -->


            <!-- second row -->
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">

                        <!-- End project Card -->
                        <div class="col-lg-12">
                            <div class="row">

                                <!-- Employee Card -->
                                <div class="col-xxl-3 col-md-12">
                                    <a href="leave_details">
                                        <div class="card info-card sales-card">

                                            <div class="card-body">
                                                <br>
                                                <span h5 class="card-title"> Leave Request</span>|All</span>
                                                <br><br>

                                                <div class="d-flex align-items-center">
                                                    <div
                                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center me-3">
                                                        <i class="bi bi-clipboard-check"></i>
                                                    </div>

                                                    <h3>
                                                        <?php echo $row_leave['leave_count']; ?>
                                                    </h3>
                                                </div>
                                            </div>

                                        </div>
                                    </a>
                                </div>
                                <!-- End Employee Card -->
                                <!-- project Card -->
                                <div class="col-xxl-3 col-md-12">
                                    <a href="login_details">
                                        <div class="card info-card sales-card">

                                            <div class="card-body">
                                                <br>
                                                <span h5 class="card-title"> Online Users</span>|All</span>
                                                <br><br>

                                                <div class="d-flex align-items-center">
                                                    <div
                                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center me-3">
                                                        <i class="bi bi-broadcast"></i>
                                                    </div>

                                                    <h3>
                                                        <?php echo $row_online['online_count']; ?>
                                                    </h3>
                                                </div>
                                            </div>

                                        </div>
                                    </a>
                                </div>

                                <!-- start timesheet -->
                                <div class="col-xxl-3 col-md-12">
                                    <a href="holidays">
                                        <div class="card info-card sales-card">

                                            <div class="card-body">
                                                <br>
                                                <span h5 class="card-title"> Holidays</span>|All</span>
                                                <br><br>

                                                <div class="d-flex align-items-center">
                                                    <div
                                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center me-3">
                                                        <i class="bi bi-tsunami"></i>
                                                    </div>
                                                    <h3>
                                                        <?php echo $row_holiday['holiday_count']; ?>
                                                    </h3>

                                                </div>
                                            </div>

                                        </div>
                                    </a>
                                </div>
                                <!-- Revenue Card -->
                                <!-- <div class="col-xxl-3 col-md-6">
                                    <div class="card info-card revenue-card">

                                        <div class="filter">
                                            <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                                    class="bi bi-three-dots"></i></a>
                                        </div>

                                        <div class="card-body">
                                            <h5 class="card-title">Revenue <span>| This Month</span></h5>

                                            <div class="d-flex align-items-center">
                                                <div
                                                    class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                    <i class="bi bi-currency-dollar"></i>
                                                </div>
                                                <div class="ps-3">
                                                    <h6>$3,264</h6>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div> -->
                                <!-- End Revenue Card -->

                                <!-- End timesheet Card -->


                            </div>
                        </div>
                    </div>
                    <!-- end second row -->

                    <!-- third row -->
                    <div class="row">

                        <!-- Left side columns -->

                        <!-- End project Card -->
                    </div>
                </div>
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

</html>