	<?php
	include 'koneksi.php';
	
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	if (!empty($email) && !empty($password)) {
		$sql = mysqli_query($connect, "SELECT * FROM author WHERE email = '$email' AND password = '$password'");
		$result = mysqli_num_rows($sql);
		if ($result) {
			$row = mysqli_fetch_array($sql);
			session_start();
			$_SESSION['login'] = true;
			$_SESSION['email'] = $email;
			$_SESSION['nama'] = $row['nama'];
			$_SESSION['author_id'] = $row['id'];
			header("location:../home.php");
		} else {
			echo "Email dan Password Salah";
		}
	} else {
		echo "Email dan Password anda Kosong, Silahkan Diisi.";
	} 
?>