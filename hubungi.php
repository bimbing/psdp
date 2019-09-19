<?php 
if (isset($_POST[submit])){
$tanggal = date("Y-m-d");
$jam = date("H:i:s");
$nama = anti_injection($_POST[a]);
$email = anti_injection($_POST[b]);
$website = anti_injection($_POST[c]);
$pesan = anti_injection($_POST[d]);
	mysql_query("INSERT INTO rb_hubungi (nama, email, website, pesan, tanggal, jam) 
								 VALUES ('$nama','$email','$website','$pesan','$tanggal','$jam')");
	echo "<script>window.alert('Sukses Mengirimkan Pesan !!!');
        window.location=('hubungi-kami.mu')</script>";
}
?>

<div style='margin-top:-20px' class="content">				
	<article class="post-36 page type-page status-publish hentry post-listing post">
			<div class="post-inner">
				<h1 class="name post-title entry-title">
					<span itemprop="name">HUBUNGI KAMI</span>
				</h1>
				<p class="post-meta"></p>
				<div class="clear"></div>
				<div class="entry">
					<p>Untuk Informasi Berlangganan E-Paper dan Pemasangan Iklan
						Hubungi Telp. 0751 25001, atau melalui form yang telah kami sediakan dibawah ini. Terima kasih,..</p>
				</div><!-- .entry /-->				
			</div><!-- .post-inner -->
	</article><!-- .post-listing -->

<div id="comments">
	<div id="respond" class="comment-respond">
			<form action="" method="post" id="commentform" class="comment-form">
				<p class="comment-form-author"><label for="author">Name</label> <span class="required">*</span><input id="author" name="a" value='<?php echo "$_SESSION[nama_lengkap]"; ?>' type="text" value="" size="30" aria-required="true"></p>
				<p class="comment-form-email"><label for="email">Email</label> <span class="required">*</span><input id="email" name="b" value='<?php echo "$_SESSION[email]"; ?>' type="text" value="" size="30" aria-required="true"></p>
				<p class="comment-form-url"><label for="url">Website</label><input id="url" name="c" type="text" value="" size="30"></p>
				<p class="comment-form-url"><label for="url">Message</label> <span class="required">*</span><textarea id="comment" name="d" cols="45" rows="8" aria-describedby="form-allowed-tags" aria-required="true"></textarea></p>						
				<p class="form-submit">
					<input name="submit" type="submit" id="submit" class="submit" value="Send a Message"></p>
			</form>
	</div><!-- #respond -->		
</div>
</div>