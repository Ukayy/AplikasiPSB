<?php
session_start();

if ($_SESSION['level'] != 'siswa') {
    header("location:../index.php");
}

include('../proses/Siswa.php');
$siswa = new Siswa();


$nisn = $_SESSION['nisn'];
$nama = $_SESSION['nama'];

$raport = mysqli_fetch_assoc($siswa->raport($nisn));
$sem1 = $raport['sem1'];
$sem2 = $raport['sem2'];
$sem3 = $raport['sem3'];
$sem4 = $raport['sem4'];
$sem5 = $raport['sem5'];
$rata = $raport['rata_rata'];

if (isset($_POST['submit'])) {
    $sem1 = $_POST['sem1'];
    $sem2 = $_POST['sem2'];
    $sem3 = $_POST['sem3'];
    $sem4 = $_POST['sem4'];
    $sem5 = $_POST['sem5'];
    $rata = ($sem1 + $sem2 + $sem3 + $sem4 + $sem5) / 5;

    $siswa->ubahRaport($sem1, $sem2, $sem3, $sem4, $sem5, $rata, $nisn);
}

?>


<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
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
                        <li class="nav-item has-treeview menu-open">
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
                                    <a href="raport.php" class="nav-link  active">
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
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    Account
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="ubahpassword.php" class="nav-link">
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
                            <h1 class="m-0">Raport</h1>

                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Raport</li>
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
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Raport Siswa</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="" method="post">
                            <div class="card-body">
                                <div class="form-group">
                                    <p class="text-center"><b>Nilai Rata-Rata Raport </b></p>
                                    <div class="row">
                                        <div class="col text-center">
                                            <label for="sem1">Semester 1</label>
                                            <input type="text" class="form-control" id="sem1" name="sem1" value=<?= $sem1; ?>>
                                        </div>
                                        <div class="col text-center">
                                            <label for="sem2">Semester 2</label>
                                            <input type="text" class="form-control" id="sem2" name="sem2" value=<?= $sem2; ?>>
                                        </div>
                                        <div class="col text-center">
                                            <label for="sem3">Semester 3</label>
                                            <input type="text" class="form-control" id="sem3" name="sem3" value=<?= $sem3; ?>>
                                        </div>
                                        <div class="col text-center">
                                            <label for="sem4">Semester 4</label>
                                            <input type="text" class="form-control" id="sem4" name="sem4" value=<?= $sem4; ?>>
                                        </div>
                                        <div class="col text-center">
                                            <label for="sem5">Semester 5</label>
                                            <input type="text" class="form-control" id="sem5" name="sem5" value=<?= $sem5; ?>>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col text-center">
                                            <label for="rata">Rata-rata:</label>
                                            <input type="text" class="form-control text-center" id="rata" disabled name="rata" value=<?= $rata; ?>>
                                        </div>

                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
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