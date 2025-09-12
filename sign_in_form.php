<?php 
include('include/header.php');
include('config/config.php');
?>
<!-- User Details -->
<div class="container-fluid h-100 bg-gray">
    <div class="row form-styling">
        <div class="col-sm-12 col-md-12 col-lg-12 col-12 f-20 me-5 mt-4">
            <h2 class="text-center custom-color">
                <?php if(isset($_GET['job']) && $_GET['job'] === "save") { echo "Manage Your Profile"; } else { echo "Sign up"; }?>
            </h2>
        </div>
        <hr />

        <form
            action="assets/php/form_info.php?job=<?php if(isset($_GET['job'])) { echo $_GET['job']; } else { echo '';} ?>"
            id="myForm" method="post">
            <div class="row">
                <div class="col f-20 ms-2">
                    <!-- <div class = "d-grid"> -->
                    <?php 
                            $row = null;
                            if (isset($_SESSION['userEmail'])) {
                                $email = $_SESSION['userEmail'];
                                $sql = "SELECT * FROM `detailed_faculty_info` WHERE `detailed_faculty_info`.`email` = '" . $email . "'";
                                $result = mysqli_query($conn,$sql); 
                                if (mysqli_num_rows($result) > 0) {
                                    $row = mysqli_fetch_assoc($result); }?>
                    <div class="mt-4" id="name_check">
                        <div class="row">
                            <div class="col-md-4">
                                <span>
                                    <i class="fa-solid fa-user-circle"></i>
                                    <label for="name" class="form-label"><b>Salutation</b><span class="ms-1"
                                            style="color: red;">*</span></label>
                                </span>
                                <select class="form-control custom-back" name="saluSelect" id="saluSelect" required>
                                    <option value="" selected disabled>Select your Salutation</option>
                                    <option value="Dr."
                                        <?php if(isset($row['salutation'])) { echo $row['salutation'] === 'Dr.' ? 'selected' : '' ;}?>>
                                        Dr.</option>
                                    <option value="Mr."
                                        <?php if(isset($row['salutation'])) { echo $row['salutation'] === 'Mr.' ? 'selected' : '' ;}?>>
                                        Mr.</option>
                                    <option value="Mrs."
                                        <?php if(isset($row['salutation'])) { echo $row['salutation'] === 'Mrs.' ? 'selected' : '' ;}?>>
                                        Mrs.</option>
                                    <option value="Ms."
                                        <?php if(isset($row['salutation'])) { echo $row['salutation'] === 'Ms.' ? 'selected' : '' ;}?>>
                                        Ms.</option>
                                </select>
                            </div>
                            <div class="col-md-8">
                                <span>
                                    <i class="fa-solid fa-user"></i>
                                    <label for="name" class="form-label"><b>Name</b><span class="ms-1"
                                            style="color: red;">*</span></label>
                                </span>
                                <input type="text" class="form-control custom-back" id="name"
                                    value="<?= $row['name'] ?? '' ?>" placeholder="Enter your Name" name="name"
                                    oninput="validateForm('name_check')" required>
                            </div>
                        </div>
                        <b><span class="formerrors" style="color:red"></span></b>
                    </div>
                    <div class="mt-4">
                        <span>
                            <i class="fa-solid fa-envelope"></i>
                            <label for="email" class="form-label"><b>Email(read-only)</b><span class="ms-1" ;
                                    style="color: red;">*</span></label>
                        </span>
                        <input type="email" class="form-control custom-back" id="email"
                            value="<?= $row['email'] ?? '' ?>" placeholder="Enter your personal Email Adddress"
                            name="email" readonly><b><span class="formerrors" style="color:red"></span></b>
                    </div>
                    <div class="mt-4" id="con_number">
                        <span>
                            <i class="fa-solid fa-phone"></i>
                            <label for="co_number" class="form-label"><b>Contact Number</b><span class="ms-1" ;
                                    style="color: red;">*</span></label>
                        </span>
                        <input type="text" class="form-control custom-back" id="co_number"
                            value="<?= $row['contact_number'] ?? '' ?>" placeholder="Enter your Mobile Number"
                            name="co_number" maxlength="10" oninput="validateForm('con_number')" required><b><span
                                class="formerrors" style="color:red"></span></b>
                    </div>
                    <div class="mt-4" id="dob_new">
                        <span>
                            <i class="fa-solid fa-calendar"></i>
                            <label for="dob" class="form-label"><b>Date of Birth</b><span class="ms-1" ;
                                    style="color: red;">*</span></label>
                        </span>
                        <input type="date" class="form-control custom-back" id="dob"
                            value="<?= $row['date_of_birth'] ?? '' ?>" min="1945-01-01" max="2003-12-31" name="dob"
                            onchange="changeDropdown()" required><b><span class="formerrors"
                                style="color:red"></span></b>
                    </div>

                    <div class="d-flex column-gap-4 mt-4">
                        <span>
                            <i class="fa-solid fa-person"></i>
                            <label for="gender" class="form-label"><b>Gender</b><span class="ms-1" ;
                                    style="color: red;">*</span></label>
                        </span>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="radio1" name="optradio" value="male"
                                <?php if(isset($row['gender'])) { echo $row['gender'] === "male" ? 'checked' : '' ;} ?>>
                            <label class="form-check-label" for="radio1"><b>Male</b></label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="radio2" name="optradio" value="female"
                                <?php if(isset($row['gender'])) { echo $row['gender'] === "female" ? 'checked' : '';} ?>>
                            <label class="form-check-label" for="radio1"><b>Female</b></label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="radio3" name="optradio" value="others"
                                <?php if(isset($row['gender'])) { echo $row['gender'] === "others" ? 'checked' : '' ;}?>>
                            <label class="form-check-label" for="radio1"><b>Others</b></label>
                        </div>
                    </div>
                    <div id="gen"><b><span class="formerrors" style="color:red"></span></b></div>
                    <div class="mt-4" id="add">
                        <span>
                            <i class="fa-solid fa-location-dot"></i>
                            <label for="address" class="form-label"><b>Address:-</b><span class="ms-1" ;
                                    style="color: red;">*</span></label>
                        </span>
                        <textarea type="text" class="form-control mt-2 custom-back" rows="4" id="address"
                            placeholder="Enter your permanent Address" name="address" oninput="validateForm('add')"
                            required><?= $row['address'] ?? '' ?></textarea><b><span class="formerrors"
                                style="color:red"></span></b>
                    </div>
                </div>
                <div class="col f-20 ms-2">
                    <div class="mt-4" id="desig">
                        <span>
                            <i class="fa-solid fa-briefcase"></i>
                            <label for="designation" class="form-label"><b>Designation</b><span class="ms-1" ;
                                    style="color: red;">*</span></label>
                        </span>

                        <select class="form-control custom-back" name="deptSelect" id="deptSelect" required>
                            <option value="" selected disabled>Select your Designation</option>
                            <option value="Assistant Professor-1"
                                <?php if(isset($row['designation'])) { echo $row['designation'] === 'Assistant Professor-1' ? 'selected' : '' ;}?>>
                                Assistant Professor-1</option>
                            <option value="Assistant Professor-2"
                                <?php if(isset($row['designation'])) { echo $row['designation'] === 'Assistant Professor-2' ? 'selected' : '';} ?>>
                                Assistant Professor-2</option>
                            <option value="Associate Professor-1"
                                <?php if(isset($row['designation'])) { echo $row['designation'] === 'Associate Professor-1' ? 'selected' : '' ;}?>>
                                Associate Professor-1</option>
                            <option value="Associate Professor-2"
                                <?php if(isset($row['designation'])) { echo $row['designation'] === 'Associate Professor-2' ? 'selected' : '';} ?>>
                                Associate Professor-2</option>
                            <option value="Professor"
                                <?php if(isset($row['designation'])) { echo $row['designation'] === 'Professor' ? 'selected' : '';} ?>>
                                Professor</option>
                        </select><b><span class="formerrors" style="color:red"></span></b>
                    </div>
                    <div class="mt-4" id="depart">
                        <span>
                            <i class="fa-solid fa-building"></i>
                            <label for="department" class="form-label"><b>Department</b><span class="ms-1" ;
                                    style="color: red;">*</span></label>
                        </span>

                        <select class="form-control custom-back" name="branchSelect" id="branchSelect" required>
                            <option value="" selected disabled>Select your Department</option>
                            <option value="Computer Science & Engineering"
                                <?php if(isset($row['department'])) { echo $row['department'] === 'Computer Science & Engineering' ? 'selected' : '' ;}?>>
                                Computer Science & Engineering</option>
                            <option value="Computer Science & Engineering(AI)"
                                <?php if(isset($row['department'])) { echo $row['department'] === 'Computer Science & Engineering(AI)' ? 'selected' : '';} ?>>
                                Computer Science & Engineering(AI)</option>
                            <option value="Computer Science & Engineering(DS)"
                                <?php if(isset($row['department'])) { echo $row['department'] === 'Computer Science & Engineering(DS)' ? 'selected' : '';} ?>>
                                Computer Science & Engineering(DS)</option>
                            <option value="Computer Science & Engineering(IOT)"
                                <?php if(isset($row['department'])) { echo $row['department'] === 'Computer Science & Engineering(IOT)' ? 'selected' : '';} ?>>
                                Computer Science & Engineering(IOT)</option>
                            <!-- <option value = "Basic Sciences and Humanities">Basic Sciences and Humanities</option>
                                <option value = "Civil Engineering">Civil Engineering</option>
                                <option value = "Electronics & Communication Engineering">Electronics & Communication Engineering</option>
                                <option value = "Electrical Engineering">Electrical Engineering</option>
                                <option value = "Information Technology">Information Technology</option>
                                <option value = "Mechnical Engineering">Mechnical Engineering</option>
                                <option value = "Management Studies">Management Studies</option>
                                <option value = "Pharmacy">Pharmacy</option> -->
                        </select><b><span class="formerrors" style="color:red"></span></b>
                    </div>
                    <div class="mt-4" id="area_of">
                        <span>
                            <i class="fa-solid fa-star"></i>
                            <label for="aos" class="form-label"><b>Area of Specialization</b><span class="ms-1" ;
                                    style="color: red;">*</span></label>
                        </span>

                        <select class="form-control custom-back" name="aosSelect" id="aosSelect" required>
                            <option value="" selected disabled>Select your Area of Specialization</option>
                            <option value="Artificial Intelligence & Machine Learning"
                                <?php if(isset($row['area_of_specialization'])) { echo $row['area_of_specialization'] === 'Artificial Intelligence & Machine Learning' ? 'selected' : '' ;}?>>
                                Artificial Intelligence & Machine Learning</option>
                            <option value="Data & Information Systems"
                                <?php if(isset($row['area_of_specialization'])) { echo $row['area_of_specialization'] === 'Data & Information Systems' ? 'selected' : '';} ?>>
                                Data & Information Systems</option>
                            <option value="Cybersecurity & Networks"
                                <?php if(isset($row['area_of_specialization'])) { echo $row['area_of_specialization'] === 'Cybersecurity & Networks' ? 'selected' : '' ;}?>>
                                Cybersecurity & Networks</option>
                            <option value="Software Systems & Development"
                                <?php if(isset($row['area_of_specialization'])) { echo $row['area_of_specialization'] === 'Software Systems & Development' ? 'selected' : '';} ?>>
                                Software Systems & Development</option>
                            <option value="Computer Systems & Architecture"
                                <?php if(isset($row['area_of_specialization'])) { echo $row['area_of_specialization'] === 'Computer Systems & Architecture' ? 'selected' : '';} ?>>
                                Computer Systems & Architecture</option>
                            <option value="Mathematics"
                                <?php if(isset($row['area_of_specialization'])) { echo $row['area_of_specialization'] === 'Mathematics' ? 'selected' : '';} ?>>
                                Mathematics</option>
                            <option value="Theoretical Computer Science"
                                <?php if(isset($row['area_of_specialization'])) { echo $row['area_of_specialization'] === 'Theoretical Computer Science' ? 'selected' : '';} ?>>
                                Theoretical Computer Science</option>
                            <option value="other" id="aosOther">Other</option>
                            <?php if(isset($row['area_of_specialization'])) { ?>
                            <option value=" <?= $row['area_of_specialization']  ?> " selected>
                                <?= $row['area_of_specialization'] . ' (Recently Chosen)'?></option>
                            <?php } ?>
                        </select><b><span class="formerrors" style="color:red"></span></b>
                    </div>
                    <div id="otherInput"></div>
                    <div id="otherInputError" style="color: red;"></div>
                    <div class="mt-4" id="empId">
                        <span>
                            <i class="fa-solid fa-id-card"></i>
                            <label for="emp_id" class="form-label"><b>Employee ID</b><span class="ms-1" ;
                                    style="color: red;">*</span></label>
                        </span>
                        <input type="number" class="form-control custom-back" id="emp_id"
                            value="<?= $row['employee_id'] ?? '' ?>" placeholder="Enter your employee ID" name="emp_id"
                            pattern="[0-9]+" required><b><span class="formerrors" style="color:red"></span></b>
                    </div>
                    <div class="mt-4" id="highQ">
                        <span>
                            <i class="fa-solid fa-user-tie"></i>
                            <label for="highest Qualification" class="form-label"><b>Highest Qualification</b><span
                                    class="ms-1" ; style="color: red;">*</span></label>
                        </span>
                        <select class="form-control custom-back" name="hq" id="hq" required>
                            <option value="" selected disabled>Select your Highest Qualification</option>
                            <option value="B.E. / B.Tech"
                                <?php if(isset($row['highest_qualification'])) { echo $row['highest_qualification'] === 'B.E. / B.Tech' ? 'selected' : '' ;}?>>
                                B.E. / B.Tech</option>
                            <option value="M.E. / M.Tech"
                                <?php if(isset($row['highest_qualification'])) { echo $row['highest_qualification'] === 'M.E. / M.Tech' ? 'selected' : '';} ?>>
                                M.E. / M.Tech</option>
                            <option value="M.S."
                                <?php if(isset($row['highest_qualification'])) { echo $row['highest_qualification'] === 'M.S.' ? 'selected' : '' ;}?>>
                                M.S.</option>
                            <option value="MBA"
                                <?php if(isset($row['highest_qualification'])) { echo $row['highest_qualification'] === 'MBA' ? 'selected' : '';} ?>>
                                MBA</option>
                            <option value="Ph.D."
                                <?php if(isset($row['highest_qualification'])) { echo $row['highest_qualification'] === 'Ph.D.' ? 'selected' : '';} ?>>
                                Ph.D.</option>
                            <option value="Post-Doctoral Research (Post-Doc)"
                                <?php if(isset($row['highest_qualification'])) { echo $row['highest_qualification'] === 'Post-Doctoral Research (Post-Doc)' ? 'selected' : '';} ?>>
                                Post-Doctoral Research (Post-Doc)</option>
                            <option value="other" id="hqOther">Other</option>
                            <?php if(isset($row['highest_qualification'])) { ?>
                            <option value=" <?= $row['highest_qualification'] ?> " selected>
                                <?= $row['highest_qualification'] . ' (Recently Chosen)' ?></option>
                            <?php } ?>
                        </select><b><span class="formerrors"></span></b>
                        <span class="formerrors" style="color:red"></span></b>
                    </div>
                    <div id="otherhqInput"></div>
                    <div id="otherhqInputError" style="color: red;"></div>
                    <div class="mt-4" id="passHighDegree">
                        <span>
                            <i class="fa-solid fa-calendar"></i>
                            <label for="pshd" class="form-label"><b>Passing Year of Highest degree</b><span class="ms-1"
                                    ; style="color: red;">*</span></label>
                        </span>
                        <!-- <input type = "number" class = "form-control custom-back"  value = "<?= $row['passing_year'] ?? '' ?>" placeholder = "Enter your passing year" required> -->
                        <select class="form-control" id="pshd" name="pshd" required>
                            <script>
                            function populateYearOptions(dobValue) {
                                const selectYear = document.getElementById('pshd');
                                const dateObject = new Date(dobValue);
                                const yearBirth = dateObject.getFullYear();
                                const val = <?= $row['passing_year'];?>;
                                if (val >= yearBirth + 18) {
                                    selectYear.innerHTML = '<option value = "' + val + '"selected>' + val + '</option>';
                                } else {
                                    selectYear.innerHTML = '<option value = ""selected disabled>Select Year</option>';
                                }

                                if (!dobValue) {
                                    return;
                                }

                                for (let year = yearBirth + 18; year <= 2025; year++) {
                                    const option = document.createElement('option');
                                    option.value = year;
                                    option.textContent = year;
                                    selectYear.appendChild(option);
                                }
                            }

                            const initialDob = document.getElementById('dob').value;
                            populateYearOptions(initialDob);

                            document.getElementById('dob').addEventListener('input', function() {
                                const updatedDob = this.value;
                                populateYearOptions(updatedDob);
                            });
                            </script>
                            // <?php
                            //     $savedValue = isset($row['passing_year']) ? $row['passing_year'] : null;
                            //     for ($i = 1980; $i <= 2020; $i++) {
                            //     $selected = ($i == $savedValue) ? 'selected' : '';
                            //     echo "<option value=\"$i\" $selected>$i</option>";
                            //     }
                            // ?>
                        </select><b><span class="formerrors" style="color:red"></span></b>
                    </div>
                </div>
                <div class="col f-20 ms-2" id="PanNum">
                    <div class="mt-4">
                        <span>
                            <i class="fa-solid fa-id-card-clip"></i>
                            <label for="pan number" class="form-label"><b>PAN No.</b><span class="ms-1" ;
                                    style="color: red;">*</span></label>
                        </span>
                        <input type="text" class="form-control custom-back" id="panno"
                            value="<?= $row['Pan_no'] ?? '' ?>" placeholder="Enter your PAN No." name="panno"
                            oninput="validateForm('PanNum')" required><b><span class="formerrors"
                                style="color:red"></span></b>
                    </div>
                    <div class="mt-4" id="DateOfJoining">
                        <span>
                            <i class="fa-solid fa-calendar"></i>
                            <label for="date of Joining" class="form-label"><b>Date of Joining</b><span class="ms-1" ;
                                    style="color: red;">*</span></label>
                        </span>
                        <input type="date" class="form-control custom-back" id="doj" max="<?php echo date('Y-m-d'); ?>"
                            value="<?= $row['date_of_joining'] ?? '' ?>" name="doj" required><b><span class="formerrors"
                                style="color:red"></span></b>
                    </div>

                    <div class="mt-4" id="promo_date">
                        <span>
                            <i class="fa-solid fa-calendar"></i>
                            <label for="date of Promotion" class="form-label"><b>Promotion Date(If any)</b></label>
                        </span>
                        <input type="date" class="form-control custom-back" id="dop" max="<?php echo date('Y-m-d'); ?>"
                            value="<?= $row['promotion_date'] ?? '' ?>" name="dop"><b><span class="formerrors"
                                style="color:red"></span></b>
                    </div>
                    <script>
                    // const initialDob = document.getElementById('dob').value;
                    const dateOfJoin = document.getElementById('doj');
                    const dateOfProm = document.getElementById('dop');

                    function setMinfordoj(updatedValue, initialDob1) {
                        updatedValue.min = initialDob1;
                    }

                    setMinfordoj(dateOfJoin, initialDob);

                    document.getElementById('dob').addEventListener('input', function() {
                        const updatedDob = this.value;
                        setMinfordoj(dateOfJoin, updatedDob);
                    });

                    function setMinfordop(updatedValue, initialDoj1) {
                        updatedValue.min = initialDoj1;
                    }

                    const dateOfJoin1 = document.getElementById('doj').value;
                    setMinfordop(dateOfProm, dateOfJoin1);

                    document.getElementById('doj').addEventListener('input', function() {
                        const updatedDob = this.value;
                        setMinfordoj(dateOfProm, updatedDob);
                    });
                    </script>
                    <div class="mt-4" id="univ_name">
                        <span>
                            <i class="fa-solid fa-stamp"></i>
                            <label for="PHD Details" class="form-label"><b>University Name(Phd pursuing)</b></label>
                        </span>
                        <input type="text" class="form-control custom-back" id="phdun"
                            value="<?= $row['phd_univer_name'] ?? '' ?>"
                            placeholder="Enter name of the University from where you are pursuing your PhD" name="phdun"
                            oninput="validateForm('univ_name')"><b><span class="formerrors"
                                style="color:red"></span></b>
                    </div>
                    <div class="mt-4" id="date_or">
                        <span>
                            <i class="fa-solid fa-calendar"></i>
                            <label for="date of Registration" class="form-label"><b>Date of Registration(PhD
                                    degree)</b></label>
                        </span>
                        <input type="date" class="form-control custom-back" id="dor" max="<?php echo date('Y-m-d'); ?>"
                            value="<?= $row['date_of_registration'] ?? '' ?>" name="dor"><b><span class="formerrors"
                                style="color:red"></span></b>
                    </div>
                    <div class="mt-4" id="reserchPaper">
                        <span>
                            <i class="fa-solid fa-file"></i>
                            <label for="number of Research Papers" class="form-label"><b>Number of Research
                                    Publications</b><span class="ms-1" ; style="color: red;">*</span></label>
                        </span>
                        <!-- <input type = "number" class = "form-control custom-back" id = "nrpp" value = "<?= $row['number_of_research_paper'] ?? '' ?>" placeholder = "Enter number of Research Paper Publication" name = "nrpp" required> -->
                        <select class="form-control" id="nrpp" name="nrpp">
                            <?php
                                $savedValue = isset($row['number_of_research_paper']) ? $row['number_of_research_paper'] : null;
                                for ($i = 1; $i <= 100; $i++) {
                                $selected = ($i == $savedValue) ? 'selected' : '';
                                echo "<option value=\"$i\" $selected>$i</option>";
                                }
                            ?>
                        </select>
                        <!-- <a href = "sign_in_form2.php">Redirect to 2nd Form</a> --><b><span class="formerrors"
                                style="color:red"></span></b>
                    </div>
                </div>
            </div>
            <div class="row mt-4 mb-2">
                <div class="col-md-4">
                    <div class="d-flex">
                        <button class="btn btn-primary rounded-pill cancel-button ms-auto"
                            style="width: 100px; height: 50px;" type="button" onclick="history.back()">Cancel</button>
                    </div>
                </div>
                <?php if(isset($_GET) && $_GET['job'] === 'save') { ?>
                <div class="col-md-4">
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-primary rounded-pill cancel-button" style="width: 100px; height: 50px;"
                            type="submit" formaction="assets/php/form_info.php?job=save">Save</button>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex">
                        <button class="btn btn-primary rounded-pill next-button me-auto"
                            style="width: 100px; height: 50px;" type="submit"
                            formaction="assets/php/form_info.php?job=save_next">Next</button></a>
                    </div>
                </div>
                <?php } elseif(isset($_GET) && $_GET['job'] === 'first_login') { ?>
                <div class="col-md-4">
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-primary rounded-pill next-button" style="width: 100px; height: 50px;"
                            type="submit"
                            formaction="assets/php/form_info.php?job=<?php if(isset($_GET['job'])) { echo $_GET['job']; } else { echo '';} ?>">Next</button>
                    </div>
                </div>
                <?php } ?>
            </div>
            <div class="d-flex justify-content-center">
                <h5 style="font-size: 13px;"><span class="me-1 mb-3" style="color: red;">*</span>Required Fields</h5>
            </div>
            <?php } ?>
        </form>

    </div>
