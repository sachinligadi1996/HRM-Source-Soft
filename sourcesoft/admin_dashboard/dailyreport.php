<?php
include 'connection.php';
session_start();
$userprofile = $_SESSION['login_user'];
if ($userprofile == true) {
} else {
    header('location:../index.php');
    exit(); 
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
            <h1>DPR Notice Details</h1>

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
                                <h5 class="">DPR Notice Details</h5>
                                <hr>
                                <form class="row g-3" action="#" method="POST" onsubmit="return validateForm()">
                                <div class="col-md-6">
                                <label for="exampleFormControlTextarea1" class="form-label">Select Month </label>
                                <input type="month" name="imonth" class="form-control form-control-sm" id="inputmonth" required>
                                <span class="error-message" id="inputmontherror"></span>
                            </div>
                                    <div class="col-md-6">
                                        <label for="" class="form-label">Link</label>
                                        <input type="text" class="form-control form-control-sm" name="link"
                                        placeholder="Enter link" required autocomplete="off">
                                        <span class="error-message" id="linkerror"></span>
                                    </div>
                                    
                                    <div class="col-md-12 text-center">
                                        <button type="submit" class="btn btn-success " name="submit" onclick="return validateForm()">Submit</button>
                                    </div>


                                </form>
                            </div>
                            

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

        // Function to set error message and styling
        function setError(elementId, errorMessage) {
            document.getElementById(elementId).innerHTML = errorMessage;
            document.getElementById(elementId).style.color = 'red';
            isValid = false;
        }

        // Select Month
        var inputMonth = document.getElementById('inputmonth').value.trim();
        if (inputMonth === '') {
            setError('inputmontherror', 'Select Month is required.');
        }

        // Link
        var link = document.getElementsByName('link')[0].value.trim();
        if (link === '') {
            setError('linkerror', 'Link is required.');
        }

        return isValid; // Return the overall validation status
    }
</script>



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
                                <h5 class="mt-2">DPR Notice Details</h5>
                                <hr>
                                <div class="table-responsive">
                                    <table class="table datatable">
                                        <thead>
                                            <tr>
                                                <th scope="col">Sr.No</th>
                                                <th scope="col">Month</th>
                                                <th scope="col">Link</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        $i = 1;

                                        $query_result = mysqli_query($conn, "SELECT *, ROW_NUMBER() OVER (ORDER BY id DESC) as row_num FROM `noticedpr`");

                                        while ($result = mysqli_fetch_array($query_result)) {
                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo $result['row_num']; ?></th>
                                            
                                            <td><?php echo date('M', strtotime($result['imonth'])); ?></td>
                                            <td><a target="_blank"
                                                    href="<?php echo $result['link']; ?>"><?php echo $result['link']; ?></a>
                                            </td>
                                            <td>
                                                <a class='' href='dailyreport?id=<?php echo $result['id']; ?>'><i
                                                        class='fa fa-trash text-danger'></i></a>
                                            </td>

                                        </tr>
                                        <?php $i++;
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
if (isset($_POST['submit'])) {
    $imonth = $_POST['imonth'];
    
    $link = $_POST['link'];
    
      $sql = "INSERT INTO `noticedpr` (`imonth`,`link`) VALUES ('$imonth','$link')";

        $data = mysqli_query($conn, $sql);

        if ($data) {
            echo "
            <script type='text/javascript'>
                Swal.fire({
                    title:'Add DprNotice successfully',
                    icon:'success',
                    showConfirmButton: false,
                    timer:2000
                }).then(function() {
                    window.location.replace('dailyreport');
                });
            </script>";
        } else {
            echo "data not inserted";
        }
    } else {
        echo "File upload failed.";
    }

?>

<!-- delete--------------- -->

<?php
if (!empty($_GET['id']) && isset($_GET['confirm']) && $_GET['confirm'] === 'true') {
    // Perform the deletion
    $idd = $_GET['id'];
    $query = "DELETE FROM `noticedpr` WHERE id='$idd'";
    $data = mysqli_query($conn, $query);

    if ($data) {
        echo "<script type='text/javascript'>
                Swal.fire({
                    text:'Delete Dpr Notice successfully',
                    icon:'success',
                    showConfirmButton: false,
                    timer:2000
                }).then(function() {
                    window.location.replace('dailyreport');
                });
              </script>";
    } else {
        echo "<script>alert('Failed To Delete')</script>";
    }
}  else if (!empty($_GET['id'])) {
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
                    window.location.href = 'dailyreport?id=$idd&confirm=true';
                } else {
                    window.location.href = 'dailyreport';
                }
            });
          </script>";
}
?>

