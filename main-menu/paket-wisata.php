<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<?php
include './koneksi.php';

function formatRupiah($angka){
  $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
  return $hasil_rupiah;
}

?>
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

<!-- konten utama -->
<div class="container-fluid">
    <h1 class="text-center">Paket Wisata</h1>
    <h3 class="text-center">Labuan Cermin</h3>
    <br>
</div>     
<div class="container"> <!-- Tambahkan container untuk menengahkan -->
    <div class="row row-cols-1 row-cols-md-2 g-4">
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
        $querygambar = "SELECT * FROM paket_wisata_revisi 
        ORDER BY 
          CASE 
            WHEN kode_paket = 'ULT' THEN 1 
            WHEN kode_paket LIKE 'ULT%' THEN 2 
            ELSE 3 
          END
           LIMIT $posisi, $batas";
        $no = $posisi * 1;
        $querytampil = mysqli_query($koneksi, $querygambar);
        if (mysqli_num_rows($querytampil) > 0) {
            while ($datatampil = mysqli_fetch_array($querytampil)) {
        ?>
            <div class="col slide-inLeft">
                <div class="card">
                    <img src="<?php echo './admin-img-uploads/' . $datatampil['pict']; ?>" class="card-img-top" alt="Preview">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $datatampil['nama_paket']; ?></h5>
                        <p class="card-text"><?php echo $datatampil['deskripsi']; ?></p>
                        <p class="card-text" style="font-weight: bold;"><?php echo formatRupiah($datatampil['harga_paket']); ?></p>
                        <!-- <p class="card-text" style="font-weight: bold;">Tur umum atau Tur pribadi</p> -->
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button class="btn btn-primary me-md-2" type="button">
                                <a href="index.php?p=pemesanan" style="color: #ffffff; text-decoration: none;">Pesan Paket</a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        <?php
            }
        } else {
            echo "<tr><td colspan='7'>Data Tidak Ditemukan</td></tr>";
        }
        ?>
    </div>
</div>
<br><br><br>
<!-- konten utama -->
