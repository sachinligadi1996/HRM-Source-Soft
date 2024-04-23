<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        
    <style>
    .rounded-pill {
        padding-right: .6em;
        padding-left: .6em;
       

    }

    .badge {
        position: absolute;
        right: -10px;
        top: -16px;
        color: #ffffff;
        height: 8px;
        width: 8px;
        font-weight: 600;
        font-size: 8px;
        text-align: center;
        line-height: 17px;
        display: block;
        padding: 0;
        background-color: #3BB77E;
    }
    </style>
</head>

<?php
include('connection.php');
if (isset($_SESSION['start_time'])) {
    $currentTime = time(); // Get current time
    $startTime = $_SESSION['start_time']; // Get start time from session variable


    // You can convert $sessionDuration into minutes, hours, or any other format you prefer.
}

?>

<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <a href="emp_profile" class="logo d-flex align-items-center">
            <!-- <img src="assets/img/logo.png" alt=""> -->
            <span class="d-none d-lg-block"><img src="assets\img\sourcesoft_logo.png" alt="SOURCESOFT">SOURCESOFT
                HRM</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <!-- <div class="col-sm-6">
        <div class="clearfix">
            <marquee behavior="" direction="left">
                <p class="pt-4"> <span class="">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor.</p>
            </marquee>
        </div>
    </div> -->
    <div>
        <marquee direction="left" behavior="scroll">
            <?php
                                        
   $query_result = mysqli_query($conn, "SELECT * FROM `notice`");

     while ($result = mysqli_fetch_array($query_result)) {
    ?>
            <?php echo $result['notice']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <?php
    }
    ?>
        </marquee>
    </div>


    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

            <li class="nav-item d-block d-lg-none">
                <a class="nav-link nav-icon search-bar-toggle " href="#">
                    <i class="bi bi-search"></i>
                </a>
            </li><!-- End Search Icon-->
            <?php $sessionDuration = $currentTime - $startTime; // Calculate session duration in seconds
            $formattedDuration = gmdate("H:i:s", $sessionDuration);
            ?>
            <?php $id = $_SESSION['session_id']; ?>
            <li>
                <div class="pt-3 pe-3">
                    <p>
                        <i class="bi bi-broadcast text-success"></i> : <?php echo "$id" ?> :
                        <?php echo "$formattedDuration" ?>
                    </p>
                </div>

            </li>
            <?php $user =  $_SESSION['auth_user'];
            $user_data = "SELECT * FROM emp_details WHERE username = '$user'";
            $result = mysqli_query($conn, $user_data);
            $show_data = mysqli_fetch_assoc($result);
            $empid = $show_data['empid'];
            ?>

            <li class="nav-item dropdown pe-3">
                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <i class="bi bi-person"></i>
                    <span class="d-none d-md-block dropdown-toggle ps-1"><?php echo "$empid"; ?></span>


                </a><!-- End Profile Iamge Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="emp_profile">
                            <i class="bi bi-person"></i>
                            <span>My Profile</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="logout">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Sign Out</span>
                        </a>
                    </li>

                </ul><!-- End Profile Dropdown Items -->
            </li><!-- End Profile Nav -->
            <li class="nav-item">
    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
        <div class="nav-item dropdown ms-2">
            <?php
            $id = $_SESSION['auth_user'];
            $orderSql = "SELECT * FROM assign_task WHERE status = 'To-Do' && emp_id = '$id' ";

            $orderQuery = mysqli_query($conn, $orderSql);
            $countOrder = mysqli_num_rows($orderQuery);
            
            // Update the status of tasks when viewed
            if ($countOrder > 0) {
                while ($task = mysqli_fetch_assoc($orderQuery)) {
                    // Update the status of the task to 'Viewed' or any status you prefer
                    $taskId = $task['id'];
                    mysqli_query($conn, "UPDATE assign_task SET status = 'Viewed' WHERE id = '$taskId'");
                }
            }
            ?>
            <span class="badge rounded-pill" style="height: 20px; width: 20px; font-size: 10px;">
                <?php echo $countOrder; ?></span>
            <?php if ($countOrder > 0) { ?>
                <a href='emp_task'> <i class="fa-solid fa-bell fa-shake fa-lg" style="color:#007bff;"></i></a>
            <?php } else { ?>
                <i class="fa-regular fa-bell" style="color:#007bff;"></i>
            <?php } ?>
        </div>
    </a><!-- End Notification Icon -->
</li>

          
<li class="nav-item">
    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
        <div class="nav-item dropdown ms-2">
            <?php
            $id = $_SESSION['auth_user'];
            $orderSql = "SELECT * FROM project WHERE status = 'Not Started'";

            $orderQuery = mysqli_query($conn, $orderSql);
            $countOrder = mysqli_num_rows($orderQuery);
            
            // Update the status of projects when viewed
            if ($countOrder > 0) {
                while ($project = mysqli_fetch_assoc($orderQuery)) {
                    // Update the status of the project to 'Viewed' or any status you prefer
                    $projectId = $project['id'];
                    mysqli_query($conn, "UPDATE project SET status = 'Viewed' WHERE id = '$projectId'");
                }
            }
            ?>
            <span class="badge rounded-pill" style="height: 20px; width: 20px; font-size: 10px;">
                <?php echo $countOrder; ?></span>
            <?php if ($countOrder > 0) { ?>
                <a href='emp_project'> <i class="fa-solid fa-envelope fa-shake fa-lg" style="color: #007bff;"></i></a>
            <?php } else { ?>
                <i class="fa-regular fa-envelope" style="color: #007bff;"></i>
            <?php } ?>
        </div>
    </a><!-- End Project Message Icon -->
</li>

          
                            

        </ul>
    </nav><!-- End Icons Navigation -->
    <!-- <style>
    .bi-bell {
        font-size: 1rem;
        /* Adjust the font size */
        color: #333;
        /* Set the color */
        /* Add more styles as needed */
    }
    </style> -->




</header>


</html>