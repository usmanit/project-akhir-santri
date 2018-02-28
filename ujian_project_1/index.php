
<!DOCTYPE html>
<html>
<head>
	<title>Desktop project pertama</title>
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet"> 
	<link rel="stylesheet" type="text/css" href="css&jquery/desktop.css">
	 <link href="css/font-awesome.min.css" rel="stylesheet" />
	  <link href="css/font-awesome.css" rel="stylesheet" />
	 <link href="css/flexslider.css" rel="stylesheet" />
	 <link href="https://fonts.googleapis.com/css?family=Myriad+Pro" rel="stylesheet"> 

	  <script src="css&jquery/jquery-3.2.1.min.js"></script>
	 <script> 
	$(document).ready(function(){
		$(".muncul-a").click(function(){
			$(".menu-dropdown").slideToggle("slow");
			$(".header").hide();
			$("#footer").hide();
			$(".main").hide();
			$("#main-gambar-text").hide();
			$(".menu-dropdown").show();
			$(".delete").show();
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

		$(".cari-footer1").click(function(){
			$(".cari-footer").slideToggle();
		});
});
</script>
</head>
<body>
	<div id="container">
			<div class="menu-dropdown">
				<ul>
					<li  class="delete"><i class="fa fa-remove" style="font-size:36px; color: #ffffff"></i></li>
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
			        <li class="a1"><a href="#">HOME</a></li>
			        <li class="a1"><a href="#">ABOUT</a></li>
			        <li class="a1"><a href="#">HRCHIVE</a></li>
			        <li class="a1"><a href="#">CONTACT</a></li> 

			        <li  class="muncul-a"><a href="#"><i class="fa fa-navicon" style=" color: black; font-size:26px"></i></a></li>

			     	<li class="cari"><a href="#"><i class="fa fa-search" style="color: black; " aria-hidden="true"></i></a></li>
			     </ul>	

			      <dir class="cari-toggle">
			   	 		<form action="index.php" method="get">
			   	 			<input type="text" name="cari" placeholder="Cari Sekaran" required oninvalid="this.setCustomValidity('Maaf tidak boleh kosong nanti rusakki')" oninput="setCustomValidity('')">
			   	 		 <button class="Submit" style="cursor: pointer;" type="Submit" value="cari">Submit</button>	
			   	 		</form>
										</dir> 	 
									 	</div>
										</div>
											 
									</div>
							
									<div class="wrapper clearfix">
							
										<?php
										
										include 'function/library.php';
										include 'proses/koneksi.php';
										if(isset($_GET['cari'])){
											$cari = $_GET['cari'];
											$sql = mysqli_query($connect, "SELECT * FROM blog_artikel WHERE judul LIKE '%$cari%' OR isi LIKE '%$cari%' ORDER BY id DESC");
										} else {
											$sql = mysqli_query($connect, "SELECT * FROM blog_artikel ORDER BY id DESC");
										}

										while ($row = mysqli_fetch_array($sql)) {
										
										?>
										<div class="main"> 
							 					<img src="gambar/<?php echo $row['gambar']?>" width="100%" height="50%">
												<button><?= kategori ($row['kategori_id']) ?></button>
											<div class="main-tengah">
												<p class="p-main1"><?= date('F d, Y') ?></p>
							
												<p class="p-main2"><?= $row['judul'] ?></p>
												<hr class="hr-1">
												<p class="p-main3"><?= $row['isi'] ?></p>
												
											
								              	<h2 class="post-title">
								              	<p class="p-main4">
								              		<a href="<?php echo 'Post.php?id='.$row['id']; ?>" style="color: #1bcb86; text-decoration: none;">Read More.....</a> 
								             	</p>
								         		 </h2>
								     		<p class="p-main5">#Yosemite   #Peak   #Explo rer </p>
											</div>
										</div>"
			<?php
			}
			?>
			
		</div>
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
</body>
</html>