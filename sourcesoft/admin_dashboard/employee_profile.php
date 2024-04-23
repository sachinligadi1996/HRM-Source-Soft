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

    <title>HRM - Admin Dashboard</title>
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
    <script>
    function validateFormChangePwd() {

        const password = document.querySelector('input[name="password"]').value;
        const newpassword = document.querySelector('input[name="newpassword"]').value;
        const renewpassword = document.querySelector('input[name="renewpassword"]').value;
        // Check if required fields are empty
        if (!password || !newpassword || !renewpassword) {
            showAlert('Please fill in all required fields.');
            return false;
        }

        return true;

    }

    function validateForm() {

        const employeeName = document.querySelector('input[name="fname"]').value;
        const about = document.querySelector('textarea[name="about"]').value;
        const job = document.querySelector('input[name="position"]').value;
        const department = document.querySelector('input[name="department"]').value;
        const address = document.querySelector('input[name="address"]').value;
        const phone = document.querySelector('input[name="phone"]').value;
        const email = document.querySelector('input[name="email"]').value;
        const twitter = document.querySelector('input[name="twitter"]').value;
        const facebook = document.querySelector('input[name="facebook"]').value;
        const instagram = document.querySelector('input[name="instagram"]').value;
        const linkedin = document.querySelector('input[name="linkedin"]').value;



        // Check if required fields are empty
        if (!employeeName || !about || !job || !department || !address || !phone || !email || !twitter || !facebook || !
            instagram || !linkedin) {
            showAlert('Please fill in all required fields.');
            return false;
        }

        return true; // Allow form submission if validation passes
    }

    function showAlert(message) {
        Swal.fire({
            title: 'Validation Error',
            text: message,
            icon: 'error',
            confirmButtonText: 'Ok'
        });
    }
    </script>

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
                            
                            <img src="assets/profile/<?php echo $show_data['profile_pic']; ?>" alt="Profile"
                                class="rounded-circle">
                            <h2><?php echo "$emp_fname"; ?></h2>
                            <h3><?php echo "$emp_position"; ?></h3>
                            <h6><b><i class="bi bi-broadcast text-success"></i></b> :
                                <?php echo $show_data['status']; ?></h6>
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
                    <th>Action</th>
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
                            <a href="delectDocument?id=<?=$show_data1['id'];?>&type=1" class="fa fa-trash text-danger"></a>
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
                            <a href="delectDocument?id=<?=$show_data['id'];?>&type=2" class="fa fa-trash text-danger"></a>
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
                            <a href="delectDocument?id=<?=$show_data['id'];?>&type=3" class="fa fa-trash text-danger"></a>
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

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab"
                                        data-bs-target="#profile-dpr">DPR</button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link " data-bs-toggle="tab" data-bs-target="#Task-Details">Task
                                        Details</button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab"
                                        data-bs-target="#Project-Details">Projects</button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-team">Team
                                        Details</button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-leave">Leave
                                        Details</button>
                                </li>
                                <li class="nav-item">
                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab"
                                        data-bs-target="#profile-attendance">Attendance</button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab"
                                        data-bs-target="#profile-timesheet">Timesheet</button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#Bank-Details">Bank
                                        Details</button>
                                </li>

                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit
                                    Profile</button>
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

                                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">


<form method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">

    <!-- Profile Edit Form -->
    <div class="row mb-3">
        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile
            Image</label>
        <div class="col-md-8 col-lg-9">
            <img src="./assets/profile/<?php echo $show_data['profile_pic']; ?>"
                alt="Profile">
            <div class="pt-2">
                <div class="form-group">
                    <input class="form-control" type="file" name="uploadfileProfile"
                        value="" />
                        <span class="error-message" id="profileError"></span>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-3">
    <label for="aadharCard" class="col-md-4 col-lg-3 col-form-label">Aadhar Card</label>
    <div class="col-md-8 col-lg-9">
        <img src="./assets/adhar/<?php echo $show_data['adhar_card']; ?>" alt="Aadhar card">
        <div class="pt-2">
            <div class="form-group">
                <input class="form-control" type="file" name="uploadfileAdhar" accept=".jpg, .jpeg, .pdf" onchange="checkFileSize(this)">
                <small class="text-muted">Max file size: 5 MB</small>
                <span class="error-message" id="adharError"></span>
            </div>
        </div>
    </div>
</div>

<div class="row mb-3">
    <label for="panCard" class="col-md-4 col-lg-3 col-form-label">PAN Card</label>
    <div class="col-md-8 col-lg-9">
        <img src="./assets/pan/<?php echo $show_data['pan_card']; ?>" alt="Pancard">
        <div class="pt-2">
            <div class="form-group">
                <input class="form-control" type="file" name="uploadfilePan" accept=".jpg, .jpeg, .pdf" onchange="checkFileSize(this)">
                <small class="text-muted">Max file size: 5 MB</small>
                <span class="error-message" id="panError"></span>
            </div>
        </div>
    </div>
