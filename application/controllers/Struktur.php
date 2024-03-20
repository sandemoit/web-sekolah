<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Struktur extends CI_Controller {
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
			'subjudul'	=> 'Struktur Organisasi ',
		];
		$this->load->view('admin/page/struktur',$data);
	}

    public function showdata()
    {
        $struktur = $this->db->get_where('struktur', ['id' => '1']);
        if ($struktur->num_rows() > 0) {
            foreach ($struktur->result() as $data) {
                $hasil = array(
                    'struktur' => $data->struktur,
                );
            }
        }
        echo json_encode($hasil);
    }

        function simpan()
		{
			$struktur = $this->input->post('struktur');
			$datasimpan = array(
				'struktur' => $struktur,
			);
			$cek = $this->db->get_where('struktur', array('id' => '1'));
			if ($cek->num_rows() > 0) {
				$simpan = $this->db->update('struktur', $datasimpan);
				if ($simpan) {
					echo 'success';
				} else {
					echo 'error';
				}
			} else {
				$data = $this->db->insert('struktur', $datasimpan);
				if ($data) {
					echo 'success';
				} else {
					echo 'error';
				}
			}
		}


        // GAMBAR DARI SUMMERNOTE

        public function upload_image()
    {
        if (isset($_FILES["image"]["name"])) {
            $path = FCPATH . '/uploads/struktur/';
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
                echo base_url('uploads/struktur/') . $data['file_name'];
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



}
