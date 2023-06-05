

<?php require_once APPROOT.'/views/inc/header.php'; ?>

<center>
<th>Konfirmasi pemesanan</th>
<th>Nama Pemesan :</th>
<th>Kota Asal :</th>
<th>Kota Tujuan :</th>
<th>Harga :</th>

<td><?php echo $data[0]->asal?></td>
<td><?php echo $data[0]->tujuan?></td>
<td><?php echo $data[0]->harga; ?></td>

<input type='submit' name='pesan' value='Pesan'>
</center>



<?php require_once APPROOT.'/views/inc/footer.php'; ?>