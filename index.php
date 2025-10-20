<?php
session_start();
// pesan error
$loginError = $_SESSION['login_error'] ?? '';
unset($_SESSION['login_error']); //menghapus pesan error

function showError($error) {
    // jika tidak kosong maka akan berisi pesan error
    return !empty($error) ? "<p class='error-message'>$error</p>" : '';
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Login Page</title>
        <link rel="stylesheet" href="style.css" />
        <style>
            button {
                color: #fff;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="form-box active" id="login-form">
                <form action="login.php" method="POST">
                    <h2>Welcome back!</h2>
                    <?= showError($loginError); ?>
                    <input type="text" name="username" placeholder="Username" required autofocus />
                    <input type="password" name="password" placeholder="Password" required />
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" name="remember" id="rememberCheck">
                        <label class="form-check-label" for="rememberCheck">
                            Remember Me
                        </label>
                    </div>
                    <button type="submit" name="login">Log In</button>
                </form>
            </div>
        </div>
    </body>
</html>
