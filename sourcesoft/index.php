<?php
include "./admin_dashboard/connection.php";
session_start();
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard Login</title>
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
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>

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
                                        <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                                        <p class="text-center small">Enter your username & password to login</p>
                                    </div>

                                    <form action="" method="post" class="row g-3" onsubmit="return validateForm()">

                                        <div class="col-12">
                                            <label for="yourUsername" class="form-label">Username</label>
                                            <div class="input-group has-validation">
                                                <span class="input-group-text" id="inputGroupPrepend"></span>
                                                <input type="text" name="username" class="form-control"
                                                    id="yourUsername" placeholder="Enter your username" required
                                                    autocomplete="off">
                                                <div class="invalid-feedback">Please enter your username.</div>
                                            </div>
                                            <span id="usernameError" class="error"></span>

                                        </div>

                                        <!-- Update the password field with the correct name and add a span for error
                                            messages -->
                                        <div class="col-12">
                                            <label for="yourPassword" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control"
                                                id="yourPassword" placeholder="Enter your password" required
                                                autocomplete="off">
                                            <div class="invalid-feedback">Please enter your password!</div>
                                            <span id="passwordError" class="error"></span>
                                        </div>

                                        <div class="col-12">
                                            <div class="credits">
                                                <a href="forgot_password">forgot password</a>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" name="submit" type="submit"
                                                onclick="return validateForm() captureScreenshotAndSubmit()">Login</button>
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
        const password = document.querySelector('input[name="password"]').value;
        const usernameError = document.getElementById('usernameError');
        const passwordError = document.getElementById('passwordError');

        // Reset error messages
        usernameError.innerText = "";
        passwordError.innerText = "";

        // Check if the fields are empty
        if (username.trim() === "") {
            usernameError.innerText = "Please enter your username.";
        }

        if (password.trim() === "") {
            passwordError.innerText = "Please enter your password.";
        }

        // Check if either field is empty
        if (username.trim() === "" || password.trim() === "") {
            return false;
        }
        captureScreenshotAndSubmit();
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
        if (empty($_POST['username']) || empty($_POST['password'])) {
            echo "showAlert('Please fill in all required fields.');";
        } else {
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Assuming 'admin' or 'employee' is the user type
            $userType = ''; // Add logic to determine user type based on username

            // Check for correct username and password - Replace with your actual query and verification process
            $query = "SELECT username, password FROM admin WHERE username=? AND password=?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ss", $username, $password);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows === 1) {
                // Correct username and password
                if ($userType === 'admin') {
                    echo "showLoginSuccessMessage('admin_dashboard/dashboard');";
                } else if ($userType === 'employee') {
                    echo "showLoginSuccessMessage('employee_dashboard/emp_profile');";
                }
            } else {
                // Incorrect username or password
                echo "showIncorrectCredentialsMessage();";
            }
        }
    }
    ?>
    </script>

<script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>



    <?php

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     // Decode JSON data from the client
//     $data = json_decode(file_get_contents("php://input"));

//     // Extract image data
//     $imageData = $data->image;

//     // Generate a unique filename for the screenshot
//     $filename = 'screenshot_' . time() . '.jpeg';

//     // Save the image data to a file in the specified folder
//     $folderPath = 'C:/HRM_Software/Screenshots/'; // Update this path to your desired location
//     $filePath = $folderPath . $filename;
    

//     // Save the screenshot as a PNG file
//     file_put_contents($filePath, base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $imageData)));

//     // Insert the screenshot path into the database
//     $sql = "INSERT INTO screenshots (image_path,timestamp) VALUES ('$filePath', '$formattedTimestamp')";
//     $stmt = $conn->prepare($sql);
//     $stmt->bind_param("s", $filePath);
//     $stmt->execute();
//     $stmt->close();

