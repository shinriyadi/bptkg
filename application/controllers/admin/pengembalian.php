<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once( APPPATH . 'controllers/base/baseadmin.php' );

class pengembalian extends baseadmin {

    public function __construct() {
        parent::__construct();
        $this->load->model('m_pegawai');
        $this->load->model('m_bmn');
        $this->load->model('m_detail_peminjaman');
        $this->load->model('m_pengembalian');
        $this->load->model('m_peminjaman');
    }

    public function index() {
        $data['ls'] = $this->m_pengembalian->ls();
        parent::display('pengembalian/list', $data);
    }

    public function kembalikan($kode) {
        $data['v'] = $this->m_pengembalian->view($kode);
        $data['lsPinjam'] = $this->m_detail_peminjaman->lsPinjam($data['v']['kode_peminjaman']);

        parent::display('pengembalian/kembalikan', $data);
    }

    public function editStatus() {
        $kode = $this->input->post('kode');

        $ls = $this->m_detail_peminjaman->lsPinjam($kode);

        $params = array(
            "Dikembalikan",
            $kode
        );
        $cek = $this->m_pengembalian->editStatus($params);

        if ($cek) {
            foreach ($ls as $v) {
                $param = array(
                    'Digudang',
                    $v['no_inventaris']
                );
                $edit = $this->m_bmn->editStatus($param);
            }
            $this->session->set_flashdata('msg', 'Berhasil Mengembalikan BMN~1');
            redirect('admin/pengembalian');
        } else {
            $this->session->set_flashdata('msg', 'Gagal Mengembalikan BMN~0');
            redirect('admin/pengembalian');
        }
    }

}

?>