<?php 
    include('include/header.php');
    // if(isset($_SESSION['userEmail'])) {
    //     $email_up = $_SESSION['userEmail']; 
    // }
?>
    <div class="content-box">
          <!-- left nav sec  -->
          <nav class="navbar">
            <ul class="navbar-nav text-dark">
              <a href="home.php" style = "text-decoration: none;"><li class="nav-item active text-white">Home</li></a>
              <a href="assets/php/profile_page.php" style = "text-decoration: none;"><li class="nav-item text-white">Profile</li></a>
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
    <link rel='stylesheet' type='text/css' media='screen' href='assets/css/style.css'>
    <script src = "assets/javascript/toggleCheckbox.js"></script>
    <div class = "container-fluid h-100">
        <div class = "row form-styling">
            <div class = "col-sm-12 col-md-12 col-lg-12 col-12 f-20 me-5 mt-4">
                <h2 class = "text-center custom-color">Sign up</h2>
            </div>
            <hr/>
            <div class = "col-sm-12 col-md-12 col-lg-12 col-12 f-20">
                
                <form action = "redirect.html">
                    <div class = "d-grid">
                        <div class = "mt-4">
                            <span>
                                <i class = "fa-solid fa-file"></i>
                                <label for = "profile_picture" >Profile Picture</label>
                            </span>
                            <h5 class = "font-small mt-2">Upload File Image Format(MAX SIZE:- 10MB)</h5>
                            <div class = "d-flex mt-2">
                                <input type = "file" class = "form-control w-75" id = "profile_pic" name = "profile_pic" accept=".png,.jpg,.jpeg" required>
                                <button type = "button" id = "upload_profile_pic" class = "btn btn-primary rounded-pill ms-auto me-4">Upload File</button>
                                <script>
                                    const join_button = document.getElementById('profile_pic');
                                    join_button.addEventListener('click', upload_file.bind(null,'<?php if(isset($_SESSION['userEmail'])) {$email_up = $_SESSION['userEmail']; echo $email_up;}?>','upload_profile_pic','profile_pic','success1'));
                                </script>
                            </div>
                            <p id="success1"></p>
                        </div>
                        <div class = "mt-4">
                            <span>
                                <i class = "fa-solid fa-file"></i>
                                <label for = "joining_report" >Joining Report</label>
                            </span>
                            <h5 class = "font-small mt-2">Upload File in PDF or Image Format(MAX SIZE:- 10MB)</h5>
                            <div class = "d-flex mt-2">
                                <input type = "file" class = "form-control w-75" id = "joining_report" name = "joining_report" accept=".png,.jpg,.jpeg,.pdf" required>
                                <button type = "button" id = "upload_joining_report" class = "btn btn-primary rounded-pill ms-auto me-4">Upload File</button>
                                <script>
                                    const join_button5 = document.getElementById('joining_report');
                                    join_button5.addEventListener('click', upload_file.bind(null,'<?php if(isset($_SESSION['userEmail'])) {$email_up = $_SESSION['userEmail']; echo $email_up;}?>','upload_joining_report','joining_report','success2'));
                                </script>
                            </div>
                            <p id="success2"></p>
                        </div>
                        <div class = "mt-4">
                            <span>
                                <i class = "fa-solid fa-file"></i>
                                <label for = "offer_letter" >Offer Letter</label>
                            </span>
                            <h5 class = "font-small mt-2">Upload File in PDF or Image Format(MAX SIZE:- 10MB)</h5>
                            <div class = "d-flex mt-2">
                                <input type = "file" class = "form-control w-75" id = "offer_letter" name = "offer_letter" accept=".png,.jpg,.jpeg,.pdf" required>
                                <button type = "button" id = "upload_offer_letter" class = "btn btn-primary rounded-pill ms-auto me-4">Upload File</button>
                                <script>
                                    const join_button1 = document.getElementById('offer_letter');
                                    join_button1.addEventListener('click', upload_file.bind(null,'<?php if(isset($_SESSION['userEmail'])) {$email_up = $_SESSION['userEmail']; echo $email_up;}?>','upload_offer_letter','offer_letter','success3'));
                                </script>
                            </div>
                            <p id="success3"></p>
                        </div>
                        <div class = "mt-4">
                            <span>
                                <i class = "fa-solid fa-file"></i>
                                <label for = "higher_degree_certificate" >Higher Degree Certificate</label>
                            </span>
                            <h5 class = "font-small mt-2">Upload File in PDF or Image Format(MAX SIZE:- 10MB)</h5>
                            <div class = "d-flex mt-2">
                                <input type = "file" class = "form-control w-75" id = "higher_degree_certificate" name = "higher_degree_certificate" accept=".png,.jpg,.jpeg,.pdf" required>
                                <button type = "button" id = "upload_higer_degree_certificate" class = "btn btn-primary rounded-pill ms-auto me-4">Upload File</button>
                                <script>
                                    const join_button2 = document.getElementById('higher_degree_certificate');
                                    join_button2.addEventListener('click', upload_file.bind(null,'<?php if(isset($_SESSION['userEmail'])) {$email_up = $_SESSION['userEmail']; echo $email_up;}?>','upload_higer_degree_certificate','higher_degree_certificate','success4'));
                                </script>
                            </div>
                            <p id="success4"></p>
                        </div>
                        <div class = "mt-4">
                            <span>
                                <i class = "fa-solid fa-file"></i>
                                <label for = "salary_slip" >Salary Slip(Recent)</label>
                            </span>
                            <h5 class = "font-small mt-2">Upload File in PDF or Image Format(MAX SIZE:- 10MB)</h5>
                            <div class = "d-flex mt-2">
                                <input type = "file" class = "form-control w-75" id = "salary_slip" name = "salary_slip" accept=".png,.jpg,.jpeg,.pdf">
                                <button type = "button" id = "upload_salary_slip" class = "btn btn-primary rounded-pill ms-auto me-4">Upload File</button>
                                <script>
                                    const join_button3 = document.getElementById('salary_slip');
                                    join_button3.addEventListener('click', upload_file.bind(null,'<?php if(isset($_SESSION['userEmail'])) {$email_up = $_SESSION['userEmail']; echo $email_up;}?>','upload_salary_slip','salary_slip','success5'));
                                </script>
                            </div>
                            <p id="success5"></p>
                        </div>
                        <div class = "mt-4">
                            <span>
                                <i class = "fa-solid fa-file"></i>
                                <label for = "extension_awards" >Certificate/Awards you earned from extension activities</label>
                            </span>
                            <h5 class = "font-small mt-2">Upload File in PDF or Image Format(MAX SIZE:- 10MB)</h5>
                            <div class = "d-flex mt-2">
                                <input type = "file" class = "form-control w-75" id = "extension_awards" name = "extension_awards" accept=".png,.jpg,.jpeg,.pdf">
                                <button type = "button" id = "upload_certificates" class = "btn btn-primary rounded-pill ms-auto me-4">Upload File</button>
                                <script>
                                    const join_button4 = document.getElementById('extension_awards');
                                    join_button4.addEventListener('click', upload_file.bind(null,'<?php if(isset($_SESSION['userEmail'])) {$email_up = $_SESSION['userEmail']; echo $email_up;}?>','upload_certificates','extension_awards','success6'));
                                </script>
                            </div>
                            <p id="success6"></p>
                        </div>
                        <div class = "mt-5">
                            <h5>I hereby declare that all the details filled are correct and exact.</h5>
                            <label class = "form-check-label" >
                                <input type = "checkbox" class = "form-check-input mt-2" id = "agreeCheckbox" required> I agree
                            </label>
                        </div>
                        <button class = "btn btn-primary d-block mt-5 mb-5" id = "submitButton" type = "submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
<?php 
    include('include/footer.html')
?>