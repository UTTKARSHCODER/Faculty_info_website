<?php
include('C:/xampp/htdocs/project/root/config/config.php');

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM `user_details` WHERE `user_details`.`username`= '$id'";
    $result = mysqli_query($conn , $query);

    if($result){
        header("Location: /project/root/email_access.php");
    }else{
        echo "ERROR: DATA IS NOT DELETED";
    }
} else {
    echo "Id isn't set";
}
?>