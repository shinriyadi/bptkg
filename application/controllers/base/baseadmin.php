<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class baseadmin extends CI_Controller {

    public function __construct() {

        parent::__construct();
        if (!isset($_SESSION['kepala']) && !isset($_SESSION['pengelola'])) {
            redirect('login');
        }

        $this->load->library('notif');
        $this->load->model('m_user');
    }

    public function display($file, $dt = array()) {
        $kode_user = "";
        if(isset($_SESSION['kepala'])) {
            $kode_user = $_SESSION['kepala'];
        } elseif ($_SESSION['pengelola']) {
            $kode_user = $_SESSION['pengelola'];
        }

        $dt['msg'] = $this->notif->tnotif($this->session->flashdata('msg'));
        $kk['vUser'] = $this->m_user->view($kode_user);
        $kk['url'] = $this->uri->segment(2);

        if (count($dt != 0)) {
            $this->load->view('admin/base/header', $kk);
            $this->load->view('admin/' . $file, $dt);
            $this->load->view('admin/base/footer');
        } else {
            $this->load->view('admin/base/header', $kk);
            $this->load->view('admin/' . $file);
            $this->load->view('admin/base/footer');
        }
    }

}
?>

