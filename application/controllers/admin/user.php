<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once( APPPATH . 'controllers/base/baseadmin.php' );

class user extends baseadmin {

    public function __construct() {
        parent::__construct();
        $this->load->model('m_user');
    }

    public function index() {
        $data['ls'] = $this->m_user->ls();
        parent::display('user/list', $data);
    }

    public function addProses() {
        $params = array(
            $this->input->post('username'),
            md5($this->input->post('password')),
            $this->input->post('role')
        );

        $cek = $this->m_user->add($params);

        if ($cek) {
            $this->session->set_flashdata('msg', 'Berhasil Menambah Data~1');
            redirect('admin/user');
        } else {
            $this->session->set_flashdata('msg', 'Gagal Menambah Data~0');
            redirect('admin/user');
        }
    }

    public function delete($kode) {
        $cek = $this->m_user->delete($kode);

        if ($cek) {
            $this->session->set_flashdata('msg', 'Berhasil Menghapus Data~1');
            redirect('admin/user');
        } else {
            $this->session->set_flashdata('msg', 'Gagal Menghapus Data~0');
            redirect('admin/user');
        }
    }

    public function edit($kode) {
        $data['vUser'] = $this->m_user->view($kode);
        $this->load->view('admin/user/edit',$data);
    }

    public function editProses() {
        if(md5($this->input->post('password_lama')) == $this->input->post('password_lama_benar')) {
            if(md5($this->input->post('password_baru1')) == md5($this->input->post('password_baru2'))) {
                $params = array(
                    md5($this->input->post('password_baru1')),
                    $this->input->post('kode_user')                    
                );

                $cek = $this->m_user->edit($params);

                if($cek){
                    $this->session->set_flashdata('msg', 'Berhasil Mengubah Password~1');
                    redirect('admin/user');
                } else {
                    $this->session->set_flashdata('msg', 'Gagal Mengubah Password~0');
                    redirect('admin/user');
                }

            } else {
                $this->session->set_flashdata('msg', 'Verifikasi Password Baru Harus Sama~0');
            redirect('admin/user');
            }
        } else {
            $this->session->set_flashdata('msg', 'Masukkan Password Lama dengan Benar~0');
            redirect('admin/user');
        }

    }
}

?>