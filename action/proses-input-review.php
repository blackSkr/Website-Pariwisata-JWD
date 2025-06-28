<?php
include '../koneksi.php'; // Menghubungkan ke database

// Mengecek apakah form sudah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari form dan melakukan sanitasi
    $nama = htmlspecialchars(trim($_POST['namareview']));
    $email = htmlspecialchars(trim($_POST['emailreview']));
    $komentar = htmlspecialchars(trim($_POST['komentar']));
    $status = htmlspecialchars(trim($_POST['status'])); // Mengambil status dari form

    // Validasi data
    if (!empty($nama) && !empty($email) && !empty($komentar) && !empty($status)) {
        // Menyiapkan query SQL untuk menyimpan data
        $sql = "INSERT INTO review (email, nama, komentar, status) VALUES (?, ?, ?, ?)";
        $stmt = $koneksi->prepare($sql);
        if ($stmt === false) {
            die("Error preparing the SQL statement: " . $koneksi->error);
        }

        // Mengikat parameter dan menjalankan query
        $stmt->bind_param("ssss", $email, $nama, $komentar, $status);
        $success = $stmt->execute();
        
        // Menutup statement
        $stmt->close();

        // Mengarahkan ke halaman status dengan parameter status
        if ($success) {
            header("Location: ../action/halaman-status.php?status=success");
        } else {
            header("Location: ../action/halaman-status.php?status=error&message=" . urlencode($stmt->error));
        }
    } else {
        header("Location: ../action/halaman-status.php?status=error&message=Semua%20field%20harus%20diisi!");
    }

    // Menutup koneksi database
    $koneksi->close();
} else {
    echo "Invalid request method.";
}
?>
