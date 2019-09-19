<?php 
$konf = mysql_fetch_array(mysql_query("SELECT * FROM rb_orders_detail a JOIN rb_paket b ON a.id_paket=b.id_paket where a.id_orders_detail='$_GET[bayar]'"));
?>

<div style='margin-top:-20px' class="content">				
	<article class="post-36 page type-page status-publish hentry post-listing post">
			<div class="post-inner">
				<h1 class="name post-title entry-title">
					<span itemprop="name">Konfirmasi Pembayaran No Orders : <?php echo "$_GET[bayar]"; ?></span>
				</h1>		
			</div><!-- .post-inner -->
	</article><!-- .post-listing -->

	<?php 
		if (isset($_POST[submit])){
		$tanggal = date("Y-m-d H:i:s");
		$aa = anti_injection($_POST[aa]);
		$bb = anti_injection($_POST[bb]);
		$cc = anti_injection($_POST[cc]);
		$dd = anti_injection($_POST[dd]);
		$ee = anti_injection($_POST[ee]);
		$ff = anti_injection($_POST[ff]);
		$gg = anti_injection($_POST[gg]);
		
			$dir_gambar = 'bukti/';
			$filename = basename($_FILES['hh']['name']);
			$uploadfile = $dir_gambar . $filename;
				if ($filename != ''){
					if (move_uploaded_file($_FILES['hh']['tmp_name'], $uploadfile)) {
						mysql_query("INSERT INTO rb_konfirmasi (id_orders_detail, pemegang_rek, no_rekening, cara_bayar, rekening, total_transfer, pesan, bukti_bayar, tanggal_bayar, tanggal_konfirmasi) 
													   VALUES ('$_POST[id]','$aa','$bb','$cc','$dd','$ee','$gg','$filename','$ff','$tanggal')");
													   
						mysql_query("UPDATE rb_orders_detail SET status='Konfirmasi' where id_orders_detail='$_POST[id]'");
							echo "<script>window.alert('Sukses Konfirmasi Pembayaran !!!');
										  window.location=('langganan.mu')</script>";
					}else{
										echo "<script>window.alert('gagal Tambahkan Foto.');
												window.location='gallery.php'</script>";
					}
				}else{
						mysql_query("INSERT INTO rb_konfirmasi (id_orders_detail, pemegang_rek, no_rekening, cara_bayar, rekening, total_transfer, pesan, tanggal_bayar, tanggal_konfirmasi) 
													   VALUES ('$_POST[id]','$aa','$bb','$cc','$dd','$ee','$gg','$ff','$tanggal')");
													   
						mysql_query("UPDATE rb_orders_detail SET status='Konfirmasi' where id_orders_detail='$_POST[id]'");
							echo "<script>window.alert('Sukses Konfirmasi Pembayaran !!!');
										  window.location=('langganan.mu')</script>";
				}
		}
	?>
<div id="comments">
	<div id="respond" class="comment-respond">
			<form action="" method="post" id="commentform" onSubmit="return konfirmasi(this)" class="comment-form" enctype='multipart/form-data'>
				<input type='hidden' name='id' value='<?php echo "$_GET[bayar]"; ?>'>
				<p class="comment-form-author"><label for="author">Nama Pemegang Rekening</label> <span class="required">*</span><input id="author" name="aa" type="text" value="" size="30" aria-required="true"></p>
				<p class="comment-form-email"><label for="email">No Rekening Anda</label> <span class="required">*</span><input id="email" name="bb" type="text" value="" size="30" aria-required="true"></p>
				<p class="comment-form-url"><label for="url">Cara Pembayaran (Jika Tunai, Pada Kotak Message Sebutkan Bayar kepada siapa)</label> <span class="required">*</span><select name='cc' style='padding:6px; background:#f4f4f4'>
																								<option value=''></option>
																								<option value='Tunai'> Tunai </option>
																								<option value='Transfer'> Transfer Via ATM </option>
																							</select></p>
				<p class="comment-form-url"><label for="url">Transfer Ke Rekening</label> <select name='dd' style='padding:6px; background:#f4f4f4'>
																								<option value='' selected></option>
																								<?php 
																									$rek = mysql_query("SELECT * FROM rb_rekening");
																									while ($re = mysql_fetch_array($rek)){
																										echo "<option value='$re[id_rekening]'> $re[nama_bank] - $re[no_rekening] ($re[nama_pemegang])</option>";
																									}
																								?>
																							</select></p>
				<p class="comment-form-url"><label for="url">Total Transfer / Bayar - (Silahkan Edit Jika anda Transfer dengan Nominal Unik) </label> <span class="required">*</span><input id="url" name="ee" type="text" value="<?php echo "Rp $konf[harga]"; ?>" size="30"></p>
				<p class="comment-form-email"><label for="email">Tanggal Bayar / Transfer (Format : YYYY-MM-DD)</label> <span class="required">*</span><input id="email" name="ff" type="text" size="30" aria-required="true"></p>
				<p class="comment-form-url"><label for="url">Message / Pesan</label> <textarea id="comment" name="gg" cols="45" rows="3" aria-describedby="form-allowed-tags" aria-required="true"></textarea></p>						
				<p class="comment-form-url"><label for="url">Upload / Kirimkan Bukti Transfer</label><input style='padding:6px; background:#f4f4f4; border:1px solid #e3e3e3' id="url" name="hh" type="file" value="" size="30"></p>
				<p class="form-submit">
					<input style='float:right;' name="submit" type="submit" id="submit" class="submit" value=" Konfirmasi Pembayaran "></p>
			</form>
	</div><!-- #respond -->		
</div>
</div>