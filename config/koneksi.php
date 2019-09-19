<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "dbepaper";

mysql_connect($server,$username,$password) or die ("");
mysql_select_db($database) or die ("");

function anti_injection($data){
  $filter = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter;
}
?>