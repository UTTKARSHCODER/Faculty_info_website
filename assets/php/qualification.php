<?php
    include('C:/xampp/htdocs/project/root/config/config.php');
    include('C:/xampp/htdocs/project/root/include/header.php');

?>
    <link rel = "stylesheet" href = "/project/root/assets/css/profile_style.css">
    <div class = "content-box">
    <nav class="navbar">
        <ul class="navbar-nav text-dark ">
        <a href="/project/root/home.php" style = "text-decoration: none;"><li class="nav-item text-white">Home</li></a>
        <a href="profile_page.php" style = "text-decoration: none;"><li class="nav-item text-white">Profile</li></a>
        <a href="qualification.php" style = "text-decoration: none;"><li class="nav-item active">Qualfication</li></a>
        <a href="/project/root/certificate-front.php" style = "text-decoration: none;"><li class="nav-item text-white">Certificate</li></a>
        <a href="#" style = "text-decoration: none;"><li class="nav-item text-white">Specialization</li></a>
        <a href="#" style = "text-decoration: none;"><li class="nav-item text-white" >Attendance</li></a>
        <a href="#" style = "text-decoration: none;"><li class="nav-item text-white" >Announcement</li></a>
        <a href="#" style = "text-decoration: none;"><li class="nav-item text-white" >Research paper</li></a>
        <a href="/project/root/report.html" style = "text-decoration: none;"><li class="nav-item text-white">Report</li></a>
        </ul>
    </nav>
    <div class = "alignment">
        <div class = "top-right mb-3 mt-3" style = "float: right; margin-right: 50px;">
            <div class="dropdown">
                <i class = "fa-solid fa-file-arrow-down dropdown-toggle" data-bs-toggle="dropdown"></i>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="download.php?file_type=excel">Excel</a></li>
                    <li><a class="dropdown-item" href="download.php?file_type=csv">CSV</a></li>
                </ul>
            </div>
        </div>
        <?php 
            $sql = "SELECT `name`,`highest_qualification` FROM `detailed_faculty_info`";
            $result = mysqli_query($conn,$sql);
            if ($result) { $i = 1;
        ?>
                <table class="table table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>S.No</th>
                            <th>Name</th>
                            <th>Highest Qualification</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = mysqli_fetch_assoc($result)) {  ?>
                            <tr>
                                <td><?php echo $i?></td>
                                <td><?php echo $row['name']?></td>
                                <td><?php echo $row['highest_qualification']?></td>
                            </tr>
                        <?php $i++;
                        }
                        ?>
                    </tbody>
                </table>
        <?php 
            } else {
                echo "Query not executed";
             } 
        ?>
    </div>
    </div>
    </div>
<?php 
    include('C:/xampp/htdocs/project/root/include/footer.html');
?>