<?php
$sql = "DELETE FROM buku WHERE id_buku = '$bukuID'";
$simpan = mysqli_query($koneksi, $sql);
if($simpan) { ?>
	<script>
		alert("Data Buku berhasil dihapus !");
		document.location="admin.php?id=buku";
	</script> <?php
	}
?>
