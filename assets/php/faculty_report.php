<?php
    include('C:/xampp/htdocs/project/root/config/config.php');
    include('C:/xampp/htdocs/project/root/include/header.php');

?>
    <!-- <link rel = "stylesheet" href = "/project/root/assets/css/profile_style.css"> -->
    <div class = "content-box">
    <nav class="navbar">
        <ul class="navbar-nav text-dark ">
        <a href="/project/root/home.php" style = "text-decoration: none;"><li class="nav-item text-white">Home</li></a>
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
    <div class = "container-fluid h-100">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form action="" method="GET">
                        <div class="input-group mt-5">
                            <!-- <label for="go">search bar </label> -->
                            <input type="text" id="go" placeholder="click here to search" name="search" class="form-control"
                                value="<?php    
                                    if(isset($_GET['search'])){
                                        echo $_GET['search'];
                                    }
                                ?>">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                </div>
                <div class="mt-5">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email-Id</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $con = mysqli_connect("localhost","root","","faculty_info");
                                if(isset($_GET['search'])){
                                    $searched_val = $_GET['search'];
                                    $query = "SELECT * FROM `detailed_faculty_info` WHERE CONCAT(Name) LIKE '%$searched_val%'";
                                    $query_run = mysqli_query($con,$query);

                                    if(mysqli_num_rows($query_run)>0){
                                        
                                        foreach($query_run as $items){
                                            ?>

                            <tr>
                                <td><?=$items['name']; ?></td>

                                <td><?= $items['email'] ?></td>

                            </tr>
                            <?php
                                        }
                                    }
                                else{
                                    ?>
                            <tr>
                                <td colspan="2">No record found</td>
                            </tr>
                            <?php
                                }
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php 
            $sql = "SELECT `name`,`highest_qualification`,`department`,`designation` FROM `detailed_faculty_info`";
            $result = mysqli_query($conn,$sql);
            if ($result) { $i = 1;
        ?>
                <table class="table table-striped mt-3">
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