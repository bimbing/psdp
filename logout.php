<?php
  session_start();
include "config/koneksi.php";
if (!empty($_SESSION[nomor])){
	$login_terakhir = date("Y-m-d H:i:s");
	mysql_query("UPDATE rb_members set login_terakhir='$login_terakhir' where id_members='$_SESSION[nomor]'");
}

  session_destroy();
  header('Location:home.mu');
	die();
		
?>