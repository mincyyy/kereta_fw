<?php require_once APPROOT.'/views/inc/header.php'; ?>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header text-center">
                <h2>Ubah Data</h2>
                <small>Silahkan Isi Form</small>
            </div>
            <div class="card-body">
                <form action="<?php echo URLROOT;?>/penggunas/editProfile" method="post">
                    <div class="form-group">
                      <label for="nim">Nama:</label>
                      <input required type="text" class="form-control" name="nama" id="nama" value="<?php echo $data['user']->nama; ?>">
                    </div>

                    <div class="form-group">
                      <label for="nama">Email:</label>
                      <input required type="text" class="form-control" name="email" id="email" value="<?php echo $data['user']->email; ?>">
                    </div>

                    <button type="submit" class="btn btn-success btn-block bg-dark">Ubah Data</button>
                </form>
            </div>
 
        </div>
    </div>
</div>

<?php require_once APPROOT.'/views/inc/footer.php'; ?>
