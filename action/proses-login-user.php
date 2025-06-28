<?php
session_start(); // Pastikan ini di bagian atas sebelum output apapun

include "../koneksi.php"; // Pastikan path ini benar

if (isset($_POST['login'])) {
    // Mengambil data dari form
    $email = mysqli_real_escape_string($koneksi, $_POST["email"]);
    $pass = $_POST["pasw"];

    // Query SQL untuk mencocokkan email
    $sql = $koneksi->prepare("SELECT * FROM pelanggan WHERE email = ?");
    $sql->bind_param("s", $email);
    $sql->execute();
    $result = $sql->get_result();

    if ($result->num_rows === 1) {
        // Mengambil data pengguna
        $data_pelanggan = $result->fetch_assoc();

        // Verifikasi password
        if (password_verify($pass, $data_pelanggan['pasw'])) {
            // Menyimpan ID pelanggan dalam session
            $_SESSION['id_pelanggan'] = $data_pelanggan['id_pelanggan'];

            // Redirect ke halaman pengguna setelah login berhasil
            header("Location: ../user/pesanan-user.php"); // Ganti dengan halaman tujuan setelah login
            exit(); // Pastikan tidak ada kode lebih lanjut yang dieksekusi setelah redirect
        } else {
            // Jika password salah, menghancurkan session dan memberi tahu pengguna
            session_destroy();
            echo "<script>alert('Email atau Password salah'); window.location.href='../index.php?p=pemesanan';</script>";
            exit(); // Pastikan tidak ada kode lebih lanjut yang dieksekusi setelah alert
        }
    } else {
        // Jika email tidak ditemukan, menghancurkan session dan memberi tahu pengguna
        session_destroy();
        echo "<script>alert('Email atau Password salah'); window.location.href='../index.php?p=pemesanan';</script>";
        exit(); // Pastikan tidak ada kode lebih lanjut yang dieksekusi setelah alert
    }
} else {
    // Jika form tidak disubmit, menghancurkan session dan menampilkan halaman login
    session_destroy();
    include "index.php";
}
?>
