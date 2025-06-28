<?php
// Mulai sesi
session_start();

// Sertakan file koneksi
include "../koneksi.php";

// Cek koneksi ke database
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Mendapatkan data dari form
$id = (int)htmlspecialchars($_POST['id']); // ID dari record yang ingin diperbarui
$checkIn = htmlspecialchars($_POST['checkIn']);
$checkOut = htmlspecialchars($_POST['checkOut']);
$jumlahPeserta = (int)htmlspecialchars($_POST['jumlahPeserta']);
$jenisPaket = htmlspecialchars($_POST['paket']); // Nama paket sebagai string
$totalHarga = (int)str_replace('Rp ', '', str_replace('.', '', $_POST['totalHarga'])); // Harga sebagai integer

// Mengambil data tambahan dari form dan mengonversi harga menjadi deskripsi
$tambahan = isset($_POST['tambahan']) ? implode(', ', array_map(function($value) {
    switch ($value) {
        case '500000':
            return 'Makanan/Servis Rp.500.000 per orang';
        case '200000':
            return 'Transportasi Rp.200.000 per orang';
        case '350000':
            return 'Penginapan Rp.350.000 per orang';
        default:
            return '';
    }
}, $_POST['tambahan'])) : ''; // Menggabungkan tambahan menjadi string

// Validasi format tanggal
if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $checkIn) || !preg_match('/^\d{4}-\d{2}-\d{2}$/', $checkOut)) {
    die("Tanggal tidak valid. Format yang benar adalah YYYY-MM-DD.");
}

// Cek jika tanggal check-out sebelum tanggal check-in
if (strtotime($checkOut) < strtotime($checkIn)) {
    die("Tanggal check-out tidak boleh sebelum tanggal check-in.");
}

// Debugging: Tampilkan nilai tanggal
echo "Tanggal Check-in: $checkIn<br>";
echo "Tanggal Check-out: $checkOut<br>";

// Menghitung jumlah hari
$checkInDate = new DateTime($checkIn);
$checkOutDate = new DateTime($checkOut);
$interval = $checkInDate->diff($checkOutDate);
$jumlahHari = $interval->days + 1; // +1 untuk menyertakan hari check-in

// Status otomatis menjadi Pending
$status = "Menunggu Pembayaran";

// Menyiapkan statement SQL untuk memperbarui data
$sql = "UPDATE pelanggan 
        SET jenis_paket = ?, jumlah_pelanggan = ?, tgl_cekin = ?, tgl_cekout = ?, jumlah_hari = ?, total_harga = ?, tambahan = ?, status = ?
        WHERE id_pelanggan = ?";

// Menggunakan prepared statement untuk keamanan
$stmt = $koneksi->prepare($sql);
if (!$stmt) {
    die("Error preparing statement: " . $koneksi->error);
}

// Pastikan urutan dan tipe data sesuai
$stmt->bind_param("sississsi", $jenisPaket, $jumlahPeserta, $checkIn, $checkOut, $jumlahHari, $totalHarga, $tambahan, $status, $id);

// Mengeksekusi statement dan memeriksa apakah berhasil
if ($stmt->execute()) {
    if ($stmt->affected_rows > 0) {
        // Redirect jika berhasil
        header("Location: ../user/index.php");
        exit(); // Pastikan untuk menghentikan eksekusi skrip setelah redirect
    } else {
        echo "Tidak ada data yang diupdate. Pastikan ID benar atau data yang sama.";
    }
} else {
    echo "Terjadi kesalahan: " . $stmt->error;
}

// Menutup statement dan koneksi
$stmt->close();
$koneksi->close();
?>
