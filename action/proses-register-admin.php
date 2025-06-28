<?php
include "../koneksi.php"; // Ganti dengan path yang sesuai

if (isset($_POST['register'])) {
    $user = $_POST['user'];
    $pass = $_POST['pasw'];

    // Hash password
    $hashedPassword = password_hash($pass, PASSWORD_DEFAULT);

    // Query untuk memasukkan data
    $query = "INSERT INTO useradmin (user, pasw) VALUES (?, ?)";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param('ss', $user, $hashedPassword);

    if ($stmt->execute()) {
        echo "<script>alert('Admin berhasil didaftarkan.');</script>";
        header("Location:../admin/index.php"); // Redirect setelah berhasil
        exit();
    } else {
        echo "<script>alert('Terjadi kesalahan: " . $stmt->error . "');</script>";
        header("Location: ../admin/index.php"); // Redirect jika terjadi kesalahan
        exit();
    }

    $stmt->close();
    $koneksi->close();
} else {
    // Jika tidak ada POST data, redirect ke halaman registrasi
    header("Location: ../admin/index.php");
    exit();
}
?>
