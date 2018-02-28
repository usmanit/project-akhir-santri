<?php 
	include 'fungsi/config.php';
	$rowArtikel = detailArtikel($_GET['id']);
	$rowKomentar = tampilKomentar($_GET['id']);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Desktop project pertama</title>
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet"> 
	<link rel="stylesheet" type="text/css" href="css&jquery/Post-Desktop.css">
	 <link href="css/font-awesome.min.css" rel="stylesheet" />
	  <link href="css/font-awesome.css" rel="stylesheet" />
	 <link href="css/flexslider.css" rel="stylesheet" />
	 <link href="https://fonts.googleapis.com/css?family=Myriad+Pro" rel="stylesheet"> 
	 <script type="text/javascript" src="css&jquery/jquery-3.2.1.min.js"></script>
	 <script type="text/javascript" src="css&jquery/validasi.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $("#form").validate(); //id form
});
</script>
	 <script src="css&jquery/jquery-3.2.1.min.js"></script>
	 <script> 
	$(document).ready(function(){
		$(".muncul-a").click(function(toggle){
			$(".menu-dropdown").slideToggle("slow");
			$(".header").hide();
			$("#footer").hide();
			$(".main").hide();
			$("#main-gambar-text").hide();
			$(".menu-dropdown").show();
			$(".delete").show();
			$(".img1").hide();


		});
		$(".delete").click(function(){
			$(".header").show();
			$("#footer").show();
			$(".main").show();
			$("#main-gambar-text").show();
			$(".menu-dropdown").hide();
			$(".delete").hide();
			
	});
		$(".cari").click(function(){
			$(".cari-toggle").slideToggle();
		});

		$(".sibmit").click(function(){
			$(".cari-toggle").hide();
			$(".Submit").hide();
		});
		$(".textarea-1").click(function(){
			$(".komentar-dropdown").slideToggle();
			
		});
		$(".cari-footer1").click(function(){
			$(".cari-footer").slideToggle();
		});

});
	$(document).ready(function(){
    $(".textarea-1").click(function(){
        $(".garis").animate({top: '250px'});
    });
});
</script>
  <?php
	
	include 'proses/koneksi.php';
	include 'function/library.php';
   ?>
