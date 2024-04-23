<?php
include 'connection.php';
session_start();
$userprofile = $_SESSION['auth_user'];
if ($userprofile == true) {
} else {
  header('location:../index.php');
}
?>

<?php include "include/log_timeout.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>HRM - Employee Dashboard</title>
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

    <link rel=”stylesheet” href=”https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css”>

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
            <h1>Employee Profile</h1>

        </div><!-- End Page Title -->


        <section class="section profile">
            <div class="row">
                <div class="col-xl-4">
                <?php
                    $id = $_GET['id'];
                    $user_data = "SELECT * FROM emp_details WHERE empid='$id'";
                    $result = mysqli_query($conn, $user_data);
                    $show_data = mysqli_fetch_assoc($result);
                    $emp_fname = $show_data['fname'];
                    $emp_position = $show_data['position'];

                    $user_data1 = "SELECT * FROM bank_details WHERE empid='$id'";
                    $result1 = mysqli_query($conn, $user_data1);
                    $show_data1 = mysqli_fetch_assoc($result1);

                    
                    ?>
                    
                    <div class="card">
                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                        <img src="./../admin_dashboard/assets/profile/<?php echo $show_data['profile_pic']; ?>" alt="Profile" class="rounded-circle">
                            <h2><?php echo "$emp_fname"; ?></h2>
                            <h3><?php echo "$emp_position"; ?></h3>
                            <?php $id = $_SESSION['session_id']; ?>
                            <h6><b><i class="bi bi-broadcast text-success"></i></b> : <?php echo "$id" ?></h6>
                            <div class="social-links mt-2">
                                <a href="<?php echo $show_data['twitter']; ?>" class="twitter"><i
                                        class="bi bi-twitter"></i></a>
                                <a href="<?php echo $show_data['facebook']; ?>" class="facebook"><i
                                        class="bi bi-facebook"></i></a>
                                <a href="<?php echo $show_data['instagram']; ?>" class="instagram"><i
                                        class="bi bi-instagram"></i></a>
                                <a href="<?php echo $show_data['linkedin']; ?>" class="linkedin"><i
                                        class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div>



                    <div class="card">
    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
        <h2>Upload Document</h2>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>Document</th>
                    <th>File Name</th>
                   
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Bank Passbook</td>
                    <td>
                        <?php if (!empty($show_data1['bankpass'])) : ?>
                            <a download href="<?=$show_data1['bankpass'];?>"><?=$show_data1['bankpass'];?></a>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if (!empty($show_data1['bankpass'])) : ?>
                            <a download href="<?=$show_data1['bankpass'];?>" class="fa fa-download"></a>
                            <a href="delete_image?id=<?=$show_data1['id'];?>&type=1" class="fa fa-trash text-danger"></a>
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <td>Adhar Card</td>
                    <td>
                        <?php if (!empty($show_data['adhar_card'])) : ?>
                            <a download href="assets/adhar/<?=$show_data['adhar_card'];?>"><?=$show_data['adhar_card'];?></a>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if (!empty($show_data['adhar_card'])) : ?>
                            <a download href="assets/adhar/<?=$show_data['adhar_card'];?>" class="fa fa-download"></a>
                            <a href="delete_image?id=<?=$show_data['id'];?>&type=2" class="fa fa-trash text-danger"></a>
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <td>Pan Card</td>
                    <td>
                        <?php if (!empty($show_data['pan_card'])) : ?>
                            <a download href="assets/pan/<?=$show_data['pan_card'];?>"><?=$show_data['pan_card'];?></a>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if (!empty($show_data['pan_card'])) : ?>
                            <a download href="assets/pan/<?=$show_data['pan_card'];?>" class="fa fa-download"></a>
                            <a href="delete_image?id=<?=$show_data['id'];?>&type=3" class="fa fa-trash text-danger"></a>
                        <?php endif; ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>


                </div>


                
                <div class="col-xl-8">

                    <div class="card">
                        <div class="card-body pt-3">
                            <!-- Bordered Tabs -->
                            <ul class="nav nav-tabs nav-tabs-bordered">

                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab"
                                        data-bs-target="#profile-overview">Overview</button>
                                </li>

                                

                            </ul>
                            <div class="tab-content pt-2">

                                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                    <h5 class="card-title">About</h5>
                                    <p class="small fst-italic"><?php echo $show_data['about']; ?></p>

                                    <h5 class="card-title">Profile Details</h5>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label ">Full Name</div>
                                        <div class="col-lg-9 col-md-8"><?php echo $show_data['fname']; ?></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Employee ID</div>
                                        <div class="col-lg-9 col-md-8"><?php echo $show_data['empid']; ?></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Department</div>
                                        <div class="col-lg-9 col-md-8"><?php echo $show_data['department']; ?></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Position</div>
                                        <div class="col-lg-9 col-md-8"><?php echo $show_data['position']; ?></div>
                                    </div>


                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Joining Date</div>
                                        <div class="col-lg-9 col-md-8">
                                            <?php echo date('d-m-Y', strtotime($show_data['jdate'])); ?></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Email</div>
                                        <div class="col-lg-9 col-md-8"><?php echo $show_data['email']; ?></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Phone</div>
                                        <div class="col-lg-9 col-md-8"><?php echo $show_data['phno']; ?></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Birth Date</div>
                                        <div class="col-lg-9 col-md-8">
                                            <?php echo date('d-m-Y', strtotime($show_data['bdate'])); ?></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Address</div>
                                        <div class="col-lg-9 col-md-8"><?php echo $show_data['add']; ?></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Education</div>
                                        <div class="col-lg-9 col-md-8"><?php echo $show_data['edu']; ?></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Skills</div>
                                        <div class="col-lg-9 col-md-8"><?php echo $show_data['skills']; ?></div>
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

