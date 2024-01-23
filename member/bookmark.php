<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-laptop"></i> Bookmark</h3>
        <ul class="breadcrumb">
          <li><i class="fa fa-home"></i><a href="member.php">Home</a></li>
          <li><i class="fa fa-file-text-o"></i>Data Bookmark</li>
        </ul>
      </div>
    </div>
    <?php
        $query1 = mysqli_query($koneksi, "SELECT id_anggota from anggota WHERE id_user='$id_user'");
        $ambil1 = mysqli_fetch_array($query1);
        $id_anggota = $ambil1[0];

        $perintah = "SELECT buku.judul_buku, buku.tahun, buku.call_number, pengarang.nama_pengarang, penerbit.nama_penerbit, buku.jumlah, golongan.no_rak, bookmark.id_bookmark FROM bookmark JOIN buku on (bookmark.id_buku=buku.id_buku) JOIN pengarang on (buku.id_pengarang=pengarang.id_pengarang) JOIN penerbit on (buku.id_penerbit=penerbit.id_penerbit) JOIN golongan on (buku.id_golongan=golongan.id_golongan) WHERE bookmark.id_anggota='$id_anggota'";

        $result = mysqli_query($koneksi, $perintah);
        $total = mysqli_num_rows($result);
        if($total == 0){
          echo "Tidak ada data bookmark";
        }
        else { ?>
          <div class="row">
            <div class="col-lg-12">
              <table class="table table-striped table-advance table-hover">
                <tbody>
                  <tr>
                    <th>No</th>
                    <th>Status</th>
                    <th>Judul Buku</th>
                    <th>Tahun Terbit</th>
                    <th>Call Number</th>
                    <th>Pengarang</th>
                    <th>Penerbit</th>
                    <th>No.Rak</th>
                    <th>Action</th>
                  </tr> <?php
                  $no=1;
                  while($data = mysqli_fetch_array($result)){ ?>
                    <tr> <?php
                      if($data[5]==0){
                        $status="Masih Dipinjam"; }
                      else { $status="Tersedia"; }

                      echo "<td>$no</td>";
                      if($data[5]==0){
                        echo "<td><font color='red'>$status</font></td>";
                      }
                      else{
                        echo "<td><font color='blue'>$status</font></td>";
                      }
                      echo "<td>$data[0]</td>";
                      echo "<td>$data[1]</td>";
                      echo "<td>$data[2]</td>";
                      echo "<td>$data[3]</td>";
                      echo "<td>$data[4]</td>";
                      echo "<td>$data[6]</td>"; ?>
                      <td><a class="btn btn-danger" href="member.php?id=deletebookmark&bookmarkID=<?php echo $data[7]; ?>"><i class="icon_close_alt2"></i> Hapus Bookmark</a></td> <?php
                      $no++;
                     ?>
                   </tr> <?php
                 } ?>
               </tbody>
             </table>
           </div>
         </div>
         <?php
       }
?>
</section>
<br><br><br><br><br><br><br><br><br><br><br><br>
<?php include "./layout/footer.php"; ?>
