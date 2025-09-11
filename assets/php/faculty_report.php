<?php
    include('C:/xampp/htdocs/project/root/config/config.php');
    include('C:/xampp/htdocs/project/root/include/header.php');

?>
    <!-- <link rel = "stylesheet" href = "/project/root/assets/css/profile_style.css"> -->
    <div class = "content-box">
    <nav class="navbar">
        <ul class="navbar-nav text-dark ">
        <a href="/project/root/index.php" style = "text-decoration: none;"><li class="nav-item text-white">Home</li></a>
        <a href="/project/root/profile.php" style = "text-decoration: none;"><li class="nav-item text-white">Profile</li></a>
        <a href="/project/root/email_access.php" style = "text-decoration: none;"><li class = "nav-item text-white">Faculty Emails</li></a>
        <a href="faculty_report.php" style = "text-decoration: none;"><li class="nav-item active">Faculty Report</li></a>
        <!-- <a href="/project/root/certificate-front.php" style = "text-decoration: none;"><li class="nav-item text-white">Certificate</li></a>
        <a href="#" style = "text-decoration: none;"><li class="nav-item text-white">Specialization</li></a>
        <a href="#" style = "text-decoration: none;"><li class="nav-item text-white" >Attendance</li></a>
        <a href="#" style = "text-decoration: none;"><li class="nav-item text-white" >Announcement</li></a>
        <a href="#" style = "text-decoration: none;"><li class="nav-item text-white" >Research paper</li></a>
        <a href="/project/root/report.html" style = "text-decoration: none;"><li class="nav-item text-white">Report</li></a> -->
        </ul>
    </nav>
    <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/css/bootstrap.min.css">
    <link rel = "stylesheet" href = "https://cdn.datatables.net/2.3.2/css/dataTables.bootstrap5.css">
    <div class = "container-fluid h-100">
        <script src = "https://code.jquery.com/jquery-3.7.1.js"></script>
        <script src = "https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
        <script src = "https://cdn.datatables.net/2.3.2/js/dataTables.js"></script>
        <script src = "https://cdn.datatables.net/2.3.2/js/dataTables.bootstrap5.js"></script>
        <?php 
            $sql = "SELECT `name`,`highest_qualification`,`department`,`designation` FROM `detailed_faculty_info`";
            $result = mysqli_query($conn,$sql);
            if ($result) { $i = 1;
        ?>      <div class = "table-responsive">
                    <table class="table table-striped mt-3" id = "scroll-table">
                        <thead class="table-dark">
                            <tr>
                                <th>S.No</th>
                                <th>Name</th>
                                <th>Designation</th>
                                <th>Department</th>
                                <th>Highest Qualfication</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($row = mysqli_fetch_assoc($result)) {  ?>
                                <tr>
                                    <td><?php echo $i?></td>
                                    <td><?php echo $row['name']?></td>
                                    <td><?php echo $row['designation']?></td>
                                    <td><?php echo $row['department']?></td>
                                    <td><?php echo $row['highest_qualification']?></td>
                                </tr>
                            <?php $i++;
                            }
                            ?>
                        </tbody>
                    </table>
                    <script>
                        new DataTable("#scroll-table",{
                            paging: false,
                            scrollCollapse: true,
                            scrollY: '200px'
                        });
                    </script>
                </div>
        <?php 
            } else {
                echo "Query not executed" . $conn->error;
             } 
        ?>
        <div class = "mt-3 text-center">
            <h5 style = "color: gray">Downloading the file will provide you with the entire details of Faculties...</h5>
        </div>
        <div class = "d-flex justify-content-center mb-3 mt-3">
            <div class="dropdown">
                <!-- <i class = "fa-solid fa-file-arrow-down dropdown-toggle" data-bs-toggle="dropdown"></i> -->
                <!-- <button class = "btn btn-primary" data-bs-toggle="modal" data-bs-target="#upload_file">Upload Excel File</button> -->
                <button class = "btn btn-success dropdown-toggle" data-bs-toggle = "dropdown">Download</button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="download.php?file_type=excel">Excel</a></li>
                    <li><a class="dropdown-item" href="download.php?file_type=csv">CSV</a></li>
                </ul>
            </div>
        </div>
    </div>
    </div>
    </div>
<?php 
    include('C:/xampp/htdocs/project/root/include/footer.html');
?>