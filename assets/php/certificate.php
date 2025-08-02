<?php
include('C:/xampp/htdocs/project/root/config/config.php');

if(!$con){
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

    if(move_uploaded_file($fileTemp_storage,$final_File)){
        $sql = "INSERT INTO `trip table1`(file_name,file_path) VALUES (?,?)";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("ss",$filename,$final_File);
        
        if($stmt->execute()){
            echo "<div id='upload-success' data-file-path='{$final_File}' data-file-name='{$filename}'></div>";
        echo "Certificate uploaded and saved successfully.";
        }else{
        echo "ERROR: while saving the file.".$stmt->error;
        }
        
        $stmt->close();
    }
    else{
        echo "File upload failed.";
    }


}
$con->close();

?>