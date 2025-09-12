<?php

session_start();
include('../config/config.php');


require_once __DIR__ . '/../vendor/autoload.php';

const GOOGLE_CLIENT_ID = "452004658-r8pun8uqok65stmllmqmrhcaaenh2bt3.apps.googleusercontent.com";
$allowedEmails = [];
if (isset($_SESSION['last_user'])) {
    if ($_SESSION['last_user'] === 'admin') {
        array_push($allowedEmails,'b240259@skit.ac.in');
        array_push($allowedEmails,'b241035@skit.ac.in');
        array_push($allowedEmails,'b241111@skit.ac.in');
        array_push($allowedEmails,'b240569@skit.ac.in');
        array_push($allowedEmails,'manish.bhardwaj@skit.ac.in');
    } else if ($_SESSION['last_user'] === 'faculty') {
        $allowedEmails = [];
        $sql = "SELECT username FROM `user_details`";
        $result = mysqli_query($conn,$sql);
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                array_push($allowedEmails,$row['username']);
            }
        }
    }
} 

$input = file_get_contents('php://input');
$data = json_decode($input, true);

if(!isset($data['idToken'])) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'ID token missing']);
    exit();
}

$idToken = $data['idToken'];

$client = new Google_Client();
$client->setClientId(GOOGLE_CLIENT_ID);

try {
    $payload = $client->verifyIdToken($idToken);
    if($payload) {
        $userEmail = $payload['email'];
        $isAuthorized = false;
        //Verifying with our database
        // echo $allowedEmails[0];
        if(in_array($userEmail, $allowedEmails)) {
            $isAuthorized = true;
        }
        $sql1 = "SELECT `email`,`status` FROM `detailed_faculty_info` WHERE `detailed_faculty_info`.`email` = '" . $userEmail . "'";
        $result1 = mysqli_query($conn,$sql1);
        if ($isAuthorized && mysqli_num_rows($result1) > 0) {
            $row = mysqli_fetch_assoc($result1);
            $_SESSION['logged_in'] = true;
            $_SESSION['userEmail'] = $userEmail;
            http_response_code(200);
            $_SESSION['topLeftBar'] = $_SESSION['last_user'];
            if ($row['status'] === 'Registered') {
                echo json_encode(['success' => true,'message' => 'Login Succesful!']);
            } else {
                echo json_encode(['partial_success' => true, 'message' => 'Login Successful!, but not registered']);
            }
            // header('Location: /project/root/assets/php/rofile_page.php');
        } else {
            unset($_SESSION['last_user']);
            http_response_code(403);
            echo json_encode(['success' => false, 'message' => 'Access Denied: Your email is not registered as the post choosen. Please Refresh the Page to Continue']);
        }
    } else {
        // Token verification failed for an unknown reason
        http_response_code(401);
        echo json_encode(['success' => false, 'message' => 'Invalid Google ID token.']);
    }
} catch(Exception $e) {
    error_log("Google ID Token verification error: " . $e->getMessage());
    http_response_code(401);
    echo json_encode(['success' => false, 'message' => 'Authentication failed: ' . $e->getMessage()]);
}