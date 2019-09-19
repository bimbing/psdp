<div style='margin-top:-20px; width:100%' class="content">					
		<article class="post-36 page type-page status-publish hentry post-listing post">
				<div class="post-inner">
					<h1 class="name post-title entry-title">
						<span itemprop="name">Kelola Pesan Masuk dari Non Members</span>
						<form style='float:right' action='manage-hubungi.mu' method='POST'>
							<input type='text' name='cari' placeholder='Cari Nama / email,...'>
						</form>
					</h1>
					<div class="entry">
						<table>
							<tr bgcolor='#e3e3e3'>
								<th>No</th>
								<th>Nama Pengirim</th>
								<th>Alamat Email</th>
								<th>Website</th>
								<th>Waktu Masuk</th>
								<th>Action</th>
							</tr>
							<?php 
								$per_page = 10;
								if (isset($_POST[cari])){
									$page_query = mysql_query("SELECT * FROM rb_hubungi where nama LIKE '%$_POST[cari]%' OR email LIKE '%$_POST[cari]%'");
								}else{
									$page_query = mysql_query("SELECT COUNT(*) FROM rb_hubungi");
								}
								$pages = ceil(mysql_result($page_query, 0) / $per_page);
								$page = (isset($_GET['p'])) ? (int)$_GET['p'] : 1;
								$start = ($page - 1) * $per_page;
								if (isset($_POST[cari])){
									$query = mysql_query("SELECT * FROM rb_hubungi where nama LIKE '%$_POST[cari]%' OR email LIKE '%$_POST[cari]%' ORDER BY id_hubungi DESC LIMIT $start, $per_page");
								}else{
									$query = mysql_query("SELECT * FROM rb_hubungi ORDER BY id_hubungi DESC LIMIT $start, $per_page");
								}
								$no = $start + 1;
								while ($r = mysql_fetch_array($query)){
									echo "<tr>
											 <td>$no</td>
											 <td>$r[nama]</td>
											 <td>$r[email]</td>
											 <td>$r[website]</td>
											 <td>$r[tanggal], $r[jam] WIB</td>";

												echo "<div id='openModall$no' class='modalDialog'>
													<div>
														<a href='#close' title='Close' class='close'>X</a>
														<h3>From : $r[nama]</h3>
														<p style='background:#fff; padding:15px; margin-bottom:10px'>$r[pesan]</p>
														<i style='float:right; font-size:11px' >Pada : $r[tanggal], $r[jam] WIB</i><br>
													</div>
												</div>";
												
												echo "<td align=center><b style='color:$color'><a class='btn-blue' href='#openModall$no'>Baca Pesan</a></b></td>";
										  echo "</tr>"; 
									$no++;
								}
								
										echo "</table><ul class='pagination' style='margin-bottom:-35px'>
											<li class='disabled'><a href='#'>&laquo;</a></li>";
											if($pages >= 1 && $page <= $pages){
												for($x=1; $x<=$pages; $x++){
													echo ($x == $page) ? '
														<li class="active"><a href="manage-hubungi-page-'.$x.'.mu">'.$x.'</a></li> ' : '
														<li><a href="manage-hubungi-page-'.$x.'.mu">'.$x.'</a> </li>';
												}
													echo "<li class='disabled'><a href='#'>&raquo;</a></li>
												</ul>"; 
											}
							?>
					</div><!-- .entry /-->				
				</div><!-- .post-inner -->
		</article><!-- .post-listing -->
</div>