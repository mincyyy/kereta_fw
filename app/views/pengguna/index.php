<?php require_once APPROOT.'/views/inc/header.php'; ?>

<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4 text-center pb-5">Kereta Wisata</h1>
    <a href="<?php echo URLROOT; ?>//penggunas/profile"?>
      <div class="row justify-content-center">
        <div class="col-md-4 mb-5">
          <div class="card bg-dark" style="width: 18rem;">
          <div class="card-body">
          <h3 class="card-title text-center text-white">Data Profile</h3>  
          <p class="text-center bg-danger text-white">Cek disini untuk top up saldo</p>
          </div>
        </div>
      </div>
      <a>
      <a href="<?php echo URLROOT; ?>/penggunas/cariTiket"?>
      <div class="row justify-content-center">
        <div class="col-md-4 mb-5">
        <div class="card bg-dark" style="width: 18rem;">
          <div class="card-body">
          <h3 class="card-title text-center text-white">Cari Tiket</h3>  
          <p class="text-center text-white bg-danger">Ayo pesan tiket anda disini!</p>
          </div>
        </div>
      </div>
      <a>
      <a href="<?php echo URLROOT; ?>/penggunas/RiwayatransaksiPengguna"?>
      <div class="row justify-content-center">
        <div class="col-md-4 mb-5">
        <div class="card bg-dark" style="width: 18rem;">
          <div class="card-body">
          <h3 class="card-title text-center text-white">Riwayat Transaksi</h3>
          <p class="text-center text-white bg-danger">Transaksi anda selama ini</p>  
          </div>
        </div>
      </div>
      <a>
    </div>
  </div>
</div?

<?php require_once APPROOT.'/views/inc/footer.php'; ?>