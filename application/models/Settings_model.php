<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings_model extends CI_Model {

    public function getSetting(){
        return $this->db->get('settings')->row_array();
    }

    public function create_slug($title)
    {
        $extract = explode(" ", $title, 6);
        unset($extract[5]);
        $combine = implode(" ", $extract);
        $lowercase = strtolower($combine);
        $preslug = url_title($lowercase);
        $slug = $preslug;
        $this->db->like('slug', $preslug, 'after');
        $checkslug = $this->db->get('berita');
        if ($checkslug->num_rows() > 0) {
            $num = (int)$checkslug->num_rows() + 1;
            $slug = $preslug . "-" . $num;
        }

        return $slug;
    }

    public function general(){
      return $this->db->get('general')->row_array();
    }


}
