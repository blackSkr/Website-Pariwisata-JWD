<?php
// Memasukkan file koneksi database
include '../koneksi.php';

// Mengecek apakah ID dikirimkan
if (isset($_GET['id'])) {
    // Mengambil ID dari parameter URL
    $id = intval($_GET['id']);

    // Menyiapkan query SQL untuk menghapus data
    $query = "DELETE FROM paket_wisata_revisi WHERE id_paket_wisata = ?";
    
    // Menyiapkan statement
    if ($stmt = $koneksi->prepare($query)) {
        // Mengikat parameter
        $stmt->bind_param('i', $id);

        // Mengeksekusi statement
        if ($stmt->execute()) {
            // Jika berhasil, alihkan ke halaman yang diinginkan
            header("Location: ../admin/paket-wisata-data.php");
        } else {
            // Jika gagal, alihkan dengan status error
            header("Location: ../admin/paket-wisata-data.php");
        }

        // Menutup statement
        $stmt->close();
    } else {
        // Jika statement gagal disiapkan, alihkan dengan status error
        header("Location: ../admin/paket-wisata-data.php?status=error");
    }
} else {
    // Jika ID tidak dikirimkan, alihkan dengan status error
    header("Location: ../admin/paket-wisata-data.php?status=error");
}

// Menutup koneksi
$koneksi->close();
?>
