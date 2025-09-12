<?php 
    include('../../config/config.php');
    include('../../include/header.php');
?>
<link rel="icon" type="image/png" href="../image/top-head-logo.png">
<link rel="stylesheet" href="../css/profile_style.css" />

<div class="container-fluid h-100 mb-5">
    <?php
        if (isset($_SESSION['userEmail'])) {
            $email = $_SESSION['userEmail'];
            $sql = "SELECT * FROM `detailed_faculty_info` WHERE `detailed_faculty_info`.`email` = '" . $email . "'";
            $result = mysqli_query($conn,$sql); ?>
    <!-- <div class =" col-12 mb-2 ms-auto mt-2">
                    
                </div> -->
    <div class="col-12">
        <?php
                    if (mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_assoc($result);
                    ?>
        <div style="float: left; width:200px; height: 100px;">
            <img src=<?= $row['profile_path']; ?> alt="Profile Image" style="width: 185px; height: 133px;">
        </div>
        <div class="ms-2" style="float: left;">
            <a href="../../sign_in_form.php?job=save"><i class="fa-solid fa-pen">
                    <h5>Edit</h5>
                </i></a>
        </div>
        <h3 class="text-center mt-3"><?php echo $row['salutation'] . ' ' . $row['name']; ?></h3>
        <h4 class="text-center mt-3">Department: <?php echo $row['department'];?></h4>
        <h5 class="text-center mt-3" style="margin-left: 180px;">Designation: <?php echo $row['designation'];?></h5>
    </div>
    <hr />
    <div class="row">
        <div class="col mt-3 ms-3 color-gray">
            <h3 class="mt-3">Personal Details:</h3>
            <h4 class="mt-4" style="font-size: 16px;">Email: <span
                    class="constant-spacing"><?php echo $row['email'];?></span></h4>
            <h4 class="mt-3" style="font-size: 16px;">Contact number: <span
                    class="constant-spacing"><?php echo $row['contact_number'];?></span></h4>
            <h4 class="mt-3" style="font-size: 16px;">Date of Birth: <span
                    class="constant-spacing"><?php echo $row['date_of_birth'];?></span></h4>
            <h4 class="mt-3" style="font-size: 16px;">Gender: <span
                    class="constant-spacing"><?php echo $row['gender'];?></span></h4>
            <h4 class="mt-3" style="font-size: 16px;">Address: <span
                    class="constant-spacing"><?php echo $row['address'];?></span></h4>
            <h4 class="mt-3" style="font-size: 16px;">Emoployee ID: <span
                    class="constant-spacing"><?php echo $row['employee_id'];?></span></h4>
            <h4 class="mt-3" style="font-size: 16px;">PAN NO.: <span
                    class="constant-spacing"><?php echo $row['Pan_no'];?></span></h4>
        </div>
        <div class="col mt-3 ms-3 color-gray">
            <h3 class="mt-3">Acadmic Details:</h3>
            <h4 class="mt-4" style="font-size: 16px;">Area of Specialization: <span
                    class="constant-spacing"><?php echo $row['area_of_specialization'];?></span></h4>
            <h4 class="mt-3" style="font-size: 16px;">Highest Qualification: <span
                    class="constant-spacing"><?php echo $row['highest_qualification'];?></span></h4>
            <h4 class="mt-3" style="font-size: 16px;">Passing Year: <span
                    class="constant-spacing"><?php echo $row['passing_year'];?></span></h4>
            <h4 class="mt-3" style="font-size: 16px;">Date Of Joining: <span
                    class="constant-spacing"><?php echo $row['date_of_joining'];?></span></h4>
            <?php if ($row['promotion_date'] !== null) {?>
            <h4 class="mt-3" style="font-size: 16px;">Promotion Date: <span
                    class="constant-spacing"><?php echo $row['promotion_date'];?></span></h4>
            <?php } ?>
            <?php if ($row['phd_univer_name'] !== null) {?>
            <h4 class="mt-3" style="font-size: 16px;">PHD University Name: <span
                    class="constant-spacing"><?php echo $row['phd_univer_name'];?></span></h4>
            <?php } ?>
            <?php if ($row['date_of_registration'] !== null) {?>
            <h4 class="mt-3" style="font-size: 16px;">Date of Registration: <span
                    class="constant-spacing"><?php echo $row['date_of_registration'];?></span></h4>
            <?php } ?>
            <h4 class="mt-3" style="font-size: 16px;">Number of Research Paper: <span
                    class="constant-spacing"><?php echo $row['number_of_research_paper'];?></span></h4>
        </div>
    </div>
    <h3 class="mt-5 left-margin">Uploaded Files</h3>
    <div class="row">
        <div class="col-6 color-gray d-flex">
            <h4 class="mt-3 ms-5" style="font-size: 16px;">Joining Letter</h4>
            <a href=<?php echo $row['joining_report_file_path'] ?> target="_blank" style="text-decoration: none;"
                class="ms-auto mt-2"><button type="button" class="btn btn-primary" style="height: 34px;"><i
                        class="fa-solid fa-eye"></i> Click Here</button></a>
        </div>
        <div class="col-6 color-gray d-flex">
            <h4 class="mt-3 ms-5" style="font-size: 16px;">Offer Letter</h4>
            <a href=<?php echo $row['offer_letter_file_path'] ?> target="_blank" style="text-decoration: none;"
                class="ms-auto mt-2"><button type="button" class="btn btn-primary" style="height: 34px;"><i
                        class="fa-solid fa-eye"></i> Click Here</button></a>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-6 color-gray d-flex">
            <h4 class="mt-3 ms-5" style="font-size: 16px;">Higher Degree Certificate</h4>
            <a href=<?php echo $row['higher_degree_certificate_file_path'] ?> target="_blank"
                style="text-decoration: none;" class="ms-auto mt-2"><button type="button" class="btn btn-primary"
                    style="height: 34px;"><i class="fa-solid fa-eye"></i> Click Here</button></a>
        </div>
        <div class="col-6 color-gray d-flex">
            <h4 class="mt-3 ms-5" style="font-size: 16px;">Award Certificate</h4>
            <a href=<?php echo $row['certificate_file_path'] ?> target="_blank" style="text-decoration: none;"
                class="ms-auto mt-2"><button type="button" class="btn btn-primary" style="height: 34px;"><i
                        class="fa-solid fa-eye"></i> Click Here</button></a>
        </div>
    </div>
    <?php 
                } else {
                    header('Location: ../../sign_in_form.php');
                }   
            } else { ?>
    <a href="logout.php" class="text-center edit">You are not authorized. Log in through Top Right dropdown.</a>
    <?php
            }
        ?>

</div>
</div>
<!-- </body> -->
<?php 
    include('../../include/footer.html');
?>