</div>

<script>
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


    <div class="row mb-3">
        <label for="fname" class="col-md-4 col-lg-3 col-form-label">Full
            Name</label>
        <div class="col-md-8 col-lg-9">
            <input name="fname" type="text" class="form-control" id="fname"
                value="<?php echo $show_data['fname']; ?>" required
                Autocomplete="off">
                <span class="error-message" id="fnameError"></span>
        </div>
    </div>

    <div class="row mb-3">
        <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
        <div class="col-md-8 col-lg-9">
            <textarea name="about" class="form-control" id="about"
                style="height: 100px" required
                Autocomplete="off"><?php echo $show_data['about']; ?></textarea>
                <span class="error-message" id="aboutError"></span>
        </div>
    </div>

    <div class="row mb-3">
        <label for="Job" class="col-md-4 col-lg-3 col-form-label">Job</label>
        <div class="col-md-8 col-lg-9">
            <input name="position" type="text" class="form-control" id="position"
                value="<?php echo $show_data['position']; ?>" required
                Autocomplete="off">
                <span class="error-message" id="positionError"></span>
        </div>
    </div>

    <div class="row mb-3">
        <label for="Country"
            class="col-md-4 col-lg-3 col-form-label">Department</label>
        <div class="col-md-8 col-lg-9">
            <input name="department" type="text" class="form-control"
                id="Department" value="<?php echo $show_data['department']; ?>"
                required Autocomplete="off">
                <span class="error-message" id="DepartmentError"></span>
        </div>
    </div>

    <div class="row mb-3">
        <label for="Address"
            class="col-md-4 col-lg-3 col-form-label">Address</label>
        <div class="col-md-8 col-lg-9">
            <input name="address" type="text" class="form-control" id="Address"
                value="<?php echo $show_data['add']; ?>" required
                Autocomplete="off">
                <span class="error-message" id="AddressError"></span>
        </div>
    </div>

    <div class="row mb-3">
        <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
        <div class="col-md-8 col-lg-9">
            <input name="phone" type="text" class="form-control" id="Phone"
                value="<?php echo $show_data['phno']; ?>" required
                Autocomplete="off">
                <span class="error-message" id="PhoneError"></span>
        </div>
    </div>

    <div class="row mb-3">
        <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
        <div class="col-md-8 col-lg-9">
            <input name="email" type="email" class="form-control" id="Email"
                value="<?php echo $show_data['email']; ?>" required
                Autocomplete="off">
                <span class="error-message" id="EmailError"></span>
        </div>
    </div>

    <div class="row mb-3">
        <label for="Twitter" class="col-md-4 col-lg-3 col-form-label">Twitter
            Profile</label>
        <div class="col-md-8 col-lg-9">
            <input name="twitter" type="text" class="form-control" id="Twitter"
                value="<?php echo $show_data['twitter']; ?>" required
                Autocomplete="off">
                <span class="error-message" id="TwitterError"></span>
        </div>
    </div>

    <div class="row mb-3">
        <label for="Facebook" class="col-md-4 col-lg-3 col-form-label">Facebook
            Profile</label>
        <div class="col-md-8 col-lg-9">
            <input name="facebook" type="text" class="form-control" id="Facebook"
                value="<?php echo $show_data['facebook']; ?>" required
                Autocomplete="off">
                <span class="error-message" id="FacebookError"></span>
        </div>
    </div>

    <div class="row mb-3">
        <label for="Instagram" class="col-md-4 col-lg-3 col-form-label">Instagram
            Profile</label>
        <div class="col-md-8 col-lg-9">
            <input name="instagram" type="text" class="form-control" id="Instagram"
                value="<?php echo $show_data['instagram']; ?>" required
                Autocomplete="off">
                <span class="error-message" id="InstagramError"></span>
        </div>
    </div>

    <div class="row mb-3">
        <label for="Linkedin" class="col-md-4 col-lg-3 col-form-label">Linkedin
            Profile</label>
        <div class="col-md-8 col-lg-9">
            <input name="linkedin" type="text" class="form-control" id="Linkedin"
                value="<?php echo $show_data['linkedin']; ?>" required
                Autocomplete="off">
                <span class="error-message" id="LinkedinError"></span>
        </div>
    </div>

    <div class="text-center">
        <button type="submit" name="submit" class="btn btn-success"
            onclick="return validateForm()">Save Changes</button>
    </div>
