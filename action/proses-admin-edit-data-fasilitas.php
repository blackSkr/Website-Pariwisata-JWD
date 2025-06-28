<?php
include '../koneksi.php';

// Pastikan ID fasilitas tersedia
if (isset($_POST['id_fasilitas'])) {
    $id_fasilitas = $_POST['id_fasilitas'];
    $jenisfasilitas = $_POST['jenisfasilitas'];
    $deskripsi = $_POST['deskripsi'];
    $status = $_POST['status'];
    $old_pict = $_POST['old_pict'];

    // Tentukan direktori upload gambar
    $uploadFileDir = '../admin-img-uploads/';
    
    // Cek jika ada file gambar baru yang diupload
    if (isset($_FILES['pict']) && $_FILES['pict']['error'] == UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['pict']['tmp_name'];
        $fileName = $_FILES['pict']['name'];
        $fileNameCmps = explode('.', $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        // Tentukan nama file baru dan lokasi upload
        $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
        $dest_path = $uploadFileDir . $newFileName;

        // Pindahkan file ke direktori upload
        if (move_uploaded_file($fileTmpPath, $dest_path)) {
            // Hapus gambar lama dari server jika ada
            if ($old_pict && file_exists($uploadFileDir . $old_pict)) {
                unlink($uploadFileDir . $old_pict);
            }
            $gambar = '../admin-img-uploads/' . $newFileName; // Simpan path lengkap
        } else {
            // Jika upload gagal, tetap gunakan gambar lama
            $gambar = '../admin-img-uploads/' . $old_pict;
        }
    } else {
        // Jika tidak ada file baru, gunakan gambar lama
        $gambar = '../admin-img-uploads/' . $old_pict;
    }

    // Update data fasilitas di database
    $sql = "UPDATE fasilitas SET jenis_fasilitas = ?, deskripsi = ?, gambar = ?, status = ? WHERE id_fasilitas = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param('ssssi', $jenisfasilitas, $deskripsi, $gambar, $status, $id_fasilitas);

    if ($stmt->execute()) {
        $stmt->close();
        // Redirect ke halaman yang sesuai setelah berhasil
        header('Location: ../admin/daftar-semua-fasilitias.php');
    } else {
        $stmt->close();
        // Redirect dengan status error
        header('Location: ../admin/daftar-semua-fasilitias.php ');
    }
} else {
    // Redirect jika ID fasilitas tidak ditemukan
    header('Location: ../admin-view-fasilitas.php?status=error');
}
?>
