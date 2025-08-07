<?php 
    include('C:/xampp/htdocs/project/root/config/config.php');
    session_start();
    require '/../xampp/htdocs/project/vendor/autoload.php';

    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
    $filename = "faculty_data";
    if(isset($_GET['file_type'])) {
        $filetype = htmlspecialchars($_GET['file_type']);
        if($filetype === 'csv') {
            $sql = "SELECT * FROM `detailed_faculty_info`";
            $result = mysqli_query($conn,$sql);

            if($result -> num_rows > 0) {
                header('Content-Type: text/csv');
                header('Content-Disposition: attachment; filename="user_data_'.'.csv"');
                $output = fopen('php://output','w');
                fputcsv($output, array('Sno','Name','Email','Contact Number','Date Of Birth','Gender','Address','Department','Designation','Area Of Specialization','Employee Id','Highest Qualification','Passing Year','PAN No.','Date Of Joining','Promotion Date','PHD pursuing University Name','Date Of Registration(If PHD pursuing)','Number Of Research Paper'));
                while($row = $result->fetch_assoc()) {
                    fputcsv($output,$row);
                }
                fclose($output);
            } else {
                echo "No data found.";
            }
            $conn->close();
        } else if($filetype === 'excel') {
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();

            $sheet->setCellValue('A1', 'Sno');
            $sheet->setCellValue('B1', 'Name');
            $sheet->setCellValue('C1', 'Email');
            $sheet->setCellValue('D1', 'Contact Number');
            $sheet->setCellValue('E1', 'Date Of Birth');
            $sheet->setCellValue('F1', 'Gender');
            $sheet->setCellValue('G1', 'Address');
            $sheet->setCellValue('H1', 'Department');
            $sheet->setCellValue('I1', 'Designation');
            $sheet->setCellValue('J1', 'Area Of Specialization');
            $sheet->setCellValue('K1', 'Employee Id');
            $sheet->setCellValue('L1', 'Highest Qualification');
            $sheet->setCellValue('M1', 'Passing Year');
            $sheet->setCellValue('N1', 'PAN No.');
            $sheet->setCellValue('O1', 'Date Of Joining');
            $sheet->setCellValue('P1', 'Promotion Date');
            $sheet->setCellValue('Q1', 'PHD pursuing University Name');
            $sheet->setCellValue('R1', 'Date Of Registration(If PHD pursuing)');
            $sheet->setCellValue('S1', 'Number Of Research Paper');
            $sql = "SELECT * FROM `detailed_faculty_info`";
            $query_run = mysqli_query($conn,$sql);

            if(mysqli_num_rows($query_run) > 0) {
                $rowCount = 2;
                foreach($query_run as $data)
                {
                    $sheet->setCellValue('A'.$rowCount, $data['sno']);
                    $sheet->setCellValue('B'.$rowCount, $data['name']);
                    $sheet->setCellValue('C'.$rowCount, $data['email']);
                    $sheet->setCellValue('D'.$rowCount, $data['contact_number']);
                    $sheet->setCellValue('E'.$rowCount, $data['date_of_birth']);
                    $sheet->setCellValue('F'.$rowCount, $data['gender']);
                    $sheet->setCellValue('G'.$rowCount, $data['address']);
                    $sheet->setCellValue('H'.$rowCount, $data['department']);
                    $sheet->setCellValue('I'.$rowCount, $data['designation']);
                    $sheet->setCellValue('J'.$rowCount, $data['area_of_specialization']);
                    $sheet->setCellValue('K'.$rowCount, $data['employee_id']);
                    $sheet->setCellValue('L'.$rowCount, $data['highest_qualification']);
                    $sheet->setCellValue('M'.$rowCount, $data['passing_year']);
                    $sheet->setCellValue('N'.$rowCount, $data['Pan_no']);
                    $sheet->setCellValue('O'.$rowCount, $data['date_of_joining']);
                    $sheet->setCellValue('P'.$rowCount, $data['promotion_date']);
                    $sheet->setCellValue('Q'.$rowCount, $data['phd_univer_name']);
                    $sheet->setCellValue('R'.$rowCount, $data['date_of_registration']);
                    $sheet->setCellValue('S'.$rowCount, $data['number_of_research_paper']);
                    // $sheet->setCellValue('T'.$rowCount, $data['highest_qualification']);
                    // $sheet->setCellValue('U'.$rowCount, $data['highest_qualification']);
                    // $sheet->setCellValue('V'.$rowCount, $data['highest_qualification']);
                    // $sheet->setCellValue('W'.$rowCount, $data['highest_qualification']);
                    // $sheet->setCellValue('X'.$rowCount, $data['highest_qualification']);
                    // $sheet->setCellValue('Y'.$rowCount, $data['highest_qualification']);
                    // $sheet->setCellValue('Z'.$rowCount, $data['highest_qualification']);
                    $rowCount++;
                }
                $writer = new Xlsx($spreadsheet);
                $final_filename = $filename.'.xlsx';
                header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                header('Content-Disposition: attactment; filename="'.urlencode($final_filename).'"');
                $writer->save('php://output');
            } else {
                echo "No data found.";
            }
            $conn->close();
        } else if($filetype === 'excel1') {
            $filename = "faculty_emails";
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();

            $sheet->setCellValue('A1', 'Sno');
            $sheet->setCellValue('B1', 'Email');

            $sql = "SELECT * FROM `user_details`";
            $query_run = mysqli_query($conn,$sql);

            if(mysqli_num_rows($query_run) > 0) {
                $rowCount = 2;
                foreach($query_run as $data)
                {
                    $sheet->setCellValue('A'.$rowCount, $data['sno']);
                    $sheet->setCellValue('B'.$rowCount, $data['username']);
                    $rowCount++;
                }
                $writer = new Xlsx($spreadsheet);
                $final_filename = $filename.'.xlsx';
                header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                header('Content-Disposition: attactment; filename="'.urlencode($final_filename).'"');
                $writer->save('php://output');
            } else {
                echo "No data found.";
            }
            $conn->close();
        } else if($filetype === 'csv1') {
            $sql = "SELECT * FROM `user_details`";
            $result = mysqli_query($conn,$sql);

            if($result -> num_rows > 0) {
                header('Content-Type: text/csv');
                header('Content-Disposition: attachment; filename="user_data_'.'.csv"');
                $output = fopen('php://output','w');
                fputcsv($output, array('Sno','Email'));
                while($row = $result->fetch_assoc()) {
                    fputcsv($output,$row);
                }
                fclose($output);
            } else {
                echo "No data found.";
            }
            $conn->close();
        }
    }
?>