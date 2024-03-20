<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->path = FCPATH . "uploads/guru/";


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
			'subjudul'	=> 'Guru',
		];
	
		$this->load->view('admin/page/guru',$data);


    }


	public function getdata()
	{

		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));


		$query = $this->db->query(" SELECT	guru.*  FROM guru  ORDER BY guru.id ASC");

		$data = [];
		$no = 0;
		foreach ($query->result() as $key => $lists) {
			$no++;
			$data[$key][]  = $no;
			$data[$key][]  = '
			  <img height="100" class="imgguru" data="ahsudah" data-bs-toggle="modal" data-bs-target="#myModal" src="' . base_url() . 'uploads/guru/' . $lists->foto . '"  alt="' . $lists->foto . '"/>
		  ' ;
			$data[$key][]  = $lists->nama;
			$data[$key][]  = $lists->pendidikan;
			$data[$key][]  = $lists->alumni;
			$data[$key][]  = $lists->jabatan;
			$data[$key][]  = ' <a href="javascript:;" class="btn btn-warning btn-sm bedit" data="' . $lists->id . '" ><i class="fa fa-edit nav-icon"></i></a> <a href="javascript:;" class="btn btn-danger btn-sm bhapus" data="' . $lists->id . '"><i class="fa fa-trash nav-icon"></i></a>';
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
		$config['allowed_types'] = 'gif|jpg|jpeg|png|jpeg|bmp';
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload');
		$this->upload->initialize($config);
	}

	private function _compressImg($name)
	{
		$config['image_library']    = 'gd2';
		$config['source_image']     = $this->path . $name;
		$config['create_thumb']     = FALSE;
		$config['maintain_ratio']   = TRUE;
		$config['quality']          = '70%';
		$config['new_image']        = $this->path . $name;
		$this->load->library('image_lib', $config);
		$this->image_lib->resize();
	}

	function simpan_guru()
	{
		$nama = $this->input->post('nama');
		$nbm = $this->input->post('nbm');
		$pendidikan = $this->input->post('pendidikan');
		$alumni = $this->input->post('alumni');
		$jabatan = $this->input->post('jabatan');
		
		if (!empty($_FILES['foto']['name'])) {
			$this->_configUpload();

			if ($this->upload->do_upload('foto')) {
				$img = $this->upload->data();
				//Compress Image
				$this->_compressImg($img['file_name']);
				$gambar = $img['file_name'];
			} else {
				echo 'gagalgambar';
				$gambar = "gagalupload";
			}
			$datasimpan = array(
				'nama' => $nama,
				'nbm' => $nbm,
				'pendidikan' => $pendidikan,
				'alumni' => $alumni,
				'jabatan' => $jabatan,
				'foto' => $gambar,
				
			);
			$data = $this->db->insert('guru', $datasimpan);
			if ($data) {
				echo 'success';
			} else {
				echo 'error';
			}
		}
	}
		// fungsi nampilin edit pada controller 
	public function showedit()
	{
		$koser = $this->input->get('id');
		$user = $this->db->query("select * from guru where id = '$koser'");
		if ($user->num_rows() > 0) {
			foreach ($user->result() as $data) {
				$hasil = array(
				'nama' => $data->nama,
				'nbm' => $data->nbm,
				'pendidikan' => $data->pendidikan,
				'alumni' => $data->alumni,
				'jabatan' => $data->jabatan,
				'foto' => $data->foto,
				'id' => $data->id,
                
				);
			}
		}
		echo json_encode($hasil);
	}

	public function simpanedit()
	{

		$nama = $this->input->post('enama');
		$nbm = $this->input->post('enbm');
		$pendidikan = $this->input->post('ependidikan');
		$alumni = $this->input->post('ealumni');
		$jabatan = $this->input->post('ejabatan');
		$id = $this->input->post('kodedit');
		$cariold = $this->db->get_where('guru', array('id' => $id))->row();

		if (!empty($_FILES['efoto']['name'])) {
			$oldimg = $cariold->foto;
			if ($oldimg) {
				if (is_file($this->path . $oldimg)) {
					unlink($this->path . $oldimg);
				}
			}
			$this->_configUpload();

			if ($this->upload->do_upload('efoto')) {
				$img = $this->upload->data();

				//Compress Image
				$this->_compressImg($img['file_name']);

				$gambar = $img['file_name'];
			} else {
				
				$gambar = "gagalupload";
			}
			$datasimpan = array(

				'nama' => $nama,
				'nbm' => $nbm,
				'pendidikan' => $pendidikan,
				'alumni' => $alumni,
				'jabatan' => $jabatan,
				'foto' => $gambar,

			);
			$this->db->where('id', $this->input->post('kodedit'));
			$data = $this->db->update('guru', $datasimpan);
			if ($data) {
				echo 'success';
			} else {
				echo 'error';
			}
		} else {
			$datasimpan = array(
				'nama' => $nama,
				'nbm' => $nbm,
				'pendidikan' => $pendidikan,
				'alumni' => $alumni,
				'jabatan' => $jabatan,
				
			);
			$this->db->where('id', $this->input->post('kodedit'));
			$data = $this->db->update('guru', $datasimpan);
			if ($data) {
				echo 'success';
			} else {
				echo 'error';
			}
		}
	}


	public function hapus_guru()
	{

		$id = $this->input->post('id');
		$guru = $this->db->query("select * from guru where id ='$id' ")->row();

		if ($guru) {
		
			$img = $guru->foto;
			$image = $this->path . $img;

			if ($img) {
				if (is_file($image)) {
					unlink($image);
				}
			}
			$data = $this->db->query("DELETE FROM guru WHERE id = '$id' ");
			if ($data) {
				echo 'success';
			} else {
				echo 'error';
			}
		
		}
	}

	


	
}