</div>
</div>
<script>
//Validation
function findError(id, error) {
    element = document.getElementById(id);
    element.getElementsByClassName('formerrors')[0].innerHTML = error;
}

const aosSelect = document.getElementById('aosSelect');
const otherInput = document.getElementById('otherInput');

aosSelect.addEventListener('change', function() {
    if (this.value === 'other') {
        this.style.display = 'none';
        otherInput.innerHTML =
            '<input type = "text" id = "otheraosInputSelect" name = "otheraosInputSelect" class = "form-control" placeholder = "Enter Area of Specialization">';
        const otheraosInputSelect = document.getElementById('otheraosInputSelect');
        otheraosInputSelect.addEventListener('input', function() {
            let nameCheck1 = /[^a-zA-Z\s&]/;
            if (nameCheck1.test(this.value) || this.value.length === 0) {
                document.getElementById('otherInputError').innerHTML = "<b>* Invalid Name</b>";
            } else {
                document.getElementById('otherInputError').innerHTML = "";
            }
        });
    } else {
        otherInput.innerHTML = '';
        this.style.display = 'block';
    }
});

const hqSelect = document.getElementById('hq');
const otherInput1 = document.getElementById('otherhqInput');

hqSelect.addEventListener('change', function() {
    if (this.value === 'other') {
        this.style.display = 'none';
        otherInput1.innerHTML =
            '<input type = "text" id = "otherhqInputSelect" name = "otherhqInputSelect" class = "form-control" placeholder = "Enter Highest Qualification">';
        const otherhqInputSelect = document.getElementById('otherhqInputSelect');
        otherhqInputSelect.addEventListener('input', function() {
            let nameCheck1 = /[^a-zA-Z\s.()]/;
            if (nameCheck1.test(this.value) || this.value.length === 0) {
                document.getElementById('otherhqInputError').innerHTML = "<b>* Invalid Name</b>";
            } else {
                document.getElementById('otherhqInputError').innerHTML = "";
            }
        });
    } else {
        otherInput1.innerHTML = '';
        this.style.display = 'block';
    }
});


