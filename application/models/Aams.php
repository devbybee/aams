<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aams extends CI_Model {

    public function get_links() {
        $this->db->select('id, link');
        return $this->db->get('trx_app_link')->result_array();
    }

    public function insert_transaction($data) {
        $this->db->insert_batch('trx_app_hit', $data);
    }

    public function get_dashboard($limit = 0) {
        $this->db->select('C.name, A.status, B.link');
        $this->db->from('trx_app_hit A');
        $this->db->join('trx_app_link B', 'A.app_link_id = B.id');
        $this->db->join('mtd_apps C', 'B.app_id = C.id');
        $this->db->order_by('A.id', 'DESC');
        $this->db->limit($limit, 0);
        $result = $this->db->get();
    
        return $result->result_array();
    }

    public function get_total() {
        $this->db->select('id');
        return $this->db->get('trx_app_link')->num_rows();
        
    }

    public function insert_app($app_name) {
        $this->db->set('name', $app_name);
        $this->db->insert('mtd_apps');
        return $this->db->insert_id();
    }

    public function insert_app_link($id_app, $link) {
        $this->db->set('app_id', $id_app);
        $this->db->set('link', $link);
        return $this->db->insert('trx_app_link');
    }
}
