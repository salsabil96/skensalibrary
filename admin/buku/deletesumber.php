<?php
$sql = "DELETE FROM sumber WHERE id_sumber = '$sumberID'";
$simpan = mysqli_query($koneksi, $sql);
if($simpan) { ?>
	<script>
		alert("Data Sumber berhasil dihapus !");
		document.location="admin.php?id=sumber";
	</script> <?php
	}
?>