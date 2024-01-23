<?php
  $sql = "DELETE FROM user WHERE id_user = '$userID'";
	$simpan = mysqli_query($koneksi, $sql) or die ("tidak berhasil");
	if($simpan) { ?>
		<script>
			alert("Data User Account berhasil dihapus !");
			document.location="admin.php?id=useraccount";
		</script> <?php
	}
