<?php
session_start();
include "config/koneksi.php";
include "config/kodeauto.php";
$nomor_pendaftaran = kdauto("members","PHP");
	
	$nama_lengkap = anti_injection($_POST[nama_lengkap]);
	$alamat_email = anti_injection($_POST[alamat_email]);
	$no_telpon = anti_injection($_POST[no_telpon]);
	$alamat = anti_injection($_POST[alamat]);
	$tanggal = date("Ymd");
	$tanggal_lahir = "$_POST[tahun]-$_POST[bulan]-$_POST[tanggal]";

$valtelp = mysql_query("SELECT no_telpon FROM members where no_telpon='$_POST[no_telpon]'");
$hitungtelpon = mysql_num_rows($valtelp);
if ($nama_lengkap == ''){
  echo "Anda belum mengisikan NAMA LENGKAP<br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b>";
}elseif ((strlen($nama_lengkap)) < 10){
  echo "Nama Lengkap Minimal 10 Karakter<br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b>";
}elseif ($alamat_email == ''){
  echo "Anda belum mengisikan ALAMAT EMAIL<br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b>";
}elseif (!filter_var($alamat_email, FILTER_VALIDATE_EMAIL)) {
  echo "Masukkan alamat Email yang benar Bro!!!<br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b>";
}elseif ($no_telpon == ''){
  echo "Anda belum mengisikan NO TELPON<br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b>";
}elseif ((strlen($no_telpon)) < 10){
  echo "No Telpon Minimal 10 Karakter<br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b>";
}elseif (!is_numeric($no_telpon)){
  echo "Inputkan Angka untuk NO TELPON !!!<br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b>";
}elseif ($_POST[jk] == ''){
  echo "Anda belum Punya KELAMIN<br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b>";
}elseif ($_POST[pekerjaan] == ''){
  echo "Anda belum Memilih PEKERJAAN<br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b>";
}elseif ($_POST[tanggal] == ''){
  echo "Anda belum Memilih TANGGAL LAHIR<br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b>";
}elseif ($_POST[bulan] == ''){
  echo "Anda belum Memilih BULAN LAHIR<br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b>";
}elseif ($_POST[tahun] == ''){
  echo "Anda belum Memilih TAHUN LAHIR<br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b>";
}elseif ($alamat == ''){
  echo "Anda belum mengisikan ALAMAT<br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b>";
}elseif ((strlen($alamat)) < 25){
  echo "Isikan Alamat Lengkap Minimal 25 Karakter<br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b>";
}elseif ($hitungtelpon >= 1){
  echo "Maaf, No telpon Tersebut sudah terdaftar di system<br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b>";
}else{
		 $query = mysql_query("INSERT INTO members(no_pendaftaran,
												nama_lengkap,
												alamat_email,
												no_telpon,
												jenis_kelamin,
												pekerjaan,
												tanggal_lahir,
												alamat_lengkap,
												tanggal_daftar,
												status) 
									VALUES('$nomor_pendaftaran',
										   '$nama_lengkap',
										   '$alamat_email',
										   '$no_telpon',
										   '$_POST[jk]',
										   '$_POST[pekerjaan]',
										   '$tanggal_lahir',
										   '$alamat',
										   '$tanggal',
										   'N')");

$_SESSION[nomor]     = $nomor_pendaftaran;
$waktu_pesan = date("Y-m-d H:i:s");
$pesan_baru = 'Haloooo Selamat bergabung, Untuk menjadi Premium members, maka anda di wajibkan donasi Rp 300 ribu sekali untuk selamanya, 
keutamaan menjadi premium member : anda bisa mendapatkan semua file atau program apapun di www.phpmu.com semuanya 
tanpa terkecuali secara gratis, atau tanpa perlu donasi lagi, hubungi saya di 081267771344 untuk mengaktifkan account anda. Terima Kasih,...';
mysql_query("INSERT INTO messages(user,
								  message,
								  room,
								  date_time,
								  ip_address,
								  stat)
						VALUES   ('PHP0000001',
								  '$pesan_baru',
								  '$_SESSION[nomor]-PHP0000001',
								  '$waktu_pesan',
								  '36.68.36.103',
								  '1')");
echo "<script>window.alert('Sukses Terdaftar Sebagai Members.');
				window.location='php.mu'</script>";	
}						   
	
?>