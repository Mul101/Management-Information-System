<?php
session_start();
if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}

require 'functions2.php';
$id = $_GET["id"];
$dataj = query("SELECT * FROM pembelian WHERE id = $id")[0];


if (isset($_POST["submit"])) {
    
    if(ubah($_POST)>0) {
        echo "
            <script>
                alert('data berhasil diubah!');
                document.location.href = 'pencatatanpembelian.php';
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
    <h2 class="judul" align = "center">Ubah Data Pembelian</h2>
    <form action="" method="post">
        <input type = "hidden" name = "id" value = "<?= $dataj["id"]; ?>">
        <table>
            <tr>
                <td><label for="tgl_bel">Tanggal Transaksi: </label></td>
                <td><input type="date" name="tgl_beli" id="tgl_beli" required value="<?= $dataj["tgl_beli"]; ?>"></td>
            </tr>
            <tr>
                <td><label for="nama_bahan">Nama Bahan: </label></td>
                <td><input type="text" name="nama_bahan" id="nama_bahan" required value="<?= $dataj["nama_bahan"]; ?>"></td>
            </tr>
            <tr>
                <td><label for="jml_beli">Jumlah Beli: </label></td>
                <td><input type="text" name="jml_beli" id="jml_beli" required value="<?= $dataj["jml_beli"]; ?>"></td>
            </tr>
            <tr>
                <td><label for="hrg_tot">Harga Total: </label></td>
                <td><input type="text" name="hrg_tot" id="hrg_tot" required value="<?= $dataj["hrg_tot"]; ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit" name="submit">Save</button></td>
            </tr>
        </table>
    </form>
</body>
</html>

