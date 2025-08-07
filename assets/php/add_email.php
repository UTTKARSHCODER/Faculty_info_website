<?php 
    include("C:/xampp/htdocs/project/root/config/config.php");
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $new_email = $_POST['new_email'];
        $sql = "INSERT INTO `user_details`(`username`) VALUES ('$new_email')";
        $result = mysqli_query($conn,$sql);
        if($result) {
            header("Location: /project/root/email_access.php");
        } else {
            echo "An error occured while inserting value " . $conn->error;
        }
    }
?>