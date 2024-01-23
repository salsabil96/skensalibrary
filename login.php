<?php
require_once("koneksi.php");
include "./layout/sidebar.php";
?>

<script type="text/javascript">
 function validasi_input(form) {
  if(form.id_user.value=="") {
   alert("Username tidak boleh kosong !");
   form.id_user.focus();
   return false;
 }
 if(form.pass.value=="") {
   alert("Password tidak boleh kosong !");
   form.pass.focus();
   return false;
 }
 return true;
}
</script>

<br><br>
<section id="main-content">
  <section class="wrapper">
    <div class="col-md-9">
      <div class="panel panel-default" style="margin-left:20%">
        <div class="panel-heading">Form Login</div>
        <div class="text-center"><br>
          <img src="./images/logo.jpg" style="width:75px; height:90px;">
          <br>
          <h4><strong>PERPUSTAKAAN <br>SMK NEGERI 1 RANGKASBITUNG</strong></h4>
          <form method="post" action="index.php?id=loginprocess" onsubmit="return validasi_input(this);"><br>
            <div class="row">
              <div class="col-md-3"></div>
              <div class="input-group col-md-6 pull-center">
                <span class="input-group-addon"><i class="icon_profile"></i></span>
                <input type="text" class="form-control" placeholder="Username" name="id_user">
              </div>
            </div><br>
            <div class="row">
              <div class="col-md-3"></div>
              <div class="input-group col-md-6 pull-center">
                <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                <input type="password" class="form-control" placeholder="Password" name="pass">
              </div>
            </div><br>
            <div class="row">
              <input type="submit" class="btn btn-primary" value="Login" name=submit_login>
            </div><br>
          </form>
        </div>
      </div>
    </div>
    </section>
  </section>
  <br><br><br>
  <?php
  include "./layout/footer.php";
  ?>
