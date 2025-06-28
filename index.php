<!DOCTYPE html>
<html lang="en">
  <head>
  <title>Website Pariwisata</title>
  <meta charset="utf-8">    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link href="bootstrap5/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="media/icon-web/Foto-Danau-Dua-Rasa-Danau-Labuan-Cermin-Biduk-Biduk-Kabupaten-Berau-Kalimantan-Timur-@brinkleydavies.jpg">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="mycss/fafont.css" rel="stylesheet">

    <script src="bootstrap5/js/bootstrap.bundle.min.js"></script>

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
      <img
        class="header-img"
        src="../pariwisata-revisi/media/main-image/Biduk-Biduk-e1650418220713.png"
        alt="Header Image"
        style="width: 100%; height: auto; object-fit: cover; max-height: 30vh"
      />
    </div>
  
  <!-- menu navbar -->
  <nav class="navbar navbar-expand-sm  navbar-dark" style="background-color: #3c5b6f; font-family: kaiesei tokumin, serif; color: #ffffff;" >
    <div class="container-fluid">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="index.php?p=beranda"  style="color: #ffffff">Beranda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?p=fasilitas"  style="color: #ffffff">Fasilitas Wisata</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?p=paket-wisata"  style="color: #ffffff">Paket Wisata</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?p=pemesanan"   style="color: #ffffff">Pemesanan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?p=galery"   style="color: #ffffff"> Galery</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?p=about"  style="color: #ffffff">About</a>
        </li>
      </ul>
    </div>
  </nav>
  <!-- menu navbar -->

  <!-- Content -->
  <div class="container mt-3">
    <div class="row">

      <!-- menggunakan full halaman content -->
      <!-- Content Dinamis -->
      <div class="col-sm-12">
          <?php
            $pages_dir='main-menu';

            if(!empty($_GET['p'])) {

                $pages=scandir($pages_dir,0);
                unset($pages[0],$pages[1]);
                $p=$_GET['p'];
                if(in_array($p.'.php',$pages)){
                    include($pages_dir.'/'.$p.'.php');
                }else{
                    echo'Halaman Tidak Ditemukan';
                }
                
            } else {
                
                include($pages_dir.'/beranda.php');
            }
          ?>            
      
    </div>

  </div>
<br>
<br>
  <!-- footer -->
  <nav
      class="navbar sticky-bottom navbar-light"
      style="background-color: #3c5b6f; font-family: kaiesei tokumin, serif"
    >
      <div class="container-fluid">
        <a
          class="navbar-brand text-center mx-auto"
          href="#"
          style="font-size: 12px; color: #ffffff"
          >&copy; 2024Pams</a
        >
      </div>
    </nav>

  <!-- footer -->

</body>
</html>
