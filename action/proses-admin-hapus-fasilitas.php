<?php
include '../koneksi.php';

// Pastikan ID fasilitas tersedia
if (isset($_POST['id_fasilitas'])) {
    $id_fasilitas = $_POST['id_fasilitas'];

    // Ambil data gambar lama dari database untuk dihapus jika ada
    $sql = "SELECT gambar FROM fasilitas WHERE id_fasilitas = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param('i', $id_fasilitas);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();
    $gambar = $data['gambar'];
    $stmt->close();

    // Tentukan direktori gambar
    $uploadFileDir = '../admin-img-uploads/';
    
    // Hapus gambar dari direktori jika ada
    if ($gambar && file_exists($uploadFileDir . $gambar)) {
        unlink($uploadFileDir . $gambar);
    }

    // Hapus data fasilitas dari database
    $sql = "DELETE FROM fasilitas WHERE id_fasilitas = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param('i', $id_fasilitas);

    if ($stmt->execute()) {
        $stmt->close();
        // Redirect ke halaman yang sesuai setelah berhasil
        header('Location: ../admin/daftar-semua-fasilitias.php');
    } else {
        $stmt->close();
        // Redirect dengan status error
        header('Location: ../admin/daftar-semua-fasilitias.php?status=error');
    }
} else {
    // Redirect jika ID fasilitas tidak ditemukan
    header('Location: ../admin-view-fasilitas.php?status=error');
}
?>
