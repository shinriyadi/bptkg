<?php

class m_user extends CI_Model {

    public function __construct() {

        parent::__construct();
    }

    public function ls() {
        $sql = "SELECT * FROM `tbl_user`";
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
        $sql = "INSERT INTO `tbl_user` (`username`,`password`,`role`)
                    VALUES (?,?,?)";
        $query = $this->db->query($sql,$params);
        return $query;
    }

    public function view($kode) {
        $sql = "SELECT * FROM `tbl_user`
                    WHERE `kode_user`='$kode'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }
    
    public function delete($kode) {
        $sql = "DELETE FROM `tbl_user`
                    WHERE `kode_user`='$kode'";
        $query = $this->db->query($sql);
        return $query;
    }

    function hitung(){
        $sql = "SELECT * FROM `tbl_user`";
        $query = $this->db->query($sql);
        $numRow = $query->num_rows();
        return $numRow;
    }

    public function edit($params) {
        $sql = "UPDATE `tbl_user` SET `password`=?
                WHERE `kode_user`=?";
        $query = $this->db->query($sql, $params);
        return $query;
    }

}

?>