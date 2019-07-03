<?php

class m_pegawai extends CI_Model {

    public function __construct() {

        parent::__construct();
    }

    public function ls() {
        $sql = "SELECT * FROM `tbl_pegawai`
                    ORDER BY `nama`";
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
        $sql = "INSERT INTO `tbl_pegawai` (`nip`,`nama`,`jenis_kelamin`,`alamat`,`jabatan`,`telepon`)
                    VALUES (?,?,?,?,?,?)";
        $query = $this->db->query($sql,$params);
        return $query;
    }

    public function view($kode) {
        $sql = "SELECT * FROM `tbl_pegawai`
                    WHERE `nip`='$kode'";
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
        $sql = "UPDATE `tbl_pegawai` SET `nip`=?,`nama`=?,`jenis_kelamin`=?,`alamat`=?,`jabatan`=?,`telepon`=?
                    WHERE `nip`=?";
        $query = $this->db->query($sql, $params);
        return $query;
    }
    
    public function delete($kode) {
        $sql = "DELETE FROM `tbl_pegawai`
                    WHERE `nip`='$kode'";
        $query = $this->db->query($sql);
        return $query;
    }

    function hitung(){
        $sql = "SELECT * FROM `tbl_pegawai`";
        $query = $this->db->query($sql);
        $numRow = $query->num_rows();
        return $numRow;
    }

}

?>