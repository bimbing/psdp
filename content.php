<?php 
if ($_GET[view]==''){ 
echo "<section class='cat-box wide-cat-box tie-cat-3'>
			<h2 class='cat-box-title'><a href='#'>e-paper</a></h2>
			<div class='cat-box-content'>
				<center>";
					include "home.php";	
				echo "</center>
			<div class='clear'></div>
			</div>
	</section>";	
}

elseif ($_GET[view]=='hubungi'){ 
	include "hubungi.php";
}

elseif ($_GET[view]=='hubungiaksi'){ 
	include "hubungi-aksi.php";
}

elseif ($_GET[view]=='pendaftaran'){ 
	include "pendaftaran.php";
}

elseif ($_GET[view]=='halaman'){ 
	include "halaman.php";
}

elseif ($_GET[view]=='login'){ 
	include "login.php";
}

elseif ($_GET[view]=='statistik'){
	if ($_SESSION[level] == 'Admin'){
		include "statistik.php";	
	}
}

elseif ($_GET[view]=='langganan'){
	include "langganan.php";			  
}

elseif ($_GET[view]=='upgradelangganan'){
	include "langganan-upgrade.php";			  
}

elseif ($_GET[view]=='listlangganan'){
	if ($_SESSION[level] == 'Admin'){
		include "langganan-list.php";	
	}
}

elseif ($_GET[view]=='kelolahubungi'){
	if ($_SESSION[level] == 'Admin'){
		include "hubungi-kelola.php";	
	}
}

elseif ($_GET[view]=='konfirmasi'){
	include "konfirmasi.php";	  
}

elseif ($_GET[view]=='pesanmasuk'){
	include "pesan-masuk.php";	  
}

elseif ($_GET[view]=='detailpesanmasuk'){
	include "pesan-masuk-detail.php";	  
}

elseif ($_GET[view]=='detailaccount'){
	include "account.php";	  
}

elseif ($_GET[view]=='lihatdetailaccount'){
	if ($_SESSION[level] == 'Admin'){
		include "account-detail.php";
	}
}

elseif ($_GET[view]=='tambahkanepaper'){
	if ($_SESSION[level] == 'Admin'){
		include "tambah-epaper.php";
	}
}

else{
	echo "<center style='margin:15%'><h1 class='name post-title entry-title'>Maaf, Modul yang anda akses Belum Tersedia !!!</h1></center>";
}
?>