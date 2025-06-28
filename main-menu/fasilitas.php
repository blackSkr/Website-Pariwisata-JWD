<?php
// ambil-fasilitas.php
include './koneksi.php';

$query = "SELECT * FROM fasilitas WHERE status='tampil'"; // Tambahkan field gambar
$result = mysqli_query($koneksi, $query);

if (mysqli_num_rows($result) > 0) {
    $fasilitas = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    $fasilitas = [];
}

mysqli_close($koneksi);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fasilitas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: kaiesei tokumin, serif; 
            color: #3c5b6f;
        }

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

        .slide-inLeft {
            animation: slideFromLeft 1.5s ease-out;
        }

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

        .slide-inRight {
            animation: slideFromRight 1.5s ease-out;
        }
    </style>
</head>
<body>
    <!-- konten fasilitas -->
    <div class="container-fluid">
        <div class="judul-atas text-center slide-inLeft">
            <h2>Fasilitas</h2>
        </div>
        <div class="container-fluid">
            <div class="row">
                <?php foreach ($fasilitas as $index => $fasilitas_item): ?>
                    <div class="col-md-6 <?php echo $index % 2 == 0 ? 'slide-inLeft' : 'slide-inRight'; ?>">
                        <div class="container" style="font-family: kaiesei tokumin, serif; color: #3c5b6f; border-radius: 4px;">
                            <div class="row">
                                <div class="col-sm-5 <?php echo $index % 2 == 0 ? '' : 'order-sm-2'; ?>">
                                    <br /><br /><br />
                                    <img src="<?php echo './admin-img-uploads/' . $fasilitas_item['gambar']; ?>" class="card-img-top" alt="Preview">
                                </div>
                                <div class="col-sm-7">
                                    <br /><br /><br />
                                    <figure>
                                        <blockquote class="blockquote">
                                            <h1 style="font-weight: bold"><?= $fasilitas_item['jenis_fasilitas'] ?></h1><br>
                                        </blockquote>
                                        <figcaption class="blockquote-footer" style="color: #3c5b6f">
                                            <?= $fasilitas_item['deskripsi'] ?>
                                        </figcaption>
                                    </figure>
                                    <br />
                                </div>
                                <br />
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        </div>
    </div>
    <!-- konten fasilitas -->
</body>
</html>