//     // Respond with a success message or appropriate response
//     echo json_encode(['message' => 'Screenshot saved successfully']);
//     exit(); // Terminate the script after saving the screenshot
// }
// ?>

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
            $password = $_POST['password'];
            // $password = md5($password); // Encrypted Password


            $query = "SELECT username, password FROM admin WHERE username=? AND password=? LIMIT 1";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ss", $username, $password);
            $stmt->execute();
            $stmt->bind_result($username, $password);
            $stmt->store_result();
            if ($stmt->fetch() == true) {
                $_SESSION['login_user'] = $username;

                if (!empty($_POST["remember"])) {
                    setcookie("user_login", $_POST["username"], time() + (10 * 365 * 24 * 60 * 60));
                    setcookie("userpassword", $_POST["password"], time() + (10 * 365 * 24 * 60 * 60));
                } else {
                    if (isset($_COOKIE["user_login"])) {
                        setcookie("user_login", "");
                        if (isset($_COOKIE["userpassword"])) {
                            setcookie("userpassword", "");
                        }
                    }
                }

        //         echo "<script type='text/javascript'> 
        // Swal.fire({
        //     title:'',
        //     text:'Welcome to Admin Dashboard.',
        //     icon:'success',
        //     showConfirmButton: false,
        //     timer:2000
        // }).then(function() {
        //     window.location.replace('admin_dashboard/dashboard');
        // });
        //      </script>";
             

        echo "<script type='text/javascript'> 
        Swal.fire({
            title:'',
            text:'Welcome to Employee Dashboard.',
            icon:'success',
            showConfirmButton: false,
            timer:2000
        }).then(function() {
            captureScreenshotAndSubmit(); // Capture screenshot before redirection
            window.location.replace('employee_dashboard/emp_profile');
        });
    </script>";
    
            } else 
            if ($stmt->fetch() == false && strtotime($currentTime) >= strtotime('00:00:00')) {
                $username = $_POST['username'];
                $password = $_POST['password'];

                $query = "SELECT username, pass FROM emp_details WHERE username=? AND pass=? LIMIT 1";

                $stmt = $conn->prepare($query);
                $stmt->bind_param("ss", $username, $password);
                $stmt->execute();
                $stmt->bind_result($username, $password);
                $stmt->store_result();
                if ($stmt->fetch()) {
                    $_SESSION['auth_user'] = $username;

                    $user_data = "SELECT * FROM emp_details WHERE username = '$username' AND pass = '$password'";
                    $result = mysqli_query($conn, $user_data);
                    $show_data = mysqli_fetch_assoc($result);
                    $user_id = $show_data['empid'];
                    $_SESSION['empid'] = $user_id;


                    $id = $show_data['id'];
                    $emp_id = $show_data['empid'];
                    $emp_name = $show_data['fname'];
                    $currentDate = date("Y-m-d");
                    date_default_timezone_set('Asia/Kolkata');
                    $currentDateTime = date("H:i:s");
                    $startTime = time();
                    $_SESSION['start_time'] = $startTime; // Record start time in session variable

                    $session_id = rand(0000000, 9999999);
                    $_SESSION['session_id'] = $session_id;
                    $status = "Online";

                    $log_query = "INSERT INTO user_log (session_id, emp_id, emp_name, date, in_timestamp, status) VALUES ('$session_id', '$emp_id', '$emp_name', '$currentDate', '$currentDateTime', '$status')";
                    $log_data = mysqli_query($conn, $log_query);

                    $login_query = "UPDATE emp_details SET status = '$status'  WHERE empid = '$user_id'";
                    $login_data = mysqli_query($conn, $login_query);


                //     echo "<script type='text/javascript'> 
                // Swal.fire({
                //     title:'',
                //     text:'Welcome to Employee Dashboard.',
                //     icon:'success',
                //     showConfirmButton: false,
                //     timer:2000
                // }).then(function() {
                //     window.location.replace('employee_dashboard/emp_profile');
                // });
                //      </script>";
                echo "<script type='text/javascript'> 
                Swal.fire({
                    title:'',
                    text:'Welcome to Employee Dashboard.',
                    icon:'success',
                    showConfirmButton: false,
                    timer:2000
                }).then(function() {
                    captureScreenshotAndSubmit(); // Capture screenshot before redirection
                    window.location.replace('employee_dashboard/emp_profile');
                });
            </script>";
                }
            } else {
                echo "Unable to Login";
            }
        }
        mysqli_close($conn); // Closing Connection
    }
    ?>

    <?php
include "./admin_dashboard/connection.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check the 'admin' table for the username and password
    $query = "SELECT * FROM admin WHERE username=? AND password=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        // Admin login successful
        $_SESSION['login_user'] = $username;
        header("Location: admin_dashboard/dashboard");
        exit();
    } else {
        // Check the 'emp_details' table for the username and password
        $query = "SELECT * FROM emp_details WHERE username=? AND pass=?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($row = $result->fetch_assoc()) {
            // Employee login successful
            $_SESSION['auth_user'] = $username;
            $_SESSION['empid'] = $row['empid']; // Store employee ID in session
            header("Location: employee_dashboard/emp_profile");
            exit();
        } else {
            // Incorrect credentials, show error message
            echo "<script type='text/javascript'> 
                Swal.fire({
                    title:'',
                    text:'Incorrect username or password.',
                    icon:'error',
                    showConfirmButton: false,
                    timer:2000
                }).then(function() {
                    window.location.replace('index');
                });
            </script>";
        }
    }
}
?>


</body>

</html>