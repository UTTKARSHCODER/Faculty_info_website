<?php
    header('Content-Type: text/html'); 
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
        <script src='main.js'></script>
        <title>Submission Check</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Latest compiled JavaScript --> 
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>\
        <link rel='stylesheet' type='text/css' media='screen' href="/project/root/assets/css/style.css">

    </head>
    <body>
        <?php
            
            if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                header('Allow: POST', true, 405); // Set the Allowed method and 405 status
                echo "Method Not Allowed. This resource only accepts POST requests.";
                exit;
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                //Database connection establishing
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "faculty_info";

                //Create a connection
                $conn = mysqli_connect($servername, $username, $password, $database);
                
                if (isset($_POST['form_type'])) {
                    $formType = $_POST['form_type'];
                    $row_id = null;

                    if ($formType == "personal_details") {
                        $name = $_POST['name'];
                        $email = $_POST['email'];
                        $contact_no = $_POST['co_number'];
                        $dob = $_POST['dob'];
                        $gender = $_POST['optradio'];
                        $address = $_POST['address'];
                        if (isset($_POST['branchSelect'])) {
                            $department = $_POST['branchSelect'];
                        } else {
                            echo "Not Found";
                        }
                        $designation = $_POST['designation'];
                        $aos = $_POST['aos'];
                        $emp_id = $_POST['emp_id'];
                        $hq = $_POST['hq'];
                        $pshd = $_POST['pshd'];
                        $panno = $_POST['panno'];
                        $doj = $_POST['doj'];
                        $dop = $_POST['dop'];
                        $phdun = $_POST['phdun'];
                        $dor = $_POST['dor'];
                        $nrpp = $_POST['nrpp'];
                    
                        

                        //Die if connection is not successful
                        if(!$conn) {
                            die("We are unable to connect to the server. Sorry for the inconvinence and thanks for the co-operation!");
                        } 
                        else {
                            $sql = "INSERT INTO `detailed_faculty_info` (`name`, `email`, `contact_number`, `date_of_birth`, `gender`, `address`, `department`, `designation`, `area_of_specialization`, `employee_id`, `highest_qualification`, `passing_year`, `Pan_no`, `date_of_joining`, `promotion_date`, `phd_univer_name`, `date_of_registration`, `number_of_research_paper`) VALUES ('$name', '$email', '$contact_no', '$dob', '$gender', '$address', '$department', '$designation', '$aos', '$emp_id', '$hq', '$pshd', '$panno', '$doj', '$dop', '$phdun', '$dor', '$nrpp')";
                            $result = mysqli_query($conn, $sql);
                            $row_id = $conn->insert_id;
                            
                            if($result) {
                                $encoded_row_id = urlencode($row_id);
                                $redirectURL = "/project/root/sign_in_form2.html?id=". $encoded_row_id;
                                header('Location: ' . $redirectURL);
                            }
                            else {
                                echo '<div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                    <strong>Success!</strong> This alert box could indicate a successful or positive action.
                                </div>';
                            }
                        }
                    }
                }
                
                // if (isset($_POST['button_id'])) {
                //     $button_id = $_POST['button_id'];
                //     if ($button_id == "upload_joining_report") {
                    //Uploading files
                    //File number 1
                        if(isset($_FILES['joining_report']) && $_FILES['joining_report']['error'] === UPLOAD_ERR_OK) {
                            $original_file_name = $_FILES['joining_report']['name'];
                            $tmp_file_path = $_FILES['joining_report']['tmp_name'];

                            $uploadDir = '../uploads/joining_report/';

                            $file_extension = pathinfo($original_file_name, PATHINFO_EXTENSION);
                            $unique_file_name = uniqid(). '_' . preg_replace("/[^a-zA-Z0-9.-]/", "_", basename($original_file_name, "." . $file_extension)) . '.' . $file_extension;
                            
                            $destination_file_path = $uploadDir . $unique_file_name;

                            if (move_uploaded_file($tmp_file_path, $destination_file_path)) {
                                $row_id = $_POST['row_id'];

                                $sql = "UPDATE `detailed_faculty_info` SET `joining_report_file_name` = '$unique_file_name', `joining_report_file_path` = '$destination_file_path' WHERE `detailed_faculty_info`.`sno` = $row_id";
                                $result1 = mysqli_query($conn, $sql);

                                if($result1) {
                                echo "<div class='alert alert-success'>
                                        <strong>Success!</strong> File Uploaded Successfully.
                                        </div>";
                                } else {
                                    echo "Unable to update data id is" . $row_id;
                                }
                            }
                        } else {
                            echo "<div class='alert alert-danger'>
                                    <strong>Error!</strong> Unable to upload file. Please try again.
                                </div>";
                        }
                    }
                

                    //File number 2
                    if(isset($_FILES['offer_letter']) && $_FILES['offer_letter']['error'] === UPLOAD_ERR_OK) {
                        $original_file_name = $_FILES['offer_letter']['name'];
                        $tmp_file_path = $_FILES['offer_letter']['tmp_name'];

                        $uploadDir = '../uploads/offer_letter/';

                        $file_extension = pathinfo($original_file_name, PATHINFO_EXTENSION);
                        $unique_file_name = uniqid(). '_' . preg_replace("/[^a-zA-Z0-9.-]/", "_", basename($original_file_name, "." . $file_extension)) . '.' . $file_extension;
                        
                        $destination_file_path = $uploadDir . $unique_file_name;

                        if (move_uploaded_file($tmp_file_path, $destination_file_path)) {
                            $row_id = $_POST['row_id'];

                            $sql = "UPDATE `detailed_faculty_info` SET `offer_letter_file_name` = '$unique_file_name', `offer_letter_file_path` = '$destination_file_path' WHERE `detailed_faculty_info`.`sno` = $row_id";
                            $result2 = mysqli_query($conn, $sql);

                            echo "<div class='alert alert-success'>
                                    <strong>Success!</strong> File Uploaded Successfully.
                                    </div>";
                        }
                    } else {
                        echo "<div class='alert alert-danger'>
                                <strong>Error!</strong> Unable to upload file. Please try again.
                            </div>";
                    }


                    //File number 3
                    if(isset($_FILES['higher_degree_certificate']) && $_FILES['higher_degree_certificate']['error'] === UPLOAD_ERR_OK) {
                        $original_file_name = $_FILES['higher_degree_certificate']['name'];
                        $tmp_file_path = $_FILES['higher_degree_certificate']['tmp_name'];

                        $uploadDir = '../uploads/higher_degree_certificate/';

                        $file_extension = pathinfo($original_file_name, PATHINFO_EXTENSION);
                        $unique_file_name = uniqid(). '_' . preg_replace("/[^a-zA-Z0-9.-]/", "_", basename($original_file_name, "." . $file_extension)) . '.' . $file_extension;
                        
                        $destination_file_path = $uploadDir . $unique_file_name;

                        if (move_uploaded_file($tmp_file_path, $destination_file_path)) {
                            $row_id = $_POST['row_id'];

                            $sql = "UPDATE `detailed_faculty_info` SET `higher_degree_certificate_file_name` = '$unique_file_name', `higher_degree_certificate_file_path` = '$destination_file_path' WHERE `detailed_faculty_info`.`sno` = $row_id";
                            $result3 = mysqli_query($conn, $sql);

                            echo "<div class='alert alert-success'>
                                    <strong>Success!</strong> File Uploaded Successfully.
                                    </div>";
                        }
                    } else {
                        echo "<div class='alert alert-danger'>
                                <strong>Error!</strong> Unable to upload file. Please try again.
                            </div>";
                    }

                    //File number 4
                    if(isset($_FILES['salary_slip']) && $_FILES['salary_slip']['error'] === UPLOAD_ERR_OK) {
                        $original_file_name = $_FILES['salary_slip']['name'];
                        $tmp_file_path = $_FILES['salary_slip']['tmp_name'];

                        $uploadDir = '../uploads/salary_slip/';

                        $file_extension = pathinfo($original_file_name, PATHINFO_EXTENSION);
                        $unique_file_name = uniqid(). '_' . preg_replace("/[^a-zA-Z0-9.-]/", "_", basename($original_file_name, "." . $file_extension)) . '.' . $file_extension;
                        
                        $destination_file_path = $uploadDir . $unique_file_name;

                        if (move_uploaded_file($tmp_file_path, $destination_file_path)) {
                            $row_id = $_POST['row_id'];

                            $sql = "UPDATE `detailed_faculty_info` SET `salary_slip_file_name` = '$unique_file_name', `salary_slip_file_path` = '$destination_file_path' WHERE `detailed_faculty_info`.`sno` = $row_id";
                            $result4 = mysqli_query($conn, $sql);

                            echo "<div class='alert alert-success'>
                                    <strong>Success!</strong> File Uploaded Successfully.
                                    </div>";
                        }
                    } else {
                        echo "<div class='alert alert-danger'>
                                <strong>Error!</strong> Unable to upload file. Please try again.
                            </div>";
                    }

                    //File number 5
                    if(isset($_FILES['extension_awards']) && $_FILES['extension_awards']['error'] === UPLOAD_ERR_OK) {
                        $original_file_name = $_FILES['extension_awards']['name'];
                        $tmp_file_path = $_FILES['extension_awards']['tmp_name'];

                        $uploadDir = '../uploads/extension_awards/';

                        $file_extension = pathinfo($original_file_name, PATHINFO_EXTENSION);
                        $unique_file_name = uniqid(). '_' . preg_replace("/[^a-zA-Z0-9.-]/", "_", basename($original_file_name, "." . $file_extension)) . '.' . $file_extension;
                        
                        $destination_file_path = $uploadDir . $unique_file_name;

                        if (move_uploaded_file($tmp_file_path, $destination_file_path)) {
                            $row_id = $_POST['row_id'];

                            $sql = "UPDATE `detailed_faculty_info` SET `certificate_file_name` = '$unique_file_name', `certificate_file_path` = '$destination_file_path' WHERE `detailed_faculty_info`.`sno` = $row_id";
                            $result5 = mysqli_query($conn, $sql);

                            echo "<div class='alert alert-success'>
                                    <strong>Success!</strong> File Uploaded Successfully.
                                    </div>";
                        }
                    } else {
                        echo "<div class='alert alert-danger'>
                                <strong>Error!</strong> Unable to upload file. Please try again.
                            </div>";
                    }
                // } else {
                    // echo "upload joining button not set";
                // }
            // }
        ?>
    </body>
</html>
    