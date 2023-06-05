<?php 

use App\Models\Pengguna;


class Penggunas extends Controller
{
    public function __construct()
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        }
        
        $this->pgnModel = $this->model('Pengguna');
        $this->trModel = $this->model('Transaksi');
    }

    public function index()
    {
        if (isLoggedIn() == 'admin') {
            $this->view('destinations/home');
        }else if (isLoggedIn() == 'user'){
            $this->view('pengguna/index');
        }else {
            $this->view('pages/index');
        }
        
    }

    public function profile()
    {
        $username = $_SESSION['username'];
        $profil = $this->pgnModel->showProfile($username);
        $data = [
            'user' => $profil
        ];
        if (isLoggedIn() == 'admin') {
            $this->view('destinations/home');
        }else if (isLoggedIn() == 'user'){
            $this->view('pengguna/profile', $data);
        }else {
            $this->view('pages/index');
        }
    }


    public function RiwayatransaksiPengguna()
    {
        $tr = $this->pgnModel->showTransaksiPengguna();
        $data = [
            'transaksi' => $tr
        ];
        if (isLoggedIn() == 'admin') {
            $this->view('destinations/home', $data);
        }else if (isLoggedIn() == 'user'){
            $this->view('pengguna/riwayatTransaksiPengguna', $data);
        }else {
            $this->view('pages/index');
        }
    }

    public function topUp()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            $username = $_SESSION['username'];
            $profil = $this->pgnModel->showProfile($username);
            $dataa = [
                'user' => $profil
            ];

            $saldo = $dataa['user']->saldo;

            $data = [
                'saldo' => trim($_POST['saldo'])
            ];

            if (empty($data['saldo'])) {
                $data['saldo_err'] = 'Mohon Isi Saldo';
            } 

            if (empty($data['saldo_err'])) {
                $totalsaldo = $saldo + $data['saldo'];
                $saldotambah = $this->pgnModel->tambahTopup($totalsaldo, $username);
                
                if ($saldotambah) {
                    redirect('penggunas/profile');
                }
            } else {
                // Load view dengan error
                $this->view('penggunas/topup', $data);
            }

            
        } else {
            $data = [
                'saldo' => '',
                'saldo_err' => ''
            ];
    
            $this->view('pengguna/topup', $data);
        }
        
    }

    public function editProfile()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $username = $_SESSION['username'];
            $data = [
                'nama' => trim($_POST['nama']),
                'email' => trim($_POST['email'])
            ];

            if (!empty($data['nama']) && !empty($data['email'])) {
                $dataedit = $this->pgnModel->editProfil($data, $username);
                if ($dataedit) {
                    redirect('penggunas/profile');
                }
            }
        } else {
            $username = $_SESSION['username'];
            $profil = $this->pgnModel->showProfile($username);
            $data = [
                'user' => $profil
            ];
            $this->view('pengguna/editProfile', $data);
        }
    }

    
    public function cariTiket()
    {
        $asal = $this->pgnModel->readAsal();
        $tujuan = $this->pgnModel->readTujuan();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            $data = [
                'asal_id' => trim($_POST['asal_id']),
                'tujuan_id' => trim($_POST['tujuan_id']),
                'asal1' => $asal,
                'tujuan1' => $tujuan,
                'asal_err' => '',
                'tujuan_err' =>'',
                'harga_err' => ''
            ];

            if (empty($data['asal_err']) && empty($data['tujuan_err'])) {
                $datacari = $this->pgnModel->cariTiket($data);
                
                // $data1 = [
                //     'datacari' => $datacari
                // ];

                if ($datacari) {
                    // var_dump($datacari);
                    $this->view('pengguna/showTiket', $datacari);
                }
            } else {
                // Load view dengan error
                $this->view('pengguna/cariTiket', $data);
            }

            
        } else {
            $data = [
                'asal_id' => '',               
                'tujuan_id' => '',
                'asal1' => $asal,
                'tujuan1' => $tujuan,
                'asal_err' => '',
                'tujuan_err' =>''
            ];
            
            if (isLoggedIn() == 'admin') {
                $this->view('destinations/home', $data);
            }else if (isLoggedIn() == 'user'){
                $this->view('pengguna/cariTiket', $data);
            }else {
                $this->view('pages/index');
            }
        }
    }

    public function showTiket()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            $data = [
                'asal_id' => trim($_POST['asal_id']),
                'tujuan_id' => trim($_POST['tujuan_id']),
                'asal_err' => '',
                'tujuan_err' =>'',
                'harga_err' => ''
            ];

            if (empty($data['asal_err']) && empty($data['tujuan_err'])) {
                $datacari = $this->pgnModel->cariTiket($data);
                
                $data1 = [
                    'datacari' => $datacari
                ];

                if ($datacari) {
                    redirect('penggunas/showTiket', $data1);
                }
            } else {
                // Load view dengan error
                $this->view('pengguna/cariTiket', $data);
            }

            
        } else {
            $data = [
                'asal_id' => '',               
                'tujuan_id' => '',
                'asal_err' => '',
                'tujuan_err' =>''
            ];
            
            if (isLoggedIn() == 'admin') {
                $this->view('destinations/home', $data);
            }else if (isLoggedIn() == 'user'){
                $this->view('pengguna/cariTiket', $data);
            }else {
                $this->view('pages/index');
            }
        }

        $this->view('pengguna/showTiket');
    }
}