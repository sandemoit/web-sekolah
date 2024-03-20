<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Setting extends CI_Controller {
	public function __construct(){
        parent::__construct();
        $this->load->helper('cookie');
        $this->load->library('form_validation');
        $this->load->helper('date');
		$this->logo = FCPATH . "assets/upload/images/logo/";
		$this->breadcumb = FCPATH . "assets/upload/images/breadcumb/";

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
			'judul'		=> 'Setting',
			'subjudul'	=> 'Setting Aplikasi ',
		];
		$this->load->view('admin/page/setting',$data);
	}

    public function showdata()
    {
        $denah = $this->db->get_where('general', ['id' => '1']);
        if ($denah->num_rows() > 0) {
            foreach ($denah->result() as $data) {
                $hasil = array(
                    'alamat' => $data->alamat,
                    'instagram' => $data->instagram,
                    'twitter' => $data->twitter,
                    'facebook' => $data->facebook,
                    'nama_sekolah' => $data->nama_sekolah,
                    'id' => $data->id,
                    'logo' => $data->logo,
                    'app_name' => $data->app_name,
                    'whatsapp' => $data->whatsapp,
                    'youtube' => $data->youtube,
                    'jurusan' => $data->jurusan,
                    'breadcumb' => $data->breadcumb,
                    
                    'email' => $data->account_gmail,
                );
            }
        }
        echo json_encode($hasil);
    }

    private function _configUpload()
	{
		$config['upload_path'] = $this->logo;
		$config['allowed_types'] = 'gif|jpg|jpeg|png|jpeg|bmp';
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload');
		$this->upload->initialize($config);
	}

	private function _compressImg($name)
	{
		$config['image_library']    = 'gd2';
		$config['source_image']     = $this->logo . $name;
		$config['create_thumb']     = FALSE;
		$config['maintain_ratio']   = TRUE;
		$config['quality']          = '100%';
		$config['new_image']        = $this->logo . $name;

		$this->load->library('image_lib', $config);
		$this->image_lib->resize();
	}

    private function _configUpload2()
	{
		$config['upload_path'] = $this->breadcumb;
		$config['allowed_types'] = 'gif|jpg|jpeg|png|jpeg|bmp';
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload');
		$this->upload->initialize($config);
	}

	private function _compressImg2($name)
	{
		$config['image_library']    = 'gd2';
		$config['source_image']     = $this->breadcumb . $name;
		$config['create_thumb']     = FALSE;
		$config['maintain_ratio']   = TRUE;
		$config['quality']          = '100%';
		$config['new_image']        = $this->breadcumb . $name;

		$this->load->library('image_lib', $config);
		$this->image_lib->resize();
	}
       
    
    function simpan()
    {
        $kodedit = $this->input->post('kodedit');
        
        $app_name = $this->input->post('app_name');
        $alamat = $this->input->post('alamat');
        $instagram = $this->input->post('instagram');
        $facebook = $this->input->post('facebook');
        $twitter = $this->input->post('twitter');
        $email = $this->input->post('email');
        $nama_sekolah = $this->input->post('nama_sekolah');
        $whatsapp = $this->input->post('whatsapp');
        $youtube = $this->input->post('youtube');
        $jurusan = $this->input->post('jurusan');
        $cariold = $this->db->get_where('general', array('id' => $kodedit))->row();
    
        // Inisialisasi data dengan nilai yang ada sebelumnya
        $data = array(
            'alamat' => $alamat,
            'app_name' => $app_name,
            'nama_sekolah' => $nama_sekolah,
            'whatsapp' => $whatsapp,
            'account_gmail' => $email,
            'alamat' => $alamat,
            'instagram' => $instagram,
            'twitter' => $twitter,
            'facebook' => $facebook,
            'youtube' => $youtube,
            'jurusan' => $jurusan,
        );
    
        // Proses upload dan pembaruan data untuk logo
        if (!empty($_FILES['logo']['name'])) {
            $oldimg = $cariold->logo;
            if ($oldimg && is_file($this->logo . $oldimg)) {
                unlink($this->logo . $oldimg);
            }
            $this->_configUpload();
    
            if ($this->upload->do_upload('logo')) {
                $img = $this->upload->data();
    
                //Compress Image
                $this->_compressImg($img['file_name']);
    
                $data['logo'] = $img['file_name'];
            } else {
                echo 'gagalgambar';
                $data['logo'] = "gagalupload";
            }
        }
    
        // Proses upload dan pembaruan data untuk breadcumb
        if (!empty($_FILES['breadcumb']['name'])) {
            $oldimg = $cariold->breadcumb;
            if ($oldimg && is_file($this->breadcumb . $oldimg)) {
                unlink($this->breadcumb . $oldimg);
            }
            $this->_configUpload2();
    
            if ($this->upload->do_upload('breadcumb')) {
                $img = $this->upload->data();
    
                //Compress Image
                $this->_compressImg2($img['file_name']);
    
                $data['breadcumb'] = $img['file_name'];
            } else {
                echo 'gagalgambar';
                $data['breadcumb'] = "gagalupload";
            }
        }
    
        // Update data ke database
        $this->db->where('id', $kodedit);
        $simpan = $this->db->update('general', $data);
        if ($simpan) {
            echo 'success';
        } else {
            echo 'error';
        }
    }
    




}
