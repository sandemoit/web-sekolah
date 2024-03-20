<?php
defined('BASEPATH') or exit('No direct script access allowed');

class File extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->path = FCPATH . "uploads/download/";


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
			'subjudul'	=> 'File',
		];
	
		$this->load->view('admin/page/file',$data);


    }


	public function getdata()
	{

		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));


		$query = $this->db->query(" SELECT	file.*  FROM file  ORDER BY file.id DESC");

		$data = [];
		$no = 0;
		foreach ($query->result() as $key => $lists) {
			$no++;

			$data[$key][]  = $no;
			$data[$key][]  = '<a href="' . base_url() . 'uploads/download/' . $lists->file . '"  alt="' . $lists->file . '">'.$lists->file.'</a>	
		  ' ;
			$data[$key][]  = $lists->keterangan;
			$data[$key][]  = ' <a href="javascript:;" class="btn btn-danger btn-sm bhapus" data="' . $lists->id . '"><i class="fa fa-trash nav-icon"></i></a>';
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

	private function _configUpload()
	{
		$config['upload_path'] = $this->path;
		$config['allowed_types'] = 'pdf|docx';
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload');
		$this->upload->initialize($config);
	}

	

	function simpan_file()
	{
		$keterangan = $this->input->post('keterangan');
		if (!empty($_FILES['post_thumbnail']['name'])) {
			$this->_configUpload();

			if ($this->upload->do_upload('post_thumbnail')) {
				$img = $this->upload->data();
				//Compress Image
				
				$gambar = $img['file_name'];
			} else {
				echo 'gagalgambar';
				$gambar = "gagalupload";
			}
			$datasimpan = array(
				'keterangan' => $keterangan,
				
				'file' => $gambar,
			);
			$data = $this->db->insert('file', $datasimpan);
			if ($data) {
				echo 'success';
			} else {
				echo 'error';
			}
		}
	}
		// fungsi nampilin edit pada controller 
	


	public function hapus_file()
	{

		$id = $this->input->post('id');
		$file = $this->db->query("select * from file where id ='$id' ")->row();

		if ($file) {
			$img = $file->filw;
			$image = $this->path . $img;

			if ($img) {
				if (is_file($image)) {
					unlink($image);
				}
			}
			$data = $this->db->query("DELETE FROM file WHERE id = '$id' ");
			if ($data) {
				echo 'success';
			} else {
				echo 'error';
			}
		
		}
	}

	
}
