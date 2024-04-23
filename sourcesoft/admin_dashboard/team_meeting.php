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
            <h1>Create Meeting</h1>

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
                                <h5 class="">Create Meeting</h5>
                                <hr>
                                <form class="row g-3" action="#" method="POST">
                                    <div class="col-md-6">
                                        <label for="inputlname" class="form-label">Meeting Organiser</label>
                                        <select id="inputrole" name="fname" class="form-control form-control-sm"
                                            required>
                                            <option selected disabled>Select Name</option>
                                            <?php

                                            $i = 1;

                                            $query_show = mysqli_query($conn, "SELECT * FROM emp_details");

                                            while ($show = mysqli_fetch_array($query_show)) {

                                            ?>
                                            <option value="<?php echo $show['fname']; ?>"><?php echo $show['fname']; ?>
                                            </option>
                                            <?php $i++;
                                            }
                                            ?>

                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="form-label">Team</label>
                                        <select class="form-control form-control-sm" name="team" 
                                            autocomplete="off">
                                            <option selected disabled>Select Team</option>
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
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputlname" class="form-label">Employee</label>
                                        <select id="inputrole" name="emp" class="form-control form-control-sm" 
                                            autocomplete="off">
                                            <option selected disabled>Select Employee</option>
                                            <?php

                                            $i = 1;

                                            $query_show = mysqli_query($conn, "SELECT * FROM emp_details");

                                            while ($show = mysqli_fetch_array($query_show)) {

                                            ?>
                                            <option value="<?php echo $show['fname']; ?>"><?php echo $show['fname']; ?>
                                            </option>
                                            <?php $i++;
                                            }
                                            ?>

                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputemail" class="form-label">Meeting Link</label>
                                        <input type="text" class="form-control form-control-sm" name="link" id=""
                                            placeholder="Add Link" required autocomplete="off">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="startDate" class="required">Date</label>
                                        <input type="date" class="form-control form-control-sm" name="date" required
                                            autocomplete="off" min="<?php echo date('Y-m-d'); ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="dueDate" class="required">Meeting Time</label>
                                        <input type="time" class="form-control form-control-sm" name="time" required
                                            autocomplete="off">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputemail" class="form-label">Message</label>
                                        <textarea class="form-control form-control-sm" name="message" id="" cols="30"
                                            rows="3" required autocomplete="off"></textarea>
                                    </div>


                                    <center>
                                        <div class="col-md-6">
                                            <button type="submit" class="btn btn-success" name="submit">Submit</button>
                                        </div>
                                    </center>
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
                                <h5 class="">Team Meetings</h5>
                                <hr>
                                <div class="table-responsive">
                                    <table class="table datatable">
                                        <thead>
                                            <tr>
                                                <th scope="col">Sr.No</th>
                                                <th scope="col">Organiser</th>
                                                <th scope="col">Team</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Meeting Time</th>
                                                <th scope="col">Link</th>
                                                <th scope="col">Message</th>
                                            </tr>
                                        </thead>
                                        <?php
                                            error_reporting(0);
                                            $fname = $show_data['fname'];
                                            $emp_name = $show_data['fname'];


                                            $query_result = mysqli_query($conn, "SELECT *, ROW_NUMBER() OVER (ORDER BY id DESC) as row_num FROM `meeting` WHERE emp = '$emp_name'");
                                            while ($result = mysqli_fetch_array($query_result)) {
                                            ?>
                                        <tr>
                                            <th scope="row"><?php echo $result['row_num']; ?></th>
                                            <td><?php echo $result['fname']; ?></td>
                                            <td><?php echo $result['team']; ?></td>
                                            <td><?php echo date('d-m-Y', strtotime($result['date'])); ?></td>
                                            <td><?php echo $result['time']; ?></td>
                                            <td><a target="_blank"
                                                    href="<?php echo $result['link']; ?>"><?php echo $result['link']; ?></a>
                                            </td>
                                            <td><?php echo $result['message']; ?></td>
                                        </tr>
                                        <?php
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

            <section class="section">
                <div class="row">
                    <div class="col-lg-12 col-md-12">

                        <div class="card">
                            <div class="card-body">
                                <h5 class="">Other Meetings</h5>
                                <hr>
                                <div class="table-responsive">
                                    <table class="table datatable">
                                        <thead>
                                            <tr>
                                                <th scope="col">Sr.No</th>
                                                <th scope="col">Organiser</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Meeting Time</th>
                                                <th scope="col">Link</th>
                                                <th scope="col">Message</th>
                                            </tr>
                                        </thead>
                                        <?php
                                            
                                            $id = $show_data['empid'];
                                            $emp_name = $show_data['fname'];


                                            $query_result = mysqli_query($conn, "SELECT *, ROW_NUMBER() OVER (ORDER BY id DESC) as row_num FROM `meeting` WHERE team = '$emp_team'");
                                            while ($result = mysqli_fetch_array($query_result)) {
                                            ?>
                                        <tr>
                                            <th scope="row"><?php echo $result['row_num']; ?></th>
                                            <td><?php echo $result['fname']; ?></td>
                                            <td><?php echo date('d-m-Y', strtotime($result['date'])); ?></td>
                                            <td><?php echo $result['time']; ?></td>
                                            <td><a target="_blank"
                                                    href="<?php echo $result['link']; ?>"><?php echo $result['link']; ?></a>
                                            </td>
                                            <td><?php echo $result['message']; ?></td>
                                        </tr>
                                        <?php
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

</body>

<?php
            error_reporting(0);
            if (isset($_POST['submit'])) {
                $fname = $_POST['fname'];
                $team = $_POST['team'];
                $emp = $_POST['emp'];
                $date = $_POST['date'];
                $time = $_POST['time'];
                $link = $_POST['link'];
                $message = $_POST['message'];

                $sql = "INSERT INTO `meeting` (`fname`, `team`, `emp`, `date`, `time`, `link`, `message`) VALUES ('$fname', '$team', '$emp', '$date', '$time', '$link', '$message')";
                $execute = mysqli_query($conn, $sql);

                if ($execute) {
                    echo "<script type='text/javascript'>
                    Swal.fire({
                        text: 'Meeting created successfully',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 2000
                    }).then(function() {
                        window.location.replace('team_meeting');
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