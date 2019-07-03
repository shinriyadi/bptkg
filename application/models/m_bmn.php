<?php

class m_bmn extends CI_Model {

    public function __construct() {

        parent::__construct();
    }

    public function ls() {
        $sql = "SELECT * FROM `tbl_bmn` JOIN `tbl_satuan`
                    USING(`kode_satuan`)
                    JOIN `tbl_gudang` USING(`kode_gudang`)
                    ORDER BY `no_inventaris`";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    public function lsBMN() {
        $sql = "SELECT * FROM `tbl_bmn` JOIN `tbl_satuan`
                    USING(`kode_satuan`)
                    JOIN `tbl_gudang` USING(`kode_gudang`)
                    WHERE `status`='Digudang'
                    ORDER BY `no_inventaris`";
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
        $sql = "INSERT INTO `tbl_bmn` (`no_inventaris`, `nama_bmn`, `asal_perolehan_bmn`, 
                    `kondisi`, `kode_satuan`, `kode_gudang`,`foto`)
                    VALUES (?,?,?,?,?,?,?)";
        $query = $this->db->query($sql, $params);
        return $query;
    }

    public function view($kode) {
        $sql = "SELECT * FROM `tbl_bmn`
                    JOIN `tbl_satuan`  USING(`kode_satuan`)
                    JOIN `tbl_gudang` USING(`kode_gudang`)
                    WHERE `no_inventaris`='$kode'";
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
        $sql = "UPDATE `tbl_bmn` SET `no_inventaris`=?,
                    `nama_bmn`=?,
                    `asal_perolehan_bmn`=?,
                    `kondisi`=?,
                    `kode_satuan`=?,
                    `kode_gudang`=?,
                    `foto`=?
                    WHERE `no_inventaris`=?";
        $query = $this->db->query($sql, $params);
        return $query;
    }
    
    public function delete($kode) {
        $sql = "DELETE FROM `tbl_bmn`
                    WHERE `no_inventaris`='$kode'";
        $query = $this->db->query($sql);
        return $query;
    }
    
    function hitung(){
        $sql = "SELECT * FROM `tbl_bmn`";
        $query = $this->db->query($sql);
        $numRow = $query->num_rows();
        return $numRow;
    }  
    
    public function editStatus($params) {
        $sql = "UPDATE `tbl_bmn` SET `status`=?
                    WHERE `no_inventaris`=?";
        $query = $this->db->query($sql, $params);
        return $query;
    }
    

}

?>