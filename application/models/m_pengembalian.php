<?php

class m_pengembalian extends CI_Model {

    public function __construct() {

        parent::__construct();
    }
    

    public function ls() {
        $sql = "SELECT *,count(`tbl_peminjaman`.`kode_peminjaman`) as jml FROM `tbl_peminjaman`
                    JOIN `tbl_pegawai` USING (`nip`)
                    JOIN `tbl_detail_peminjaman` USING (`kode_peminjaman`)
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
    
    public function delete($kode) {
        $sql = "DELETE FROM `tbl_peminjaman`
                    WHERE `kode_peminjaman`='$kode'";
        $query = $this->db->query($sql);
        return $query;
    }

    public function editStatus($params) {
        $sql = "UPDATE `tbl_peminjaman` SET `jenis`=?
                    WHERE `kode_peminjaman`=?";
        $query = $this->db->query($sql, $params);
        return $query;
    }


}

?>