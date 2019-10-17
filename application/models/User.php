<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model {
    public function auth($param) {
        $this->db->select('id');
        $this->db->where('username', $param['user']);
        $this->db->where('password', $param['pass']);
        return $this->db->get('mtd_users')->num_rows();
    }
}