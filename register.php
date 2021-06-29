<?php
include 'proses/Akun.php';

$akun = new Akun();

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $nisn = $_POST['nisn'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];
    $panjangPassword = strlen($password);

    if ($panjangPassword <= 4) {
        $message = "Password harus lebih dari 4 karekter";
        echo "<script type='text/javascript'>alert('$message');</script>";
    } else {
        if ($password != $repassword) {
            $message = "Konfirmasi password salah";
            echo "<script type='text/javascript'>alert('$message');</script>";
        } else {
            if ($akun->cekNisn($nisn)) {
                $message = "NISN sudah terdaftar";
                echo "<script type='text/javascript'>alert('$message');</script>";
            } else {
                $akun->registrasi($nisn, $password, $nama);
                $message = "Pendaftaran Berhasil!";
                echo "<script type='text/javascript'>alert('$message'); window.location.href='index.php';</script>";
            }
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Penerimaan Siswa Baru</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="asset/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="asset//plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="asset//dist/css/adminlte.min.css">
</head>

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="#" class="h1"><b>Aplikasi</b> PSB</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Pendaftaran Pengguna Baru</p>

                <form action="" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="nisn" placeholder="NISN">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-key"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="repassword" placeholder="Retype password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" name="submit" class="btn btn-primary btn-block">Register</button>
                    </div>
                    <!-- /.col -->
            </div>
            </form>
            <a href="index.php" class="text-center">I already have a membership</a>
            <br>
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
    </div>
    <!-- /.register-box -->

    <!-- jQuery -->
    <script src="asset//plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="asset//plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="asset/dist/js/adminlte.min.js"></script>
</body>

</html>