<?php 
    include('../../config/config.php');

    require '../../vendor/autoload.php';

    use Dom\Mysql;
    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if(isset($_FILES['excel_file'])) {
            $fileName = $_FILES['excel_file']['name'];
            $file_ext = pathinfo($fileName, PATHINFO_EXTENSION);

            $inputFileNamePath = $_FILES['excel_file']['tmp_name'];
            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileNamePath);
            $data = $spreadsheet->getActiveSheet()->toArray();
            $count = 0;
            forEach($data as $row) {
                if ($count == 1) {
                    $emp_id = isset($row[0])? trim($row[0]) : null;
                    $name = isset($row[1])? trim($row[1]) : null;
                    $email = isset($row[2])? trim($row[2]) : null;
                    $department = isset($row[3])? trim($row[3]) : null;
                    $contact_number = isset($row[4])? trim($row[4]) : null;
                    $status = isset($row[5])? trim($row[5]) : '';
                    if (trim($status) === '') {
                        $status = 'Not Registered';
                    } 

                    $checkEmailQuery = "SELECT `email` FROM `detailed_faculty_info` WHERE `detailed_faculty_info`.`email` = '" . $email . "'";
                    $emailResult = mysqli_query($conn,$checkEmailQuery);
                    if (mysqli_num_rows($emailResult) > 0) {
                        echo "Email already exist";
                    } else {
                        $uploadQuery = "INSERT INTO `detailed_faculty_info` (`employee_id`,`name`,`email`,`department`,`contact_number`,`status`) VALUES ('$emp_id','$name','$email','$department','$contact_number','$status')";
                        $result = mysqli_query($conn, $uploadQuery);
                        if($result) {
                            echo "Emp id is: " . $emp_id;
                            echo "Emp name is: " . $name;
                            echo "Emp email is: " . $email;
                            echo "Emp dept is: " . $department;
                            echo "Emp status is: " . $status;
                            // header('Location: /email_access.php');
                        } else {
                            echo "Unable to update file".$conn->error;
                        }
                    }
                } else {
                    $count = 1;
                }
            }
        }
    }
?>