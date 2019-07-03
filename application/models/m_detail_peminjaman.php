<?php

class m_detail_peminjaman extends CI_Model {

    public function __construct() {

        parent::__construct();
    }

    public function lsPinjam($kode) {
        $sql = "SELECT * FROM `tbl_detail_peminjaman`
                    JOIN `tbl_bmn` USING(`no_inventaris`)
                    JOIN `tbl_satuan` USING(`kode_satuan`)
                    WHERE `tbl_detail_peminjaman`.`kode_peminjaman` = '$kode'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }
    
    public function lsKembali($kode) {
        $sql = "SELECT * FROM `tbl_detail_peminjaman`
                    INNER JOIN `tbl_bmn` ON `tbl_detail_peminjaman`.`kode_inventaris`=`tbl_bmn`.`kode_inventaris`
                    INNER JOIN `tbl_satuan` ON `tbl_bmn`.`kode_satuan`=`tbl_satuan`.`kode_satuan`
                    WHERE `tbl_detail_peminjaman`.`kode_peminjaman` = '$kode'
                    AND `status_detail_peminjaman`='Dikembalikan'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }
    
    public function lsPinjam2($kode) {
        $sql = "SELECT * FROM `tbl_detail_peminjaman`
                    INNER JOIN `tbl_bmn` ON `tbl_detail_peminjaman`.`kode_inventaris`=`tbl_bmn`.`kode_inventaris`
                    WHERE `tbl_detail_peminjaman`.`kode_peminjaman` = '$kode'";
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
        $sql = "INSERT INTO `tbl_detail_peminjaman` (`no_inventaris`,`kode_peminjaman`)
                    VALUES (?,?)";
        $query = $this->db->query($sql, $params);
        return $query;
    }
    
    public function addPenempatan($params) {
        $sql = "INSERT INTO `tbl_detail_peminjaman` (`kode_inventaris`,`kode_peminjaman`,`status_detail_peminjaman`)
                    VALUES (?,?,?)";
        $query = $this->db->query($sql, $params);
        return $query;
    }
    
    public function delete($kode) {
        $sql = "DELETE FROM `tbl_detail_peminjaman`
                        WHERE `kode_detail_peminjaman`='$kode'";
        $query = $this->db->query($sql);
        return $query;
    }
    
    public function edit($params) {
        $sql = "UPDATE `tbl_detail_peminjaman` SET `status_detail_peminjaman`=?,
                    `tgl_kembali`=?
                    WHERE `kode_detail_peminjaman`=?";
        $query = $this->db->query($sql, $params);
        return $query;
    }
    
    public function getLast($kode) {
        $sql = "SELECT * FROM `tbl_detail_peminjaman`
                    WHERE `tbl_detail_peminjaman`.`kode_peminjaman` = '$kode'
                    AND `status_detail_peminjaman`='Dipinjam'
                    ORDER BY `tgl_kembali` DESC
                    LIMIT 1";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }
    
    public function getLast2($kode) {
        $sql = "SELECT * FROM `tbl_detail_peminjaman`
                    WHERE `tbl_detail_peminjaman`.`kode_peminjaman` = '$kode'
                    AND (`status_detail_peminjaman`='Ditempatkan' OR `status_detail_peminjaman`='Dipinjam')
                    ORDER BY `tgl_kembali` DESC
                    LIMIT 1";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }
    
    public function getLastKembali($kode) {
        $sql = "SELECT * FROM `tbl_detail_peminjaman`
                    WHERE `tbl_detail_peminjaman`.`kode_peminjaman` = '$kode'
                    AND `status_detail_peminjaman`='Dikembalikan'
                    ORDER BY `tgl_kembali` DESC
                    LIMIT 1";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }
    
    public function pinjam($kode_inventaris,$status) {
        $sql = "SELECT * FROM `tbl_detail_peminjaman`
                    INNER JOIN `tbl_peminjaman` ON `tbl_detail_peminjaman`.`kode_peminjaman`=`tbl_peminjaman`.`kode_peminjaman`
                    INNER JOIN `tbl_karyawan` ON `tbl_peminjaman`.`nip`=`tbl_karyawan`.`nip`
                    WHERE `tbl_detail_peminjaman`.`kode_inventaris` = '$kode_inventaris'
                    AND `status_detail_peminjaman`='$status'
                    LIMIT 1";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }
    
    public function tempatkan($kode_inventaris,$status) {
        $sql = "SELECT * FROM `tbl_detail_peminjaman`
                    INNER JOIN `tbl_peminjaman` ON `tbl_detail_peminjaman`.`kode_peminjaman`=`tbl_peminjaman`.`kode_peminjaman`
                    INNER JOIN `tbl_karyawan` ON `tbl_peminjaman`.`nip`=`tbl_karyawan`.`nip`
                    LEFT JOIN `tbl_ruangan` ON `tbl_peminjaman`.`kode_ruangan`=`tbl_ruangan`.`kode_ruangan`
                    LEFT JOIN `tbl_lokasi` ON `tbl_ruangan`.`kode_lokasi`=`tbl_lokasi`.`kode_lokasi` 
                    LEFT JOIN `tbl_kota` ON `tbl_lokasi`.`kode_kota`=`tbl_kota`.`kode_kota`
                    LEFT JOIN `tbl_provinsi` ON `tbl_provinsi`.`kode_provinsi`=`tbl_kota`.`kode_provinsi`
                    WHERE `tbl_detail_peminjaman`.`kode_inventaris` = '$kode_inventaris'
                    AND `status_detail_peminjaman`='$status'
                    LIMIT 1";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }
    
    public function lsBarang($kode_inventaris) {
        $sql = "SELECT * FROM `tbl_detail_peminjaman`
                    LEFT JOIN `tbl_peminjaman` ON `tbl_detail_peminjaman`.`kode_peminjaman`=`tbl_peminjaman`.`kode_peminjaman`
                    LEFT JOIN `tbl_karyawan` ON `tbl_peminjaman`.`nip`=`tbl_karyawan`.`nip`
                    WHERE `tbl_detail_peminjaman`.`kode_inventaris` = '$kode_inventaris'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

}

?>