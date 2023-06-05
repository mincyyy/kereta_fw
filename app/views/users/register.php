<?php require_once APPROOT.'/views/inc/header.php'; ?>

<div class="row justify-content-center">
    <div class="col-md-5">
        <div class="card">
            <div class="card-header text-center">
                <h2>Register</h2>
                <small>Silahkan Isi Form</small>
            </div>
            <div class="card-body">
                <form action="<?php echo URLROOT;?>/users/register" method="post">
                    <div class="form-group">
                        <label for="username">Nama Pengguna :</label>
                        <input type="text" class="form-control <?php echo (!empty($data['username_err'])) ? 'is-invalid' : ''; ?>" name="username" id="username" value="<?php echo $data['username']; ?>">
                        <span class="invalid-feedback"><?php echo $data['username_err'] ?></span>
                    </div>

                    <div class="form-group">
                        <label for="password">Password: </label>
                        <input type="password" class="form-control <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" name="password" id="password" value="<?php echo $data['password']; ?>">
                        <span class="invalid-feedback"><?php echo $data['password_err'] ?></span>
                    </div>

                    <div class="form-group">
                    <label for="kpassword">Konfirmasi Password:</label>
                    <input type="password" class="form-control <?php echo (!empty($data['kpassword_err'])) ? 'is-invalid' : ''; ?>" name="kpassword" id="kpassword" value="<?php echo $data['kpassword']; ?>">
                    <span class="invalid-feedback"><?php echo $data['kpassword_err'] ?></span>
                    </div>

                    <div class="form-group">
                        <label for="username">Nama Lengkap :</label>
                        <input type="text" class="form-control <?php echo (!empty($data['nama_err'])) ? 'is-invalid' : ''; ?>" name="nama" id="nama" value="<?php echo $data['nama']; ?>">
                        <span class="invalid-feedback"><?php echo $data['nama_err'] ?></span>
                    </div>

                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin : </label>
                        <td>
                        <input type="radio" name="jenis_kelamin" value="laki-laki" id="jenis_kelamin"> Laki-Laki
                        <input type="radio" name="jenis_kelamin" value="perempuan" id="jenis_kelamin"> Perempuan
                        </td>
                        <span class="invalid-feedback"><?php echo $data['jenis_kelamin_err'] ?></span>
                    </div>

                    <div class="form-group">
                    <label for="tanggal_lahir">Tanggal Lahir :</label>
                    <input type="date" name="tanggal_lahir" id="tanggal_lahir">
                    <span class="invalid-feedback"><?php echo $data['tanggal_lahir'] ?></span>
                    </div>

                    <div class="form-group">
                        <label for="email">Alamat Email :</label>
                        <input type="text" class="form-control <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" name="email" id="email" value="<?php echo $data['email']; ?>" placeholder="contoh: abc123@xyz.com">
                        <span class="invalid-feedback"><?php echo $data['email_err'] ?></span>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block bg-dark">Daftar</button>
                </form>
            </div>
            <div class="card-footer text-muted">
                <a href="<?php echo URLROOT;?>/users/login">Sudah Memiliki Akun? Login</a>
            </div>
        </div>
    </div>
</div>

<?php require_once APPROOT.'/views/inc/footer.php'; ?>

