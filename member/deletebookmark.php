<?php
  $sql = "DELETE FROM bookmark WHERE id_bookmark = '$bookmarkID'";
	$simpan = mysqli_query($koneksi, $sql);
	if($simpan) { ?>
		<script>
			alert("Bookmark berhasil dihapus !");
			document.location="member.php?id=bookmark";
		</script> <?php
	}
