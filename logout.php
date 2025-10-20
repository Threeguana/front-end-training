<?php
session_start();

// hapus data session dan cookies
$_SESSION = array();

// Hapus cookie "remember me"
if (isset($_COOKIE['remember_user'])) {
    // jika ada cookies akan dihapus
    setcookie('remember_user', '', time() - 3600, '/');
}

// hancurkan sesi
session_destroy();

// redirect ke halaman login
header("Location: index.php");
exit();
?>
