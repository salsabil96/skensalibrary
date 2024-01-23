<?php
$query = "SELECT * FROM buku WHERE id_buku='$bukuID'";
$ambil = mysqli_query($koneksi, $query);
$data = mysqli_fetch_array($ambil);

if (isset($_POST['edit'])){
  $id_buku        = $_POST['id_buku'];
  $tanggal_input  = $_POST['tanggal_input'];
  $judul_buku     = $_POST['judul_buku'];
  $file           = $_FILES['file']['name'];
  $tmp_name       = $_FILES['file']['tmp_name'];
  $id_pengarang   = $_POST['id_pengarang'];
  $id_penerbit    = $_POST['id_penerbit'];
  $id_sumber      = $_POST['id_sumber'];
  $id_golongan    = $_POST['id_golongan'];
  $tahun          = $_POST['tahun'];
  $jumlah         = $_POST['jumlah'];
  $call_number    = $_POST['call_number'];

  if(empty($tmp_name)){
    $sql = "UPDATE buku SET id_buku = '$id_buku', tanggal_input = '$tanggal_input', judul_buku = '$judul_buku', id_pengarang = '$id_pengarang', id_penerbit = '$id_penerbit', id_sumber = '$id_sumber', id_golongan = '$id_golongan', tahun = '$tahun', jumlah = '$jumlah',call_number = '$call_number' WHERE id_buku = '$bukuID'";
    $simpan = mysqli_query($koneksi, $sql);
  }
  else {
    move_uploaded_file($tmp_name,"images/buku/".$file)or die('Tidak bisa upload');
    $sql = "UPDATE buku SET id_buku = '$id_buku', tanggal_input = '$tanggal_input', judul_buku = '$judul_buku', id_pengarang = '$id_pengarang', id_penerbit = '$id_penerbit', id_sumber = '$id_sumber', id_golongan = '$id_golongan', tahun = '$tahun', jumlah = '$jumlah', call_number = '$call_number', foto='$file' WHERE id_buku = '$bukuID'";
    $simpan = mysqli_query($koneksi, $sql);
  }

  if($simpan) { ?>
   <script>
    alert("Data Buku berhasil diedit !");
    document.location="admin.php?id=buku";
   </script> <?php
  }
}
else if (isset($_POST['batal'])){ ?>
  <script>
   document.location="admin.php?id=buku";
  </script> <?php
 }
?>

