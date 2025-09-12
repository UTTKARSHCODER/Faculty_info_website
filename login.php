<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty Login</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://accounts.google.com/gsi/client" async defer></script>
</head>

<body>
    <style>
    .google-login-button {
        width: 300px;
        height: 175px;
        padding: 25px;
        padding-top: 20px;
        margin-top: 200px;
        border: 3px solid purple;
        /* border-color:  3px rgb(191, 92, 191); */

        border-radius: 10px;
        /* background: linear-gradient(
      rgba(128, 0, 128, 0.6),
     rgba(75, 0, 130, 0.6)
     ); */
    </style>

    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            <div class="google-login-button">
                <h2>Welcome User! Please Login.</h2>
                <div id="g_id_onload"
                    data-client_id="452004658-r8pun8uqok65stmllmqmrhcaaenh2bt3.apps.googleusercontent.com"
                    data-callback="handleCredentialResponse" data-cancel_on_tap_outside="false"
                    data-prompt_parent_id="g_id_onload">
                </div>

                <div class="g_id_signin" data-type="standard" data-size="large" data-theme="outline"
                    data-text="sign_in_with" data-shape="rectangular" data-logo_alignment="left">
                </div>
            </div>
        </div>
    </div>
    <script>
    function handleCredentialResponse(response) {
        <?php if(isset($_GET['post'])) {
                session_start();
                $_SESSION['last_user'] = htmlspecialchars($_GET['post']);
            } ?>
        const idToken = response.credential;
        fetch('api/google-login.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    idToken: idToken
                })
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    window.location.href = 'index.php';
                } else if (data.partial_success) {
                    window.location.href = 'sign_in_form.php?job=first_login'
                } else {
                    alert(data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occured.');
            })
    }
    </script>
</body>

</html>