</form><!-- End Profile Edit Form -->
</div>



                                


                                
                                <!-- -----------Task Details Start-------------- -->
                                <div class="tab-pane fade pt-3" id="Task-Details">
                                    <h5 class="">Task Details</h5>
                                    <hr>
                                    <div class="table-responsive">
                                        <table class="table datatable">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Sr.No</th>
                                                    <th scope="col">Project Title</th>
                                                    <th scope="col">Team</th>
                                                    <th scope="col">Task Module</th>
                                                    <th scope="col">Task Description</th>
                                                    <th scope="col">Start Date</th>
                                                    <th scope="col">Due Date</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Priority</th>

                                                </tr>
                                            </thead>
                                            <?php
                                        $fname = $show_data['fname'];

                                        $query_data = mysqli_query($conn, "SELECT *, ROW_NUMBER() OVER (ORDER BY id DESC) as row_num FROM `assign_task` WHERE fname = '$fname'");
                                        while ($result = mysqli_fetch_array($query_data)) {

                                        ?>
                                            <tr>
                                                <th scope="row"><?php echo $result['row_num']; ?></th>
                                                <td><?php echo $result['emp_project']; ?></td>
                                                <td><?php echo $result['emp_team']; ?></td>
                                                <td><?php echo $result['taskmodule']; ?></td>
                                                <td><?php echo $result['task']; ?></td>
                                                <td><?php echo date('d-m-Y', strtotime($result['start_date'])); ?></td>
                                                <td><?php echo date('d-m-Y', strtotime($result['due_date'])); ?></td>
                                                <td><?php echo $result['status']; ?></td>
                                                <td><?php echo $result['priority']; ?></td>

                                            </tr>
                                            <?php
                                        }
                                        ?>

                                        </table>
                                        <!-- End Table with stripped rows -->

                                    </div>
                                </div>
                                <!-- -----------Task Details-end -------------- -->
                                <!-- -----------Project Details-Start -------------- -->
                                <div class="tab-pane fade pt-3" id="Project-Details">
                                    <h5 class="">Project Details</h5>
                                    <hr>
                                    <div class="table-responsive">
                                        <table class="table datatable">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Sr.No</th>
                                                    <th scope="col">Project Name</th>
                                                    <th scope="col">Client Name</th>
                                                    <th scope="col">Budget</th>
                                                    <th scope="col">Requirements</th>
                                                    <th scope="col">Start Date</th>
                                                    <th scope="col">Due Date</th>
                                                    <th scope="col">Application Type</th>
                                                    <th scope="col">Status</th>
                                                </tr>
                                            </thead>
                                            <?php
                                        $fname = $show_data['fname'];

                                        $query_data = mysqli_query($conn, "SELECT *, ROW_NUMBER() OVER (ORDER BY id DESC) as row_num FROM `assign_task` WHERE fname = '$fname'");
                                        while ($data = mysqli_fetch_array($query_data)) {
                                            $emp_project = $data['emp_project'];

                                            $query_result = mysqli_query($conn, "SELECT *, ROW_NUMBER() OVER (ORDER BY id DESC) as row_num FROM `project` WHERE project = '$emp_project'");
                                            while ($result = mysqli_fetch_array($query_result)) {
                                        ?>
                                            <tr>
                                                <th scope="row"><?php echo $data['row_num']; ?></th>
                                                <td><?php echo $result['project']; ?></td>
                                                <td><?php echo $result['projectclient']; ?></td>
                                                <td><?php echo $result['budget']; ?></td>
                                                <td><?php echo $result['description']; ?></td>
                                                <td><?php echo date('d-m-Y', strtotime($result['date'])); ?></td>
                                                <td><?php echo date('d-m-Y', strtotime($result['duedate'])); ?></td>
                                                <td><?php echo $result['app_type']; ?></td>
                                                <td><?php echo $result['status']; ?></td>
                                            </tr>
                                            <?php
                                            }
                                        }
                                        ?>

                                        </table>
                                        <!-- End Table with stripped rows -->

                                    </div>

                                </div>
                                <!-- -----------Project Details-end -------------- -->

                                <!-- -----------------Bank Details Start--------------- -->
                                <div class="tab-pane fade pt-3" id="Bank-Details">

                                    <h5 class="mt-2">Bank Details</h5>
                                    <hr>
                                    <div class="table-responsive">
                                        <table class="table datatable">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Sr.No</th>
                                                    <th scope="col">EmpID</th>
                                                    <th scope="col">Employee Name</th>
                                                    <th scope="col">Account Number</th>
                                                    <th scope="col">Bank Name</th>
                                                    <th scope="col">Branch Name</th>
                                                    <th scope="col">IFSC Code</th>

                                                    <!-- <th scope="col">Action</th> -->
                                                </tr>
                                            </thead>
                                            <?php
                                        $id = $show_data['empid'];

                                        $query_data = mysqli_query($conn, "SELECT *, ROW_NUMBER() OVER (ORDER BY id DESC) as row_num FROM `bank_details` WHERE empid = '$id'");
                                        while ($result = mysqli_fetch_array($query_data)) {

                                        ?>
                                            <tr>
                                                <th scope="row"><?php echo $result['row_num']; ?></th>
                                                <td><?php echo $result['empid']; ?></td>
                                                <td><?php echo $result['employeeName']; ?></td>
                                                <td><?php echo $result['accountNumber']; ?></td>
                                                <td><?php echo $result['bankName']; ?></td>
                                                <td><?php echo $result['branchName']; ?></td>
                                                <td><?php echo $result['ifscCode']; ?></td>

                                            </tr>
                                            <?php
                                        }
                                    
                                        ?>


                                        </table>
                                        <!-- End Table with stripped rows -->

                                    </div>
                                </div>
                                <!-- -----------------Bank Details end--------------- -->

                                <div class="tab-pane fade pt-3" id="profile-attendance">
                                    <?php
 $id = $show_data['empid'];

 if(isset($_POST['filter'])){
   $from=$_POST['from'];
   $to=$_POST['to'];

   

  $query_data = mysqli_query($conn, "SELECT *, ROW_NUMBER() OVER (ORDER BY id DESC) as row_num FROM `attendance` WHERE emp_id = '$id' AND  `date` BETWEEN '$from' and '$to'  ");
 
  
 }
