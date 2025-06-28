<?php
include '../koneksi.php';
session_start();

// Periksa apakah sesi admin ada
if (isset($_SESSION['id_admin'])) {
    $iduser = $_SESSION['id_admin'];
} else {
    header("Location: ../index.php");
    exit();
}

// Periksa apakah ID diterima dengan benar
if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "<script>alert('ID tidak ditemukan.');window.location='dashboard.php';</script>";
    exit();
}

$id = intval($_GET['id']);

// Debugging: cek ID yang diterima
// echo "<script>alert('ID diterima: " . htmlspecialchars($id) . "');</script>";

// Persiapkan query
$query = "SELECT * FROM review WHERE id_user_review = ?";
$stmt = $koneksi->prepare($query);
if ($stmt === false) {
    die("Prepare failed: " . htmlspecialchars($koneksi->error));
}
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();

// Debugging: cek hasil query
if ($result === false) {
    die("Query error: " . htmlspecialchars($koneksi->error));
}

$data = $result->fetch_assoc();

if (!$data) {
    echo "<script>alert('Data dengan ID $id tidak ditemukan.');window.location='dashboard.php';</script>";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Pengunjung Check-In</title>
  <link href="../bootstrap5/css/bootstrap.min.css" rel="stylesheet">
  <link rel="icon" type="image/png" href="../media/icon-web/Foto-Danau-Dua-Rasa-Danau-Labuan-Cermin-Biduk-Biduk-Kabupaten-Berau-Kalimantan-Timur-@brinkleydavies.jpg">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="../mycss/fafont.css" rel="stylesheet">
  <script src="../bootstrap5/js/bootstrap.bundle.min.js"></script>
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
  <!-- Font Awesome Icons -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <!-- Favicon -->
  <link rel="shortcut icon" href="./img/svg/logo.svg" type="image/x-icon">
  <!-- Custom styles -->
  <link rel="stylesheet" href="./css/style.min.css">
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
                  <picture><source srcset="./img/avatar/avatar-illustrated-02.webp" type="image/webp"><img src="./img/avatar/avatar-illustrated-02.png" alt="User name"></picture>
                </span>
              </button>
              <ul class="users-item-dropdown nav-user-dropdown dropdown">
                <li><a href="##">
                    <i data-feather="user" aria-hidden="true"></i>
                    <span>Profile</span>
                  </a></li>
                <li><a href="##">
                    <i data-feather="settings" aria-hidden="true"></i>
                    <span>Account settings</span>
                  </a></li>
                <li><a href="logout.php" class="btn btn-danger">Logout</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </nav>

      <!-- ! Main -->
      <main class="main users chart-page" id="skip-target">
        <div class="container mt-5">
          <h2>Edit Review</h2>
          <form action="../action/proses-edit-review.php" method="POST">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($data['id_user_review']); ?>">
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="text" class="form-control" id="email" name="email" readonly value="<?php echo htmlspecialchars($data['email']); ?>" required maxlength="100">
            </div>
            <div class="mb-3">
              <label for="nama" class="form-label">Nama</label>
              <input type="text" class="form-control" id="nama" name="nama" readonly value="<?php echo htmlspecialchars($data['nama']); ?>" required maxlength="100">
            </div>
            <div class="mb-3">
              <label for="komentar" class="form-label">Komentar</label>
              <input type="text" class="form-control" id="komentar" name="komentar" readonly value="<?php echo htmlspecialchars($data['komentar']); ?>" required maxlength="100">
            </div>
            <div class="mb-3">
              <label for="status" class="form-label">Status</label>
              <select class="form-select" id="status" name="status" required>
                <option value="kurangaman" <?php echo $data['status'] == 'kurangaman' ? 'selected' : ''; ?>>Tidak ditampilkan</option>
                <option value="aman" <?php echo $data['status'] == 'aman' ? 'selected' : ''; ?>>Ditampilkan</option>
              </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
          </form>
        </div>
      </main>

      <!-- footer -->
      <!-- <footer class="footer">
        <div class="container footer--flex">
          <div class="footer-start">
            <p>2024 © Pams</p>
          </div>
        </div>
      </footer> -->

      <!-- script cari data -->
      <script>
      document.getElementById('search-input').addEventListener('input', function() {
        const query = this.value;
        if (query.length > 2) { // Hanya mulai pencarian setelah 3 karakter
          fetch('../action/cari-data.php?q=' + encodeURIComponent(query))
            .then(response => response.json())
            .then(data => {
              const resultsContainer = document.getElementById('search-results');
              resultsContainer.innerHTML = '';
              data.forEach(item => {
                const resultItem = document.createElement('div');
                resultItem.textContent = `${item.id_pelanggan} - ${item.nama_pelanggan}`;
                resultsContainer.appendChild(resultItem);
              });
            })
            .catch(error => console.error('Error:', error));
        }
      });
      </script>

      <!-- Chart library -->
      <script src="./plugins/chart.min.js"></script>
      <!-- Icons library -->
      <script src="plugins/feather.min.js"></script>
      <!-- Custom scripts -->
      <script src="js/script.js"></script>
    </div>
  </div>
</body>
</html>
