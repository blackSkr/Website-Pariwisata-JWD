<?php
include '../koneksi.php';
session_start();

// Periksa apakah sesi admin ada
if (!isset($_SESSION['id_admin'])) {
    header("Location: ../index.php");
    exit();
}

// Periksa apakah ID galeri ada di dalam request
if (isset($_GET['id'])) {
    $id_galery = intval($_GET['id']); // Pastikan ID adalah integer

    // Hapus data dari database
    $sql = "DELETE FROM galery WHERE id_galery = ?";
    $stmt = $koneksi->prepare($sql);
    if ($stmt === false) {
        error_log("Prepare failed: " . $koneksi->error);
        die("Error preparing statement.");
    }

    $stmt->bind_param("i", $id_galery);
    if ($stmt->execute()) {
        echo "<script>
                alert('Data berhasil dihapus');
                window.location.href = '../admin/daftar-semua-galery.php';
              </script>";
    } else {
        // Debugging: Output the error message
        error_log("Execute failed: " . $stmt->error);
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "ID galery tidak ditemukan.";
}
?>