?>

                                    <h5 class="mt-2">attendance Details</h5>
                                    </br>
                                    <div>
                                        <form action="#" method="post" class="row g-3">

                                            <div class="col-md-4">
                                                <label for="from">From:</label>
                                                <input type="date" id="from" name="from" value="<?php echo $from ?>"
                                                    required class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="to">to:</label>
                                                <input type="date" id="to" name="to" value="<?php echo $to ?>"
                                                    class="form-control" required>
                                            </div>
                                            <div class="col-md-4 p-4">
                                                <button type="submit" class="btn btn-primary"
                                                    onclick="window.location.href='#profile-attendance'"
                                                    name="filter">Filter</button>
                                            </div>
                                        </form>

                                    </div>
                                    <hr>

                                    <div class="table-responsive">
                                        <table class="table datatable">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Sr No</th>
                                                    <th scope="col">Date</th>
                                                    <th scope="col">Check In</th>
                                                    <th scope="col">Check Out</th>
                                                    <th scope="col">Status</th>

                                                </tr>
                                            </thead>
                                            <?php
     
   
     while ($result = mysqli_fetch_array($query_data)) {

    ?>
                                            <tr>
                                                <th scope="row">
                                                    <?php echo $result['row_num']; ?>
                                                </th>
                                                <td>
                                                    <?php echo date('d-m-Y', strtotime($result['date'])); ?>
                                                </td>
                                                <td>
                                                    <?php echo $result['checkin']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $result['checkout']; ?>
                                                </td>
                                                <td class="mt-1">
                                                    <?php
                                        if ($result['status'] == "1") {
                                        ?>
                                                    <p><span class="text-success"> <b>Present</b></span></p>
                                                    <?php
                                        } else {
                                        ?>

                                                    <p><span class="text-danger"> <b>Absent</b></span></p>
                                                    <?php
                                        }
                                        ?>
                                                </td>

                                            </tr>
                                            <?php
        
       
    }

    ?>
                                        </table>
                                        <!-- End Table with stripped rows -->

                                    </div>

                                </div>
                                <div class="tab-pane fade pt-3" id="profile-dpr">

                                    <h5 class="mt-2">Daily Project Report Details</h5>
                                    <hr>
                                    <div class="table-responsive">
                                        <table class="table datatable">
                                            <thead>
                                                <tr>
                                                    <th scope="col">S.No.</th>
                                                    <th scope="col">Date</th>
                                                    <th scope="col">Employee ID</th>
                                                    <th scope="col">Project Name</th>
                                                    <th scope="col">Work Mode</th>
                                                    <th scope="col">Work Out</th>
                                                    <th scope="col">Status</th>

                                                </tr>
                                            </thead>
                                            <?php
     $id = $show_data['empid'];

     $query_data = mysqli_query($conn, "SELECT *, ROW_NUMBER() OVER (ORDER BY id DESC) as row_num FROM `dpr` WHERE empid = '$id'");
     while ($result = mysqli_fetch_array($query_data)) {

    ?>
                                            <tr>
                                                <th scope="row"><?php echo $result['row_num']; ?></th>
                                                <td><?php echo $result['date']; ?></td>
                                                <td><?php echo $result['empid']; ?></td>

                                                <td><?php echo $result['pname']; ?></td>
                                                <td><?php echo $result['workmode']; ?></td>
                                                <td><?php echo $result['wout']; ?></td>
                                                <td><?php echo $result['status']; ?></td>

                                            </tr>
                                            <?php
    }

    ?>


                                        </table>
                                        <!-- End Table with stripped rows -->

                                    </div>
                                </div>
                                <div class="tab-pane fade profile-team pt-3" id="profile-team">
                                    <h5 class="">Team Details</h5>
                                    <hr>
                                    <div class="table-responsive">
                                        <table class="table datatable">
                                            <thead>
                                                <tr>
                                                    <th scope="col">S.No.</th>
                                                    <th scope="col">Team Name</th>
                                                    <th scope="col">Team Lead</th>
                                                    <th scope="col">Team Member-1</th>
                                                    <th scope="col">Team Member-2</th>
                                                    <th scope="col">Team Member-3</th>
                                                    <th scope="col">Team Member-4</th>
                                                    <th scope="col">Team Member-5</th>
                                                    <th scope="col">Team Member-6</th>
                                                    <th scope="col">Team Member-7</th>
                                                    <th scope="col">Team Member-8</th>
                                                    <th scope="col">Team Member-9</th>
                                                    <th scope="col">Team Member-10</th>
                                                </tr>
                                            </thead>
                                            <?php
                                        $fname = $show_data['fname'];

                                        $query_data = mysqli_query($conn, "SELECT *, ROW_NUMBER() OVER (ORDER BY id DESC) as row_num FROM `assign_task` WHERE fname = '$fname'");
                                        while ($data = mysqli_fetch_array($query_data)) {
                                            $emp_team = $data['emp_team'];

                                            $query_result = mysqli_query($conn, "SELECT *, ROW_NUMBER() OVER (ORDER BY id DESC) as row_num FROM `team_member` WHERE team_name = '$emp_team'");
                                            while ($result = mysqli_fetch_array($query_result)) {
                                        ?>
                                            <tr>
                                                <th scope="row"><?php echo $data['row_num']; ?></th>
                                                <td><?php echo $result['team_name']; ?></td>
                                                <td><?php echo $result['team_lead']; ?></td>
                                                <td><?php echo $result['tmember_1']; ?></td>
                                                <td><?php echo $result['tmember_2']; ?></td>
                                                <td><?php echo $result['tmember_3']; ?></td>
                                                <td><?php echo $result['tmember_4']; ?></td>
                                                <td><?php echo $result['tmember_5']; ?></td>
                                                <td><?php echo $result['tmember_6']; ?></td>
                                                <td><?php echo $result['tmember_7']; ?></td>
                                                <td><?php echo $result['tmember_8']; ?></td>
                                                <td><?php echo $result['tmember_9']; ?></td>
                                                <td><?php echo $result['tmember_10']; ?></td>
                                            </tr>
                                            <?php
                                            }
                                        }
                                        ?>

                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade profile-team pt-3" id="profile-timesheet">
                                    <h5 class="">Timesheet</h5>

                                    <hr>
                                    <?php
