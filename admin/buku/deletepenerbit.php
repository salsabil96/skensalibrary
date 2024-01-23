<?php
$sql = "DELETE FROM penerbit WHERE id_penerbit = '$penerbitID'";
$simpan = mysqli_query($koneksi, $sql);
if($simpan) { ?>
	<script>
		alert("Data Penerbit berhasil dihapus !");
		document.location="admin.php?id=penerbit";
	</script> <?php
	}
?>
