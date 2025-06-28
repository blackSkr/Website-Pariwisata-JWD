<?php
// Include file koneksi database
include '../koneksi.php'; // Ganti dengan path yang sesuai

// Cek apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $nama = htmlspecialchars(trim($_POST['nama']));
    $email = htmlspecialchars(trim($_POST['email']));
    $password = htmlspecialchars(trim($_POST['pasw']));
    $no_hp = htmlspecialchars(trim($_POST['no_hp']));
    $alamat_pelanggan = htmlspecialchars(trim($_POST['alamat_pelanggan']));

    // Validasi data
    if (empty($nama) || empty($email) || empty($password) || empty($no_hp) || empty($alamat_pelanggan)) {
        die('Semua field harus diisi!');
    }

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // SQL query untuk menyimpan data ke dalam tabel
    $sql = "INSERT INTO pelanggan (nama_pelanggan, email, pasw, no_hp, alamat_pelanggan) VALUES ( ?, ?, ?, ?, ?)";
    
    if ($stmt = $koneksi->prepare($sql)) {
        // Bind variabel ke parameter
        $stmt->bind_param("sssss", $nama, $email, $hashed_password, $no_hp, $alamat_pelanggan);

        // Eksekusi statement
        if ($stmt->execute()) {
            // Mengarahkan pengguna ke halaman sebelumnya dengan alert
            echo "<script>
                    alert('Registrasi berhasil!');
                    window.location.href = '../index.php';
                </script>";
        } else {
            echo "Terjadi kesalahan: " . $stmt->error;
        }

        // Tutup statement
        $stmt->close();
    } else {
        echo "Terjadi kesalahan dalam persiapan statement: " . $koneksi->error;
    }

    // Tutup koneksi
    $koneksi->close();
} else {
    echo "Metode permintaan tidak valid.";
}
?>
