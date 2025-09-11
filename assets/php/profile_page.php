<?php 
    include('C:/xampp/htdocs/project/root/config/config.php');
    include('C:/xampp/htdocs/project/root/include/header.php');
?>
    <link rel="stylesheet" href="../css/profile_style.css" />
    <!-- main section -->
      <div class="content-box">
          <!-- left nav sec  -->
          <nav class="navbar">
            <ul class="navbar-nav text-dark">
              <a href="/project/root/index.php" style = "text-decoration: none;"><li class="nav-item  text-white">Home</li></a>
              <a href="/project/root/profile.php" style = "text-decoration: none;"><li class="nav-item active text-white">Profile</li></a>
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
            $result = mysqli_query($conn,$sql); ?>
                <div class =" col-12 mb-2 ms-auto mt-2">
                    <a href = "/project/root/sign_in_form.php?job=edit"><i class = "fa-solid fa-pen"><h5>Edit</h5></i></a>
                </div>
                <div class = "col-12">
                    <div style = "float: left; width:200px; height: 100px;">
                        <img src = "/project/root/assets/uploads/profile_picture/688f6a096400b_profile-picture-men.png" alt = "Profile Image">
                    </div>
                    <?php
                    if (mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_assoc($result);
                        ?> 
                        <h1 class = "text-center  mt-3"><?php echo $row['name']; ?></h1>
                        <h2 class = "text-center mt-3">Department: <?php echo $row['department'];?></h2>
                        <h3 class = "text-center mt-3" style = "margin-left: 180px;">Designation: <?php echo $row['designation'];?></h3>
                        
                </div>
                <hr/>
                <div class = "row">
                    <div class = "col mt-3 ms-3 color-gray">
                        <h3 class = "mt-3">Personal Details:</h3>
                        <h4 class = "mt-4">Email: <span class = "constant-spacing"><?php echo $row['email'];?></span></h4>
                        <h4 class = "mt-3">Contact number: <span class = "constant-spacing"><?php echo $row['contact_number'];?></span></h4>
                        <h4 class = "mt-3">Date of Birth: <span class = "constant-spacing"><?php echo $row['date_of_birth'];?></span></h4>
                        <h4 class = "mt-3">Gender: <span class = "constant-spacing"><?php echo $row['gender'];?></span></h4>
                        <h4 class = "mt-3">Address: <span class = "constant-spacing"><?php echo $row['address'];?></span></h4>
                        <h4 class = "mt-3">Emoployee ID: <span class = "constant-spacing"><?php echo $row['employee_id'];?></span></h4>
                        <h4 class = "mt-3">PAN NO.: <span class = "constant-spacing"><?php echo $row['Pan_no'];?></span></h4>
                    </div>
                    <div class = "col mt-3 ms-3 color-gray">
                        <h3 class = "mt-3">Acadmic Details:</h3>
                        <h4 class = "mt-4">Area of Specialization: <span class = "constant-spacing"><?php echo $row['area_of_specialization'];?></span></h4>
                        <h4 class = "mt-3">Highest Qualification: <span class = "constant-spacing"><?php echo $row['highest_qualification'];?></span></h4>
                        <h4 class = "mt-3">Passing Year: <span class = "constant-spacing"><?php echo $row['passing_year'];?></span></h4>
                        <h4 class = "mt-3">Date Of Joining: <span class = "constant-spacing"><?php echo $row['date_of_joining'];?></span></h4>
                        <?php if ($row['promotion_date'] !== null) {?> 
                            <h4 class = "mt-3">Promotion Date: <span class = "constant-spacing"><?php echo $row['promotion_date'];?></span></h4>
                        <?php } ?>    
                        <?php if ($row['phd_univer_name'] !== null) {?> 
                            <h4 class = "mt-3">PHD University Name: <span class = "constant-spacing"><?php echo $row['phd_univer_name'];?></span></h4>
                        <?php } ?>
                        <?php if ($row['date_of_registration'] !== null) {?> 
                            <h4 class = "mt-3">PHD University Name: <span class = "constant-spacing"><?php echo $row['date_of_registration'];?></span></h4>
                        <?php } ?>
                        <h4 class = "mt-3">Number of Research Paper: <span class = "constant-spacing"><?php echo $row['number_of_research_paper'];?></span></h4>
                    </div>
                </div>
                <div class = "col-12 color-gray">
                    <h3 class = "mt-5 left-margin">Uploaded Files</h3>
                    <h4 class = "mt-3 left-margin-h4">Joining Letter<span>
                        <button type = "button" class = "btn btn-primary right-margin" data-bs-toggle = "modal" data-bs-target = "#joiningModal"><i class = "fa-solid fa-eye"></i> Click Here</button>
                        </span>
                    </h4>
                    <!-- The Modal -->
                    <div class="modal" id="joiningModal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Your Joining Letter</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <img src= <?php echo $row['joining_report_file_path'] ?> class = "set-dimension" alt = "Joining Report"></br>
                                    <a href = <?php echo $row['joining_report_file_path'] ?> target = "_blank">Click here to Open image in full size in new tab</a>
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h4 class = "mt-3 left-margin-h4">Offer Letter<span>
                        <button type = "button" class = "btn btn-primary right-margin" data-bs-toggle = "modal" data-bs-target = "#offerModal"><i class = "fa-solid fa-eye"></i> Click Here</button>
                        </span>
                    </h4>
                    <!-- The Modal -->
                    <div class="modal" id="offerModal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Your Offer Letter</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <img src= <?php echo $row['offer_letter_file_path'] ?> class = "set-dimension" alt = "Offer Letter"></br>
                                    <a href = <?php echo $row['offer_letter_file_path'] ?> target = "_blank">Click here to Open image in full size in new tab</a>
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h4 class = "mt-3 left-margin-h4">Higher Degree Certificate<span>
                        <button type = "button" class = "btn btn-primary right-margin" data-bs-toggle = "modal" data-bs-target = "#higherdegreeModal"><i class = "fa-solid fa-eye"></i> Click Here</button>
                        </span>
                    </h4>
                    <!-- The Modal -->
                    <div class="modal" id="higherdegreeModal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Your Higher Degree Certificate</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <img src= <?php echo $row['higher_degree_certificate_file_path'] ?> class = "set-dimension" alt = "Higher Degree Certificate"></br> 
                                    <a href = <?php echo $row['higher_degree_certificate_file_path'] ?> target = "_blank">Click here to Open image in full size in new tab</a>
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- The Modal -->
                    <div class="modal" id="salaryModal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Your Salary Slip</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <?php if ($row['salary_slip_file_path']) { ?>
                                        <img src= <?php echo $row['salary_slip_file_path'] ?> class = "set-dimension" alt = "Salary Slip"></br>
                                        <a href = <?php echo $row['salary_slip_file_path'] ?> target = "_blank">Click here to Open image in full size in new tab</a>
                                    <?php } else { ?>
                                        <h5>File not Uploaded Yet!</h5>
                                        <a href = "#">Click Here to Upload the File</a>
                                    <?php }
                                    ?>
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h4 class = "mt-3 mb-5 left-margin-h4">Award Certificate<span>
                        <button type = "button" class = "btn btn-primary right-margin" data-bs-toggle = "modal" data-bs-target = "#awardModal"><i class = "fa-solid fa-eye"></i> Click Here</button>
                        </span>
                    </h4>
                    <!-- The Modal -->
                    <div class="modal" id="awardModal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Your Award Certificate</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <?php if ($row['certificate_file_path']) { ?>
                                        <img src= <?php echo $row['certificate_file_path'] ?> class = "set-dimension" alt = "Award Certificate"></br>
                                        <a href = <?php echo $row['certificate_file_path'] ?> target = "_blank">Click here to Open image in full size in new tab</a>
                                    <?php } else { ?>
                                        <h5>File not Uploaded Yet!</h5>
                                        <a href = "#">Click Here to Upload the File</a>
                                    <?php } ?>
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php 
                } else {
                    header('Location: /project/root/sign_in_form.php');
                }   
            } else { ?>
                <a href = "logout.php" class = "text-center edit">You are not authorized. Log in through Top Right dropdown.</a>
                <?php
            }
        ?>
    </div>
    </div>
    <!-- </body> -->
<?php 
    include('C:/xampp/htdocs/project/root/include/footer.html');
?>