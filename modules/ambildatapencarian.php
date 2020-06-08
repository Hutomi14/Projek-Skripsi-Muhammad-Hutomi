<?php
header("Content-type:application/json");
 
//koneksi ke database
$connection = mysqli_connect("localhost", "root", "", "cekshop") or die("Error " . mysqli_error($connection));
 
//menampilkan data dari database, table tb_anggota
// $sql = "SELECT * FROM `data_produk` LEFT JOIN `data_toko` ON data_produk.kode_pencarian = data_toko.kode_pencarian";
$sql = "SELECT * FROM data_toko LEFT JOIN data_produk ON data_toko.shopid = data_produk.shopid JOIN data_pencarian ON data_toko.kode_pencarian = data_pencarian.kode_pencarian";
$result = mysqli_query($connection, $sql) or die("Error " . mysqli_error($connection));
 
//membuat array
while ($row = mysqli_fetch_assoc($result)) {
    $ArrAnggota[] = $row;
}
$array = array('data'=>$ArrAnggota);
echo json_encode($array, JSON_PRETTY_PRINT);
 
//tutup koneksi ke database
mysqli_close($connection);
?>