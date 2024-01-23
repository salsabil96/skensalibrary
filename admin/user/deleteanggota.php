<?php
  $sql = "DELETE FROM anggota WHERE id_anggota = '$anggotaID'";
	$simpan = mysqli_query($koneksi, $sql) or die ("tidak berhasil");
	if($simpan) { ?>
		<script>
			alert("Data Anggota berhasil dihapus !");
			document.location="admin.php?id=anggota";
		</script> <?php
	}
