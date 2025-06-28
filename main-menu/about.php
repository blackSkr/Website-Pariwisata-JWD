<?php
include "./koneksi.php";
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<style>
    body {
        font-family: kaiesei tokumin, serif;
        color: #3c5b6f;
    }

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

    #map {
        height: 400px;
        width: 100%;
        border: 0;
    }
</style>

<div class="container-fluid">
    <div class="team-text">
        <h2 class="text-center">Cermin's Team</h2>
        <h6 class="text-center">About Us</h6>
        <hr>
    </div>
    <div class="col-md-12">
        <div class="container slide-inRight" style="font-family: kaiesei tokumin, serif; color: #3c5b6f; border-radius: 4px;">
            <div class="row">
                <div class="col-sm-7">
                    <br />
                    <br />
                    <br />
                    <figure>
                        <blockquote class="blockquote">
                            <h1 style="font-weight: bold">Cermin's team</h1>
                            <p style="font-weight: bold">Sejak 2010</p>
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
                    <img src="media/main-image/labuan-cermin_1143295598.jpg" class="img-fluid" alt="..." />
                </div>
                <br />
                <div class="col-sm-1"></div>
            </div>
        </div>
    </div>
</div>
<br>
<!-- sesi komentar review -->
<?php
$sql = "SELECT * FROM review WHERE status='aman'";
$datareview = mysqli_query($koneksi, $sql);
?>
<div class="container-fluid">
    <div class="col-md-12">
        <h2 class="text-center">Apa yang pengunjung kami katakan</h2>
        <hr>
    </div>
    <div class="col-md-12">
        <div class="card-group">
            <?php
            // cek query
            if (mysqli_num_rows($datareview) > 0) {
                // ambil data
                while ($row = mysqli_fetch_assoc($datareview)) {
                    $nama = $row['nama'] ?? 'Nama tidak tersedia';
                    $komentar = $row['komentar'] ?? 'Komentar tidak tersedia';
            ?>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title" style="font-weight: bold;"><?php echo htmlspecialchars($row['nama']); ?></h5>
                    <p class="card-text"><?php echo htmlspecialchars($row['komentar']); ?></p>
                </div>
            </div>
            <?php
                }
            } else {
            ?>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">tidak ada komentar</h5>
                    <p class="card-text">belum ada ulasan</p>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>
<br>
<!-- tambah komentar -->
<div class="container-fluid">
    <div class="container mt-5">
        <h2 class="mb-4">Silahkan beri review ya!</h2>
        <form id="bookingForm" method="POST" action="../pariwisata-revisi/action/proses-input-review.php">
            <input type="hidden" name="status" id="status" value="kurangaman">

            <div class="mb-3">
                <label for="namareview" class="form-label">Nama Kamu?</label>
                <input type="text" class="form-control" name="namareview" required>
            </div>
            <div class="mb-3">
                <label for="emailreview" class="form-label">Email kamu?</label>
                <input type="email" class="form-control" name="emailreview" required>
            </div>
            <div class="mb-3">
                <label for="komentar" class="form-label">Komentar</label>
                <input type="text" class="form-control" id="komentar" name="komentar" required>
            </div>
            <button type="submit" class="btn btn-primary">Kirim</button>
        </form>
    </div>
</div>
<!-- tambah komentar -->


<!-- footer -->
<footer class="footer" style="">
    <div class="container text-start">
        <br>
        <div class="row ">
            <br>
            <div class="col-sm-2"></div>
            <div class="col-sm-3" style="padding-top: 25px;">
                <h1 style="color: #3C5B6F; font-family: kaiesei tokumin, serif ; font-weight: bold;">Cermin's &nbsp;</h1>
                <h2 style="font-family: kaiesei tokumin, serif; color: #3C5B6F;">Team</h2>
            </div>
            <div class="col-sm-3" style="padding-top: 10px;">
                <h3 style="font-family: kaiesei tokumin, serif; color: #3C5B6F; font-weight: bold;">About Us</h3>
                <div class="isi-abt" style=" font-family: kaiesei tokumin, serif; ">
                    <a href="" style="text-decoration: none; color: #3C5B6F;">
                        <h4>Home</h4>
                    </a>
                    <a href="" style="text-decoration: none; color: #3C5B6F;">
                        <h4>About Us</h4>
                    </a>
                    <a href="" style="text-decoration: none; color: #3C5B6F;">
                        <h4>Location</h4>
                    </a>
                </div>
            </div>
            <div class="col-sm-3" style="padding-top: 10px;">
                <h3 style="font-family: kaiesei tokumin, serif; color: #3C5B6F; font-weight: bold;">Connect With Us</h3>
                <div class="isi-abt" style=" font-family: kaiesei tokumin, serif; ">
                    <div class="row">
                        <a href="#" style="text-decoration:none; color: #3c5b6f">
                            <i class="fa-brands fa-whatsapp fa-2x"></i>
                        </a>
                        <a href="#" style="text-decoration:none; color: #3c5b6f">
                            <i class="fa-regular fa-envelope fa-2x"></i>
                        </a>
                        <a href="##" style="text-decoration:none; color: #3c5b6f">
                            <i class="fa-brands fa-youtube fa-2x"></i>
                        </a>
                        <a href="#" style="text-decoration:none; color: #3c5b6f">
                            <i class="fa-solid fa-location-arrow fa-2x"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    <br>
    <br>
    <br>
</footer>
<!-- footer -->
