<!DOCTYPE html>
<html>

<head>
    <title>HRM - Admin Dashboard </title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
    <link href="assets/img/sourcesoft_logo.png" rel="icon">
</head>

<body>
    <?php
    include "./admin_dashboard/connection.php";
    include('smtp/PHPMailerAutoload.php');
    
    session_start();
    $id = $_SESSION['email_user_id'];
    session_destroy();
    // echo $id;
    if($id > 0)
    {
  
    $randNo = rand(111111,999999);
    $pass = "%@" . $randNo . "$#"; 

    $query = "UPDATE emp_details SET pass='$pass' WHERE id='$id'";

    mysqli_query($conn, $query);

    $query1 = "SELECT * FROM emp_details WHERE id='$id'";
    $result = mysqli_query($conn, $query1);
    $row = mysqli_fetch_assoc($result);
    $email = $row["email"];
    $loginId = $row["empid"];
    

    echo smtp_mailer($email,'HRM-Authectication Details','Hi '.$row["fname"].',<br>Please find authentication details below.<br>Login Id - <b>'.$loginId.'</b><br>Password - <b>'.$pass.'</b>');
    }    
    function smtp_mailer($to,$subject, $msg){
	$mail = new PHPMailer(); 
	$mail->IsSMTP(); 
	$mail->SMTPAuth = true; 
	$mail->SMTPSecure = 'tls'; 
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 587; 
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';
	// $mail->SMTPDebug = 2; 
	$mail->Username = "akashdhobale937@gmail.com";
	$mail->Password = "zsta aznm brcp bspf";
	$mail->SetFrom("akashdhobale937@gmail.com");
	$mail->Subject = $subject;
	$mail->Body =$msg;
	$mail->AddAddress($to);
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	if(!$mail->Send()){
		// echo $mail->ErrorInfo;
        echo "
            <script type='text/javascript'>
                Swal.fire({
                    title: '',
                    text: 'Email address not match  .',
                    icon: 'error',
                    showConfirmButton: false,
                    timer: 2000
                }).then(function() {
                    window.location.replace('send_email');
                });
            </script>";
	}else{
		
	}
}


    echo "
            <script type='text/javascript'>
                Swal.fire({
                    title: '',
                    text: 'Email send successfully.',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 2000
                }).then(function() {
                    window.location.replace('index');
                });
            </script>";
    ?>
</body>

</html>



<?php

?>