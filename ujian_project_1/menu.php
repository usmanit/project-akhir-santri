<?php

	$url = pathinfo(basename($_SERVER['SCRIPT_NAME']), PATHINFO_FILENAME);

?>
		
		<li class="header">MAIN NAVIGATION</li>
        <li <?= ($url == 'home') ? 'class="active"':'' ?>>
          <a href="home.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li <?= ($url == 'author' || $url == 'author_edit' || $url == 'author_tambah') ? 'class="active"':'' ?>>
          <a href="author.php">
            <i class="fa fa-user"></i> <span>Author</span>
          </a>
        </li>
         <li <?= ($url == 'komentar' || $url == 'komentar_edit' || $url == 'komentar_tambah') ? 'class="active"':'' ?>>
          <a href="komentar.php">
            <i class="fa fa-commenting"></i> <span>Komentar</span>
          </a>
        </li>
		<li class="treeview <?= ($url == 'blog_kategori' || $url == 'blog_kategori_edit' || $url == 'blog_kategori_tambah' || $url == 'blog_artikel' || $url == 'blog_artikel_edit' || $url == 'blog_artikel_tambah') ? 'active':'' ?>">
          <a href="#">
            <i class="fa fa-newspaper-o"></i>
            <span>Blog</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="blog_kategori.php"><i class="fa fa-circle-o"></i>Kategori</a></li>
            <li><a href="blog_artikel.php"><i class="fa fa-circle-o"></i>Artikel</a></li>
          </ul>
    </li>