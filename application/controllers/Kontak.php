<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kontak extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('session');
		


		//cek session login
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
            
			'judul'		=> 'Pesan Masuk',
			'subjudul'	=> 'Kontak Form',
		];
		$this->load->view('admin/page/kontak',$data);
    }

    public function getdata()
	{

		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));

		$query = $this->db->query(" SELECT	kontak.* FROM kontak ORDER BY kontak.waktu DESC");

		$data = [];
		$no = 0;
		foreach ($query->result() as $key => $lists) {
			$no++;

			$data[$key][]  = $no;
			$data[$key][]  = $lists->nama ;
			$data[$key][]  = '<span class="badge bg-label-primary me-1"> <i class="fas fa-calendar-alt"></i> '.date("D", strtotime($lists->waktu)).' , '.date("d M Y", strtotime($lists->waktu)).' <i class="fas fa-clock"></i> '.date("H:i:s", strtotime($lists->waktu)).'</span>';
			$data[$key][]  = $lists->email;
			$data[$key][]  = $lists->subjek;
			$data[$key][]  = '<a href="javascript:;" class="btn btn-warning btn-sm bedit" data="' . $lists->id . '" ><i class="fa fa-eye nav-icon"></i></a> <a href="javascript:;" class="btn btn-danger btn-sm bhapus" data="' . $lists->id . '"><i class="fa fa-trash nav-icon"></i></a>';
		}


		$result = array(
			"draw" => $draw,
			"recordsTotal" => $query->num_rows(),
			"recordsFiltered" => $query->num_rows(),
			"data" => $data
		);


		echo json_encode($result);
		exit();
	}


    

    public function showedit()
	{
        
		$koser = $this->input->get('id');
		$user = $this->db->query("select * from kontak where id = '$koser'");
		if ($user->num_rows() > 0) {
			foreach ($user->result() as $data) {
				$hasil = array(
					'nama' => $data->nama,
					'email' => $data->email,
					'subjek' => $data->subjek,
					'pesan' => $data->pesan,
					'waktu' => $data->waktu,
					'id' => $data->id,
				);
			}
		}
		echo json_encode($hasil);
	}


   

    public function hapus_kontak()
	{

		    $id = $this->input->post('id');
	
			$data = $this->db->query("DELETE FROM kontak WHERE id = '$id' ");
			if ($data) {
				echo 'success';
			} else {
				echo 'error';
			}
		
		
	}


	
}
