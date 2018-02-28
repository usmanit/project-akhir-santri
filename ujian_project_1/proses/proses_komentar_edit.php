<?php
	session_start();
	if(isset($_SESSION['login'])) {
		
		// $connect = mysqli_connect("localhost", "root", "", "pondok_dua");
		include 'koneksi.php';
		
		$nama = isset($_POST['nama']) ? $_POST['nama'] : '';
		// $email = isset($_POST['email']) ? $_POST['email'] : '';
		$isi = isset($_POST['isi']) ? md5($_POST['isi']) : '';
		$artikel    = $_SESSION['blog_artikel'];
		// $tanggal    = date('Y-m-d H:i:s');
		$id = isset($_POST['id']) ? $_POST['id'] : '';
		
		if (!empty($nama) && !empty($email)) {
			
			if (!empty($komentar)) {
				mysqli_query($connect, "
					UPDATE komentar
					SET nama = '$nama', isi = '$isi' WHERE id = '$id'
				");
			} else {
				mysqli_query($connect, "
					UPDATE komentar
					SET nama = '$nama'
					WHERE id = '$id'
				");
			}
			
			header("location:../komentar.php");
			
		} else {
			echo "Silahkan Lengkapi Data <a href='../komentar_tambah.php'>User</a>";
		}
 	} else {
		echo "Please <a href='../index.php'>Login</a> First.";
	}
?>