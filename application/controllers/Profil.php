<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Profil extends CI_Controller {
	public function __construct(){
        parent::__construct();
        $this->load->helper('cookie');
        $this->load->library('form_validation');
        $this->load->helper('date');
        if(!$this->session->userdata('admin')){
            $cookie = get_cookie('djehbicd');
            if($cookie == NULL){
                redirect(base_url());
            }else{
                $getCookie = $this->db->get_where('admin', ['cookie' => $cookie])->row_array();
                if($getCookie){
                    $this->session->set_userdata('admin', true);
                }else{
                    redirect(base_url());
                }
            }
        }
    }
	public function index()
	{
        $data = [
			'judul'		=> 'Profil Sekolah',
			'subjudul'	=> 'Profil ',
		];
		$this->load->view('admin/page/profil',$data);
	}

    public function showdata()
    {
        $profil = $this->db->get_where('profil', ['id' => '1']);
        if ($profil->num_rows() > 0) {
            foreach ($profil->result() as $data) {
                $hasil = array(
                    'profil' => $data->profil,
                );
            }
        }
        echo json_encode($hasil);
    }

        function simpan()
		{
			$profil = $this->input->post('profil');
			$datasimpan = array(
				'profil' => $profil,
			);
			$cek = $this->db->get_where('profil', array('id' => '1'));
			if ($cek->num_rows() > 0) {
				$simpan = $this->db->update('profil', $datasimpan);
				if ($simpan) {
					echo 'success';
				} else {
					echo 'error';
				}
			} else {
				$data = $this->db->insert('profil', $datasimpan);
				if ($data) {
					echo 'success';
				} else {
					echo 'error';
				}
			}
		}




}
