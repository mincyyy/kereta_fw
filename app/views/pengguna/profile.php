<?php require_once APPROOT.'/views/inc/header.php'; ?>


<a class="btn btn-primary mb-3 bg-dark" href="<?php echo URLROOT; ?>/penggunas/topUp" role="button">Top Up</a>
<a class="btn btn-primary mb-3 bg-dark" href="<?php echo URLROOT; ?>/penggunas/editProfile" role="button">Edit Profile</a>
<table class="table">
    <thead>
        <tr>
        <th>Nama</th>
        <th>Username</th>
        <th>Jenis Kelamin</th>
        <th>Tanggal Lahir</th>
        <th>Email</th>
        <th>Saldo</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?php echo $data['user']->nama; ?></td>
            <td><?php echo $data['user']->username; ?></td>
            <td><?php echo $data['user']->jenis_kelamin; ?></td>
            <td><?php echo $data['user']->tanggal_lahir; ?></td>
            <td><?php echo $data['user']->email; ?></td>
            <td><?php echo $data['user']->saldo; ?></td>
        </tr>
    </tbody>
</table>

<?php require_once APPROOT.'/views/inc/footer.php'; ?>