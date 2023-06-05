<?php require_once APPROOT.'/views/inc/header.php'; ?>

<!-- <nav class="navbar navbar-light bg-light">
  <form class="form-inline" action="" method = "get">
    <input class="form-control mr-sm-2" type="search" placeholder="Cari Nama" aria-label="Search" name="search" id="search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Cari</button>
  </form>
</nav> -->

<table class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal Transaksi</th>
            <th>Username</th>
            <th>Asal</th>
            <th>Tujuan</th>
            <th>Harga</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; foreach ($data['transaksi'] as $tr) : ?>
        <tr>
            <td><?php echo $i++; ?></td>
            <td><?php echo $tr->tanggal_transaksi ?></td>
            <td><?php echo $tr->username ?></td>
            <td><?php echo $tr->asal ?></td>
            <td><?php echo $tr->tujuan ?></td>
            <td><?php echo $tr->harga ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require_once APPROOT.'/views/inc/footer.php'; ?>