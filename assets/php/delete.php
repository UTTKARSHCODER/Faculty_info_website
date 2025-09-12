<?php
include('../../config/config.php');

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM `detailed_faculty_info` WHERE `detailed_faculty_info`.`email`= '$id'";
    $result = mysqli_query($conn , $query);

    if($result){
        header("Location: ../../email_access.php");
    }else{
        echo "ERROR: DATA IS NOT DELETED";
    }
} else {
    echo "Id isn't set";
}
?>