<?php
  $perintah = "SELECT peminjaman.tanggal_pinjam, peminjaman.tanggal_kembali, buku.judul_buku, peminjaman.status FROM peminjaman JOIN anggota on (peminjaman.id_anggota=anggota.id_anggota) JOIN buku ON (buku.id_buku=peminjaman.id_buku) WHERE anggota.id_user='$id_user'";
  $result = mysqli_query($koneksi, $perintah);
?>

<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-laptop"></i> Riwayat Peminjaman</h3>
        <ul class="breadcrumb">
          <li><i class="fa fa-home"></i><a href="member.php">Home</a></li>
          <li><i class="fa fa-file-text-o"></i>Riwayat Peminjaman</li>
        </ul>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <table class="table table-striped table-advance table-hover">
          <tbody>
            <tr>
              <th>No</th>
              <th>Tanggal Pinjam</th>
              <th>Tanggal Kembali</th>
              <th>Judul Buku</th>
              <th>Status</th>
            </tr> <?php
            $no=1;
            while($data = mysqli_fetch_array($result)){ ?>
            <tr> <?php
              echo "<td>$no</td>";
              echo "<td>$data[0]</td>";
              echo "<td>$data[1]</td>";
              echo "<td>$data[2]</td>";
              echo "<td>$data[3]</td>";
              $no++;
             ?>
           </tr> <?php
         } ?>
         </tbody>
       </table>
     </div>
   </div>
  </section>
</section>
<br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php include "./layout/footer.php"; ?>
