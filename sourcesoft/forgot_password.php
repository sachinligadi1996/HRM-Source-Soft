<?php
include('smtp/PHPMailerAutoload.php');
include "./admin_dashboard/connection.php";
session_start();
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Forgot password</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="admin_dashboard/assets/img/sourcesoft_logo.png" rel="icon">

    <!-- Include SweetAlert2 CSS and JS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="admin_dashboard/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="admin_dashboard/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="admin_dashboard/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="admin_dashboard/assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="admin_dashboard/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="admin_dashboard/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="admin_dashboard/assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <style>
    .error {
        color: red;
    }
    </style>

</head>

<body>

    <main>
        <div class="container">

            <section
                class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">


                            <div class="card mb-3">

                                <div class="card-body">

                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Enter Email</h5>
                                        <!-- <p class="text-center small">Enter your username</p> -->
                                    </div>

                                    <form action="" method="post" class="row g-3" onsubmit="return validateForm()">

                                        <div class="col-12">
                                            <label for="yourUsername" class="form-label">Email id</label>
                                            <div class="input-group has-validation">
                                                <span class="input-group-text" id="inputGroupPrepend"></span>
                                                <input type="text" name="username" class="form-control"
                                                    id="yourUsername" placeholder="Enter your username" required
                                                    autocomplete="off">
                                                <div class="invalid-feedback">Please enter your email.</div>
                                            </div>
                                            <span id="usernameError" class="error"></span>
                                        </div>

                                        
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" name="submit" type="submit"
                                                onclick="return validateForm()">Generate OTP</button>
                                        </div>

                                    </form>

                                </div>
                            </div>

                            <div class="credits">
                                Designed by <a href="https://sourcecodetech.com/">sourcecodetech.in</a>
                            </div>

                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="admin_dashboard/assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="admin_dashboard/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="admin_dashboard/assets/vendor/chart.js/chart.umd.js"></script>
    <script src="admin_dashboard/assets/vendor/echarts/echarts.min.js"></script>
    <script src="admin_dashboard/assets/vendor/quill/quill.min.js"></script>
    <script src="admin_dashboard/assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="admin_dashboard/assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="admin_dashboard/assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>


    <script>
    function validateForm() {
        const username = document.querySelector('input[name="username"]').value;
         // Reset error messages
    usernameError.innerText = "";
    // passwordError.innerText = "";

     // Check if the fields are empty
     if (username.trim() === "") {
        usernameError.innerText = "Please enter your username.";
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

    function showLoginSuccessMessage(redirectUrl) {
        Swal.fire({
            title: '',
            text: 'Welcome to Dashboard.',
            icon: 'success',
            showConfirmButton: false,
            timer: 2000
        }).then(function() {
            window.location.replace(redirectUrl);
        });
    }

    function showIncorrectCredentialsMessage() {
        Swal.fire({
            title: '',
            text: 'Incorrect username or password.',
            icon: 'error',
            showConfirmButton: false,
            // timer: 2000 // Show the confirmation button
        }).then(function(result) {
            // If the user closes the alert, redirect to login page
            if (result.isConfirmed) {
                window.location.replace('index');
            }
        });
    }


    <?php
    if (isset($_POST['submit'])) {
        if (empty($_POST['username'])) {
            echo "showAlert('Please fill in all required fields.');";
        } else {
            $username = $_POST['username'];


            
            $to = "akashdhobale937@gmail.com";
            $subject = "My subject";
            $txt = "Hello world!";
            $headers = "From: akashdhobale937@gmail.com";

            mail($to,$subject,$txt,$headers);


        }
    }
    ?>
    </script>


</body>

</html>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
</head>

<body>

    <?php
    date_default_timezone_set('Asia/Kolkata');
    $currentTime = date("H:i:s");
    // $error = '';
    if (isset($_POST['submit'])) {
        if (empty($_POST['username']) || empty($_POST['password'])) {
            // $error = "Username or Password is invalid";
        } else {
            $username = $_POST['username'];

            $username = $_POST['username'];

            $to = "akashdhobale937@gmail.com";
            $subject = "My subject";
            $txt = "Hello world!";
            $headers = "From: akashdhobale937@gmail.com";

            mail($to,$subject,$txt,$headers);

        }
    }
    ?>

    <?php
include "./admin_dashboard/connection.php";
session_start();

if (isset($_POST['submit'])) {
    $email = $_POST['username'];
   
    $query = "SELECT * FROM emp_details WHERE email='$email'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

        if ($row['id'] > 0) {
            $id = $row['id'];
            $url = "Location: test?id=".$row['id']."&email=".$email;
        
            
            $_SESSION['email_user_id'] = $id;
            
            echo "
            <script type='text/javascript'>
                
            window.location.replace('send_email');
            
            
            
            </script>";
            exit();
        } else {
            echo "
            <script type='text/javascript'>
                Swal.fire({
                    title: '',
                    text: 'Invalid email.',
                    icon: 'error',
                    showConfirmButton: false,
                    timer: 2000
                }).then(function() {
                });
            </script>";
        }




}

?>


</body>

</html>