<?php
	session_start();
	if (isset($_SESSION['login'])) {
		
		// $connect mysqli_connect("localhost", "root", "", "pondok_dua");
		include 'koneksi.php';
		
		$nama = isset($_POST['nama']) ? $_POST['nama'] : '';
		// $email = isset($_POST['email']) ? $_POST['email'] : '';
		$isi = isset($_POST['isi']) ? $_POST['isi'] : '';
		$artikel = isset($_POST['blog_artikel']) ? $_POST['blog_artikel'] : '';
		$tanggal    = date('Y-m-d H:i:s');
		if (!empty($nama) && !empty($email) && !empty($komentar)) {
			
			mysqli_query($connect, "INSERT INTO komentar VALUES (null, '$nama', '$komentar','$blog_artikel')");
			
			header("location:../komentar.php");
			
		} else {
			echo "Silahkan Lengkapi Data <a href='../komentar_tambah.php'>User</a>";
		}
		
	} else {
		echo "Please <a href='../login.php'>Login</a> First.";
	}
?>