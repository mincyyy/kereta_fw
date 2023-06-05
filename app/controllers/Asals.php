<?php 

class Asals extends Controller
{
    public function __construct()
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        }
        
        $this->asalModel = $this->model('Asal');
    }

    public function indexAsal()
    {
        $asal = $this->asalModel->showAsal();
            $data = [
                'asal' => $asal
            ];
            if (isLoggedIn() == 'admin') {
                $this->view('asal/index', $data);
            }else if (isLoggedIn() == 'user'){
                $this->view('pengguna/index', $data);
            }else {
                $this->view('pages/index');
            }
    }

    public function tambah()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            $data = [
                'asal' => trim($_POST['asal']),
                'asal_err' => ''
            ];

            // Validasi nim
            if (empty($data['asal'])) {
                $data['asal_err'] = 'Mohon Isi Daerah Asal';
            }

            if (empty($data['asal_err'])) {
                $datatambah = $this->asalModel->tambah($data);
                
                if ($datatambah) {
                    redirect('asals/indexAsal');
                }
            } else {
                // Load view dengan error
                $this->view('asal/tambah', $data);
            }

            
        } else {
            $data = [
                'asal' => '',
                'asal_err' => ''
            ];
            if (isLoggedIn() == 'admin') {
                $this->view('asal/tambah', $data);
            }else if (isLoggedIn() == 'user'){
                $this->view('pengguna/index', $data);
            }else {
                $this->view('pages/index');
            }
        }
    }

    public function hapus($id)
        {
            if ($this->asalModel->delete($id)) {
                redirect('asal/index');
            } else {
                die('ada yang salah');
            }
        }

}