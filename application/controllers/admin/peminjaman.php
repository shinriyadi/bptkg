<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once( APPPATH . 'controllers/base/baseadmin.php' );

class peminjaman extends baseadmin {

    public function __construct() {
        parent::__construct();
        $this->load->model('m_peminjaman');
        $this->load->model('m_pegawai');
        $this->load->model('m_bmn');
        $this->load->model('m_detail_peminjaman');
        // $this->load->model('m_pengembalian');
    }

    public function index() {
        $data['ls'] = $this->m_peminjaman->ls();
        parent::display('peminjaman/list', $data);
    }

    public function lsPegawai() {
        $data['ls'] = $this->m_pegawai->ls();
        unset($_SESSION['barang']);
        parent::display('peminjaman/pegawai', $data);
    }

    public function add($kode) {
        //nip
        $pecah = explode("%20", $kode);
        $nip = "";
        for ($i = 0; $i < count($pecah); $i++) {
            if ($i == count($pecah) - 1) {
                $nip .= $pecah[$i];
            } else {
                $nip .= $pecah[$i] . " ";
            }
        }
        //end nip

        //daftar barang yang ingin dipinjam
        if (!isset($_SESSION['barang']) || $_SESSION['barang']=="") {
            $_SESSION['barang'] = "";
        }

        $barang = $_SESSION['barang'];
        $pecah = explode('~', $barang);

        $dt = array();

        foreach ($pecah as $item) {
            $ls = $this->m_bmn->view($item);
            array_push($dt, $ls);
        }
        $data['lsPinjam'] = $dt;

        // //end daftar barang yang ingin dipinjam

        $data['vPegawai'] = $this->m_pegawai->view($nip);
        $data['lsBMN'] = $this->m_bmn->lsBMN();

        // $data['idBarangPinjam'] = $pecah;

        parent::display('peminjaman/add', $data);
    }

    public function add2($kode) {
        //nip
        $pecah = explode("%20", $kode);
        $nip = "";
        for ($i = 0; $i < count($pecah); $i++) {
            if ($i == count($pecah) - 1) {
                $nip .= $pecah[$i];
            } else {
                $nip .= $pecah[$i] . " ";
            }
        }
        //end nip
        //daftar barang yang ingin dipinjam
        if (!isset($_SESSION['barang'])) {
            $_SESSION['barang'] = "";
        }

        $barang = $_SESSION['barang'];
        $pecah = explode('~', $barang);

        $dt = array();

        foreach ($pecah as $item) {
            $ls = $this->m_bmn->view($item);
            array_push($dt, $ls);
        }
        $data['lsPinjam'] = $dt;

        //end daftar barang yang ingin dipinjam

        $data['vPegawai'] = $this->m_pegawai->view($nip);

        parent::display('peminjaman/add2', $data);
    }

    public function addProses() {
        $params = array(
            $this->input->post('nip'),
            $this->input->post('no_dokumen'),
            $this->input->post('keperluan'),
            $this->input->post('tgl_pinjam'),
            $this->input->post('tgl_kembali'),
            'Peminjaman',
        );

        $cek = $this->m_peminjaman->add($params);

        $last = $this->m_peminjaman->last();

        $kode_peminjaman = $last['kode_peminjaman'];

        $barang = $_SESSION['barang'];
        $pecah = explode('~', $barang);

        $dt = array();
        foreach ($pecah as $detail) {
            $par = array(
                $detail,
                $kode_peminjaman
            );
            $add = $this->m_detail_peminjaman->add($par);

            $param = array(
                'Dipinjam',
                $detail
            );
            $edit = $this->m_bmn->editStatus($param);
        }

        unset($_SESSION['barang']);
        $this->session->set_flashdata('msg', 'Berhasil Menambah Data Peminjaman~1');
        redirect('admin/peminjaman');
    }

