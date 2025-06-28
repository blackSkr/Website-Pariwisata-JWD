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

// Ambil data pelanggan dari database
$id_pelanggan = $_SESSION['id_pelanggan'];
$sql = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE id_pelanggan='$id_pelanggan'");

$data_pelanggan = mysqli_fetch_array($sql);

// Ambil data paket wisata dari database
$paket_sql = mysqli_query($koneksi, "SELECT * FROM paket_wisata_revisi");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Website Pariwisata</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../bootstrap5/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="../media/icon-web/Foto-Danau-Dua-Rasa-Danau-Labuan-Cermin-Biduk-Biduk-Kabupaten-Berau-Kalimantan-Timur-@brinkleydavies.jpg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="../mycss/fafont.css" rel="stylesheet">
    <script src="../bootstrap5/js/bootstrap.bundle.min.js"></script>

    <style>
        .fakeimg {
            height: 200px;
            background: #aaa;
        }
    </style>
</head>
<body>

<!-- Header dengan gambar -->
<div class="container-fluid p-0">
    <img class="header-img" src="../../pariwisata-revisi/media/main-image/Biduk-Biduk-e1650418220713.png" alt="Header Image" style="width: 100%; height: auto; object-fit: cover; max-height: 30vh" />
</div>

<!-- Menu navbar -->
<nav class="navbar navbar-expand-sm navbar-dark" style="background-color: #3c5b6f; font-family: kaiesei tokumin, serif; color: #ffffff;">
    <div class="container-fluid">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link disabled" href="index.php?p=pemesanan" style="color: #ffffff">
                    Selamat Datang, <?php echo htmlspecialchars($data_pelanggan['nama_pelanggan'] ?? ''); ?>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="index.php?p=pemesanan" style="color: #ffffff">Form Booking</a>
            </li>

            <li class="nav-item">
                <a class="nav-link " href="pesanan-user.php" style="color: #ffffff">Data Booking</a>
            </li>
            <li class="nav-item">
                <!-- Logout button -->
                <form action="../action/proses-logout-user.php" method="post" class="d-inline">
                    <button type="submit" name="logout" class="btn btn-danger">Logout</button>
                </form>
            </li>
        </ul>
    </div>
</nav>

<div class="container mt-5">
    <h2 class="mb-4">Form Pemesanan Paket Wisata</h2>
    <form id="bookingForm" method="POST" action="../action/proses-pemesanan-user.php">
        <div class="mb-3">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($data_pelanggan['id_pelanggan'] ?? ''); ?>">

            <label for="namaPemesan" class="form-label">Nama Pemesan</label>
            <input type="text" class="form-control" id="namaPemesan" name="namaPemesan" readonly value="<?php echo htmlspecialchars($data_pelanggan['nama_pelanggan'] ?? ''); ?>" >
        </div>
        <div class="mb-3">
            <label for="nomorHp" class="form-label">Nomor HP</label>
            <input type="text" class="form-control" id="nomorHp" name="nomorHp" readonly value="<?php echo htmlspecialchars($data_pelanggan['no_hp'] ?? ''); ?>">
        </div>
        <div class="mb-3">
            <label for="checkIn" class="form-label">Waktu Check-in</label>
            <input type="date" class="form-control" id="checkIn" name="checkIn" required value="<?php echo htmlspecialchars($data_pelanggan['tgl_cekin'] ?? ''); ?>">
        </div>
        <div class="mb-3">
            <label for="checkOut" class="form-label">Waktu Check-out</label>
            <input type="date" class="form-control" id="checkOut" name="checkOut" required value="<?php echo htmlspecialchars($data_pelanggan['tgl_cekout'] ?? ''); ?>"> 
        </div>
        <div class="mb-3">
            <label for="jumlahHari">Jumlah Hari: </label>
            <input type="text" id="jumlahHari" name="jumlahHari" readonly value="0">
        </div>

        <div class="mb-3">
            <label for="jumlahPeserta" class="form-label">Jumlah Peserta</label>
            <input type="text" class="form-control" id="jumlahPeserta" name="jumlahPeserta" required value="<?php echo htmlspecialchars($data_pelanggan['jumlah_pelanggan'] ?? ''); ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Paket Wisata</label>
            <?php while ($row = mysqli_fetch_array($paket_sql)) { 
            // Menghapus karakter non-numerik selain titik desimal
            $harga_paket_str = $row['harga_paket'];
            $harga_paket = (float)str_replace(['.', ','], ['', '.'], $harga_paket_str);
        ?>
            <div class="form-check">
                <input class="form-check-input" type="radio" id="paket<?php echo $row['id_paket_wisata']; ?>" name="paket" value="<?php echo $row['kode_paket']; ?>" data-harga="<?php echo $harga_paket; ?>" required>
                <label class="form-check-label" for="paket<?php echo $row['id_paket_wisata']; ?>">
                    <?php echo htmlspecialchars($row['nama_paket']); ?> - <?php echo htmlspecialchars($row['deskripsi']); ?> (Rp. <?php echo number_format($harga_paket, 0, ',', '.'); ?>)
                </label>
            </div>
        <?php } ?>
        </div>

        <div class="mb-3">
            <label class="form-label">Tambahan Pilihan</label>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="makanan" name="tambahan[]" value="500000">
                <label class="form-check-label" for="makanan">Makanan/Servis Rp.500.000 per orang</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="transportasi" name="tambahan[]" value="200000">
                <label class="form-check-label" for="transportasi">Transportasi Rp.200.000 per orang</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="penginapan" name="tambahan[]" value="350000">
                <label class="form-check-label" for="penginapan">Penginapan Rp.350.000 per orang</label>
            </div>
        </div>

        <div class="mb-3">
            <label for="totalHarga" class="form-label">Jumlah Tagihan</label>
            <input type="text" class="form-control" id="totalHarga" name="totalHarga" readonly value="Rp 0">
        </div>
        <button type="submit" class="btn btn-primary">Pesan</button>
    </form>
