<?php 
  include('config/config.php');
  include('include/header.php');
?>  
    <!-- main section -->
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
                <!--<a href="assets/php/faculty_report.php" style = "text-decoration: none;"><li class="nav-item text-white">Qualfication</li></a> -->
                <!--<li class="nav-item"><a href="#"> Specialization</a></li>--> <?php
                }
                }
              ?>
              
              <!-- <a href="certificate-front.php" style = "text-decoration: none;"><li class="nav-item text-white">Certificate</li></a>
              <a href="#" style = "text-decoration: none;"><li class="nav-item text-white" >Attendance</li></a>
              <a href="#" style = "text-decoration: none;"><li class="nav-item text-white" >Announcement</li></a>
              <a href="#" style = "text-decoration: none;"><li class="nav-item text-white" >Research paper</li></a> -->
              
            </ul>
          </nav>
          <!-- main box -->
          <div class="main-box">
              <!-- department grid -->
              <div class="department-grid">
                
                <a href = "department.php?dept=cse" style = "text-decoration:none;">
                  <div class= "dept">
                    Computer Science & Engineering<br>
                    <?php 
                      $sql = "SELECT COUNT(`sno`) AS distinct_count FROM `detailed_faculty_info` WHERE `detailed_faculty_info`.`department` = 'Computer Science & Engineering'";
                      $result = mysqli_query($conn, $sql);
                      if($result) {
                          $row = mysqli_fetch_assoc($result);
                          echo $row['distinct_count'] . " "; ?>Faculty Members 
                          <?php 
                      }
                    ?>
                  </div>
                </a>
                <a href = "department.php?dept=cseai" style = "text-decoration:none;">
                <div class="dept">Computer Science & Engineering(AI)<br>
                <?php 
                    $sql = "SELECT COUNT(`sno`) AS distinct_count FROM `detailed_faculty_info` WHERE `detailed_faculty_info`.`department` = 'Computer Science & Engineering(AI)'";
                    $result = mysqli_query($conn, $sql);
                    if($result) {
                        $row = mysqli_fetch_assoc($result);
                        echo $row['distinct_count'] . " "; ?>Faculty Members <?php 
                      }
                  ?>
                </div>
                </a>
                <a href = "department.php?dept=cseds" style = "text-decoration:none;">
                <div class="dept">Computer Science & Engineering(DS)<br>
                <?php 
                    $sql = "SELECT COUNT(`sno`) AS distinct_count FROM `detailed_faculty_info`  WHERE `detailed_faculty_info`.`department` = 'Computer Science & Engineering(DS)'";
                    $result = mysqli_query($conn, $sql);
                    if($result) {
                        $row = mysqli_fetch_assoc($result);
                        echo $row['distinct_count'] . " "; ?>Faculty Members <?php
                     }
                  ?>
                </div>
                </a>
                <a href = "department.php?dept=cseiot" style = "text-decoration:none;">
                <div class="dept">Computer Science & Engineering(IOT)<br>
                <?php 
                    $sql = "SELECT COUNT(`sno`) AS distinct_count FROM `detailed_faculty_info`  WHERE `detailed_faculty_info`.`department` = 'Computer Science & Engineering(IOT)'";
                    $result = mysqli_query($conn, $sql);
                    if($result) {
                        $row = mysqli_fetch_assoc($result);
                        echo $row['distinct_count'] . " "; ?>Faculty Members
                    <?php }
                  ?>
                </div>
                </a>
                <!-- <div class="dept">Information Technology<br>
                //<?php 
                //     $sql = "SELECT COUNT(`sno`) AS distinct_count FROM `detailed_faculty_info`  WHERE `detailed_faculty_info`.`department` = 'Information Technology'";
                //     $result = mysqli_query($conn, $sql);
                //     if($result) {
                //         $row = mysqli_fetch_assoc($result);
                //         echo $row['distinct_count'] . " "; ?>Faculty Members
                //     <?php
                //     }
                //   ?>
                // </div>
                // <div class="dept">Electronics & Communication Engineering<br>
                //     <?php 
                //     $sql = "SELECT COUNT(`sno`) AS distinct_count FROM `detailed_faculty_info`  WHERE `detailed_faculty_info`.`department` = 'Electronics & Communication Engineering'";
                //     $result = mysqli_query($conn, $sql);
                //     if($result) {
                //         $row = mysqli_fetch_assoc($result);
                //         echo $row['distinct_count']. " "; ?>Faculty Members
                //     <?php
                //     }
                //   ?>
                // </div>
                // <div class="dept">Electrical Engineering <br>
                //     <?php 
                //     $sql = "SELECT COUNT(`sno`) AS distinct_count FROM `detailed_faculty_info`  WHERE `detailed_faculty_info`.`department` = 'Electrical Engineering'";
                //     $result = mysqli_query($conn, $sql);
                //     if($result) {
                //         $row = mysqli_fetch_assoc($result);
                //         echo $row['distinct_count']. " "; ?>Faculty Members
                //     <?php
                //     }
                //   ?>
                // </div> 
                // <div class="dept">Mechnical Engineering<br>
                //     <?php 
                //     $sql = "SELECT COUNT(`sno`) AS distinct_count FROM `detailed_faculty_info`  WHERE `detailed_faculty_info`.`department` = 'Mechnical Engineering'";
                //     $result = mysqli_query($conn, $sql);
                //     if($result) {
                //         $row = mysqli_fetch_assoc($result);
                //         echo $row['distinct_count']. " "; ?>Faculty Members
                //     <?php
                //     }
                //   ?>
                // </div>
                // <div class="dept">Civil Engineering<br>
                //     <?php 
                //     $sql = "SELECT COUNT(`sno`) AS distinct_count FROM `detailed_faculty_info`  WHERE `detailed_faculty_info`.`department` = 'Civil Engineering'";
                //     $result = mysqli_query($conn, $sql);
                //     if($result) {
                //         $row = mysqli_fetch_assoc($result);
                //         echo $row['distinct_count'] . " "; ?>Faculty Members
                //     <?php
                //     }
                  ?>
                </div> -->
              </div>  
          </div>
      </div>
<?php 
  include('include/footer.html');
?>