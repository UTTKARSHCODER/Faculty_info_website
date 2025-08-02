<?php 
    include('include/header.php');
?>
    <!-- User Details -->
    <link rel='stylesheet' type='text/css' media='screen' href='assets/css/style.css'>
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
                                <label for = "joining_report" >Joining Report</label>
                            </span>
                            <h5 class = "font-small mt-2">Upload Files in PDF or Image Format(MAX SIZE:- 10MB)</h5>
                            <div class = "d-flex mt-2">
                                <input type = "file" class = "form-control w-75" id = "joining_report" name = "joining_report" accept=".png,.jpg,.jpeg,.pdf" required>
                                <button type = "button" id = "upload_joining_report" class = "btn btn-primary rounded-pill ms-auto me-4">Upload File</button>
                                <script>
                                    const join_button = document.getElementById('joining_report');
                                    join_button.addEventListener('click', upload_file.bind(null,itemId,'upload_joining_report','joining_report'));
                                </script>
                            </div>
                        </div>
                        <div class = "mt-4">
                            <span>
                                <i class = "fa-solid fa-file"></i>
                                <label for = "offer_letter" >Offer Letter</label>
                            </span>
                            <h5 class = "font-small mt-2">Upload Files in PDF or Image Format(MAX SIZE:- 10MB)</h5>
                            <div class = "d-flex mt-2">
                                <input type = "file" class = "form-control w-75" id = "offer_letter" name = "offer_letter" accept=".png,.jpg,.jpeg,.pdf" required>
                                <button type = "button" id = "upload_offer_letter" class = "btn btn-primary rounded-pill ms-auto me-4">Upload File</button>
                                <script>
                                    const join_button1 = document.getElementById('offer_letter');
                                    join_button1.addEventListener('click', upload_file.bind(null,itemId,'upload_offer_letter','offer_letter'));
                                </script>
                            </div>
                        </div>
                        <div class = "mt-4">
                            <span>
                                <i class = "fa-solid fa-file"></i>
                                <label for = "higher_degree_certificate" >Higher Degree Certificate</label>
                            </span>
                            <h5 class = "font-small mt-2">Upload Files in PDF or Image Format(MAX SIZE:- 10MB)</h5>
                            <div class = "d-flex mt-2">
                                <input type = "file" class = "form-control w-75" id = "higher_degree_certificate" name = "higher_degree_certificate" accept=".png,.jpg,.jpeg,.pdf" required>
                                <button type = "button" id = "upload_higer_degree_certificate" class = "btn btn-primary rounded-pill ms-auto me-4">Upload File</button>
                                <script>
                                    const join_button2 = document.getElementById('higher_degree_certificate');
                                    join_button2.addEventListener('click', upload_file.bind(null,itemId,'upload_higer_degree_certificate','higher_degree_certificate'));
                                </script>
                            </div>
                        </div>
                        <div class = "mt-4">
                            <span>
                                <i class = "fa-solid fa-file"></i>
                                <label for = "salary_slip" >Salary Slip(Recent)</label>
                            </span>
                            <h5 class = "font-small mt-2">Upload Files in PDF or Image Format(MAX SIZE:- 10MB)</h5>
                            <div class = "d-flex mt-2">
                                <input type = "file" class = "form-control w-75" id = "salary_slip" name = "salary_slip" accept=".png,.jpg,.jpeg,.pdf">
                                <button type = "button" id = "upload_salary_slip" class = "btn btn-primary rounded-pill ms-auto me-4">Upload File</button>
                                <script>
                                    const join_button3 = document.getElementById('salary_slip');
                                    join_button3.addEventListener('click', upload_file.bind(null,itemId,'upload_salary_slip','salary_slip'));
                                </script>
                            </div>
                        </div>
                        <div class = "mt-4">
                            <span>
                                <i class = "fa-solid fa-file"></i>
                                <label for = "extension_awards" >Certificate/Awards you earned from extension activities</label>
                            </span>
                            <h5 class = "font-small mt-2">Upload Files in PDF or Image Format(MAX SIZE:- 10MB)</h5>
                            <div class = "d-flex mt-2">
                                <input type = "file" class = "form-control w-75" id = "extension_awards" name = "extension_awards" accept=".png,.jpg,.jpeg,.pdf">
                                <button type = "button" id = "upload_certificates" class = "btn btn-primary rounded-pill ms-auto me-4">Upload File</button>
                                <script>
                                    const join_button4 = document.getElementById('extension_awards');
                                    join_button4.addEventListener('click', upload_file.bind(null,itemId,'upload_certificates','extension_awards'));
                                </script>
                            </div>
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
</body>
</html>