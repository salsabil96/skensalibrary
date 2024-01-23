<?php
if(isset($_GET['id'])) {
	//ROUTE FOR ALL PRIVILEGES
	if($_GET['id'] == "login")		  { include "login.php";		exit(); }
	if($_GET['id'] == "loginprocess") { include "loginprocess.php"; exit(); }
	if($_GET['id'] == "logout") 	  {	include "logout.php";		exit();	}
	if($_GET['id'] == "kunjungan") 	  { include "kunjungan.php";	exit(); }

	//ROUTE FOR ADMIN
	if($_GET['id'] == "viewprofile") { include "./admin/viewprofile.php"; 	  	  exit(); }
	if($_GET['id'] == "anggota") 	 { include "./admin/user/viewanggota.php"; 	  exit(); }
	if($_GET['id'] == "petugas") 	 { include "./admin/user/viewpetugas.php"; 	  exit(); }
	if($_GET['id'] == "useraccount") { include "./admin/user/viewuseraccount.php"; exit(); }

	if($_GET['id'] == "golongan")  { include "./admin/buku/viewgolongan.php";  exit(); }
	if($_GET['id'] == "sumber")    { include "./admin/buku/viewsumber.php";	  exit(); }
	if($_GET['id'] == "penerbit")  { include "./admin/buku/viewpenerbit.php";  exit(); }
	if($_GET['id'] == "pengarang") { include "./admin/buku/viewpengarang.php"; exit(); }
	if($_GET['id'] == "buku") 	   { include "./admin/buku/viewbuku.php";  	  exit(); }

	if($_GET['id'] == "peminjaman")   { include "./admin/transaksi/viewpeminjaman.php";   exit(); }
	if($_GET['id'] == "pengembalian") {	include "./admin/transaksi/viewpengembalian.php"; exit(); }

	if($_GET['id'] == "kunjungananggota") {	include "./admin/guest/viewkunjungananggota.php"; exit(); }
	if($_GET['id'] == "kunjungantamu") 	  {	include "./admin/guest/viewkunjungantamu.php";  	 exit(); }
	if($_GET['id'] == "pengembalian") 	  { include "./admin/transaksi/viewpengembalian.php"; exit(); }

	if($_GET['id'] == "searchanggota") 			{ include "./admin/user/searchanggota.php"; 			 exit(); }
	if($_GET['id'] == "searchpetugas") 			{ include "./admin/user/searchpetugas.php"; 			 exit(); }
	if($_GET['id'] == "searchuseraccount")  	{ include "./admin/user/searchuseraccount.php";		 exit(); }
	if($_GET['id'] == "searchbuku") 			{ include "./admin/buku/searchbuku.php";				 exit(); }
	if($_GET['id'] == "searchpengarang") 		{ include "./admin/buku/searchpengarang.php";		 exit(); }
	if($_GET['id'] == "searchpenerbit") 		{ include "./admin/buku/searchpenerbit.php";			 exit(); } 
	if($_GET['id'] == "searchsumber") 			{ include "./admin/buku/searchsumber.php";			 exit(); }
	if($_GET['id'] == "searchpinjam") 			{ include "./admin/transaksi/searchpinjam.php";		 exit(); }
	if($_GET['id'] == "searchkembali") 			{ include "./admin/transaksi/searchkembali.php";		 exit(); }
	if($_GET['id'] == "searchkunjungantamu") 	{ include "./admin/guest/searchkunjungantamu.php";	 exit(); }
	if($_GET['id'] == "searchkunjungananggota") { include "./admin/guest/searchkunjungananggota.php"; exit(); }

	if($_GET['id'] == "addanggota") 		 { include "./admin/user/addanggota.php"; 	   	   exit(); }
	if($_GET['id'] == "addpetugas") 		 { include "./admin/user/addpetugas.php"; 		   exit(); }
	if($_GET['id'] == "adduseraccount") 	 { include "./admin/user/adduseraccount.php";	   exit(); }
	if($_GET['id'] == "addsumber") 			 { include "./admin/buku/addsumber.php";		   exit(); }
	if($_GET['id'] == "addpenerbit") 		 { include "./admin/buku/addpenerbit.php";		   exit(); }
	if($_GET['id'] == "addpengarang")  	 	 { include "./admin/buku/addpengarang.php";		   exit(); }
	if($_GET['id'] == "addbuku") 		 	 { include "./admin/buku/addbuku.php";			   exit(); }
	if($_GET['id'] == "addpeminjaman")  	 { include "./admin/transaksi/addpeminjaman.php";   exit(); }

	if($_GET['id'] == "detailuser") { if(isset($_GET['userID'])) { $userID = $_GET['userID']; }
		include "./admin/user/detailuser.php"; exit(); }
	if($_GET['id'] == "editanggota") { if(isset($_GET['anggotaID'])) { $anggotaID = $_GET['anggotaID']; }
		include "./admin/user/editanggota.php"; exit(); }
	if($_GET['id'] == "editpetugas") { if(isset($_GET['petugasID'])) { $petugasID = $_GET['petugasID']; }
		include "./admin/user/editpetugas.php"; exit(); }
	if($_GET['id'] == "edituseraccount") { if(isset($_GET['userID'])) 	  { $userID = $_GET['userID']; }
		include "./admin/user/edituseraccount.php"; exit(); }
	if($_GET['id'] == "editgolongan") 	 { if(isset($_GET['golonganID'])) { $golonganID = $_GET['golonganID']; }
		include "./admin/buku/editgolongan.php";	   exit(); }
	if($_GET['id'] == "editsumber") 	 { if(isset($_GET['sumberID']))   {	$sumberID = $_GET['sumberID']; }
		include "./admin/buku/editsumber.php";  	   exit(); }
	if($_GET['id'] == "editpenerbit") 	 { if(isset($_GET['penerbitID'])) {	$penerbitID = $_GET['penerbitID']; }
		include "./admin/buku/editpenerbit.php";    exit(); }
	if($_GET['id'] == "editpengarang")   { if(isset($_GET['pengarangID'])) { $pengarangID = $_GET['pengarangID']; }
		include "./admin/buku/editpengarang.php";   exit(); }
	if($_GET['id'] == "editbuku") 		 { if(isset($_GET['bukuID'])) 	   { $bukuID = $_GET['bukuID']; }
		include "./admin/buku/editbuku.php"; 	   exit(); }

	if($_GET['id'] == "deleteanggota") { if(isset($_GET['anggotaID'])) { $anggotaID = $_GET['anggotaID']; }
		include "./admin/user/deleteanggota.php";	exit(); }
	if($_GET['id'] == "deletepetugas") { if(isset($_GET['petugasID'])) { $petugasID = $_GET['petugasID']; }
		include "./admin/user/deletepetugas.php";	exit(); }
	if($_GET['id'] == "deleteuseraccount") { if(isset($_GET['userID'])) { $userID = $_GET['userID']; }
		include "./admin/user/deleteuseraccount.php"; exit(); }
	if($_GET['id'] == "deletesumber") 	 { if(isset($_GET['sumberID'])) { $sumberID = $_GET['sumberID']; }
		include "./admin/buku/deletesumber.php"; exit(); }
	if($_GET['id'] == "deletepenerbit")  { if(isset($_GET['penerbitID'])) { $penerbitID = $_GET['penerbitID']; }
		include "./admin/buku/deletepenerbit.php";	exit(); }
	if($_GET['id'] == "deletepengarang") { if(isset($_GET['pengarangID'])) { $pengarangID = $_GET['pengarangID']; }
		include "./admin/buku/deletepengarang.php";	exit(); }
	if($_GET['id'] == "deletebuku") 	 { if(isset($_GET['bukuID'])) { $bukuID = $_GET['bukuID']; }
		include "./admin/buku/deletebuku.php"; 		exit(); }
	if($_GET['id'] == "deletepeminjaman") 		{ if(isset($_GET['peminjamanID'])) { $peminjamanID = $_GET['peminjamanID']; }
		include "./admin/transaksi/deletepeminjaman.php";	exit(); }
	if($_GET['id'] == "deletepengembalian") 	{ if(isset($_GET['kembaliID'])) {	$kembaliID = $_GET['kembaliID']; }
		include "./admin/transaksi/deletepengembalian.php";	exit(); }
	if($_GET['id'] == "deletekunjungananggota") { if(isset($_GET['kunjunganID'])) { $kunjunganID = $_GET['kunjunganID']; }
		include "./admin/guest/deletekunjungananggota.php";	exit(); }
	if($_GET['id'] == "deletekunjungantamu")    { if(isset($_GET['tamuID'])) { $tamuID = $_GET['tamuID']; }
		include "./admin/guest/deletekunjungantamu.php";		exit(); }
	if($_GET['id'] == "kembali") 	{ if(isset($_GET['peminjamanID'])) { $peminjamanID = $_GET['peminjamanID']; }
		include "./admin/transaksi/statuskembali.php";		exit(); }
	if($_GET['id'] == "perpanjang") { if(isset($_GET['peminjamanID'])) { $peminjamanID = $_GET['peminjamanID']; }
		include "./admin/transaksi/statusperpanjang.php";	exit(); }


	//ROUTE FOR MEMBER
	if($_GET['id'] == "formkunjungananggota") { include "formkunjungananggota.php";	 exit(); }
	if($_GET['id'] == "search") 			  { include "./member/caribuku.php"; 	 exit(); }
	if($_GET['id'] == "hasil") 				  { include "./member/hasilcaribuku.php"; exit(); }
	if($_GET['id'] == "riwayatpinjam") 		  { include "./member/riwayatpinjam.php"; exit(); }
	if($_GET['id'] == "viewprofil") 		  { include "./member/viewprofil.php";	 exit(); }
	if($_GET['id'] == "bookmark") 			  { include "./member/bookmark.php"; 	 exit(); }
	if($_GET['id'] == "addbookmark") 	{ if(isset($_GET['bukuID'])) { $bukuID = $_GET['bukuID']; }
		include "./member/addbookmark.php"; 	  exit(); }
	if($_GET['id'] == "deletebookmark") {if(isset($_GET['bookmarkID'])) { $bookmarkID = $_GET['bookmarkID']; }
		include "./member/deletebookmark.php"; exit(); }
	
	
	//ROUTE FOR GUEST
	if($_GET['id'] == "formkunjungantamu") { include "formkunjungantamu.php"; exit(); }
	if($_GET['id'] == "caribuku") 		   { include "./tamu/caribuku.php";		  exit(); }
	if($_GET['id'] == "hasilpencarian")    { include "./tamu/hasilcaribuku.php";	  exit(); }
}
?>