function validateForm(param) {
    var name = document.getElementById('name').value;
    var phone = document.getElementById('co_number').value;
    var gender = document.querySelector('input[name="optradio"]:checked');
    var address = document.getElementById('address').value;
    var pan_num = document.getElementById('panno').value;
    var univ_name = document.getElementById('phdun').value;

    let check = /^[9876]\d{9}$/;
    let addCheck = /[^a-zA-Z0-9\s,.\-\/]/;
    let nameCheck = /[^a-zA-Z\s]/;
    const panRegex = /^[A-Z]{5}[0-9]{4}[A-Z]{1}$/;
    if (nameCheck.test(name)) {
        findError('name_check', " * Invalid Name");
    } else if (!check.test(phone)) {
        findError('con_number', " * Enter the valid Number");
    } else if (!gender) {
        findError('gen', " * Please Select one of the Gender");
    } else if (addCheck.test(address)) {
        findError('add', " * Enter the valid Address");
    } else if (nameCheck.test(univ_name)) {
        findError('univ_name', " * Invalid Name");
    } else if (!panRegex.test(pan_num)) {
        findError('PanNum', " * Invalid PAN No.");
    }
    //else if(otherAos.length === 0) {
    // findError(param, " * Enter valid Field.");
    //} else if(nameCheck.test(otherHq)) {
    //     findError(param, " * Enter valid Field."); }
    else {
        findError(param, "");
    }
}

