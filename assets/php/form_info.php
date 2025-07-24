<?php
    header('Content-Type: text/html'); 
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
        <script src='main.js'></script>
        <title>Form Successful!</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Latest compiled JavaScript --> 
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>\
        <link rel='stylesheet' type='text/css' media='screen' href="/assets/css/style.css">
    </head>
    <body>
        <?php
            if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                header('Allow: POST', true, 405); // Set the Allowed method and 405 status
                echo "Method Not Allowed. This resource only accepts POST requests.";
                exit;
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $name = $_POST['name'];
                $gender = $_POST['optradio'];
                $email = $_POST['email'];
                $contact_no = $_POST['co_number'];
                $address = $_POST['address'];
                $martial_st = $_POST['optradio1'];
                if (isset($_POST['branchSelect'])) {
                    $department = $_POST['branchSelect'];
                } else {
                    echo "Not Found";
                }
                $designation = $_POST['designation'];
                $password1 = $_POST['pwd'];

                //Database connection establishing
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "faculty_info";

                //Create a connection
                $conn = mysqli_connect($servername, $username, $password, $database);

                //Die if connection is not successful
                if(!$conn) {
                    die("We are unable to connect to the server. Sorry for the inconvinence and thanks for the co-operation!");
                } 
                else {
                    $sql = "INSERT INTO `facutly_details` (`name`, `gender`, `email`, `contact_num`, `address`, `martial_status`, `department`, `designation`, `password`) VALUES ('$name', '$gender', '$email', '$contact_no', '$address', '$martial_st', '$department', '$designation', '$password1')";
                    $result = mysqli_query($conn, $sql);
                    
                    if($result) {
                        header('Location: /project/root/sample.html');
                    }
                    else {
                        echo '<div class="alert alert-danger alert-dismissible">
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            <strong>Success!</strong> This alert box could indicate a successful or positive action.
                        </div>';
                    }
                }
            }
        ?>
    </body>
</html>
    