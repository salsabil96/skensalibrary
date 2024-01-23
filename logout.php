<?php
	session_start();
	unset($_SESSION ['id_admin']); ?>
	<script language="JavaScript">
		alert('Anda telah berhasil logout !');
		document.location="index.php";
	</script>
?>