const submitButtons = document.querySelectorAll('button[type="submit"]');
submitButtons.forEach(button => {
    button.addEventListener('click', function() {
        event.preventDefault();

        var name = document.getElementById('name').value;
        var phone = document.getElementById('co_number').value;
        var gender = document.querySelector('input[name="optradio"]:checked');
        var address = document.getElementById('address').value;
        var pan_num = document.getElementById('panno').value;
        var univ_name = document.getElementById('phdun').value;
        if (aosSelect.value === 'other') {
            var otherAos = document.getElementById('otheraosInputSelect').value;
        } else {
            var otherAos = 'default';
        }
        if (hqSelect.value === 'other') {
            var otherHq = document.getElementById('otherhqInputSelect').value;
        } else {
            var otherHq = 'default1';
        }

        let check = /^[9876]\d{9}$/;
        let addCheck = /[^a-zA-Z0-9\s,.\-\/]/;
        let nameCheck = /[^a-zA-Z\s]/;
        const panRegex = /^[A-Z]{5}[0-9]{4}[A-Z]{1}$/;
        if (nameCheck.test(name) || name.length === 0) {
            findError('name_check', " * Invalid Name");
        } else if (!check.test(phone)) {
            findError('con_number', " * Enter the valid Number");
        } else if (!gender) {
            findError('gen', " * Please Select one of the Gender");
        } else if (addCheck.test(address)) {
            findError('add', " * Enter the valid Address");
        } else if (nameCheck.test(univ_name)) {
            findError('univ_name', " * Invalid Name");
        } else if (!panRegex.test(pan_num)) {
            findError('PanNum', " * Invalid PAN No.");
        } else if (otherAos.length === 0) {
            document.getElementById('otherInputError').innerHTML = "<b> * Enter valid Name.</b>";
        } else if (otherHq.length === 0) {
            document.getElementById('otherhqInputError').innerHTML = "<b> * Enter valid Name.</b>";
        } else {
            const destinationUrl = this.getAttribute('formaction');
            const formData = new FormData(document.getElementById('myForm'));
            fetch(destinationUrl, {
                    method: 'POST',
                    body: formData
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        if (data.message === 'save') {
                            alert('Changes saved Successfully');
                            window.location.href = 'index.php';
                        } else if (data.message === 'save_next' || data.message === 'first_login') {
                            window.location.href = 'sign_in_form2.php?job=' + data.message;
                        }
                    } else {
                        alert('Please make some changes to update your profile.');
                    }
                })
                .catch(error => {
                    console.error('Error: ', error);
                });
        }
    });
});
</script>
<?php 
    include('include/footer.html')
?>