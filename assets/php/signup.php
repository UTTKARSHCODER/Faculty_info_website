<?php 
include('/project/root/config/config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['signemail'];
    $password = $_POST['signpass'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO `user_details` (`username`, `password`) VALUES ('$username', '$hashed_password')";
    $result = mysqli_query($conn, $sql);
    if($result) {
        echo 'Data saved to database successfully';
        header('Location: /my_project/root/sign_in_form.php');
    } else {
        echo 'Unable to fetch or set data';
    }
}
?>