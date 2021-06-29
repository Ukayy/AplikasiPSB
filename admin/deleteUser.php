<?php


$nisn = $_GET['id'];

include('../proses/Akun.php');

$akun = new Akun();

$hapus = $akun->delete($nisn);

if ($hapus) {
    $message = "Akun berhasil di hapus!";
    echo "<script type='text/javascript'>alert('$message');</script>";
    header("location:account.php");
}
