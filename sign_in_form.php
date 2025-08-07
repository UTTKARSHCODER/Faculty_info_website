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
    <!-- User Details -->
    <div class = "container-fluid h-100 bg-gray">
        <div class = "row form-styling">
            <div class = "col-sm-12 col-md-12 col-lg-12 col-12 f-20 me-5 mt-4">
                <h2 class = "text-center custom-color">Sign up</h2>
            </div>
            <hr/>
            
            <form action = "assets/php/form_info.php?job=<?php if(isset($_GET['job'])) { echo $_GET['job']; } else { echo '';} ?>" method = "post">
                <div class = "row">
                    <div class = "col f-20 ms-2">
                        <!-- <div class = "d-grid"> -->
                        <?php  if(isset($_SESSION['userEmail'])) { 
                            $email1 = $_SESSION['userEmail']; ?>
                            <input type = "hidden" name = "form_type" value = "<?= $email1 ?>">
                        <?php
                        } else { ?>
                            <input type = "hidden" name = "form_type" value = "personal_details">
                        <?php
                        }
                        ?>
                        <?php 
                            $row = null;
                            if (isset($_SESSION['userEmail'])) {
                                $email = $_SESSION['userEmail'];
                                $sql = "SELECT * FROM `detailed_faculty_info` WHERE `detailed_faculty_info`.`email` = '" . $email . "'";
                                $result = mysqli_query($conn,$sql); 
                                if (mysqli_num_rows($result) > 0) {
                                    $row = mysqli_fetch_assoc($result); }?>
                        <div class = "mt-4">
                            <span>
                                <i class = "fa-solid fa-user"></i>
                                <label for = "name" class = "form-label"><b>Name</b></label>
                            </span>
                            <input type = "text" class = "form-control custom-back" id = "name" value = "<?= $row['name'] ?? '' ?>" placeholder = "Enter your Name" name = "name" required>
                        </div>
                        <div class = "mt-4">
                            <span>
                                <i class = "fa-solid fa-envelope"></i>
                                <label for = "email" class = "form-label"><b>Email</b></label>
                            </span>
                            <input type = "email" class = "form-control custom-back" id = "email" value = "<?= $row['email'] ?? '' ?>" placeholder = "Enter your personal Email Adddress" name = "email" required>
                        </div>
                        <div class = "mt-4">
                            <span>
                                <i class = "fa-solid fa-phone"></i>
                                <label for = "co_number" class = "form-label"><b>Contact Number</b> </label>
                            </span>
                            <input type = "number" class = "form-control custom-back" id = "co_number" value = "<?= $row['contact_number'] ?? '' ?>" placeholder = "Enter your Mobile Number" name = "co_number" required>
                        </div>
                        <div class = "mt-4">
                            <span>
                                <i class = "fa-solid fa-calendar"></i>
                                <label for = "dob" class = "form-label"><b>Date of Birth</b> </label>
                            </span>
                            <input type = "date" class = "form-control custom-back" id = "dob" value = "<?= $row['date_of_birth'] ?? '' ?>" name = "dob" required>
                        </div>

                        <div class = "d-flex column-gap-4 mt-4">
                            <span>
                                <i class = "fa-solid fa-person"></i>
                                <label for = "gender" class = "form-label" ><b>Gender</b> </label>
                            </span>
                            <div class = "form-check">
                                <input type = "radio" class = "form-check-input" id = "radio1" name = "optradio" value = "male" <?php if(isset($row['gender'])) { $row['gender'] === 'male' ? 'checked' : '' ;} ?>>
                                <label class = "form-check-label" for = "radio1"><b>Male</b></label>
                            </div>
                            <div class = "form-check">
                                <input type = "radio" class = "form-check-input" id = "radio2" name = "optradio" value = "female" <?php if(isset($row['gender'])) { $row['gender'] === 'female' ? 'checked' : '';} ?>>
                                <label class = "form-check-label" for = "radio1"><b>Female</b></label>
                            </div>
                            <div class = "form-check">
                                <input type = "radio" class = "form-check-input" id = "radio3" name = "optradio" value = "others" <?php if(isset($row['gender'])) { $row['gender'] === 'others' ? 'checked' : '' ;}?>>
                                <label class = "form-check-label" for = "radio1"><b>Others</b></label>
                            </div>
                        </div>
                        <div class = "mt-4">
                            <span>
                                <i class = "fa-solid fa-location-dot"></i>
                                <label for = "address" class = "form-label"><b>Address:-</b> </label>
                            </span>
                            <textarea type = "text" class = "form-control mt-2 custom-back" rows = "4" id = "address" placeholder = "Enter your permanent Address" name = "address" required><?= $row['address'] ?? '' ?></textarea>
                        </div>
                    </div>
                    <div class = "col f-20 ms-2">
                        <div class = "mt-4">
                            <span>
                                <i class = "fa-solid fa-briefcase"></i>
                                <label for = "designation" class = "form label"><b>Designation</b> </label>
                            </span>
                            <input type = "text" class = "form-control mt-2 custom-back" id = "designation" value = "<?= $row['designation'] ?? '' ?>" placeholder = "Enter your Designation/Post" name = "designation" required>
                        </div>
                        <div class = "mt-4">
                            <span>
                                <i class = "fa-solid fa-building"></i>
                                <label for = "department" class = "form-label"><b>Department</b> </label>
                            </span>
                            <div class = "mt-3">
                            <select class = "input custom-back" name = "branchSelect" required>
                                <option value = ""></option>
                                <option value = "Computer Science & Engineering" <?php if(isset($row['department'])) { $row['department'] === 'Computer Science & Engineering' ? 'selected' : '' ;}?>>Computer Science & Engineering</option>
                                <option value = "Computer Science & Engineering(AI)" <?php if(isset($row['department'])) { $row['department'] === 'Computer Science & Engineering(AI)' ? 'selected' : '';} ?>>Computer Science & Engineering(AI)</option>
                                <option value = "Computer Science & Engineering(DS)" <?php if(isset($row['department'])) { $row['department'] === 'Computer Science & Engineering(DS)' ? 'selected' : '';} ?>>Computer Science & Engineering(DS)</option>
                                <option value = "Computer Science & Engineering(IOT)" <?php if(isset($row['department'])) { $row['department'] === 'Computer Science & Engineering(IOT)' ? 'selected' : '';} ?>>Computer Science & Engineering(IOT)</option>
                                <!-- <option value = "Basic Sciences and Humanities">Basic Sciences and Humanities</option>
                                <option value = "Civil Engineering">Civil Engineering</option>
                                <option value = "Electronics & Communication Engineering">Electronics & Communication Engineering</option>
                                <option value = "Electrical Engineering">Electrical Engineering</option>
                                <option value = "Information Technology">Information Technology</option>
                                <option value = "Mechnical Engineering">Mechnical Engineering</option>
                                <option value = "Management Studies">Management Studies</option>
                                <option value = "Pharmacy">Pharmacy</option> -->
                            </select>
                            </div>
                        </div>
                        <div class = "mt-4">
                            <span>
                                <i class = "fa-solid fa-star"></i>
                                <label for = "aos" class = "form-label"><b>Area of Specializatoin</b> </label>
                            </span>
                            <input type = "text" class = "form-control custom-back" id = "aos" value = "<?= $row['area_of_specialization'] ?? '' ?>" placeholder = "Enter your field of Specializatoin" name = "aos" required>
                        </div>
                        <div class = "mt-4">
                            <span>
                                <i class = "fa-solid fa-id-card"></i>
                                <label for = "emp_id" class = "form-label"><b>Employee ID</b> </label>
                            </span>
                            <input type = "text" class = "form-control custom-back" id = "emp_id" value = "<?= $row['employee_id'] ?? '' ?>" placeholder = "Enter your employee ID" name = "emp_id" required>
                        </div>
                        <div class = "mt-4">
                            <span>
                                <i class = "fa-solid fa-user-tie"></i>
                                <label for = "highest Qualification" class = "form-label"><b>Highest Qualification</b> </label>
                            </span>
                            <input type = "text" class = "form-control custom-back" id = "hq" value = "<?= $row['highest_qualification'] ?? '' ?>" placeholder = "Enter your highest degree" name = "hq" required>
                        </div>
                        <div class = "mt-4">
                            <span>
                                <i class = "fa-solid fa-calendar"></i>
                                <label for = "pshd" class = "form-label"><b>Passing Year of Highest degree</b> </label>
                            </span>
                            <input type = "number" class = "form-control custom-back" id = "pshd" value = "<?= $row['passing_year'] ?? '' ?>" placeholder = "Enter your passing year" name = "pshd" required>
                        </div>
                    </div>
                    <div class = "col f-20 ms-2">
                        <div class = "mt-4">
                            <span>
                                <i class = "fa-solid fa-id-card-clip"></i>
                                <label for = "pan number" class = "form-label"><b>PAN No.</b> </label>
                            </span>
                            <input type = "text" class = "form-control custom-back" id = "panno" value = "<?= $row['Pan_no'] ?? '' ?>" placeholder = "Enter your PAN No." name = "panno" required>
                        </div>
                        <div class = "mt-4">
                            <span>
                                <i class = "fa-solid fa-calendar"></i>
                                <label for = "date of Joining" class = "form-label"><b>Date of Joining</b> </label>
                            </span>
                            <input type = "date" class = "form-control custom-back" id = "doj" value = "<?= $row['date_of_joining'] ?? '' ?>" name = "doj" required>
                        </div>
                    
                        <div class = "mt-4">
                            <span>
                                <i class = "fa-solid fa-calendar"></i>
                                <label for = "date of Promotion" class = "form-label"><b>Promotion Date(If any)</b></label>
                            </span>
                            <input type = "date" class = "form-control custom-back" id = "dop" value = "<?= $row['promotion_date'] ?? '' ?>" name = "dop">
                        </div>
                        <div class = "mt-4">
                            <span>
                                <i class = "fa-solid fa-stamp"></i>
                                <label for = "PHD Details" class = "form-label"><b>PhD Details(If pursuing now)</b> </label>
                            </span>
                            <input type = "text" class = "form-control custom-back" id = "phdun" value = "<?= $row['phd_univer_name'] ?? '' ?>" placeholder = "Enter name of the University from where you are pursuing your PhD" name = "phdun">
                        </div>
                        <div class = "mt-4">
                            <span>
                                <i class = "fa-solid fa-calendar"></i>
                                <label for = "date of Registration" class = "form-label"><b>Date of Registration(PhD degree)</b> </label>
                            </span>
                            <input type = "date" class = "form-control custom-back" id = "dor" value = "<?= $row['date_of_registration'] ?? '' ?>" name = "dor">
                        </div>

                        <div class = "mt-4">
                            <span>
                                <i class = "fa-solid fa-file"></i>
                                <label for = "number of Research Papers" class = "form-label"><b>Research Paper Details</b> </label>
                            </span>
                            <input type = "number" class = "form-control custom-back" id = "nrpp" value = "<?= $row['number_of_research_paper'] ?? '' ?>" placeholder = "Enter number of Research Paper Publication" name = "nrpp" required>
                            <!-- <a href = "sign_in_form2.php">Redirect to 2nd Form</a> -->
                        </div>
                    </div>   
                </div>
                <div class = "d-flex column-gap-4 mt-4 mb-4" style = "margin-left: 565px;">
                            <a href = "index.html"><button class = "btn btn-primary rounded-pill cancel-button" style = "margin-right: 75px; width: 100px; height: 50px;" >Cancel</button></a>  
                            <button class = "btn btn-primary rounded-pill next-button" style = "margin-left: 75px; width: 100px; height: 50px;" type = "submit">Next</button>
                </div>
                <?php } ?>
            </form>
            
        </div>
    </div>
    </div>
<?php 
    include('include/footer.html')
?>