$fname = $show_data['fname'];
$query = "SELECT *, ROW_NUMBER() OVER (ORDER BY id DESC) as row_num FROM `emp_details` WHERE fname = '$fname'"; 
$data = mysqli_query($conn, $query);
$total = mysqli_num_rows($data);
if ($total != 0) {
?>

                                    <!-- Table with stripped rows -->
                                    <div class="table-responsive">
                                        <table class="table datatable">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Employee ID</th>
                                                    <th scope="col">Employee Name</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
            $i = 1;
            $status = "Online";
            $currentDate = date("Y-m-d");

            $query_show = mysqli_query($conn, "SELECT *, ROW_NUMBER() OVER (ORDER BY id DESC) as row_num FROM `emp_details` WHERE fname = '$fname'");

            while ($show = mysqli_fetch_array($query_show)) {
            ?>
                                                <tr>
                                                    <th scope="row"><?php echo $show['row_num']; ?></th>
                                                    <td><?php echo $show['empid']; ?></td>
                                                    <td><?php echo $show['fname']; ?></td>
                                                    <td><a class='btn btn-primary btn-sm'
                                                            href="log_monitor?id=<?php echo $show['empid']; ?>">View
                                                            Timesheet</a></td>
                                                </tr>
                                                <?php $i++;
            }
        }
            ?>
                                            </tbody>
                                        </table>
                                        <!-- End Table with stripped rows -->
                                    </div>

                                </div>
                                <div class="tab-pane fade profile-leave pt-3" id="profile-leave">

                                    <?php
$fname = $show_data['fname'];
$query = "SELECT *, ROW_NUMBER() OVER (ORDER BY id DESC) as row_num FROM `user_leave` WHERE fname = '$fname'";
$data = mysqli_query($conn, $query);
 $total = mysqli_num_rows($data);

