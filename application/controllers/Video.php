<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Video extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->path = FCPATH . "uploads/kegiatan/";
		$this->path2 = FCPATH . "uploads/kegiatan/isi/";


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
            
			'judul'		=> 'Galeri',
			'subjudul'	=> 'Video',
		];
		$this->load->view('admin/page/video',$data);
    }

    public function getdata()
	{

		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));

		$query = $this->db->query(" SELECT	video.* , admin.`username` FROM video, admin WHERE
		video.`user` = admin.`id` ORDER BY video.waktu DESC");

		$data = [];
		$no = 0;
		foreach ($query->result() as $key => $lists) {
			$no++;

			$data[$key][]  = $no;
			$data[$key][]  = $lists->url ;
			$data[$key][]  = '<span class="badge bg-label-primary me-1"> <i class="fas fa-calendar-alt"></i> '.date("D", strtotime($lists->waktu)).' , '.date("d M Y", strtotime($lists->waktu)).' <i class="fas fa-clock"></i> '.date("H:i:s", strtotime($lists->waktu)).'</span>';
			$data[$key][]  = $lists->judul;
			$data[$key][]  = $lists->username;
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


    function simpan_video()
	{
		$judul = $this->input->post('post_title');
		$url = $this->input->post('url');
		$desc = $this->input->post('desc');
		$user = $this->session->userdata('id');
		$slug = $this->Settings_model->create_slug($judul);

		
			$datasimpan = array(

				'judul' => $judul,
				'waktu' =>  date('Y-m-d H:i:s'),
				'url' => $url,
				'slug' => $slug,
				'user' => $user,
				'desc' => $desc
			);
			$data = $this->db->insert('video', $datasimpan);
			if ($data) {
				echo 'success';
			} else {
				echo 'error';
			}
		
	}

    public function showedit()
	{
        
		$koser = $this->input->get('id');
		$user = $this->db->query("select * from video where id = '$koser'");
		if ($user->num_rows() > 0) {
			foreach ($user->result() as $data) {
				$hasil = array(
					'judul' => $data->judul,
					'desc' => $data->desc,
					'url' => $data->url,
					'tanggal' => $data->waktu,
					'id' => $data->id,
				);
			}
		}
		echo json_encode($hasil);
	}


    public function simpanedit()
	{

		$judul = $this->input->post('epost_title');
        $url = $this->input->post('eurl');
		$desc = $this->input->post('edesc');
		$user = $this->session->userdata('id');
		$slug = $this->Settings_model->create_slug($judul);
		

		
			$datasimpan = array(

				'judul' => $judul,
				'waktu' =>  date('Y-m-d H:i:s'),
				'url' => $url,
				'slug' => $slug,
				'user' => $user,
				'desc' => $desc


			);
			$this->db->where('id', $this->input->post('kodedit'));
			$data = $this->db->update('video', $datasimpan);
			if ($data) {
				echo 'success';
			} else {
				echo 'error';
			}
		
	}

    public function hapus_video()
	{

		    $id = $this->input->post('id');
	
			$data = $this->db->query("DELETE FROM video WHERE id = '$id' ");
			if ($data) {
				echo 'success';
			} else {
				echo 'error';
			}
		
		
	}


	
}
