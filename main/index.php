<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <!-- Eskternal CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/mobile_view.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/a404219d80.js" crossorigin="anonymous"></script>
</head>

<body style="margin: 0; padding: 0;">
    <div class="container-fluid">
        <!-- Navbar -->
        <nav class="navbar bg-primary fixed-top navbar-expand-lg py-3 shadow">
            <div class="container-fluid">
                <div class="navbar-brand d-inline-block align-text-top">
                    <i class="fa-solid fa-check-to-slot me-2" style="color: #ffffff;"></i>
                    <span class="text-white fw-bold h5" style="letter-spacing: 1.2px;">SISTEM CHECKLIST KEBERSIHAN TOILET</span>
                </div>
                <span class="navbar-text text-white">
                    <?php
                    date_default_timezone_set('Asia/Jakarta');
                    $hari = date('l');
                    $tanggal = date('d F Y');
                    echo $hari . ', ' . $tanggal;
                    ?>
                </span>
            </div>
        </nav>

        <!-- Form Login -->
        <div class="card mx-auto rounded-4 shadow" style="max-width: 450px; margin-top: 150px;">
            <div class="card-body p-5">
                <div class="card-title h2 text-center mb-3">Login</div>
                <p class="card-text text-center text-secondary mb-4" style="font-size: 14px;">Silahkan Isi Username dan Password!</p>
                <hr>
                <form action="login.php" method="POST" enctype="multipart/form-data">
                    <a href="tambah.php" class="d-flex justify-content-center" style="font-size: 14px; cursor: pointer;">Buat akun baru</a>
                    <div class="input-group mt-4 mb-4">
                        <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                        <input type="text" class="form-control" name="username" placeholder="Username"
                            aria-label="Username" required>
                    </div>
                    <div class="input-group mb-4">
                        <span class="input-group-text"><i class="fa-solid fa-key"></i></span>
                        <input type="password" class="form-control" name="password" placeholder="Password"
                            aria-label="Password" required>
                    </div>
                    <button type="submit" name="login"
                        class="btn btn-primary fw-semibold form-control text-uppercase"
                        style="letter-spacing: 1px;">Login</button>
                </form>
            </div>
        </div>
    </div>

    <footer class="bg-primary text-white py-3" style="margin-top: 68px;">
        <div class="container-fluid text-center">
            &copy; <?php echo date('Y'); ?> - Sistem Checklist Kebersihan Toilet
        </div>
    </footer>

    <!-- Bootstrap Javascript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
</body>

</html>