</head>
<body>
	<div id="container">
			<div class="menu-dropdown">
				<ul>
					<li  class="delete"><i class="fa fa-remove"></i></li>
				</ul>
			 	  <ul>
			        <li><a href="#">HOME</a></li>
			        <hr>
			        <li><a href="#">ABOUT</a></li><hr>
			        <li><a href="#">HRCHIVE</a></li><hr>
			        <li><a href="#">CONTACT</a></li> <hr>
			     	
			     </ul>	
		</div>
		<div class="wrapper clearfix">
			<div class="header">
				  <div class="logo">
			     	<p>Al-Wahdah</p>
			   	 </div>

			    <div class="menu">
			      <ul>
			        <li class="a1"><a href="index.php">HOME</a></li>
			        <li class="a1"><a href="#">ABOUT</a></li>
			        <li class="a1"><a href="#">HRCHIVE</a></li>
			        <li class="a1"><a href="#">CONTACT</a></li> 

			        <li  class="muncul-a"><a href="#"><i class="fa fa-navicon" style=" color: black; font-size:26px"></i></a></li>

			     	<li class="cari"><a href="#"><i class="fa fa-search" style="color: black; " aria-hidden="true"></i></a></li>
			     </ul>
			     	 <div class="cari-toggle">
			   	 		<form action="index.php" method="get">
			   	 			<input type="text" name="cari" placeholder="Cari Sekaran" required>
			   	 		 <button class="Submit" style="cursor: pointer;" type="Submit" value="cari">Submit</button>	
			   	 		</form>
			   	 		
					</div>	
		 	</div>
		 		<?php
					include 'proses/koneksi.php';
				
					if(isset($_GET['cari'])){
						$cari = $_GET['cari'];
						$sql = mysqli_query($connect, "SELECT * FROM blog_artikel WHERE judul LIKE '%$cari%' OR isi LIKE '%$cari%' ORDER BY id DESC");
							} else {
								$sql = mysqli_query($connect, "SELECT * FROM blog_artikel ORDER BY id DESC");
							}
				?>
			</div>


		</div>

		<div class="wrapper clearfix">
		
						<?php 

						while ($row = mysqli_fetch_array($sql)) {
										
				  		 $sql = mysqli_query($connect, "SELECT * FROM blog_artikel WHERE id = $_GET[id]");
				  			$row = mysqli_fetch_array($sql);

		  				?>
			<div class="main">
					 
				<img src="gambar/<?php echo $row['gambar']?>" width="100%" height="50%"><br><br>
				<button class="main-button"><?= kategori ($row['kategori_id']) ?></button>
				<div class="tengah_main"><br>
					<p class="p-main1"><?= date('F d, Y') ?></p>
					<p class="p-main2"><?= $row['judul'] ?></p>
					<hr class="hr-1">
					<p class="p-main3"><?= $row['isi'] ?></p>
					<br><br>
					 <a href="index.php" style="color: #1bcb86; text-decoration: none;"><p class="p-main5">#Yosemite   #Peak   #Explorer </p></a>							<hr style="margin-bottom: 5%; color: #ffffff; border: none;">	  	
					  	  <div class="komentar">
				            	<span style="color: blue; font-size: 15px; font-family: lato;"><?= jumlahKomentar($row['id']) ?> Comment</span>
				          		<form method="post" id="form">
										<div>
											<input type="nama" name="nama" class="required" id="nama" placeholder="nama...">
										</div>
										<div>
											<input type="email" name="email" class="required email" placeholder="Email..." id="email" required>
										</div>
										<div>
											<input type="text" name="telepon" class="required" title="gy6hgb" placeholder="Nomor Telepon..." id="telepon" required>
										</div>
										<div>
											<textarea type="isi" name="isi"  class="required" placeholder="Posta Comment..." id="isi" ></textarea>
										</div>
										<div>
											<input type="submit" name="btnkomen" class="submit" placeholder="SUBMIT">
										</div>
										<div class="garis3" style="border: 1px dashed #d9d9d9; margin-bottom: 3%;"></div>
										
									</form>	
							<?php 
								if (isset($_POST['btnkomen'])) {
									postKomentar($_POST, $_GET['id']);
									echo "<meta http-equiv='refresh' content='1.5;url=Post.php?id=".$rowArtikel['id']."'>";
								}
							?>
						    </div>
						       
			           			<?php foreach ($rowKomentar as $row): ?>	
			                <div class="text" style="float: left;">
				             	<img src="gambar/orang.png" class="gambar-koment">			             	
				               	<p style="padding-left: 12%;"><?= $row['nama'] ?></p>
								<h6 style="padding-left: 12%;"><?= $row['isi'] ?></h6>
								<h6 style="padding-left: 12%;"><?= $row['email'] ?></h6>
								<h6 style="padding-left: 12%;"><?= $row['telepon'] ?></h6>
			               </div>	
			               	<?php endforeach ?>
						
			    			<br> 
				            <div id="success"></div>
				        <form class="from-coment" method="post" >
				            <div class="from1">
				            	 <a href="#"> <button type="text3" class="btnbtn-primary" name="tampilKomentar">Post Comment</button></a>
				            </div>
				        </form>
				    
			        </div>
			        	
	          </div>
	          <?php
	     		 }
	          ?>
          </div>
		<style type="text/css">
				         	#nama:focus, #email:focus, #telepon:focus, #textarea1:focus{
				         		border: 3px solid #5E4F4F;
				         	}
				         	#form::-webkit-input-placeholder{
								color: red;
								}
 
				         	#nama {

				         		margin-top: 3%;
				         		display: none;
				         		border: 3px solid #e6e6e6;
				         		border-radius: 5px;
				         		width: 50%;
				         		padding:2% 0 2% 1%;
				         		margin-bottom: 2%;
				         	}
				         	#email {
				         		display: none;
				         		width: 50%;
				         		border: 3px solid #e6e6e6;
				         		border-radius: 5px;
				         		padding:2% 0 2% 1%;
				         		margin-bottom: 2%;
				         	}
				         	#telepon {
				         		display: none;
				         		width: 50%;
				         		border: 3px solid #e6e6e6;
				         		border-radius: 5px;
				         		padding:2% 0 2% 1%;
				         		margin-bottom: 2%;
				         	}
				         	#isi {
				         		border: 3px solid #e6e6e6;
				         		border-radius: 5px;
				         		width: 70%;
				         		padding:2% 0 2% 1%;
				         		margin-bottom: 3%;
				         		margin-top: 3%;
				         	}

				         	.submit {
				         		padding:1% 2% 1% 2%; 
				         		border: none;
				         		background: #13a499;
				         		border-radius: 5px;
				         		margin-bottom: 3%;
				         		font-family: lato;

				         	}
				         	.submit:hover {
				         		padding:1% 2% 1% 2%; 
				         		border: none;
				         		background: #106845;
				         		border-radius: 5px;
				         		margin-bottom: 3%;
				         		font-family: lato;
				         		font-size: 102%;
				         		color: #fff;
				         		cursor: pointer;

				         	}
				         	
				         </style>
				            	
							<script type="text/javascript">
								$(document).ready(function(){
								$("#isi").click(function(){
								$("#nama").slideToggle();
			
									});
								$("#nama").click(function(){
								$("#email").slideToggle();
			
								});

								$("#email").click(function(){
								$("#telepon").slideToggle();
			
								});
							});
						</script>	

			<div id="footer">
			<p>Al-Wahdah</p>
				<div class="menu-f">
				      <ul class="menu-footer-1">
				        <li><a href="#">HOME</a></li>
				        <li><a href="#">ABOUT</a></li>
				        <li><a href="#">HRCHIVE</a></li>
				        <li><a href="#">CONTACT</a></li> 
				       
				     	<li class="cari-footer1"  style="color: #fff; cursor: pointer;"><i class="fa fa-search" aria-hidden="true"></i>

				     	</li>
				     	<dir class="cari-footer">
			   	 		<form>
			   	 			<input type="text" name="cari" placeholder="Cari Sekaran" required>
			   	 		 <a href="#"><button>Submit</button></a>
			   	 		</form>
					</dir>
				     </ul>
				     <hr style="max-width: 70%; height:2px; background: #5765b5; border: none; margin: 48px 0px 48px 322px; margin: auto;">	

				     <h6 class="p-footer">
				     	Nunc placerat dolor at lectus hendrerit dignissim. Ut tortor sem, consectetur nec hendrerit ut, ullamcorper ac odio. Donec viverra ligula at quam tincidunt imperdiet. Nulla mattis tincidunt auctor.
				     </h6>

				      <hr class="hr-b" style="max-width: 80%; height:2px; background: #5765b5; border: none; margin:auto; margin-top: 41px; margin-bottom: 30px; ">
				       <h6 class="p-footer1">@2018-Al-wahdah.All Rights Reserved</h6>	

				       <ul class="icon">
				       	<li><a href="#"><i class="fa fa-facebook-official" aria-hidden="true"></i></a></li>
				       <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
				       <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
				       <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
				       </ul>
			 	</div>
			</div>	
		
	</div>

</body>
</html>