</div>
<br>

<script>
function updateTotal() {
    // Menghitung jumlah hari
    var checkIn = new Date(document.getElementById('checkIn').value);
    var checkOut = new Date(document.getElementById('checkOut').value);
    var jumlahHari = (checkOut - checkIn) / (1000 * 60 * 60 * 24) + 1; // Menambahkan 1 hari
    document.getElementById('jumlahHari').value = isNaN(jumlahHari) ? '' : jumlahHari;

    // Menghitung total harga
    var totalHarga = 0;
    var hargaPaket = 0;
    var jumlahPeserta = parseInt(document.getElementById('jumlahPeserta').value) || 0;

    document.querySelectorAll('input[name="paket"]:checked').forEach((input) => {
        var harga = parseFloat(input.getAttribute('data-harga')) || 0;
        hargaPaket = harga;
    });

    if (isNaN(hargaPaket)) {
        hargaPaket = 0;
    }
    totalHarga += hargaPaket * jumlahPeserta * jumlahHari; // Mengalikan dengan jumlah hari

    document.querySelectorAll('input[name="tambahan[]"]:checked').forEach((checkbox) => {
        var hargaTambahan = parseFloat(checkbox.value) || 0;
        totalHarga += hargaTambahan * jumlahPeserta * jumlahHari; // Mengalikan dengan jumlah hari
    });

    document.getElementById('totalHarga').value = 'Rp ' + totalHarga.toLocaleString('id-ID');
}


// Update total harga saat form diubah
document.querySelectorAll('input[type="radio"], input[type="checkbox"]').forEach((input) => {
    input.addEventListener('change', updateTotal);
});

document.getElementById('jumlahPeserta').addEventListener('input', updateTotal);
document.getElementById('checkIn').addEventListener('change', updateTotal);
document.getElementById('checkOut').addEventListener('change', updateTotal);

// Auto-check checkboxes for ULT package
document.querySelectorAll('input[name="paket"]').forEach((radio) => {
    radio.addEventListener('change', function() {
        var selectedPaket = this.value;
        var checkboxes = document.querySelectorAll('input[name="tambahan[]"]');

        if (selectedPaket === 'ULT') {
            checkboxes.forEach((checkbox) => {
                checkbox.checked = checkbox.id !== 'penginapan';
            });
        } else {
            checkboxes.forEach((checkbox) => {
                checkbox.checked = false;
            });
        }
        updateTotal();
    });
});

// Script SweetAlert
document.getElementById('bookingForm').addEventListener('submit', function(event) {
    event.preventDefault();

    const namaPemesan = document.getElementById('namaPemesan').value;
    const nomorHp = document.getElementById('nomorHp').value;
    const checkIn = document.getElementById('checkIn').value;
    const checkOut = document.getElementById('checkOut').value;
    const jumlahPeserta = document.getElementById('jumlahPeserta').value;
    const jumlahHari = document.getElementById('jumlahHari').value;
    const paket = document.querySelector('input[name="paket"]:checked').nextElementSibling.textContent;
    const totalHarga = document.getElementById('totalHarga').value;
    const tambahan = Array.from(document.querySelectorAll('input[name="tambahan[]"]:checked')).map(checkbox => checkbox.nextElementSibling.textContent).join(', ');

    Swal.fire({
        title: 'Konfirmasi Pemesanan',
        html: 
            `<p><strong>Nama Pemesan:</strong> ${namaPemesan}</p>
            <p><strong>Nomor HP:</strong> ${nomorHp}</p>
            <p><strong>Waktu Check-in:</strong> ${checkIn}</p>
            <p><strong>Waktu Check-out:</strong> ${checkOut}</p>
            <p><strong>Jumlah Peserta:</strong> ${jumlahPeserta}</p>
            <p><strong>Jumlah Hari:</strong> ${jumlahHari}</p>
            <p><strong>Paket Wisata:</strong> ${paket}</p>
            <p><strong>Tambahan:</strong> ${tambahan}</p>
            <p><strong>Jumlah Tagihan:</strong> ${totalHarga}</p>`,
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Pesan',
        cancelButtonText: 'Batal',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('bookingForm').submit();
        }
    });
});
</script>


</script>
</body>
</html>

