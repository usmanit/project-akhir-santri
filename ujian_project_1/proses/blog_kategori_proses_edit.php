<?php
session_start();
if (isset($_SESSION['login'])) {

	// $connect = mysqli_connect("localhost", "root", "123", "pondok_it");
	include 'koneksi.php';
	
	$nama    = isset($_POST['nama']) ? $_POST['nama'] : '';
	$status  = isset($_POST['status']) ? $_POST['status'] : '';
	
	$id = isset($_POST['id']) ? $_POST['id'] : '';

	if (!empty($nama)) {

		mysqli_query($connect, "
			UPDATE blog_kategori 
			SET nama = '$nama', status = '$status'
			WHERE id = '$id'
			");

		header("location:../blog_kategori.php");

	} else {

		echo "Silahkan lengkapi data <a href='../blog_kategori_tambah.php'>santri</a>";

	}


} else {

  	echo "Please <a href='../index.php'>login</a> first.";

}
?>