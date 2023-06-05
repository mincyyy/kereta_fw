<?php require_once APPROOT.'/views/inc/header.php'; ?>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header text-center">
                <h2>Tambah Data</h2>
                <small>Silahkan Isi Form</small>
            </div>
            <div class="card-body">
                <form action="<?php echo URLROOT;?>/destinations/tambah" method="post">
                    <div class="form-group">
                      <label for="asal_id">Asal : </label>
                      <select name="asal_id" class="form-control">
                      <option>- Pilih -</option>
                      <?php foreach ($data['asal1'] as $asal) : ?>
                        <option  value="<?php echo $asal->id ?>"> <?php echo $asal->asal?> </option>
                      <?php endforeach; ?>
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="tujuan_id">Tujuan : </label>
                      <select name="tujuan_id" class="form-control">
                      <option>- Pilih -</option>
                      <?php foreach ($data['tujuan1'] as $tujuan) : ?>
                        <option value="<?php echo $tujuan->id ?>"> <?php echo $tujuan->tujuan ?> </option>
                      <?php endforeach; ?>
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="harga">Harga : </label>
                      <input type="number" class="form-control <?php echo (!empty($data['harga_err'])) ? 'is-invalid' : ''; ?>" name="harga" id="harga" value="<?php echo $data['harga']; ?>">
                      <span class="invalid-feedback"><?php echo $data['harga_err'] ?></span>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block bg-dark">Tambah Data</button>
                </form>
            </div>
 
        </div>
    </div>
</div>

<?php require_once APPROOT.'/views/inc/footer.php'; ?>
