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

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $jenis_paket = $_POST['jenis_paket'];
    $tgl_cekin = $_POST['tgl_cekin'];
    $tgl_cekout = $_POST['tgl_cekout'];
    $status = $_POST['status'];

    $query = "UPDATE pelanggan SET nama_pelanggan=?, jenis_paket=?, tgl_cekin=?, tgl_cekout=?, status=? WHERE id_pelanggan=?";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param('sssssi', $nama_pelanggan, $jenis_paket, $tgl_cekin, $tgl_cekout, $status, $id);

    if ($stmt->execute()) {
        echo "<script>alert('Data berhasil diupdate.');window.location='../admin/dashboard.php';</script>";
    } else {
        echo "<script>alert('Terjadi kesalahan: " . $stmt->error . "');window.location='../admin/dashboard.php?id=$id';</script>";
    }

    $stmt->close();
    $koneksi->close();
} else {
    header("Location: ../admin/dashboard.php");
    exit();
}
?>
