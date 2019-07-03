<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once( APPPATH . 'controllers/base/baseadmin.php' );

class pengguna extends baseadmin {

    public function __construct() {
        parent::__construct();
        $this->load->model('m_pengguna');
        $this->load->model('m_hakakses');
    }

    public function index() {
        $data['ls'] = $this->m_pengguna->ls();
        parent::display('pengguna/list', $data);
    }

    public function add() {
        $data['lsHakAkses'] = $this->m_hakakses->ls();
        parent::display('pengguna/edit', $data);
    }

    public function addProses() {
        $params = array(
            $this->input->post('username'),
            $this->input->post('password'),
            $this->input->post('kode_hak_akses')
        );

        $cek = $this->m_pengguna->add($params);

        if ($cek) {
            $this->session->set_flashdata('msg', 'Berhasil Menambah Data~1');
            redirect('admin/pengguna');
        } else {
            $this->session->set_flashdata('msg', 'Gagal Menambah Data~0');
            redirect('admin/pengguna');
        }
    }
    
    public function edit($kode) {
        $data['lsHakAkses'] = $this->m_hakakses->ls();
        $data['v'] = $this->m_pengguna->view($kode);
        parent::display('pengguna/edit', $data);
    }
    
    public function editProses() {
        $params = array(
            $this->input->post('username'),
            $this->input->post('password'),
            $this->input->post('kode_hak_akses'),
            $this->input->post('kode_pengguna')
        );

        $cek = $this->m_pengguna->edit($params);

        if ($cek) {
            $this->session->set_flashdata('msg', 'Berhasil Merubah Data~1');
            redirect('admin/pengguna');
        } else {
            $this->session->set_flashdata('msg', 'Gagal Merubah Data~0');
            redirect('admin/pengguna');
        }
    }

    public function delete($kode) {
        $cek = $this->m_pengguna->delete($kode);

        if ($cek) {
            $this->session->set_flashdata('msg', 'Berhasil Menghapus Data~1');
            redirect('admin/pengguna');
        } else {
            $this->session->set_flashdata('msg', 'Gagal Menghapus Data~0');
            redirect('admin/pengguna');
        }
    }
    
    public function editProfil($kode) {
        $data['v'] = $this->m_pengguna->view($kode);
        parent::display('pengguna/editProfil', $data);
    }
    
    public function editProfilProses() {
        $params = array(
            $this->input->post('username'),
            $this->input->post('password'),
            $this->input->post('kode_pengguna')
        );

        $cek = $this->m_pengguna->editProfil($params);

        if ($cek) {
            $this->session->set_flashdata('msg', 'Berhasil Merubah Data~1');
            redirect('admin/home');
        } else {
            $this->session->set_flashdata('msg', 'Gagal Merubah Data~0');
            redirect('admin/home');
        }
    }

}

?>