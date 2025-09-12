<?php 
    include('include/header.php');
    // if(isset($_SESSION['userEmail'])) {
    //     $email_up = $_SESSION['userEmail']; 
    // }
?>
<!-- User Details -->
<link rel='stylesheet' type='text/css' media='screen' href='assets/css/style.css'>
<script src="assets/javascript/toggleCheckbox.js"></script>
<script>
var email_up = "<?php echo isset($_SESSION['userEmail']) ? $_SESSION['userEmail'] : '' ;?>";
</script>
<div class="container-fluid h-100" style="margin-left: 10px; margin-top: 10px;">
    <div class="row form-styling">
        <div class="col-sm-12 col-md-12 col-lg-12 col-12 f-20 me-5 mt-4">
            <h2 class="text-center custom-color">Sign up</h2>
        </div>
        <hr />
        <div class="col-sm-12 col-md-12 col-lg-12 col-12 f-20">
            <form action="redirect.php">
                <div class="d-grid">
                    <div class="mt-4">
                        <span>
                            <i class="fa-solid fa-file"></i>
                            <label for="profile_picture">Profile Picture<span class="ms-1" ;
                                    style="color: red;">*</span></label>
                        </span>
                        <h5 class="font-small mt-2">Upload File Image Format(MAX SIZE:- 10MB)</h5>
                        <div class="d-flex mt-2">
                            <input type="file" class="form-control w-75" id="profile_pic" name="profile_pic"
                                accept=".png,.jpg,.jpeg"
                                onchange="validateSizeType(email_up,'profile_pic','error1','upload_profile_pic','success1')">
                            <button type="button" id="upload_profile_pic"
                                class="btn btn-primary rounded-pill ms-auto me-4" disabled>Upload File</button>
                        </div>
                        <h5 class="font-small mt-2">Press Upload File button after choosing file.</h5>
                        <p id="error1" style="color: red;"></p>
                        <p id="success1"></p>
                    </div>
                    <div class="mt-4">
                        <span>
                            <i class="fa-solid fa-file"></i>
                            <label for="joining_report">Joining Report<span class="ms-1" ;
                                    style="color: red;">*</span></label>
                        </span>
                        <h5 class="font-small mt-2">Upload File in PDF(MAX SIZE:- 10MB)</h5>
                        <div class="d-flex mt-2">
                            <input type="file" class="form-control w-75" id="joining_report" name="joining_report"
                                accept=".pdf"
                                onchange="validateSizeType(email_up,'joining_report','error2','upload_joining_report','success2')">
                            <button type="button" id="upload_joining_report"
                                class="btn btn-primary rounded-pill ms-auto me-4" disabled>Upload File</button>
                        </div>
                        <h5 class="font-small mt-2">Press Upload File button after choosing file.</h5>
                        <p id="error2" style="color: red;"></p>
                        <p id="success2"></p>
                    </div>
                    <div class="mt-4">
                        <span>
                            <i class="fa-solid fa-file"></i>
                            <label for="offer_letter">Offer Letter<span class="ms-1" ;
                                    style="color: red;">*</span></label>
                        </span>
                        <h5 class="font-small mt-2">Upload File in PDF(MAX SIZE:- 10MB)</h5>
                        <div class="d-flex mt-2">
                            <input type="file" class="form-control w-75" id="offer_letter" name="offer_letter"
                                accept=".pdf"
                                onchange="validateSizeType(email_up,'offer_letter','error3','upload_offer_letter','success3')">
                            <button type="button" id="upload_offer_letter"
                                class="btn btn-primary rounded-pill ms-auto me-4" disabled>Upload File</button>
                        </div>
                        <h5 class="font-small mt-2">Press Upload File button after choosing file.</h5>
                        <p id="error3" style="color: red;"></p>
                        <p id="success3"></p>
                    </div>
                    <div class="mt-4">
                        <span>
                            <i class="fa-solid fa-file"></i>
                            <label for="higher_degree_certificate">Higher Degree Certificate<span class="ms-1" ;
                                    style="color: red;">*</span></label>
                        </span>
                        <h5 class="font-small mt-2">Upload File in PDF(MAX SIZE:- 10MB)</h5>
                        <div class="d-flex mt-2">
                            <input type="file" class="form-control w-75" id="higher_degree_certificate"
                                name="higher_degree_certificate" accept=".pdf"
                                onchange="validateSizeType(email_up,'higher_degree_certificate','error4','upload_higer_degree_certificate','success4')">
                            <button type="button" id="upload_higer_degree_certificate"
                                class="btn btn-primary rounded-pill ms-auto me-4" disabled>Upload File</button>
                        </div>
                        <h5 class="font-small mt-2">Press Upload File button after choosing file.</h5>
                        <p id="error4" style="color: red;"></p>
                        <p id="success4"></p>
                    </div>
                    <div class="mt-4">
                        <span>
                            <i class="fa-solid fa-file"></i>
                            <label for="salary_slip">Salary Slip(Recent)</label>
                        </span>
                        <h5 class="font-small mt-2">Upload File in PDF(MAX SIZE:- 10MB)</h5>
                        <div class="d-flex mt-2">
                            <input type="file" class="form-control w-75" id="salary_slip" name="salary_slip"
                                accept=".pdf"
                                onchange="validateSizeType(email_up,'salary_slip','error5','upload_salary_slip','success5')">
                            <button type="button" id="upload_salary_slip"
                                class="btn btn-primary rounded-pill ms-auto me-4" disabled>Upload File</button>
                        </div>
                        <h5 class="font-small mt-2">Press Upload File button after choosing file.</h5>
                        <p id="error5" style="color: red;"></p>
                        <p id="success5"></p>
                    </div>
                    <div class="mt-4">
                        <span>
                            <i class="fa-solid fa-file"></i>
                            <label for="extension_awards">Certificate/Awards you earned from extension
                                activities</label>
                        </span>
                        <h5 class="font-small mt-2">Upload File in PDF(MAX SIZE:- 10MB)</h5>
                        <div class="d-flex mt-2">
                            <input type="file" class="form-control w-75" id="extension_awards" name="extension_awards"
                                accept=".pdf"
                                onchange="validateSizeType(email_up,'extension_awards','error6','upload_certificates','success6')">
                            <button type="button" id="upload_certificates"
                                class="btn btn-primary rounded-pill ms-auto me-4" disabled>Upload File</button>
                        </div>
                        <h5 class="font-small mt-2">Press Upload File button after choosing file.</h5>
                        <p id="error6" style="color: red;"></p>
                        <p id="success6"></p>
                    </div>
                    <div class="mt-5">
                        <!-- <h5>I hereby declare that all the details filled are correct and exact.</h5> -->
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input mt-2" id="agreeCheckbox"
                                style="border: 2px solid black;" required> I hereby declare that all the details filled
                            are correct and exact.
                        </label>
                    </div>
                    <button class="btn btn-primary d-block mt-5 mb-1" id="submitButton" type="submit" disabled>Upload
                        Required Files</button>
                    <div class="text-center">
                        <h5 style="font-size: 13px;"><span class="me-1" style="color: red;">*</span>Required Fields</h5>
                    </div>
                </div>
            </form>
            <script>
            let countUpload = 0;

            function validateSizeType(email_id, file_upload, file_size_error, up_button, output_display) {
                const file = document.getElementById(file_upload).files[0];
                const errorMsg = document.getElementById(file_size_error);
                const upload_button = document.getElementById(up_button);
                const maxSizeInBytes = 10 * 1024 * 1024;

                if (file) {
                    let allowedMimeTypes = [];
                    if (file_upload === 'profile_pic') {
                        allowedMimeTypes.push('image/png');
                        allowedMimeTypes.push('image/jpeg');
                    } else {
                        allowedMimeTypes.push('application/pdf');
                    }
                    if (allowedMimeTypes.includes(file.type)) {
                        errorMsg.textContent = '';
                        if (file.size > maxSizeInBytes) {
                            errorMsg.textContent = "Error! File's Size exceeded 10 MB limit.";
                            this.value = '';
                            upload_button.disabled = true;
                        } else {
                            errorMsg.textContent = '';
                            upload_button.disabled = false;
                            upload_button.addEventListener('click', function() {

                                if (!file) {
                                    console.error("Unable to retrive the file!");
                                    return;
                                } else {
                                    console.log(file.name);
                                }

                                const formData = new FormData();
                                formData.append(file_upload, file);
                                formData.append('button_id', up_button);
                                formData.append('email_id', email_id);

                                fetch("/assets/php/form_info.php", {
                                        method: 'POST',
                                        body: formData
                                    })
                                    .then(response => {
                                        if (!response.ok) {
                                            console.log("Error!");
                                            throw new Error(`HTTP error! Status: ${response.status}`);
                                        }
                                        return response.json();
                                    })
                                    .then(data => {
                                        console.log(data);
                                        if (data.success) {
                                            countUpload++;
                                            document.getElementById(output_display).innerHTML =
                                                `<div class="alert alert-success">${data.message}</div>`;
                                            console.log("Count is: ", countUpload);
                                            minUploadDone(countUpload,
                                            up_button); //To validate all required files are uploaded for first time user.
                                            upload_button.disabled = true;
                                        } else if (!data.success) {
                                            alert(data.message);
                                        }
                                    })
                                    .catch(error => {
                                        console.error('Error during uploading:', error);
                                    })
                            })
                        }
                    } else {
                        if (file_upload === 'profile_pic') {
                            errorMsg.textContent = "Invalid file type. Please select a .png, .jpeg or .jpg  file only.";
                        } else {
                            errorMsg.textContent = "Invalid file type. Please select a .pdf file only.";
                        }
                        this.value = '';
                        upload_button.disabled = true;
                    }
                }
            }
            let button_name = [];

            function minUploadDone(countUpload, button_id_check) {
                button_name.push(button_id_check);
                if (countUpload >= 4) {
                    if (button_name.includes('upload_profile_pic') && button_name.includes('upload_joining_report') &&
                        button_name.includes('upload_offer_letter') && button_name.includes(
                            'upload_higer_degree_certificate')) {
                        document.getElementById('submitButton').textContent = 'Submit';
                        document.getElementById('submitButton').disabled = false;
                    }
                } else if (<?php echo (isset($_GET['job']) && $_GET['job'] === 'save_next') ? 'true' : 'false'?> &&
                    countUpload >= 1) {
                    document.getElementById('submitButton').textContent = 'Submit';
                    document.getElementById('submitButton').disabled = false;
                }
            }
            </script>
        </div>
    </div>
</div>
</div>
<?php 
    include('include/footer.html');
?>