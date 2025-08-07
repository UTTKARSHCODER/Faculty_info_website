<?php 
    include('config/config.php');
    include('include/header.php');
?>
    <link rel="stylesheet" href="assets/css/profile.css" />
    <!-- main section -->
      <div class="content-box">
          <!-- left nav sec  -->
          <nav class="navbar">
            <ul class="navbar-nav text-dark">
              <a href="/project/root/home.php" style = "text-decoration: none;"><li class="nav-item  text-white">Home</li></a>
              <a href="profile.php" style = "text-decoration: none;"><li class="nav-item active text-white">Profile</li></a>
              <?php if (isset($_SESSION['last_user'])) {
                if ($_SESSION['last_user'] === 'admin') { ?>
                <a href="/project/root/email_access.php" style = "text-decoration: none;"><li class = "nav-item text-white">Faculty Emails</li></a>
                <a href="faculty_report.php" style = "text-decoration: none;"><li class="nav-item text-white">Faculty Report</li></a>
              <!-- <a href="assets/php/faculty_report.php" style = "text-decoration: none;"><li class="nav-item text-white">Qualfication</li></a>
              <li class="nav-item"><a href="#"> Specialization</a></li> --> <?php
                } 
              }
              ?> 
              <!-- <a href="/project/root/certificate-front.php" style = "text-decoration: none;"><li class="nav-item text-white">Certificate</li></a>
              <a href="#" style = "text-decoration: none;"><li class="nav-item text-white">Attendance</li></a>
              <a href="#" style = "text-decoration: none;"><li class="nav-item text-white">Announcement</li></a>
              <a href="#" style = "text-decoration: none;"><li class="nav-item text-white">Research paper</li></a> -->
              
              <!-- <li class="nav-item"><a href = "logout.php">Logout</a></li> -->
            </ul>
          </nav>
    
    <div class = "container-fluid h-100">
        <?php
        
        if (isset($_SESSION['userEmail'])) {
            $email = $_SESSION['userEmail'];
            $sql = "SELECT * FROM `detailed_faculty_info` WHERE `detailed_faculty_info`.`email` = '" . $email . "'";
            $result = mysqli_query($conn,$sql); 
            if(mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
            ?>
                <div class =" col-12 mb-2 ms-auto mt-2">
                    <a href = "/project/root/sign_in_form.php?job=edit"><i class = "fa-solid fa-pen"><h5>Edit</h5></i></a>
                </div>
                <div class="container">
                    <a href = "assets/php/profile_page.php" style = "text-decoration: none"><div class="card">
                        <div class="image-card">
                            <img src=<?= $row['profile_path'];?> alt=" profile-pic">
                            <h2 class = "mt-3"><?= $row['name'] ?></h2>
                        </div>
                        <div class="card-menu">
                            <p class="main">
                                <i class="fa fa-user" style="font-size:20px"></i>
                                Designation:</p>
                            <p><?= $row['designation'] ?></p>
                            <p class="main">
                                <i class="fa fa-briefcase" style="font-size:20px"></i>
                                Branch:</p>
                            <p><?= $row['department'] ?></p>
                            <p class="main">
                                <i class="fa fa-envelope" style="font-size:20px"></i>
                                Email:</p>
                            <p><?= $row['email'] ?></p>
                            <p class="main">
                                <i class="fa fa-phone" style="font-size:20px"></i>
                                Phone:</p>
                            <p><?= $row['contact_number'] ?></p>
                            <p class="main" >
                                <i class="fa fa-globe" style="font-size:20px"></i>
                                Address:</p>
                            <p><?= $row['address'] ?></p>
                            
                        </div>
                    </div></a>
                </div>
                <?php } else {
                    echo "No data found";
                }
            } else { ?>
                <a href = "logout.php" class = "text-center edit">You are not authorized. Log in through Top Right dropdown.</a>
                <?php
            }
            ?>
    </div>
    </div>
<?php 
    include('include/footer.html');
?> 