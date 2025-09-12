<?php
    include('config/config.php');
    include('include/header.php');
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.bootstrap5.css">
<style>
@media (max-width: 480px) {
    .navbar {
        display: none;
    }
}

@media screen and (min-width: 481px) and (max-width: 768px) {
    .container.h-100.dir {
        width: 79%;
    }
}

@media screen and (min-width: 769px) and (max-width: 1366px) {
    .container.h-100.dir {
        width: 79%;
    }
}
</style>
<div class="container h-100 dir">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <!-- <script src = "https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script> -->
    <script src="https://cdn.datatables.net/2.3.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.3.2/js/dataTables.bootstrap5.js"></script>

    <?php if($_SESSION['topLeftBar'] === "admin") { ?>
    <div class="mb-5">
        <button type="button" class="btn btn-success mt-2 me-2 d-flex" data-bs-toggle="modal"
            data-bs-target="#add_email" style="float: right; width: 117px; height:35px;"><i
                class="fa-solid fa-add mt-1"></i>Add Email</button>
    </div>
    <?php } ?>
    <?php 
            $sql = "SELECT `employee_id`,`name`,`email`,`department`,`contact_number`,`status` FROM `detailed_faculty_info`";
            $result = mysqli_query($conn,$sql);
            if ($result) { $i = 1;
        ?>
    <table id="access_table" class="table table-striped mt-3">
        <thead class="table-dark">
            <tr>
                <th>S.No.</th>
                <th>Employee ID</th>
                <th>Name</th>
                <th>Email Id</th>
                <th>Department</th>
                <th>Contact Number</th>
                <?php if($_SESSION['topLeftBar'] === "admin") { ?><th>Status</th>
                <th>Edit</th>
                <th>Delete</th>
                <?php } ?>
            </tr>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_assoc($result)) {
                            ?>
            <tr>
                <td><?= $i ?></td>
                <td><?php if(isset($row['employee_id'])) { echo $row['employee_id']; } else { echo 'Not Registerd.'; }?>
                </td>
                <td><?php if(isset($row['name'])) { echo $row['name']; } else { echo 'Not Registerd.'; }?></td>
                <td><?php echo $row['email']?></td>
                <td><?php if(isset($row['department'])) { echo $row['department']; } else { echo 'Not Registered.'; }?>
                </td>
                <td><?php if(isset($row['contact_number'])) { echo $row['contact_number']; } else { echo 'Not Registered.'; }?>
                </td>
                <?php if($_SESSION['topLeftBar'] === "admin") { ?><td>
                    <?php if(isset($row['status'])) { echo $row['status']; } else { echo 'No Registered.'; }?></td>
                <td><a id="<?= $row['email'] ?>" class="edit_action"><i class="fa-solid fa-pen"></i></a></td>
                <td><a href="assets/php/delete.php?id=<?= $row['email']?>" style="text-decoration: none;"
                        class="text-dark"><i class="fa-solid fa-trash"></i></a></td>
                <?php } ?>
            </tr>
            <?php $i++;
                        }
                        ?>
        </tbody>
    </table>
    <script>
    new DataTable("#access_table", {
        paging: false,
        scrollCollapse: true,
        scrollY: '245px'
    });
    </script>
    <script>
    $(document).ready(function() {
        $(".edit_action").click(function() {
            user_email = $(this).attr('id');
            $.ajax({
                url: "assets/php/edit.php",
                method: 'POST',
                data: {
                    edit_id: user_email
                },
                success: function(result) {
                    $(".modal-body").html(result);
                }
            });
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
    <?php if($_SESSION['topLeftBar'] === "admin") { ?>
    <div class="mt-3 text-center">
        <h5 style="color: gray">Downloading the file will provide you with the serial number & email only...</h5>
    </div>
    <div class="d-flex justify-content-center mb-3 mt-3">
        <div class="dropdown">
            <!-- <i class = "fa-solid fa-file-arrow-down dropdown-toggle" data-bs-toggle="dropdown"></i> -->
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#upload_file">Upload Excel
                File</button>
            <button class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown">Download</button>
            <ul class="dropdown-menu">
                <li id="excel-download"><a class="dropdown-item">Excel</a></li>
                <li id="csv-download"><a class="dropdown-item" href="assets/php/download.php?file_type=csv1">CSV</a>
                </li>
            </ul>
        </div>
    </div>
    <?php } ?>
    <script>
    var table = $('#access_table').DataTable();
    $('#excel-download').on('click', function() {
        var filteredData = [];

        table.rows({
            search: 'applied'
        }).data().each(function(value, index) {

            var rowObject = {
                name: value[1],
                email: value[2],
                department: value[3],
                contact_number: value[4],
                status: value[5]
            };

            filteredData.push(rowObject);
        });

        var form = document.createElement('form');
        form.method = 'POST';
        form.action = 'assets/php/download.php?file_type=excel1'; // The URL to your server-side script

        var dataInput = document.createElement('input');
        dataInput.type = 'hidden';
        dataInput.name = 'filteredData';
        dataInput.value = JSON.stringify(filteredData);

        form.appendChild(dataInput);
        document.body.appendChild(form);
        form.submit();

    });
    </script>
    <style>
    #access_table th,
    #access_table td {
        white-space: nowrap;
    }
    </style>
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
                <div class="modal-body">
                    <label for="excel_file" class="form-label">Upload Excel File</label>
                    <div>
                        <input type="file" name="excel_file" class="m-3" accept=".xlsx,.xlsm" required>
                        <button type="submit" class="btn btn-primary rounded-pill">Upload File</button>
                    </div>
                    <div>
                        <a href="assets/image/faculty_emails_snapshot.png" target="_blank">Click here to view the excel
                            format to upload</a>
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
                <div class="modal-body">
                    <label for="new_email" class="form-label">Enter new Email</label>
                    <div class="d-flex">
                        <input type="text" name="new_email" required>
                        <button type="submit" class="btn btn-primary rounded-pill ms-auto">Add</button>
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
    include('include/footer.html');
?>