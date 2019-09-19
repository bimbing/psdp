<div class="main-menu">
	<ul id="menu-bawah" class="menu"><li id="menu-item-9" class="menu-item  menu-item-type-custom  menu-item-object-custom"><a href="home.mu">Home Page</a></li>
		<li id="menu-item-40" class="menu-item  menu-item-type-post_type  menu-item-object-page"><a href="page-cara-berlangganan-epaper-singgalang.mu">CARA BERLANGGANAN E-PAPER</a></li>
		<li id="menu-item-39" class="menu-item  menu-item-type-post_type  menu-item-object-page"><a href="page-informasi-terbaru-tentang-epaper-singgalang.mu">INFORMASI TENTANG E-PAPER</a></li>
		<?php 
			if ($_SESSION[nomor] == ''){
		?>
			<li id="menu-item-38" class="menu-item  menu-item-type-post_type  menu-item-object-page"><a href="hubungi-kami.mu">HUBUNGI KAMI</a></li>
		<?php }else{ ?>
			<li id="menu-item-38" class="menu-item  menu-item-type-post_type  menu-item-object-page"><a href="pesan-masuk.mu">PESAN MASUK <b style='color:#fff; border:1px solid #8a8a8a; background:red; padding:2px 7px 2px 7px; border-radius:7px; font-size:14px; position:none'><span id="responsecontainer"></span></b></a></li>
		<?php } ?>
		
		<?php 
			if ($_SESSION[nomor] == ''){
		?>
			<li id="menu-item-51" class="menu-item  menu-item-type-custom  menu-item-object-custom  menu-item-has-children"><a href="#">MEMBER AREA</a>
		<?php }else{ ?>
			<li id="menu-item-51" class="menu-item  menu-item-type-custom  menu-item-object-custom  menu-item-has-children"><a href="#">Welcome..! <?php echo "<span style='color:#fff'>$_SESSION[nama_depan]</span>"; ?></a>
		<?php } ?>
			<ul class="sub-menu"> 
				<?php 
					if ($_SESSION[nomor] == ''){
				?>
					<li id="menu-item-53" class="menu-item  menu-item-type-post_type  menu-item-object-page"><a href="pendaftaran.mu">DAFTAR</a></li>
					<li id="menu-item-52" class="menu-item  menu-item-type-post_type  menu-item-object-page"><a href="form-login.mu">MASUK</a></li>
				<?php }else{ ?>
					<li id="menu-item-53" class="menu-item  menu-item-type-post_type  menu-item-object-page"><a href="account.mu">SETTING ACCOUNT</a></li>
					<li id="menu-item-52" class="menu-item  menu-item-type-post_type  menu-item-object-page"><a href="langganan.mu">STATUS LANGGANAN</a></li>
					
					<?php if ($_SESSION[level] == 'Admin'){ ?>
					<li id="menu-item-53" class="menu-item  menu-item-type-post_type  menu-item-object-page"><a style='color:red !important' href="tambahkan-epaper.mu">TAMBAHKAN E-PAPER</a></li>
					<li id="menu-item-53" class="menu-item  menu-item-type-post_type  menu-item-object-page"><a style='color:red !important' href="list-langganan.mu">SEMUA PEMESANAN</a></li>
					<li id="menu-item-53" class="menu-item  menu-item-type-post_type  menu-item-object-page"><a style='color:red !important' href="statistik-pengunjung.mu">STATISTIK PENGUNJUNG</a></li>
					<li id="menu-item-53" class="menu-item  menu-item-type-post_type  menu-item-object-page"><a style='color:red !important' href="manage-hubungi.mu">KELOLA HUBUNGI KAMI</a></li>
					<?php } ?>
					
					<li id="menu-item-52" class="menu-item  menu-item-type-post_type  menu-item-object-page"><a href="logout.php">LOGOUT</a></li>
				<?php } ?>
			</ul> <!--End Sub Menu -->
		</li>
	</ul>
	<select id="main-menu-mob">
		<option value="#">Go to...</option>
		<option value="http://themes.tielabs.com/jarida/" selected="selected">&nbsp;Home</option>
		<option value="http://themes.tielabs.com/jarida/#">Post Head Modes </option>
		<option value="http://themes.tielabs.com/jarida/posts/48">Post With Featured Image</option>
	</select>
</div>