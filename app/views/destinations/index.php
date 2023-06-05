<?php require_once APPROOT.'/views/inc/header.php'; ?>

<nav class="btn navbar-light bg-light">
  <form class="form-inline" action="" method = "get">
    <input class="form-control mr-sm-2 mb-3" type="search" placeholder="Cari Destinasi" aria-label="Search" name="search2" id="search2">
    <button class="btn btn-outline-success mb-3 bg-grey text-black" type="submit">Cari</button>
  </form>
</nav>

<a class="btn btn-primary mb-3 bg-dark" href="<?php echo URLROOT; ?>/destinations/tambah" role="button">Tambah Data</a>
<a class="btn btn-primary mb-3 bg-dark" href="<?php echo URLROOT; ?>/asals/indexAsal" role="button">Asal</a>
<a class="btn btn-primary mb-3 bg-dark" href="<?php echo URLROOT; ?>/tujuans/index" role="button">Tujuan</a>

<table class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>Asal</th>
            <th>Tujuan</th>
            <th>Harga</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; foreach ($data['harga'] as $hrg) : ?>
        <tr>
            <td><?php echo $i++; ?></td>
            <td><?php echo $hrg->asal ?></td>
            <td><?php echo $hrg->tujuan ?></td>
            <td><?php echo $hrg->harga ?></td>
            <td>
            <a class="btn btn-success" href="<?php echo URLROOT; ?>/destinations/update/<?php echo $hrg->id; ?>" role="button"><i class="fas fa-pencil-alt"></i></a>
            <a class="btn btn-danger" href="<?php echo URLROOT; ?>/destinations/hapus/<?php echo $hrg->id; ?>" role="button"><i class="fas fa-trash"></i></a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require_once APPROOT.'/views/inc/footer.php'; ?>
