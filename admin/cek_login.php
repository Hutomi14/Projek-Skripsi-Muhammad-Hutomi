<?php 
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'page/koneksi.php';

// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = sha1($_POST['password']);


// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi,"select * from data_admin where username='$username' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if($cek > 0){

	$data = mysqli_fetch_assoc($login);
	$_SESSION['username'] = $data['nama_user'];
	$_SESSION['level'] = "admin";
	$_SESSION['kode_user']= $data['kode_user'];

		// alihkan ke halaman dashboard admin
	header("location:index.php");

	// cek jika user login sebagai admin
	// if($data['level']=="admin"){

	// 	// buat session login dan username
	// 	$_SESSION['username'] = $data['nama_user'];
	// 	$_SESSION['level'] = "admin";
	// 	$_SESSION['kode_user']= $data['kode_user'];

	// 	// alihkan ke halaman dashboard admin
	// 	header("location:index.php");

	// // cek jika user login sebagai pegawai
	// }else if($data['level']=="pegawai"){
	// 	// buat session login dan username
	// 	$_SESSION['username'] = $username;
	// 	$_SESSION['level'] = "pegawai";
	// 	// alihkan ke halaman dashboard pegawai
	// 	header("location:halaman_pegawai.php");

	// // cek jika user login sebagai pengurus
	// }else if($data['level']=="pengurus"){
	// 	// buat session login dan username
	// 	$_SESSION['username'] = $username;
	// 	$_SESSION['level'] = "pengurus";
	// 	// alihkan ke halaman dashboard pengurus
	// 	header("location:halaman_pengurus.php");

	// }else{

	// 	// alihkan ke halaman login kembali
	// 	header("location:login.php?pesan=gagal");
	// }	
}else{
	header("location:login.php?pesan=gagal");
}

?>