<script type="text/javascript">
 function validasi_input(form) {
  if(form.id_buku.value=="") {
   alert("No. Buku tidak boleh kosong!");
   form.id_buku.focus();
   return false;
 }
 return true;
}
</script>

 <section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-laptop"></i> Data Buku</h3>
        <ul class="breadcrumb">
          <li><i class="fa fa-home"></i><a href="admin.php">Home</a></li>
          <li><i class="fa fa-laptop"></i><a href="admin.php?id=buku">Data Buku</a></li>
          <li><i class="fa fa-file-text-o"></i>Edit Data Buku</li>
        </ul>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-default">
          <div class="panel-body">
            <form class="form-horizontal " method="POST" enctype="multipart/form-data" onsubmit="return validasi_input(this);">
              <div class="form-group col-sm-11">
                <label class="col-sm-2 control-label">No Buku</label>
                <div class="col-sm-4"><input type="text" name="id_buku" value="<?php echo $data[0]; ?>" class="form-control"></div>
                <label class="col-sm-2 control-label">Tanggal Input</label>
                <div class="col-sm-4"><input type="text" name="tanggal_input" value="<?php echo $data[1]; ?>" class="form-control tanggal"></div>
              </div>
              <div class="form-group col-sm-11">
                <label class="col-sm-2 control-label">Judul Buku</label>
                <div class="col-sm-4"><input type="text" name="judul_buku" value="<?php echo $data[2]; ?>" class="form-control">
                </div>
                <label class="col-sm-2 control-label">Sampul</label>
                <div class="col-sm-4">
                  <table border=0 style=border-style:double;>
                    <tr> <?php 
                    if($data[10]==NULL){ echo "<td>NO PHOTO</td>"; }
                    else { echo "<td><a href='images/buku/$data[10]'><img src='images/buku/$data[10]' width=50px height=50px></a></td>"; } ?>
                      <td><input type="file" name="file" class="form-control"></td>
                    </tr>
                  </table><br>
                </div>
              </div>
              <div class="form-group col-sm-11">
                <label class="col-sm-2 control-label">Pengarang</label>
                <div class="col-sm-4">
                  <select class="custom-select form-control" name="id_pengarang">
                    <?php
                    $ambil_aut = mysqli_query($koneksi, "SELECT * FROM pengarang ORDER BY nama_pengarang");
                    while($data_aut = mysqli_fetch_array($ambil_aut)){
                      if($data_aut[0] == $data[3]) { ?>
                        <option value="<?php echo $data_aut[0]; ?>" selected><?php echo $data_aut[1]; ?></option><?php }
                      else { ?> <option value="<?php echo $data_aut[0]; ?>"><?php echo $data_aut[1]; ?></option><?php }
                    } ?>
                  </select>
                </div>
                <label class="col-sm-2 control-label">Penerbit</label>
                <div class="col-sm-4">
                  <select class="custom-select form-control" name="id_penerbit">
                    <?php
                    $ambil_pub = mysqli_query($koneksi, "SELECT * FROM penerbit ORDER BY nama_penerbit");
                    while($data_pub = mysqli_fetch_array($ambil_pub)){
                      if($data_pub[0] == $data[4]) { ?>
                        <option value="<?php echo $data_pub[0]; ?>" selected><?php echo $data_pub[1]; ?></option><?php }
                      else { ?> <option value="<?php echo $data_pub[0]; ?>"><?php echo $data_pub[1]; ?></option><?php }
                    } ?>
                  </select>
                </div>
              </div>
              <div class="form-group col-sm-11">
                <label class="col-sm-2 control-label">Sumber</label>
                <div class="col-sm-4">
                  <select class="custom-select form-control" name="id_sumber">
                    <?php
                    $ambil_src = mysqli_query($koneksi, "SELECT * FROM sumber ORDER BY nama_sumber");
                    while($data_src = mysqli_fetch_array($ambil_src)){
                      if($data_src[0] == $data[5]) { ?>
                        <option value="<?php echo $data_src[0]; ?>" selected><?php echo $data_src[1]; ?></option><?php }
                      else { ?> <option value="<?php echo $data_src[0]; ?>"><?php echo $data_src[1]; ?></option><?php }
                    } ?>
                  </select>
                </div>
                <label class="col-sm-2 control-label">Golongan</label>
                <div class="col-sm-4">
                  <select class="custom-select form-control" name="id_golongan">
                    <?php
                    $ambil_gol = mysqli_query($koneksi, "SELECT * FROM golongan");
                    while($data_gol = mysqli_fetch_array($ambil_gol)){
                      if($data_gol[0] == $data[6]) { ?>
                        <option value="<?php echo $data_gol[0]; ?>" selected><?php echo $data_gol[0] . " | " . $data_gol[1]; ?></option><?php }
                      else { ?> <option value="<?php echo $data_gol[0]; ?>"><?php echo $data_gol[0] . " | " . $data_gol[1]; ?></option><?php }
                    } ?>
                  </select>
                </div>
              </div>
              <div class="form-group col-sm-11">
                <label class="col-sm-2 control-label">Tahun</label>
                <div class="col-sm-2">
                  <select class="custom-select form-control" name="tahun">
                    <?php
                    for($i=1983; $i<2019; $i++){
                      if($i == $data[7]) {?> <option value="<?php echo $i; ?>" selected><?php echo $i; ?></option> <?php }
                      else { ?> <option value="<?php echo $i; ?>"><?php echo $i; ?></option> <?php }
                    } ?>
                  </select>
                </div>
                <label class="col-sm-2 control-label">Jumlah</label>
                <div class="col-sm-1"><input type="text" name="jumlah" class="form-control" value="<?php echo $data[8]; ?>"></div>
                <label class="col-sm-2 control-label">Call Number</label>
                <div class="col-sm-3"><input type="text" name="call_number" class="form-control" value="<?php echo $data[9]; ?>">
                </div>
              </div>              
              <div class="form-group col-sm-11">&emsp;&emsp;
                <label class="col-sm-5 control-label"></label>
                <input type="submit" name="edit" value="Simpan" class="btn btn-primary form control">
                <input type="submit" name="batal" value="Batal" class="btn btn-danger form control">
              </label>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section> <!-- wrapper -->
</section> <!-- main-content -->
<?php include "./layout/footer.php"; ?>