<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Visi extends CI_Controller {
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
			'subjudul'	=> 'Visi Misi ',
		];
		$this->load->view('admin/page/visi',$data);
	}

    public function showdata()
    {
        $visi = $this->db->get_where('visi', ['id' => '1']);
        if ($visi->num_rows() > 0) {
            foreach ($visi->result() as $data) {
                $hasil = array(
                    'visi' => $data->visi,
                );
            }
        }
        echo json_encode($hasil);
    }

        function simpan()
		{
			$visi = $this->input->post('visi');
			$datasimpan = array(
				'visi' => $visi,
			);
			$cek = $this->db->get_where('visi', array('id' => '1'));
			if ($cek->num_rows() > 0) {
				$simpan = $this->db->update('visi', $datasimpan);
				if ($simpan) {
					echo 'success';
				} else {
					echo 'error';
				}
			} else {
				$data = $this->db->insert('visi', $datasimpan);
				if ($data) {
					echo 'success';
				} else {
					echo 'error';
				}
			}
		}




}
