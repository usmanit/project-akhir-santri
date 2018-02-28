<?php
session_start();
if(isset($_SESSION['login'])) {
  header("location:home.php");
} else {
?>
<!DOCTYPE html>
<html>
<head>
	<title>login project</title>
	 <link href="css/font-awesome.css" rel="stylesheet" />
	 <link href="css/flexslider.css" rel="stylesheet" />
	
	<script type="text/javascript" src="css&jquery/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="css&jquery/validasi.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $("#form").validate(); //id form
});
</script>
</head>
<style type="text/css">
	body {
		background-image: url(gambar/img1.jpg);
		background-size: 100%;
	}
	.content {
		margin-top: 80px;
		border-radius: 10px;
		margin: auto;
		background:#1f1f1f;opacity:1.3;
		width: 270px;
		box-shadow: 7px 7px 5px;
			
   		}
	.header{
		border-radius: 10px 10px;
		background:#191919;opacity:1.3;
		border-bottom: 52px;
		margin-top: 100px;
		box-shadow: 3px 0px 3px;
	}
	.header h6 {
		font-size: 15px;
		color: #ffffff;
		text-align: center;
		font-family: lato;
		padding: 10px;
	}
	input {
		color: #ffffff;
	}
	input {
		border-color: #363636;
		margin-top: 20px;
		padding: 10px;
		background:#141414;
		border: 1px solid #363636;
   		 margin: 5px auto;
   		 border-radius: 5PX;

	}
	
	p {
		margin-left: 60px;
		color: #969FA1;
		font-family: lato;

	}
	button {
		border-color: #43CCBE;
		border-radius: 5px;
		border: 1px solid #51B8AE;
   		margin: 5px auto;
   		font-family: lato;
		padding: 5px 50px 5px 50px;
		margin: center;
		background:#339F92;
		margin-bottom: 20px;
		color: #ffffff;
		cursor: pointer;
		box-shadow: 3px 0px 3px; color: #000;
		margin-left: 70px;
	}
	.p1 {
		color: #969FA1;
		padding-bottom: 20px;
	}
	 label {
	 	padding-left: 15px;
	 	padding-top: 15px;
	 	float: left;
	 	font-family: lato;
	 	color: #ffffff;
	 }
	 .label1 span {
	 	padding-right: 5px;
	 }
	 .label2 {
	 	padding-right: 5px;
	 	padding-top: 20px;
	 	font-size: 13px;
	 }
	 .eror {
	 	color: red;
	 }
</style>

<body>
<div class="container">
	<div class="content">
		
		<form action="proses/proses_login.php" method="post" class="cmxform" id="form">
			<div class="header">
					<h6>User Login</h6>
				</div>
						<label for="email" class="label1">
							<span>Email</span>
						</label>
						<input type="email" name="email" class="required email" >
							
						<label for="password" class="label2">
							<span>Password</span>
						</label>
						<input type="password" name="password" id="password" class="required password">		
							
				<button type="submit" class="submit">Sign In</button> 
		</form>
	</div>
</div>
</body>
</html>
<?php 
}
?>
