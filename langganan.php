<?php 
												echo "<div id='openModall' class='modalDialog'>
													<div>
														<a href='#close' title='Close' class='close'>X</a>
														<br><h2>No Rekening Singgalang</h2><br>";
															$queryy = mysql_query("SELECT * FROM rb_rekening");
															$no = 1;
															while ($re = mysql_fetch_array($queryy)){
																echo "<p><pre><b>Nama Bank    :  $re[nama_bank]
No Rekening  :  $re[no_rekening]
Atas Nama    :  $re[nama_pemegang]</b></pre></p>";
																$no++;
															}
													echo "</div>
												</div>";
												
?>

<div style='margin-top:-20px' class="content">				
	<article class="post-36 page type-page status-publish hentry post-listing post">
			<div class="post-inner">
				<h1 class="name post-title entry-title">
					<span itemprop="name">Status Berlangganan E-Paper Anda</span>
				</h1>
				<div class="clear"></div>
				<div class="entry">
					<p>Berikut ini adalah informasi tentang sisa waktu langganan e-paper anda, silahkan perpanjang waktu langganan anda jika kuota waktu anda sudah habis..</p>
				</div><!-- .entry /-->				
			</div><!-- .post-inner -->
	</article><!-- .post-listing -->

<script type="text/javascript" src="countdown/jquery.min.js"></script>
<script type="text/javascript" src="countdown/jquery.flipcountdown.js"></script>
<link rel="stylesheet" type="text/css" href="countdown/jquery.flipcountdown.css" />
		
		<center>
			<div id="main">
				<table style="border:0px;">
					<tr>
						<td style="width:110px;text-align:center;">Days</td>
						<td style="width:120px;text-align:center;">Hours</td>
						<td style="width:110px;text-align:center;">Minutes</td>
						<td style="width:120px;text-align:center;">Seconds</td>
					</tr>
					<tr>
						<td colspan="4"><span id="new_year"></span></td>
					</tr>
				</table>
				<?php 
					$cek = mysql_fetch_array(mysql_query("SELECT * FROM rb_orders where id_members='$_SESSION[nomor]'"));
					if ($hasil > 0){
						$tahun   = substr($cek[tanggal_batas],0,4);
						$bulan   = substr($cek[tanggal_batas],5,2);
						$tanggal = substr($cek[tanggal_batas],8,2);
						$jam     = substr($cek[tanggal_batas],11,8);

						$batas_langganan = $bulan.'/'.$tanggal.'/'.$tahun.' '.$jam;
				?>		
						<!-- Format Tanggal MM/DD/YYYY H:I:S-->
						<script>
						jQuery(function($){
							$('#new_year').flipcountdown({
								size:'lg',
								beforeDateTime:'<?php echo $batas_langganan; ?>'
							});
						});
						</script>
				<?php
					}else{
						echo "<img src='images/batas.png'>";
					}
				?>
				
			</div>
		</center>
<br><br>	
		<article class="post-36 page type-page status-publish hentry post-listing post">
				<div class="post-inner">
					<h1 class="name post-title entry-title">
						<span itemprop="name">History Orderan</span>
						<a style='float:right; margin-left:10px' href='#openModall'><input class="btn-green" type='button' value=' No Rekening Singgalang '></a> 
						<a style='float:right' href='upgrade-langganan.mu'><input class="btn" type='button' value=' Tambah Paket Baru '></a> 
					</h1>
					<div class="entry">
						<table>
							<tr bgcolor='#e3e3e3'>
								<th>No</th>
								<th>Nama Paket</th>
								<th>Tanggal Orders</th>
								<th>Status</th>
								<th>Pembayaran</th>
							</tr>
							<?php 
								$per_page = 5;
								$page_query = mysql_query("SELECT COUNT(*) FROM rb_orders a JOIN rb_orders_detail b ON a.id_orders=b.id_orders where a.id_members='$_SESSION[nomor]'");
								$pages = ceil(mysql_result($page_query, 0) / $per_page);
								$page = (isset($_GET['p'])) ? (int)$_GET['p'] : 1;
								$start = ($page - 1) * $per_page;
								$query = mysql_query("SELECT * FROM rb_orders a JOIN rb_orders_detail b ON a.id_orders=b.id_orders JOIN rb_paket c ON b.id_paket=c.id_paket where a.id_members='$_SESSION[nomor]' ORDER BY b.id_orders_detail DESC LIMIT $start, $per_page");
								$no = $start + 1;
								while ($r = mysql_fetch_array($query)){
									if ($r[status] == 'Ya'){ $color = 'green'; $status = 'aktif'; $class = 'aktif'; }elseif ($r[status] == 'Tidak'){ $color = 'red';  $status = 'Non aktif'; $class = 'btn';}else{ $color = 'blue'; $status = 'Sudah Konfirmasi'; $class = 'aktif'; }
									echo "<tr>
											 <td>$no</td>
											 <td>$r[nama_paket]</td>
											 <td>$r[tanggal_orders]</td>
											 <td align=center><b style='color:$color'>$status</b></td>";
											 if ($r[status] == 'Ya'){
												echo "<td align=center><a href='#'><input class='$class' type='button' value=' Konfirmasi '></a></td>";
											 }elseif($r[status] == 'Tidak' OR $r[status] == 'Konfirmasi'){
												echo "<td align=center><a href='konfirmasi-$r[id_orders_detail].mu' class='confirmation'><input class='btn' type='button' value='Konfirmasi'></a></td>";											 
											 }
										  echo "</tr>"; 
									$no++;
								}
								
								echo "</table>
										<ul class='pagination' style='margin-bottom:-35px'>
											<li class='disabled'><a href='#'>&laquo;</a></li>";
											if($pages >= 1 && $page <= $pages){
												for($x=1; $x<=$pages; $x++){
													echo ($x == $page) ? '
														<li class="active"><a href="langganan-page-'.$x.'.mu">'.$x.'</a></li> ' : '
														<li><a href="langganan-page-'.$x.'.mu">'.$x.'</a> </li>';
												}
													echo "<li class='disabled'><a href='#'>&raquo;</a></li>
												</ul>"; 
											}
							?>
					</div><!-- .entry /-->				
				</div><!-- .post-inner -->
		</article><!-- .post-listing -->

</div>