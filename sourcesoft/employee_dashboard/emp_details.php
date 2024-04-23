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

    <title>HRM - Employee Dashboard </title>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>



    <!-- screenshot -->
    <script src= 
"https://cdn.jsdelivr.net/npm/html2canvas@1.0.0-rc.5/dist/html2canvas.min.js"> 
	</script> 
</head>

<body>

    <!-- ======= Header ======= -->
    <?php include "include/header.php"; ?>
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <?php include "include/sidebar.php"; ?>
    <!-- End Sidebar-->

    <main id="main" class="main">

    <div id="photo"> 
		

		<!-- Define the button 
		that will be used to 
		take the screenshot -->
		<button onclick="takeshot()" href="emp_holiday"> 
			Take Screenshot 
		</button> 
	</div> 

        <div class="pagetitle">
            <h1>Employee Details</h1>
        </div>
        <!-- End Page Title -->

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

                </html>
            </div>
            <?php
            $query = "SELECT *, ROW_NUMBER() OVER (ORDER BY id DESC) as row_num FROM emp_details";
            $data = mysqli_query($conn, $query);
            $total = mysqli_num_rows($data);


            if ($total != 0) {
            ?>
            
            <section class="section">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="card">
                            <div class="card-body">
                                <h5 class="">Employee Details</h5>
                                <hr>

                                <!-- Table with stripped rows -->
                                <div class="table-responsive">
                                    <table class="table datatable ">
                                        <thead>
                                            <tr>
                                                <th scope="col">S.No.</th>
                                                <th scope="col">Employee ID</th>
                                                <th scope="col">Employee Name</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Phone</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>

                                        <?php
                                            while ($result = mysqli_fetch_assoc($data)) {
                                            ?>
                                        <tr>
                                            <td><?php echo $result['row_num']; ?></td>
                                            <td><?php echo $result['empid']; ?></td>
                                            <td><?php echo $result['fname']; ?></td>
                                            <td><?php echo $result['email']; ?></td>
                                            <td><?php echo $result['phno']; ?></td>
                                            <td>
                                                <a href='emp_profile1?id=<?php echo $result['empid']; ?>'>
                                                    <i class='fa fa-user text-primary'></i>
                                                </a>

                                                <a href='chat?sid=<?php echo $_SESSION['empid']; ?>&rid=<?php echo $result['empid']; ?>'>
    <img src="assets/img/chat.png" alt="" style="max-width:17px">
</a>
                                            </td>
                                        </tr>


                                        <?php
                                            }
                                        } else {
                                            echo "No records Found";
                                        }

                                        ?>

                                    </table>
                                    <!-- End Table with stripped rows -->

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
    <script type="text/javascript"> 

		// Define the function 
		// to screenshot the div 
		function takeshot() { 
			let div = 
				document.getElementById('photo'); 

			// Use the html2canvas 
			// function to take a screenshot 
			// and append it 
			// to the output div 
			html2canvas(document.documentElement).then(
                function (canvas) {
                    // Convert canvas to data URL
                    let imageData = canvas.toDataURL('image/png');

                    // Create a link element
                    let downloadLink = document.createElement('a');
                    downloadLink.href = imageData;
                    downloadLink.download = 'screenshot.png';

                    // Append the link to the body
                    document.body.appendChild(downloadLink);

                    // Trigger a click event on the link
                    downloadLink.click();

                    // Remove the link from the body
                    document.body.removeChild(downloadLink);
                })
		} 
		
	</script> 

</body>

</html>