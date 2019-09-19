<?php
include "config/koneksi.php"; 
$file = "files/$_GET[file]";
mysql_query("UPDATE rb_produk set hits = hits + 1 where nama_file='$_GET[file]'");
header('Content-type: application/pdf');
header('Content-Disposition: inline; filename="files/$_GET[file]"');
header('Content-Length: ' . filesize($file));
ob_clean();
flush();
readfile($file);
exit;


?>