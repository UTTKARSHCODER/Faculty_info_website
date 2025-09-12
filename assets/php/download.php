<?php 
    include('../../config/config.php');
    session_start();
    require '../../vendor/autoload.php';

    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
    $filename = "faculty_data";
    if(isset($_GET['file_type'])) {
        $filetype = htmlspecialchars($_GET['file_type']);
        if($filetype === 'csv') {
            $sql = "SELECT `sno`,`name`,`email`,`contact_number`,`date_of_birth`,`gender`,`address`,`department`,`designation`,`area_of_specialization`,`employee_id`,`highest_qualification`,`passing_year`,`Pan_no`,`date_of_joining`,`promotion_date`,`phd_univer_name`,`date_of_registration`,`number_of_research_paper` FROM `detailed_faculty_info`";
            $result = mysqli_query($conn,$sql);

            if($result -> num_rows > 0) {
                header('Content-Type: text/csv');
                header('Content-Disposition: attachment; filename="faculty_report_data_'.'.csv"');
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
            $sheet->setCellValue('B1', 'Salutation');
            $sheet->setCellValue('C1', 'Name');
            $sheet->setCellValue('D1', 'Email');
            $sheet->setCellValue('E1', 'Contact Number');
            $sheet->setCellValue('F1', 'Date Of Birth');
            $sheet->setCellValue('G1', 'Gender');
            $sheet->setCellValue('H1', 'Address');
            $sheet->setCellValue('I1', 'Department');
            $sheet->setCellValue('J1', 'Designation');
            $sheet->setCellValue('K1', 'Area Of Specialization');
            $sheet->setCellValue('L1', 'Employee Id');
            $sheet->setCellValue('M1', 'Highest Qualification');
            $sheet->setCellValue('N1', 'Passing Year');
            $sheet->setCellValue('O1', 'PAN No.');
            $sheet->setCellValue('P1', 'Date Of Joining');
            $sheet->setCellValue('Q1', 'Profile Picture');
            $sheet->setCellValue('R1', 'Joining Report File');
            $sheet->setCellValue('S1', 'Offer Letter');
            $sheet->setCellValue('T1', 'Higher Degree Certificate');
            $sheet->setCellValue('U1', 'Salary Slip');
            $sheet->setCellValue('V1', 'Extension Certificate');
            $sheet->setCellValue('W1', 'Promotion Date');
            $sheet->setCellValue('X1', 'PHD pursuing University Name');
            $sheet->setCellValue('Y1', 'Date Of Registration(If PHD pursuing)');
            $sheet->setCellValue('Z1', 'Number Of Research Paper');
            if(isset($_POST['optcheck']) && is_array($_POST['optcheck'])) {
                $servername = "sql211.infinityfree.com";
                $username = "if0_39689443";
                $password = "d6bCQuJi8C7s";
                $dbname = "if0_39689443_faculty_info";

                $conn1 = new mysqli($servername, $username, $password, $dbname);
                $values = $_POST['optcheck'];

                $sql = "SELECT * FROM `detailed_faculty_info` WHERE 1=1 AND `detailed_faculty_info`.`status` = 'Registered'";
                $params = [];
                $types = '';

                $conditions = [];
                foreach ($values as $value) {
                    $conditions[] = "department = ?";
                    $params[] = $value;
                    $types .= 's';
                }

                if(!empty($conditions)) {
                    $sql .= " AND (" .implode(" OR ", $conditions) . ")";
                }


                $stmt = $conn->prepare($sql);
                if($stmt === false) {
                    die("Error preparing statement: " . $conn1->error);
                }

                if(!empty($params)) {
                    $stmt->bind_param($types, ...$params);
                }

                $stmt->execute();
            
                $query_run = $stmt->get_result();
                
                $_SESSION['last_query_run'] = $query_run->fetch_all(MYSQLI_ASSOC);
            }
            $baseURL = "https://faculty-information-website.infinityfreeapp.com";
            $query_run1 = $_SESSION['last_query_run'];
            if(count($query_run1) > 0) {
                $rowCount = 2;
                foreach($query_run1 as $data)
                {
                    $sheet->setCellValue('A'.$rowCount, $data['sno']);
                    $sheet->setCellValue('B'.$rowCount, $data['salutation']);
                    $sheet->setCellValue('C'.$rowCount, $data['name']);
                    $sheet->setCellValue('D'.$rowCount, $data['email']);
                    $sheet->setCellValue('E'.$rowCount, $data['contact_number']);
                    $sheet->setCellValue('F'.$rowCount, $data['date_of_birth']);
                    $sheet->setCellValue('G'.$rowCount, $data['gender']);
                    $sheet->setCellValue('H'.$rowCount, $data['address']);
                    $sheet->setCellValue('I'.$rowCount, $data['department']);
                    $sheet->setCellValue('J'.$rowCount, $data['designation']);
                    $sheet->setCellValue('K'.$rowCount, $data['area_of_specialization']);
                    $sheet->setCellValue('L'.$rowCount, $data['employee_id']);
                    $sheet->setCellValue('M'.$rowCount, $data['highest_qualification']);
                    $sheet->setCellValue('N'.$rowCount, $data['passing_year']);
                    $sheet->setCellValue('O'.$rowCount, $data['Pan_no']);
                    $sheet->setCellValue('P'.$rowCount, $data['date_of_joining']);
                    $fullURL = $baseURL . $data['profile_path'];
                    $sheet->setCellValue('Q'.$rowCount, $data['profile_path']);
                    $sheet->getCell('Q'.$rowCount)->getHyperlink()->setUrl($fullURL);
                    $fullURL1 = $baseURL . $data['joining_report_file_path'];
                    $sheet->setCellValue('R'.$rowCount, $data['joining_report_file_path']);
                    $sheet->getCell('R'.$rowCount)->getHyperlink()->setUrl($fullURL1);
                    $fullURL2 = $baseURL . $data['offer_letter_file_path'];
                    $sheet->setCellValue('S'.$rowCount, $data['offer_letter_file_path']);
                    $sheet->getCell('S'.$rowCount)->getHyperlink()->setUrl($fullURL2);
                    $fullURL3 = $baseURL . $data['higher_degree_certificate_file_path'];
                    $sheet->setCellValue('T'.$rowCount, $data['higher_degree_certificate_file_path']);
                    $sheet->getCell('T'.$rowCount)->getHyperlink()->setUrl($fullURL3);
                    $fullURL4 = $baseURL . $data['salary_slip_file_path'];
                    $sheet->setCellValue('U'.$rowCount, $data['salary_slip_file_path']);
                    $sheet->getCell('U'.$rowCount)->getHyperlink()->setUrl($fullURL4);
                    $fullURL5 = $baseURL . $data['certificate_file_path'];
                    $sheet->setCellValue('V'.$rowCount, $data['certificate_file_path']);
                    $sheet->getCell('V'.$rowCount)->getHyperlink()->setUrl($fullURL5);
                    $sheet->setCellValue('W'.$rowCount, $data['promotion_date']);
                    $sheet->setCellValue('X'.$rowCount, $data['phd_univer_name']);
                    $sheet->setCellValue('Y'.$rowCount, $data['date_of_registration']);
                    $sheet->setCellValue('Z'.$rowCount, $data['number_of_research_paper']);
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
                echo "SQL query is: " . $sql;
                echo "No data found.";
            }
            // $stmt->close();
        } else if($filetype === 'excel1') {
            $filename = "faculty_emails";
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();

            $sheet->setCellValue('A1', 'Name');
            $sheet->setCellValue('B1', 'Email');
            $sheet->setCellValue('C1', 'Department');
            $sheet->setCellValue('D1', 'Contact Number');
            $sheet->setCellValue('E1', 'Status');
            

            if(isset($_POST['filteredData'])) {
                $jsonData = $_POST['filteredData'];
                $filteredData = json_decode($jsonData, true);
                $header = array_keys($filteredData[0]);
                $sheet->fromArray([$header], null, 'A1');
                $rowCount = 2;
                if (is_array($filteredData) && !empty($filteredData)) {
                    $sheet->fromArray($filteredData, null, 'A2');
                    $writer = new Xlsx($spreadsheet);
                    $final_filename = $filename.'filtered.xlsx';
                    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                    header('Content-Disposition: attactment; filename="'.urlencode($final_filename).'"');
                    $writer->save('php://output');
                    exit;
                } else {
                    echo "Unable to correctly fetch filteredData";
                }
            } else if(!isset($_POST['filteredData'])) {
                $sql = "SELECT `name`,`email`,`department`,`contact_number`,`status` FROM `detailed_faculty_info`";
                $query_run = mysqli_query($conn,$sql);
                if (mysqli_num_rows($query_run) > 0) {
                    $rowCount = 2;
                    foreach($query_run as $data)
                    {       
                        $sheet->setCellValue('A'.$rowCount, $data['name']);
                        $sheet->setCellValue('B'.$rowCount, $data['email']);
                        $sheet->setCellValue('C'.$rowCount, $data['department']);
                        $sheet->setCellValue('D'.$rowCount, $data['contact_number']);
                        $sheet->setCellValue('E'.$rowCount, $data['status']);
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
            } 
            $conn->close();
        } else if($filetype === 'csv1') {
            $sql = "SELECT `employee_id`,`name`,`email`,`department`,`contact_number`,`status` FROM `detailed_faculty_info`";
            $result = mysqli_query($conn,$sql);

            if($result -> num_rows > 0) {
                header('Content-Type: text/csv');
                header('Content-Disposition: attachment; filename="directory_data_'.'.csv"');
                $output = fopen('php://output','w');
                fputcsv($output, array('Employee ID','Name','Email','Department','Contact Number','Status'));
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