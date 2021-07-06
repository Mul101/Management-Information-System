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
    $tgl = htmlspecialchars($data['tgl_jual']);
    $nama = htmlspecialchars($data['nama_jenis']);
    $jml = htmlspecialchars($data['jml_penjualan']);
    $hrg = htmlspecialchars($data['hrg_jual']);    

    $query = "INSERT INTO penjualan
                VALUES
                ('','$tgl','$nama','$jml','$hrg')
            ";
    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
}

function hapus($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM penjualan WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function ubah($data){
    global $conn;

    $id = $data["id"];
    $tgl = htmlspecialchars($data['tgl_jual']);
    $nama = htmlspecialchars($data['nama_jenis']);
    $jml = htmlspecialchars($data['jml_penjualan']);
    $hrg = htmlspecialchars($data['hrg_jual']);

    $query = "UPDATE penjualan SET 
                tgl_jual = '$tgl',
                nama_jenis = '$nama',
                jml_penjualan = '$jml',
                hrg_jual = '$hrg'
              WHERE id = $id
            ";
    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
}
function login($data){
    global $conn;
    $username = strtolowerstriplashes($data["name"]);
    $password = mysqli_real_excape_string($data["password"]);
}

?>