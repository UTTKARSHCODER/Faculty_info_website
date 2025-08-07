<?php
session_start();
include('C:/xampp/htdocs/project/root/config/config.php');

if(!$conn){
    die("ERROR: something is lost");
}

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["upFile"])){
    $filename = $_POST["file_name"];
    $fileTemp_storage = $_FILES["upFile"]["tmp_name"];
    $fileRealName = $_FILES["upFile"]["name"];


    $finalDir_File = "uploads/";

    // make folder if not exist

    if(!file_exists($finalDir_File)){
        mkdir($finalDir_File,0777,true);
    }

    $final_File = $finalDir_File.basename($fileRealName);
    if(isset($_SESSION['userEmail'])) {
    $email = $_SESSION['userEmail'];
        if(move_uploaded_file($fileTemp_storage,$final_File)){
            $sql = "UPDATE `detailed_faculty_info` SET `certificate_file_name` = '$filename', `certificate_file_path` = '$final_File' WHERE `detailed_faculty_info`.`email` = $email";
            $result = mysqli_query($conn,$sql);
            if ($result) {
                echo "<div id='upload-success' data-file-path='{$final_File}' data-file-name='{$filename}'></div>";
                echo "Certificate uploaded and saved successfully.";
            } else{
            echo "ERROR: while saving the file.".$conn->error;
            }
            // $stmt = $conn->prepare($sql);
            // $stmt->bind_param("ss",$filename,$final_File);
            
            // if($stmt->execute()){
            //     echo "<div id='upload-success' data-file-path='{$final_File}' data-file-name='{$filename}'></div>";
            // echo "Certificate uploaded and saved successfully.";
            // }else{
            // echo "ERROR: while saving the file.".$stmt->error;
            // }
            
            $conn->close();
        }
    }
    else{
        echo "File upload failed.";
    }


}

?>