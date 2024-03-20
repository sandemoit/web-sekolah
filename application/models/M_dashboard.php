<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_dashboard extends CI_Model
{

    function get_datadashboard()
    {

        $query = $this->db->query(" SELECT	berita.* , admin.`nama` as author FROM berita, admin WHERE
		berita.`user` = admin.`id` ORDER BY waktu DESC LIMIT 3");

        return $query;
    }






    public function count_data()
    {


        // if ($search != null) {
        //     $this->db->like('p.judul', $search);
        // }


        $this->db->from('berita p');
        return $this->db->get()->num_rows();
    }

    public function get_all_post($limit, $start)
    {

        $this->db->order_by('p.id', 'desc');
        $this->db->join('admin u', 'u.id=p.user', 'left');
        $query = $this->db->get('berita p', $limit, $start)->result();
        return $query;
    }
    public function get_all_post_cari($cari)
{
    $this->db->select('p.*, u.nama'); // Memilih kolom yang diinginkan
    $this->db->from('berita p');
    $this->db->join('admin u', 'u.id = p.user', 'left');
    $this->db->order_by('p.id', 'desc');
    $this->db->group_start();
    $this->db->like('p.judul', $cari); // Mencocokkan judul yang mirip dengan kata kunci
    $this->db->group_end();
    $query = $this->db->get()->result();
    return $query;
}


    public function get_post_by_slug($slug = null)
    {
        $this->db->select('p.*, u.nama, u.photo_profile');

        $this->db->join('admin u', 'u.id=p.user', 'left');
        $query = $this->db->get_where('berita p', ['p.slug' => $slug]);
        return $query;
    }

    public function get_ekskul_by_slug($slug = null)
    {
        $query = $this->db->get_where('ekskul ', ['ekskul.slug' => $slug]);
        return $query;
    }

    public function get_jurusan_by_slug($slug = null)
    {
        $query = $this->db->get_where('jurusan ', ['jurusan.slug' => $slug]);
        return $query;
    }

    public function recent_post($slug)
    {

        $this->db->where('slug !=', $slug);
        $this->db->order_by('waktu', 'desc');
        $this->db->limit(5);
        return $this->db->get('berita')->result();
    }
}
