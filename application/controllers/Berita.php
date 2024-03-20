<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita extends CI_Controller
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
            
			'judul'		=> 'Informasi',
			'subjudul'	=> 'Berita Sekolah',
		];
	
		$this->load->view('admin/page/berita',$data);


    }


	public function getdata()
	{

		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));


		$query = $this->db->query(" SELECT	berita.* , admin.`username` FROM berita, admin WHERE
		berita.`user` = admin.`id` ORDER BY berita.waktu DESC");

		$data = [];
		$no = 0;
		foreach ($query->result() as $key => $lists) {
			$no++;

			$data[$key][]  = $no;
			$data[$key][]  = '
			
			  <img height="100" class="imgberita" data="ahsudah" data-bs-toggle="modal" data-bs-target="#myModal" src="' . base_url() . 'uploads/kegiatan/' . $lists->foto . '"  alt="' . $lists->foto . '"/>
			
		  ' ;
			$data[$key][]  = '<span class="badge bg-label-primary me-1"> <i class="fas fa-calendar-alt"></i> '.date("D", strtotime($lists->waktu)).' , '.date("d M Y", strtotime($lists->waktu)).' <i class="fas fa-clock"></i> '.date("H:i:s", strtotime($lists->waktu)).'</span>';
			$data[$key][]  = $lists->judul;
			$data[$key][]  = $lists->view_count.'x dilihat';
			$data[$key][]  = $lists->username;
			$data[$key][]  = '<a href="' . base_url('berita-detail/') . $lists->slug . '"  target="_blank" class="btn btn-info btn-sm "  ><i class="fa fa-eye"></i></a> <a href="javascript:;" class="btn btn-warning btn-sm bedit" data="' . $lists->id . '" ><i class="fa fa-edit nav-icon"></i></a> <a href="javascript:;" class="btn btn-danger btn-sm bhapus" data="' . $lists->id . '"><i class="fa fa-trash nav-icon"></i></a>';
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

	function simpan_kegiatan()
	{
		$judul = $this->input->post('post_title');
		$isi = $this->input->post('post_body');
		$user = $this->session->userdata('id');
		$excerpt = $this->input->post('excerpt');

		$slug = $this->Settings_model->create_slug($judul);

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

				'judul' => $judul,
				'waktu' =>  date('Y-m-d H:i:s'),
				'isi' => $isi,
				'slug' => $slug,
				'user' => $user,
				'foto' => $gambar,
				'excerpt' => $excerpt,

			);
			$data = $this->db->insert('berita', $datasimpan);
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
		$user = $this->db->query("select * from berita where id = '$koser'");
		if ($user->num_rows() > 0) {
			foreach ($user->result() as $data) {
				$hasil = array(
					'judul' => $data->judul,
					'isi' => $data->isi,
					'foto' => $data->foto,
					'tanggal' => $data->waktu,
					'id' => $data->id,
					'excerpt' => $data->excerpt,
				);
			}
		}
		echo json_encode($hasil);
	}

	public function simpanedit()
	{

		$judul = $this->input->post('epost_title');
		$isi = $this->input->post('epost_body');
		$id = $this->input->post('kodedit');
		$excerpt = $this->input->post('eexcerpt');



		$tanggal = $this->input->post('epost_date');
		$user = $this->session->userdata("id");
		$slug = $this->Settings_model->create_slug($judul);
		$cariold = $this->db->get_where('berita', array('id' => $id))->row();

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

				'judul' => $judul,
				'waktu' => date('Y-m-d H:i:s'),
				'isi' => $isi,
				'slug' => $slug,
				'user' => $user,
				'foto' => $gambar,
				'excerpt' => $excerpt,


			);
			$this->db->where('id', $this->input->post('kodedit'));
			$data = $this->db->update('berita', $datasimpan);
			if ($data) {
				echo 'success';
			} else {
				echo 'error';
			}
		} else {
			$datasimpan = array(

				'judul' => $judul,
				'waktu' => date('Y-m-d H:i:s'),
				'isi' => $isi,
				'slug' => $slug,
				'user' => $user,
				'excerpt' => $excerpt,



			);
			$this->db->where('id', $this->input->post('kodedit'));
			$data = $this->db->update('berita', $datasimpan);
			if ($data) {
				echo 'success';
			} else {
				echo 'error';
			}
		}
	}


	public function hapus_kegiatan()
	{

		$id = $this->input->post('id');
		$kegiatan = $this->db->query("select * from berita where id ='$id' ")->row();

		if ($kegiatan) {
			$this->deleteContentImage($kegiatan->isi);
			$img = $kegiatan->foto;
			$image = $this->path . $img;

			if ($img) {
				if (is_file($image)) {
					unlink($image);
				}
			}
			$data = $this->db->query("DELETE FROM berita WHERE id = '$id' ");
			if ($data) {
				echo 'success';
			} else {
				echo 'error';
			}
		
		}
	}

	public function upload_image()
	{
		if (isset($_FILES["image"]["name"])) {
			$path = FCPATH . 'uploads/kegiatan/isi/';
			$config['upload_path'] = $path;
			$config['allowed_types'] = 'gif|jpg|jpeg|png|jpeg|bmp';
			$config['encrypt_name'] = TRUE;
			$this->upload->initialize($config);
			if (!$this->upload->do_upload('image')) {
				$this->upload->display_errors();
				return FALSE;
			} else {
				$data = $this->upload->data();
				//Compress Image
				$config['image_library'] = 'gd2';
				$config['source_image'] = $path . $data['file_name'];
				$config['create_thumb'] = FALSE;
				$config['maintain_ratio'] = TRUE;
				$config['quality'] = '60%';
				$config['width'] = 800;
				$config['height'] = 800;
				$config['new_image'] = $path . $data['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				echo base_url('uploads/kegiatan/isi/') . $data['file_name'];
			}
		}
	}

	//Delete image summernote
	function delete_image()
	{
		$src = $this->input->post('src');
		$file_name = str_replace(base_url(), '', $src);
		if (unlink($file_name)) {
			echo 'File Delete Successfully';
		}
	}


	public function deleteContentImage($content)
    {

       
       $data= preg_match_all('/<img[^>]+>/i', $content, $imgTags);

       if($data != null){
        for ($i = 0; $i < count($imgTags[0]); $i++) {
            preg_match('/src="([^"]+)/i', $imgTags[0][$i], $imgage);
            $images[] = str_ireplace('src="', '',  $imgage[0]);
        }
            foreach ($images as $image) {
                $extract = explode('/', $image);
                $img = end($extract);
    
                $thumbnail = $this->path2 . $img;
                if (is_file($thumbnail)) {
                    unlink($thumbnail);
                }
            }
        }
       
    }
}
