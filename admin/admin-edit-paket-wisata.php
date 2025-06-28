<?php
include '../koneksi.php';
session_start();

// Periksa apakah sesi admin ada
if (!isset($_SESSION['id_admin'])) {
    header("Location: ../index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $kodepaket = $_POST['kodepaket'];
    $namapaket = $_POST['namapaket'];
    $deskripsipaket = $_POST['deskripsipaket'];
    $hargapaket = $_POST['hargapaket'];
    $id_paket_wisata = $_POST['id_paket_wisata'];
    $target_file = $_POST['old_pict']; // Default gambar lama

    // Proses upload gambar jika ada file gambar yang diunggah
    if (isset($_FILES["pict"]) && $_FILES["pict"]["error"] == UPLOAD_ERR_OK) {
        $target_dir = "../admin-img-uploads/";
        $target_file = $target_dir . basename($_FILES["pict"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Periksa apakah file gambar adalah gambar sebenarnya atau bukan
        $check = getimagesize($_FILES["pict"]["tmp_name"]);
        if ($check === false) {
            $uploadOk = 0;
        }

        // Batasi ukuran file (misal 2MB)
        if ($_FILES["pict"]["size"] > 2000000) {
            $uploadOk = 0;
        }

        // Batasi format file
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            $uploadOk = 0;
        }

        // Cek jika $uploadOk adalah 0 karena ada kesalahan
        if ($uploadOk === 0) {
            $target_file = $_POST['old_pict'];
        } else {
            if (move_uploaded_file($_FILES["pict"]["tmp_name"], $target_file)) {
                // Upload berhasil
            } else {
                $target_file = $_POST['old_pict'];
            }
        }
    }

    // Simpan data ke database
    $sql = "UPDATE paket_wisata_revisi SET kode_paket = ?, nama_paket = ?, deskripsi = ?, pict = ?, harga_paket = ? WHERE id_paket_wisata = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("ssssdi", $kodepaket, $namapaket, $deskripsipaket, $target_file, $hargapaket, $id_paket_wisata);
    if ($stmt->execute()) {
        echo "<script>
                Swal.fire({
                    title: 'Berhasil',
                    text: 'Data berhasil diubah',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'paket-wisata-data.php';
                    }
                });
              </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
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
  <!-- SweetAlert2 CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>
<body>
  <!-- ... Your HTML Content ... -->
  <!-- SweetAlert2 JS -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
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
          </ul>
        </div>
      </div>
    </aside>
    <div class="main-wrapper">
      <!-- ! Main nav -->
      <nav class="main-nav--bg">
        <div class="container main-nav">
          <div class="main-nav-start">
            <div class="search-wrapper">
              <i data-feather="search" aria-hidden="true"></i>
              <input type="text" placeholder="Enter keywords ..." required id="search-input">
            </div>
          </div>
          <div class="main-nav-end">
            <button class="sidebar-toggle transparent-btn" title="Menu" type="button">
              <span class="sr-only">Toggle menu</span>
              <span class="icon menu-toggle--gray" aria-hidden="true"></span>
            </button>
            <button class="theme-switcher gray-circle-btn" type="button" title="Switch theme">
              <span class="sr-only">Switch theme</span>
              <i class="sun-icon" data-feather="sun" aria-hidden="true"></i>
              <i class="moon-icon" data-feather="moon" aria-hidden="true"></i>
            </button>
            <div class="nav-user-wrapper">
              <button href="##" class="nav-user-btn dropdown-btn" title="My profile" type="button">
                <span class="sr-only">My profile</span>
                <span class="nav-user-img">
                  <picture>
                    <source srcset="./img/avatar/avatar-illustrated-02.webp" type="image/webp">
                    <img src="./img/avatar/avatar-illustrated-02.png" alt="User name">
                  </picture>
                </span>
              </button>
              <ul class="users-item-dropdown nav-user-dropdown dropdown">
                <li><a href="##"><i data-feather="user" aria-hidden="true"></i><span>Profile</span></a></li>
                <li><a href="##"><i data-feather="settings" aria-hidden="true"></i><span>Account settings</span></a></li>
                <li><a href="logout.php" class="btn btn-danger">Logout</a></li>
              </ul>
            </div>
          </div>
        </div>
      </nav>
      <!-- ! Main -->
      <main class="main users chart-page" id="skip-target">
        <div class="container">
          <h2 class="main-title">Edit Data Paket</h2>
          <div class="row">
            <div class="col-lg-12">
              <div class="users-table table-wrapper">
                <table class="posts-table">
                  <main class="page-center">
                    <?php
                    include '../koneksi.php';

                    if (isset($_GET['id'])) {
                        $id_paket = $_GET['id'];
                        $sql = "SELECT * FROM paket_wisata_revisi WHERE id_paket_wisata = ?";
                        $stmt = $koneksi->prepare($sql);
                        $stmt->bind_param('i', $id_paket);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        $data = $result->fetch_assoc();
                        $stmt->close();

                        $kode_paket = $data['kode_paket'];
                        $nama_paket = $data['nama_paket'];
                        $deskripsi = $data['deskripsi'];
                        $pict = $data['pict'];
                        $harga_paket = $data['harga_paket'];
                    }
                    ?>
                    <form id="edit-package-form" action="" method="POST" enctype="multipart/form-data">
                      <input type="hidden" name="id_paket_wisata" value="<?php echo htmlspecialchars($id_paket); ?>">
                      <label class="form-label-wrapper">
                        <p class="form-label">Kode Paket</p>
                        <input class="form-input" type="text" name="kodepaket" value="<?php echo htmlspecialchars($kode_paket); ?>" required>
                      </label>
                      <label class="form-label-wrapper">
                        <p class="form-label">Nama Paket</p>
                        <input class="form-input" type="text" name="namapaket" value="<?php echo htmlspecialchars($nama_paket); ?>" required>
                      </label>
                      <label class="form-label-wrapper">
                        <p class="form-label">Deskripsi Paket</p>
                        <input class="form-input" type="text" name="deskripsipaket" value="<?php echo htmlspecialchars($deskripsi); ?>" required>
                      </label>
                      <label class="form-label-wrapper">
                        <p class="form-label">Pict Paket</p>
                        <input class="form-input" type="file" name="pict" accept="image/*">
                        <input type="hidden" name="old_pict" value="<?php echo htmlspecialchars($pict); ?>">
                        <?php if ($pict): ?>
                          <img src="../admin-img-uploads/<?php echo htmlspecialchars($pict); ?>" alt="Pict Paket" width="100">
                        <?php endif; ?>
                      </label>
                      <label class="form-label-wrapper">
                        <p class="form-label">Harga Paket</p>
                        <input class="form-input" type="text" name="hargapaket" value="<?php echo htmlspecialchars($harga_paket); ?>" required>
                      </label>
                      <input class="form-btn primary-default-btn transparent-btn" type="submit" name="submit" value="Edit Data Paket" id="submit-btn">
                    </form>
                  </main>
                </table>
              </div>
            </div>
          </div>
        </div>
      </main>
      <!-- ! Footer -->
      <footer class="footer">
        <div class="container footer--flex">
          <div class="footer-start">
            <p>2023 © Cermins - <a href="easylearning.com" target="_blank" rel="noopener noreferrer">Cermins.com</a></p>
          </div>
          <ul class="footer-end">
            <li><a href="##">About</a></li>
            <li><a href="##">Blog</a></li>
            <li><a href="##">Support</a></li>
            <li><a href="##">Contact</a></li>
          </ul>
        </div>
      </footer>
    </div>
  </div>

   <!-- Chart library -->
   <script src="./plugins/chart.min.js"></script>
  <!-- Icons library -->
  <script src="https://unpkg.com/feather-icons"></script>
  <!-- Custom scripts -->
  <script src="./js/script.js"></script>
  <!-- SweetAlert2 JS -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>
