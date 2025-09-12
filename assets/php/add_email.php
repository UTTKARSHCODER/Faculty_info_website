<?php 
    include("../../config/config.php");
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $new_email = $_POST['new_email'];
        $sqlcheck = "SELECT `email` FROM `detailed_faculty_info` WHERE `detailed_faculty_info`.`email` = '" . $new_email . "'";
        $resultcheck = mysqli_query($conn,$sqlcheck);
        if(mysqli_num_rows($resultcheck) > 0) {
            echo '<script>alert("Email already exist.")</script>';
            // header("Location: /email_access.php");
        } else {
            $sql = "INSERT INTO `detailed_faculty_info`(`email`) VALUES ('$new_email')";
            $result = mysqli_query($conn,$sql);
            if($result) {
                header("Location: /email_access.php");
            } else {
                echo "An error occured while inserting value " . $conn->error;
            }
        }
    }
?>