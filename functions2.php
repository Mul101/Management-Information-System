<?php
$conn = mysqli_connect("localhost","root","","simkc");


function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data){
    global $conn;
    $tgl = htmlspecialchars($data['tgl_beli']);
    $nama = htmlspecialchars($data['nama_bahan']);
    $jml = htmlspecialchars($data['jml_beli']);
    $hrg = htmlspecialchars($data['hrg_tot']);

    $query = "INSERT INTO pembelian
                VALUES
                ('','$tgl','$nama','$jml','$hrg')
            ";
    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
}

function hapus($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM pembelian WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function ubah($data){
    global $conn;

    $id = $data["id"];
    $tgl = htmlspecialchars($data['tgl_beli']);
    $nama = htmlspecialchars($data['nama_bahan']);
    $jml = htmlspecialchars($data['jml_beli']);
    $hrg = htmlspecialchars($data['hrg_tot']);

    $query = "UPDATE pembelian SET 
                tgl_beli = '$tgl',
                nama_bahan = '$nama',
                jml_beli = '$jml',
                hrg_tot = '$hrg'
              WHERE id = $id
            ";
    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
}
?>