<?php
$sql = "DELETE FROM pengarang WHERE id_pengarang = '$pengarangID'";
$simpan = mysqli_query($koneksi, $sql);
if($simpan) { ?>
	<script>
		alert("Data Pengarang berhasil dihapus !");
		document.location="admin.php?id=pengarang";
	</script> <?php
	}
?>
