<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="/attribut/style.css">
    <link href="bootstrap5/css/bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap5/js/bootstrap.bundle.min.js"></script>
    <style>
      /* Definisikan animasi slide dari kiri */
      @keyframes slideFromLeft {
        0% {
          transform: translateX(-100%);
          opacity: 0;
        }
        100% {
          transform: translateX(0);
          opacity: 1;
        }
      }

      /* Terapkan animasi ke elemen konten utama */
      .slide-inLeft {
        animation: slideFromLeft 1.5s ease-out;
      }
      /* Definisikan animasi slide dari kanan */
      @keyframes slideFromRight {
        0% {
          transform: translateX(100%);
          opacity: 0;
        }
        100% {
          transform: translateX(0);
          opacity: 1;
        }
      }

      /* Terapkan animasi ke elemen konten utama */
      .slide-inRight {
        animation: slideFromRight 1.5s ease-out;
      }
    </style>
</head>
<body>
    <!-- konten utama -->
    <div class="container-fluid" style="font-family: kaiesei tokumin, serif">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-9">
            <div class="container slide-inLeft" style="font-family: kaiesei tokumin, serif; color: #3c5b6f; border-radius: 4px;">
              <div class="row">
                <div class="col-sm-5">
                  <br />
                  <br />
                  <br />
                  <img src="../pariwisata-revisi/media/main-image/labuan2525252520cermin.jpg" class="img-fluid" alt="..." />
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
                    <figcaption class="blockquote-footer" style="color: #3c5b6f">
                      Danau Labuan Cermin adalah salah satu objek wisata air yang berlokasi di Desa Labuan Kelambu, Kecamatan Biduk-biduk, Kabupaten Berau, Kalimantan Timur. Tempat wisata alam ini dikelola oleh masyarakat sekitar bekerja sama dengan Lembaga Masyarakat Labuan Cermin yang menaunginya.
                    </figcaption>
                  </figure>
                  <br />
                </div>
                <br />
                <div class="col-sm-1"></div>
              </div>
            </div>
          </div>
          <div class="col-md-3 slide-inRight">
            <br>
            <br>
            <br>
            <div class="card text-center">
              <br />
              <div class="card-footer text-muted">
                <form class="d-flex">
                  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
                  <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
              </div>
              <br />
              <div class="card-header-fluid">
                <div class="ratio ratio-16x9">
                  <iframe width="250" height="auto" src="https://www.youtube.com/embed/2uj9YydtSLs?autoplay=1" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                </div>
              </div>
              <div class="card-body">
                <p class="card-text">Keindahan Danau Labuan Cermin. Drone Pov</p>
              </div>
            </div>
          </div>
          <div class="col-md-9">
            <div class="container slide-inRight" style="font-family: kaiesei tokumin, serif; color: #3c5b6f; border-radius: 4px;">
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
                    <figcaption class="blockquote-footer" style="color: #3c5b6f">
                      Perjalanan udara melalui bandara Kalimarau Berau anjung redeb - Biduk biduk sekitar 6 s/d 8 Jam. perjalanan darat melalui jalan Tanjung redeb - biduk biduk ditempuh selama 6 s/d 8 jam dengan kondisi jalan aspal. Perjalanan air menggunakan speedboat dari Tanjung redeb - biduk biduk sekitar 3 jam.
                    </figcaption>
                  </figure>
                  <br />
                </div>
                <div class="col-sm-5">
                  <br />
                  <br />
                  <br />
                  <img src="../pariwisata-revisi/media/main-image/akses-labuan-cermin.jpeg" class="img-fluid" alt="..." />
                </div>
                <br />
                <div class="col-sm-1"></div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
 </div>
    <br>
    <br>
    <br>
    <!-- konten utama -->
</body>
</html>
