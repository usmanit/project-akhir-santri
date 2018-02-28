<?php
session_start();
if (isset($_SESSION['login'])) {

	// $connect = mysqli_connect("localhost", "root", "123", "pondok_it");
	include 'koneksi.php';
	
	$judul    = isset($_POST['judul']) ? $_POST['judul'] : '';
	$kategori  = isset($_POST['kategori']) ? $_POST['kategori'] : '';
	$isi  = isset($_POST['isi']) ? $_POST['isi'] : '';
	$status = isset($_POST['status']) ? $_POST['status'] : '';
	
	$id   = isset($_POST['id']) ? $_POST['id'] : '';

	$tanggal_input 	= date('Y-m-d H:i:s');
	$user_id 		= $_SESSION['author_id'];

	if (!empty($judul) && !empty($kategori) && !empty($isi)) {

		mysqli_query($connect, "
			UPDATE blog_artikel 
			SET judul = '$judul', kategori_id = '$kategori', isi = '$isi', status = '$status', tanggal = '$tanggal_input', user_id = '$user_id'
			WHERE id = '$id'
			");

		header("location:../blog_artikel.php");

	} else {

		echo "Silahkan lengkapi data <a href='../blog_kategori_tambah.php'>Artikel</a>";

	}


} else {

  	echo "Please <a href='../index.php'>login</a> first.";

}
?>