{
?>

                                    <h5 class="">Leave Requests</h5>
                                    <hr>

                                    <!-- Table with stripped rows -->
                                    <table class="table datatable">
                                        <thead>
                                            <tr class="">
                                                <th scope="col">Sr.No</th>
                                                <th scope="col">Employee Name</th>
                                                <th scope="col">Leave Type</th>
                                                <th scope="col">Start Date</th>
                                                <th scope="col">End Date</th>
                                                <th scope="col">Reason</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <?php
                      while ($result = mysqli_fetch_assoc($data)) {
                      ?>
                                        <tr>
                                            <td><?php echo $result['row_num']; ?></td>
                                            <td><?php echo $result['fname']; ?></td>
                                            <td><?php echo $result['leavet']; ?></td>
                                            <td><?php echo date('d-m-Y', strtotime($result['sdate'])); ?></td>
                                            <td><?php echo date('d-m-Y', strtotime($result['edate'])); ?></td>

                                            <td><?php echo $result['reason']; ?></td>
                                            <td><?php
                              if ($result['status'] == 1) {
                                echo '<p><a href=""><i class="bi bi-check2-circle text-success px-1">Approved</i></a></p>';
                              } else {
                                echo '<p><a href="leave_status?id=' . $result['id'] . '&status=1"><i class="bi bi-check2-circle text-warning px-1">Mark as Approved</i></a></p>';
                              }
                              if ($result['status'] == 2) {
                                echo '<p><a href=""><i class="bi bi-check2-circle text-danger px-1">Rejected</i></a></p>';
                              } else {
                                echo '<p><a href="leave_status?id=' . $result['id'] . '&status=2"><i class="bi bi-check2-circle text-warning px-1">Mark as Rejected</i></a></p>';
                              }
                              ?></td>
                                        </tr>
                                        <?php

                      }
                    } 
                    ?>

                                    </table>
                                    <!-- End Table with stripped rows -->

                                </div>
                            </div>

                        </div>
                    </div>

        </section>
        </div>

        <!-- -----------------dpr Details start--------------- -->
        <!----------------------timesheet start--------------------->
        <div class="tab-pane fade profile-team pt-3" id="profile-timesheet">

            <h5 class="">Timesheet</h5>

            <hr>

            <!-- Table with stripped rows -->
            <div class="table-responsive">
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Employee ID</th>
                            <th scope="col">Employee Name</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                                            $i = 1;
                                            $status = "Online";
                                            $currentDate = date("Y-m-d");

                                            
                                            $fname = $show_data['fname'];
    
                                            $query_data = mysqli_query($conn, "SELECT *, ROW_NUMBER() OVER (ORDER BY id DESC) as row_num FROM `emp_details` WHERE fname = '$fname'");
                                            while ($result = mysqli_fetch_array($query_data)) {
    
                                            ?>

                        <tr>
                            <th scope="row"><?php echo $show['row_num']; ?></th>
                            <td><?php echo $show['empid']; ?></td>
                            <td><?php echo $show['fname']; ?></td>
                            <td><a class='btn btn-primary btn-sm'
                                    href="log_monitor?id=<?php echo $show['empid']; ?>">View Timesheet</a></td>
                        </tr>
                        <?php $i++;
                                            }
                                            ?>
                    </tbody>
                </table>
                <!-- End Table with stripped rows -->
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
<?php
error_reporting(0);
 
$msg = "";

// ----
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get employee ID and other form data
    $Id = $show_data['empid'];
    // $empname = $_POST['fname']; // Or use any other unique identifier for employee folder


    // Base directory for employee registration documents on C: drive
    $upload_dir = "C:/HRM_Software/EmployeeRegistration/";

    // Create employee registration folder if it doesn't exist
    $employee_folder = $upload_dir . $Id . "/";
    if (!file_exists($employee_folder)) {
        mkdir($employee_folder, 0777, true);
    }

    // // Handle profile picture upload
    if (isset($_FILES['uploadfileProfile']) && $_FILES['uploadfileProfile']['error'] === UPLOAD_ERR_OK) {
        $profileFilename = "profile_pic.jpg";
        $profilePath = $employee_folder . $profileFilename;
        if (move_uploaded_file($_FILES['uploadfileProfile']['tmp_name'], $profilePath)) {
            // Profile picture uploaded successfully
        } else {
            echo "Failed to upload profile picture!";
        }
    }

    // // Handle Aadhar card upload
    if (isset($_FILES['uploadfileAdhar']) && $_FILES['uploadfileAdhar']['error'] === UPLOAD_ERR_OK) {
        $adharFilename = "adhar_card.pdf";
        $adharPath = $employee_folder . $adharFilename;
        if (move_uploaded_file($_FILES['uploadfileAdhar']['tmp_name'], $adharPath)) {
            // Aadhar card uploaded successfully
        } else {
            echo "Failed to upload Aadhar card!";
        }
    }

    // // Handle PAN card upload
    if (isset($_FILES['uploadfilePan']) && $_FILES['uploadfilePan']['error'] === UPLOAD_ERR_OK) {
        $panFilename = "pan_card.pdf";
        $panPath = $employee_folder . $panFilename;
        if (move_uploaded_file($_FILES['uploadfilePan']['tmp_name'], $panPath)) {
            // PAN card uploaded successfully
        } else {
            echo "Failed to upload PAN card!";
        }
    }

    // Handle other form submissions and database updates
    // Example: Update employee details in the database
    // ...

    // Redirect to the desired URL after successful upload
    // header('Location: [url]');
    // exit();
}


