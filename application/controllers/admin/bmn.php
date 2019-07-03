<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once( APPPATH . 'controllers/base/baseadmin.php' );

class bmn extends baseadmin {

    public function __construct() {
        parent::__construct();
        $this->load->model('m_bmn');
        $this->load->model('m_satuan');
        $this->load->model('m_gudang');
        $this->load->model('m_detail_peminjaman');
    }

    public function index() {
        $data['ls'] = $this->m_bmn->ls();
        $data['lsSatuan'] = $this->m_satuan->ls();
        $data['lsGudang'] = $this->m_gudang->ls();
        parent::display('bmn/list', $data);
    }

    public function addProses() {
        //upload foto
        $config['upload_path'] = './upload/bmn/';  // destination folder path
        $config['allowed_types'] = 'gif|jpg|png'; // Allowed uploaded file type
        $config['max_size'] = "2048"; // Allowed uploaded file’s max size
        $this->load->library("upload", $config);
        $image_up = $this->upload->do_upload("foto");
        $image_data = $this->upload->data();
        $params = array(
            $this->input->post('no_inventaris'),
            $this->input->post('nama_bmn'),
            $this->input->post('asal'),
            $this->input->post('kondisi'),
            $this->input->post('satuan'),
            $this->input->post('gudang'),
            $image_data['file_name']
        );

        $config = array(
            'source_image' => $image_data['full_path'],
            'new_image' => $config['upload_path'] . 'thumbs',
            'maintain_ration' => true,
            'width' => 160,
            'height' => 120
        );
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();

        $cek = $this->m_bmn->add($params);

        if ($cek) {
            $this->session->set_flashdata('msg', 'Berhasil Menambah Data~1');
            redirect('admin/bmn');
        } else {
            $this->session->set_flashdata('msg', 'Gagal Menambah Data~0');
            redirect('admin/bmn');
        }
    }

    public function edit($kode) {
        $data['v'] = $this->m_bmn->view($kode);
        $data['lsSatuan'] = $this->m_satuan->ls();
        $data['lsGudang'] = $this->m_gudang->ls();
        $this->load->view('admin/bmn/edit', $data);
    }

    public function editProses() {
        //upload foto
        $config['upload_path'] = './upload/bmn/';  // destination folder path
        $config['allowed_types'] = 'gif|jpg|png'; // Allowed uploaded file type
        $config['max_size'] = "2048"; // Allowed uploaded file’s max size
        $this->load->library("upload", $config);
        $image_up = $this->upload->do_upload("foto");
        $image_data = $this->upload->data();

        if ($image_up) {
            $foto = $image_data['file_name'];
            unlink('./upload/bmn/' . $this->input->post('foto_asli'));
        } else {
            $foto = $this->input->post('foto_asli');
        }

        $params = array(
            $this->input->post('no_inventaris'),
            $this->input->post('nama_bmn'),
            $this->input->post('asal'),
            $this->input->post('kondisi'),
            $this->input->post('satuan'),
            $this->input->post('gudang'),
            $foto,
            $this->input->post('kode')
        );

        $config = array(
            'source_image' => $image_data['full_path'],
            'new_image' => $config['upload_path'] . 'thumbs',
            'maintain_ration' => true,
            'width' => 160,
            'height' => 120
        );
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();

        $cek = $this->m_bmn->edit($params);

        if ($cek) {
            $this->session->set_flashdata('msg', 'Berhasil Merubah Data~1');
            redirect('admin/bmn');
        } else {
            $this->session->set_flashdata('msg', 'Gagal Merubah Data~0');
            redirect('admin/bmn');
        }
    }

    public function delete($kode) {
        $view = $this->m_bmn->view($kode);

        if ($view['status'] == 'Digudang') {
            unlink('./upload/bmn/' . $view['foto']);
            $cek = $this->m_bmn->delete($kode);
        } else {
            $this->session->set_flashdata('msg', 'Maaf Barang sedang ' . $view['status'] . ' tidak bisa dihapus~0');
            redirect('admin/bmn');
        }

        if ($cek) {
            $this->session->set_flashdata('msg', 'Berhasil Menghapus Data~1');
            redirect('admin/bmn');
        } else {
            $this->session->set_flashdata('msg', 'Gagal Menghapus Data~0');
            redirect('admin/bmn');
        }
    }

    public function detail($kode) {
        $data['v'] = $this->m_bmn->view($kode);
        $data['lsSatuan'] = $this->m_satuan->ls();
        $data['lsGudang'] = $this->m_gudang->ls();
        $this->load->view('admin/bmn/detail', $data);
    }

    public function cetak() {
        $data['ls'] = $this->m_bmn->ls();

        // As PDF creation takes a bit of memory, we're saving the created file in /downloads/reports/
        $filename = 'cetak_bmn';
        $pdfFilePath = FCPATH . "/upload/pdf/$filename.pdf";

        ini_set('memory_limit', '1024M'); // boost the memory limit if it's low <img src="http://davidsimpson.me/wp-includes/images/smilies/icon_wink.gif" alt=";)" class="wp-smiley"> 
        $html = $this->load->view('admin/bmn/cetak', $data, true); // render the view into HTML

        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->SetFooter($_SERVER['HTTP_HOST'] . '|{PAGENO}|' . date(DATE_RFC822)); // Add a footer for good measure <img src="http://davidsimpson.me/wp-includes/images/smilies/icon_wink.gif" alt=";)" class="wp-smiley"> 
        $pdf->WriteHTML($html); // write the HTML into the PDF
        $pdf->Output($pdfFilePath, 'F'); // save to file because we can
        redirect(base_url() . 'upload/pdf/' . $filename . '.pdf');
    }

}

?>