    public function detail($kode) {
        $data['v'] = $this->m_peminjaman->view($kode);
        $data['lsPinjam'] = $this->m_detail_peminjaman->lsPinjam($data['v']['kode_peminjaman']);

        $this->load->view('admin/peminjaman/detail', $data);
    }

    
    public function delete($kode) {
        $ls = $this->m_detail_peminjaman->lsPinjam($kode);

        $cek = $this->m_peminjaman->delete($kode);

        if ($cek) {
            foreach ($ls as $v) {
                $param = array(
                    'Digudang',
                    $v['no_inventaris']
                );
                $edit = $this->m_bmn->editStatus($param);
            }
            $this->session->set_flashdata('msg', 'Berhasil Membatalkan Data Peminjaman~1');
            redirect('admin/peminjaman');
        } else {
            $this->session->set_flashdata('msg', 'Gagal Membatalakan Data Peminjaman~0');
            redirect('admin/peminjaman');
        }
    }

    public function addBMN($nip) {
        $pecah = explode("%20", $nip);
        $nip = "";
        for ($i = 0; $i < count($pecah); $i++) {
            if ($i == count($pecah) - 1) {
                $nip .= $pecah[$i];
            } else {
                $nip .= $pecah[$i] . " ";
            }
        }

        $kode = $this->uri->segment(5);

        if (!isset($_SESSION['barang'])) {
            $_SESSION['barang'] = "";
        }
        $barang = $_SESSION['barang'];
        if ($barang) {
            $items = explode('~', $barang);
            foreach ($items as $inventaris) {
                if ($inventaris == $kode) {
                    $this->session->set_flashdata('msg', 'Maaf BMN Sudah Ada di Daftar Pinjam~0');
                    redirect('admin/peminjaman/add/' . $nip);
                }
            }

            $barang .= '~' . $kode;
        } else {
            $barang = $kode;
        }
        $_SESSION['barang'] = $barang;
        redirect('admin/peminjaman/add/' . $nip);
    }

    public function deleteBMN($nip) {
        $pecah = explode("%20", $nip);
        $nip = "";
        for ($i = 0; $i < count($pecah); $i++) {
            if ($i == count($pecah) - 1) {
                $nip .= $pecah[$i];
            } else {
                $nip .= $pecah[$i] . " ";
            }
        }

        $index = $this->uri->segment(5);

        $barang = $_SESSION['barang'];

        $items = explode('~', $barang);

        $dt = array();


        foreach ($items as $inventaris) {
            array_push($dt, $inventaris);
        }

        $arnewinventaris = array();

        for ($i = 0; $i < count($dt); $i++) {
            if ($index != $i) {
                array_push($arnewinventaris, $dt[$i]);
            }
        }

        $max = count($arnewinventaris) - 1;
        $par = "";
        for ($i = 0; $i < count($arnewinventaris); $i++) {
            $par = $par . $arnewinventaris[$i];
            if ($i != $max) {
                $par = $par . "~";
            }
        }
        //echo $par;
        if ($par) {
            $_SESSION['barang'] = $par;
        } else {
            unset($_SESSION['barang']);
        }

        redirect('admin/peminjaman/add/' . $nip);
    }

    public function batal() {
        if (isset($_SESSION['barang'])) {
            unset($_SESSION['barang']);
        }
        redirect('admin/karyawan/lsKaryawan');
    }

    public function cetak($kode) {
        $data['v'] = $this->m_peminjaman->view($kode);
        $data['ls'] = $this->m_detail_peminjaman->lsPinjam($data['v']['kode_peminjaman']);
        $data['vPegawai'] = $this->m_pegawai->view($data['v']['nip']);

        // As PDF creation takes a bit of memory, we're saving the created file in /downloads/reports/
        $filename = 'cetak_peminjaman';
        $pdfFilePath = FCPATH . "/upload/pdf/$filename.pdf";

        ini_set('memory_limit', '1024M'); // boost the memory limit if it's low <img src="http://davidsimpson.me/wp-includes/images/smilies/icon_wink.gif" alt=";)" class="wp-smiley"> 
        $html = $this->load->view('admin/peminjaman/cetak', $data, true); // render the view into HTML

        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->SetFooter($_SERVER['HTTP_HOST'] . '|{PAGENO}|' . date(DATE_RFC822)); // Add a footer for good measure <img src="http://davidsimpson.me/wp-includes/images/smilies/icon_wink.gif" alt=";)" class="wp-smiley"> 
        $pdf->WriteHTML($html); // write the HTML into the PDF
        $pdf->Output($pdfFilePath, 'F'); // save to file because we can
        redirect(base_url() . 'upload/pdf/' . $filename . '.pdf');
    }


}

?>