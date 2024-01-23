<?php
  $query1 = mysqli_query($koneksi, "SELECT id_anggota from anggota WHERE id_user='$id_user'");
  $ambil1 = mysqli_fetch_array($query1);
  $id_anggota = $ambil1[0];

   $query = "INSERT INTO bookmark VALUES('','$id_anggota','$bukuID','ya')";
   $simpan = mysqli_query($koneksi, $query) or die (mysqli_connect_error());
   if($simpan) { ?>
       <script>
          alert("Buku Berhasil di Bookmark !");
          document.location="member.php?id=bookmark";
       </script> <?php
   }
?>
