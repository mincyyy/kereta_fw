<?php require_once APPROOT.'/views/inc/header.php'; ?>

<!-- <nav class="navbar navbar-light bg-light">
  <form class="form-inline" action="" method = "get">
    <input class="form-control mr-sm-2" type="search" placeholder="Cari Nama" aria-label="Search" name="search" id="search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Cari</button>
  </form>
</nav> -->

<a class="btn btn-primary mb-3 bg-dark" href="<?php echo URLROOT; ?>/tujuans/tambah" role="button">Tambah Data</a>

<table class="table">
    <thead>
        <tr>
          <th>No</th>
          <th>Tujuan</th>
          <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; foreach ($data['tujuan'] as $tujuan) : ?>
        <tr>
            <td><?php echo $i++; ?></td>
            <td><?php echo $tujuan->tujuan ?></td>
            <td>
            <a class="btn btn-danger" href="<?php echo URLROOT; ?> /tujuan/hapus/<?php echo $tujuan->id; ?>" role="button"><i class="fas fa-trash"></i></a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require_once APPROOT.'/views/inc/footer.php'; ?>