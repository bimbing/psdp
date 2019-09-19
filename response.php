<?php 
session_start();
include "config/koneksi.php";
$belumbacaaa=mysql_query("select * from rb_messages where stat='1' AND user!='$_SESSION[nomor]' AND room LIKE '%$_SESSION[nomor]%'");
$yaat = mysql_num_rows($belumbacaaa);
echo "$yaat";
?>