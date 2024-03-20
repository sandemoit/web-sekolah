<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Slider extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->path = FCPATH . "uploads/slider/";


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
			'subjudul'	=> 'Slider',
		];
	
		$this->load->view('admin/page/slider',$data);


    }


	public function getdata()
	{

		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));


		$query = $this->db->query(" SELECT	slider.*  FROM slider  ORDER BY slider.id DESC");

		$data = [];
		$no = 0;
		foreach ($query->result() as $key => $lists) {
			$no++;

			$data[$key][]  = $no;
			$data[$key][]  = '
			
			  <img height="100" class="imgslider" data="ahsudah" data-bs-toggle="modal" data-bs-target="#myModal" src="' . base_url() . 'uploads/slider/' . $lists->foto . '"  alt="' . $lists->foto . '"/>
			
		  ' ;
			$data[$key][]  = $lists->keterangan;
			if ($lists->button_link ==="" || $lists->button_capt ==="") {
				$data[$key][]  = 'Tidak Ada Tombol';

			} else {
				$data[$key][]  = '<a href="'.$lists->button_link.'" class="btn btn-primary btn-sm "">'.$lists->button_capt.'</a>';

			}
			
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

	function simpan_slider()
	{
		$keterangan = $this->input->post('keterangan');
		$ct = $this->input->post('ct');
		$lt = $this->input->post('lt');
		if (!empty($_FILES['post_thumbnail']['name'])) {
			$this->_configUpload();

			if ($this->upload->do_upload('post_thumbnail')) {
				$img = $this->upload->data();
				//Compress Image
				$this->_compressImg($img['file_name']);
				$gambar = $img['file_name'];
			} else {
				echo 'gagalgambar';
				$gambar = "gagalupload";
			}
			$datasimpan = array(
				'keterangan' => $keterangan,
				'button_link' => $lt,
				'button_capt' => $ct,
				
				'foto' => $gambar,
			);
			$data = $this->db->insert('slider', $datasimpan);
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
		$user = $this->db->query("select * from slider where id = '$koser'");
		if ($user->num_rows() > 0) {
			foreach ($user->result() as $data) {
				$hasil = array(
					'keterangan' => $data->keterangan,
					'foto' => $data->foto,
					'id' => $data->id,
					'ct' => $data->button_capt,
					'lt' => $data->button_link,

				);
			}
		}
		echo json_encode($hasil);
	}

	public function simpanedit()
	{

		$keterangan = $this->input->post('eketerangan');
		$ct = $this->input->post('ect');
		$lt = $this->input->post('elt');
		$id = $this->input->post('kodedit');
		$cariold = $this->db->get_where('slider', array('id' => $id))->row();

		if (!empty($_FILES['epost_thumbnail']['name'])) {
			$oldimg = $cariold->foto;
			if ($oldimg) {
				if (is_file($this->path . $oldimg)) {
					unlink($this->path . $oldimg);
				}
			}
			$this->_configUpload();

			if ($this->upload->do_upload('epost_thumbnail')) {
				$img = $this->upload->data();

				//Compress Image
				$this->_compressImg($img['file_name']);

				$gambar = $img['file_name'];
			} else {
				echo 'gagalgambar';
				$gambar = "gagalupload";
			}
			$datasimpan = array(

				'keterangan' => $keterangan,
				'foto' => $gambar,
				'button_link' => $lt,
				'button_capt' => $ct

			);
			$this->db->where('id', $this->input->post('kodedit'));
			$data = $this->db->update('slider', $datasimpan);
			if ($data) {
				echo 'success';
			} else {
				echo 'error';
			}
		} else {
			$datasimpan = array(
				'keterangan' => $keterangan,
				'button_link' => $lt,
				'button_capt' => $ct,
				
			);
			$this->db->where('id', $this->input->post('kodedit'));
			$data = $this->db->update('slider', $datasimpan);
			if ($data) {
				echo 'success';
			} else {
				echo 'error';
			}
		}
	}


	public function hapus_slider()
	{

		$id = $this->input->post('id');
		$slider = $this->db->query("select * from slider where id ='$id' ")->row();

		if ($slider) {
			$img = $slider->foto;
			$image = $this->path . $img;

			if ($img) {
				if (is_file($image)) {
					unlink($image);
				}
			}
			$data = $this->db->query("DELETE FROM slider WHERE id = '$id' ");
			if ($data) {
				echo 'success';
			} else {
				echo 'error';
			}
		
		}
	}

	
}
