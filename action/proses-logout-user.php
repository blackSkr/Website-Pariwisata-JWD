<?php
session_start();

// Hancurkan semua sesi
$_SESSION = array();
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}
session_destroy();

// Redirect ke halaman login setelah logout
header("Location: ../index.php?p=pemesanan");
exit();
?>
