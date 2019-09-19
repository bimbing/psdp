<?php
	$h = mysql_fetch_array(mysql_query("SELECT * FROM rb_halaman where judul_seo='$_GET[seo]'"));
		 mysql_query("UPDATE rb_halaman SET dibaca=dibaca+1 where judul_seo='$_GET[seo]'");
		 $tanggal = tgl_indoo($h[tgl_posting]);
		 $isihalaman = nl2br($h[isi_halaman]);
	$i = mysql_fetch_array(mysql_query("SELECT * FROM rb_halaman where id_halaman='$_GET[id]'"));
	
if (isset($_POST[submit]) AND $_SESSION[level] == 'Admin'){
	mysql_query("UPDATE rb_halaman SET judul='$_POST[a]', isi_halaman='$_POST[b]' where id_halaman='$_GET[id]'");
	echo "<script>window.alert('Sukses Update Halaman !!!');
        window.location=('page-$i[judul_seo].mu')</script>";
}

?>
<div style='margin-top:-20px' class="content">	
	<?php if (isset($_GET[id])){ ?>
		<article class="post-36 page type-page status-publish hentry post-listing post">
				<div class="post-inner">
					<h1 class="name post-title entry-title">
						<span itemprop="name">EDIT DATA HALAMAN</span>
					</h1>		
				</div><!-- .post-inner -->
		</article><!-- .post-listing -->
<div id="comments">
	<div id="respond" class="comment-respond">
			<form action="" method="post" id="commentform" class="comment-form">
				<p class="comment-form-author"><input id="author" name="a" value='<?php echo "$i[judul]"; ?>' type="text" style='width:70%' aria-required="true"></p>
				<p class="comment-form-url"><textarea id="loko" name="b" style='80%; height:340px'><?php echo "$i[isi_halaman]"; ?></textarea></p>						
				<p class="form-submit">
					<input name="submit" type="submit" id="submit" class="submit" value=" Update "></p>
			</form>
	</div><!-- #respond -->		
</div>

	<?php }else{ ?>
	
		<article class="post-36 page type-page status-publish hentry post-listing post">
				<div class="post-inner">
					<h1 class="name post-title entry-title">
						<span itemprop="name"><?php echo $h[judul]; ?></span>
					</h1>
					<p class="post-meta"><?php echo $h[hari].', '.$tanggal.', '.$h[jam].' WIB - Telah Dibaca '.$h[dibaca].' Kali'; ?></p>
					<div class="clear"></div>
					<div class="entry">
						<p><?php echo $isihalaman; ?>
						<br><br>
						<?php 
							if ($_SESSION[level] == 'Admin'){
							echo "<a style='float:right; color:red' href='manage-page-$h[id_halaman].mu'>Edit</a>";
							}
						?>
						</p>
					</div><!-- .entry /-->				
				</div><!-- .post-inner -->
		</article><!-- .post-listing -->
	<?php } ?>
</div>