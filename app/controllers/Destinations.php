<?php 

class Destinations extends Controller
{
    
    public function __construct()
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        }
        
        
        $hrgModel = $this->model('Destination');
        $trModel = $this->model('Transaksi');
        $userModel = $this->model('User');
    }

    public function index()
    {
        if(isset($_GET['search2'])){
            $search = $_GET['search2'];
            $hrg = $this->hrgModel->search2($search);
            $data = [
                'harga' => $hrg
            ];
            $this->view('destinations/index', $data);
        } else {
            $hrg = $this->hrgModel->showHarga();
            $data = [
                'harga' => $hrg
            ];
            if (isLoggedIn() == 'admin') {
                $this->view('destinations/index', $data);
            }else if (isLoggedIn() == 'user'){
                $this->view('pengguna/index', $data);
            }else {
                $this->view('pages/index');
            }
        }
    }

    public function indexUser()
    {
        if(isset($_GET['search'])){
            $search = $_GET['search'];
            $user = $this->hrgModel->search($search);
            $data = [
                'user' => $user
            ];
            $this->view('destinations/indexUser', $data);
        } else {
            $user = $this->hrgModel->showUser();
            $data = [
                'user' => $user
            ];
            if (isLoggedIn() == 'admin') {
                $this->view('destinations/indexUser', $data);
            }else if (isLoggedIn() == 'user'){
                $this->view('pengguna/index', $data);
            }else {
                $this->view('pages/index');
            }
        } 
    }    

    public function tambah()
    {
        $asal = $this->hrgModel->readAsal();
        $tujuan = $this->hrgModel->readTujuan();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            $data = [
                'asal_id' => trim($_POST['asal_id']),
                'tujuan_id' => trim($_POST['tujuan_id']),
                'harga' => trim($_POST['harga']),
                'asal1' => $asal,
                'tujuan1' => $tujuan,
                'asal_err' => '',
                'tujuan_err' =>'',
                'harga_err' => ''
            ];

            if (empty($data['asal_err']) && empty($data['tujuan_err']) && empty($data['harga_err'])) {
                $datatambah = $this->hrgModel->tambah($data);
                
                if ($datatambah) {
                    redirect('destinations/index');
                }
            } else {
                // Load view dengan error
                $this->view('destinations/tambah', $data);
            }

            
        } else {
            $data = [
                'asal_id' => '',               
                'tujuan_id' => '',
                'harga' => '', 
                'asal1' => $asal,
                'tujuan1' => $tujuan,
                'asal_err' => '',
                'tujuan_err' =>'',
                'harga_err' => ''
            ];
            
            if (isLoggedIn() == 'admin') {
                $this->view('destinations/tambah', $data);
            }else if (isLoggedIn() == 'user'){
                $this->view('pengguna/index', $data);
            }else {
                $this->view('pages/index');
            }
        }
    }

    public function transaksiUsers()
    {
        if(isset($_GET['search3'])){
            $search = $_GET['search3'];
            $tr = $this->trModel->search($search);
            $data = [
                'transaksi' => $tr
            ];
            $this->view('destinations/indexUser', $data);
        }else {
            $tr = $this->trModel->showTransaksiAdmin();
            $data = [
                'transaksi' => $tr
            ];
            if (isLoggedIn() == 'admin') {
                $this->view('destinations/transaksiUsers', $data);
            }else if (isLoggedIn() == 'user'){
                $this->view('pengguna/index', $data);
            }else {
                $this->view('pages/index');
            }
        }
    }

    public function update($id)
    {
        $asal = $this->hrgModel->readAsal();
        $tujuan = $this->hrgModel->readTujuan();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            $data = [
                'id' => $id,
                'asal_id' => trim($_POST['asal_id']),
                'tujuan_id' => trim($_POST['tujuan_id']),
                'harga' => trim($_POST['harga'])
            ];

            if (!empty($data['asal_id']) && !empty($data['tujuan_id']) && !empty($data['harga'])) {
                $dataedit = $this->hrgModel->edit($data);
                if ($dataedit) {
                    redirect('destinations/index');
                }
            }
        } else {
            $hrg = $this->hrgModel->pilihdariId($id);
            $data = [
                'asal_id' => '',
                'tujuan_id' => '',
                'harga' => $hrg,
                'asal' => $asal,
                'tujuan' => $tujuan
            ];
            if (isLoggedIn() == 'admin') {
                $this->view('destinations/update', $data);
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
            redirect('destinations/index');
        } else {
            die('ada yang salah');
        }
    }

    public function home()
    {
        if (isLoggedIn() == 'admin') {
            $this->view('destinations/home');
        }else if (isLoggedIn() == 'user'){
            $this->view('pengguna/index');
        }else {
            $this->view('pages/index');
        }
        
    }

    public function hapusUser($id)
    {
        if ($this->hrgModel->deleteUser($id)) {
            redirect('destinations/indexUser');
        } else {
            die('ada yang salah');
        }
    }
}
