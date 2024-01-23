<?php
  $sql = "DELETE FROM pengembalian WHERE id_pengembalian = '$kembaliID'";
	$simpan = mysqli_query($koneksi, $sql);
	if($simpan) { ?>
		<script>
			alert("Data Pengembalian berhasil dihapus !");
			document.location="admin.php?id=pengembalian";
		</script> <?php
	}
