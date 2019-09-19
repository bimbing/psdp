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
        window.location=('hubungi.mu')</script>";
}
?>

<div style='margin-top:-20px' class="content">				
	<article class="post-36 page type-page status-publish hentry post-listing post">
			<div class="post-inner">
				<h1 class="name post-title entry-title">
					<span itemprop="name">LOGIN / MASUK</span>
				</h1>
				<p class="post-meta"></p>
				<div class="clear"></div>
				<div class="entry">
					<p>Silahkan Login atau masuk ke system untuk membaca e-paper harian Surabaya melalui form dibawah ini menggunakan email dan no telpon untuk password anda,..</p>
				</div><!-- .entry /-->				
			</div><!-- .post-inner -->
	</article><!-- .post-listing -->

	<div class="entry">
		<div id="login-form">
				<form action="aksi-login.php" method="post" onSubmit="return login(this)">
					<p id="log-username"><input type="text" name="email" id="log" value="Email Address" onfocus="if (this.value == 'Email Address') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Email Address';}" size="33"></p>
					<p id="log-pass"><input type="password" name="pwd" id="pwd" value="Password" onfocus="if (this.value == 'Password') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Password';}" size="33"></p>
					<input type="submit" name="submit" value="Log in" class="login-button">
					<label for="rememberme"><input name="rememberme" id="rememberme" type="checkbox" checked="checked" value="forever"> Remember Me</label>
					<input type="hidden" name="redirect_to" value="/masuk/">
				</form>
				<ul class="login-links">
					<li><a href="#">Lost your password?</a></li>
				</ul>
		</div>
	</div>
</div>