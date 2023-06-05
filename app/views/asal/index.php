<?php require_once APPROOT.'/views/inc/header.php'; ?>

<!-- <nav class="navbar navbar-light bg-light">
  <form class="form-inline" action="" method = "get">
    <input class="form-control mr-sm-2" type="search" placeholder="Cari Nama" aria-label="Search" name="search" id="search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Cari</button>
  </form>
</nav> -->
<a class="btn btn-primary mb-3 bg-dark" href="<?php echo URLROOT; ?>/asals/tambah" role="button">Tambah Data</a>

<table class="table">
    <thead>
        <tr>
          <th>No</th>
          <th>Asal</th>
          <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; foreach ($data['asal'] as $asal) : ?>
        <tr>
            <td><?php echo $i++; ?></td>
            <td><?php echo $asal->asal ?></td>
            <td>
            <a class="btn btn-danger" href="<?php echo URLROOT; ?> /asal/hapus/<?php echo $asal->id; ?>" role="button"><i class="fas fa-trash"></i></a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require_once APPROOT.'/views/inc/footer.php'; ?>