<?php
$conn = new mysqli('localhost', 'root', '', 'cekshop');
// $nama = $_POST['nama'];
$keyword = $_POST['keyword'];
$jumlah = $_POST['jumlah'];
$waktu = date('Y-m-d H:i:s');

if (!empty($keyword) and !empty($jumlah)) {
	$sql = $conn->query("SELECT keyword from data_pencarian where keyword='$keyword'");
	$cek = mysqli_num_rows($sql);

	if ($cek > 0) {
		$kode_pencarian = $conn->query("SELECT * from data_pencarian where keyword='$keyword'")->fetch_assoc()['kode_pencarian'];
		// echo "Data sudah ada, apakah ingin mengganti dengan yang baru?";
		$conn->query("DELETE from data_toko where kode_pencarian='$kode_pencarian'"); // delete data toko
		$conn->query("DELETE from data_produk where kode_pencarian='$kode_pencarian'"); // delete data produk
		$conn->query("DELETE from data_pencarian where keyword='$keyword'"); // delete data pencarian
		$conn->query("INSERT INTO `data_pencarian` ( `keyword`, `jumlah`, `waktu`) VALUES ('$keyword', '$jumlah', '$waktu')"); //insert data
	}else{
		echo "Mohon tunggu beberapa saat, data akan diambil.";
	// $query = "INSERT INTO `data_pencarian` ( `keyword`, `jumlah`, `nama_user`) VALUES ('$keyword', '$jumlah', '$nama')";
		$query = "INSERT INTO `data_pencarian` ( `keyword`, `jumlah`, `waktu`) VALUES ('$keyword', '$jumlah', '$waktu')";
		$conn->query($query);
	// if ($conn->query($query) === TRUE) {
	// 	// echo "data inserted";
	// }
	// else 
	// {
	// 	// echo "failed";
	// }
	}
}






?>