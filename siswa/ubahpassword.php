<?php

session_start();

if ($_SESSION['level'] != 'siswa') {
    header("location:../index.php");
}
$nama = $_SESSION['nama'];

include('../proses/Akun.php');

if (isset($_POST['submit'])) {
    $nisn = $_SESSION['nisn'];
    $oldpwd = $_POST['oldpwd'];
    $newpwd = $_POST['newpwd'];
    $konfirmpwd = $_POST['konfirmpwd'];

    $akun = new Akun();

    if ($newpwd != $konfirmpwd) {
        $message = "Konfirmasi Password Tidak Cocok!";
        echo "<script type='text/javascript'>alert('$message');</script>";
    } else {
        $ubah = $akun->changePassword($nisn, $oldpwd, $newpwd);
        if ($ubah) {
            $message = "Password Berhasil Diubah!";
            echo "<script type='text/javascript'>alert('$message');</script>";
        } else {
            $message = "Password Anda Salah";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aplikasi Penerimaan Siswa Baru</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../asset/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../asset/dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>

            </ul>

        </nav>
        <!-- /.navbar -->
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index.php" class="brand-link">
                <img src="../asset/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Aplikasi PSB</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="../asset/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?= $nama;  ?></a>
                    </div>
                </div>
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-header">MENU</li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Pendaftaran
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="biodata.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Biodata</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="raport.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Raport</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="status.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Status</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    Account
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="ubahpassword.php" class="nav-link  active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Ubah Pasword</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../logout.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Logout</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>

                </nav>
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0"></h1>

                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Ubah Password</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- general form elements -->
                    <div class="card card-warning">
                        <div class="card-header">
                            <h3 class="card-title">Ubah Password</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="" method="post">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="oldpwd">Password Lama</label>
                                    <input type="password" class="form-control" id="oldpwd" name="oldpwd">
                                </div>
                                <div class="form-group">
                                    <label for="newpwd">Password Baru</label>
                                    <input type="password" class="form-control" id="newpwd" name="newpwd">
                                </div>
                                <div class="form-group">
                                    <label for="konfirmpwd">Konfirmasi Password</label>
                                    <input type="password" class="form-control" id="konfirmpwd" name="konfirmpwd">
                                </div>
                                <div class="card-footer">
                                    <button type="submit" name="submit" class="btn btn-warning btn-block">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                Anything you want
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="../asset/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../asset/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../asset/dist/js/adminlte.min.js"></script>
</body>

</html>