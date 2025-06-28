<?php
include '../koneksi.php';
session_start();

if (isset($_POST['login'])) {
    $username = $_POST['usr'];
    $password = $_POST['pasw'];

    // Periksa kredensial login
    $query = "SELECT * FROM useradmin WHERE user = ?";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // Ambil data admin
        $data_admin = $result->fetch_assoc();
        // Verifikasi password
        if (password_verify($password, $data_admin['pasw'])) {
            $_SESSION['id_admin'] = $data_admin['id_admin'];
            $_SESSION['user'] = $data_admin['user'];

            header("Location: ../admin/dashboard.php"); // Arahkan ke dashboard admin
            exit();
        } else {
            echo "<script>
                alert('Username atau password salah.');
                window.location.href = '../admin/index.php';
            </script>";
        }
    } else {
        echo "<script>
            alert('Username atau password salah.');
            window.location.href = '../admin/index.php';
        </script>";
    }

    $stmt->close();
}

$koneksi->close();
?>
