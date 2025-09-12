<?php 
  session_start();
  include("/home/vol6_5/infinityfree.com/if0_39689443/htdocs/config/config.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Faculty Information Website</title>
    <link rel="icon" type="image/png" href="/assets/image/top-head-logo.png">

    <!-- <link rel="stylesheet" href="responsive.css"> -->
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/217508c9b2.js" crossorigin="anonymous"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
</head>

<body>
    <link rel="stylesheet" href="/assets/css/home.css" />
    <!-- container replaced content -->
    <header class="header-section">
        <div class="left-logo">
            <img src="/assets/image/skit_logo.png" alt="logo-avtar" />
        </div>
        <div class="collage-name">
            Swami Keshvanand Institute of Technology, Management & Gramothan
            (SKIT)
        </div>
        <div class="user-details">
            <?php
             if (!isset($_SESSION['topLeftBar'])) { ?>
            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
                User
            </button>
            <ul class="dropdown-menu">
                <li><span style="display: flex;"><i class="fa-solid fa-user"
                            style="margin-top: 7px; margin-left: 5px;"></i><a class="dropdown-item"
                            href="/login.php?post=admin">Admin</a></span></li>
                <li><span style="display: flex;"><i class="fa-solid fa-user"
                            style="margin-top: 7px; margin-left: 5px;"></i><a class="dropdown-item"
                            href="/login.php?post=faculty">Faculty</a></span></li>
            </ul><?php 
              } else if(isset($_SESSION['topLeftBar'])){ ?>
            <i class="fa-regular fa-user text-white"></i>
            <button type="button" class="text-white dropdown-toggle" data-bs-toggle="dropdown"
                style="background: #2F3E46">
                <?php if($_SESSION['topLeftBar'] === "admin") { echo "Admin";} else if($_SESSION['topLeftBar'] === "faculty") { echo "Faculty"; } else {unset($_SESSION['topLeftBar']);}?>
            </button>
            <ul class="dropdown-menu" style="width: 390px; margin-top: 10px;">
                <link rel="stylesheet" href="/assets/css/profile.css" />
                <li>
                    <div class="container-specific">
                        <?php
                    if (isset($_SESSION['userEmail'])) {
                        $email = $_SESSION['userEmail'];
                        $sql = "SELECT `salutation`,`name`,`designation`,`department`,`email`,`contact_number`,`address`,`profile_path` FROM `detailed_faculty_info` WHERE `detailed_faculty_info`.`email` = '" . $email . "'";
                        $result = mysqli_query($conn,$sql); 
                        if(mysqli_num_rows($result) > 0) {
                            $row = mysqli_fetch_assoc($result);
                        ?>
                        <div class=" col-12 ms-auto d-flex">
                            <a href="/sign_in_form.php?job=save" style="text-decoration: none; margin-left: 15px;"
                                class="d-flex"><i class="fa-solid fa-pen" style="font-size: 15px; margin-top: 5px"></i>
                                <h4>Edit</h4>
                            </a>
                        </div>
                        <div class="container-specific">
                            <a href="/assets/php/profile_page.php" style="text-decoration: none;">
                                <div class="card-profile">
                                    <div class="image-card">
                                        <p>
                                            Click the card to view more details!
                                        </p>
                                        <img src=<?= $row['profile_path'];?> alt="profile-pic">
                                        <h2 class="mt-3"><?= $row['salutation'] . ' ' . $row['name'] ?></h2>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php }
                        } else { ?>
                        <div class="container-specific h-25 bg-white text-center" style="margin-top: 200px;">
                            <a href="logout.php" class="text-center">You are not authorized. Log in through Top Right
                                dropdown.</a>
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                </li>
                <li><span style="display: flex;"><i class="fa-solid fa-right-from-bracket"
                            style="margin-top: 11px; margin-left: 15px;"></i><a class="dropdown-item"
                            href="/assets/php/logout.php" style="padding-left: 5px;">Logout</a></span></li>
            </ul> <?php
              }
            ?>
        </div>

    </header>
    <!-- main section -->
    <div class="content-box">

        <input type="checkbox" id="check" class="che_box" style="display: none" />

        <div class="btn_one">
            <label for="check">
                <i class="fa-solid fa-bars" style="margin-top: 235px; margin-left: 10px"></i>
            </label>
        </div>

        <div class="btn_two">
            <label for="check">
                <i class="fa-solid fa-bars" style="margin-top: 235px; margin-left: 10px"></i>
            </label>
        </div>


        <!-- left nav sec  -->
        <nav class="navbar">


            <ul class="navbar-nav text-dark">
                <a href="/index.php" style="text-decoration: none;">
                    <li class="nav-item text-white" id="home">Home</li>
                </a>
                <?php if (isset($_SESSION['topLeftBar'])) {
                    if ($_SESSION['topLeftBar'] === 'admin') { ?>
                <a href="/email_access.php" style="text-decoration: none;">
                    <li class="nav-item text-white" id="directory">Directory</li>
                </a>
                <a href="/assets/php/faculty_report.php" style="text-decoration: none;">
                    <li class="nav-item text-white" id="faculty_report">Faculty Report</li>
                </a>
                <!--<a href="assets/php/faculty_report.php" style = "text-decoration: none;"><li class="nav-item text-white">Qualfication</li></a> -->
                <!--<li class="nav-item"><a href="#"> Specialization</a></li>--> <?php
                    }
                    else { ?>
                <a href="/assets/php/profile_page.php" style="text-decoration: none;">
                    <li class="nav-item text-white" id="profile">Profile</li>
                </a>
                <a href="/email_access.php" style="text-decoration: none;">
                    <li class="nav-item text-white" id="directory">Directory</li>
                </a>
                <?php
                    }
                  }
                  ?>
                <a href="/about_us(1).php" style="text-decoration: none;">
                    <li class="nav-item text-white" id="about_us">About Us</li>
                </a>
                <!-- <a href="certificate-front.php" style = "text-decoration: none;"><li class="nav-item text-white">Certificate</li></a>
                  <a href="#" style = "text-decoration: none;"><li class="nav-item text-white" >Attendance</li></a>
                  <a href="#" style = "text-decoration: none;"><li class="nav-item text-white" >Announcement</li></a>
                  <a href="#" style = "text-decoration: none;"><li class="nav-item text-white" >Research paper</li></a> -->

            </ul>
        </nav>
        <script>
        const currentPagePath = window.location.pathname;

        let activeLinkId;

        if (currentPagePath.includes('/profile_page.php')) {
            activeLinkId = 'profile';
        } else if (currentPagePath.includes('/email_access.php')) {
            activeLinkId = 'directory';
        } else if (currentPagePath.includes('/faculty_report.php')) {
            activeLinkId = 'faculty_report';
        } else if (currentPagePath.includes('/about_us(1).php')) {
            activeLinkId = 'about_us';
        } else {
            activeLinkId = 'home';
        }

        if (activeLinkId) {
            document.getElementById(activeLinkId).classList.add('active');
        }
        </script>