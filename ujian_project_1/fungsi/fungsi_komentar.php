<?php 

function jumlahKomentar($idArtikel)
{
	global $conn;

	$query = "SELECT * FROM komentar WHERE artikel = '$idArtikel' ";
	$res = mysqli_query($conn, $query);

	$row = mysqli_num_rows($res);

	return $row;
}

function tampilKomentar($idArtikel)
{
	global $conn;
 
	$query = "SELECT * FROM komentar WHERE artikel = '$idArtikel' ";
	$res = mysqli_query($conn, $query);

	while ($rows = mysqli_fetch_assoc($res)) {
		$row[] = $rows;
	}

	return $row;
}

function postKomentar ($data, $idArtikel)
{
	global $conn;

	$nama = $data['nama'];
	$email = $data['email'];
	$telepon = $data['telepon'];
	$isi = $data['isi'];
	
	$query = "INSERT INTO komentar VALUES (null,'$idArtikel','$nama','$email','$telepon','$isi')";


	if (mysqli_query($conn, $query)) {
		echo "komentar sukses";
	}

}