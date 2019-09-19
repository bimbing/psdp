<?php 
if (isset($_POST[submit])){
$tanggal = date("Y-m-d");
$jam = date("H:i:s");
$nama = anti_injection($_POST[a]);
$email = anti_injection($_POST[b]);
$telp = anti_injection($_POST[c]);
$alamat = anti_injection($_POST[d]);

$valtelp = mysql_query("SELECT no_telpon FROM rb_members where no_telpon='$telp'");
$hitungtelpon = mysql_num_rows($valtelp);

if ($nama == ''){
  echo "Anda belum mengisikan NAMA LENGKAP<br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b>";
}elseif ($email == ''){
  echo "Anda belum mengisikan ALAMAT EMAIL<br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b>";
}elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  echo "Masukkan alamat Email yang benar Bro!!!<br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b>";
}elseif ($telp == ''){
  echo "Anda belum mengisikan NO TELPON<br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b>";
}elseif ((strlen($telp)) < 10){
  echo "No Telpon Minimal 10 Karakter<br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b>";
}elseif ($hitungtelpon >= 1){
  echo "Maaf, No telpon Tersebut sudah terdaftar di system<br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b>";
}elseif ($alamat == ''){
  echo "Anda belum mengisikan ALAMAT<br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b>";
}elseif ((strlen($alamat)) < 20){
  echo "Isikan Alamat Lengkap Minimal 20 Karakter<br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b>";
}elseif ($_POST[paket] == '0'){
  echo "Anda belum memilih Paket Langganan<br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b>";
}else{
	mysql_query("INSERT INTO rb_members (nama_lengkap, email, no_telpon, alamat_lengkap, tanggal_daftar) 
								 VALUES ('$nama','$email','$telp','$alamat','$tanggal $jam')");
	
	$id=mysql_insert_id();
	mysql_query("INSERT INTO rb_orders (id_members, tanggal_batas) 
								 VALUES ('$id','$tanggal 00:00:00')");	
	
	$idorders=mysql_insert_id();
	mysql_query("INSERT INTO rb_orders_detail (id_orders, id_paket, tanggal_orders, tanggal_aktif, keterangan) 
								 VALUES ('$idorders','$_POST[paket]','$tanggal $jam','0000-00-00 00:00:00','Pertama Kali Pesan,..')");
	
	$_SESSION[nomor]     		= $id;
	$_SESSION[nama_lengkap]   	= $nama;
	$pecah 						= explode(' ', $nama);
	$_SESSION[nama_depan]   	= $pecah[0];
	$_SESSION[email]   			= $email;
  
	echo "<script>window.alert('Sukses daftar Menjadi Members !!!');
        window.location=('langganan.mu')</script>";
}

}
?>

<div style='margin-top:-20px' class="content">				
	<article class="post-36 page type-page status-publish hentry post-listing post">
			<div class="post-inner">
				<h1 class="name post-title entry-title">
					<span itemprop="name">FORM BERLANGGANAN E-PAPER SURABAYA</span>
				</h1>
				<p class="post-meta"></p>
				<div class="clear"></div>
				<div class="entry">
					<p>Silahkan isi atau lengkapi data berikut dengan sebenar-benarnya untuk Mendapatkan atau Berlangganan E-Paper Harian Surabaya. Terima kasih,..</p>
				</div><!-- .entry /-->				
			</div><!-- .post-inner -->
	</article><!-- .post-listing -->

<div id="comments">
	<div id="respond" class="comment-respond">
			<form action="" method="post" id="commentform" onSubmit="return validasi(this)" class="comment-form">
				<p class="comment-form-author"><label for="author">Nama Lengkap</label> <span class="required">*</span><input id="author" name="a" type="text" value="" size="30" aria-required="true"></p>
				<p class="comment-form-email"><label for="email">Alamat Email</label> <span class="required">*</span><input id="email" name="b" type="text" value="" size="30" aria-required="true"></p>
				<p class="comment-form-url"><label for="url">No Telepon</label> <span class="required">*</span><input id="url" name="c" type="text" value="" size="30"></p>
				<p class="comment-form-url"><label for="url">Alamat Lengkap</label> <span class="required">*</span><textarea id="comment" name="d" cols="45" rows="4" aria-describedby="form-allowed-tags" aria-required="true"></textarea></p>	
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
				<p class="form-submit">
					<br><input name="submit" type="submit" id="submit" class="submit" value="Daftar Sekarang"></p>
			</form>
	</div><!-- #respond -->		
</div>
</div>