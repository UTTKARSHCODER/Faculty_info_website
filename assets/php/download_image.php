<?php 
    include('../../config/config.php');
    session_start();
    require '../../vendor/autoload.php';

    $filename = "image";
    if(isset($_GET['file']) && isset($_SESSION['userEmail'])) {
        $email = $_SESSION['userEmail'];
        $filetype = htmlspecialchars($_GET['file']);
        if($filetype === "joining_letter") {
            $sql = "SELECT `joining_report_file_name`,`joining_report_file_path` FROM `detailed_faculty_info` WHERE `detailed_faculty_info`.`email` = '" . $email . "'";
            $result = mysqli_query($conn,$sql);
            if(mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $filename =  $row['joining_report_file_name'];
                $tempFilePath = $row['joining_report_file_path'];
                $finalFilePath = $_SERVER['DOCUMENT_ROOT'] . $tempFilePath;
                if (file_exists($finalFilePath)) {
                    header('Content-Type: image/png'); // For a PNG image
                    header('Content-Disposition: attachment; filename= "' . $filename . '"');
                    readfile($finalFilePath);
                    exit;
                } else {
                    http_response_code(404);
                    die("File not found");
                }
            } else {
                echo "No record found";
            }
        } else if($filetype === "offer_letter") {
            $sql = "SELECT `offer_letter_file_name`,`offer_letter_file_path` FROM `detailed_faculty_info` WHERE `detailed_faculty_info`.`email` = '" . $email . "'";
            $result = mysqli_query($conn,$sql);
            if(mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $filename =  $row['offer_letter_file_name'];
                $tempFilePath = $row['offer_letter_file_path'];
                $finalFilePath = $_SERVER['DOCUMENT_ROOT'] . $tempFilePath;
                if (file_exists($finalFilePath)) {
                    header('Content-Type: image/png'); // For a PNG image
                    header('Content-Disposition: attachment; filename= "' . $filename . '"');
                    readfile($finalFilePath);
                    exit;
                } else {
                    http_response_code(404);
                    die("File not found");
                }
            } else {
                echo "No record found";
            }
        } else if($filetype === "higher_degree_certificate") {
            $sql = "SELECT `higher_degree_certificate_file_name`,`higher_degree_certificate_file_path` FROM `detailed_faculty_info` WHERE `detailed_faculty_info`.`email` = '" . $email . "'";
            $result = mysqli_query($conn,$sql);
            if(mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $filename =  $row['higher_degree_certificate_file_name'];
                $tempFilePath = $row['higher_degree_certificate_file_path'];
                $finalFilePath = $_SERVER['DOCUMENT_ROOT'] . $tempFilePath;
                if (file_exists($finalFilePath)) {
                    header('Content-Type: image/png'); // For a PNG image
                    header('Content-Disposition: attachment; filename= "' . $filename . '"');
                    readfile($finalFilePath);
                    exit;
                } else {
                    http_response_code(404);
                    die("File not found");
                }
            } else {
                echo "No record found";
            }
        } else if($filetype === "award_certificate") {
            $sql = "SELECT `certificate_file_name`,`certificate_file_path` FROM `detailed_faculty_info` WHERE `detailed_faculty_info`.`email` = '" . $email . "'";
            $result = mysqli_query($conn,$sql);
            if(mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $filename =  $row['certificate_file_name'];
                $tempFilePath = $row['certificate_file_path'];
                $finalFilePath = $_SERVER['DOCUMENT_ROOT'] . $tempFilePath;
                if (file_exists($finalFilePath)) {
                    header('Content-Type: image/png'); // For a PNG image
                    header('Content-Disposition: attachment; filename= "' . $filename . '"');
                    readfile($finalFilePath);
                    exit;
                } else {
                    http_response_code(404);
                    die("File not found");
                }
            } else {
                echo "No record found";
            }
        } else {
            echo "Unexpected file type";
        }
    } else {
        echo "File or email is not set";
    }
?>