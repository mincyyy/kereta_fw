<?php require_once APPROOT.'/views/inc/header.php'; ?>

<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4 text-center pb-5">Hello, Admin Kereta Wisata</h1>
    <a href="<?php echo URLROOT; ?>/destinations/index"?>
      <div class="row justify-content-center">
        <div class="col-md-4 mb-5">
          <div class="card bg-dark" style="width: 18rem;">
          <div class="card-body">
          <h3 class="card-title text-center text-white">Daftar Destinasi</h3>  
          <p class="text-center bg-danger text-white">Kelola destinasi disini</p>
          </div>
        </div>
      </div>
      <a>
      <a href="<?php echo URLROOT; ?>/destinations/indexUser"?>
      <div class="row justify-content-center">
        <div class="col-md-4 mb-5">
        <div class="card bg-dark" style="width: 18rem;">
          <div class="card-body">
          <h3 class="card-title text-center text-white">Daftar User</h3>  
          <p class="text-center text-white bg-danger">Kelola akun user disini</p>
          </div>
        </div>
      </div>
      <a>
      <a href="<?php echo URLROOT; ?>/destinations/TransaksiUsers"?>
      <div class="row justify-content-center">
        <div class="col-md-4 mb-5">
        <div class="card bg-dark" style="width: 18rem;">
          <div class="card-body">
          <h3 class="card-title text-center text-white">Daftar Transaksi</h3>
          <p class="text-center text-white bg-danger">Lihat daftar transaksi user</p>  
          </div>
        </div>
      </div>
      <a>
    </div>
  </div>
</div?

<?php require_once APPROOT.'/views/inc/footer.php'; ?>