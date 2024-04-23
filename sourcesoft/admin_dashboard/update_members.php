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
            <h1>Team Details</h1>
            <nav>

            </nav>
        </div><!-- End Page Title -->
        <?php
    include("connection.php");
    $id = $_GET['id'];

    $query = "SELECT * FROM team_member where id='$id'";
    $data = mysqli_query($conn, $query);

    $result = mysqli_fetch_assoc($data);
    $total = mysqli_num_rows($data);

    ?>

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
                                <h5 class="">Update Team</h5>
                                <hr>
                                <form class="row g-3" action="#" method="POST" onsubmit="return validateForm()">
                                    <div class="col-md-6">
                                        <label for="inputfname" class="form-label">Team Name</label>
                                        <input type="text" name="team_name" class="form-control form-control-sm"
                                            id="inputfname" placeholder="Team Name" required
                                            value="<?php echo $result['team_name'] ?>" autocomplete="off">
                                            <div class="error" id="inputteamnameError"></div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputlname" class="form-label">Team Lead</label>
                                        <select id="inputrole" name="team_lead" class="form-control form-control-sm"
                                            required>
                                            <option value="<?php echo $result['team_lead']; ?>">
                                                <?php echo $result['team_lead']; ?></option>

                                            <?php

                    $i = 1;

                    $query_show = mysqli_query($conn, "SELECT * FROM emp_details ORDER BY fname ASC");

                    while ($show = mysqli_fetch_array($query_show)) {

                    ?>
                                            <option value="<?php echo $show['fname']; ?>"><?php echo $show['fname']; ?>
                                            </option>
                                            <?php $i++;
                    }
                    ?>

                                        </select>
                                        <div class="error" id="inputfnameError"></div>
                                    </div><br><br>
                                    <div class="col-md-6">

                                    <div class="dropdown">
                                        <button class="btn dropdown-toggle" type="button"
                                            id="multiSelectDropdown" data-bs-toggle="dropdown" aria-expanded="false" required >
                                             Select Members

                                            
                                        </button>
                                        
                                        <ul class="dropdown-menu" aria-labelledby="multiSelectDropdown">
                                           
                                        <li>
                                                <label>
                                                
                                                <?php
                    // Fetch all employees from the database
                    $query_show = mysqli_query($conn, "SELECT * FROM emp_details ORDER BY fname ASC");

                    // Retrieve previously selected team members
                    $selectedMembers = explode(", ", $result['members']);

                    // Loop through all employees
                    while ($show = mysqli_fetch_array($query_show)) {
                        $employeeName = $show['fname'];
                        $isChecked = in_array($employeeName, $selectedMembers) ? 'checked' : '';

                        // Display checkboxes with employees' names
                        echo '<li><label>&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="members[]" value="' . $employeeName . '" ' . $isChecked . '>'
                            . $employeeName . '</label></li>';
                    }
                    ?>

                                                </label>
                                            </li>
                                    </ul>
                                    </div>
                                    <div class="error" id="multiSelectDropdownError"></div>   
        
                                    </div>
                                    <br><br>
                                    <div class="col-md-6">
                                <label for="inputteamsize" class="form-label">Team Size</label>
                                <input type="number" name="team_size" class="form-control form-control-sm" id="inputteamsize"
                                    placeholder="Team Size" value="<?php echo $result['team_size'] ?>"  autocomplete="off" required>
                                    <div class="error" id="inputteamsizeError"></div>
                                </div>
                                    <center>
                                        <div class="col-md-6">
                                            <button type="submit" class="btn btn-success btn-sm" name="update"
                                                onclick="return validateForm()">Update</button>
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

                    <style>
    .error {
        color: red;
        font-size: 14px;
    }
</style>
<script>
    function validateForm() {
        

        // Team Name validation
    var teamName = document.getElementById('inputfname').value.trim();
    if (teamName === "") {
        document.getElementById('inputteamnameError').innerText = 'Team Name is required';
        return false;
    }

    // Check if the team name contains numbers
    if (/^\d+$/.test(teamName)) {
        document.getElementById('inputteamnameError').innerText = 'Team Name should not contain numbers';
        return false;
    }
        // Team Lead validation
        var teamLead = document.getElementById('inputrole').value;
        if (teamLead === "" || teamLead === null) {
            document.getElementById('inputfnameError').innerText = 'Team Lead is required';
            return false;
        }

        // Team Members
    var teamMembers = document.forms[0]["members[]"];
    var teamMembersChecked = false;
    for (var i = 0; i < teamMembers.length; i++) {
        if (teamMembers[i].checked) {
            teamMembersChecked = true;
            break;
        }
    }
    if (!teamMembersChecked) {
        document.getElementById("multiSelectDropdownError").innerHTML = "At least one Team Member must be selected.";
        isValid = false;
    } else {
        document.getElementById("multiSelectDropdownError").innerHTML = "";
    }

    // TeamSize
    var Teamsize = document.forms[0]["team_size"].value;
    if (Teamsize === "") {
        document.getElementById("inputteamsizeError").innerHTML = "TeamSize is required.";
        isValid = false;
    } else {
        document.getElementById("inputteamsizeError").innerHTML = "";
    }

    var teamMembers = document.forms[0]["members[]"];
        var teamMembersChecked = 0;

        for (var i = 0; i < teamMembers.length; i++) {
            if (teamMembers[i].checked) {
                teamMembersChecked++;
            }
        }

        var teamSize = document.forms[0]["team_size"].value;

        if (teamMembersChecked != teamSize) {
            document.getElementById("multiSelectDropdownError").innerHTML = "Please select exactly " + teamSize + " Team Members.";
            isValid = false;
        } else {
            document.getElementById("multiSelectDropdownError").innerHTML = "";
        }
        return isValid; // Return the overall validation status      
    }
</script>
                </body>

                </html>



            </div>
            <?php
        error_reporting(0);
      if (isset($_POST['update'])) {
        $team_name = $_POST['team_name'];
        $team_lead = $_POST['team_lead'];
        $members =  implode(", ", $_POST['members']);
        $team_size = $_POST['team_size'];
       
        $query = "UPDATE team_member set team_name ='$team_name',team_lead='$team_lead',members='$members',team_size='$team_size' WHERE id='$id'";

        $data = mysqli_query($conn, $query);

        if ($data) {

          echo
          "<script type='text/javascript'>
    Swal.fire({
    text:'Update Details successfully',
    icon:'success',
    showConfirmButton: false,
    timer:2000
    }).then(function() {
    window.location.replace('team_members');
    });
    </script>";
        } 
      }
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