<?php
session_start();

if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}

require 'functions.php';

$id = $_GET["id"];
$dataj = query("SELECT * FROM penjualan WHERE id = $id")[0];


if (isset($_POST["submit"])) {
    
    if(ubah($_POST)>0) {
        echo "
            <script>
                alert('data berhasil diubah!');
                document.location.href = 'pencatatanpenjualan.php';
            </script>
        ";
    }else{
        echo "
            <script>
                alert('data gagal diubah!');
            </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <link href="asa.css" rel="stylesheet" />
    </meta>
</head>
<body>
    <h2 class="judul" align = "center">Ubah Data Penjualan</h2>
    <form action="" method="post">
        <input type = "hidden" name = "id" value = "<?= $dataj["id"]; ?>">
        <table>
            <tr>
                <td><label for="tgl_jual">Tanggal Transaksi: </label></td>
                <td><input type="date" name="tgl_jual" id="tgl_jual" required value="<?= $dataj["tgl_jual"]; ?>"></td>
            </tr>
            <tr>
                <td><label for="nama_jenis">Nama Jenis: </label></td>
                <td><input type="text" name="nama_jenis" id="nama_jenis" required value="<?= $dataj["nama_jenis"]; ?>"></td>
            </tr>
            <tr>
                <td><label for="jml_penjualan">Jumlah Penjualan: </label></td>
                <td><input type="text" name="jml_penjualan" id="jml_penjualan" required value="<?= $dataj["jml_penjualan"]; ?>"></td>
            </tr>
            <tr>
                <td><label for="hrg_jual">Harga Jual: </label></td>
                <td><input type="text" name="hrg_jual" id="hrg_jual" required value="<?= $dataj["hrg_jual"]; ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit" name="submit">Save</button></td>
            </tr>
        </table>
    </form>
</body>
</html>

