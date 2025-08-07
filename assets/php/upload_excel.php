<?php 
    include('C:/xampp/htdocs/project/root/config/config.php');

    require '/../xampp/htdocs/project/vendor/autoload.php';

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

            $count = "0";
            forEach($data as $row) {
                if ($count > 0) {
                    $username = $row['1'];
                    
                    $uploadQuery = "INSERT INTO `user_details` (`username`) VALUES ('$username')";
                    $result = mysqli_query($conn, $uploadQuery);
                    if($result) {
                        header('Location: faculty_report.php');
                    } else {
                        echo "Unable to update file".$conn->error;
                    }
                } else {
                    $count = "1";
                }
            }
        }
    }
?>