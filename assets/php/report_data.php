<?php 
    include('/project/root/config/config.php');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $branch=  $_POST['branch'];
        $description = $_POST['description'];
        if(isset($_FILES['issue_file']) && $_FILES['issue_file']['error'] === UPLOAD_ERR_OK) {
            $original_file_name = $_FILES['issue_file']['name'];
            $tmp_file_path = $_FILES['issue_file']['tmp_name'];

            $uploadDir = '../uploads/report_file/';

            $file_extension = pathinfo($original_file_name, PATHINFO_EXTENSION);
            $unique_file_name = uniqid(). '_' . preg_replace("/[^a-zA-Z0-9.-]/", "_", basename($original_file_name, "." . $file_extension)) . '.' . $file_extension;
            
            $destination_file_path = $uploadDir . $unique_file_name;
            move_uploaded_file($tmp_file_path,$destination_file_path);
            $sql = "INSERT INTO `report_data` (`name`, `email`, `department`, `description`, `issue_file_name`, `issue_file_path`) VALUES ('$name', '$email', '$branch', '$description', '$unique_file_name', '$destination_file_path')";
            $result = mysqli_query($conn, $sql);
            if($result) {
                header('Location: /project/root/redirect.html');
            } else {
                echo "<div class='alert alert-danger'>
                        <strong>Error!</strong> Unable to upload file. Please try again.
                    </div>";
            }
        } else {
            echo "<div class='alert alert-danger'>
                    <strong>Error!</strong> File not set. Please try again.
                </div>";
        }
    }
?>
