<?php
    include('config/config.php');
    include('include/header.php');

?>

    <!-- <link rel = "stylesheet" href = "assets/css/profile_style.css"> -->
    <div class = "content-box">
    <nav class="navbar">
        <ul class="navbar-nav text-dark ">
        <a href="home.php" style = "text-decoration: none;"><li class="nav-item text-white">Home</li></a>
        <a href="profile.php" style = "text-decoration: none;"><li class="nav-item text-white">Profile</li></a>
        <a href="email_access.php" style = "text-decoration: none;"><li class = "nav-item active">Faculty Emails</li></a>
        <a href="assets/php/faculty_report.php" style = "text-decoration: none;"><li class="nav-item text-white">Faculty Report</li></a>
        </ul>
    </nav>
    <div class = "container-fluid h-100">
        <div class = "mb-5">
            <button type = "button" class = "btn btn-success mt-2 d-flex" data-bs-toggle="modal" data-bs-target="#add_email" style = "float: right; width: 117px; height:35px;"><i class = "fa-solid fa-add mt-1"></i>Add Email</button>
        </div>
        <?php 
            $sql = "SELECT `sno`,`username` FROM `user_details`";
            $result = mysqli_query($conn,$sql);
            if ($result) { $i = 1;
        ?>
                <table class="table table-striped mt-3">
                    <thead class="table-dark">
                        <tr>
                            <th>S.No</th>
                            <th>Email Id</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = mysqli_fetch_assoc($result)) {  ?>
                            <tr>
                                <td><?php echo $i?></td>
                                <td><?php echo $row['username']?></td>
                                <td><a id = "<?= $row['username'] ?>" class = "edit_action"><i class = "fa-solid fa-pen"></i></a></td>
                                <td><a href = "assets/php/delete.php?id=<?= $row['username']?>" style = "text-decoration: none;" class = "text-dark"><i class = "fa-solid fa-trash"></i></a></td>
                            </tr>
                        <?php $i++;
                        }
                        ?>
                    </tbody>
                </table>
                <script>
                    $(document).ready(function() {
                        $(".edit_action").click(function() {
                            user_email = $(this).attr('id');
                            $.ajax({url: "assets/php/edit.php",
                                method : 'POST',
                                data: {edit_id:user_email},
                                success: function(result){
                                $(".modal-body").html(result);
                            }}); 
                            $('#myModal').modal("show");
                        })
                    })
                    // var editUserEmail = document.getElementById('myModal');
                    // editUserEmail.addEventListener('show.bs.modal', function(event) {
                    //     var button = event.relatedTarget;
                    //     var username = button.getAttribute('data-user-name');
                    //     var userId = button.getAttribute('data-user-name');
                    //     var modalUsername = editUserEmail.querySelector('#updated_email');
                    //     modalUsername.value = username;
                    // });
                </script>
        
        <!-- Edit Modal -->
        <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Update Email</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
               
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>

            </div>
        </div>
        </div>
        <?php 
            } else {
                echo "Query not executed";
             } 
        ?>
        <div class = "d-flex justify-content-center mb-3 mt-3">
            <div class="dropdown">
                <!-- <i class = "fa-solid fa-file-arrow-down dropdown-toggle" data-bs-toggle="dropdown"></i> -->
                <button class = "btn btn-primary" data-bs-toggle="modal" data-bs-target="#upload_file">Upload Excel File</button>
                <button class = "btn btn-success dropdown-toggle" data-bs-toggle = "dropdown">Download</button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="assets/php/download.php?file_type=excel1">Excel</a></li>
                    <li><a class="dropdown-item" href="assets/php/download.php?file_type=csv1">CSV</a></li>
                </ul>
            </div>
        </div>
    </div>
    </div>
    </div>
    <form action="assets/php/upload_excel.php" method="POST" enctype="multipart/form-data">
        <div class="modal fade" id="upload_file" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- modal header -->
                    <div class="modal-header">
                        <h4 class="modal-title custom-font">Upload Excel File</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <!-- modal body -->
                    <div class = "modal-body">
                        <label for = "excel_file" class = "form-label">Upload Excel File</label>
                        <div>
                            <input type="file" name="excel_file" class="m-3" accept=".xlsx,.xlsm" required>
                            <button type="submit" class = "btn btn-primary rounded-pill">Upload File</button>
                        </div>
                        <div>
                            <a href = "/project/root/assets/image/faculty_emails_snapshot.png" target = "_blank">Click here to view the excel format to upload</a>
                        </div>
                    </div>
                    <!-- modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <form action="assets/php/add_email.php" method="POST" enctype="multipart/form-data">
        <div class="modal fade" id="add_email" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- modal header -->
                    <div class="modal-header">
                        <h4 class="modal-title custom-font">New Mail Entry</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <!-- modal body -->
                    <div class = "modal-body">
                        <label for = "new_email" class = "form-label">Enter new Email</label>
                        <div class = "d-flex">
                            <input type="text" name="new_email" required>
                            <button type="submit" class = "btn btn-primary rounded-pill ms-auto">Add</button>
                        </div>
                    </div>
                    <!-- modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
<?php 
    include('C:/xampp/htdocs/project/root/include/footer.html');
?>