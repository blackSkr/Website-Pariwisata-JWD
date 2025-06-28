<?php
include '../koneksi.php';
session_start();

// Periksa apakah sesi admin ada
if (!isset($_SESSION['id_admin'])) {
    header("Location: ../index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $namagambar = $_POST['namagambar'];
    $deskripsi = $_POST['deskripsi'];

    // Proses upload gambar
    $target_dir = "../admin-img-uploads/";
    $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Periksa apakah file gambar adalah gambar sebenarnya atau bukan
    $check = getimagesize($_FILES["gambar"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }

    // Batasi ukuran file (misal 2MB)
    if ($_FILES["gambar"]["size"] > 2000000) {
        $uploadOk = 0;
    }

    // Batasi format file
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        $uploadOk = 0;
    }

    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
            // Ambil path relatif untuk disimpan di database
            $relative_path = '../admin-img-uploads/' . basename($_FILES["gambar"]["name"]);

            // Query untuk menambah data ke dalam tabel galeri
            $sql = "INSERT INTO galery (nama_gambar, gambar, deskripsi, status) VALUES (?, ?, ?, 'tidak tampil')";
            $stmt = $koneksi->prepare($sql);
            $stmt->bind_param("sss", $namagambar, $relative_path, $deskripsi);

            if ($stmt->execute()) {
                // Redirect setelah data berhasil ditambahkan
                header("Location: ../admin/tambah-daftar-semua-galery.php");
                exit();
            } else {
                echo "Error: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "Sorry, your file was not uploaded.";
    }
}

$koneksi->close();
?>
