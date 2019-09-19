<?php 
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

<div style='margin-top:-20px' class="content">				
	<article class="post-36 page type-page status-publish hentry post-listing post">
			<div class="post-inner">
				<h1 class="name post-title entry-title">
					<span itemprop="name">Upgrade Paket Berlangganan E-Paper Anda</span>
				</h1>
				<div class="clear"></div>
				<div class="entry">
					<p>Silahkan perpanjang waktu langganan E-paper anda jika kuota waktu anda sudah habis atau hampir habis dengan mengisi Form yang telah kami sediakan dibawah ini.</p>
				</div><!-- .entry /-->				
			</div><!-- .post-inner -->
	</article><!-- .post-listing -->
	<?php 
		if (isset($_POST[submit])){
		$tanggal = date("Y-m-d");
		$jam = date("H:i:s");
		$keterangan = anti_injection($_POST[keterangan]);
		$ido = mysql_fetch_array(mysql_query("SELECT * FROM rb_orders where id_members='$_SESSION[nomor]'"));
			if ($_POST[paket]=='0'){
				echo "<center style='margin:0px 0px 25px 0px; color:Red'>Maaf, Anda Belum Memilih Paket Langganan,..!!!</center>";
			}else{
				mysql_query("INSERT INTO rb_orders_detail (id_orders, id_paket, tanggal_orders, tanggal_aktif, keterangan) 
											 VALUES ('$ido[id_orders]','$_POST[paket]','$tanggal $jam','0000-00-00 00:00:00','$keterangan')");
				
				echo "<script>window.alert('Sukses Melakukan Permintaan Perpanjang Kuota !!!');
					window.location=('langganan.mu')</script>";
			}
		}
	?>
		<div id="comments">
			<div id="respond" class="comment-respond">
					<form action="" method="post" id="commentform" onSubmit="return validasi(this)" class="comment-form">
						<p class="comment-form-url"><label for="url">Pilih Paket</label> <span class="required">*</span><select name='paket' style='padding:6px; background:#f4f4f4'>
																								<option value='0'>- Pilih Paket Langganan -</option>
																							<?php
																								$paket = mysql_query("SELECT * FROM rb_paket ORDER BY id_paket");
																								while ($p = mysql_fetch_array($paket)){
																								$harga = format_rupiah($p[harga]);
																									echo "<option value='$p[id_paket]'>$p[nama_paket] ($p[lama] Hari) - Rp $harga</option>";
																								}
																							?>
																						</select></p>
						<p class="comment-form-url"><label for="url">Keterangan</label> <textarea id="comment" name="keterangan" cols="45" rows="8" aria-describedby="form-allowed-tags" aria-required="true"></textarea></p>
						<p class="form-submit">
							<br><input name="submit" type="submit" id="submit" class="submit" value="Perpanjang Sekarang!"></p>
					</form>
			</div><!-- #respond -->		
		</div>

</div>