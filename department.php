<?php
  include('include/header.php');
  include('config/config.php');
?>
<link rel="stylesheet" href="assets/css/department.css">
<?php 
  if(isset($_SESSION['userEmail']) && isset($_GET['dept'])) {
  if($_SESSION['topLeftBar'] === "admin" || $_SESSION['topLeftBar'] === "faculty") { ?>
<div class="container">
    <div class="profile-grid">
        <?php 
            if ($_GET['dept'] === 'cse') { $department = "Computer Science & Engineering"; 
            $email = $_SESSION['userEmail'];
            $sql = "SELECT * FROM `detailed_faculty_info` WHERE `detailed_faculty_info`.`department` = '" . $department ."'";
            $result = mysqli_query($conn,$sql);
            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) { ?>
        <div class="profile-card">
            <img src='<?php echo $row['profile_path']; ?>' alt="faculty-photo" style="width:150px; height:150px;">
            <h5><?php echo $row['name']; ?></h5>
            <h5><?php echo $row['designation']; ?></h5>
            <p style="margin-bottom: 5px;">Email: <?php echo $row['email']; ?></p>
            <p style="margin-bottom: 5px;">Contact No.: <?php echo $row['contact_number']; ?></p>
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
        <div class="profile-card">
            <img src='<?php echo $row['profile_path']; ?>' alt="faculty-photo" style="width:150px; height:150px;">
            <h5><?php echo $row['name']; ?></h5>
            <h5><?php echo $row['designation']; ?></h5>
            <p style="margin-bottom: 5px;">Email: <?php echo $row['email']; ?></p>
            <p style="margin-bottom: 5px;">Contact No.: <?php echo $row['contact_number']; ?></p>
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
        <div class="profile-card">
            <img src='<?php echo $row['profile_path']; ?>' alt="faculty-photo" style="width:150px; height:150px;">
            <h5><?php echo $row['name']; ?></h5>
            <h5><?php echo $row['designation']; ?></h5>
            <p style="margin-bottom: 5px;">Email: <?php echo $row['email']; ?></p>
            <p style="margin-bottom: 5px;">Contact No.: <?php echo $row['contact_number']; ?></p>
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
        <div class="profile-card">
            <img src='<?php echo $row['profile_path']; ?>' alt="faculty-photo" style="width:150px; height:150px;">
            <h5><?php echo $row['name']; ?></h5>
            <h5><?php echo $row['designation']; ?></h5>
            <p style="margin-bottom: 5px;">Email: <?php echo $row['email']; ?></p>
            <p style="margin-bottom: 5px;">Contact No.: <?php echo $row['contact_number']; ?></p>
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
        ?> <div class="col-12 ms-5 mt-5">
    <h3> <?php echo "You don't have admin privaligies. This content is only visible to admin"; ?> </h3>
</div> <?php
      }
    } else { ?> <div class="col-12 ms-5 mt-5">
    <h3> <?php echo "You are not logged in. Please Log in using top-right dropdown."; ?> </h3>
</div> <?php
    }
    ?>
</div>
<?php 
  include('include/footer.html');
?>