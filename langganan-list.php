<?php 
if (isset($_GET[aktif])){
$bts = mysql_fetch_array(mysql_query("SELECT * FROM rb_orders where id_members='$_GET[members]'"));

$tahun   = substr($bts['tanggal_batas'],0,4);
$bulan   = substr($bts['tanggal_batas'],5,2);
$tanggal = substr($bts['tanggal_batas'],8,2);
$jam1 = substr($bts['tanggal_batas'],11,2);
$jam2 = substr($bts['tanggal_batas'],14,2);
$jam3 = substr($bts['tanggal_batas'],17,2);
						
$sekarangg = date('YmdHis');		
$batas = $tahun.''.$bulan.''.$tanggal.''.$jam1.''.$jam2.''.$jam3;
$hasil = $batas - $sekarangg;


	$sekarang = date('Y-m-d H:i:s');
	$defaultp = date('Y-m-d 00:00:00');
	mysql_query("UPDATE rb_orders_detail SET tanggal_aktif = '$sekarang', status = 'Ya', admin='$_SESSION[nomor]' where id_orders_detail='$_GET[aktif]'");
	
	$paket = mysql_fetch_array(mysql_query("SELECT * FROM rb_orders_detail a JOIN rb_paket b ON a.id_paket=b.id_paket JOIN rb_orders c ON a.id_orders=c.id_orders where a.id_orders_detail='$_GET[aktif]'"));
	if(function_exists('date_default_timezone_set')) date_default_timezone_set('Asia/Jakarta');
if ($hasil > 0){	
	$date = date_create($bts['tanggal_batas']);
}else{
	$date = date_create($defaultp);
}	
	date_add($date, date_interval_create_from_date_string($paket[lama].' days'));
	$hasil = date_format($date, 'Y-m-d H:i:s');
	
	mysql_query("UPDATE rb_orders SET tanggal_batas='$hasil' where id_members='$_GET[members]'");
	header('location:list-langganan.mu');



}
?>
<div style='margin-top:-20px; width:100%' class="content">					
		<article class="post-36 page type-page status-publish hentry post-listing post">
				<div class="post-inner">
					<h1 class="name post-title entry-title">
						<span itemprop="name">Semua Daftar Orderan Paket Members</span>
						<form style='float:right' action='list-langganan.mu' method='POST'>
							<input type='text' name='cari' placeholder='Cari Nama / No telepon,...'>
						</form>
					</h1>
					<div class="entry">
						<table>
							<tr bgcolor='#e3e3e3'>
								<th>No</th>
								<th>Nama Pemesan</th>
								<th>No Telepon</th>
								<th>Nama Paket</th>
								<th>Tanggal Orders</th>
								<th>Tanggal Aktif</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
							<?php 
								$per_page = 10;
								if (isset($_POST[cari])){
									$page_query = mysql_query("SELECT * FROM rb_orders a JOIN rb_orders_detail b ON a.id_orders=b.id_orders JOIN rb_paket c ON b.id_paket=c.id_paket JOIN rb_members d ON a.id_members=d.id_members where d.nama_lengkap LIKE '%$_POST[cari]%' OR d.no_telpon LIKE '%$_POST[cari]%'");
								}else{
									$page_query = mysql_query("SELECT COUNT(*) FROM rb_orders_detail");
								}
								$pages = ceil(mysql_result($page_query, 0) / $per_page);
								$page = (isset($_GET['p'])) ? (int)$_GET['p'] : 1;
								$start = ($page - 1) * $per_page;
								if (isset($_POST[cari])){
									$query = mysql_query("SELECT * FROM rb_orders a JOIN rb_orders_detail b ON a.id_orders=b.id_orders JOIN rb_paket c ON b.id_paket=c.id_paket JOIN rb_members d ON a.id_members=d.id_members where d.nama_lengkap LIKE '%$_POST[cari]%' OR d.no_telpon LIKE '%$_POST[cari]%' ORDER BY b.id_orders_detail DESC LIMIT $start, $per_page");
								}else{
									$query = mysql_query("SELECT * FROM rb_orders a JOIN rb_orders_detail b ON a.id_orders=b.id_orders JOIN rb_paket c ON b.id_paket=c.id_paket JOIN rb_members d ON a.id_members=d.id_members ORDER BY b.id_orders_detail DESC LIMIT $start, $per_page");
								}
								$no = $start + 1;
								while ($r = mysql_fetch_array($query)){
									if ($r[status] == 'Ya'){ $color = 'green'; $status = 'Aktif'; $class = 'aktif'; }elseif ($r[status] == 'Tidak'){ $color = 'red';  $status = 'Non aktif'; $class = 'btn';}else{ $color = 'blue'; $status = 'Konfirmasi'; $class = 'aktif'; }
									echo "<tr>
											 <td>$no</td>
											 <td><a style='color:#000; font-weight:bold' href='detail-account-$r[id_members].mu' title='$r[keterangan]'>$r[nama_lengkap]</a></td>
											 <td>$r[no_telpon]</td>
											 <td>$r[nama_paket]</td>
											 <td>$r[tanggal_orders] WIB</td>
											 <td>$r[tanggal_aktif] WIB</td>";
											 if ($status=='Konfirmasi'){
												$ko = mysql_fetch_array(mysql_query("SELECT * FROM rb_konfirmasi a JOIN rb_rekening b ON a.rekening=b.id_rekening where id_orders_detail='$r[id_orders_detail]'"));
												echo "<div id='openModal$no' class='modalDialog'>
													<div>
														<a href='#close' title='Close' class='close'>X</a>
														<h3>From : $r[nama_lengkap]</h3>
														<p><pre>Pemegang Rek : $ko[pemegang_rek]
No Rekening  : $ko[no_rekening]
Cara Bayar   : $ko[cara_bayar]
Bayar Ke Rek : $ko[nama_pemegang], $ko[nama_bank] ($ko[no_rekening])
Pesan        : $ko[pesan] 
Bukti Transf : <a style='color:blue; text-decoration:underline;' href='downlot-bukti.php?file=$ko[bukti_bayar]'>Download dan Lihat</a></pre></p>
													</div>
												</div>";
												
												echo "<td align=center><b style='color:$color'><a href='#openModal$no'>$status</a></b></td>";
											 }else{
												echo "<td align=center><b style='color:$color'>$status</b></td>";
											 }
											 if ($r[status] == 'Ya'){
												echo "<td align=center><a style='float:right' href='#'><input class='$class' type='button' value='Aktifkan'></a></td>";
											 }elseif($r[status] == 'Tidak' OR $r[status] == 'Konfirmasi'){
												echo "<td align=center><a style='float:right' href=javascript:confirmdelete('aktifkan-list-langganan-$r[id_orders_detail]-$r[id_members].mu')><input class='btn' type='button' value='Aktifkan'></a></td>";
											 }
										  echo "</tr>"; 
									$no++;
								}
								
										echo "</table><ul class='pagination' style='margin-bottom:-35px'>
											<li class='disabled'><a href='#'>&laquo;</a></li>";
											if($pages >= 1 && $page <= $pages){
												for($x=1; $x<=$pages; $x++){
													echo ($x == $page) ? '
														<li class="active"><a href="list-langganan-page-'.$x.'.mu">'.$x.'</a></li> ' : '
														<li><a href="list-langganan-page-'.$x.'.mu">'.$x.'</a> </li>';
												}
													echo "<li class='disabled'><a href='#'>&raquo;</a></li>
												</ul>"; 
											}
							?>
					</div><!-- .entry /-->				
				</div><!-- .post-inner -->
		</article><!-- .post-listing -->
</div>