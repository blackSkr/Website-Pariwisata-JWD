<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="icon" href="media/icon-web/Foto-Danau-Dua-Rasa-Danau-Labuan-Cermin-Biduk-Biduk-Kabupaten-Berau-Kalimantan-Timur-@brinkleydavies.jpg" type="image/x-icon">
    <script
      src="https://kit.fontawesome.com/yourcode.js"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://kit.fontawesome.com/a076d05399.js"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <title>Website Pariwisata</title>
    <style></style>
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

    <!-- Navbar -->
    <nav
      class="navbar navbar-expand-lg navbar-dark"
      style="background-color: #3c5b6f; font-family: kaiesei tokumin, serif" >
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Beranda</a>
        <a class="navbar-brand" href="index.php?p=about">About</a>
        <a class="navbar-brand" href="index.php?p=objek-wisata">Objek Wisata</a>
        <a class="navbar-brand" href="">Fasilitas Wisata</a>
        <a class="navbar-brand" href="">Museum Salak</a>
        <a class="navbar-brand" href="">Pemesanan</a>
        <a class="navbar-brand" href="">Galerry</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNavDarkDropdown"
          aria-controls="navbarNavDarkDropdown"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                href="#"
                id="navbarDarkDropdownMenuLink"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                Paket Wisata
              </a>
              <ul
                class="dropdown-menu dropdown-menu-dark"
                aria-labelledby="navbarDarkDropdownMenuLink"
                style="background-color: #3c5b6f"
              >
                <li><a class="dropdown-item" href="../pariwisata-revisi/navbar-menu/pemesanan.php">Private Holiday</a></li>
                <li><a class="dropdown-item" href="../pariwisata-revisi/navbar-menu/pemesanan.php">Fam's Gathering</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Navbar -->
    <!-- konten-utama -->
    <div class="container-fluid" style="font-family: kaiesei tokumin, serif">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-9">
            <div
              class="container"
              style="
                font-family: kaiesei tokumin, serif;
                color: #3c5b6f;
                border-radius: 4px;
              ">
              <div class="row">
                <div class="col-sm-5">
                  <br />
                  <br />
                  <br />
                  <img
                    src="../pariwisata-revisi/media/main-image/labuan2525252520cermin.jpg"
                    class="img-fluid"
                    alt="..."
                  />
                </div>
                <div class="col-sm-7">
                  <br />
                  <br />
                  <br />
                  <figure>
                    <blockquote class="blockquote">
                      <h1 style="font-weight: bold">Selamat Datang di</h1><br>
                      <p style="font-weight: bold">Danau Labuan Cermin</p>
                    </blockquote>
                    <br />
                    <figcaption
                      class="blockquote-footer"
                      style="color: #3c5b6f"
                    >
                      Danau Labuan Cermin adalah salah satu objek wisata air
                      yang berlokasi di Desa Labuan Kelambu, Kecamatan
                      Biduk-biduk, Kabupaten Berau, Kalimantan Timur. Tempat
                      wisata alam ini dikelola oleh masyarakat sekitar bekerja
                      sama dengan Lembaga Masyarakat Labuan Cermin yang
                      menaunginya.
                    </figcaption>
                  </figure>
                  <br />
                </div>
                <br />
                <div class="col-sm-1"></div>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card text-center">
              <br />
              <div class="card-footer text-muted">
                <form class="d-flex">
                  <input
                    class="form-control me-2"
                    type="search"
                    placeholder="Search"
                    aria-label="Search"
                  />
                  <button class="btn btn-outline-success" type="submit">
                    Search
                  </button>
                </form>
              </div>
              <br />
              <div class="card-header-fluid">
                <div class="ratio ratio-16x9">
                <iframe
                    width="250"
                    height="auto"
                    src="https://www.youtube.com/embed/2uj9YydtSLs?autoplay=1"
                    allow="autoplay; encrypted-media"
                    allowfullscreen
                  ></iframe>
                </div>
              </div>
              <div class="card-body">
                <p class="card-text">
                  Keindahan Danau Labuan Cermin. Drone Pov
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-9">
            <div
              class="container"
              style="
                font-family: kaiesei tokumin, serif;
                color: #3c5b6f;
                border-radius: 4px;
              ">
              <div class="row">
                <div class="col-sm-7">
                  <br />
                  <br />
                  <br />
                  <figure>
                    <blockquote class="blockquote">
                      <h1 style="font-weight: bold">Aksesibilitas</h1>
                    </blockquote>
                    <br />
                    <figcaption
                      class="blockquote-footer"
                      style="color: #3c5b6f"
                    >
                      Perjalanan udara melalui bandara Kalimarau Berau anjung
                      redeb - Biduk biduk sekitar 6 s/d 8 Jam. perjalanan darat
                      melalui jalan Tanjung redeb - biduk biduk ditempuh selama
                      6 s/d 8 jam dengan kondisi jalan aspal. Perjalanan air
                      menggunakan speedboat dari Tanjung redeb - biduk biduk
                      sekitar 3 jam.
                    </figcaption>
                  </figure>
                  <br />
                </div>
                <div class="col-sm-5">
                  <br />
                  <br />
                  <br />
                  <img
                    src="../pariwisata-revisi/media/main-image/akses-labuan-cermin.jpeg"
                    class="img-fluid"
                    alt="..."
                  />
                </div>
                <br />
                <div class="col-sm-1"></div>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card text-center">
              <br />
              <div class="card-footer text-muted">
              </div>
              <br />
              <div class="card-header-fluid">
                <div class="kontak-kami">
                  <h1 class="text-center" style="color: #3c5b6f;">Kontak Kami</h1>
                </div>
              </div>
                <p >
                  <a href="#" style="text-decoration: none; color: #3c5b6f;"><i class="fa-brands fa-instagram fa-2x"></i></a>
                  <a href="#" style="text-decoration: none; color: #3c5b6f;"><i class="fa-brands fa-whatsapp fa-2x"></i></a>
                  <a href="#" style="text-decoration: none; color: #3c5b6f;"><i class="fa-regular fa-envelope fa-2x"></i></a>
                </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- konten-utama -->
    <br />
    <br />
    <br />
    </div>

      <!-- menggunakan full halaman content -->
      <!-- Content Dinamis -->
      <div class="col-sm-12">
          <?php
            $pages_dir='navbar-menu';

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
                
                include($pages_dir.'/about.php');
            }
          ?>            
      
    </div>

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
