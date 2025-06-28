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

// Ambil data paket dari database
$idgambar = isset($_GET['id_galery']) ? intval($_GET['id_galery']) : 0; // Menambahkan validasi untuk id_paket
$sql = "SELECT * FROM galery WHERE id_galery = ?";
$stmt = $koneksi->prepare($sql);
$stmt->bind_param('i', $id_paket);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

$pict = isset($data['gambar']) ? htmlspecialchars($data['gambar']) : '';

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
                                    <picture>
                                        <source srcset="./img/avatar/avatar-illustrated-02.webp" type="image/webp">
                                        <img src="./img/avatar/avatar-illustrated-02.png" alt="User name">
                                    </picture>
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
                                <li><a href="logout.php" class="btn btn-danger">Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- ! Main -->
            <?php
            // Query untuk menghitung jumlah pelanggan
            $sql = "SELECT COUNT(*) AS jumlah FROM galery "; // Nama tabel
            $result = $koneksi->query($sql);

            // Ambil hasil
            if ($result) {
                $row = $result->fetch_assoc();
                $jumlah = $row['jumlah'];
            } else {
                $jumlah = 'Error: ' . $koneksi->error;
            }
            ?>
            <main class="main users chart-page" id="skip-target">
                <div class="container">
                    <h2 class="main-title">Dashboard</h2>
                    <div class="row stat-cards">
                        <div class="col-md-6 col-xl-3">
                            <article class="stat-cards-item">
                                <div class="stat-cards-icon primary">
                                    <i data-feather="bar-chart-2" aria-hidden="true"></i>
                                </div>
                                <div class="stat-cards-info">
                                    <p class="stat-cards-info__num"><?php echo htmlspecialchars($jumlah); ?></p>
                                    <p class="stat-cards-info__title">Foto yang ada</p>
                                </div>
                            </article>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="users-table table-wrapper">
                                <table class="posts-table">
                                    <thead>
                                        <tr class="users-table-info">
                                            <th>Id Galery</th>
                                            <th>Nama Foto</th>
                                            <th>Lokasi Dir</th>
                                            <th>Deskripsi Foto</th>
                                            <th>Preview Foto</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $batas = 10;
                                        extract($_GET);
                                        if (empty($hal)) {
                                            $posisi = 0;
                                            $hal = 1;
                                            $nomor = 1;
                                        } else {
                                            $posisi = ($hal - 1) * $batas;
                                            $nomor = $posisi + 1;
                                        }

                                        //program pencarian data
                                        $query = "SELECT * FROM galery";

                                        $no = $posisi * 1;

                                        $q_tampil = mysqli_query($koneksi, $query);
                                        if (mysqli_num_rows($q_tampil) > 0) {
                                            while ($r_tampil = mysqli_fetch_array($q_tampil)) {
                                        ?>
                                                <tr>
                                                    <td><?php echo $r_tampil['id_galery']; ?></td>
                                                    <td><?php echo $r_tampil['nama_gambar']; ?></td>
                                                    <td><?php echo $r_tampil['gambar']; ?></td>
                                                    <td><?php echo $r_tampil['deskripsi']; ?></td>
                                                    <td><img src="../admin-img-uploads/<?php echo htmlspecialchars($r_tampil['gambar']); ?>" alt="Preview" width="100"></td>
                                                    <td><?php echo $r_tampil['status']; ?></td>
                                                    <td>
                                                        <a href="admin-edit-galery.php?id=<?php echo htmlspecialchars($r_tampil['id_galery']); ?>" class="btn btn-warning">Edit</a> |
                                                        <a href="#" class="btn btn-danger" onclick="confirmDeletion(<?php echo $r_tampil['id_galery']; ?>)">Hapus</a>
                                                    </td>
                                                </tr>
                                        <?php
                                                $nomor++;
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
            <!-- script sweet alert hapus data -->
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
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
                            window.location.href = '../action/proses-admin-hapus-data-galery.php?id=' + id;
                        }
                    });
                }
            </script>
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
            </script>
        </div>
    </div>
</body>

</html>