<?php
  $sql = "DELETE FROM kunjungan_anggota WHERE id_kunjungan = '$kunjunganID'";
	$simpan = mysqli_query($koneksi, $sql);
	if($simpan) { ?>
		<script>
			alert("Data Kunjungan Anggota berhasil dihapus !");
			document.location="admin.php?id=kunjungananggota";
		</script> <?php
	}
