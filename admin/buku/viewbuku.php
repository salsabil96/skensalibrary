<?php
$halaman = 20;
$page = isset($_GET["halaman"])? (int)$_GET["halaman"] : 1;
$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
$result = mysqli_query($koneksi, "SELECT * FROM buku");
$no=$mulai+1;
$total = mysqli_num_rows($result);
$pages = ceil($total/$halaman);
?>
<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-laptop"></i> Data Buku</h3>
        <ul class="breadcrumb">
          <li><i class="fa fa-home"></i><a href="admin.php">Home</a></li>
          <li><i class="fa fa-laptop"></i>Data Buku</li>
        </ul>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-4"><br>
        <a class="btn btn-primary" href="admin.php?id=addbuku"><i class="icon_plus_alt2"></i> Tambah Buku</a>
      </div>
      <div class="col-lg-4">
        <ul class="pagination pagination pull-left">
         <?php 
         if($page>1){
           $link=$page-1;	
           echo" <li><a href='admin.php?id=buku&halaman=$link'>«</a></li> "; }
           else { $prev = ""; }
           for ($i=1; $i<=$pages; $i++){ ?>
            <li><a href="admin.php?id=buku&halaman=<?php echo $i; ?>"><?php echo $i; ?></a></li>
          <?php }
	         
          $JmlHalaman = ceil($total/$halaman);
          if ( $page < $JmlHalaman ) {
           $link = $page + 1;
           echo "<li><a href='admin.php?id=buku&halaman=$link'>»</a></li>"; }
          else { $next = ""; } ?>
       </ul>
     </div>
     <div class="col-lg-4"><br>
      <form class="form-inline pull-right" role="form" method="post" action="admin.php?id=searchbuku">
        <div class="form-group"><input type="text"  class="form-control" name="keyword" placeholder="Pencarian"></div>
        <input type="submit" name="cari" value="Search" class="btn btn-primary form control">
      </form>
    </div>
  </div>

  <?php
  $result = mysqli_query($koneksi, "SELECT buku.id_buku, buku.tanggal_input, buku.judul_buku, pengarang.nama_pengarang, penerbit.nama_penerbit, sumber.nama_sumber, golongan.nama_golongan, buku.tahun, buku.jumlah, buku.call_number, buku.foto, golongan.no_rak FROM buku JOIN pengarang on (buku.id_pengarang=pengarang.id_pengarang) JOIN penerbit on(buku.id_penerbit=penerbit.id_penerbit) JOIN sumber on (buku.id_sumber=sumber.id_sumber) join golongan on (buku.id_golongan=golongan.id_golongan) LIMIT $mulai, $halaman");
  $total = mysqli_num_rows($result);
  if($total == 0){ echo "Tidak ada data buku"; }
  else { ?>
    <div class="row">
      <div class="col-lg-12">
        <table class="table table-striped table-advance table-hover table-responsive">
          <tbody>
            <?php
            while($data = mysqli_fetch_array($result)){ ?>
              <tr> <?php
              echo "<td>$no</td>";
              $no++;
              if($data[10]==NULL){ ?>
                <td width=125px height=150px>
                  <table border=2 style=border-style:double;>
                    <tr><td width=120px height=150px><center><font size=3pt>SAMPUL BELUM TERSEDIA</center></font></td></tr>
                  </table>
                </td>
              <?php }
              else { ?>
                <td>
                  <table border=0 style=border-style:double;>
                    <tr> <?php
                    echo "<td><center><a href='images/buku/$data[10]'><img src='images/buku/$data[10]' width=120px height=150px></center></a></td>"; ?>
                  </tr>
                </table>
                </td> <?php } ?>
              <td>
                <table class="table table-striped table-advance table-hover table-responsive">
                  <tr>
                    <th>No Buku</th><th width=5px>:</th><td><?php echo $data['id_buku']; ?></td>
                    <th>Tanggal Input</th><th width=5px>:</th><td><?php echo $data['tanggal_input']; ?></td>
                  </tr>
                  <tr>
                    <th>Judul Buku</th><th width=5px>:</th><td><?php echo $data['judul_buku']; ?></td>
                    <th>Jumlah</th><th width=5px>:</th><td><?php echo $data[8]; ?></td>
                  </tr>
                  <tr>
                    <th>Pengarang</th><th width=5px>:</th><td><?php echo $data[3]; ?></td>
                    <th>Penerbit</th><th width=5px>:</th><td><?php echo $data[4]; ?></td>
                  </tr>
                  <tr>
                    <th>Sumber</th><th width=5px>:</th><td><?php echo $data[5]; ?></td>
                    <th>Golongan</th><th width=5px>:</th><td><?php echo $data[6]; ?></td>
                  </tr>
                  <tr>
                    <th>Tahun Terbit</th><th width=5px>:</th><td><?php echo $data[7]; ?></td>
                    <th>No.Panggil</th><th width=5px>:</th><td><?php echo $data[9] . "  (No.Rak : " . $data[11] . ")";?></td>
                  </tr>
                  <tr>
                    <th>Action</th><th width=5px>:</th><td colspan="4">
                      <a class="btn btn-success" href="admin.php?id=editbuku&bukuID=<?php echo $data[0]; ?>"><i class="icon_check_alt2"></i> Edit</a>
                      <a class="btn btn-danger" href="admin.php?id=deletebuku&bukuID=<?php echo $data[0]; ?>"><i class="icon_close_alt2"></i> Delete</a></td>
                  </tr>
                </table>
              </td>
              </tr> <?php } ?>
          </tbody>
        </table>
      </div>
      </div> <?php } ?>
  </section>
  <?php include "./layout/footer.php"; ?>