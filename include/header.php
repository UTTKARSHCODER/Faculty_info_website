<?php 
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="/project/root/assets/css/home.css" />
    <!-- <link rel="stylesheet" href="responsive.css"> -->
    <!-- Latest compiled and minified CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/217508c9b2.js" crossorigin="anonymous"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    />
  </head>
  <body>
    <!-- container replaced content -->
    <div class="content">
      <header class="header-section">
        <div class="left-logo">
          <img src="/project/root/assets/image/skit_logo.png" alt="logo-avtar" />
        </div>
        <div class="collage-name">
          Swami Keshvanand Institute of Technology, Management & Gramothan
          (SKIT)
        </div>
        <div class="user-details">
            <?php
             if (!isset($_SESSION['last_user'])) { ?>
              <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
                User
              </button>
              <ul class="dropdown-menu">
                <li><span style = "display: flex;"><i class = "fa-solid fa-user" style = "margin-top: 7px; margin-left: 5px;"></i><a class="dropdown-item" href="/project/root/login.php?post=admin">Admin</a></span></li>
                <li><span style = "display: flex;"><i class = "fa-solid fa-user" style = "margin-top: 7px; margin-left: 5px;"></i><a class="dropdown-item" href="/project/root/login.php?post=faculty">Faculty</a></span></li>
              </ul><?php 
              } else if(isset($_SESSION['last_user'])){ ?>
                <i class = "fa-regular fa-user text-white"></i>
                <button type="button" class="text-white dropdown-toggle" data-bs-toggle="dropdown" style = "background: #2F3E46">
                <?php if($_SESSION['last_user'] === "admin") { echo "Admin";} else if($_SESSION['last_user'] === "faculty") { echo "Faculty"; } ?>
              </button>
              <ul class="dropdown-menu">
                <li><span style = "display: flex;"><i class = "fa-solid fa-right-from-bracket" style = "margin-top: 7px; margin-left: 5px;"></i><a class="dropdown-item" href="/project/root/assets/php/logout.php">Logout</a></span></li>
              </ul> <?php
              }
            ?>
        </div>
      </header>
      