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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

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
            <h1>My Profile</h1>

        </div><!-- End Page Title -->


        <section class="section profile">
            <div class="row">
                <div class="col-xl-4">
                    <?php
          $emp_fname = $show_data['fname'];
          $emp_position = $show_data['position'];
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

                                

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab"
                                        data-bs-target="#profile-change-password">Change Password</button>

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

                                


                                <div class="tab-pane fade pt-3" id="profile-change-password">
                                    <!-- Change Password Form -->


                                    <?php
              
                   if(isset($_POST["password"]))
                     {

                  $Id = $show_data['id'];

                  $password=$_POST['password'];
                  $new=$_POST['newpassword'];
                  $renew=$_POST['renewpassword'];
                      if($new <> $renew)
                       {
                        echo 
                        "<script type='text/javascript'>
                             Swal.fire({
                             title:'New PassWord And Confirm Password Can Not Match',
                             icon:'error',
                              showConfirmButton: false,
                                  timer:2000
                               }).then(function() {
                                 window.location.replace('emp_profile');
                                 });
                                     </script>";
                       }
                          else
                       {
                         $sql= "SELECT * From emp_details where id='$Id' and pass='$password'";
                         $result= $conn-> query($sql);
  
                          if(mysqli_num_rows($result)>0)
                         {
                         
                          $sql="UPDATE emp_details SET pass='$new' where id='$Id'";

                        if($conn->query($sql))
                          {
                         echo"
                         <script type='text/javascript'>
                             Swal.fire({
                             title:'Password Change Sucessfull',
                             icon:'success',
                              showConfirmButton: false,
                                  timer:2000
                               }).then(function() {
                                 window.location.replace('emp_profile');
                                 });
                                     </script>";
                          }
                            else
                             {
                               echo"<script type='text/javascript'>
                               Swal.fire({
                               title:'Invalid Current Password',
                               icon:'error',
                                showConfirmButton: false,
                                    timer:2000
                                 }).then(function() {
                                   window.location.replace('emp_profile');
                                   });
                                       </script>";
                                   }
                                   }
                               else
                               {
                            echo"<script type='text/javascript'>
                            Swal.fire({
                            title:'Invalid Current Password',
                            icon:'error',
                             showConfirmButton: false,
                                 timer:2000
                              }).then(function() {
                                window.location.replace('emp_profile');
                                });
                                    </script>";
                                  }


                            }
                     }

            ?>



<form action="" method="post" onsubmit="return validateFormChangePwd()">
                                    <div class="row mb-3">
                                        <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current
                                            Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="password" type="password" class="form-control"
                                                id="currentPassword" placeholder="Enter current password" required>
                                                <span class="error-message" id="currentPasswordError"></span>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New
                                            Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="newpassword" type="password" class="form-control"
                                                id="newPassword" placeholder="Enter new password" required>
                                            <i id="eyeicon" class="fa fa-eye-slash float-right"
                                                style="margin-top:-25px;margin-left:500px ; cursor:pointer"></i>
                                            <i id="openeyeicon" class="fa fa-eye float-right"
                                                style="margin-top:-25px; margin-left:500px ;  display:none;  cursor:pointer"></i> <br>
                                                <span class="error-message" id="newPasswordError"></span>
                                        </div>
                                        <script>
                                        let eyeicon = document.getElementById("eyeicon");
                                        let newPassword = document.getElementById("newPassword");
                                        let openeyeicon = document.getElementById("openeyeicon");

                                        eyeicon.onclick = function() {
                                            if (newPassword.type == "password") {
                                                newPassword.type = "text";
                                            } else {
                                                newPassword.type = "password";
                                            }
                                            eyeicon.style.display = 'none';
                                            openeyeicon.style.display = 'block';
                                        }
                                        openeyeicon.onclick = function() {
                                            if (newPassword.type == "password") {
                                                newPassword.type = "text";
                                            } else {
                                                newPassword.type = "password";
                                            }
                                            openeyeicon.style.display = 'none';
                                            eyeicon.style.display = 'block';
                                        }
                                        </script>
                                        
                                    </div>

                                    <div class="row mb-3">
                                        <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Confirm
                                            Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="renewpassword" type="password" class="form-control"
                                                id="renewPassword" placeholder="Enter confirm password" required>
                                            <i id="open" class="fa fa-eye-slash float-right"
                                                style="margin-top:-25px;margin-left:500px ; cursor:pointer"></i>
                                            <i id="close" class="fa fa-eye float-right"
                                                style="margin-top:-25px; margin-left:500px ;  display:none;  cursor:pointer"></i><br>

                                                <span class="error-message" id="renewPasswordError"></span>
                                        </div>
                                        <script>
                                        let close = document.getElementById("close");
                                        let renewPassword = document.getElementById("renewPassword");
                                        let open = document.getElementById("open");

                                        close.onclick = function() {
                                            if (renewPassword.type == "password") {
                                                renewPassword.type = "text";
                                            } else {
                                                renewPassword.type = "password";
                                            }
                                            close.style.display = 'none';
                                            open.style.display = 'block';
                                        }
                                        open.onclick = function() {
                                            if (renewPassword.type == "password") {
                                                renewPassword.type = "text";
                                            } else {
                                                renewPassword.type = "password";
                                            }
                                            open.style.display = 'none';
                                            close.style.display = 'block';
                                        }
                                        </script>

                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success" value="change"
                                            onclick="return validateFormChangePwd()">Change Password</button>

                                    </div>
                                </form><!-- End Change Password Form -->
                                </div>

                            </div><!-- End Bordered Tabs -->
                        </div>
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

    <script>
    function validateFormChangePwd() {
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

        // Current Password
        var currentPassword = document.getElementById('currentPassword').value.trim();
        if (currentPassword === '') {
            setError('currentPasswordError', 'Current Password is required.');
            isValid = false;
        }

        // New Password
        var newPassword = document.getElementById('newPassword').value.trim();
        if (newPassword === '') {
            setError('newPasswordError', 'New Password is required.');
            isValid = false;
        }

        // Confirm Password
        var renewPassword = document.getElementById('renewPassword').value.trim();
        if (renewPassword === '') {
            setError('renewPasswordError', 'Confirm Password is required.');
            isValid = false;
        } else if (newPassword !== renewPassword) {
            setError('renewPasswordError', 'Passwords do not match.');
            isValid = false;
        }

        return isValid; // Return the overall validation status
    }

    function setError(elementId, errorMessage) {
        var element = document.getElementById(elementId);
        element.innerHTML = errorMessage;
        element.style.color = 'red';
    }
</script>


</body>

