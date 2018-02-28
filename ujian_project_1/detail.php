
<?php 
	include 'fungsi/config.php';
	$rowArtikel = detailArtikel($_GET['id']);
	$rowKomentar = tampilKomentar($_GET['id']);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>detail</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/bootsrap.min.css">
</head>
<style type="text/css">
	.from-group {
		width: 70%;
		background-color: #eee;
	}
	input, textarea {
		margin-bottom: 5%;
		width: 70%;
	}
</style>
<body>
<div class="container">
<p><?= $rowArtikel['judul'] ?></p>
	<h2><?= $rowArtikel['isi'] ?></h2>
	<hr>
	<!-- <p><?= $row['jumlah'] ?></p> -->
	<form method="post">
			<label style="padding-right: 5%;">nama</label>		
			<div class="from-group">
			
			<input type="text" name="nama" class="from-group" placeholder="nama">
		</div>
		<label>Isi komentar</label>
		<div class="from-group">
			
			<textarea name="isi" class="foom-control" rows="5" placeholder="komentar"></textarea>
		</div>
		<button class="button" type="submit" name="btnkomen">submit</button>
	</form>
	<?php 
		if (isset($_POST['btnkomen'])) {
			postKomentar($_POST, $_GET['id']);
			echo "<meta http-equiv='refresh' content='1.5;url=detail.php?id=".$rowArtikel['id']."'>";
		}
	?>
	<hr>
		<?php foreach ($rowKomentar as $row): ?>
	<div class="well">
		<p><?= $row['nama'] ?></p>
		<h6><?= $row['isi'] ?></h6>
	</div>
<?php endforeach ?>
	<button><a href="index.php">balik</a></button>
<script src="js/jquery.min.js"></script>
<script src="js/bootsrap.min.js"></script>
</body>
</html>
