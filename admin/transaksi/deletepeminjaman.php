<?php
  $sql = "DELETE FROM peminjaman WHERE id_peminjaman = '$peminjamanID'";
	$simpan = mysqli_query($koneksi, $sql);
	if($simpan) { ?>
		<script>
			alert("Data Peminjaman berhasil dihapus !");
			document.location="admin.php?id=peminjaman";
		</script> <?php
	}
