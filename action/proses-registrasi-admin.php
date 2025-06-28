<?php
include '../koneksi.php';

// Ambil data dari form
$username = isset($_POST['username']) ? $_POST['username'] : null;
$nama_lengkap = isset($_POST['nama_lengkap']) ? $_POST['nama_lengkap'] : null;
$password = isset($_POST['password']) ? $_POST['password'] : null;

// Validasi input
if ($username === null || $nama_lengkap === null || $password === null) {
    echo "<script>
        alert('Data tidak lengkap. Silakan lengkapi semua field!');
        window.location.href = '../admin/registrasi-admin.php';
    </script>";
    exit();
}

// Enkripsi password
$password_hashed = password_hash($password, PASSWORD_BCRYPT);

// Persiapkan query untuk menyimpan data
$query = "INSERT INTO useradmin (user, pasw, nama_lengkap) VALUES (?, ?, ?)";
$stmt = $koneksi->prepare($query);
$stmt->bind_param('sss', $username, $password_hashed, $nama_lengkap);

if ($stmt->execute()) {
    echo "<script>
        alert('Registrasi Berhasil! Admin baru telah terdaftar.');
        window.location.href = '../admin/index.php';
    </script>";
} else {
    echo "<script>
        alert('Gagal menyimpan data: " . $stmt->error . "');
        window.location.href = '../admin/index.php';
    </script>";
}

$stmt->close();
$koneksi->close();
?>
