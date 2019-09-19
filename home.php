<?php											
$cari = anti_injection($_REQUEST[cari]);
if (isset($_REQUEST[cari])){
	$produk = mysql_query("SELECT * FROM rb_produk where judul LIKE '%$cari%' AND aktif='Y'");
	$page_query = mysql_query("SELECT COUNT(*) FROM rb_produk where judul LIKE '%$cari%' AND aktif='Y'");
}else{
	$per_page = 12;
	$page_query = mysql_query("SELECT COUNT(*) FROM rb_produk where aktif='Y'");
	$pages = ceil(mysql_result($page_query, 0) / $per_page);
	$page = (isset($_GET['p'])) ? (int)$_GET['p'] : 1;
	$start = ($page - 1) * $per_page;
	$produk = mysql_query("SELECT * FROM rb_produk where aktif='Y' ORDER BY id_produk DESC LIMIT $start, $per_page");
}

$no = $start+1;
while ($p = mysql_fetch_array($produk)){
	echo "<div class='wide-news-item'>
			<div class='post-thumbnail'>
				<a href='#' title='' rel='bookmark'>
					<div class='background' style='background: url(cover/$p[cover]); background-size: 240px 360px; background-repeat: no-repeat;'>
						<div class='transbox'>
						<p>";
						    if ($_SESSION[nomor] == ''){
								echo "<a title='Login / Masuk' href='form-login.mu'><img src='images/login.png'></a> 
									  <a title='Register / Pendaftaran' href='pendaftaran.mu'><img src='images/register.png'></a>";  
						    }else{
							   if ($hasil <= 0){
									echo "<a title='Read / Baca' href='#openModallimit'><img src='images/read.png'></a> 
										 <a title='Download / Unduh' href='#openModallimit'><img src='images/download.png'></a>";
							   }else{
									echo "<a title='Read / Baca' target='_BLANK' href='baca-epaper.php?file=$p[nama_file]'><img src='images/read.png'></a> 
										 <a title='Download / Unduh' href='downlot.php?file=$p[nama_file]'><img src='images/download.png'></a>"; 
							   }
							}
						   echo "<a title='Help / Bantuan' href='page-cara-berlangganan-epaper-singgalang.mu'><img src='images/help.png'></a> 
						</p>
						</div>
					</div>																	
				</a>
			</div>
												
			<h2 style='font-size:18px' class='post-box-title'><a href='#' title='' rel='bookmark'>$p[judul]</a></h2>
			<div class='entry'>
				<p>$p[keterangan]</p>
				<br>
			</div>
		</div>";
	$no++;
}						 
		echo "<div style='clear:both'></div><ul class='pagination'>
			<li class='disabled'><a href='#'>&laquo;</a></li>";
			if($pages >= 1 && $page <= $pages){
				for($x=1; $x<=$pages; $x++){
					echo ($x == $page) ? '
						<li class="active"><a href="home-page-'.$x.'.mu">'.$x.'</a></li> ' : '
						<li><a href="home-page-'.$x.'.mu">'.$x.'</a> </li>';
				}
					echo "<li class='disabled'><a href='#'>&raquo;</a></li>
		</ul>";
			}
?>