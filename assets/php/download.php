<?php 
    include('C:/xampp/htdocs/project/root/config/config.php');
    session_start();
    require '/../xampp/htdocs/project/root/vendor/autoload.php';

    use PhpOffice\PhpSpreadsheet\Reader\Xls;
    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
    $filename = "faculty_data";
    if(isset($_GET['file_type'])) {
        $filetype = htmlspecialchars($_GET['file_type']);
        if($filetype === 'csv') {
            $sql = "SELECT `sno`,`name`,`highest_qualification` FROM `detailed_faculty_info`";
            $result = mysqli_query($conn,$sql);

            if($result -> num_rows > 0) {
                header('Content-Type: text/csv');
                header('Content-Disposition: attachment; filename="user_data_'.'.csv"');
                $output = fopen('php://output','w');
                fputcsv($output, array('Sno','Name','Highest Qualification'));
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
            $sheet->setCellValue('C1', 'Highest Qualification');

            $rowCount = 2;
            foreach($query_run as $data)
            {
                $sheet->setCellValue('A'.$rowCount, $data['sno']);
                $sheet->setCellValue('B'.$rowCount, $data['name']);
                $sheet->setCellValue('C'.$rowCount, $data['email']);
                $rowCount++;
            }
            $writer = new Xlsx($spreadsheet);
            $final_filename = $filename.'.xlsx';
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attactment; filename="'.urlencode($final_filename).'"');
            $writer->save('php://output');
        }
    }
?>