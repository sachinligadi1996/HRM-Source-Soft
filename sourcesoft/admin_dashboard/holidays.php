<?php
include 'connection.php';
session_start();
$userprofile = $_SESSION['login_user'];
if ($userprofile == true) {
} else {
  header('location:../index.php');
}
?>
<?php
function calculatetotalDays($fromDate, $toDate) {
    // Convert the date and time strings to DateTime objects
  $fromDate = new DateTime($fromDate);
   $toDate = new DateTime($toDate);

    // Calculate the difference in days and hours
   $interval = $fromDate->diff($toDate);
    $totalDays = $interval->days;
    // $totalHours = $interval->h;

    // Format the result in an English string format
    //$result = '';

    if ($totalDays > 0) {
        $result .= $totalDays . ($totalDays === 1 ? ' day' : 'days');
   }

     return $result;
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
            <h1>Holidays Details</h1>
            <nav>

            </nav>
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
                                <h5 class="">Add Holiday</h5>
                                <hr>
                                <form class="row g-3" action="#" method="POST" onsubmit="return validateForm()">
                                    <div class="col-md-12">
                                        <label for="inputhdname" class="form-label">Holiday Name</label>
                                        <input type="text" name="hdname" class="form-control"
                                            placeholder="Enter Holiday Name" id="inputhdname" required
                                            autocomplete="off">
                                            <div class="error" id="inputhdnameError"></div>
                                    </div>


                                    <div class="col-md-4">
                                        <label for="inputFromDate" class="form-label">From Date</label>
                                        <input type="date" class="form-control" id="inputFromDate" name="fromDate"
                                            required min="<?php echo date('Y-m-d'); ?>">
                                            <div class="error" id="inputFromError"></div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="inputToDate" class="form-label">To Date</label>
                                        <input type="date" class="form-control" id="inputToDate" name="toDate" required
                                            min="<?php echo date('Y-m-d'); ?>">
                                        <div class="error" id="inputToDateError"></div>
                                    </div>

                                    <div class="col-md-12">
        <label for="floatingTextarea2">Description</label>
        <textarea class="form-control" placeholder="Enter holiday description" id="floatingTextarea2" style="height: 100px" name="descr" required></textarea>
        <div class="error" id="floatingTextarea2Error"></div>
    </div>

                                    </div>
                                    <center>
                                        <div class="col-md-6">
                                            <button type="submit" class="btn btn-success" name="submit"
                                                onclick="return validateForm()">Submit</button>
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
                    <script>
    function validateForm() {
    var hdname = document.getElementById('inputhdname').value;
    var fromDate = document.getElementById('inputFromDate').value;
    var toDate = document.getElementById('inputToDate').value;
    var descr = document.getElementById('floatingTextarea2').value;

    // Validation for holiday name (should not contain numbers)
    var isValidHolidayName = /^[a-zA-Z\s]+$/.test(hdname);

    document.getElementById('inputhdnameError').innerText =
        hdname.trim() === ""
            ? 'Holiday Name is required'
            : isValidHolidayName
            ? ''
            : 'Holiday Name should not contain numbers';

    document.getElementById('inputFromError').innerText =
        fromDate.trim() === "" ? 'From Date is required' : '';
    document.getElementById('inputToDateError').innerText =
        toDate.trim() === "" ? 'To Date is required' : '';
    document.getElementById('floatingTextarea2Error').innerText =
        descr.trim() === "" ? 'Description is required' : '';

    return (
        hdname.trim() !== "" &&
        isValidHolidayName &&
        fromDate.trim() !== "" &&
        toDate.trim() !== "" &&
        descr.trim() !== ""
    );
}
</script>

                </body>

                </html>

            </div>

            <?php
     include ("connection.php");

     $query="SELECT * FROM holiday";
    $data=mysqli_query($conn,$query);

     $result=mysqli_fetch_assoc($data);
     $total=mysqli_num_rows($data);

     if ($total != 0) {
        ?>

            <section class="section">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="card">
                            <div class="card-body">
                                <h5 class="">Holidays Details</h5>
                                <hr>

                                <!-- Table with stripped rows -->
                                <table class="table datatable">
                                    <thead>
                                        <tr>
                                            <th width="10%" scope="col">SR NO</th>
                                            <th width="15%" scope="col">Holiday Name</th>
                                            <th width="10%" scope="col">From Date</th>
                                            <th width="10%" scope="col">To Date</th>
                                            <th width="15%" scope="col">Number Of Days</th>
                                            <th width="15%" scope="col">Description</th>
                                            <th width="5%" scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <?php
                                            include "connection.php";
                                           
                                            $i = 1;

                                            $query_result = mysqli_query($conn, "SELECT *, ROW_NUMBER() OVER (ORDER BY id DESC) as row_num FROM holiday");

                                            while ($result = mysqli_fetch_array($query_result)) {
                                            ?>
                                    <tr>
                                        <th scope="row"><?php echo $result['row_num']; ?></th>
                                        <td><?php echo $result['hdname']; ?></td>
                                        <td><?php echo date('d-m-Y', strtotime($result['fromDate'])); ?></td>
                                        <td><?php echo date('d-m-Y', strtotime($result['toDate'])); ?></td>
                                        <td><?php echo $result['numberOfDays']; ?></td>
                                        <td><?php echo $result['descr']; ?></td>

                                        <td><a class='' href='update_holiday?id=<?php echo $result['id']; ?>'><i
                                                    class='fa fa-edit text-warning'></i></a>
                                            <a class='' href='holidays?id=<?php echo $result['id']; ?>'><i
                                                    class='fa fa-trash text-danger'></i></a>
                                        </td>
                                    </tr>
                                    <?php
                                     $i++;
        }
       ?>
                                </table>
                                <!-- End Table with stripped rows -->

                            </div>
                        </div>

                    </div>
                </div>
            </section>
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
<?php
  //error_reporting(0);
  if(isset($_POST['submit']))
  {
    
    $holidayname=$_POST['hdname'];
    $fromDate=$_POST['fromDate'];
    $toDate=$_POST['toDate'];
    //$numberOfDays=$_POST['numberOfDays'];
    $total = calculatetotalDays($fromDate, $toDate);
    $description=$_POST['descr'];
    
    $check_query = "SELECT * FROM holiday WHERE hdname='$holidayname' OR fromDate = '$fromDate' OR toDate='$toDate'" ;
    $check_result = $conn->query($check_query);
    if ($check_result->num_rows > 0) {
        
        echo "<script type='text/javascript'>
                        Swal.fire({
                            text: ' Your holiday is already submit',
                            icon: 'error',
                            showConfirmButton: false,
                            timer: 2000
                        }).then(function() {
                            window.location.replace('holidays');
                        });
                    </script>";
                }else{
        
    
  $sql="INSERT INTO holiday(hdname, fromDate, toDate,numberOfDays,descr) VALUES ('$holidayname','$fromDate','$toDate','$total','$description')";
  $data=mysqli_query($conn,$sql);
  if($data){
    echo 
    "<script type='text/javascript'>
    Swal.fire({
    text:'Insert Details successfully',
    icon:'success',
    showConfirmButton: false,
    timer:2000
    }).then(function() {
    window.location.replace('holidays');
    });
    </script>";
    
   }
  
    else
   {
    echo "Data not inserted";
  }
}
}

 ?>
<?php
if (!empty($_GET['id']) && isset($_GET['confirm']) && $_GET['confirm'] === 'true') {
    // Perform the deletion
    $idd = $_GET['id'];
    $query = "DELETE FROM holiday WHERE id='$idd'";
    $data = mysqli_query($conn, $query);

    if ($data) {
        echo "<script type='text/javascript'>
                Swal.fire({
                    text:'Delete Details successfully',
                    icon:'success',
                    showConfirmButton: false,
                    timer:2000
                }).then(function() {
                    window.location.replace('holidays');
                });
              </script>";
    } else {
        echo "<script>alert('Failed To Delete')</script>";
    }
} else if (!empty($_GET['id'])) {
    // SweetAlert confirmation dialog
    $idd = $_GET['id'];
    echo "<script>
            Swal.fire({
                title: 'Are you sure want to delete this Record?',
                //text: 'You won\'t be able to revert this!',
                //icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'holidays?id=$idd&confirm=true';
                } else {
                    window.location.href = 'holidays';
                }
            });
          </script>";
}
      }
      
      
?>
<style>
    .is-invalid {
        border-color: red !important;
    }

    .error {
        color: red;
        font-size: 14px;
        margin-top: 4px;
    }
</style>

