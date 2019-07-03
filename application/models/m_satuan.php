<?php

class m_satuan extends CI_Model {

    public function __construct() {

        parent::__construct();
    }

    public function ls() {
        $sql = "SELECT * FROM `tbl_satuan`";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    public function add($nama_satuan) {
        $sql = "INSERT INTO `tbl_satuan` (`nama_satuan`)
                    VALUES ('$nama_satuan')";
        $query = $this->db->query($sql);
        return $query;
    }

    public function view($kode) {
        $sql = "SELECT * FROM `tbl_satuan`
                    WHERE `kode_satuan`='$kode'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }
    
    public function viewsatuan($nama) {
        $sql = "SELECT * FROM `tbl_satuan`
                    WHERE `nama_satuan`='$nama'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    public function edit($params) {
        $sql = "UPDATE `tbl_satuan` SET `nama_satuan`=?
                    WHERE `kode_satuan`=?";
        $query = $this->db->query($sql, $params);
        return $query;
    }
    
    public function delete($kode) {
        $sql = "DELETE FROM `tbl_satuan`
                    WHERE `kode_satuan`='$kode'";
        $query = $this->db->query($sql);
        return $query;
    }

}

?>