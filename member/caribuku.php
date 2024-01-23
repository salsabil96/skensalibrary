<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-laptop"></i> Pencarian Buku</h3>
        <ul class="breadcrumb">
          <li><i class="fa fa-home"></i><a href="member.php">Home</a></li>
          <li><i class="fa fa-file-text-o"></i>Cari Buku</li>
        </ul>
      </div>
    </div>

    <script type="text/javascript">
        function validasi_input(form) {
          if(form.keyword.value=="") {
            alert("Keyword tidak boleh kosong !");
            form.keyword.focus();
            return false;
          }
          return true;
        }
      </script>
      
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-default">
          <div class="panel-body">
            <form class="form-horizontal " method="POST" action="member.php?id=hasil" onsubmit="return validasi_input(this);">
              <div class="form-group">
                <label class="col-sm-1 control-label m-bot15"><h4>Cari</h4></label>
                <div class="col-sm-4">
                  <input type="text" name="keyword" class="form-control input-lg m-bot15" placeholder="Keyword">
                </div>
                <label class="col-sm-1 control-label"><h4>Kategori</h4></label>
                <div class="col-lg-4">
                    <select class="form-control input-lg m-bot15" name="kategori">
                        <option value="judul_buku">Judul</option>
                        <option value="pengarang">Pengarang</option>
                        <option value="penerbit">Penerbit</option>
                        <option value="tahun">Tahun Terbit</option>
                        <option value="call_number">Nomor Panggil</option>
                    </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-5 control-label"></label>
                <input type="submit" name="Cari" value="Cari Buku" class="btn btn-primary form control">
                </label>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section> <!-- wrapper -->
</section> <!-- main-content -->
<br><br><br><br><br><br><br><br><br><br><br><br>
<?php include "./layout/footer.php"; ?>
