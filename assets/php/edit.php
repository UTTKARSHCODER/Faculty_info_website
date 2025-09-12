<?php
    include('../../config/config.php');

    // for fetching the data for the edit task

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        if(isset($_GET['edit_id1'])) {
            $email = $_GET['edit_id1'];
            $new_email = $_POST['updated_email'];
            $query = "UPDATE `detailed_faculty_info` SET `email`= '$new_email' WHERE `detailed_faculty_info`.`email`='$email'";
            $result = mysqli_query($conn , $query);
            if($result) {

                header('Location: ../../email_access.php');
            } else {
                echo "ERROR: DATA IS NOT UPDATED";
            }
        }
        // $data = mysqli_fetch_assoc($result);

        else if(isset($_POST['edit_id'])) {
            $output = '';
            $email = $_POST['edit_id'];
            $query = "SELECT `email` FROM `detailed_faculty_info` WHERE `detailed_faculty_info`.`email` = '$email'";
            $result1 = mysqli_query($conn, $query);
            if (mysqli_num_rows($result1) > 0) {
                $row = mysqli_fetch_assoc($result1); 
                $output .= '
                <form action = "assets/php/edit.php?edit_id1='. $row["email"] .'"  method="POST">
                    <div style = "display: flex;">
                        <div class = "mb-3">
                            <label for = "email" class = "form-label">Email</label>
                            <input type = "text" class = "form-control" id = "updated_email" value = "'.$row["email"].'" placeholder="Enter email"  name = "updated_email">
                        </div>
                        <div class = "ms-auto" style = "margin-top: 32px;">
                            <button type = "submit" class="btn btn-primary" >Update</button></a>
                        </div>
                    </div>
                </form>
                ';
                echo $output;
            } else {
                echo "No data found";
            }
        } else {
            echo "Edit_id not set";
        }
    } else {
        echo "Method not allowed";
    }

// now the updation part took place

// if(isset($_POST['update'])){
//     $id = $_POST['id'];
//     $email = $_POST['Email'];
//     $name = $_POST['Name'];

//     $query = "";

//     $result = mysqli_query($con,$query);
    
//     if($result){
//         header("Location: admin.php?search=$data[$name]");
//         exit();
//     }else{
//         echo "ERROR: DATA IS NOT UPDATED";
//     }
// }
// 

// <html lang="en">

// <head>
//     <meta charset="UTF-8">
//     <meta name="viewport" content="width=device-width, initial-scale=1.0">
//     <title>Document</title>
//      Font Awesome CDN 
//     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
//      Latest compiled and minified CSS 
//     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

//      Latest compiled JavaScript
//     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

// </head>

// <body>
//     form filling for the editing task 

//     <form method="post">
//         <input type="hidden" name="id" value="">
//         Email: <input type="text" class="form-control mt-5 mb-5" name="Email" value=""> <br>
//         Name: <input type="text" class="form-control mt-5 mb-5" name="Name" value=""> <br>
//         <button type="submit" name="update" class="btn btn-primary">UPDATE</button>
//     </form>
// </body>

// </html> -->

?>