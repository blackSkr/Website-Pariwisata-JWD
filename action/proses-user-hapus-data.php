<?php
// Sertakan file koneksi
include "../koneksi.php";

// Cek koneksi ke database
if (!$koneksi) {
    die(json_encode(['status' => 'error', 'message' => 'Koneksi gagal: ' . mysqli_connect_error()]));
}

// Ambil ID dari parameter GET
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id > 0) {
    // Query untuk mengosongkan kolom-kolom tertentu dan mengatur status ke 'Pending'
    $sql = "UPDATE pelanggan SET 
                jenis_paket = NULL, 
                jumlah_pelanggan = NULL, 
                tgl_cekin = NULL, 
                tgl_cekout = NULL, 
                jumlah_hari = NULL, 
                total_harga = NULL, 
                tambahan = NULL, 
                status = 'Pending', 
                waktu_pemesanan = NULL 
            WHERE id_pelanggan = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param('i', $id);

    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'Data berhasil dihapus dan status diubah menjadi Pending.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Gagal menghapus data.']);
    }

    $stmt->close();
} else {
    echo json_encode(['status' => 'error', 'message' => 'ID tidak valid.']);
}

$koneksi->close();
?>
