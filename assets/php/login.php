<?php 
include('C:/xampp/htdocs/project/root/config/config.php');

$sql = "SELECT email FROM `detailed_faculty_info`";
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0) {
    if(isset($_POST['email']) && isset($_POST['pwd'])) {
        session_start();
        $usermail = null;
        while($row = mysqli_fetch_assoc($result)) {
            if ($_POST['email'] == $row['email']) {
                $usermail = $row['email'];
                break;
            }
        }
        if ($usermail != null) {
            $_SESSION['userEmail'] = $usermail;
            header("Location: profile_page.php");
        } else {
            echo "You are not registered in website. You w'll be redirected to sign Up page";
            header("Location: ../sign_in_form.php");
        }
    }
}
?>