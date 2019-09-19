<?php 

$acc = mysql_fetch_array(mysql_query("SELECT * FROM rb_members where id_members='$_SESSION[nomor]'"));
$test = md5(strtolower(trim($acc['email'])));
?>

<div style='margin-top:-20px' class="content">				
	<article class="post-36 page type-page status-publish hentry post-listing post">
			<div class="post-inner">
				<h1 class="name post-title entry-title">
					<span itemprop="name">DETAIL INFO ACCOUNT ANDA</span>
				</h1>
				<div class="entry">
					<p>Berikut ini adalah informasi lengkap tentang account anda, silahkan untuk menghubungi administrator melalui menu "pesan masuk" jika data-data anda ada yang salah. Terima kasih,..
					<br><br>
						<table style='font-size:14px !important'>
							<tr><td rowspan='7' width='180px'><img src='<?php echo "http://www.gravatar.com/avatar/$test.jpg?s=180"; ?>'></td></tr>
							<tr><td width='100px'>Nama Lengkap </td><td>: <?php echo "$acc[nama_lengkap]"; ?></td></tr>
							<tr><td width='100px'>Alamat Email </td><td>: <?php echo "$acc[email]"; ?></td></tr>
							<tr><td width='100px'>No Telepon </td><td>: <?php echo "$acc[no_telpon]"; ?></td></tr>
							<tr><td width='100px'>Alamat Lengkap </td><td>: <?php echo "$acc[alamat_lengkap]"; ?></td></tr>
							<tr><td width='100px'>Total Login </td><td>: <?php echo "Total $acc[login_total] kali"; ?></td></tr>
							<tr><td width='100px'>Login Terakhir </td><td>: <?php echo "$acc[login_terakhir] WIB"; ?></td></tr>
						</table>
					</p>
				</div><!-- .entry /-->				
			</div><!-- .post-inner -->
	</article><!-- .post-listing -->
</div>