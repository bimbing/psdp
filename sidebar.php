<aside class="sidebar">
	<h1 class="name post-title entry-title">Recent E-Paper</span></h1>
	<?php
		$col = 2;
		$album= mysql_query("SELECT * FROM rb_produk ORDER BY id_produk DESC LIMIT 4");
			echo "<table width=100%><tr>";
		$hitung = 0;          
		while($w=mysql_fetch_array($album)){
			if ($hitung >= $col) {
				echo "</tr><tr>";
				$hitung = 0;
			}
			$hitung++;
		echo "<td><a href=''><center> 
					<div style='background: url(cover/$w[cover]); background-size: 100% 200px; background-repeat: no-repeat; border:1px solid #e3e3e3;'>
						<div class='transbox'>
						<p class='p'>";
						   if ($_SESSION[nomor] == ''){
								echo "<a title='Login / Masuk' href='form-login.mu'><img class='img' style='width:45px' src='images/login.png'></a> 
									  <a title='Register / Pendaftaran' href='pendaftaran.mu'><img class='img' style='width:45px' src='images/register.png'></a> "; 
						   }else{
								if ($hasil <= 0){
									echo "<a title='Read / Baca' href='#openModallimit'><img class='img' style='width:45px' src='images/read.png'></a> 
									  <a title='Download / Unduh' href='#openModallimit'><img class='img' style='width:45px' src='images/Download.png'></a> ";
								}else{
									echo "<a target='_BLANK' title='Read / Baca' href='baca-epaper.php?file=$w[nama_file]'><img class='img' style='width:45px' src='images/read.png'></a> 
									  <a title='Download / Unduh' href='downlot.php?file=$w[nama_file]'><img class='img' style='width:45px' src='images/Download.png'></a> ";
								}
						   }
						   echo "<a title='Help / Bantuan' href='page-cara-berlangganan-epaper-singgalang.mu'><img class='img' style='width:45px' src='images/help.png'></a> 
						</p>
						</div>
					</div> 
					<span style='font-size:10px; color:red'>$w[judul]</span> <hr><br>
				</center></a></td>";
				}
		echo "</tr></table>";

	?>
</aside>