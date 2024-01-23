<?php
	session_start();
	require_once ("koneksi.php");
    
    if(isset($_POST['submit_login'])){
	$id_user  = $_POST ['id_user'];
	$pass     = md5($_POST ['pass']);
  	$cek_user = mysqli_query ($koneksi, "SELECT * FROM user WHERE id_user = '$id_user' and password = '$pass'");
	$jumlah   = mysqli_num_rows($cek_user);
	$hasil    = mysqli_fetch_array($cek_user);

	if($pass == $hasil['password']) {
		$_SESSION['level'] = $hasil['level'];
		$_SESSION['id_user'] = $hasil['id_user'];

		if($_SESSION['level'] == "admin"){ 
		    header("location:admin.php"); 
		} else if($_SESSION['level'] == "member"){
		    header("location:member.php");   
		} else {
		    header("location:login.php");
		}
	}
	else if (($id_user <> $hasil['id_user']) or ($pass <> $hasil ['password'])) { ?>
		<script language="JavaScript">
			alert('Username atau Password Salah!');
			document.location="index.php?id=login";
		</script> <?php
	}
	}
?>
