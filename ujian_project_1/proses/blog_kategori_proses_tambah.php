<?php
session_start();
if (isset($_SESSION['login'])) {

	// $connect = mysqli_connect("localhost", "root", "123", "pondok_it");
	include 'koneksi.php';
	
	$nama    = isset($_POST['nama']) ? $_POST['nama'] : '';
	$status   = isset($_POST['status']) ? $_POST['status'] : '';

	if (!empty($nama)) {

		mysqli_query($connect, "INSERT INTO blog_kategori VALUES (null,'$nama', '$status')");

		header("location:../blog_kategori.php");

	} else {

		echo "Silahkan lengkapi data <a href='../blog_kategori_tambah.php'>Blog Kategori</a>";

	}


} else {

  	echo "Please <a href='../index.php'>login</a> first.";

}
?>