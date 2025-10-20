<?php
session_start();

$users = [ //array menyimpan data pengguna
    'admin' => '321', // password untuk admin
    'user'  => '123'  // password untuk user
];

// memeriksa apakah form terkirim
if (isset($_POST['login'])) {
    $username = strtolower(trim($_POST['username']));
    $password = $_POST['password'];

    // validasi
    if (isset($users[$username]) && $users[$username] === $password) {
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $username === 'admin' ? 'admin' : 'user';

        // Remember Me
        if (!empty($_POST['remember'])) {
            // Set cookie untuk 1 jam
            setcookie('remember_user', $username, time() + 3600, "/");
            // nama, nilai, waktu expire, path
        } else {
            if (isset($_COOKIE['remember_user'])) {
                setcookie('remember_user', '', time() - 3600, "/");
            }
        }
        // redirect sesuai role
        header("Location: {$_SESSION['role']}.php");
        exit();
    }

    // jika login gagal
    $_SESSION['login_error'] = "<b>Invalid username or password!</b>";
    header("Location: index.php");
    exit();
}
// mengalihkan ke index.php
header("Location: index.php");
exit();
?>
