<?php 
	if ($_GET[view]=='halaman'){
		$ht = mysql_fetch_array(mysql_query("SELECT judul FROM rb_halaman where judul_seo='$_GET[seo]'"));
		echo "$ht[judul]";
	}elseif ($_GET[view]=='pendaftaran'){
		echo "Pendaftaran E-Paper Harian Singgalang";
	}elseif ($_GET[view]=='hubungi'){
		echo "Hubungi Admin E-Paper Harian Singgalang";
	}else{
		echo "E-Paper Harian Singgalang";
	}
?>