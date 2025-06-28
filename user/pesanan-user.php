<?php
// Mulai sesi
session_start();

// Sertakan file koneksi
include "../koneksi.php";

// Cek koneksi ke database
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Cek apakah pengguna sudah login
if (!isset($_SESSION['id_pelanggan'])) {
    // Jika belum login, alihkan ke halaman login
    header("Location: ../index.php");
    exit(); // Pastikan tidak ada kode lebih lanjut yang dieksekusi setelah pengalihan
}

// Ambil ID pelanggan dari sesi
$id_pelanggan = $_SESSION['id_pelanggan'];

// Query SQL untuk mengambil data pelanggan
$sql_pelanggan = "SELECT * FROM pelanggan WHERE id_pelanggan='$id_pelanggan'";
$result_pelanggan = mysqli_query($koneksi, $sql_pelanggan);

if (!$result_pelanggan) {
    die("Query gagal: " . mysqli_error($koneksi));
}

// Ambil data pelanggan
$data_pelanggan = mysqli_fetch_assoc($result_pelanggan);

// Query SQL untuk mengambil data pesanan
$sql_pesanan = "SELECT * FROM pelanggan WHERE id_pelanggan='$id_pelanggan'";
$result_pesanan = mysqli_query($koneksi, $sql_pesanan);

if (!$result_pesanan) {
    die("Query gagal: " . mysqli_error($koneksi));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Pesanan Saya</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../bootstrap5/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="../media/icon-web/Foto-Danau-Dua-Rasa-Danau-Labuan-Cermin-Biduk-Biduk-Kabupaten-Berau-Kalimantan-Timur-@brinkleydavies.jpg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="../mycss/fafont.css" rel="stylesheet">
    <script src="../bootstrap5/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<!-- Header -->
<div class="container-fluid p-0">
    <img class="header-img" src="../../pariwisata-revisi/media/main-image/Biduk-Biduk-e1650418220713.png" alt="Header Image" style="width: 100%; height: auto; object-fit: cover; max-height: 30vh" />
</div>

<!-- Menu Navbar -->
<nav class="navbar navbar-expand-sm navbar-dark" style="background-color: #3c5b6f; font-family: kaiesei tokumin, serif; color: #ffffff;">
    <div class="container-fluid">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link disabled" href="#" style="color: #ffffff">
                    Selamat Datang, <?php echo htmlspecialchars($data_pelanggan['nama_pelanggan'] ?? 'nama'); ?>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php" style="color: #ffffff">Form Pemesanan</a>
            </li>
            <li class="nav-item">
                <form action="../action/proses-logout-user.php" method="post" class="d-inline">
                    <button type="submit" name="logout" class="btn btn-danger">Logout</button>
                </form>
            </li>
        </ul>
    </div>
</nav>

<!-- Content -->
<div class="container mt-5">
    <h2 class="mb-4">Pesanan Saya</h2>

    <?php if (mysqli_num_rows($result_pesanan) > 0): ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Jenis Paket</th>
                    <th>Jumlah Peserta</th>
                    <th>Waktu Check-in</th>
                    <th>Waktu Check-out</th>
                    <th>Total Harga</th>
                    <th>Status</th>
                    <th>Rubah Pesanan?</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                while ($row = mysqli_fetch_assoc($result_pesanan)):
                ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <!-- <td><?php echo 'Rp ' . number_format($row['total_harga'] ?? 0, 0, ',', '.'); ?></td> -->
                        <td><?php echo htmlspecialchars($row['jenis_paket'] ?? 'Data Tidak Ada'); ?></td>
                        <td><?php echo htmlspecialchars($row['jumlah_pelanggan'] ?? 'Data Tidak Ada'); ?></td>
                        <td><?php echo htmlspecialchars($row['tgl_cekin'] ?? 'Data Tidak Ada'); ?></td>
                        <td><?php echo htmlspecialchars($row['tgl_cekout'] ?? 'Data Tidak Ada'); ?></td>
                        <td><?php echo 'Rp ' . number_format($row['total_harga'] ?? 0, 0, ',', '.'); ?></td>
                        <td><?php echo htmlspecialchars($row['status'] ?? 'Data Tidak Ada'); ?></td>
                        <td>
                            <a href="user-edit-pesanan.php?id=<?php echo $row['id_pelanggan']; ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="#" data-id="<?php echo $row['id_pelanggan']; ?>" class="btn btn-danger btn-sm btn-hapus">Hapus</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Anda belum melakukan pemesanan.</p>
    <?php endif; ?>
</div>

<!-- Footer -->
<nav class="navbar sticky-bottom navbar-light" style="background-color: #3c5b6f; font-family: kaiesei tokumin, serif;">
    <div class="container-fluid">
        <a class="navbar-brand text-center mx-auto" href="#" style="font-size: 12px; color: #ffffff;">&copy; 2024 Pams</a>
    </div>
</nav>

<!-- JavaScript untuk SweetAlert -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.btn-hapus').forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault();
            const id = this.getAttribute('data-id');
            const updateUrl = '../action/proses-user-hapus-data.php';

            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data ini akan dihapus dan dikosongkan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(`${updateUrl}?id=${id}`)
                        .then(response => response.json())
                        .then(data => {
                            if (data.status === 'success') {
                                Swal.fire('Terhapus!', data.message, 'success').then(() => {
                                    // Reload the page or redirect to update the list
                                    window.location.reload();
                                });
                            } else {
                                Swal.fire('Gagal!', data.message, 'error');
                            }
                        })
                        .catch(error => {
                            Swal.fire('Error!', 'Terjadi kesalahan saat menghapus data.', 'error');
                        });
                }
            });
        });
    });
});
</script>

</body>
</html>
