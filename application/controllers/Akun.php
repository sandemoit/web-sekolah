<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Akun extends CI_Controller {
	public function __construct(){
        parent::__construct();
        $this->load->helper('cookie');
        $this->load->library('form_validation');
        $this->load->helper('date');
		$this->fotoprofile = FCPATH . "uploads/fotoprofile";

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
			'subjudul'	=> 'Setting Akun ',
		];
		$this->load->view('admin/page/akun',$data);
	}

    public function showdata()
    {
        $akun = $this->db->get_where('admin', ['id' => $this->session->userdata('id')]);
        if ($akun->num_rows() > 0) {
            foreach ($akun->result() as $data) {
                $hasil = array(
                    'nama' => $data->nama,
                    'photo_profile' => $data->photo_profile,
                    'id' => $data->id,
                    'username' => $data->username,
                );
            }
        }
        echo json_encode($hasil);
    }

    private function _configUpload()
	{
		$config['upload_path'] = $this->fotoprofile;
		$config['allowed_types'] = 'gif|jpg|jpeg|png|jpeg|bmp';
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload');
		$this->upload->initialize($config);
	}

	private function _compressImg($name)
	{
		$config['image_library']    = 'gd2';
		$config['source_image']     = $this->fotoprofile . $name;
		$config['create_thumb']     = FALSE;
		$config['maintain_ratio']   = TRUE;
		$config['quality']          = '100%';
		$config['new_image']        = $this->fotoprofile . $name;

		$this->load->library('image_lib', $config);
		$this->image_lib->resize();
	}
       
    
    function simpan()
	{
		
            $kodedit = $this->input->post('kodedit');
            $username = $this->input->post('username');
            $nama = $this->input->post('nama');
          
            $cariold = $this->db->get_where('admin', array('id' => $this->input->post('kodedit')))->row();
             if (!empty($_FILES['upload']['name'])) {
                    $oldimg = $cariold->photo_profile;
                    if ($oldimg) {
                        if (is_file($this->fotoprofile . $oldimg)) {
                            unlink($this->fotoprofile . $oldimg);
                        }
                    }
                    $this->_configUpload();
        
                    if ($this->upload->do_upload('upload')) {
                        $img = $this->upload->data();
        
                        //Compress Image
                        $this->_compressImg($img['file_name']);
                        $gambar = $img['file_name'];
                    } else {
                        echo 'gagalgambar';
                        $gambar = "gagalupload";
                    }
                    $data = array(
                        'username' => $username,
                        'nama' => $nama,
                        'photo_profile' => $gambar,                        

                    );
                }
                else{

                    $data = array(
                        'username' => $username,
                        'nama' => $nama,
                    );
                }

                
                $this->db->where('id', $this->input->post('kodedit'));
                $simpan = $this->db->update('admin', $data);
                if ($simpan) {
                    echo 'success';
                } else {
                    echo 'error';
                }		
	}


    public function password()
	{
       
            $this->form_validation->set_rules('oldpassword', 'Password Lama', 'required', ['required' => 'Password lama wajib diisi']);
            $this->form_validation->set_rules('newpassword', 'Password Baru', 'required', ['required' => 'Password baru wajib diisi']);
            if($this->form_validation->run() == false){
                $data = [
                    'judul'		=> 'Setting',
			        'subjudul'	=> 'Setting Akun',
                ];
                $data['user'] = $this->db->get_where('admin', ['id' => $this->session->userdata('id')])->row_array();  
                $this->load->view('admin/page/akun',$data);
            }
            else{
                $user = $this->db->get_where('admin', ['id' => $this->session->userdata('id')])->row_array();
                if(password_verify($this->input->post('oldpassword'), $user['password'])){
                    if($this->input->post('newpassword') ==  $this->input->post('confirmpassword')){
                        $pass = password_hash($this->input->post('newpassword'), PASSWORD_DEFAULT);
                        $this->db->set('password', $pass);
                        $this->db->where('id', $this->session->userdata('id'));
                        $this->db->update('admin');
                        
                        $this->session->set_flashdata('success', "Password berhasil diubah");
                        redirect(base_url() . 'setting-akun');
                    }else{
                        $this->session->set_flashdata('failed', "Konfirmasi Password tidak sama");
                        redirect(base_url() . 'setting-akun');
                    }
                }else{
                    $this->session->set_flashdata('failed', "Password Lama Salah");
                    redirect(base_url() . 'setting-akun');
                }
            }

       

        
    }



}
