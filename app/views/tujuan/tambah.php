<?php require_once APPROOT.'/views/inc/header.php'; ?>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header text-center">
                <h2>Tambah Data</h2>
                <small>Silahkan Isi Form</small>
            </div>
            <div class="card-body">
                <form action="<?php echo URLROOT;?>/tujuans/tambah" method="post">
                    <div class="form-group">
                      <label for="tujuan">Tujuan : </label>
                      <input type="text" class="form-control <?php echo (!empty($data['tujuan_err'])) ? 'is-invalid' : ''; ?>" name="tujuan" id="tujuan" value="<?php echo $data['tujuan']; ?>">
                      <span class="invalid-feedback"><?php echo $data['tujuan_err'] ?></span>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block bg-dark">Tambah Data</button>
                </form>
            </div>
 
        </div>
    </div>
</div>

<?php require_once APPROOT.'/views/inc/footer.php'; ?>
