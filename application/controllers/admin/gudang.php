<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once( APPPATH . 'controllers/base/baseadmin.php' );

class gudang extends baseadmin {

    public function __construct() {
        parent::__construct();
        $this->load->model('m_gudang');
    }

    public function index() {
        $data['ls'] = $this->m_gudang->ls();
        parent::display('gudang/list', $data);
    }

    public function addProses() {
        $gudang = $this->input->post('nama_gudang');

        $cek = $this->m_gudang->add($gudang);

        if ($cek) {
            $this->session->set_flashdata('msg', 'Berhasil Menambah Data~1');
            redirect('admin/gudang');
        } else {
            $this->session->set_flashdata('msg', 'Gagal Menambah Data~0');
            redirect('admin/gudang');
        }
    }

    public function edit($kode) {
        $data['v'] = $this->m_gudang->view($kode);
        $this->load->view('admin/gudang/edit',$data);
    }

    public function editProses() {
        $params = array(
            $this->input->post('nama_gudang'),
            $this->input->post('kode')
        );

        $cek = $this->m_gudang->edit($params);

        if ($cek) {
            $this->session->set_flashdata('msg', 'Berhasil Merubah Data~1');
            redirect('admin/gudang');
        } else {
            $this->session->set_flashdata('msg', 'Gagal Merubah Data~0');
            redirect('admin/gudang');
        }
    }

    public function delete($kode) {
        $cek = $this->m_gudang->delete($kode);

        if ($cek) {
            $this->session->set_flashdata('msg', 'Berhasil Menghapus Data~1');
            redirect('admin/gudang');
        } else {
            $this->session->set_flashdata('msg', 'Gagal Menghapus Data~0');
            redirect('admin/gudang');
        }
    }

}

?>