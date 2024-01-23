<?php
  $sql = "DELETE FROM petugas WHERE id_petugas = '$petugasID'";
	$simpan = mysqli_query($koneksi, $sql) or die ("tidak berhasil");
	if($simpan) { ?>
		<script>
			alert("Data Petugas berhasil dihapus !");
			document.location="admin.php?id=petugas";
		</script> <?php
	}
