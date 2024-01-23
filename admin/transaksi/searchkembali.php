<?php
  $keyword=$_POST['keyword'];
  $query = "SELECT pengembalian.id_pengembalian, pengembalian.id_peminjaman, peminjaman.tanggal_kembali, anggota.nama_anggota,
            buku.judul_buku, petugas.nama_petugas FROM petugas JOIN peminjaman on (petugas.id_petugas=peminjaman.id_petugas) JOIN buku
            on (buku.id_buku=peminjaman.id_buku) JOIN anggota on (anggota.id_anggota=peminjaman.id_anggota) JOIN pengembalian
            on (peminjaman.id_peminjaman=pengembalian.id_peminjaman) where pengembalian.id_pengembalian like '%$keyword%' or
            pengembalian.id_pengembalian like '%$keyword%' or peminjaman.tanggal_kembali like '%$keyword%' or anggota.nama_anggota
            like '%$keyword%' or buku.judul_buku like '%$keyword%' or petugas.nama_petugas like '%$keyword%' ORDER BY id_pengembalian ";
  $car = mysqli_query($koneksi, $query);
  $total = mysqli_num_rows($car);
  $no=1;
?>
<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-laptop"></i> Data Pengembalian</h3>
        <ul class="breadcrumb">
          <li><i class="fa fa-home"></i><a href="admin.php">Home</a></li>
          <li><i class="fa fa-laptop"><a href="admin.php?id=pengembalian"></i>Data Pengembalian</a></li>
          <li><i class="fa fa-file-text-o"></i>Search Data Pengembalian</li>
        </ul>
      </div>
    </div>

    <?php
      if($total == 0){
        echo "Tidak ada data pengembalian";
     }

      else { ?>
        <div class="row">
          <div class="col-lg-12">
            <table class="table table-striped table-advance table-hover">
              <tbody>
                <tr>
                  <th>ID Pengembalian</th>
                  <th>Tanggal Kembali</th>
                  <th>Nama Anggota</th>
                  <th>Judul Buku</th>
                  <th>Nama Petugas</th>
                  <th>Action</th>
                </tr>
                <tr>
                <?php
                  while($data = mysqli_fetch_array($car)){
                    for($i=0; $i<6; $i++){
                      if($i==1)
                        continue;
                        echo "<td>$data[$i]</td>";

                  }
                ?>
                <td width="15%">
                    <a class="btn btn-success" href="admin.php?id=editpengembalian&kembaliID=<?php echo $data[0]; ?>"><i class="icon_check_alt2"></i> Edit</a>
                    <a class="btn btn-danger" href="admin.php?id=deletepengembalian&kembaliID=<?php echo $data[0]; ?>"><i class="icon_close_alt2"></i> Delete</a>
                </td>
                </tr> <?php
                } ?>
              </tbody>
            </table>
          </div>
        </div> <?php
      }
    ?>
  </section>
<?php include "./layout/footer.php"; ?>
