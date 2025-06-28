<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrasi Admin</title>
  <!-- Favicon -->
  <link rel="shortcut icon" href="./img/svg/logo.svg" type="image/x-icon">
  <!-- Custom styles -->
  <link rel="stylesheet" href="./css/style.min.css">
  <!-- SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
  <div class="layer"></div>
  <main class="page-center">
    <article class="sign-up">
      <h1 class="sign-up__title">Registrasi Admin</h1>
      <form class="sign-up-form form" action="../action/proses-registrasi-admin.php" method="POST">
        <label class="form-label-wrapper">
          <p class="form-label">Username</p>
          <input class="form-input" type="text" name="username" placeholder="Enter your username" required>
        </label>
        <label class="form-label-wrapper">
          <p class="form-label">Nama Lengkap</p>
          <input class="form-input" type="text" name="nama_lengkap" placeholder="Enter your full name" required>
        </label>
        <label class="form-label-wrapper">
          <p class="form-label">Password</p>
          <input class="form-input" type="password" name="password" placeholder="Enter your password" required>
        </label>
        <button class="form-btn primary-default-btn transparent-btn" type="submit">Registrasi</button>
      </form>
    </article>
  </main>
  <!-- Chart library -->
  <script src="./plugins/chart.min.js"></script>
  <!-- Icons library -->
  <script src="plugins/feather.min.js"></script>
  <!-- Custom scripts -->
  <script src="js/script.js"></script>
</body>
</html>
