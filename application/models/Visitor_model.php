<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Visitor_model extends CI_Model {
    public function add_visitor($ip_address) {
        $data = array(
            'ip_address' => $ip_address,
            'visit_time' => date('Y-m-d H:i:s')
        );

        $this->db->insert('visitors', $data);
    }
    public function check_ip_visit_today($ip_address) {
        $today = date('Y-m-d');
        $this->db->where('ip_address', $ip_address);
        $this->db->where('DATE(visit_time)', $today);
        return $this->db->count_all_results('visitors') > 0;
    }

    public function get_total_visitors() {
        return $this->db->count_all('visitors');
    }

    public function get_total_visitors_today($date) {
        $this->db->where('DATE(visit_time)', $date);
        return $this->db->count_all_results('visitors');
    }

   
}
