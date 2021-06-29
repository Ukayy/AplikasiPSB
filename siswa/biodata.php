<?php
session_start();

if ($_SESSION['level'] != 'siswa') {
    header("location:../index.php");
}

include('../proses/Siswa.php');
$siswa = new Siswa();

$nisn = $_SESSION['nisn'];
$detail = mysqli_fetch_assoc($siswa->detail($nisn));
$nama = $detail['nama'];
$jenis_kelamin = $detail['jenis_kelamin'];
$tempat_lahir = $detail['tempat_lahir'];
$tgl_lahir = $detail['tgl_lahir'];
$asal_sekolah = $detail['asal_sekolah'];
$tahun_lulus = $detail['tahun_lulus'];
$alamat = $detail['alamat'];
$jurusan = $detail['jurusan'];
$ayah = $detail['ayah'];
$ibu = $detail['ibu'];
$nomor = $detail['nomor'];

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $asal_sekolah = $_POST['asal_sekolah'];
    $tahun_lulus = $_POST['tahun_lulus'];
    $alamat = $_POST['alamat'];
    $jurusan = $_POST['jurusan'];
    $ayah = $_POST['ayah'];
    $ibu = $_POST['ibu'];
    $nomor = $_POST['nomor'];

    $ubah = $siswa->update($nama, $nisn, $jenis_kelamin, $tempat_lahir, $tgl_lahir, $asal_sekolah, $tahun_lulus, $alamat, $jurusan, $ayah, $ibu, $nomor);
    if ($ubah) {
        $message = "Data berhasil di simpan!";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
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
                                    <a href="biodata.php" class="nav-link active">
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
                                    <a href="raport.php" class="nav-link">
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
                            <h1 class="m-0">Biodata Diri</h1>

                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Biodata Diri</li>
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
                            <h3 class="card-title">Biodata Diri Calon Siswa</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="" method="post">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama" value=<?= $nama; ?>>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nisn</label>
                                    <input type="text" class="form-control" id="nisn" name="nisn" placeholder="Masukkan Nisn" value="<?= $nisn; ?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <select class="form-control select2bs4" name="jenis_kelamin" style="width: 100%;">
                                        <option value="<?= $jenis_kelamin;  ?>"><?= $jenis_kelamin;  ?></option>
                                        <option value="laki-laki">Laki-laki</option>
                                        <option value="perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tempat_lahir">Tempat Lahir</label>
                                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?= $tempat_lahir; ?>" placeholder="Masukkan Tempat Lahir">
                                </div>
                                <div class="form-group">
                                    <label for="tgl_lahir">Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value=<?= $tgl_lahir; ?>>
                                </div>
                                <div class="form-group">
                                    <label for="asal_sekolah">Asal Sekolah</label>
                                    <input type="text" class="form-control" id="asal_sekolah" name="asal_sekolah" value="<?= $asal_sekolah; ?>" placeholder="Masukkan Asal Sekolah">
                                </div>
                                <div class="form-group">
                                    <label for="tahun_lulus">Tahun Lulus</label>
                                    <input type="date" class="form-control" id="tahun_lulus" value="<?= $tahun_lulus; ?>" name="tahun_lulus">
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $alamat; ?>" placeholder="Masukkan Alamat">
                                </div>
                                <div class="form-group">
                                    <label>Pilih Jurusan</label>
                                    <select class="form-control select2bs4" name="jurusan" style="width: 100%;">
                                        <option value="<?= $jurusan; ?>"><?= $jurusan; ?> </option>
                                        <option value="IPA">IPA</option>
                                        <option value="IPS">IPS</option>
                                        <option value="Bahasa">Bahasa</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="ayah">Nama Ayah</label>
                                    <input type="text" class="form-control" id="ayah" name="ayah" value="<?= $ayah; ?>" placeholder="Masukkan Nama Ayah">
                                </div>
                                <div class="form-group">
                                    <label for="ibu">Nama Ibu</label>
                                    <input type="text" class="form-control" id="ibu" name="ibu" value="<?= $ibu; ?>" placeholder="Masukkan Nama Ibu">
                                </div>
                                <div class="form-group">
                                    <label for="nomor">Nomor Hp</label>
                                    <input type="text" class="form-control" id="nomor" name="nomor" value="<?= $nomor; ?>" placeholder="Masukkan Nomor Hp">
                                </div>
                                <div class="card-footer">
                                    <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
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