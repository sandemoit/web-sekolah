<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
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
            
			'judul'		=> 'Informasi',
			'subjudul'	=> 'Siswa',
		];
		$this->load->view('admin/page/siswa',$data);
    }

    public function getdata()
	{

		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));

		$query = $this->db->query(" SELECT	siswa.* FROM siswa ");

		$data = [];
		$no = 0;
		foreach ($query->result() as $key => $lists) {
			$no++;

			$data[$key][]  = $no;
			$data[$key][]  = '<span class="badge bg-label-primary me-1"> <i class="fas fa-user-"></i> '.$lists->kelas.' </span>';
			$data[$key][]  = $lists->jumlah;
			$data[$key][]  = '<a href="javascript:;" class="btn btn-warning btn-sm bedit" data="' . $lists->id . '" ><i class="fa fa-edit nav-icon"></i></a> <a href="javascript:;" class="btn btn-danger btn-sm bhapus" data="' . $lists->id . '"><i class="fa fa-trash nav-icon"></i></a>';
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

    function simpan_siswa()
	{
		$kelas = $this->input->post('kelas');
		$jumlah = $this->input->post('jumlah');
		
		
			$datasimpan = array(
				'kelas' => $kelas,
				'jumlah' => $jumlah,
			);
			$data = $this->db->insert('siswa', $datasimpan);
			if ($data) {
				echo 'success';
			} else {
				echo 'error';
			}
		
	}


    

    public function showedit()
	{
        
		$koser = $this->input->get('id');
		$user = $this->db->query("select * from siswa where id = '$koser'");
		if ($user->num_rows() > 0) {
			foreach ($user->result() as $data) {
				$hasil = array(
					'kelas' => $data->kelas,
					'jumlah' => $data->jumlah,
					'id' => $data->id,
				);
			}
		}
		echo json_encode($hasil);
	}


    function simpan_edit()
	{
		$kelas = $this->input->post('ekelas');
		$jumlah = $this->input->post('ejumlah');
		
		
			$datasimpan = array(
				'kelas' => $kelas,
				'jumlah' => $jumlah,
			);
			$this->db->where('id', $this->input->post('kodedit'));
			$data = $this->db->update('siswa', $datasimpan);
			if ($data) {
				echo 'success';
			} else {
				echo 'error';
			}
		
	}
   

    public function hapus_siswa()
	{

		    $id = $this->input->post('id');
	
			$data = $this->db->query("DELETE FROM siswa WHERE id = '$id' ");
			if ($data) {
				echo 'success';
			} else {
				echo 'error';
			}
		
		
	}


	
}
