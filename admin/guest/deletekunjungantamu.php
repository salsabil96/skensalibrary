<?php
  $sql = "DELETE FROM tamu_perpus WHERE id_tamu = '$tamuID'";
	$simpan = mysqli_query($koneksi, $sql);
	if($simpan) { ?>
		<script>
			alert("Data Kunjungan Tamu berhasil dihapus !");
			document.location="admin.php?id=kunjungantamu";
		</script> <?php
	}
