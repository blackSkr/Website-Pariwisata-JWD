<?php
include '../koneksi.php';
session_start();

// Periksa apakah sesi admin ada
if (isset($_SESSION['id_admin'])) {
    $iduser = $_SESSION['id_admin'];
    // Ambil data admin jika diperlukan, misalnya
    // $query = "SELECT * FROM admin WHERE id_admin = ?";
    // $stmt = $koneksi->prepare($query);
    // $stmt->bind_param("i", $iduser);
    // $stmt->execute();
    // $data_admin = $stmt->get_result()->fetch_assoc();
    // $username = $data_admin['username'];
} else {
    header("Location: ../index.php");
    exit();
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM pelanggan WHERE id_pelanggan = ?";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param('i', $id);

    if ($stmt->execute()) {
        echo "<script>alert('Data berhasil dihapus.');window.location='../admin/daftar-semua-pengunjung-checkin.php';</script>";
    } else {
        echo "<script>alert('Terjadi kesalahan: " . $stmt->error . "');window.location='../admin/daftar-semua-pengunjung-checkin.php';</script>";
    }

    $stmt->close();
    $koneksi->close();
} else {
    header("Location:'../admin/daftar-semua-pengunjung-checkin.php';");
    exit();
}
?>
