<?php
include('proses/Akun.php');

if (isset($_POST['submit'])) {
  session_start();

  $nisn = $_POST['nisn'];
  $password = $_POST['password'];
  $akun = new Akun();
  $jumlah = mysqli_num_rows($akun->Login($nisn, $password));
  // echo $jumlah;
  if ($jumlah > 0) {
    $row = mysqli_fetch_assoc($akun->Login($nisn, $password));
    $_SESSION["id_user"] = $row["id_user"];
    $_SESSION["nisn"] = $row["nisn"];
    $_SESSION["level"] = $row["level"];

    if ($_SESSION["level"] == "admin") {
      header("Location:admin/index.php");
    } else {
      header("Location:siswa/index.php?id=$nisn");
    }
  } else {
    $message = "NISN atau password salah!";
    echo "<script type='text/javascript'>alert('$message');</script>";
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
  <link rel="stylesheet" href="asset/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="asset/dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="#" class="h1"><b>Aplikasi</b> PSB</a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <form action="" method="post">
          <div class="input-group mb-3">
            <input type="text" name="nisn" class="form-control" placeholder="NISN">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-key"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="text-center">
            <button type="submit" name="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
      </div>
      </form>

      <p class="text-center">
        <a href="register.php" class="text-center">Daftar Pengguna Baru</a>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="asset/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="asset/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="asset/dist/js/adminlte.min.js"></script>
</body>

</html>