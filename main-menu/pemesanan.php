</php
include "koneksi.php";
?>
<style>
    body   {
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
      .toggle-link {
            cursor: pointer;
        }
        .login-link {
            color: #3c5b6f; /* Warna biru untuk link login */
        }
        .register-link {
            color: #3c5b6f; /* Warna hijau untuk link register */
        }
</style>
<!-- form login -->
<div class="container-fluid form-container">
        <br>
        <h3 class="text-center" id="formTitle">Login Terlebih dahulu ya!</h3>
        <form id="authForm" method="POST" action="/pariwisata-revisi/action/proses-login-user.php">
            <!-- Login Form -->
            <div id="loginForm">
                <div class="mb-3">
                    <label for="loginEmail" class="form-label">Email address</label>
                    <input type="text" class="form-control" id="loginEmail" aria-describedby="emailHelp" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="loginPassword" class="form-label">Password</label>
                    <input type="password" class="form-control" id="loginPassword" name="pasw" required>
                </div>
                <button type="submit" class="btn btn-primary" name="login">Login</button>
                <button type="submit" class="btn btn-primary" ><a href="index.php?p=registrasi" style="text-decoration: none ; color: #ffffff; ">belum punya akun? registrasi disini ya</a></button>
                </form>
            </div>
        <br>
        <br>
        <br>
    </div>
    </div>
    </div>
    </div>
<!-- form login