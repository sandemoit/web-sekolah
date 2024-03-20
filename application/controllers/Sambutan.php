<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Sambutan extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->helper('cookie');
        $this->load->library('form_validation');
        $this->load->helper('date');
		$this->kepsek = FCPATH . "uploads/kepalasekolah/";
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
			'subjudul'	=> 'Sambutan Kepala Sekolah ',
		];
		$this->load->view('admin/page/sambutan',$data);
	}

    public function showdata()
    {
        $sambutan = $this->db->get_where('sambutan', ['id' => '1']);
        if ($sambutan->num_rows() > 0) {
            foreach ($sambutan->result() as $data) {
                $hasil = array(
                    'sambutan' => $data->sambutan,
                    'foto_kepsek' => $data->foto_kepsek,
                    'excerpt' => $data->excerpt
                );
            }
        }
        echo json_encode($hasil);
    }

    private function _configUpload()
	{
		$config['upload_path'] = $this->kepsek;
		$config['allowed_types'] = 'gif|jpg|jpeg|png|jpeg|bmp';
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload');
		$this->upload->initialize($config);
	}

	private function _compressImg($name)
	{
		$config['image_library']    = 'gd2';
		$config['source_image']     = $this->kepsek . $name;
		$config['create_thumb']     = FALSE;
		$config['maintain_ratio']   = TRUE;
		$config['quality']          = '70%';
		$config['new_image']        = $this->kepsek . $name;

		$this->load->library('image_lib', $config);
		$this->image_lib->resize();
	}

        function simpan()
		{
			$sambutan = $this->input->post('sambutan');
			$excerpt = $this->input->post('excerpt');
            if (!empty($_FILES['kepsek']['name'])) {
            $cariold = $this->db->get_where('sambutan', array('id' => '1'))->row();
            $oldimg = $cariold->foto_kepsek;
                    if ($oldimg) {
                        if (is_file($this->kepsek . $oldimg)) {
                            unlink($this->kepsek . $oldimg);
                        }
                    }
                    $this->_configUpload(); 
        
                    if ($this->upload->do_upload('kepsek')) {
                        $img = $this->upload->data();
        
                        //Compress Image
                        $this->_compressImg($img['file_name']);
        
                        $gambar = $img['file_name'];
                    } else {
                        echo 'gagalgambar';
                        $gambar = "gagalupload";
                    }
                    $datasimpan = array(
                        'sambutan' => $sambutan,
                        'foto_kepsek' => $gambar,
                        'excerpt' => $excerpt,

                    );

            }
            else
            {
                    $datasimpan = array(
                        'sambutan' => $sambutan,
                        'excerpt' => $excerpt,

                    );
                   
            }
            $cek = $this->db->get_where('sambutan', array('id' => '1'));
            if ($cek->num_rows() > 0) {
                $simpan = $this->db->update('sambutan', $datasimpan);
                if ($simpan) {
                    echo 'success';
                } else {
                    echo 'error';
                }
            } else {
                $data = $this->db->insert('sambutan', $datasimpan);
                if ($data) {
                    echo 'success';
                } else {
                    echo 'error';
                }
            }
		}




}
