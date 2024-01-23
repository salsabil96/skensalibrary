<?php
  $edit = mysqli_query($koneksi, "UPDATE peminjaman SET status='Kembali' WHERE id_peminjaman='$peminjamanID'");
  if($edit) {
    $query = mysqli_query($koneksi, "SELECT * from peminjaman where id_peminjaman='$peminjamanID'");
    $simpan = mysqli_fetch_array($query);

    $pinjamID = $simpan[0];
    $tgl_kembali = $simpan[2];
    $bukuID = $simpan[4];
    $petugasID = $simpan[5];

    $query2 = mysqli_query($koneksi, "SELECT jumlah FROM buku WHERE id_buku='$bukuID'");
    $simpan2 = mysqli_fetch_array($query2);

    $jml = $simpan2[0]+1;

    $query3 = "UPDATE buku SET jumlah='$jml' WHERE id_buku='$bukuID'";
    $simpan3 = mysqli_query($koneksi, $query3);

    $query4 = "INSERT INTO pengembalian VALUES('', '$pinjamID', '$petugasID')";
    $simpan4 = mysqli_query($koneksi, $query4);

    if($simpan3 && $simpan4) { ?>
      <script>
        alert('Buku Sudah Dikembalikan !');
        document.location="admin.php?id=pengembalian";
      </script> <?php
    }
  }
?>
