<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Denahbangunan extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->helper('cookie');
        $this->load->library('form_validation');
        $this->load->helper('date');
		$this->denah = FCPATH . "uploads/denahbangunan/";
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
			'subjudul'	=> 'Denah Bangunan',
		];
		$this->load->view('admin/page/dehanbangunan',$data);
	}

    public function showdata()
    {
        $denahbangunan = $this->db->get_where('denahbangunan', ['id' => '1']);
        if ($denahbangunan->num_rows() > 0) {
            foreach ($denahbangunan->result() as $data) {
                $hasil = array(
                    'denahbangunan' => $data->denahbangunan,
                );
            }
        }
        echo json_encode($hasil);
    }

    private function _configUpload()
	{
		$config['upload_path'] = $this->denah;
		$config['allowed_types'] = 'gif|jpg|jpeg|png|jpeg|bmp';
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload');
		$this->upload->initialize($config);
	}

	private function _compressImg($name)
	{
		$config['image_library']    = 'gd2';
		$config['source_image']     = $this->denah . $name;
		$config['create_thumb']     = FALSE;
		$config['maintain_ratio']   = TRUE;
		$config['quality']          = '100%';
		$config['new_image']        = $this->denah . $name;

		$this->load->library('image_lib', $config);
		$this->image_lib->resize();
	}

        function simpan()
		{
		
            if (!empty($_FILES['denah']['name'])) {
            $cariold = $this->db->get_where('denahbangunan', array('id' => '1'))->row();
            $oldimg = $cariold->denahbangunan;
                    if ($oldimg) {
                        if (is_file($this->denah . $oldimg)) {
                            unlink($this->denah . $oldimg);
                        }
                    }
                    $this->_configUpload();
        
                    if ($this->upload->do_upload('denah')) {
                        $img = $this->upload->data();
        
                        //Compress Image
                        $this->_compressImg($img['file_name']);
        
                        $gambar = $img['file_name'];
                    } else {
                        echo 'gagalgambar';
                        $gambar = "gagalupload";
                    }
                    $datasimpan = array(
                        'denahbangunan' => $gambar,
                    );

            }
           
            $cek = $this->db->get_where('denahbangunan', array('id' => '1'));
            if ($cek->num_rows() > 0) {
                $simpan = $this->db->update('denahbangunan', $datasimpan);
                if ($simpan) {
                    echo 'success';
                } else {
                    echo 'error';
                }
            } 
		}




}
