<?php
$keyword=$_POST['keyword'];
$pp = "SELECT buku.id_buku, buku.tanggal_input, buku.judul_buku, pengarang.nama_pengarang, penerbit.nama_penerbit, sumber.nama_sumber, golongan.no_rak, buku.tahun, buku.jumlah, buku.call_number FROM buku JOIN pengarang on (buku.id_pengarang=pengarang.id_pengarang) JOIN penerbit on(buku.id_penerbit=penerbit.id_penerbit) JOIN sumber on (buku.id_sumber=sumber.id_sumber) join golongan on (buku.id_golongan=golongan.id_golongan) WHERE buku.id_buku like '%$keyword%' or buku.tanggal_input like '%$keyword%' or buku.judul_buku like '%$keyword%' or pengarang.nama_pengarang like '%$keyword%' or penerbit.nama_penerbit like '%$keyword%' or sumber.nama_sumber like '%$keyword%' or golongan.nama_golongan like '%$keyword%' or buku.tahun like '%$keyword%' or buku.jumlah like '%$keyword%' or buku.call_number like '%$keyword%'";
$car = mysqli_query($koneksi, $pp);
$total = mysqli_num_rows($car);
$no=1;
?>

<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-laptop"></i> Data Buku</h3>
        <ul class="breadcrumb">
          <li><i class="fa fa-home"></i><a href="admin.php">Home</a></li>
          <li><i class="fa fa-laptop"></i><a href="admin.php?id=buku">Data Buku</a></li>
          <li><i class="fa fa-file-text-o"></i>Search Data Buku</li>
        </ul>
      </div>
    </div>

    <?php  $total = mysqli_num_rows($car);
    if($total == 0){ echo "Tidak ada data buku"; }
    else { ?>
      <div class="row">
        <div class="col-lg-12">
          <table class="table table-striped table-advance table-hover">
            <tbody>
              <tr>
                <th>No</th><th>No Buku</th><th class="col-sm-1">Tanggal Input</th><th>Judul Buku</th><th>Pengarang</th><th>Penerbit</th>
                <th>Sumber</th><th class="col-sm-1">No.Rak</th><th>Tahun</th><th>Jumlah</th><th>Call Number</th><th>Action</th>
              </tr> 
              <?php while($data = mysqli_fetch_array($car)){ ?>
                <tr> <?php 
                echo "<td>$no</td>";
                $no++;
                for($i=0; $i<10; $i++){ echo "<td>$data[$i]</td>"; } ?>
                <td width="15%">
                  <a class="btn btn-success" href="admin.php?id=editbuku&bukuID=<?php echo $data[0]; ?>"><i class="icon_check_alt2"></i> Edit</a>
                  <a class="btn btn-danger" href="admin.php?id=deletebuku&bukuID=<?php echo $data[0]; ?>"><i class="icon_close_alt2"></i> Delete</a>
                </td></tr> 
                <?php } ?>
            </tbody>
          </table>
        </div>
        </div> <?php } ?>
    </section>
    <?php include "./layout/footer.php"; ?>