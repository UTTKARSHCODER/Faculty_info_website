<?php 
  include('include/header.php');
?>
<link rel="stylesheet" href="assets/css/home.css" />
<!-- main section -->
<div class="content-box">
    <!-- left nav sec  -->
    <nav class="navbar">
        <ul class="navbar-nav text-dark">
            <a href="home.php" style="text-decoration: none;">
                <li class="nav-item text-white">Home</li>
            </a>
            <a href="assets/php/profile_page.php" style="text-decoration: none;">
                <li class="nav-item text-white">Profile</li>
            </a>
            <?php if (isset($_SESSION['last_user'])) {
                if ($_SESSION['last_user'] === 'admin') { ?>
            <a href="email_access.php" style="text-decoration: none;">
                <li class="nav-item text-white">Faculty Emails</li>
            </a>
            <a href="assets/php/faculty_report.php" style="text-decoration: none;">
                <li class="nav-item text-white">Qualfication</li>
            </a>
            <li class="nav-item"><a href="#"> Specialization</a></li> <?php
                }
                }
              ?>
            <a href="certificate.html" style="text-decoration: none;">
                <li class="nav-item active">Certificate</li>
            </a>

            <a href="#" style="text-decoration: none;">
                <li class="nav-item text-white">Attendance</li>
            </a>
            <a href="#" style="text-decoration: none;">
                <li class="nav-item text-white">Announcement</li>
            </a>
            <a href="#" style="text-decoration: none;">
                <li class="nav-item text-white">Research paper</li>
            </a>
            <a href="/project/root/report.html" style="text-decoration: none;">
                <li class="nav-item text-white">Report</li>
            </a>
        </ul>
    </nav>
    <!-- Cerificate starts -->
    <div class="certificate-portion">
        <hr class="rule">
        <h1 class="certificate"><b>Your Certificate</b></h1>

        <hr class="rule">

        <div>
            <div class="row mb-5">
                <div class="col-md-12 mb-5 d-flex align-items-center flex-column text-center">

                    <h5 class="custom-font">No Certificate till now...Click below to add</h5>
                    <img src="assets/image/empty_certificate_logo.png" alt="" style="height: 300px; width: 400px;">
                </div>
                <div class="col-md-12 text-center">
                    <div class="card position-absolute bottom-0 end-0 m-3" style="width: 10rem;">
                        <div class="container text-center ">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#upload_file"><img
                                    src="assets/image/add_certificate_logo.png" alt="PIC of pdf file"><i
                                    class='fas fa-folder-plus'></i>
                                <h5 class="custom-font">Add a new certificate</h5>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- modal start -->
            <form action="assets/php/certificate.php" method="POST" enctype="multipart/form-data">
                <div class="modal fade" id="upload_file" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- modal header -->
                            <div class="modal-header">
                                <h4 class="modal-title custom-font">Upload Certificate</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <!-- modal body -->
                            <div>
                                <label for="name" class="mt-3 ms-3">Certificate Title :- </label>
                                <input type="text" id="name" class="m-3 h-70" name="file_name"
                                    placeholder=" Enter the title here">
                                <input type="file" name="upFile" class="m-3">
                                <a href=""><button type="submit">Upload File</button></a>
                            </div>
                            <!-- modal footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</body>

</html>
<?php 
    include('include/footer.html');
?>