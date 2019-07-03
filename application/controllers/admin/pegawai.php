<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once( APPPATH . 'controllers/base/baseadmin.php' );

class pegawai extends baseadmin {

    public function __construct() {
        parent::__construct();
        $this->load->model('m_pegawai');
    }

    public function index() {
        $data['ls'] = $this->m_pegawai->ls();
        parent::display('pegawai/list', $data);
    }

    public function edit($kode) {
        $pecah = explode("%20", $kode);
        $nip = "";
        for ($i = 0; $i < count($pecah); $i++) {
            if ($i == count($pecah) - 1) {
                $nip .= $pecah[$i];
            } else {
                $nip .= $pecah[$i] . " ";
            }
        }

        $data['v'] = $this->m_pegawai->view($nip);
        $this->load->view('admin/pegawai/edit',$data);
    }

    public function editProses() {
        $params = array(
            $this->input->post('nip'),
            $this->input->post('nama'),
            $this->input->post('jenis_kelamin'),
            $this->input->post('alamat'),
            $this->input->post('jabatan'),
            $this->input->post('telepon'),
            $this->input->post('kode')
        );

        $cek = $this->m_pegawai->edit($params);

        if ($cek) {
            $this->session->set_flashdata('msg', 'Berhasil Merubah Data~1');
            redirect('admin/pegawai');
        } else {
            $this->session->set_flashdata('msg', 'Gagal Merubah Data~0');
            redirect('admin/pegawai');
        }
    }

    public function addProses() {
        $params = array(
            $this->input->post('nip'),
            $this->input->post('nama'),
            $this->input->post('jenis_kelamin'),
            $this->input->post('alamat'),
            $this->input->post('jabatan'),
            $this->input->post('telepon'),

        );

        $cek = $this->m_pegawai->add($params);

        if ($cek) {
            $this->session->set_flashdata('msg', 'Berhasil Menambah Data~1');
            redirect('admin/pegawai');
        } else {
            $this->session->set_flashdata('msg', 'Gagal Menambah Data~0');
            redirect('admin/pegawai');
        }
    }

    public function delete() {
        $pecah = explode("%20", $kode);
        $nip = "";
        for ($i = 0; $i < count($pecah); $i++) {
            if ($i == count($pecah) - 1) {
                $nip .= $pecah[$i];
            } else {
                $nip .= $pecah[$i] . " ";
            }
        }

        $cek = $this->m_pegawai->delete($nip);

        if ($cek) {
            $this->session->set_flashdata('msg', 'Berhasil Menghapus Data~1');
            redirect('admin/pegawai');
        } else {
            $this->session->set_flashdata('msg', 'Gagal Menghapus Data~0');
            redirect('admin/pegawai');
        }
    }

    public function detail($kode) {
        $pecah = explode("%20", $kode);
        $nip = "";
        for ($i = 0; $i < count($pecah); $i++) {
            if ($i == count($pecah) - 1) {
                $nip .= $pecah[$i];
            } else {
                $nip .= $pecah[$i] . " ";
            }
        }

        $data['v'] = $this->m_pegawai->view($nip);
        $this->load->view('admin/pegawai/detail',$data);
    }

    public function cetak() {
        $data['ls'] = $this->m_pegawai->ls();                

        // As PDF creation takes a bit of memory, we're saving the created file in /downloads/reports/
        $filename = 'cetak_karyawan';
        $pdfFilePath = FCPATH . "/upload/pdf/$filename.pdf";

        ini_set('memory_limit', '1024M'); // boost the memory limit if it's low <img src="http://davidsimpson.me/wp-includes/images/smilies/icon_wink.gif" alt=";)" class="wp-smiley"> 
        $html = $this->load->view('admin/pegawai/cetak', $data, true); // render the view into HTML

        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->SetFooter($_SERVER['HTTP_HOST'] . '|{PAGENO}|' . date(DATE_RFC822)); // Add a footer for good measure <img src="http://davidsimpson.me/wp-includes/images/smilies/icon_wink.gif" alt=";)" class="wp-smiley"> 
        $pdf->WriteHTML($html); // write the HTML into the PDF
        $pdf->Output($pdfFilePath, 'F'); // save to file because we can
        redirect(base_url() . 'upload/pdf/' . $filename . '.pdf');
    }

    public function cetakDetail($kode) {
        $pecah = explode("%20", $kode);
        $nip = "";
        for ($i = 0; $i < count($pecah); $i++) {
            if ($i == count($pecah) - 1) {
                $nip .= $pecah[$i];
            } else {
                $nip .= $pecah[$i] . " ";
            }
        }

         $data['v'] = $this->m_pegawai->view($nip);

        // As PDF creation takes a bit of memory, we're saving the created file in /downloads/reports/
        $filename = 'cetak_detail_karyawan';
        $pdfFilePath = FCPATH . "/upload/pdf/$filename.pdf";

        ini_set('memory_limit', '1024M'); // boost the memory limit if it's low <img src="http://davidsimpson.me/wp-includes/images/smilies/icon_wink.gif" alt=";)" class="wp-smiley"> 
        $html = $this->load->view('admin/pegawai/cetakDetail', $data, true); // render the view into HTML

        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->SetFooter($_SERVER['HTTP_HOST'] . '|{PAGENO}|' . date(DATE_RFC822)); // Add a footer for good measure <img src="http://davidsimpson.me/wp-includes/images/smilies/icon_wink.gif" alt=";)" class="wp-smiley"> 
        $pdf->WriteHTML($html); // write the HTML into the PDF
        $pdf->Output($pdfFilePath, 'F'); // save to file because we can
        redirect(base_url() . 'upload/pdf/' . $filename . '.pdf');
    }
}

?>