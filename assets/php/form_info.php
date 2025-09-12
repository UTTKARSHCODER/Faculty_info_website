<?php
    header('Content-Type: application/json');
    header("Access-Control-Allow-Origin: https://faculty-information-website.infinityfreeapp.com");
    include('../../config/config.php');
    session_start();
?>

<?php
    
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        http_response_code(405);
        echo "Method not allowed";
        header('Allow: POST', true, 405); // Set the Allowed method and 405 status
        echo json_encode(['success' => false, 'message' => 'Method Not Allowed']);
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $maxSizeInBytes = 10 * 1024 * 1024;
        if (isset($_GET['job']) && $_GET['job'] === 'first_login') {
            $message = $_GET['job'];
            $salu = $_POST['saluSelect'];
            $name = strtolower($_POST['name']);
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
            $designation = $_POST['deptSelect'];
            if (isset($_POST['aosSelect'])) {
                if ($_POST['aosSelect'] === 'other') {
                    $aos = $_POST['otheraosInputSelect'];
                } else {
                    $aos = $_POST['aosSelect'];
                }
            }
            $emp_id = $_POST['emp_id'];
            if (isset($_POST['hq'])) {
                if ($_POST['hq'] === 'other') {
                    $hq = $_POST['otherhqInputSelect'];
                } else {
                    $hq = $_POST['hq'];
                }
            }
            $pshd = $_POST['pshd'];
            $panno = $_POST['panno'];
            $doj = $_POST['doj'];
            $dop = $_POST['dop'];
            $phdun = $_POST['phdun'];
            if($_POST['dor'] === '') {
                $dor = null;
            } else {
                $dor = $_POST['dor'];
            }
            $nrpp = $_POST['nrpp'];
            
            $sql = "UPDATE `detailed_faculty_info` SET `salutation` = '$salu', `name` = '$name', `email` = '$email', `contact_number` = '$contact_no', `date_of_birth` = '$dob', `gender` = '$gender', `address` =  '$address', `department` = '$department', `designation` = '$designation', `area_of_specialization` = '$aos', `employee_id` = '$emp_id', `highest_qualification` = '$hq', `passing_year` = '$pshd', `Pan_no` = '$panno', `date_of_joining` = '$doj', `promotion_date` = '$dop', `phd_univer_name` = '$phdun', `date_of_registration` = '$dor', `number_of_research_paper` = '$nrpp' WHERE `detailed_faculty_info`.`email` = '" . $_SESSION['userEmail'] . "'";
            $result = mysqli_query($conn, $sql);
            
            if($result && mysqli_affected_rows($conn) > 0) {
                echo json_encode(['success' => true,'message' => $message]);
            }
            else {
                echo json_encode(['success' => false,'message' => 'Failed!']);
            }
        } else if(isset($_GET['job'])) {
            $message = isset($_GET['job']) ? $_GET['job'] : null;
            $salu = $_POST['saluSelect'];
            $name = strtolower($_POST['name']);
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
            $designation = $_POST['deptSelect'];
            if (isset($_POST['aosSelect'])) {
                if ($_POST['aosSelect'] === 'other') {
                    $aos = $_POST['otheraosInputSelect'];
                } else {
                    $aos = $_POST['aosSelect'];
                }
            }
            $emp_id = $_POST['emp_id'];
            if (isset($_POST['hq'])) {
                if ($_POST['hq'] === 'other') {
                    $hq = $_POST['otherhqInputSelect'];
                } else {
                    $hq = $_POST['hq'];
                }
            }
            $pshd = $_POST['pshd'];
            $panno = $_POST['panno'];
            $doj = $_POST['doj'];
            $dop = $_POST['dop'];
            $phdun = $_POST['phdun'];
            if($_POST['dor'] === '') {
                $dor = null;
            } else {
                $dor = $_POST['dor'];
            }
            $nrpp = $_POST['nrpp'];

            $sql = "UPDATE `detailed_faculty_info` SET `salutation` = '$salu',`name` = '$name', `email` = '$email', `contact_number` = '$contact_no', `date_of_birth` = '$dob', `gender` = '$gender', `address` =  '$address', `department` = '$department', `designation` = '$designation', `area_of_specialization` = '$aos', `employee_id` = '$emp_id', `highest_qualification` = '$hq', `passing_year` = '$pshd', `Pan_no` = '$panno', `date_of_joining` = '$doj', `promotion_date` = '$dop', `phd_univer_name` = '$phdun', `date_of_registration` = '$dor', `number_of_research_paper` = '$nrpp' WHERE `detailed_faculty_info`.`email` = '" . $_SESSION['userEmail'] . "'";
            $result = mysqli_query($conn, $sql);
            
            if($result) {
                if (mysqli_affected_rows($conn) > 0) {
                    echo json_encode(['success' => true,'message' => $message]);
                } else {
                    echo json_encode(['success' => true,'message' => $message]);
                }
            }
            else {
                echo 'Something went wrong!';
            }
        }
        
        
        // else if (isset($_GET['job']) && $_GET['job'] === 'save') {
        //     $salu = $_POST['saluSelect'];
        //     $name = $_POST['name'];
        //     $email = $_POST['email'];
        //     $contact_no = $_POST['co_number'];
        //     $dob = $_POST['dob'];
        //     $gender = $_POST['optradio'];
        //     $address = $_POST['address'];
        //     if (isset($_POST['branchSelect'])) {
        //         $department = $_POST['branchSelect'];
        //     } else {
        //         echo "Not Found";
        //     }
        //     $designation = $_POST['deptSelect'];
        //     if (isset($_POST['aosSelect'])) {
        //         if ($_POST['aosSelect'] === 'other') {
        //             $aos = $_POST['otheraosInputSelect'];
        //         } else {
        //             $aos = $_POST['aosSelect'];
        //         }
        //     }
        //     $emp_id = $_POST['emp_id'];
        //     if (isset($_POST['hq'])) {
        //         if ($_POST['hq'] === 'other') {
        //             $hq = $_POST['otherhqInputSelect'];
        //         } else {
        //             $hq = $_POST['hq'];
        //         }
        //     }
        //     $pshd = $_POST['pshd'];
        //     $panno = $_POST['panno'];
        //     $doj = $_POST['doj'];
        //     $dop = $_POST['dop'];
        //     $phdun = $_POST['phdun'];
        //     $dor = $_POST['dor'];
        //     $nrpp = $_POST['nrpp'];
            
        //     $sql = "UPDATE `detailed_faculty_info` SET `salutation` = '$salu', `name` = '$name', `email` = '$email', `contact_number` = '$contact_no', `date_of_birth` = '$dob', `gender` = '$gender', `address` =  '$address', `department` = '$department', `designation` = '$designation', `area_of_specialization` = '$aos', `employee_id` = '$emp_id', `highest_qualification` = '$hq', `passing_year` = '$pshd', `Pan_no` = '$panno', `date_of_joining` = '$doj', `promotion_date` = '$dop', `phd_univer_name` = '$phdun', `date_of_registration` = '$dor', `number_of_research_paper` = '$nrpp' WHERE `detailed_faculty_info`.`email` = '" . $_SESSION['userEmail'] . "'";
        //     $result = mysqli_query($conn, $sql);
            
        //     if($result && mysqli_affected_rows($conn) > 0) {
        //         $redirectURL = "../../index.php";
        //         header('Location: ' . $redirectURL);
        //     }
        //     else {
        //         echo 'Value of aos is' . $aos;
        //     }
        //}
        
        
        //Uploading files
        if(isset($_POST['button_id'])) {
            $button_id = $_POST['button_id'];
            

            //File number 1
            if ($button_id == "upload_profile_pic") {
                if(isset($_FILES['profile_pic']) && $_FILES['profile_pic']['error'] === UPLOAD_ERR_OK) {
                    if ($_FILES['profile_pic']['size'] > $maxSizeInBytes) {
                        echo json_encode(['success' => false, 'message' => 'Error! File Size excceds the limit.']);
                    } else {
                        $original_file_name = $_FILES['profile_pic']['name'];
                        $tmp_file_path = $_FILES['profile_pic']['tmp_name'];
                        $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/assets/uploads/profile_picture/';
                        $tableUploadDir = '/assets/uploads/profile_picture/';

                        $file_extension = pathinfo($original_file_name, PATHINFO_EXTENSION);
                        $unique_file_name = uniqid(). '_' . preg_replace("/[^a-zA-Z0-9.-]/", "_", basename($original_file_name, "." . $file_extension)) . '.' . $file_extension;
                        
                        $destination_file_path = $uploadDir . $unique_file_name;
                        $table_file_path = $tableUploadDir . $unique_file_name;

                        if (move_uploaded_file($tmp_file_path, $destination_file_path)) {
                            $email_id = $_POST['email_id'];

                            $sql11 = "UPDATE `detailed_faculty_info` SET `profile_filename` = '$unique_file_name', `profile_path` = '$table_file_path' WHERE `detailed_faculty_info`.`email` = '" .$email_id ."'";
                            $result111 = mysqli_query($conn, $sql11);
                            $affected_rows = mysqli_affected_rows($conn);
                            if($result111) {
                                echo json_encode(['success' => true, 'message' => 'Success! Profile Photo uploaded Succesfully']);
                            } else {
                                echo json_encode(['success' => false, 'message' => 'Error! Unable to upload file for id '. $email_id]);
                            }
                        }
                    }
                } else {
                    if(!isset($_FILES['profile_pic'])) {
                        echo json_encode(['success' => false, 'message' => "File not set!"]);
                    }
                    
                }
            }


            
            //File number 2
            if ($button_id == "upload_joining_report") {
                if(isset($_FILES['joining_report']) && $_FILES['joining_report']['error'] === UPLOAD_ERR_OK) {
                    if ($_FILES['joining_report']['size'] > $maxSizeInBytes) {
                        echo json_encode(['success' => false, 'message' => "Error! File's Size excceds the limit"]);
                    } else {
                        $original_file_name = $_FILES['joining_report']['name'];
                        $tmp_file_path = $_FILES['joining_report']['tmp_name'];

                        $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/assets/uploads/joining_report/';
                        $tableUploadDir = '/assets/uploads/joining_report/';

                        $file_extension = pathinfo($original_file_name, PATHINFO_EXTENSION);
                        $unique_file_name = uniqid(). '_' . preg_replace("/[^a-zA-Z0-9.-]/", "_", basename($original_file_name, "." . $file_extension)) . '.' . $file_extension;
                        
                        $destination_file_path = $uploadDir . $unique_file_name;
                        $table_file_path = $tableUploadDir . $unique_file_name;

                        if (move_uploaded_file($tmp_file_path, $destination_file_path)) {
                            $email_id = $_POST['email_id'];

                            $sql = "UPDATE `detailed_faculty_info` SET `joining_report_file_name` = '$unique_file_name', `joining_report_file_path` = '$table_file_path' WHERE `detailed_faculty_info`.`email` = '$email_id'";
                            $result1 = mysqli_query($conn, $sql);

                            if($result1) {
                                echo json_encode(['success' => true,'message' => 'Success! File uploaded Succesfully']);
                            } else {
                                echo json_encode(['success' => false, 'message' => 'Error! Unable to upload file please try later']);
                            }
                        }
                    }
                } else {
                    echo "<div class='alert alert-danger'>
                            <strong>Error!</strong> Unable to upload file. Please try again.
                        </div>";
                }
            }
        

            //File number 3
            if ($button_id == "upload_offer_letter") {
                if(isset($_FILES['offer_letter']) && $_FILES['offer_letter']['error'] === UPLOAD_ERR_OK) {
                    if ($_FILES['offer_letter']['size'] > $maxSizeInBytes) {
                        echo json_encode(['success' => false, 'message' => "Error! File's Size excceds the limit"]);
                    } else {
                        $original_file_name = $_FILES['offer_letter']['name'];
                        $tmp_file_path = $_FILES['offer_letter']['tmp_name'];

                        $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/assets/uploads/offer_letter/';
                        $tableUploadDir = '/assets/uploads/offer_letter/';

                        $file_extension = pathinfo($original_file_name, PATHINFO_EXTENSION);
                        $unique_file_name = uniqid(). '_' . preg_replace("/[^a-zA-Z0-9.-]/", "_", basename($original_file_name, "." . $file_extension)) . '.' . $file_extension;
                        
                        $destination_file_path = $uploadDir . $unique_file_name;
                        $table_file_path = $tableUploadDir . $unique_file_name;

                        if (move_uploaded_file($tmp_file_path, $destination_file_path)) {
                            $email_id = $_POST['email_id'];

                            $sql = "UPDATE `detailed_faculty_info` SET `offer_letter_file_name` = '$unique_file_name', `offer_letter_file_path` = '$table_file_path' WHERE `detailed_faculty_info`.`email` = '$email_id'";
                            $result2 = mysqli_query($conn, $sql);
                            
                            if($result2) {
                                echo json_encode(['success' => true,'message' => 'Success! File uploaded Succesfully']);
                            } else {
                                echo json_encode(['success' => false, 'message' => 'Error! Unable to upload file please try later']);
                            }
                        }
                    }
                } else {
                    echo "<div class='alert alert-danger'>
                            <strong>Error!</strong> Unable to upload file. Please try again.
                        </div>";
                }
            }


            //File number 4
            if ($button_id == "upload_higer_degree_certificate") {
                if(isset($_FILES['higher_degree_certificate']) && $_FILES['higher_degree_certificate']['error'] === UPLOAD_ERR_OK) {
                    if ($_FILES['higher_degree_certificate']['size'] > $maxSizeInBytes) {
                        echo json_encode(['success' => false, 'message' => "Error! File's Size excceds the limit"]);
                    } else {
                        $original_file_name = $_FILES['higher_degree_certificate']['name'];
                        $tmp_file_path = $_FILES['higher_degree_certificate']['tmp_name'];

                        $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/assets/uploads/higher_degree_certificate/';
                        $tableUploadDir = '/assets/uploads/higher_degree_certificate/';

                        $file_extension = pathinfo($original_file_name, PATHINFO_EXTENSION);
                        $unique_file_name = uniqid(). '_' . preg_replace("/[^a-zA-Z0-9.-]/", "_", basename($original_file_name, "." . $file_extension)) . '.' . $file_extension;
                        
                        $destination_file_path = $uploadDir . $unique_file_name;
                        $table_file_path = $tableUploadDir . $unique_file_name;

                        if (move_uploaded_file($tmp_file_path, $destination_file_path)) {
                            $email_id = $_POST['email_id'];

                            $sql = "UPDATE `detailed_faculty_info` SET `higher_degree_certificate_file_name` = '$unique_file_name', `higher_degree_certificate_file_path` = '$table_file_path' WHERE `detailed_faculty_info`.`email` = '$email_id'";
                            $result3 = mysqli_query($conn, $sql);

                            if($result3) {
                                echo json_encode(['success' => true,'message' => 'Success! File uploaded Succesfully']);
                            } else {
                                echo json_encode(['success' => false, 'message' => 'Error! Unable to upload file please try later']);
                            }
                        }
                    }
                } else {
                    echo "<div class='alert alert-danger'>
                            <strong>Error!</strong> Unable to upload file. Please try again.
                        </div>";
                }
            }

            //File number 5
            if ($button_id == "upload_salary_slip") {
                if(isset($_FILES['salary_slip']) && $_FILES['salary_slip']['error'] === UPLOAD_ERR_OK) {
                    if ($_FILES['salary_slip']['size'] > $maxSizeInBytes) {
                        echo json_encode(['success' => false, 'message' => "Error! File's Size excceds the limit"]);
                    } else {
                        $original_file_name = $_FILES['salary_slip']['name'];
                        $tmp_file_path = $_FILES['salary_slip']['tmp_name'];

                        $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/assets/uploads/salary_slip/';
                        $tableUploadDir = '/assets/uploads/salary_slip/';

                        $file_extension = pathinfo($original_file_name, PATHINFO_EXTENSION);
                        $unique_file_name = uniqid(). '_' . preg_replace("/[^a-zA-Z0-9.-]/", "_", basename($original_file_name, "." . $file_extension)) . '.' . $file_extension;
                        
                        $destination_file_path = $uploadDir . $unique_file_name;
                        $table_file_path = $tableUploadDir . $unique_file_name;

                        if (move_uploaded_file($tmp_file_path, $destination_file_path)) {
                            $email_id = $_POST['email_id'];

                            $sql = "UPDATE `detailed_faculty_info` SET `salary_slip_file_name` = '$unique_file_name', `salary_slip_file_path` = '$table_file_path' WHERE `detailed_faculty_info`.`email` = '$email_id'";
                            $result4 = mysqli_query($conn, $sql);

                            if($result4) {
                                echo json_encode(['success' => true,'message' => 'Success! File uploaded Succesfully']);
                            } else {
                                echo json_encode(['success' => false, 'message' => 'Error! Unable to upload file please try later']);
                            }
                        }
                    }
                } else {
                    echo "<div class='alert alert-danger'>
                            <strong>Error!</strong> Unable to upload file. Please try again.
                        </div>";
                }
            }

            //File number 6
            if ($button_id == "upload_certificates") {
                if(isset($_FILES['extension_awards']) && $_FILES['extension_awards']['error'] === UPLOAD_ERR_OK) {
                    if ($_FILES['extension_awards']['size'] > $maxSizeInBytes) {
                        echo json_encode(['success' => false, 'message' => "Error! File's Size excceds the limit"]);
                    } else {
                        $original_file_name = $_FILES['extension_awards']['name'];
                        $tmp_file_path = $_FILES['extension_awards']['tmp_name'];

                        $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/assets/uploads/extension_awards/';
                        $tableUploadDir = '/assets/uploads/extension_awards/';

                        $file_extension = pathinfo($original_file_name, PATHINFO_EXTENSION);
                        $unique_file_name = uniqid(). '_' . preg_replace("/[^a-zA-Z0-9.-]/", "_", basename($original_file_name, "." . $file_extension)) . '.' . $file_extension;
                        
                        $destination_file_path = $uploadDir . $unique_file_name;
                        $table_file_path = $tableUploadDir . $unique_file_name;

                        if (move_uploaded_file($tmp_file_path, $destination_file_path)) {
                            $email_id = $_POST['email_id'];

                            $sql = "UPDATE `detailed_faculty_info` SET `certificate_file_name` = '$unique_file_name', `certificate_file_path` = '$table_file_path' WHERE `detailed_faculty_info`.`email` = '$email_id'";
                            $result5 = mysqli_query($conn, $sql);

                            if($result5) {
                                echo json_encode(['success' => true,'message' => 'Success! File uploaded Succesfully']);
                            } else {
                                echo json_encode(['success' => false, 'message' => 'Error! Unable to upload file please try later']);
                            }
                        }
                    }
                } else {
                    echo "<div class='alert alert-danger'>
                            <strong>Error!</strong> Unable to upload file. Please try again.
                        </div>";
                }
            }
        } 
    } 
?>