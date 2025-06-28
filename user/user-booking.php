
<div class="container mt-5">
        <h2>Form Registrasi</h2>
        <form action="../pariwisata-revisi/action/proses-registrasi-user.php" method="POST">
            <div class="mb-3">
                <label for="email" class="form-label">Nama</label>
                <input type="text" class="form-control" id="email" name="nama" required  maxlength="100"> 
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required  maxlength="100"> 
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="pasw" required  maxlength="12">
            </div>
            <div class="mb-3">
                <label for="no_hp" class="form-label">Nomor HP</label>
                <input type="tel" class="form-control" id="no_hp" name="no_hp" pattern="\d+" inputmode="numeric" title="Hanya angka yang diperbolehkan" required  maxlength="13">
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label"  maxlength="100">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat_pelanggan" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Daftar</button>
        </form>
    </div>