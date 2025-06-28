<?php
include '../koneksi.php';
session_start();

// Periksa apakah sesi admin ada
if (isset($_SESSION['id_admin'])) {
    $iduser = $_SESSION['id_admin'];
} else {
    header("Location: ../index.php");
    exit();
}

// Pastikan kunci array ada
$id = isset($_POST['id']) ? intval($_POST['id']) : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
$nama = isset($_POST['nama']) ? $_POST['nama'] : null;
$komentar = isset($_POST['komentar']) ? $_POST['komentar'] : null;
$status = isset($_POST['status']) ? $_POST['status'] : null;

// Validasi input
if ($id === null || $email === null || $nama === null || $komentar === null || $status === null) {
    echo "<script>
        alert('Data tidak lengkap.');
        window.location.href = '../admin/admin-edit-review.php'; // Redirect ke halaman dashboard
    </script>";
    exit();
}

// Persiapkan dan jalankan query
$query = "UPDATE review SET email=?, nama=?, komentar=?, status=? WHERE id_user_review=?";
$stmt = $koneksi->prepare($query);

if ($stmt === false) {
    echo "<script>
        alert('Prepare statement error: " . htmlspecialchars($koneksi->error) . "');
        window.location.href = '../admin/admin-edit-review.php'; // Redirect ke halaman dashboard
    </script>";
    exit();
}

$stmt->bind_param('ssssi', $email, $nama, $komentar, $status, $id);

if ($stmt->execute()) {
    echo "<script>
        alert('Review berhasil diperbarui!');
        window.location.href = '../admin/admin-semua-review.php'; // Redirect ke halaman yang sesuai
    </script>";
} else {
    echo "<script>
        alert('Gagal memperbarui review: " . htmlspecialchars($stmt->error) . "');
        window.location.href = '../admin/admin-semua-review.php'; // Redirect ke halaman dashboard
    </script>";
}

$stmt->close();
$koneksi->close();
?>
