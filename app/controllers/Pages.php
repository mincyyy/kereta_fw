<?php 

class Pages extends Controller
{
    public function __construct()
    {

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

    public function about()
    {
        $data = [
            'nama' => 'siapa'
        ];

        $this->view('inc/header');
        $this->view('pages/about', $data);
        $this->view('inc/footer');
    }

}
