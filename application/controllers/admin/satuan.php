<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once( APPPATH . 'controllers/base/baseadmin.php' );

class satuan extends baseadmin {

    public function __construct() {
        parent::__construct();
        $this->load->model('m_satuan');
    }

    public function index() {
        $data['ls'] = $this->m_satuan->ls();
        parent::display('satuan/list', $data);
    }

    public function add() {
        parent::display('satuan/edit');
    }

    public function addProses() {
        $satuan = $this->input->post('nama_satuan');

        $cek = $this->m_satuan->add($satuan);

        if ($cek) {
            $this->session->set_flashdata('msg', 'Berhasil Menambah Data~1');
            redirect('admin/satuan');
        } else {
            $this->session->set_flashdata('msg', 'Gagal Menambah Data~0');
            redirect('admin/satuan');
        }
    }

    public function edit($kode) {
        $data['v'] = $this->m_satuan->view($kode);
        $this->load->view('admin/satuan/edit',$data);
    }

    public function editProses() {
        $params = array(
            $this->input->post('nama_satuan'),
            $this->input->post('kode')
        );

        $cek = $this->m_satuan->edit($params);

        if ($cek) {
            $this->session->set_flashdata('msg', 'Berhasil Merubah Data~1');
            redirect('admin/satuan');
        } else {
            $this->session->set_flashdata('msg', 'Gagal Merubah Data~0');
            redirect('admin/satuan');
        }
    }

    public function delete($kode) {
        $cek = $this->m_satuan->delete($kode);

        if ($cek) {
            $this->session->set_flashdata('msg', 'Berhasil Menghapus Data~1');
            redirect('admin/satuan');
        } else {
            $this->session->set_flashdata('msg', 'Gagal Menghapus Data~0');
            redirect('admin/satuan');
        }
    }

}

?>