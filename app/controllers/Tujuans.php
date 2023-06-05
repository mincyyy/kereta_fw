<?php 

class Tujuans extends Controller
{
    public function __construct()
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        }
        
        $this->tujuanModel = $this->model('Tujuan');
    }

    public function index()
    {
        $tujuan = $this->tujuanModel->showTujuan();
            $data = [
                'tujuan' => $tujuan
            ];
            if (isLoggedIn() == 'admin') {
                $this->view('tujuan/index', $data);
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
                'tujuan' => trim($_POST['tujuan']),
                'tujuan_err' => ''
            ];

            // Validasi nim
            if (empty($data['tujuan'])) {
                $data['tujuan_err'] = 'Mohon Isi Daerah tujuan';
            }

            if (empty($data['tujuan_err'])) {
                $datatambah = $this->asalModel->tambah($data);
                
                if ($datatambah) {
                    redirect('tujuans/indexAsal');
                }
            } else {
                // Load view dengan error
                $this->view('tujuan/tambah', $data);
            }

            
        } else {
            $data = [
                'tujuan' => '',
                'tujuan_err' => ''
            ];
            if (isLoggedIn() == 'admin') {
                $this->view('tujuan/tambah', $data);
            }else if (isLoggedIn() == 'user'){
                $this->view('pengguna/index', $data);
            }else {
                $this->view('pages/index');
            }
        }
    }

    public function hapus($id)
        {
            if ($this->hrgModel->delete($id)) {
                redirect('tujuan/index');
            } else {
                die('ada yang salah');
            }
    }

}
