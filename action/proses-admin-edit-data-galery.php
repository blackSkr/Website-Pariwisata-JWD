<?php
include '../koneksi.php';
session_start();

// Periksa apakah sesi admin ada
if (!isset($_SESSION['id_admin'])) {
    header("Location: ../index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_galery = $_POST['id_galery'];
    $namagambar = $_POST['namagambar'];
    $deskripsi = $_POST['deskripsi'];
    $status = $_POST['status'];
    $target_file = $_POST['old_pict']; // Default gambar lama

    // Proses upload gambar jika ada file gambar yang diunggah
    if (isset($_FILES["pict"]) && $_FILES["pict"]["error"] == UPLOAD_ERR_OK) {
        $target_dir = "../admin-img-uploads/";
        $target_file = $target_dir . basename($_FILES["pict"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Periksa apakah file gambar adalah gambar sebenarnya atau bukan
        $check = getimagesize($_FILES["pict"]["tmp_name"]);
        if ($check === false) {
            $uploadOk = 0;
            echo "<script>alert('File yang diunggah bukan gambar.');</script>";
        }

        // Batasi ukuran file (misal 2MB)
        if ($_FILES["pict"]["size"] > 2000000) {
            $uploadOk = 0;
            echo "<script>alert('Ukuran file terlalu besar.');</script>";
        }

        // Batasi format file
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            $uploadOk = 0;
            echo "<script>alert('Hanya file JPG, JPEG, PNG & GIF yang diperbolehkan.');</script>";
        }

        // Cek jika $uploadOk adalah 0 karena ada kesalahan
        if ($uploadOk === 0) {
            $target_file = $_POST['old_pict']; // Gunakan gambar lama
        } else {
            if (move_uploaded_file($_FILES["pict"]["tmp_name"], $target_file)) {
                // Upload berhasil
            } else {
                $target_file = $_POST['old_pict']; // Kembalikan gambar lama jika gagal
                echo "<script>alert('Terjadi kesalahan saat mengupload gambar.');</script>";
            }
        }
    }

    // Simpan data ke database
    $sql = "UPDATE galery SET nama_gambar = ?, gambar = ?, deskripsi = ?, status = ? WHERE id_galery = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("ssssi", $namagambar, $target_file, $deskripsi, $status, $id_galery);
    if ($stmt->execute()) {
        echo "<script>
                alert('Data berhasil diubah');
                window.location.href = '../admin/daftar-semua-galery.php';
              </script>";
    } else {
        // Debugging: Output the error message
        error_log("Error: " . $stmt->error);
        echo "Error: " . $stmt->error;
    }
}
?>
