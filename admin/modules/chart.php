<?php
// header("Content-type:application/json");
 
//koneksi ke database
$connection = mysqli_connect("localhost", "root", "", "cekshop") or die("Error " . mysqli_error($connection));

$keyword = $_POST['keyword'];
// $keyword = 'kemeja pria';
 
//menampilkan data dari database, table tb_anggota
// $sql = "SELECT * FROM `data_produk` LEFT JOIN `data_toko` ON data_produk.kode_pencarian = data_toko.kode_pencarian";
$asli = mysqli_query($connection,"SELECT * FROM data_toko JOIN data_pencarian ON data_toko.kode_pencarian = data_pencarian.kode_pencarian where status='Asli' and keyword='$keyword'");
$cek1 = mysqli_num_rows($asli);

$rating_baik = mysqli_query($connection,"SELECT * FROM data_toko JOIN data_pencarian ON data_toko.kode_pencarian = data_pencarian.kode_pencarian where status='Rating Baik' and keyword='$keyword'");
$cek2 = mysqli_num_rows($rating_baik);


// ini yang asli
// $rating_normal = mysqli_query($connection,"SELECT * FROM data_toko JOIN data_pencarian ON data_toko.kode_pencarian = data_pencarian.kode_pencarian where status='Rating Normal' and keyword='$keyword'");
// $cek3 = mysqli_num_rows($rating_normal);

$palsu = mysqli_query($connection,"SELECT * FROM data_toko JOIN data_pencarian ON data_toko.kode_pencarian = data_pencarian.kode_pencarian where status='Palsu' and keyword='$keyword'");
$cek4 = mysqli_num_rows($palsu);

// $array = array($cek1, $cek2, $cek3, $cek4);
// echo json_encode($array);

// echo "[".$cek1.", ".$cek2.", ".$cek3.", ".$cek4."]";
// echo $cek1." ".$cek2." ".$cek3." ".$cek4; ini yg asli

echo $cek1." ".$cek2." ".$cek4;


//tutup koneksi ke database
mysqli_close($connection);
?>