<?php 

?>
<div style='margin-top:-20px; width:100%' class="content">					
		<article class="post-36 page type-page status-publish hentry post-listing post">
				<div class="post-inner">
					<h1 class="name post-title entry-title">
						<span itemprop="name">Tambahkan File E-paper Terbaru</span>
						<form style='float:right' action='tambahkan-epaper.mu' method='POST'>
							<input type='text' name='cari' placeholder='Cari judul / Keterangan,...'>
						</form>
					</h1>
					<div class="entry">
						<a class='btn-blue' href='#'>Tambahkan E-Paper</a><hr>
						<table>
							<tr bgcolor='#e3e3e3'>
								<th>No</th>
								<th>Judul</th>
								<th>File E-paper</th>
								<th>Keterangan</th>
								<th>Waktu Posting</th>
								<th>Hits</th>
								<th>Action</th>
							</tr>
							<?php 
								$per_page = 10;
								if (isset($_POST[cari])){
									$page_query = mysql_query("SELECT * FROM rb_produk where judul LIKE '%$_POST[cari]%' OR keterangan LIKE '%$_POST[cari]%'");
								}else{
									$page_query = mysql_query("SELECT COUNT(*) FROM rb_produk");
								}
								$pages = ceil(mysql_result($page_query, 0) / $per_page);
								$page = (isset($_GET['p'])) ? (int)$_GET['p'] : 1;
								$start = ($page - 1) * $per_page;
								if (isset($_POST[cari])){
									$query = mysql_query("SELECT * FROM rb_produk where judul LIKE '%$_POST[cari]%' OR keterangan LIKE '%$_POST[cari]%' ORDER BY id_produk DESC LIMIT $start, $per_page");
								}else{
									$query = mysql_query("SELECT * FROM rb_produk ORDER BY id_produk DESC LIMIT $start, $per_page");
								}
								$no = $start + 1;
								while ($r = mysql_fetch_array($query)){
									echo "<tr>
											 <td>$no</td>
											 <td>$r[judul]</td>
											 <td><a style='color:red; text-decoration:underline;' href='downlot.php?file=$r[nama_file]'>Download</a></td>
											 <td>$r[keterangan]</td>
											 <td>$r[tgl_posting], $r[jam] WIB</td>
											 <td>$r[hits] Kali</td>
											 <td><a class='btn-blue' href=''>Edit</a> <a class='btn' href=''>Hapus</a></td>";
										  echo "</tr>"; 
									$no++;
								}
								
										echo "</table><ul class='pagination' style='margin-bottom:-35px'>
											<li class='disabled'><a href='#'>&laquo;</a></li>";
											if($pages >= 1 && $page <= $pages){
												for($x=1; $x<=$pages; $x++){
													echo ($x == $page) ? '
														<li class="active"><a href="tambahkan-epaper-page-'.$x.'.mu">'.$x.'</a></li> ' : '
														<li><a href="tambahkan-epaper-page-'.$x.'.mu">'.$x.'</a> </li>';
												}
													echo "<li class='disabled'><a href='#'>&raquo;</a></li>
												</ul>"; 
											}
							?>
					</div><!-- .entry /-->				
				</div><!-- .post-inner -->
		</article><!-- .post-listing -->
</div>