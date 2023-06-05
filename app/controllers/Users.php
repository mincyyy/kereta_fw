
<?php

class Users extends Controller
{
    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    public function asal()
    {
        $this->view('asal/index');
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            $data = [
                'username' => trim($_POST['username']),
                'password' => trim($_POST['password']),
                'kpassword' => trim($_POST['kpassword']),
                'nama' => trim($_POST['nama']),
                'jenis_kelamin' => trim($_POST['jenis_kelamin']),
                'tanggal_lahir' => trim($_POST['tanggal_lahir']),
                'email' => trim($_POST['email']),
                'username_err' => '',
                'password_err' =>'',
                'kpassword_err' => '',
                'nama_err' => '',
                'jenis_kelamin_err' =>'',
                'tanggal_lahir_err' => '',
                'email_err' =>''
            ];

            // Validasi Username
            if (empty($data['username'])) {
                $data['username_err'] = 'Mohon Isi Username';
            }elseif ($this->userModel->cariUsername($data['username'])) {
                $data['username_err'] = 'Nama Pengguna Sudah Digunakan, Silahkan pilih Nama Pengguna lain';
            }

            // Validasi Password
            if (empty($data['password'])) {
                $data['password_err'] = 'Mohon Isi Password';
            }

            // Validasi Konfirmasi password
            if (empty($data['kpassword'])) {
                $data['kpassword_err'] = 'Mohon Konfirmasi Password';
            } elseif ($data['password'] != $data['kpassword']) {
                $data['kpassword_err'] = 'Kata Sandi Tidak Cocok';
            }

            if (empty($data['nama'])) {
                $data['nama_err'] = 'Mohon Isi Nama Anda';
            }

            if (empty($data['jenis_kelamin'])) {
                $data['jenis_kelamin_err'] = 'Mohon Isi Jenis Kelamin';
            }

            if (empty($data['tanggal_lahir'])) {
                $data['tanggal_lahir_err'] = 'Mohon Isi Tanggal Lahir';
            }

            if (empty($data['email'])) {
                $data['email_err'] = 'Mohon Isi Alamat Email Anda';
            }


            if (empty($data['username_err']) && empty($data['password_err']) && empty($data['kpassword_err']) && empty($data['nama_err']) && empty($data['jenis_kelamin_err']) && empty($data['tanggal_lahir_err']) && empty($data['email_err'])) {
                // Enkripsi password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                if ($this->userModel->tambahUser($data)) {
                    redirect('users/login');
                }
            } else {
                // Load view dengan error
                $this->view('users/register', $data);
            }

            
        } else {
            $data = [
                'username' => '',
                'password' =>'',
                'kpassword' => '',
                'nama' => '',
                'jenis_kelamin' =>'',
                'tanggal_lahir' => '',
                'email' =>'',

                'username_err' => '',
                'password_err' =>'',
                'kpassword_err' => '',
                'nama_err' => '',
                'jenis_kelamin_err' =>'',
                'tanggal_lahir_err' => '',
                'email_err' =>''
            ];
    
            $this->view('users/register', $data);
        }

    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'username' => trim($_POST['username']),
                'password' => trim($_POST['password']),
                'username_err' => '',
                'password_err' =>''
            ];

            // Validasi username
            if (empty($data['username'])) {
                $data['username_err'] = 'Mohon isi username';
            } elseif (!$this->userModel->cariUsername($data['username'])) {
                $data['username_err'] = 'Username tidak ditemukan';
            }

            // Validasi Password
            if (empty($data['password'])) {
                $data['password_err'] = 'Mohon Isi Password';
            }

            if (empty($data['username_err']) && empty($data['password_err'])) {
                $loggedIn = $this->userModel->login($data['password'], $data['username']);
                if ($loggedIn) {
                    $this->createSessionLogin($loggedIn);
                } 
                
            } else {
                // Load view dengan error
                $this->view('users/login', $data);
            }

        } else {
            $data = [
                'username' => '',
                'password' =>'',
                'username_err' => '',
                'password_err' =>''
            ];
    
            $this->view('users/login', $data);
        }
    }

    public function createSessionLogin($row)
    {
        $_SESSION['username'] = $row->username;
        $_SESSION['status'] = $row->status;
        $_SESSION['saldo'] = $row->saldo;
         
        redirect('pages/index');
    }

    public function logout()
    {
        unset($_SESSION['username']);

        session_destroy();

        redirect('users/login');
    }
}
