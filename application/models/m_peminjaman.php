<?php

class m_peminjaman extends CI_Model {

    public function __construct() {

        parent::__construct();
    }
    

    public function ls() {
        $sql = "SELECT *,count(`tbl_peminjaman`.`kode_peminjaman`) as jml FROM `tbl_peminjaman`
                    JOIN `tbl_pegawai` USING (`nip`)
                    JOIN `tbl_detail_peminjaman` USING (`kode_peminjaman`)
                    WHERE `jenis`='Peminjaman'
                    GROUP BY `tbl_peminjaman`.`kode_peminjaman`
                    ORDER BY `tbl_peminjaman`.`kode_peminjaman` DESC";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    public function add($params) {
        $sql = "INSERT INTO `tbl_peminjaman` (`nip`,`no_dokumen`,`keperluan`,`tgl_pinjam`,`tgl_kembali`,`jenis`)
                    VALUES (?,?,?,?,?,?)";
        $query = $this->db->query($sql,$params);
        return $query;
    }

    public function view($kode) {
        $sql = "SELECT * FROM `tbl_peminjaman`
                    JOIN `tbl_pegawai` USING(`nip`)
                    WHERE `kode_peminjaman`='$kode'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    public function editStatus($params) {
        $sql = "UPDATE `tbl_peminjaman` SET `status_peminjaman`=?
                    WHERE `kode_peminjaman`=?";
        $query = $this->db->query($sql, $params);
        return $query;
    }
    
    public function edit($params) {
        $sql = "UPDATE `tbl_peminjaman` SET `tanggal_laporan`=?,
                    `keperluan`=?,
                    `no_dokumen`=?
                    WHERE `kode_peminjaman`=?";
        $query = $this->db->query($sql, $params);
        return $query;
    }
    
    public function delete($kode) {
        $sql = "DELETE FROM `tbl_peminjaman`
                    WHERE `kode_peminjaman`='$kode'";
        $query = $this->db->query($sql);
        return $query;
    }
    
    public function last() {
        $sql = "SELECT MAX(`kode_peminjaman`) AS kode_peminjaman FROM `tbl_peminjaman`";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function hitung(){
        $sql = "SELECT * FROM `tbl_peminjaman`";
        $query = $this->db->query($sql);
        $numRow = $query->num_rows();
        return $numRow;
    }

}

?>