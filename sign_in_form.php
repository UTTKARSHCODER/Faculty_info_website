<?php 
include('include/header.php');
?>
    <!-- User Details -->
    <div class = "container-fluid h-100 bg-gray">
        <div class = "row form-styling">
            <div class = "col-sm-12 col-md-12 col-lg-12 col-12 f-20 me-5 mt-4">
                <h2 class = "text-center custom-color">Sign up</h2>
            </div>
            <hr/>
            
            <form action = "assets/php/form_info.php" method = "post">
                <div class = "row">
                    <div class = "col f-20 ms-2">
                        <!-- <div class = "d-grid"> -->
                        <input type = "hidden" name = "form_type" value = "personal_details">
                        <div class = "mt-4">
                            <span>
                                <i class = "fa-solid fa-user"></i>
                                <label for = "name" class = "form-label"><b>Name</b></label>
                            </span>
                            <input type = "text" class = "form-control custom-back" id = "name" placeholder = "Enter your Name" name = "name" required>
                        </div>
                        <div class = "mt-4">
                            <span>
                                <i class = "fa-solid fa-envelope"></i>
                                <label for = "email" class = "form-label"><b>Email</b></label>
                            </span>
                            <input type = "email" class = "form-control custom-back" id = "email" placeholder = "Enter your personal Email Adddress" name = "email" required>
                        </div>
                        <div class = "mt-4">
                            <span>
                                <i class = "fa-solid fa-phone"></i>
                                <label for = "co_number" class = "form-label"><b>Contact Number</b> </label>
                            </span>
                            <input type = "number" class = "form-control custom-back" id = "co_number" placeholder = "Enter your Mobile Number" name = "co_number" required>
                        </div>
                        <div class = "mt-4">
                            <span>
                                <i class = "fa-solid fa-calendar"></i>
                                <label for = "dob" class = "form-label"><b>Date of Birth</b> </label>
                            </span>
                            <input type = "date" class = "form-control custom-back" id = "dob" name = "dob" required>
                        </div>

                        <div class = "d-flex column-gap-4 mt-4">
                            <span>
                                <i class = "fa-solid fa-person"></i>
                                <label for = "gender" class = "form-label" ><b>Gender</b> </label>
                            </span>
                            <div class = "form-check">
                                <input type = "radio" class = "form-check-input" id = "radio1" name = "optradio" value = "male">
                                <label class = "form-check-label" for = "radio1"><b>Male</b></label>
                            </div>
                            <div class = "form-check">
                                <input type = "radio" class = "form-check-input" id = "radio2" name = "optradio" value = "female">
                                <label class = "form-check-label" for = "radio1"><b>Female</b></label>
                            </div>
                            <div class = "form-check">
                                <input type = "radio" class = "form-check-input" id = "radio3" name = "optradio" value = "other">
                                <label class = "form-check-label" for = "radio1"><b>Others</b></label>
                            </div>
                        </div>
                        <div class = "mt-4">
                            <span>
                                <i class = "fa-solid fa-location-dot"></i>
                                <label for = "address" class = "form-label"><b>Address:-</b> </label>
                            </span>
                            <textarea type = "text" class = "form-control mt-2 custom-back" rows = "4" id = "address" placeholder = "Enter your permanent Address" name = "address" required></textarea>
                        </div>
                    </div>
                    <div class = "col f-20 ms-2">
                        <div class = "mt-4">
                            <span>
                                <i class = "fa-solid fa-briefcase"></i>
                                <label for = "designation" class = "form label"><b>Designation</b> </label>
                            </span>
                            <input type = "text" class = "form-control mt-2 custom-back" id = "designation" placeholder = "Enter your Designation/Post" name = "designation" required>
                        </div>
                        <div class = "mt-4">
                            <span>
                                <i class = "fa-solid fa-building"></i>
                                <label for = "department" class = "form-label"><b>Department</b> </label>
                            </span>
                            <div class = "mt-3">
                            <select class = "input custom-back" name = "branchSelect" required>
                                <option value = ""></option>
                                <option value = "Computer Science & Engineering">Computer Science & Engineering</option>
                                <option value = "Computer Science & Engineering(AI)">Computer Science & Engineering(AI)</option>
                                <option value = "Computer Science & Engineering(DS)">Computer Science & Engineering(DS)</option>
                                <option value = "Computer Science & Engineering(IOT)">Computer Science & Engineering(IOT)</option>
                                <option value = "Basic Sciences and Humanities">Basic Sciences and Humanities</option>
                                <option value = "Civil Engineering">Civil Engineering</option>
                                <option value = "Electronics & Communication Engineering">Electronics & Communication Engineering</option>
                                <option value = "Electrical Engineering">Electrical Engineering</option>
                                <option value = "Information Technology">Information Technology</option>
                                <option value = "Mechnical Engineering">Mechnical Engineering</option>
                                <option value = "Management Studies">Management Studies</option>
                                <option value = "Pharmacy">Pharmacy</option>
                            </select>
                            </div>
                        </div>
                        <div class = "mt-4">
                            <span>
                                <i class = "fa-solid fa-star"></i>
                                <label for = "aos" class = "form-label"><b>Area of Specializatoin</b> </label>
                            </span>
                            <input type = "text" class = "form-control custom-back" id = "aos" placeholder = "Enter your field of Specializatoin" name = "aos" required>
                        </div>
                        <div class = "mt-4">
                            <span>
                                <i class = "fa-solid fa-id-card"></i>
                                <label for = "emp_id" class = "form-label"><b>Employee ID</b> </label>
                            </span>
                            <input type = "text" class = "form-control custom-back" id = "emp_id" placeholder = "Enter your employee ID" name = "emp_id" required>
                        </div>
                        <div class = "mt-4">
                            <span>
                                <i class = "fa-solid fa-user-tie"></i>
                                <label for = "highest Qualification" class = "form-label"><b>Highest Qualification</b> </label>
                            </span>
                            <input type = "text" class = "form-control custom-back" id = "hq" placeholder = "Enter your highest degree" name = "hq" required>
                        </div>
                        <div class = "mt-4">
                            <span>
                                <i class = "fa-solid fa-calendar"></i>
                                <label for = "pshd" class = "form-label"><b>Passing Year of Highest degree</b> </label>
                            </span>
                            <input type = "number" class = "form-control custom-back" id = "pshd" placeholder = "Enter your passing year" name = "pshd" required>
                        </div>
                    </div>
                    <div class = "col f-20 ms-2">
                        <div class = "mt-4">
                            <span>
                                <i class = "fa-solid fa-id-card-clip"></i>
                                <label for = "pan number" class = "form-label"><b>PAN No.</b> </label>
                            </span>
                            <input type = "text" class = "form-control custom-back" id = "panno" placeholder = "Enter your PAN No." name = "panno" required>
                        </div>
                        <div class = "mt-4">
                            <span>
                                <i class = "fa-solid fa-calendar"></i>
                                <label for = "date of Joining" class = "form-label"><b>Date of Joining</b> </label>
                            </span>
                            <input type = "date" class = "form-control custom-back" id = "doj" name = "doj" required>
                        </div>
                    
                        <div class = "mt-4">
                            <span>
                                <i class = "fa-solid fa-calendar"></i>
                                <label for = "date of Promotion" class = "form-label"><b>Promotion Date(If any)</b></label>
                            </span>
                            <input type = "date" class = "form-control custom-back" id = "dop" name = "dop">
                        </div>
                        <div class = "mt-4">
                            <span>
                                <i class = "fa-solid fa-stamp"></i>
                                <label for = "PHD Details" class = "form-label"><b>PhD Details(If pursuing now)</b> </label>
                            </span>
                            <input type = "text" class = "form-control custom-back" id = "phdun" placeholder = "Enter name of the University from where you are pursuing your PhD" name = "phdun">
                        </div>
                        <div class = "mt-4">
                            <span>
                                <i class = "fa-solid fa-calendar"></i>
                                <label for = "date of Registration" class = "form-label"><b>Date of Registration(PhD degree)</b> </label>
                            </span>
                            <input type = "date" class = "form-control custom-back" id = "dor" name = "dor">
                        </div>

                        <div class = "mt-4">
                            <span>
                                <i class = "fa-solid fa-file"></i>
                                <label for = "number of Research Papers" class = "form-label"><b>Research Paper Details</b> </label>
                            </span>
                            <input type = "number" class = "form-control custom-back" id = "nrpp" placeholder = "Enter number of Research Paper Publication" name = "nrpp" required>
                            <a href = "sign_in_form2.php">Redirect to 2nd Form</a>
                        </div>
                    </div>   
                </div>
                <div class = "d-flex column-gap-4 mt-4 mb-4" style = "margin-left: 565px;">
                            <a href = "index.html"><button class = "btn btn-primary rounded-pill cancel-button" style = "margin-right: 75px; width: 100px; height: 50px;" >Cancel</button></a>  
                            <button class = "btn btn-primary rounded-pill next-button" style = "margin-left: 75px; width: 100px; height: 50px;" type = "submit">Next</button>
                </div>
            </form>
            
        </div>
    </div>
</body>
</html>