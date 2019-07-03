<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once( APPPATH . 'controllers/base/baseadmin.php' );

class home extends baseadmin {

    public function __construct() {
        parent::__construct();
        $this->load->model('m_pegawai');
        $this->load->model('m_bmn');
        $this->load->model('m_peminjaman');
        $this->load->model('m_user');
    }

    function index() {
    	$data['pegawai'] = $this->m_pegawai->hitung();
    	$data['bmn'] = $this->m_bmn->hitung();
        $data['peminjaman'] = $this->m_peminjaman->hitung();
        $data['user'] = $this->m_user->hitung();
        parent::display('home', $data);
        
    }

}

?>