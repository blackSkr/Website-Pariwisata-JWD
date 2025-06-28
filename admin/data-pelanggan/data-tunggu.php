<?php
include '../../koneksi.php';
session_start();

// Debugging: Tampilkan variabel sesi
// var_dump($_SESSION);

if (isset($_SESSION['sesi'])) {
    $iduser = $_SESSION['iduser'];
} else {
    // Jika sesi tidak tersedia, arahkan ke halaman login atau tampilkan pesan
    header("Location: index.php"); // Ubah dengan halaman yang sesuai
    exit();
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
  <link rel="shortcut icon" href="./../img/svg/logo.svg" type="image/x-icon">
  <!-- Custom styles -->
  <link rel="stylesheet" href="./../css/style.min.css">
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
        <a href="../dashboard.php" class="logo-wrapper" title="Home">
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
                    <a class="show-cat-btn" href="../../dashboard.php"><span class="icon home" aria-hidden="true"></span>Dashboard</a>
                </li>
                <li>
                    <a class="show-cat-btn active" href="">
                        <span class="icon document" aria-hidden="true"></span>Data Pelanggan
                        <span class="category__btn transparent-btn" title="Open list">
                            <span class="sr-only">Open list</span>
                            <span class="icon arrow-down" aria-hidden="true"></span>
                        </span>
                    </a>
                    <ul class="cat-sub-menu">
                        <li>
                            <a class="active" href="semua-data.php">Semua Data Pelanggan</a>
                        </li>
                        <li>
                            <a href="data-cekin.php">Data Pelanggan Check In</a>
                        </li>
                        <li>
                            <a href="data-tunggu.php">Menunggu Check In</a>
                        </li>
                        <li>
                            <a href="data-history.php">history Pelanggan</a>
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
                            <a href="#">Paket Wisata Saat Ini</a>
                        </li>
                    </ul>
                </li>
                <li>
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
        <input type="text" placeholder="Enter keywords ..." required>
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
            <picture><source srcset="./../img/avatar/avatar-illustrated-02.webp" type="image/webp"><img src="./../img/avatar/avatar-illustrated-02.png" alt="User name"></picture>
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
        <h2 class="main-title">Semua Data Pelanggan</h2>
        <div class="row stat-cards">
        </div>
        <div class="row">
          <div class="col-lg-12">
            <div class="users-table table-wrapper">
            <table class="posts-table">
                <thead>
                    <tr class="users-table-info">
                        <th>Nama Pelanggan</th>
                        <th>ID Pelanggan</th>
                        <th>Status</th>
                        <th>Tanggal Check in</th>
                        <th>Tanggal Check out</th>
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
                    $query = "SELECT * FROM pelanggan WHERE status = 'Pending'";

                    $queryJml = "SELECT * FROM t_kategori WHERE flag=1";

                    $no = $posisi * 1;

                    $q_tampil = mysqli_query($koneksi, $query);
                    if (mysqli_num_rows($q_tampil) > 0) {
                        while ($r_tampil = mysqli_fetch_array($q_tampil)) {
                    ?>
                            <tr>
                                <td><?php echo $r_tampil['nama_pelanggan']; ?></td>
                                <td><?php echo $r_tampil['id_pelanggan']; ?></td>
                                <td><?php echo $r_tampil['status']; ?></td>
                                <td><?php echo $r_tampil['tgl_cekin']; ?></td>
                                <td><?php echo $r_tampil['tgl_cekout']; ?></td>
                                <td>
                                    <span class="p-relative">
                                        <button class="dropdown-btn transparent-btn" type="button" title="More info">
                                            <div class="sr-only">More info</div>
                                            <i data-feather="more-horizontal" aria-hidden="true"></i>
                                        </button>
                                        <ul class="users-item-dropdown dropdown">
                                            <li><a href="##">Edit</a></li>
                                            <li><a href="##">Trash</a></li>
                                        </ul>
                                    </span>
                                </td>
                            </tr>
                    <?php
                            $nomor++;
                        }
                    } else {
                        echo "<tr><td colspan='6'>Data Tidak Ditemukan</td></tr>";
                    }
                    ?>
                </tbody>
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
</footer>  -->


<!-- Chart library -->
<script src="./../plugins/chart.min.js"></script>
<!-- Icons library -->
<script src="./../plugins/feather.min.js"></script>
<!-- Custom scripts -->
<script src="./../js/script.js"></script>
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