<?php 
include "koneksi.php";

$get = $_GET['id'];
mysqli_query($koneksi, "DELETE from data_pencarian where kode_pencarian='$get'");
mysqli_query($koneksi, "DELETE from data_toko where kode_pencarian='$get'");
mysqli_query($koneksi, "DELETE from data_produk where kode_pencarian='$get'");

?>
<meta http-equiv="refresh" content="0.001;url=http://localhost/appcheck/admin/index.php?page=data-pencarian">