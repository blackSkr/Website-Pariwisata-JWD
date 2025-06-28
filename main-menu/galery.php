<?php
include './koneksi.php'; // Pastikan file koneksi.php ada dan benar

$query = "SELECT nama_gambar, deskripsi, gambar FROM galery WHERE status='tampil'";
$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
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
    </style>
</head>
<body>
    <div class="container-fluid">
        <h2 class="text-center">Galery kita</h2>
        <h5 class="text-center">Our Journey</h5>
        <hr>
    </div>

    <!-- konten-uama-gambar -->
    <div class="container-fluid" style="font-family: kaiesei tokumin, serif">
        <div class="container-fluid">
            <div class="row">
                <?php 
                $i = 0; // Inisialisasi variabel untuk pergantian animasi
                while($row = mysqli_fetch_assoc($result)) { 
                    $i++; 
                ?>
                    <div class="col-md-12">
                        <div class="container <?php echo ($i % 2 == 0) ? 'slide-inRight' : 'slide-inLeft'; ?>" style="font-family: kaiesei tokumin, serif; color: #3c5b6f; border-radius: 4px;">
                            <div class="row">
                                <?php if ($i % 2 == 0) { ?>
                                    <div class="col-sm-7">
                                        <br><br><br>
                                        <figure>
                                            <blockquote class="blockquote">
                                                <p style="font-weight: bold"><?php echo $row['nama_gambar']; ?></p>
                                            </blockquote>
                                            <figcaption class="blockquote-footer" style="color: #3c5b6f">
                                                <?php echo $row['deskripsi']; ?>
                                            </figcaption>
                                        </figure>
                                        <br>
                                    </div>
                                    <div class="col-sm-5">
                                        <br><br><br>
                                        <img src="<?php echo './admin-img-uploads/' . $row['gambar']; ?>" class="img-fluid" alt="<?php echo $row['nama_gambar']; ?>" />
                                    </div>
                                <?php } else { ?>
                                    <div class="col-sm-5">
                                        <br><br><br>
                                        <img src="<?php echo './admin-img-uploads/' . $row['gambar']; ?>" class="img-fluid" alt="<?php echo $row['nama_gambar']; ?>" />
                                    </div>
                                    <div class="col-sm-7">
                                        <br><br><br>
                                        <figure>
                                            <blockquote class="blockquote">
                                                <p style="font-weight: bold"><?php echo $row['nama_gambar']; ?></p>
                                            </blockquote>
                                            <figcaption class="blockquote-footer" style="color: #3c5b6f">
                                                <?php echo $row['deskripsi']; ?>
                                            </figcaption>
                                        </figure>
                                        <br>
                                    </div>
                                <?php } ?>
                                <div class="col-sm-1"></div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            </div>
        </div>
    </div>
</body>
</html>
