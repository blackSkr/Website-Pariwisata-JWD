<?php
include '../koneksi.php';
session_start();

// Periksa apakah sesi admin ada
if (!isset($_SESSION['id_admin'])) {
    header("Location: ../index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $jenisfasilitas = $_POST['jenisfasilitas'];
    $deskripsi = $_POST['deskripsi'];

    // Proses upload gambar
    $target_dir = "../admin-img-uploads/";
    $target_file = $target_dir . basename($_FILES["pict"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Periksa apakah file gambar adalah gambar sebenarnya atau bukan
    $check = getimagesize($_FILES["pict"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Batasi ukuran file (misal 2MB)
    if ($_FILES["pict"]["size"] > 2000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Batasi format file
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Periksa apakah uploadOk masih 1 (tidak ada kesalahan)
    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["pict"]["tmp_name"], $target_file)) {
            // Query untuk memasukkan data ke database
            $query = "INSERT INTO fasilitas (jenis_fasilitas, deskripsi, gambar) VALUES ('$jenisfasilitas', '$deskripsi', '$target_file')";
            if (mysqli_query($koneksi, $query)) {
                // Jika berhasil, arahkan kembali ke halaman tambah fasilitas
                header("Location: ../admin/admin-tambah-semua-fasilitias.php");
                exit();
            } else {
                echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>
