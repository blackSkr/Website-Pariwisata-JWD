<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Review</title>
    <!-- Sertakan SweetAlert2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function redirectToHomePage() {
            window.location.href = "../index.php"; // Ganti dengan URL yang sesuai
        }

        function showAlertAndRedirect(message, isSuccess) {
            Swal.fire({
                icon: isSuccess ? 'success' : 'error',
                title: isSuccess ? 'Komentar Telah Dikirim!' : 'Yah komentar gagal dikirim',
                text: message,
                timer: 2000, // Menampilkan alert selama 2 detik
                timerProgressBar: true,
                willClose: () => {
                    redirectToHomePage(); // Arahkan ke halaman utama setelah alert ditutup
                }
            });
        }

        window.onload = function() {
            var urlParams = new URLSearchParams(window.location.search);
            var status = urlParams.get('status');
            var message = urlParams.get('message');

            if (status === 'success') {
                showAlertAndRedirect('', true);
            } else if (status === 'error') {
                var errorMessage = message ? decodeURIComponent(message) : 'Yah komentar gagal dikirim';
                showAlertAndRedirect(errorMessage, false);
            }
        }
    </script>
</head>
<body>
    <!-- Konten kosong, alert dan pengalihan diatur melalui JavaScript -->
</body>
</html>
