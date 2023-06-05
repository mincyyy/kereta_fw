<?php require_once APPROOT.'/views/inc/header.php'; ?>

<nav class="navbar navbar-light bg-light">
  <form class="form-inline" action="" method = "get">
    <input class="form-control mr-sm-2" type="search" placeholder="Cari Nama" aria-label="Search" name="search" id="search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Cari</button>
  </form>
</nav>

<table class="table">
    <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Username</th>
          <th>Email</th>
          <th>Saldo</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; foreach ($data['user'] as $usr) : ?>
        <tr>
            <td><?php echo $i++; ?></td>
            <td><?php echo $usr->nama ?></td>
            <td><?php echo $usr->username ?></td>
            <td><?php echo $usr->email ?></td>
            <td><?php echo $usr->saldo ?></td>
            <td>
            <a class="btn btn-danger" href="<?php echo URLROOT; ?> /destinations/hapusUser/<?php echo $usr->id; ?>" role="button"><i class="fas fa-trash"></i></a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require_once APPROOT.'/views/inc/footer.php'; ?>