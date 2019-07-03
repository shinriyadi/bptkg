<?php

class m_login extends CI_Model {

    public function __construct() {

        parent::__construct();
    }

    public function login($params) {
        $sql = "SELECT * FROM `tbl_user` WHERE username = ? AND `password` = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

}

?>