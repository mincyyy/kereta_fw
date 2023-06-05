<?php require_once APPROOT.'/views/inc/header.php'; ?>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header text-center">
                <h2>Top Up</h2>
                <small>Silahkan Isi Form</small>
            </div>
            <div class="card-body">
                <form action="<?php echo URLROOT;?>/penggunas/topUp" method="post">
                    <div class="form-group">
                      <label for="saldo">Jumlah Top Up : </label>
                      <input type="number" class="form-control" name="saldo" id="saldo" value="<?php echo $data['user']->saldo; ?>">
                      <span class="invalid-feedback"><?php echo $data['saldo_err'] ?></span>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block bg-dark">Tambah Saldo</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require_once APPROOT.'/views/inc/footer.php'; ?>