<?php
  $sql = mysqli_query($koneksi, "SELECT CURDATE() as 'pinjam', DATE_ADD(CURDATE(), INTERVAL 7 DAY) as 'kembali' FROM peminjaman");
  $ambil = mysqli_fetch_array($sql);

  $tgl_pinjam = $ambil['pinjam'];
  $tgl_kembali = $ambil['kembali'];

  $edit = mysqli_query($koneksi, "UPDATE peminjaman SET tanggal_pinjam = '$tgl_pinjam', tanggal_kembali = '$tgl_kembali' WHERE id_peminjaman='$peminjamanID'");
  if($edit) { ?>
      <script>
        alert('Buku Sudah DiPerpanjang !');
        document.location="admin.php?id=peminjaman";
      </script> <?php
  }
?>
