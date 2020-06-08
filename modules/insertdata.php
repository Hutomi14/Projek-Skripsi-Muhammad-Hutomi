<?php
$conn = new mysqli('localhost', 'root', '', 'cekshop');
// $nama = $_POST['nama'];
$kode_pencarian = $conn->query("SELECT * from data_pencarian ORDER BY kode_pencarian DESC LIMIT 1")->fetch_assoc()['kode_pencarian'];
$shopid = $_POST['shopid'];
$nama_toko = $_POST['nama_toko'];
$jumlah_produk = $_POST['jumlah_produk'];
$lokasi_toko = $_POST['lokasi_toko'];
$rating_toko = $_POST['rating_toko'];
$pemilik_toko = $_POST['pemilik_toko'];
$rating_baik = $_POST['rating_baik'];
$rating_normal = $_POST['rating_normal'];
$rating_buruk = $_POST['rating_buruk'];
$following = $_POST['following'];
$follower = $_POST['follower'];
$status = $_POST['status'];
$response_rate = $_POST['response_rate'];

$pengiriman = $_POST['pengiriman'];

$itemid = $_POST['itemid'];
$nama_produk = $_POST['nama_produk'];
$harga_produk = $_POST['harga_produk'];
$produk_terjual = $_POST['produk_terjual'];
$status_produk = $_POST['status_produk'];
$rating_produk = $_POST['rating_produk'];
$ratingdgnfoto = $_POST['ratingdgnfoto'];
$ratingdgntext = $_POST['ratingdgntext'];
$jumlah_penilai = $_POST['jumlah_penilai'];
$bintang1 = $_POST['bintang1'];
$bintang2 = $_POST['bintang2'];
$bintang3 = $_POST['bintang3'];
$bintang4 = $_POST['bintang4'];
$bintang5 = $_POST['bintang5'];
$gambar_produk = $_POST['gambar_produk'];

$toko = "INSERT INTO data_toko (shopid, kode_pencarian, nama_toko, jumlah_produk, lokasi_toko, rating_toko, pemilik_toko, rating_baik, rating_normal, rating_buruk, following, follower, pengiriman, response_rate, status) VALUES ('$shopid', '$kode_pencarian', '$nama_toko', '$jumlah_produk', '$lokasi_toko', '$rating_toko', '$pemilik_toko', '$rating_baik', '$rating_normal', '$rating_buruk', '$following', '$follower', '$pengiriman', '$response_rate', '$status')";
$conn->query($toko);
	
$produk = "INSERT INTO data_produk (itemid, shopid, kode_pencarian, nama_produk, harga_produk, produk_terjual, status_produk, rating_produk, ratingdgnfoto, ratingdgntext, jumlah_penilai, bintang1, bintang2, bintang3, bintang4, bintang5, gambar_produk) VALUES ('$itemid', '$shopid', '$kode_pencarian','$nama_produk', '$harga_produk', '$produk_terjual', '$status_produk', '$rating_produk', '$ratingdgnfoto', '$ratingdgntext', '$jumlah_penilai', '$bintang1', '$bintang2', '$bintang3', '$bintang4', '$bintang5', '$gambar_produk')";
$conn->query($produk);
?>