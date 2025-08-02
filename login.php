<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty Login</title>
    <script src="https://accounts.google.com/gsi/client" async defer></script>
</head>
<body>
    <style>
        .google-login-button{
            width: 300px;
            height: 100px;
            margin-left: 575px;
            margin-top: 300px;
            border: 0px solid red;
        }
    </style>
    
    <div class = "google-login-button">
        <h2>Welcome Faculty! Please Login.</h2>
        <div id="g_id_onload"
            data-client_id="452004658-r8pun8uqok65stmllmqmrhcaaenh2bt3.apps.googleusercontent.com" data-callback="handleCredentialResponse"
            data-cancel_on_tap_outside="false"
            data-prompt_parent_id="g_id_onload">
        </div>

        <div class="g_id_signin"
            data-type="standard"
            data-size="large"
            data-theme="outline"
            data-text="sign_in_with"
            data-shape="rectangular"
            data-logo_alignment="left">
        </div>
    </div>
    <script>
        function handleCredentialResponse(response) {
            const idToken = response.credential;
            <?php if(isset($_GET['post'])) {
                        session_start();
                    $_SESSION['last_user'] = htmlspecialchars($_GET['post']); } ?>
            fetch('api/google-login.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ idToken: idToken })
            })
            .then(res => res.json())
            .then(data => {
                if(data.success) {
                    window.location.href = 'sign_in_form.php';
                } else {
                    alert(data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occured.')
            })
        }
    </script>
</body>
</html>