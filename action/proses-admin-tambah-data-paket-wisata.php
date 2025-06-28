<?php
include '../koneksi.php';
session_start();

// Periksa apakah sesi admin ada
if (!isset($_SESSION['id_admin'])) {
    header("Location: ../index.php");
    exit();
}

if (isset($_POST['kodepaket']) && isset($_POST['namapaket']) && isset($_POST['deskripsipaket']) && isset($_FILES['pict']) && isset($_POST['hargapaket'])) {
    $kodepaket = $_POST['kodepaket'];
    $namapaket = $_POST['namapaket'];
    $deskripsipaket = $_POST['deskripsipaket'];
    $hargapaket = $_POST['hargapaket'];

    // Proses upload gambar
    $target_dir = "../uploads/"; // Tentukan direktori penyimpanan
    $target_file = $target_dir . basename($_FILES["pict"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Periksa apakah file gambar adalah gambar sebenarnya atau bukan
    $check = getimagesize($_FILES["pict"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Periksa apakah file sudah ada
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Batasi ukuran file
    if ($_FILES["pict"]["size"] > 500000) { // Misal 500KB
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Batasi format file
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Cek jika $uploadOk adalah 0 karena ada kesalahan
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // Jika semuanya baik, coba upload file
    } else {
        if (move_uploaded_file($_FILES["pict"]["tmp_name"], $target_file)) {
            // Simpan data ke database
            $sql = "INSERT INTO paket_wisata_revisi (kode_paket, nama_paket, deskripsi, pict, harga_paket) VALUES (?, ?, ?, ?, ?)";
            $stmt = $koneksi->prepare($sql);
            $stmt->bind_param("ssssd", $kodepaket, $namapaket, $deskripsipaket, $target_file, $hargapaket);
            if ($stmt->execute()) {
                echo "<script>
                        Swal.fire({
                            title: 'Berhasil',
                            text: 'Data berhasil ditambahkan',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = 'paket-wisata-data.php';
                            }
                        });
                      </script>";
            } else {
                echo "Error: " . $sql . "<br>" . $koneksi->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
} else {
    echo "Semua data harus diisi!";
}
?>
