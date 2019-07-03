<?php

class login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('m_login');
    }

    function index() {
        if(isset($_SESSION['kepala']) || isset($_SESSION['pengelola'])) {
            redirect('admin/home');
        }
        $this->load->view('login');
    }

    function loginProcess() {
        $params = array(
            $this->input->post('username'),
            md5($this->input->post('password'))
        );

        $cekLogin = $this->m_login->login($params);

        if ($cekLogin == NULL) {
            $_SESSION['notif'] = "Login Gagal. Periksa Username atau Password";
            redirect("");
        } else {
            if($cekLogin['role']=='Kepala Gudang') {
                $_SESSION['kepala'] = $cekLogin['kode_user'];
            } else {
                $_SESSION['pengelola'] = $cekLogin['kode_user'];
            }
            redirect('admin/home');
        }
    }

    public function logout() {
        if (isset($_SESSION['kepala'])) {
            unset($_SESSION['kepala']);
        }

         if (isset($_SESSION['pengelola'])) {
            unset($_SESSION['pengelola']);
        }

        redirect('login');
    }

}

?>