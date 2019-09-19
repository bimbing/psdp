function messagee(form){
		  if (form.message.value == ""){
			alert("Maaf, Anda belum mengisikan Pesan.");
			form.message.focus();
			return (false);
		  }
	 return (true);	  
}

function login(form){
		  if (form.email.value == ""){
			alert("Maaf, Anda belum mengisikan Email.");
			form.email.focus();
			return (false);
		  }
		  pola_email=/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
		  if (!pola_email.test(form.email.value)){
			alert ('Penulisan Alamat Email tidak benar!!!');
			form.email.focus();
			return false;
		  }
		  if (form.pwd.value == ""){
			alert("Maaf, Password Anda Masih Kosong.");
			form.pwd.focus();
			return (false);
		  }
	 return (true);	  
}

function konfirmasi(form){
		  if (form.aa.value == ""){
			alert("Anda belum mengisi Nama Pemegang Rekening.");
			form.aa.focus();
			return (false);
		  }
		  if (form.bb.value == ""){
			alert("Maaf, Anda belum mengisikan No Rekening.");
			form.bb.focus();
			return (false);
		  }
		  
		  if (form.bb.value != ""){
		  var x = (form.bb.value);
		  var status = true;
		  var list = new Array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
		  for (i=0; i<=x.length-1; i++)
		  {
		  if (x[i] in list) cek = true;
		  else cek = false;
		 status = status && cek;
		  }
		  if (status == false)
		  {
		  alert("No Rekening harus angka semua Broo!");
		  form.bb.focus();
		  return false;
		  }
		  }
		  
		  if (form.cc.value == ""){
			alert("Maaf, Anda belum memilih Cara Pembayaran.");
			form.cc.focus();
			return (false);
		  }
		  if (form.dd.value == ""){
			alert("Maaf, Anda belum mengisi Rek Tujuan.");
			form.dd.focus();
			return (false);
		  }
		  if (form.ee.value == ""){
			alert("Maaf, Anda belum mengisikan Total Transfer.");
			form.ee.focus();
			return (false);
		  }
		  if (form.ff.value == ""){
			alert("Maaf, Anda belum mengisikan Tanggal bayar.");
			form.ff.focus();
			return (false);
		  }
	 return (true);	  
}

function validasi(form){
		  if (form.a.value == ""){
			alert("Anda belum mengisikan Nama Lengkap.");
			form.a.focus();
			return (false);
		  }

var minc = 6;
		  if (form.a.value.length < minc){
			alert("Panjang Nama Lengkap Minimal 10 Karakter!");
			form.a.focus();
			return (false);
		  }
			 
		  if (form.b.value == ""){
			alert("Anda belum mengisikan Alamat Email.");
			form.b.focus();
			return (false);
		  }

		  pola_email=/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
		  if (!pola_email.test(form.b.value)){
			alert ('Penulisan Alamat Email tidak benar!!!');
			form.b.focus();
			return false;
		  }
		  
		  if (form.c.value == ""){
			alert("Anda belum mengisikan No Telepon.");
			form.c.focus();
			return (false);
		  }
		  
		if (form.c.value != ""){
		  var x = (form.c.value);
		  var status = true;
		  var list = new Array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
		  for (i=0; i<=x.length-1; i++)
		  {
		  if (x[i] in list) cek = true;
		  else cek = false;
		 status = status && cek;
		  }
		  if (status == false)
		  {
		  alert("No Telpon harus angka semua Broo!");
		  form.c.focus();
		  return false;
		  }
		  }

		  var mincarr = 10;
		  if (form.c.value.length < mincarr){
			alert("Panjang No Telpon Minimal 10 Karakter!");
			form.c.focus();
			return (false);
		  }
		  
		  if (form.d.value == ""){
			alert("Anda belum Mengisi Alamat Lengkap.");
			form.d.focus();
			return (false);
		  }
		  
		  if (form.paket.value == "0"){
			alert("Anda belum Memilih Paket Langganan.");
			form.paket.focus();
			return (false);
		  }
		  
		  return (true);
}