// If upload button is clicked ...
if (isset($_POST['uploadProfile'])) {

  
  $Id = $show_data['id'];

	$filename = $_FILES["uploadfileProfile"]["name"];
	$tempname = $_FILES["uploadfileProfile"]["tmp_name"];
    
  
	$folder = "assets/profile/" . $filename;

	// Get all the submitted data from the form
	$sql = "UPDATE  `emp_details` SET `profile_pic` = '$filename'
  WHERE  id = '$Id'"; 

  // Execute query
	mysqli_query($conn, $sql);

	// Now let's move the uploaded image into the folder: image
	if (move_uploaded_file($tempname, $folder)) {
		echo 
      "<script type='text/javascript'>
      Swal.fire({
      title:'Image uploaded successfully',
      icon:'success',
      showConfirmButton: false,
      timer:2000
      }).then(function() {
        header('location:[url]');
      });
      </script>";
	} else {
		echo "<h3> Failed to upload image!</h3>";
	}
}


// If upload button is clicked ...
if (isset($_POST['uploadAdhar'])) {

  
  $Id = $show_data['id'];
  
	$filename = $_FILES["uploadfileAdhar"]["name"];
	$tempname = $_FILES["uploadfileAdhar"]["tmp_name"];
  
	$folder = "assets/adhar/" . $filename;

	// Get all the submitted data from the form
	$sql = "UPDATE  `emp_details` SET `adhar_card` = '$filename'
  WHERE  id = '$Id'"; 

    // Execute query
	mysqli_query($conn, $sql);

	// Now let's move the uploaded image into the folder: image
	if (move_uploaded_file($tempname, $folder)) {
		echo 
      "<script type='text/javascript'>
      Swal.fire({
      title:'Image uploaded successfully',
      icon:'success',
      showConfirmButton: false,
      timer:2000
      }).then(function() {
        header('location:[url]');
      });
      </script>";
	} else {
		echo "<h3> Failed to upload image!</h3>";
	}
}


