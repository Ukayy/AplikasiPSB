<?php

session_start();

if ($_SESSION['level'] != 'admin') {
    header("location:../index.php");
}

include('../proses/Akun.php');

$akun = new Akun();

$data_akun = $akun->Akun();

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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../asset/plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../asset/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../asset/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../asset/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
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
                        <a href="#" class="d-block">Admin</a>
                    </div>
                </div>
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-header">MENU</li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Pendaftaran
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="datapendaftar.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data Pendaftar</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="statuspendaftar.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Status Pendaftaran</p>
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
                                    <a href="account.php" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Account Pendaftar</p>
                                    </a>
                                </li>
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
                <!-- /.sidebar-menu -->
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
                            <h1 class="m-0">Selamat Datang Admin!</h1>

                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Data Account</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th class="col-md-1">No </th>
                                                    <th>NISN</th>
                                                    <th>Nama</th>
                                                    <th>Password</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1;
                                                foreach ($data_akun as $data) : ?>
                                                    <tr>
                                                        <td><?= $i;  ?></td>
                                                        <td><?= $data['nisn'];  ?></td>
                                                        <td><?= $data['nama']; ?></td>
                                                        <td><?= $data['password'];  ?></td>
                                                        <td>
                                                            <a href="editAccountUser.php?id=<?= $data['nisn']; ?>" class="btn btn-warning fas fa-edit"></a>
                                                            <a href="deleteUser.php?id=<?= $data['nisn']; ?>" class="btn btn-danger fa fa-trash"></a>
                                                        </td>
                                                    </tr>
                                                <?php $i++;
                                                endforeach; ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th class="col-md-1">No </th>
                                                    <th>NISN</th>
                                                    <th>Nama</th>
                                                    <th>Password</th>
                                                    <th>Action</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
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
    <!-- DataTables  & Plugins -->
    <script src="../asset/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../asset/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../asset/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../asset/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="../asset/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../asset/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="../asset/plugins/jszip/jszip.min.js"></script>
    <script src="../asset/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="../asset/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="../asset/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="../asset/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="../asset/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../asset/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../asset/dist/js/demo.js"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
</body>

</html>