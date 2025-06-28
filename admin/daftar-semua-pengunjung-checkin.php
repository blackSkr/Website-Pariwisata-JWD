<?php
include '../koneksi.php';
session_start();

// Periksa apakah sesi admin ada
if (isset($_SESSION['id_admin'])) {
    $iduser = $_SESSION['id_admin'];
    // Ambil data admin jika diperlukan, misalnya
    // $query = "SELECT * FROM admin WHERE id_admin = ?";
    // $stmt = $koneksi->prepare($query);
    // $stmt->bind_param("i", $iduser);
    // $stmt->execute();
    // $data_admin = $stmt->get_result()->fetch_assoc();
    // $username = $data_admin['username'];
} else {
    header("Location: ../index.php");
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
  <!-- Favicon -->
  <link rel="shortcut icon" href="./img/svg/logo.svg" type="image/x-icon">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
        <div class="container">
          <h2 class="main-title">Daftar Tamu Check-In</h2>
          <div class="row">
            <div class="col-lg-12">
              <div class="users-table table-wrapper">
                <table class="posts-table">
                  <thead>
                    <tr class="users-table-info">
                      <th>Nama Pelanggan</th>
                      <th>ID Pelanggan</th>
                      <th>Status</th>
                      <th>Jenis Paket</th>
                      <th>Jumlah Penunjung</th>
                      <th>Tanggal Check in</th>
                      <th>Tanggal Check out</th>
                      <th>Jumlah Hari</th>
                      <th>Total Harga</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <br>
                  <br>
                  <tbody>
                    <?php
                    // Query untuk mengambil data pengunjung dengan status 'In'
                    $query = "SELECT * FROM pelanggan WHERE status='In' ORDER BY tgl_cekin DESC";
                    $result = $koneksi->query($query);

                    if ($result && $result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                    ?>
                      <tr>
                        <td><?php echo htmlspecialchars($row['nama_pelanggan']); ?></td>
                        <td><?php echo htmlspecialchars($row['id_pelanggan']); ?></td>
                        <td><?php echo htmlspecialchars($row['status']); ?></td>
                        <td><?php echo htmlspecialchars($row['jenis_paket']); ?></td>
                        <td><?php echo htmlspecialchars($row['jumlah_pelanggan']); ?></td>
                        <td><?php echo htmlspecialchars($row['tgl_cekin']); ?></td>
                        <td><?php echo htmlspecialchars($row['tgl_cekout']); ?></td>
                        <td><?php echo htmlspecialchars($row['jumlah_hari']); ?></td>
                        <td><?php echo "Rp " . number_format($row['total_harga'], 0, ',', '.'); ?></td>
                        <td>
                          <span class="p-relative">
                            <button class="dropdown-btn transparent-btn" type="button" title="More info">
                              <div class="sr-only">More info</div>
                              <i data-feather="more-horizontal" aria-hidden="true"></i>
                            </button>
                            <ul class="users-item-dropdown dropdown">
                              <li><a href="admin-edit-tamu.php?id=<?php echo htmlspecialchars($row['id_pelanggan']); ?>" class="btn btn-danger">Edit</a></li>
                              <li><a href="#" class="btn btn-danger" onclick="confirmDeletion(<?php echo $row['id_pelanggan']; ?>)">Hapus</a></li>
                              <!-- <li><a href="admin-hapus-tamu.php?id=<?php echo htmlspecialchars($row['id_pelanggan']); ?>" class="btn btn-danger">Trash</a></li> -->
                            </ul>
                          </span>
                        </td>
                      </tr>
                    <?php
                        }
                    } else {
                        echo "<tr><td colspan='7'>Data Tidak Ditemukan</td></tr>";
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
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
      <!-- script sweet alert untuk hapus data -->
      <script>
    function confirmDeletion(id) {
      Swal.fire({
        title: 'Apakah Anda yakin?',
        text: "Anda tidak akan dapat mengembalikan data ini!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus',
        cancelButtonText: 'Batal'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = '../action/proses-hapus-tamu.php?id=' + id;
        }
      });
    }
  </script>
      <!-- script sweet alert untuk hapus data -->
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