// If upload button is clicked ...
if (isset($_POST['uploadPan'])) {

  
  $Id = $show_data['id'];

	$filename = $_FILES["uploadfilePan"]["name"];
	$tempname = $_FILES["uploadfilePan"]["tmp_name"];  
         
	$folder = "assets/pan/" . $filename;

	// Get all the submitted data from the form
	$sql = "UPDATE  `emp_details` SET `pan_card` = '$filename'
  WHERE  id = '$Id'"; 

    // Execute query
	mysqli_query($conn, $sql);

	if (move_uploaded_file($tempname, $folder)) {
		echo 
      "<script type='text/javascript'>
      Swal.fire({
      title:'Image uploaded successfully',
      icon:'error',
      showConfirmButton: false,
      timer:2000
      }).then(function() {
        header('location:[url]');
      });
      </script>";
	} else {
		echo "<h3> Failed to upload image!</h3>";
	}
}



 if(isset($_POST['submit']))
 {
    $Id = $show_data['id'];

    $fname=$_POST['fname'];
    $about=$_POST['about'];
    $department=$_POST['department'];

    $position=$_POST['position'];
    
    $address=$_POST['address'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $twitter=$_POST['twitter'];
    $facebook=$_POST['facebook'];
    $instagram=$_POST['instagram'];
    $linkedin=$_POST['linkedin'];

    $timezone = date_default_timezone_get();
     $d=strtotime("now");

    $ext = pathinfo($_FILES["uploadfileProfile"]["name"], PATHINFO_EXTENSION);
    $filename = $Id."Profile".$d.".".$ext;
	
	$tempname = $_FILES["uploadfileProfile"]["tmp_name"];
	$folder = "assets/profile/" . $filename;

    $CurrentFolder = "assets/profile/" . $show_data['profile_pic'];

  if($tempname)
  {
    unlink($CurrentFolder);
	move_uploaded_file($tempname, $folder);
  }
  else
  {
    $filename = $show_data['profile_pic'];
  }

  $extA = pathinfo($_FILES["uploadfileAdhar"]["name"], PATHINFO_EXTENSION);
  $filenameAdhar = $Id."Adhar".$d.".".$extA;
  
	$tempnameAdhar = $_FILES["uploadfileAdhar"]["tmp_name"];
  
	$folderAdhar = "assets/adhar/" . $filenameAdhar;
    $CurrentFolderAdhar = "assets/adhar/" . $show_data['adhar_card'];

  if($tempnameAdhar)
  {
    unlink($CurrentFolderAdhar);
  move_uploaded_file($tempnameAdhar, $folderAdhar);
  }
  else
  {
    $filenameAdhar = $show_data['adhar_card'];
  }

  $extP = pathinfo($_FILES["uploadfilePan"]["name"], PATHINFO_EXTENSION);
  $filenamePan = $Id."PAN".$d.".".$extP;
  
	$tempnamePan = $_FILES["uploadfilePan"]["tmp_name"];
    $folderPan = "assets/pan/" . $filenamePan;
    $CurrentFolderPan = "assets/pan/" . $show_data['pan_card'];
  if($tempnamePan)
  {
    unlink($CurrentFolderPan);
  move_uploaded_file($tempnamePan, $folderPan);
  }
  else
  {
    $filenamePan = $show_data['pan_card'];
  }

    $sql="UPDATE `emp_details` SET `fname` = '$fname', `about` = '$about', `department`='$department'
    ,`add` = '$address',`email` = '$email'
    , `phno` = '$phone',`position` = '$position',`twitter` = '$twitter'
    ,`facebook` = '$facebook',`instagram` = '$instagram',`linkedin` = '$linkedin', `profile_pic` = '$filename'
    , `adhar_card` = '$filenameAdhar', `pan_card` = '$filenamePan' 
    WHERE  id = '$Id'"; 
    $data=mysqli_query($conn,$sql);
    echo $data;


    if($data){
      echo 
      "<script type='text/javascript'>
      Swal.fire({
      title:'Updated successfully',
      icon:'success',
      showConfirmButton: false,
      timer:2000
      }).then(function() {
        location.href = location.href;
      });
      </script>";
    }
    else
    {
        echo "Error while updating record";
    }
 }
 

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
                                header('location:[url]');
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
                                header('location:[url]');
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
                                  header('location:[url]');
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
                                header('location:[url]');
                                });
                                    </script>";
                                  }


                            }
                     }

 
?>
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

        // Mapping of field IDs to error messages
        var fieldMessages = {
            'fname': 'Please enter your full name using only letters.',
            'about': 'Please provide information about yourself.',
            'position': 'Please specify your job position.',
            'Department': 'Please enter your department.',
            'Address': 'Please provide your address.',
            'Phone': 'Please enter a valid 10-digit phone number.',
            'Email': 'Please enter a valid email address.',
            'Twitter': 'Please provide your Twitter profile.',
            'Facebook': 'Please provide your Facebook profile.',
            'Instagram': 'Please provide your Instagram profile.',
            'Linkedin': 'Please provide your LinkedIn profile.'
        };

        // Regular expressions for validating email and phone number formats
        var emailRegex = /^\S+@\S+\.\S+$/;
        var phoneRegex = /^[0-9]{10}$/;
        var nameRegex = /^[a-zA-Z ]+$/; // Only letters and spaces

        // Loop through each input field
        for (var fieldId in fieldMessages) {
            var fieldValue;

            // Handle different input types
            if (fieldId === 'phone' || fieldId === 'email') {
                fieldValue = document.getElementById(fieldId).value.trim();
            } else {
                fieldValue = document.getElementById(fieldId).value;
            }

            // Check if the field is empty or fails additional validation
            if (fieldId === 'Email' && !emailRegex.test(fieldValue)) {
                setError(fieldId + 'Error', 'Please enter a valid email address.');
                isValid = false;
            } else if (fieldId === 'Phone' && !phoneRegex.test(fieldValue)) {
                setError(fieldId + 'Error', 'Please enter a valid 10-digit phone number.');
                isValid = false;
            } else if (fieldId === 'fname' && !nameRegex.test(fieldValue)) {
                setError(fieldId + 'Error', 'Please enter your full name using only letters.');
                isValid = false;
            } else if (fieldId !== 'Email' && fieldId !== 'Phone' && fieldId !== 'fname') {
                if (fieldValue === '') {
                    setError(fieldId + 'Error', fieldMessages[fieldId]);
                    isValid = false;
                }
            }
        }

        return isValid; // Return the overall validation status
    }

    function setError(elementId, errorMessage) {
        var element = document.getElementById(elementId);
        element.innerHTML = errorMessage;
        element.style.color = 'red';
    }
</script>







</html>