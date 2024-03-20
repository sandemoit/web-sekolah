<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Admin extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->helper('cookie');
        $this->load->library('form_validation');
        $this->load->helper('date');
        $this->load->model('Visitor_model');

      

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
        $today = date('Y-m-d');
        $data = [
            'total_pengunjung' =>  $this->Visitor_model->get_total_visitors(),
            'pengunjung_hari' => $this->Visitor_model->get_total_visitors_today($today)

        ];
		
		$this->load->view('admin/page/home',$data);
		
	}

    public function settings()
	{
        $aksi= $this->input->post('aksi');
        if ($aksi == 'passwordganti') {
            $this->form_validation->set_rules('oldpassword', 'Password Lama', 'required', ['required' => 'Password lama wajib diisi']);
            $this->form_validation->set_rules('newpassword', 'Password Baru', 'required', ['required' => 'Password baru wajib diisi']);
            if($this->form_validation->run() == false){
                $data = [
                    'title' => $this->Settings_model->general()["app_name"],
                    'ta' =>$this->User_model->getTahunAktif()->row(),
                    'judul'		=> 'Setting',
                    'subjudul'	=> 'Profile',
                    'jurusan' =>  $this->db->get("jurusan")->result(),
                ];
                $data['user'] = $this->db->get_where('admin', ['id' => $this->session->userdata('id')])->row_array();  
                $this->load->view('admin/page/settingprofile',$data);
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
                        redirect(base_url() . 'admin-settings');
                    }else{
                        $this->session->set_flashdata('failed', "Konfirmasi Password tidak sama");
                        redirect(base_url() . 'admin-settings');
                    }
                }else{
                    $this->session->set_flashdata('failed', "Password Lama Salah");
                    redirect(base_url() . 'admin-settings');
                }
            }

        } 
        
        else {
        $this->form_validation->set_rules('poto', 'Foto Profile', 'callback_validate_image'); // penamaan callback, calback_nama fungsi
       
        if($this->form_validation->run() == false){
            
         
            $data = [
                'title' => $this->Settings_model->general()["app_name"],
                'ta' =>$this->User_model->getTahunAktif()->row(),
                'judul'		=> 'Setting',
                'subjudul'	=> 'Profile',
                'jurusan' =>  $this->db->get("jurusan")->result(),
            ];
            $data['user'] = $this->db->get_where('admin', ['id' => $this->session->userdata('id')])->row_array();  
            $this->load->view('admin/page/settingprofile',$data);
        }

        else
        {
                    $foto=$this->db->get_where('admin',array('id'=>$this->session->userdata('id')));


                    if($foto->num_rows()>0){
                        $hasil=$foto->row();
                        $nama_foto=$hasil->photo_profile;
                        if ($nama_foto == 'default.png') {
                            
                        }
                        else{
                        if(file_exists($file=FCPATH.'assets/upload/images/profile/'.$nama_foto)){
                            unlink($file);
                        }
                        }   
                        $upload = $this->User_model->uploadPhoto();

                        if($upload['result'] == 'success'){
                            $file = $upload['file']['file_name'];
                            $this->User_model->updateProfileAdmin($file);
                            $this->session->set_flashdata('success', 'foto berhasil di ubah');
                             redirect(base_url() . 'admin-settings');

                        }
                        else
                        {
                            $this->session->set_flashdata('success', 'foto gagal di ubah');
                            redirect(base_url() . 'admin-settings');
                        }
                    

		            }

        }
    }


    
	}

    function validate_image()
    {
        $check = TRUE;
        if ((!isset($_FILES['poto'])) || $_FILES['poto']['size'] == 0) {
            $this->form_validation->set_message('validate_image', ' {field} Harus di isi');
            $check = FALSE;
        } else if (isset($_FILES['poto']) && $_FILES['poto']['size'] != 0) {
            $allowedExts = array("gif", "jpeg", "jpg", "png", "JPG", "JPEG", "GIF", "PNG");
            $allowedTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
            $extension = pathinfo($_FILES["poto"]["name"], PATHINFO_EXTENSION);
            $detectedType = exif_imagetype($_FILES['poto']['tmp_name']);
            $type = $_FILES['poto']['type'];
            if (!in_array($detectedType, $allowedTypes)) {
                $this->form_validation->set_message('validate_image', 'Tipe file ini tidak diizinkan!');
                $check = FALSE;
            }
            if (filesize($_FILES['poto']['tmp_name']) > 2097152) {
                $this->form_validation->set_message('validate_image', 'Size gambar tidak lebih dari 2MB!');
                $check = FALSE;
            }
            if (!in_array($extension, $allowedExts)) {
                $this->form_validation->set_message('validate_image', "Tipe file ini tidak diizinkan {$extension}");
                $check = FALSE;
            }
        }
        return $check;
    }



    

    
}
