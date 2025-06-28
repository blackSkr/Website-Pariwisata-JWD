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


$id = $_GET['id'] ?? null;

if ($id === null) {
    echo "<script>alert('ID tidak diberikan.');window.location='../dashboard.php';</script>";
    exit();
}

// Prepare and execute delete query
$query = "DELETE FROM review WHERE id_user_review = ?";
$stmt = $koneksi->prepare($query);
$stmt->bind_param('i', $id);

if ($stmt->execute()) {
    echo "<script>
            alert('Data berhasil dihapus!');
            window.location.href = '../admin/admin-semua-review.php'; // Ganti dengan halaman yang diinginkan
          </script>";
} else {
    echo "<script>
            alert('Gagal menghapus data: " . $stmt->error . "');
            window.location.href = '../admin/admin-semua-review.php'; // Ganti dengan halaman yang diinginkan
          </script>";
}
?>
