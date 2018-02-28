<?php
	
	function penulis($id)
	{
		include 'proses/koneksi.php';
		$sql = mysqli_query($connect, "SELECT * FROM author WHERE id = $id");
		$row = mysqli_fetch_array($sql);
		
		return $row['nama'];
	}
	
	function kategori($id)
	{
		include 'proses/koneksi.php';
		$sql = mysqli_query($connect, "SELECT * FROM blog_kategori WHERE id = $id");
		$row = mysqli_fetch_array($sql);
		
		return $row['nama'];
	}
	
?>