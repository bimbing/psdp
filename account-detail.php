<?php 
$acc = mysql_fetch_array(mysql_query("SELECT * FROM rb_members a JOIN rb_orders b ON a.id_members=b.id_members where a.id_members='$_GET[members]'"));
$test = md5(strtolower(trim($acc['email'])));
$btss = mysql_fetch_array(mysql_query("SELECT * FROM rb_orders where id_members='$_GET[members]'"));

$tahunn   = substr($btss['tanggal_batas'],0,4);
$bulann   = substr($btss['tanggal_batas'],5,2);
$tanggaln = substr($btss['tanggal_batas'],8,2);
$jam1n = substr($btss['tanggal_batas'],11,2);
$jam2n = substr($btss['tanggal_batas'],14,2);
$jam3n = substr($btss['tanggal_batas'],17,2);
						
$sekarangn = date('YmdHis');		
$batasn = $tahunn.''.$bulann.''.$tanggaln.''.$jam1n.''.$jam2n.''.$jam3n;
$hasiln = $batasn - $sekarangn;
?>

<div style='margin-top:-20px' class="content">				
	<article class="post-36 page type-page status-publish hentry post-listing post">
			<div class="post-inner">
				<h1 class="name post-title entry-title">
					<span itemprop="name">DETAIL INFO ACCOUNT </span>
				</h1>
				<div class="entry">
					<p>Berikut ini adalah informasi lengkap tentang account "<?php echo "$acc[nama_lengkap]"; ?>",..
					<br><br>
					<a style='float:right;' class='btn' href='<?php echo "detail-pesan-masuk-$acc[id_members].mu"; ?>'> Kirimkan Pesan </a>
						<table style='font-size:14px !important'>
							<tr><td rowspan='8' width='180px'><img src='<?php echo "http://www.gravatar.com/avatar/$test.jpg?s=180"; ?>'></td></tr>
							<tr><td width='100px'>Nama Lengkap </td><td>: <?php echo "$acc[nama_lengkap]"; ?></td></tr>
							<tr><td width='100px'>Alamat Email </td><td>: <?php echo "$acc[email]"; ?></td></tr>
							<tr><td width='100px'>No Telepon </td><td>: <?php echo "$acc[no_telpon]"; ?></td></tr>
							<tr><td width='100px'>Alamat Lengkap </td><td>: <?php echo "$acc[alamat_lengkap]"; ?></td></tr>
							<tr><td width='100px'>Total Login </td><td>: <?php echo "Total $acc[login_total] kali"; ?></td></tr>
							<tr><td width='100px'>Login Terakhir </td><td>: <?php echo "$acc[login_terakhir] WIB"; ?></td></tr>
							<tr><td width='100px'>Status Langganan  </td><td>: <?php echo "Aktif sampai - $acc[tanggal_batas] WIB"; ?></td></tr>
						</table>
					</p>
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
					$cekn = mysql_fetch_array(mysql_query("SELECT * FROM rb_orders where id_members='$_GET[members]'"));
					if ($hasiln > 0){
						$tahun   = substr($cekn[tanggal_batas],0,4);
						$bulan   = substr($cekn[tanggal_batas],5,2);
						$tanggal = substr($cekn[tanggal_batas],8,2);
						$jam     = substr($cekn[tanggal_batas],11,8);

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
					<br>Sisa Paket Langganan E-paper,...!!!
				<?php
					}else{
						echo "<img src='images/batas.png'> <br><br>Sisa Paket Langganan E-paper Telah Habis,...!!!";
						
					}
				?>
				
			</div>
		</center>
</div>