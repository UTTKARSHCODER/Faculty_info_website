<?php
  include('include/header.php');
  include('config/config.php');
?>
 <div class="content-box">
          <!-- left nav sec  -->
          <nav class="navbar">
            <ul class="navbar-nav text-dark">
              <a href="home.php" style = "text-decoration: none;"><li class="nav-item active text-white">Home</li></a>
              <a href="profile.php" style = "text-decoration: none;"><li class="nav-item text-white">Profile</li></a>
              
              <?php if (isset($_SESSION['last_user'])) {
                if ($_SESSION['last_user'] === 'admin') { ?>
                <a href="email_access.php" style = "text-decoration: none;"><li class = "nav-item text-white">Faculty Emails</li></a>
                <a href="assets/php/faculty_report.php" style = "text-decoration: none;"><li class="nav-item text-white">Faculty Report</li></a>
              <!-- <a href="assets/php/faculty_report.php" style = "text-decoration: none;"><li class="nav-item text-white">Qualfication</li></a>
              <li class="nav-item"><a href="#"> Specialization</a></li> -->
              <?php 
                 }
                 }
              ?>

              <!-- <a href="certificate.html" style = "text-decoration: none;"><li class="nav-item text-white">Certificate</li></a>
              
              <a href="#" style = "text-decoration: none;"><li class="nav-item text-white" >Attendance</li></a>
              <a href="#" style = "text-decoration: none;"><li class="nav-item text-white" >Announcement</li></a>
              <a href="#" style = "text-decoration: none;"><li class="nav-item text-white" >Research paper</li></a> -->
              
            </ul>
          </nav>
  <link rel="stylesheet" href="assets/css/department.css">
  <?php 
  if(isset($_SESSION['userEmail']) && isset($_GET['dept'])) {
  if($_SESSION['last_user'] === "admin") { ?>
    <div class="container">
        <div class="profile-grid">
            <?php 
            if ($_GET['dept'] === 'cse') { $department = "Computer Science & Engineering"; 
            $email = $_SESSION['userEmail'];
            $sql = "SELECT * FROM `detailed_faculty_info` WHERE `detailed_faculty_info`.`department` = '" . $department ."'";
            $result = mysqli_query($conn,$sql);
            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) { ?>
                <div class="profile-card" style = "width: 205px; height: 370px; box-shadow: 5px 5px 5px 1px lightgray;">
                  <img src='<?php echo $row['profile_path']; ?>' alt="faculty-photo" style = "width:150px; height:150px;">
                  <h4><?php echo $row['name']; ?></h4>
                  <h5><?php echo $row['designation']; ?></h5>
                  <h5><?php echo $row['department']; ?></h5>
                  <p><?php echo $row['email']; ?></p>
                  <p><?php echo $row['contact_number']; ?></p>
                </div>
                <?php
              }
            } else {
              echo "No faculty enrolled";
            }
           }  else if($_GET['dept'] === 'cseai') { $department = "Computer Science & Engineering(AI)"; 
            $email = $_SESSION['userEmail'];
            $sql = "SELECT * FROM `detailed_faculty_info` WHERE `detailed_faculty_info`.`department` = '" . $department ."'";
            $result = mysqli_query($conn,$sql);
            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) { ?>
                <div class="profile-card" style = "width: 205px; height: 370px; box-shadow: 5px 5px 5px 1px lightgray;">
                  <img src='<?php echo $row['profile_path']; ?>' alt="faculty-photo" style = "width:150px; height:150px;">
                  <h4><?php echo $row['name']; ?></h4>
                  <h5><?php echo $row['designation']; ?></h5>
                  <h5><?php echo $row['department']; ?></h5>
                  <p><?php echo $row['email']; ?></p>
                  <p><?php echo $row['contact_number']; ?></p>
                </div>
                <?php
              }
            } else {
              echo "No faculty enrolled";
            }
           } else if($_GET['dept'] === 'cseds') { $department = "Computer Science & Engineering(DS)"; 
            $email = $_SESSION['userEmail'];
            $sql = "SELECT * FROM `detailed_faculty_info` WHERE `detailed_faculty_info`.`department` = '" . $department ."'";
            $result = mysqli_query($conn,$sql);
            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) { ?>
                <div class="profile-card" style = "width: 205px; height: 370px; box-shadow: 5px 5px 5px 1px lightgray;">
                  <img src='<?php echo $row['profile_path']; ?>' alt="faculty-photo" style = "width:150px; height:150px;">
                  <h4><?php echo $row['name']; ?></h4>
                  <h5><?php echo $row['designation']; ?></h5>
                  <h5><?php echo $row['department']; ?></h5>
                  <p><?php echo $row['email']; ?></p>
                  <p><?php echo $row['contact_number']; ?></p>
                </div>
                <?php
              }
            } else {
              echo "No faculty enrolled";
            }
           } else if($_GET['dept'] === 'cseiot') { $department = "Computer Science & Engineering(IOT)"; 
            $email = $_SESSION['userEmail'];
            $sql = "SELECT * FROM `detailed_faculty_info` WHERE `detailed_faculty_info`.`department` = '" . $department ."'";
            $result = mysqli_query($conn,$sql);
            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) { ?>
                <div class="profile-card" style = "width: 205px; height: 370px; box-shadow: 5px 5px 5px 1px lightgray;">
                  <img src='<?php echo $row['profile_path']; ?>' alt="faculty-photo" style = "width:150px; height:150px;">
                  <h4><?php echo $row['name']; ?></h4>
                  <h5><?php echo $row['designation']; ?></h5>
                  <h5><?php echo $row['department']; ?></h5>
                  <p><?php echo $row['email']; ?></p>
                  <p><?php echo $row['contact_number']; ?></p>
                </div>
                <?php
              }
            } else {
              $output = '<div class = "text-center mt-5 ms-2"><h5>No faculty enrolled</h5></div>';
              echo $output;
            }
           }
           ?>
           <!-- <div class="profile-card">
            <img src="assets/image/success_image.png" alt=" faculty-photo">
            <h2>Dr priya sharma </h2>
           <h4>Assistant professor</h4>
           <h5>CSE</h5>
            <p>ph.d in computer science </p>
           </div>
            
            <div class="profile-card">
            <img src="assets/image/success_image.png" alt=" faculty-photo">
            <h2>Dr priya sharma </h2>
           <h4>Assistant professor</h4>
           <h5>CSE</h5>
            <p>ph.d in computer science </p>
           </div>
            
            <div class="profile-card">
           <img src="assets/image/success_image.png" alt=" faculty-photo">
            <h2>Dr priya sharma </h2>
           <h4>Assistant professor</h4>
           <h5>CSE</h5>
            <p>ph.d in computer science </p>
           </div>
           
          <div class="profile-card">
            <img src="assets/image/success_image.png" alt=" faculty-photo">
            <h2>Dr priya sharma </h2>
           <h4>Assistant professor</h4>
           <h5>CSE</h5>
            <p>ph.d in computer science </p>
           </div>
            
             <div class="profile-card">
           <img src="assets/image/success_image.png" alt=" faculty-photo">
            <h2>Dr priya sharma </h2>
           <h4>Assistant professor</h4>
           <h5>CSE</h5>
            <p>ph.d in computer science </p>
           </div>
           
             <div class="profile-card">
           <img src="assets/image/success_image.png" alt=" faculty-photo">
            <h2>Dr priya sharma </h2>
           <h4>Assistant professor</h4>
           <h5>CSE</h5>
            <p>ph.d in computer science </p>
           </div> -->
        </div>
    </div>
    <?php 
      } else {
        ?> <div class = "col-12 ms-5 mt-5">
                  <h3> <?php echo "You don't have admin privaligies. This content is only visible to admin"; ?> </h3>
                </div> <?php
      }
    } else { ?> <div class = "col-12 ms-5 mt-5">
                  <h3> <?php echo "You are not logged in. Please Log in using top-right dropdown."; ?> </h3>
                </div> <?php
    }
    ?>
</div>
</body>
<?php 
  include('include/footer.html');
?>