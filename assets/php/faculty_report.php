<?php
    include('../../config/config.php');
    include('../../include/header.php');

?>
<!-- <link rel = "stylesheet" href = "/project/root/assets/css/profile_style.css"> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.bootstrap5.css">
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<!-- <script src = "https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script> -->
<script src="https://cdn.datatables.net/2.3.2/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.3.2/js/dataTables.bootstrap5.js"></script>
<style>
.container-fluid.fac-repo {
    width: 88%;
}

@media (max-width: 480px) {
    .navbar {
        display: none;
    }
}

@media screen and (min-width: 481px) and (max-width: 1366px) {
    .container-fluid.fac-repo {
        width: 79%;
    }
}
</style>
<div class="container-fluid fac-repo">

    <?php 
            $sql = "SELECT * FROM `detailed_faculty_info` WHERE `detailed_faculty_info`.`status` = 'Registered'";
            $result = mysqli_query($conn,$sql);
            if ($result) { $i = 1;
        ?> <div class="table-responsive">
        <table class="table table-striped mt-3" id="scroll-table">
            <thead class="table-dark">
                <tr>
                    <th>S.No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Designation</th>
                    <th>Department</th>
                    <th>Contact Number</th>
                    <th>DOB</th>
                    <th>Gender</th>
                    <th>Address</th>
                    <th>Area of Specialization</th>
                    <th>Highest Qualfication</th>
                    <th>Year of Passing</th>
                    <th>Employee ID</th>
                    <th>PAN No.</th>
                    <th>Date of Joining(College)</th>
                    <th>Profile Photo</th>
                    <th>Joining Report Letter</th>
                    <th>Offer Letter</th>
                    <th>Highest Degree Certificate</th>
                    <th>Salary Slip</th>
                    <th>Date of Promotion</th>
                    <th>Name of PHD University(If pusuing)</th>
                    <th>Date of Registration(for PHD Course)</th>
                    <th>Number of Research Papers</th>
                    <th>Certificate</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_assoc($result)) {  ?>
                <tr>
                    <td><?php echo $i?></td>
                    <td><?php echo $row['name']?></td>
                    <td><?php echo $row['email']?></td>
                    <td><?php echo $row['designation']?></td>
                    <td><?php echo $row['department']?></td>
                    <td><?php echo $row['contact_number']?></td>
                    <td><?php echo $row['date_of_birth']?></td>
                    <td><?php echo $row['gender']?></td>
                    <td><?php echo $row['address']?></td>
                    <td><?php echo $row['area_of_specialization']?></td>
                    <td><?php echo $row['highest_qualification']?></td>
                    <td><?php echo $row['passing_year']?></td>
                    <td><?php echo $row['employee_id']?></td>
                    <td><?php echo $row['Pan_no']?></td>
                    <td><?php echo $row['date_of_joining']?></td>
                    <td><a href=<?php echo $row['profile_path']?> target="_blank">Click Here</a></td>
                    <td><a href=<?php echo $row['joining_report_file_path']?> target="_blank">Click Here</a></td>
                    <td><a href=<?php echo $row['offer_letter_file_path']?> target="_blank">Click Here</a></td>
                    <td><a href=<?php echo $row['higher_degree_certificate_file_path']?> target="_blank">Click Here</a>
                    </td>
                    <td><a href=<?php echo $row['salary_slip_file_path']?> target="_blank">Click Here</a></td>
                    <td><?php echo $row['promotion_date']?></td>
                    <td><?php echo $row['phd_univer_name']?></td>
                    <td><?php echo $row['date_of_registration']?></td>
                    <td><?php echo $row['number_of_research_paper']?></td>
                    <td><a href=<?php echo $row['certificate_file_path']?> target="_blank">Click Here</td>
                </tr>
                <?php $i++;
                            }
                            ?>
            </tbody>
        </table>
        <script>
        new DataTable("#scroll-table", {
            paging: false,
            scrollY: '260px',
            scrollX: true
        });
        </script>
        <style>
        #scroll-table th,
        #scroll-table td {
            white-space: nowrap;
        }
        </style>
    </div>
    <?php 
            } else {
                echo "Query not executed" . $conn->error;
             } 
        ?>
    <div class="mt-3">
        <h5 style="color: gray; text-align: center;">Select the department:</h5>
        <div class="d-flex justify-content-center">

            <div class="form-check ms-2">
                <input type="checkbox" class="form-check-input" id="check1" name="optcheck[]"
                    value="Computer Science & Engineering" style="border: 2px solid black;">
                <label class="form-check-label" for="check1"><b>CSE</b></label>
            </div>
            <div class="form-check ms-2">
                <input type="checkbox" class="form-check-input" id="check2" name="optcheck[]"
                    value="Computer Science & Engineering(AI)" style="border: 2px solid black;">
                <label class="form-check-label" for="check2"><b>CSE(AI)</b></label>
            </div>
            <div class="form-check ms-2">
                <input type="checkbox" class="form-check-input" id="check3" name="optcheck[]"
                    value="Computer Science & Engineering(DS)" style="border: 2px solid black;">
                <label class="form-check-label" for="check3"><b>CSE(DS)</b></label>
            </div>
            <div class="form-check ms-2">
                <input type="checkbox" class="form-check-input" id="check4" name="optcheck[]"
                    value="Computer Science & Engineering(IOT)" style="border: 2px solid black;">
                <label class="form-check-label" for="check4"><b>CSE(IOT)</b></label>
            </div>
            <!-- <button class = "btn btn-primary rounded-pill ms-4" type = "submit" style="height: 30px; text-align: center; padding-top: 2px;" id = "ok-button" disabled>OK</button> -->

        </div>
    </div>
    <div class="d-flex justify-content-center mb-3 mt-3">
        <div class="dropdown">
            <!-- <i class = "fa-solid fa-file-arrow-down dropdown-toggle" data-bs-toggle="dropdown"></i> -->
            <!-- <button class = "btn btn-primary" data-bs-toggle="modal" data-bs-target="#upload_file">Upload Excel File</button> -->
            <button class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown" id="download" disabled>Download
                all Details</button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="download.php?file_type=excel" id="excel-download">Excel</a></li>
                <li><a class="dropdown-item" href="download.php?file_type=csv">CSV</a></li>
            </ul>
        </div>
    </div>
    <script>
    //const okButton = document.getElementById('ok-button');
    const downloadButton = document.getElementById('download');
    const checkboxs = document.querySelectorAll('.form-check-input');
    checkboxs.forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            const isChecked = Array.from(checkboxs).some(cb => cb.checked);
            downloadButton.disabled = !isChecked;
            const selCheckVal = Array.from(checkboxs).filter(cb => cb.checked).map(cb => cb.value);
            const formData = new FormData();
            selCheckVal.forEach(value => {
                formData.append('optcheck[]', value);
            });
            fetch('download.php?file_type=excel', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.text())
                .catch(error => {
                    console.error('Error is: ', error);
                });
        });
    });
    </script>
</div>
</div>
<?php 
    include('../../include/footer.html');
?>