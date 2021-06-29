<?php

include 'koneksi.php';

class Siswa extends Koneksi
{
    private $query;

    function __construct()
    {
        parent::__construct();
    }

    function create()
    {
        $this->query = "INSERT INTO ";
    }

    function read()
    {
        $this->query = "SELECT * FROM siswa WHERE 1 ";
        $hasil = $this->conn->query($this->query);
        return $hasil;
    }

    function detail($nisn)
    {
        $this->query = "SELECT * FROM siswa WHERE nisn='$nisn'";
        $detail = $this->conn->query($this->query);
        return $detail;
    }

    function update($nama, $nisn, $jenis_kelamin, $tempat_lahir, $tgl_lahir, $asal_sekolah, $tahun_lulus, $alamat, $jurusan, $ayah, $ibu, $nomor)
    {
        $this->query = "UPDATE siswa SET nama='$nama', jenis_kelamin='$jenis_kelamin', tempat_lahir='$tempat_lahir', tgl_lahir='$tgl_lahir', asal_sekolah='$asal_sekolah', tahun_lulus='$tahun_lulus', alamat='$alamat', jurusan ='$jurusan',ayah='$ayah', ibu='$ibu', nomor='$nomor' WHERE nisn = '$nisn'";
        $update = $this->conn->query($this->query);
        return $update;
    }

    function delete()
    {
    }

    function raport($nisn)
    {
        $this->query = "SELECT * FROM raport WHERE nisn ='$nisn'";
        $raport = $this->conn->query($this->query);
        return $raport;
    }

    function ubahRaport($sem1, $sem2, $sem3, $sem4, $sem5, $rata, $nisn)
    {
        $this->query = "UPDATE raport SET sem1='$sem1',sem2='$sem2',sem3='$sem3',sem4='$sem4',sem5='$sem5',rata_rata='$rata' WHERE nisn = '$nisn'";
        $raport = $this->conn->query($this->query);
        return $raport;
    }

    function status()
    {
        $this->query = "SELECT siswa.nama , siswa.nisn, siswa.status, raport.rata_rata  FROM siswa INNER JOIN raport ON siswa.nisn=raport.nisn ORDER BY raport.rata_rata ASC";
        $read = $this->conn->query($this->query);
        return $read;
    }
    function updateStatus($nisn, $status)
    {
        $this->query = "UPDATE siswa SET status='$status' WHERE nisn = '$nisn'";
        $update = $this->conn->query($this->query);
        return $update;
    }
}
