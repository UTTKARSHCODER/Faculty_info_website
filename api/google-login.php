<?php

session_start();
include('C:/xampp/htdocs/project/root/config/config.php');


require_once __DIR__ . '/../../vendor/autoload.php';

const GOOGLE_CLIENT_ID = "452004658-r8pun8uqok65stmllmqmrhcaaenh2bt3.apps.googleusercontent.com";
$allowedEmails = [];
if (isset($_SESSION['last_user'])) {
    if ($_SESSION['last_user'] === 'admin') {
        array_push($allowedEmails,'b240259@skit.ac.in');
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
        if ($isAuthorized) {
            $_SESSION['logged_in'] = true;
            $_SESSION['userEmail'] = $userEmail;
            http_response_code(200);
            echo json_encode(['success' => true,'message' => 'Login Succesful!']);
            // header('Location: /project/root/assets/php/rofile_page.php');
        } else {
            unset($_SESSION['last_user']);
            http_response_code(403);
            echo json_encode(['success' => false, 'message' => 'Access Denied: Your email is not registered as post choosen.Refresh Page to Continue']);
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