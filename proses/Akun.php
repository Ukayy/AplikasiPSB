<?php

include('Koneksi.php');

class Akun extends Koneksi
{
    private $query;

    function __construct()
    {
        parent::__construct();
    }

    function registrasi($nisn, $password, $nama)
    {
        $this->query = "INSERT INTO user VALUE('','$nisn','$password','siswa')";
        $simpan = $this->conn->query($this->query);
        if ($simpan) {
            $this->query = "INSERT INTO siswa VALUE('','$nisn','$nama',null,null,null,null,null,null,'-',null,null,null,'Terdaftar')";
            $coba = $this->conn->query($this->query);
            if ($coba) {

                $this->query = "INSERT INTO raport VALUE('','$nisn',null,null,null,null,null,null)";
                $this->conn->query($this->query);
            }
        }

        return $simpan;
    }

    function changePassword($nisn, $oldPassword, $newPassword)
    {
        $this->query = "SELECT * FROM user WHERE nisn = '$nisn' AND password='$oldPassword'";
        $cek = $this->conn->query($this->query);
        $jumlah = mysqli_num_rows($cek);

        if ($jumlah > 0) {
            $this->query = "UPDATE user SET password= $newPassword WHERE nisn = '$nisn'";
            $simpan = $this->conn->query($this->query);
            return $simpan;
        } else {
            return false;
        }
    }

    function cekNisn($nisn)
    {
        $this->query = "SELECT * FROM user WHERE nisn = '$nisn'";
        $cek = $this->conn->query($this->query);
        if (mysqli_num_rows($cek) > 0) {
            return true;
        } else {
            return false;
        }
    }

    function Login($nisn, $password)
    {
        $this->query = "SELECT * FROM user WHERE nisn = '$nisn' AND password='$password'";
        $cek = $this->conn->query($this->query);
        return $cek;
    }
    function Akun()
    {
        $this->query = "SELECT user.nisn, user.password, siswa.nama FROM user INNER JOIN siswa ON user.nisn=siswa.nisn WHERE user.level ='siswa' ORDER BY nisn ASC";
        $read = $this->conn->query($this->query);
        return $read;
    }

    function delete($nisn)
    {
        $this->query = "DELETE FROM raport WHERE nisn = $nisn";
        $raport = $this->conn->query($this->query);
        if ($raport) {
            $this->query = "DELETE FROM siswa WHERE nisn = $nisn";
            $siswa = $this->conn->query($this->query);
            if ($siswa) {
                $this->query = "DELETE FROM siswa WHERE nisn = $nisn";
                $akun = $this->conn->query($this->query);
                return true;
            }
        }
    }
    function detailAkun($nisn)
    {

        $this->query = "SELECT * FROM siswa WHERE nisn = '$nisn'";
        $cek = $this->conn->query($this->query);
        return mysqli_fetch_assoc($cek);
    }

    function changePwd($nisn, $newPassword)
    {
        $this->query = "UPDATE user SET password= $newPassword WHERE nisn = '$nisn'";
        $simpan = $this->conn->query($this->query);
        return $simpan;
    }
}
