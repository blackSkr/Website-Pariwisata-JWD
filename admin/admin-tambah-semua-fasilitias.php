<?php
include '../koneksi.php';
session_start();

// Periksa apakah sesi admin ada
if (!isset($_SESSION['id_admin'])) {
    header("Location: ../index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $jenisfasilitas = $_POST['jenisfasilitas'];
    $deskripsi = $_POST['deskripsi'];


    // Proses upload gambar
    $target_dir = "../admin-img-uploads/";
    $target_file = $target_dir . basename($_FILES["pict"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Periksa apakah file gambar adalah gambar sebenarnya atau bukan
    $check = getimagesize($_FILES["pict"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Batasi ukuran file (misal 2MB)
    if ($_FILES["pict"]["size"] > 2000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Batasi format file
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <!-- Favicon -->
  <link rel="shortcut icon" href="./img/svg/logo.svg" type="image/x-icon">
  <!-- Custom styles -->
  <link rel="stylesheet" href="./css/style.min.css">
  <link rel="stylesheet" href="./css/style.min.css">
  <!-- SweetAlert2 CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>
</head>

<body>
  <div class="layer"></div>
<!-- ! Body -->
<a class="skip-link sr-only" href="#skip-target">Skip to content</a>
<div class="page-flex">
  <!-- ! Sidebar -->
  <aside class="sidebar">
    <div class="sidebar-start">
        <div class="sidebar-head">
            <a href="#" class="logo-wrapper" title="Home">
                <!-- <span class="sr-only">Home</span> -->
                <!-- <span class="icon logo" aria-hidden="true"></span> -->
                <div class="logo-text">
                    <span class="logo-title">Cermins</span>
                    <span class="logo-subtitle">Dashboard</span>
                </div>
            </a>
            <button class="sidebar-toggle transparent-btn" title="Menu" type="button">
                <span class="sr-only">Toggle menu</span>
                <span class="icon menu-toggle" aria-hidden="true"></span>
            </button>
        </div>
        <div class="sidebar-body">
        <ul class="sidebar-body-menu">
                <li>
                    <a class="active" href="dashboard.php"><span class="icon home" aria-hidden="true"></span>Dashboard</a>
                </li>
                <li>
                    <a class="show-cat-btn" href="##">
                        <span class="icon document" aria-hidden="true"></span>Data
                         Tamu
                        <span class="category__btn transparent-btn" title="Open list">
                            <span class="sr-only">Open list</span>
                            <span class="icon arrow-down" aria-hidden="true"></span>
                        </span>
                    </a>
                    <ul class="cat-sub-menu">
                    <li>
                            <a href="daftar-semua-pengunjung-belum-bayar.php">Belum Melakukan Pembayaran</a>
                        </li>
                        <li>
                            <a href="daftar-semua-pengunjung.php">Semua Data Pelanggan</a>
                        </li>
                        <li>
                            <a href="daftar-semua-pengunjung-checkin.php">Data Pelanggan Check In</a>
                        </li>
                        <li>
                            <a href="daftar-semua-pengunjung-pending.php">Menunggu Check In</a>
                        </li>
                        <li>
                            <a href="daftar-semua-pengunjung-history.php">history Pelanggan</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="show-cat-btn" href="##">
                        <span class="icon folder" aria-hidden="true"></span>Paket Wisata
                        <span class="category__btn transparent-btn" title="Open list">
                            <span class="sr-only">Open list</span>
                            <span class="icon arrow-down" aria-hidden="true"></span>
                        </span>
                    </a>
                    <ul class="cat-sub-menu">
                        <li>
                            <a href="paket-wisata-data.php">Paket Wisata</a>
                        </li>
                        <li>
                            <a href="paket-wisata-tambah-data.php">Tambah Paket Wisata</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="show-cat-btn" href="##">
                        <span class="icon folder" aria-hidden="true"></span>fasilitas
                        <span class="category__btn transparent-btn" title="Open list">
                            <span class="sr-only">Open list</span>
                            <span class="icon arrow-down" aria-hidden="true"></span>
                        </span>
                    </a>
                    <ul class="cat-sub-menu">
                        <li>
                            <a href="daftar-semua-fasilitias.php">Data Fasilitias</a>
                        </li>
                        <li>
                            <a href="admin-tambah-semua-fasilitias.php">Tambah Data Fasilitias</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="show-cat-btn" href="##">
                        <span class="icon folder" aria-hidden="true"></span>Galery
                        <span class="category__btn transparent-btn" title="Open list">
                            <span class="sr-only">Open list</span>
                            <span class="icon arrow-down" aria-hidden="true"></span>
                        </span>
                    </a>
                    <ul class="cat-sub-menu">
                        <li>
                            <a href="daftar-semua-galery.php">Galery</a>
                        </li>
                        <li>
                            <a href="tambah-daftar-semua-galery.php">Tambah Galery</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="admin-semua-review.php">
                        <span class="icon folder" aria-hidden="true"></span>Review
                    </a>
                </li>
                
                <!-- <li>
                    <a class="show-cat-btn" href="##">
                        <span class="icon folder" aria-hidden="true"></span>Feedback 
                        <span class="category__btn transparent-btn" title="Open list">
                            <span class="sr-only">Open list</span>
                            <span class="icon arrow-down" aria-hidden="true"></span>
                        </span>
                    </a>
                    <ul class="cat-sub-menu">
                        <li>
                            <a href="#">Cek Disini</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="show-cat-btn" href="##">
                        <span class="icon image" aria-hidden="true"></span>Media
                        <span class="category__btn transparent-btn" title="Open list">
                            <span class="sr-only">Open list</span>
                            <span class="icon arrow-down" aria-hidden="true"></span>
                        </span>
                    </a>
                    <ul class="cat-sub-menu">
                        <li>
                            <a href="media-01.html">Media-01</a>
                        </li>
                        <li>
                            <a href="media-02.html">Media-02</a>
                        </li>
                    </ul>
                </li>  -->
            </ul>
        </div>
    </div>
</aside>
<div class="main-wrapper">
        <main class="main users chart-page" id="skip-target">
            <div class="container">
                <h2 class="main-title">Tambah Data Fasilitas</h2>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="users-table table-wrapper">
                            <form id="add-package-form" action="../action/proses-admin-tambah-data-fasilitas.php" method="POST" enctype="multipart/form-data">
                                <label class="form-label-wrapper">
                                    <p class="form-label">Jenis Fasilitas</p>
                                    <input class="form-input" type="text" placeholder="Jenis Fasilitas" name="jenisfasilitas" required>
                                </label>
                                <label class="form-label-wrapper">
                                    <p class="form-label">Deskripsi</p>
                                    <input class="form-input" type="text" placeholder="Deskripsi" name="deskripsi" required>
                                </label>
                                <label class="form-label-wrapper">
                                    <p class="form-label">Pict Fasilitas</p>
                                    <input class="form-input" type="file" name="pict" required>
                                </label>
                                <button type="submit" class="form-btn primary-default-btn transparent-btn" id="submit-btn">Tambah</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
<!-- footer -->
    <!-- <footer class="footer">
  <div class="container footer--flex">
    <div class="footer-start">
      <p>2024 © Pams</p>
    </div>
  </div>
</footer>  -->
<!-- scrip sweetalert btn tambah -->
   <!-- SweetAlert2 JS -->
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <!-- Custom script -->
    <script>
        document.getElementById('add-package-form').addEventListener('submit', function(e) {
            e.preventDefault(); // Mencegah pengiriman form secara langsung

            Swal.fire({
                title: 'Konfirmasi',
                text: 'Apakah Anda yakin ingin menambahkan data ini?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Tambah',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Jika pengguna mengklik 'Tambah', kirimkan form
                    this.submit();
                }
            });
        });
    </script>
<!-- script cari data -->
<!-- Chart library -->
<script src="./plugins/chart.min.js"></script>
<!-- Icons library -->
<script src="plugins/feather.min.js"></script>
<!-- Custom scripts -->
<script src="js/script.js"></script>
<!-- sweetalert -->
<script>
    const addFacilityForm = document.getElementById('add-facility-form');
    addFacilityForm.addEventListener('submit', function (event) {
        event.preventDefault();
        const formData = new FormData(addFacilityForm);
        fetch(addFacilityForm.action, {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            document.body.innerHTML = data;
        });
    });
  </script>
<!-- sweetalert -->
<!-- script logout -->
 <script>
function konfirmasiLogout(data) {        
        var konfirmasi = confirm("Apakah Anda yakin ingin Log out ?");
        if (konfirmasi) {
            window.location.href = "/logout.php?id=" + data;
        } else {
            // Jika pengguna menekan Batal, tidak melakukan apa-apa
        }
    }
 <script>

</body>

</html>