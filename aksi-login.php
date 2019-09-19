<?php
session_start();
error_reporting(0);
include "config/koneksi.php";

$username = $_POST['email'];
$pass     = $_POST['pwd'];
$login=mysql_query("SELECT * FROM rb_members WHERE email='$username' AND no_telpon='$pass'");
$ketemu=mysql_num_rows($login);
$r=mysql_fetch_array($login);

if ($ketemu > 0){
mysql_query("UPDATE rb_members set login_total=login_total+1 where id_members='$r[id_members]'");
  session_start();
  $_SESSION[nomor]     		= $r[id_members];
  $_SESSION[nama_lengkap]   = $r[nama_lengkap];
  $pecah = explode(' ', $r[nama_lengkap]);
  $_SESSION[nama_depan]   = $pecah[0];
  $_SESSION[email]   = $r[email];
  $_SESSION[level]   = $r[level];

header('location:langganan.mu');
}
else{
	echo "<script>window.alert('Maaf, Username dan password salah,....');
				window.location='form-login.mu'</script>";
}

?>
