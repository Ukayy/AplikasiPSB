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
$status = $detail['status'];
$alamat = $detail['alamat'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="text-center">
        <h2>Bukti Pendaftaran </h2>

        <table border="1">
            <tr>
                <td>
                    Nama
                </td>
                <td class="col-1">
                    :
                </td>
                <td>
                    <?= $nama;  ?>
                </td>
            </tr>
            <tr>
                <td>
                    Jenis Kelamin
                </td>
                <td class="col-1">
                    :
                </td>
                <td>
                    <?= $jenis_kelamin;  ?>
                </td>
            </tr>
            <tr>
                <td>
                    Tampat Tanggal Lahir
                </td>
                <td class="col-1">
                    :
                </td>
                <td>
                    <?= $tempat_lahir . ", " . date('d F Y', strtotime($tgl_lahir));  ?>
                </td>
            </tr>
            <tr>
                <td>
                    Alamat
                </td>
                <td class="col-1">
                    :
                </td>
                <td>
                    <?= $alamat;  ?>
                </td>
            </tr>
            <tr>
                <td>
                    Status
                </td>
                <td class="col-1">
                    :
                </td>
                <td>
                    <?= $status;  ?>
                </td>
            </tr>
        </table>
    </div>

    <script>
        window.print();
    </script>

</body>

</html>