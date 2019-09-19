<?php 
if (isset($_POST[submit])){
	$username = filter_var(trim($_POST["username"]),FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
	$message = filter_var(trim($_POST["message"]),FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
	$room = filter_var(trim($_POST["room"]),FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
	$user_ip = $_SERVER['REMOTE_ADDR'];
	
	if ($message==''){
		echo "<center style='margin:15px 0px 15px 0px; color:Red'>Maaf, Anda Belum Mengisikan Pesan...!!!</center>";
	}else{
		mysql_query("INSERT INTO rb_messages(user, message, room, ip_address) value('$username','$message','$room','$user_ip')");
			echo "<script>window.alert('Sukses Mengirimkan Pesan....');
						  window.location='index.php?view=detailpesanmasuk&send=ok&id=".$_POST[id]."'</script>";
	}
}
?>
<div style='margin-top:-20px; width:100%' class="content">				
	<article class="post-36 page type-page status-publish hentry post-listing post">
			<div class="post-inner">
				<h1 class="name post-title entry-title">
					<span itemprop="name">Pesan Masuk (Inbox)</span>
				</h1>
				<div class="entry">
						<?php 
							if (empty($_GET[send])){
							mysql_query("UPDATE rb_messages set stat=0 where room='$_SESSION[nomor]-$_GET[id]'");
							}
						?>
							<table>
								<form action='' method='POST' >
								<?php  
								  echo "<tr  bgcolor='#e3e3e3'>
									<td>$_SESSION[nama_lengkap]</td>
									<input name='username' type='hidden' value='$_SESSION[nomor]'/>
									<input name='room' type='hidden' value='$_GET[id]-$_SESSION[nomor]'/>
									<input name='id' type='hidden' value='$_GET[id]'/>
									<td width='65%'><textarea class='form-control' name='message'></textarea></td>
									<td><input style='width:100%' name='submit' type='submit' class='btn btn-primary' value='Kirimkan Pesan'></td>
								  </tr>
								</form>";
								
										$sql = mysql_query("SELECT id_members, user, message, date_time, nama_lengkap FROM (select * from rb_messages join rb_members on rb_messages.user=rb_members.id_members ORDER BY id DESC) rb_messages where room='$_SESSION[nomor]-$_GET[id]' OR room='$_GET[id]-$_SESSION[nomor]' ORDER BY rb_messages.id DESC LIMIT 10");	
										while($d=mysql_fetch_assoc($sql)){
										$tahun   = substr($d['date_time'],0,4);
										$bulan   = substr($d['date_time'],5,2);
										$tanggal = substr($d['date_time'],8,2);
										$jam     = substr($d['date_time'],11,8);

										$message = substr($d[message],0,64); $meesage_autolink = autolink($d[message]);
											echo "<tr>
												  <td><b style='color:red;  font-family:tahoma'>$d[nama_lengkap]</b></td>
												  <td style='color:#000; font-size:13px;  font-family:tahoma'>$meesage_autolink</td>
												  <td>$tanggal-$bulan-$tahun $jam WIB</td>
												</tr>";
										}
										?>
								</tbody>
						 </table>
				</div><!-- .entry /-->				
			</div><!-- .post-inner -->
	</article><!-- .post-listing -->
</div>