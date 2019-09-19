<div style='margin-top:-20px; width:100%' class="content">				
	<article class="post-36 page type-page status-publish hentry post-listing post">
			<div class="post-inner">
				<h1 class="name post-title entry-title">
					<span itemprop="name">
					<?php
						if ($_SESSION[level] == 'Admin'){
							echo "Pesan Masuk Dari Pelanggan";
						}else{
							echo "Hubungi Admin E-Paper Singgalang";
						}
					?>
					</span>
				</h1>
				<div class="entry">
						<table> 
								  <tr bgcolor='#e3e3e3'>
									<th>No</th>
									<?php
										if ($_SESSION[level] == 'Admin'){
											echo "<th>Pengirim Pesan</th>
												  <th>Ringkasan Pesan</th>
												  <th>Waktu / Tanggal</th>
												  <th style='text-align:center' width='120px'>Action</th>";
										}else{
											echo "<th>Nama Admin</th>
												  <th>No Telepon</th>
												  <th>Alamat Email</th>
												  <th style='text-align:center' width='200px'></th>";
										}
								  echo "</tr>";
									
										if ($_SESSION[level] == 'Admin'){
											$sql = mysql_query("select MAX(id) AS id, MAX(message) AS message, MAX(id_members) AS no_pendaftaran, MAX(user) AS user, MAX(room) AS romm, MAX(nama_lengkap) as nama_lengkap, MAX(date_time) as date_time, MAX(stat) as stat from rb_messages join rb_members on rb_messages.user=rb_members.id_members where user!='$_SESSION[nomor]' AND room LIKE '$_SESSION[nomor]%' GROUP BY user ORDER BY id DESC LIMIT 20");	
										}else{
											$sql = mysql_query("select MAX(id) AS id, MAX(message) AS message, MAX(id_members) AS no_pendaftaran, MAX(user) AS user, MAX(room) AS romm, MAX(nama_lengkap) as nama_lengkap, MAX(no_telpon) as no_telpon, MAX(email) as email, MAX(date_time) as date_time, MAX(stat) as stat from rb_messages join rb_members on rb_messages.user=rb_members.id_members where rb_members.level='Admin' GROUP BY user ORDER BY id DESC LIMIT 20");	
										}
									
										$no = $start+1;
										while($d=mysql_fetch_assoc($sql)){
										$tahun   = substr($d['date_time'],0,4);
										$bulan   = substr($d['date_time'],5,2);
										$tanggal = substr($d['date_time'],8,2);
										$jam     = substr($d['date_time'],11,8);
										if ($d[stat] == '1'){ $id = 'deep'; }else{ $id = ''; }
										$message = substr($d[message],0,64);
										if ($_SESSION[level] == 'Admin'){
											echo "<tr>
												  <td>$no</td>
												  <td><a style='color:red; font-weight:bold; font-family:tahoma' href='detail-account-$d[no_pendaftaran].mu'>$d[nama_lengkap]</a></td>
												  <td  style='color:#000; font-size:13px; font-family:tahoma'>$message,....</td>
												  <td>$tanggal-$bulan-$tahun $jam WIB</td>
												  <td><a class='btn' href='detail-pesan-masuk-$d[no_pendaftaran].mu'><b id='".$id."'> Read / Reply </b></a></td>
												</tr>";
										}else{
											echo "<tr>
												  <td>$no</td>
												  <td><b style='color:red;  font-family:tahoma'>$d[nama_lengkap]</b></td>
												  <td><span style='font-family:tahoma'>$d[no_telpon]</span></td>
												  <td><span style='font-family:tahoma'>$d[email]</span></td>
												  <td><a class='btn-blue' href='detail-pesan-masuk-$d[no_pendaftaran].mu'> &raquo; Baca Pesan / Kirimkan Pesan </a></td>
												</tr>";
										}
											$no++;
										}
									?>
						 </table>
				</div><!-- .entry /-->				
			</div><!-- .post-inner -->
	</article><!-- .post-listing -->
</div>