<?php
session_start();
error_reporting(0);
include "config/koneksi.php";
include "config/tanggal.php";
include "config/fungsi_seo.php";

$bts = mysql_fetch_array(mysql_query("SELECT * FROM rb_orders where id_members='$_SESSION[nomor]'"));

$tahun   = substr($bts['tanggal_batas'],0,4);
$bulan   = substr($bts['tanggal_batas'],5,2);
$tanggal = substr($bts['tanggal_batas'],8,2);
$jam1 = substr($bts['tanggal_batas'],11,2);
$jam2 = substr($bts['tanggal_batas'],14,2);
$jam3 = substr($bts['tanggal_batas'],17,2);
						
$sekarang = date('YmdHis');		
$batas = $tahun.''.$bulan.''.$tanggal.''.$jam1.''.$jam2.''.$jam3;
$hasil = $batas - $sekarang;
?>
<!DOCTYPE HTML>
<html>
<head>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script>
 $(document).ready(function() {
 	 $("#responsecontainer").load("response.php");
   var refreshId = setInterval(function() {
      $("#responsecontainer").load('response.php?randval='+ Math.random());
   }, 3000);
   $.ajaxSetup({ cache: false });
});
</script>
<title><?php include "title.php"; ?></title>
<link rel='stylesheet' id='tie-style-css'  href='asset/style0235.css?ver=4.1.1' type='text/css' media='all' />
<link rel='stylesheet' id='tie-style-css'  href='asset/style.css' type='text/css' media='all' />
<link rel='stylesheet' id='Oswald-css'  href='http://fonts.googleapis.com/css?family=Oswald%3Aregular%2C700&amp;ver=4.1.1' type='text/css' media='all' />
<script type="text/javascript" src="js/validasi.js"></script>
<script type="text/javascript" src="js/jquery-1.6.2.min.js"></script>
<script src="tinymcpuk/jscripts/tiny_mce/tiny_mce.js" type="text/javascript"></script>
<script src="tinymcpuk/jscripts/tiny_mce/tiny_phpmu.js" type="text/javascript"></script>	
	
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no" />
	<meta name="robots" content="index, follow">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="phpmu.com">
	<meta http-equiv="imagetoolbar" content="no">
	<meta name="language" content="Indonesia">
	<meta name="revisit-after" content="7">
	<meta name="webcrawlers" content="all">
	<meta name="rating" content="general">
	<meta name="spiders" content="all">
<link rel="shortcut icon" href="favicon.png" /> 
<script>
function confirmdelete(delUrl) {
   if (confirm("Apakah anda Yakin ?")) {
      document.location = delUrl;
   }
}
</script>
</head>
<body id="top" class="home blog">
												<div id='openModallimit' class='modalDialog'>
													<div>
														<a href='#close' title='Close' class='close'>X</a>
														<br><h2>Maaf, Paket Anda Habis!</h2><br>
														<p><pre>Silahkan Memperpanjang Kuota Paket Langganan 
E-paper anda <a style='color:blue; text-decoration:underline;' href='langganan.mu'>disini</a>, atau silahkan hubungi 
administrator Melalui Menu <a style='color:blue; text-decoration:underline;' href='pesan-masuk.mu'>Pesan Masuk</a>, 
Terima kasih,..</pre></p>
													</div>
												</div>
	<div class="background-cover"></div>
	<div class="wrapper layout-2c">
		<div class="top-nav fade-in animated1 ">
			<div class="container">
				<div class="search-block">
					<form method="POST" id="searchform" action="home.mu">
						<button class="search-button" type="submit" value="Search"></button>	
						<input type="text" id="s" name="cari" value="Search..." onfocus="if (this.value == 'Search...') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Search...';}"  />
					</form>
				</div><!-- .search-block /-->
				<div class="social-icons icon_flat">
					<a class="tooldown" title="Rss" href="feed/index.html" target="_blank"><i class="tieicon-rss"></i></a>	
				</div>
			</div>
		</div><!-- .top-menu /-->
				
<div class="container">	
		<header id="theme-header">
			<div style='margin-bottom:-15px' class="header-content fade-in animated1">
				<div class="logo">
				<h1>
					<a title="E-Paper Harian Singgalang" href="home.mu">
						<img src="images/logoo.png" alt="E-Paper Harian Singgalang" />
					</a>
				</h1>			
				</div><!-- .logo /-->
				<div class="ads-top"> 
					<a href="http://phpmu.com/" title="" target="_blank">
						<center><img style='margin-top:-10px;' src='images/home.jpg' width='95%' height='90px'></center>
					</a> 
				</div>
				
				<div class="clear"></div>
			</div>	
			<nav id="main-nav" class="fade-in animated2">
				<div class="container">				
					<?php include "menu.php"; ?>				
				</div>
			</nav><!-- .main-nav /-->
		</header><!-- #header /-->
	
<div id="main-content" class="container fade-in animated3">	
	<?php 
		include "content.php"; 
		if ($_GET[view]=='hubungi' OR $_GET[view]=='lihatdetailaccount' OR $_GET[view]=='detailaccount' OR $_GET[view]=='konfirmasi' OR $_GET[view]=='halaman' OR $_GET[view]=='pendaftaran' OR $_GET[view]=='login' OR $_GET[view]=='langganan' OR $_GET[view]=='upgradelangganan'){
			include "sidebar.php";
		}
	?>

	<div class="clear"></div>
</div><!-- .container /-->
</div><!-- .container -->

			<?php
			  // Statistik user
			  $ip      = $_SERVER['REMOTE_ADDR']; // Mendapatkan IP komputer user
			  $tanggal = date("Ymd"); // Mendapatkan tanggal sekarang
			  $waktu   = time(); // 

			  // Mencek berdasarkan IPnya, apakah user sudah pernah mengakses hari ini 
			  $s = mysql_query("SELECT * FROM rb_statistik WHERE ip='$ip' AND tanggal='$tanggal'");
			  // Kalau belum ada, simpan data user tersebut ke database
			  if(mysql_num_rows($s) == 0){
				mysql_query("INSERT INTO rb_statistik(ip, tanggal, hits, online) VALUES('$ip','$tanggal','1','$waktu')");
			  } 
			  else{
				mysql_query("UPDATE rb_statistik SET hits=hits+1, online='$waktu' WHERE ip='$ip' AND tanggal='$tanggal'");
			  }
			?>
			
<footer class="fade-in animated4">
	<div id="footer-widget-area" class="footer-3c container">
		
	</div><!-- #footer-widget-area -->
	<div class="clear"></div>
</footer><!-- .Footer /-->
				
	<div class="clear"></div>
<div class="footer-bottom fade-in animated4">
	<div class="container">
		<div class="aligncenter"><center style='color:#8a8a8a'></center></div>
	</div><!-- .Container -->
</div><!-- .Footer bottom -->
</div><!-- .Wrapper -->
</body>
</html>